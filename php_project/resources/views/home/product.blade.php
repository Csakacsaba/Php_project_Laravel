@extends('master')

@section('styles')
    @vite('resources/css/home.css') {{-- Ezt hagyd meg, ha van saját stíluslapod --}}
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .product-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #007bff;
        }

        p {
            line-height: 1.6;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="product-container">
        <h1>{{$product->title}}</h1>
        <p>{{$product->description}}</p>
        <img src="/product/{{ $product->image }}" alt="Image not available">
    </div>
    <form action="{{route('add.cart', $product->id)}}" method="POST">
        @csrf
        @if($product->quantity <= 0)
            <a style="color: #000291" class="option2">
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
@endsection
