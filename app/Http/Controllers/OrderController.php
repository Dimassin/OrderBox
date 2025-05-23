<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function index()
    {
        return view('orders.index', ['orders' => $this->orderService->getPaginatedOrders()]);
    }

    public function create(Request $request)
    {
        $products = [];

        if ($request->has('category')) {
            $products = $this->orderService->getProductsByCategory($request);
        }

        return view('orders.create', [
            'categories' => Category::all(),
            'products' => $products,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $this->orderService->storeValidatedData($validatedData);

        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function complete(Order $order)
    {
        $this->orderService->updateOrderStatus($order);

        return redirect()->route('orders.show', compact('order'));
    }
}
