@extends('layout.main')

@section('title')
    Редактирование товара
@endsection

@section('content')
    <form action="{{ route('products.update', $product) }}" method="post">
        @csrf
        @method('patch')
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <label for="name">Название</label><br>
        <input type="text" id="name" name="name" value="{{ $product->name }}"><br>
        <label for="description">Описание</label><br>
        <textarea id="description" name="description" cols="30" rows="10">{{ $product->description }}"</textarea><br>
        <label for="price">Цена (в рублях)</label><br>
        <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}"><br>
        <label for="category_id">Категория</label><br>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option
                    {{ $category->id === $product->category->id ? 'selected' : ''}}
                    value="{{ $category->id }}">
                    {{ $category->name }}</option>
            @endforeach
        </select><br>
        <button type="submit">Принять изменения</button>
    </form>
@endsection
