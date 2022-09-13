<?php

namespace App\Repository;

use App\Models\Product;
use Exception;
use Illuminate\Support\Collection;

class CartRepository
{
    /**
     * @throws Exception
     */
    public function add(Product $product): int
    {
        \Cart::session(auth()->user()->id)
            ->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
                'attributes' => [],
                'associatedModel' => $product
            ]);

        return $this->count();
    }

    /**
     * @throws Exception
     */
    public function delete(string $rowId): int
    {
        \Cart::session(auth()->user()->id)->remove($rowId);

        return $this->count();
    }

    /**
     * @throws Exception
     */
    public function content(): Collection
    {
        return \Cart::session(auth()->user()->id)
            ->getContent();
    }

    /**
     * @throws Exception
     */
    public function jsonOrderItems(): string
    {
        return $this
            ->content()
            ->map(function ($orderItem) {
                return [
                    'id' => $orderItem->id,
                    'name' => $orderItem->name,
                    'quantity' => $orderItem->quantity,
                    'price' => $orderItem->price,
                    'total' => ($orderItem->price * $orderItem->quantity),
                    'product' => $orderItem->associatedModel,
                ];
            })
            ->toJson();
    }

    /**
     * @throws Exception
     */
    public function count(): int
    {
        return $this->content()
            ->sum('quantity');
    }

    /**
     * @throws Exception
     */
    public function total(): array
    {
        return [
          'total' => \Cart::session(auth()->user()->id)
              ->getTotal(),

            'subTotal' => \Cart::session(auth()->user()->id)
                ->getSubtotal()
        ];
    }

    /**
     * @throws Exception
     */
    public function decreaseQuantity(int $rowId): bool|int
    {
        if ($this->getItem($rowId)->quantity === 1) {
            return $this->delete($rowId);
        }

        \Cart::session(auth()->user()->id)
            ->update($rowId, array(
                'quantity' => - 1
            ));

        return true;
    }

    /**
     * @throws Exception
     */
    public function increaseQuantity(int $rowId): bool
    {
        \Cart::session(auth()->user()->id)
            ->update($rowId, array(
                'quantity' => + 1
            ));

        return true;
    }

    /**
     * @throws Exception
     */
    public function clear(): void
    {
        \Cart::session(auth()->user()->id)->clear();
    }

    /**
     * @throws Exception
     */
    private function getItem(int $rowId)
    {
        return \Cart::session(auth()->user()->id)
            ->get($rowId);
    }
}
