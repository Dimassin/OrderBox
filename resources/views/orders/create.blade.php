@extends('layout.main')

@section('title')
    Новый заказ
@endsection

@section('content')
    <form action="">
        <select
            onchange="window.location.href = '{{ request()->url() }}?category=' + this.value"
            name="category_id"
            id="category_id">
            <option value="0">--- Выберите категорию ---</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                        {{ $category->id === (int)request()->query('category') ? 'selected' : '' }}
                >{{ $category->name }}</option>
            @endforeach
        </select>
    </form>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <label for="name">ФИО</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
        <label for="product_price">Товар</label><br>
        <select name="product_id" id="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} {{ $product->price }} руб.</option>
            @endforeach
        </select><br>
        <label for="count">Количество</label><br>
        <input id="count" name="count" type="number" value="{{ old('number') }}"><br>
        <label for="comment">Комментарий</label><br>
        <input type="text" id="comment" name="comment" value="{{ old('comment') }}"><br>
        <button type="submit">Создать заказ</button>
    </form>
@endsection
