<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderService
{
    public function getPaginatedOrders(): LengthAwarePaginator
    {
        return Order::orderBy('id', 'desc')->paginate(20);
    }
    public function getProductsByCategory(Request $request): Collection
    {
        return Product::where('category_id', $request->category)
            ->select('id', 'name', 'price')
            ->get();
    }

    public function storeValidatedData(array $validatedData): void
    {
        $productPrice = Product::findOrFail($validatedData['product_id'])->price;
        $validatedData['total_price'] = $productPrice * $validatedData['count'];
        unset($validatedData['count']);
        Order::create($validatedData);
    }

    public function updateOrderStatus(Order $order): void
    {
        $order->update(['status' => true]);
    }
}
