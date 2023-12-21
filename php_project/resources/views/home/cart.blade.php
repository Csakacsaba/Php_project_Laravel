@extends('master')

@section('styles')
    @vite('resources/css/home.css')
    @vite('resources/css/cart.css')
@endsection

@section('content')
    <div class="cart-container">
        <h1 style="text-align: center">Your Shopping Cart</h1>

        @if(count($cart) > 0)
            <div class="cart-table">
                <div class="cart-header">
                    <div class="cart-cell">Product</div>
                    <div class="cart-cell">Quantity</div>
                    <div class="cart-cell">Price</div>
                    <div class="cart-cell">Picture</div>
                    <div class="cart-cell">Actions</div>
                </div>
                <div class="cart-body">
                    @foreach($cart as $product)
                        <div class="cart-row">
                            <div style="text-align: center; margin: auto 0px" class="cart-cell">{{ $product->product_title }}</div>
                            <div style="text-align: center; margin: auto 0px" class="cart-cell">{{ $product->quantity }}</div>
                            <div style="text-align: center; margin: auto 0px" class="cart-cell">{{ $product->price }} Ft</div>
                            <div style="text-align: center; margin: auto 0px" class="cart-cell"><img style="width: 100px; height: 100px" src="/product/{{ $product->image }}" alt="Image not available"></div>
                            <div style="text-align: center; margin: auto 0px" class="cart-cell">
                                <form action="{{ route('delete.from.cart', ['id' => $product->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="delete-button">
                                        Remove
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="cart-summary">
                <p>Total: {{ $totalPrice }} Ft</p>
            </div>
        @else
            <p>Your shopping cart is empty.</p>
        @endif
    </div>

@endsection
