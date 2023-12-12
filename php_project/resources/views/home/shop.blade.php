@extends('master')

@section('styles')
    @vite('resources/css/shop_blade.css')
@endsection

@section('content')
    @include('alert_message')
    <div class="container" style="margin: 20px auto; display: flex;">
        <div style="width: 80%" class="sidebar">
            <div class="filter-group">
                <label class="filter-label">Ár szűrés</label>
                <select class="filter-select" id="priceFilter">
                    <option value="0-50">0 - 50 Lej</option>
                    <option value="51-100">51 - 100 Lej</option>
                    <option value="101-200">101 - 200 Lej</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Kategória szűrés</label>
                <select class="filter-select" id="categoryFilter">
                    @foreach($categories as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="product-list" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
            @foreach($products as $product)
                <div class="product" style="margin: 20px; padding: 20px; border: 1px solid #ddd; text-align: center;">
                    <h3>{{$product->title}}</h3>
                    <img class="image-sizing" src="/product/{{$product->image}}" alt="{{$product->title}} kép">

                    @if($product->discount)
                        <p style="color: #e74c3c; margin-top: 5px;">Discounted Price: {{$product->discount}} Ft</p>
                        <p style="text-decoration: line-through;">Regular Price: {{$product->price}} Ft</p>
                    @else
                        <p style="font-weight: bold; color: #27ae60; margin-top: 10px;">Price: {{$product->price}} Ft</p>
                    @endif

                    <form action="{{route('add.cart', $product->id)}}" method="POST">
                        @csrf
                        @if($product->quantity <= 0)
                            <a class="option2">
                                Out of Stock
                            </a>
                        @else
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Add to Cart">
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
