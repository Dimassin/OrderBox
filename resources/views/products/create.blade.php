@extends('layout.main')

@section('title')
    Новый товар
@endsection

@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <label for="name">Название</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
        <label for="description">Описание</label><br>
        <textarea id="description" name="description" cols="30" rows="10">{{ old('description') }}</textarea><br>
        <label for="price">Цена (в рублях)</label><br>
        <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}"><br>
        <label for="category_id">Категория</label><br>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ (int)old('category_id') === $category->id ? 'selected' : '' }}
                >{{ $category->name }}
                </option>
            @endforeach
        </select><br>
        <button type="submit">Добавить в каталог</button>
    </form>
@endsection
