@extends('master')

@section('styles')
    @vite('resources/css/home.css')
@endsection

@section('content')
    <body class="antialiased">
        <div class="content">
            <div class="short-presentation">
                <div class="text-right">
                    <h1>Üdvözöllek a Varrokucko Webshopban</h1>
                    <p>Köszönjük, hogy ellátogattál webáruházunkba, ahol a széles választék és a kényelmes vásárlás garantált. Célunk, hogy kellemes és zökkenőmentes élményt nyújtsunk neked, amikor böngészed kínálatunkat. Legyen szó divatos ruhákról, elektronikai eszközökről vagy bármilyen más termékről, reméljük, megtalálod azt, amit keresel.</p>
                    <p>A webshopunk friss és változatos termékkínálattal büszkélkedik, így mindig találsz valami újat és izgalmasat. Nézz körül a legújabb divatcikkek között, vagy böngészd a legfrissebb elektronikai termékeinket. Azt szeretnénk, hogy minden látogatásod alkalmával új felfedezéseket tegyél, és megtaláld azt, ami igazán megragadja a figyelmedet.</p>
                    <p>Webáruházunkban az egyszerű és biztonságos vásárlás érdekében mindent megteszünk. A könnyen kezelhető felületünk segítségével gyorsan megtalálhatod a kívánt termékeket, és biztonságos fizetési lehetőségekkel gondoskodunk arról, hogy minden tranzakció zökkenőmentesen lezajljon. Hozzánk térj vissza, amikor új vásárlásra vágysz, és élvezd a böngészés örömét webshopunkban!</p>
                </div>
                <div class="picture-left">
                    <img src="{{ asset('product/1700811836.jpg') }}" alt="Kep">
                </div>
            </div>
        </div>

        <div style="margin-bottom: 15px" class="container">
            <h2>Termékek</h2>
            <div class="product-list">
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
    </body>
@endsection

