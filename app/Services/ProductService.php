<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function getPaginatedProducts(array $data): LengthAwarePaginator
    {
        return Product::query()
            ->when($data['category'] ?? 0, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->orderBy('id', 'desc')
            ->paginate(20)
            ->withQueryString();
    }

    public function addProduct(array $data): void
    {
        Product::create($data);
    }

    public function updateProduct(Product $product, array $data): void
    {
        $product->update($data);
    }

    public function removeProduct(Product $product): void
    {
        $product->delete();
    }
}
