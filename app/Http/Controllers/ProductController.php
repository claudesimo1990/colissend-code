<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): Factory|View|Application
    {

        $products = Product::latest()->paginate(20);

        return view('admin.shop.products.index', compact('products'));
    }

    public function create(): Factory|View|Application
    {
        return view('admin.shop.products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = Product::updateOrCreate(
            ['id' => $request->get('id')],
            [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'slug' => $request->get('slug'),
            'price' => $request->get('price'),
            'active' => !empty($request->get('active')),
            'image' => $request->get('name') // c est pas important a ce niveau,
        ]);

        if (request()->hasFile('image') && request()->file('image')->isValid()) {
            $product->addMediaFromRequest('image')->toMediaCollection('products');
        }

       return redirect()->route('admin.shop.products.index');
    }

    public function edit(Product $product): Factory|View|Application
    {
        return view('admin.shop.products.edit', compact('product'));
    }

    public function publish(Product $product): RedirectResponse
    {
        $product->update([
           'active' => true
        ]);

        return redirect()->back();
    }

    public function delete(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->back();
    }
}
