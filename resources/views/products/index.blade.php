@extends('layout.main')

@section('title')
    Товары
@endsection

@section('content')
    <div>
        <a href="{{ route('products.create') }}">Добавить новый товар</a>
    </div>
    <div>
        <select
            class="browser-default custom-select w-100"
            style="max-width: 800px"
            name="category_id"
            onchange="window.location.href = '{{ request()->url() }}?category=' + this.value"
        >
            <option value="0">Все</option>
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ (int)request('category') === $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        @foreach($products as $product)
            <div>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                стоимостью {{ $product->price }} руб. ({{ $product->category->name }})
            </div>
        @endforeach
        {{ $products->links() }}
    </div>
@endsection
