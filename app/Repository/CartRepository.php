<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Support\Collection;

class CartRepository
{
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

    public function delete(string $rowId): int
    {
        \Cart::session(auth()->user()->id)->remove($rowId);

        return $this->count();
    }

    public function content(): Collection
    {
        return \Cart::session(auth()->user()->id)
            ->getContent();
    }

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

    public function count(): int
    {
        return $this->content()
            ->sum('quantity');
    }

    public function total(): array
    {
        return [
          'total' => \Cart::session(auth()->user()->id)
              ->getTotal(),

            'subTotal' => \Cart::session(auth()->user()->id)
                ->getSubtotal()
        ];
    }

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

    public function increaseQuantity(int $rowId): bool
    {
        \Cart::session(auth()->user()->id)
            ->update($rowId, array(
                'quantity' => + 1
            ));

        return true;
    }

    public function clear()
    {
        \Cart::session(auth()->user()->id)->clear();
    }

    private function getItem(int $rowId)
    {
        return \Cart::session(auth()->user()->id)
            ->get($rowId);
    }
}
