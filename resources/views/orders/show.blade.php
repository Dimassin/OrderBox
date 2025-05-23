@extends('layout.main')

@section('title')
    Заказ
@endsection

@section('content')
    <div><a href="{{ route('orders.index') }}">Назад</a></div>
    <div>
        <div>Заказ № {{ $order->id }}</div>
        <div>Дата создания: {{ $order->created_at }}</div>
        <div>ФИО: {{ $order->name }}</div>
        <div>Статус заказа: {{ $order->status ? 'выполнен' : 'новый'}}</div>
        <div>Итоговая цена: {{ $order->total_price }} руб.</div>
        <div>Комментарий: {{ $order->comment }}</div>
        @if(!$order->status)
            <form action="{{ route('orders.complete', $order->id) }}" method="post">
                @csrf
                @method('patch')
                <button type="submit">Отметить как выполненный</button>
            </form>
        @endif
    </div>
@endsection
