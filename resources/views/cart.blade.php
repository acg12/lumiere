@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" type="text/css">
@endsection

@section('title', 'Lumiere - Your Cart')

@section('content')
    <div class="d-flex flex-column align-items-center" style="padding-top: 100px">
        @if(count($data) <= 0)
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('images/empty-cart.png') }}" height="150" width="150" alt="">
                <h5 class="card-title" style="margin-top: 50px">
                    Oops, it looks like your cart is empty :(
                </h5>
                <a href="/products" style="margin-top:16px">
                    <button class="btn btn-outline-dark btn-md">Continue Shopping &rarr;</button>
                </a>
            </div>
        @else
            <h1 class="card-title">Your Cart</h1>
            <div id="continue-shop">
                <a href="/products" style="margin-top:16px">
                    <button class="btn btn-link btn-md">Continue Shopping &rarr;</button>
                </a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <p>PRODUCT</p>
                    </div>
                    <div class="col-lg-2">
                        <p>PRICE</p>
                    </div>
                    <div class="col-lg-2">
                        <p>QUANTITY</p>
                    </div>
                    <div class="col-lg-2" style="text-align: right">
                        <p>TOTAL</p>
                    </div>
                </div>
                @for($i = 0; $i < count($data); $i++)
                    <form action="/cart/save/{{ $data[$i]->product_id }}" method="POST">
                        {{csrf_field()}}
                        <div class="row d-flex flex-row align-items-center cart-row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ asset($data[$i]->product->product_image) }}" class="product-image" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex flex-column">
                                            <a href="/details/{{ $data[$i]->product_id }}">
                                                <h5 class="card-title">{{ $data[$i]->product->product_name }}</h5>
                                            </a>
                                            <div class="btn-panel">
                                                @if($edit == 0 || $edit != 0 && $edit != $data[$i]->product_id)
                                                    <a href="/cart/edit/{{ $data[$i]->product_id }}" class="btn-edit">
                                                        <div class="btn btn-sm btn-link">Edit</div>
                                                    </a>
                                                @else
                                                    <button class="btn btn-sm btn-link">Save</button>
                                                @endif
                                                /
                                                <a href="/cart/remove/{{ $data[$i]->product_id }}" class="btn-remove">
                                                    <div class="btn btn-sm btn-link">Remove</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <p>Rp. {{ $data[$i]->product->product_price }}</p>
                            </div>
                            <div class="col-lg-2">
                                @if($edit == 0 || $edit != $data[$i]->product_id)
                                    <input type="number" min="1" max="{{ $data[$i]->product->product_stock }}" value="{{ $data[$i]->quantity }}" disabled class="form-control input-lg" name="quantity" id="quantity">
                                @else
                                    <input type="number" min="1" max="{{ $data[$i]->product->product_stock }}" value="{{ $data[$i]->quantity }}" class="form-control input-lg" name="quantity" id="quantity">
                                @endif
                            </div>
                            <div class="col-lg-2" style="text-align: right">
                                <p>Rp. {{ $data[$i]->product->product_price * $data[$i]->quantity }}</p>
                            </div>
                        </div>
                    </form>
                @endfor
                <div class="row" id="total-panel">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-2">SUBTOTAL</div>
                    <div class="col-lg-2"></div>
                </div>
                <div class="row">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <a href="/checkout">
                            <div class="btn btn-primary btn-block">Checkout &rarr;</div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
