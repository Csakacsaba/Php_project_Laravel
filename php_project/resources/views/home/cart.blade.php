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
                    <div class="cart-cell">Total</div>
                    <div class="cart-cell">Actions</div>
                </div>
                <div class="cart-body">
                    @foreach($cart as $product)
                        <div class="cart-row">
                            <div class="cart-cell">{{ $product->product_title }}</div>
                            <div class="cart-cell">{{ $product->quantity }}</div>
                            <div class="cart-cell">{{ $product->price }} Ft</div>
                            <div class="cart-cell">
                                <form action="{{'delete.from.cart', $product->id}}" method="POST">
                                    @method('DELETE')
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
