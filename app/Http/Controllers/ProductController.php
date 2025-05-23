<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index(IndexRequest $request)
    {
        return view('products.index', [
            'products' => $this->productService->getPaginatedProducts($request->validated()),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $this->productService->addProduct($validatedData);

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(Product $product, UpdateRequest $request)
    {
        $validatedData = $request->validated();
        $this->productService->updateProduct($product, $validatedData);

        return redirect()->route('products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $this->productService->removeProduct($product);

        return redirect()->route('products.index');
    }
}
