@extends('layout.main')

@section('title')
    Заказы
@endsection

@section('content')
    <div>
        <div><a href="{{ route('orders.create') }}">Оформить новый заказ</a></div>
        @foreach($orders as $order)
            <div>
                <a href="{{ route('orders.show', $order->id) }}">Заказ номер: {{ $order->id }}</a> |
                ({{ $order->created_at }}) |
                ФИО: {{ $order->name }} |
                Статус: {{ $order->status ? 'выполнено' : 'новый' }} |
                Итоговая цена: {{ $order->total_price }} руб.
            </div>
        @endforeach
        {{ $orders->links() }}
    </div>
@endsection
