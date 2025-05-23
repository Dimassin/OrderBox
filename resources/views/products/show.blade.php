@extends('layout.main')

@section('title')
    Товар
@endsection

@section('content')
    <div>
        <div>{{ $product->name }}</div>
        <div>{{ $product->price }} руб.</div>
        <div>{{ $product->description }} руб.</div>
        <div>{{ $product->category->name }}</div>
        <a href="{{ route('products.edit', $product->id) }}">Редактировать</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="post">
            @csrf
            @method('delete')
            <button>Удалить</button>
        </form>
    </div>
@endsection
