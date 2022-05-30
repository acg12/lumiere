@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/details.css') }}" type="text/css">
@endsection

@section('title', 'Lumiere - Details')

@section('content')
    <div class="d-flex flex-row justify-content-stretch align-items-center" style="padding-top: 50px">
        <img id="item-img" src="{{ asset($data->product_image) }}" alt="">
        <div class="container-fluid">
            <div class="row d-flex flex-row align-items-center">
                <div class="col-lg-8">
                    <h2 class="card-title">{{ $data->product_name }}</h2>
                </div>
                <div class="col-lg-4">
                    <h3 class="card-title">Rp. {{ $data->product_price }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <p class="card-text">{{ $data->product_description }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <p class="card-text">STOCK: {{ $data->product_stock }}</p>
                </div>
            </div>
            <form action="" method="POST" id="form-container">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-2">
                        <input type="number" value="1" min="1" max="{{ $data->product_stock }}" class="form-control input-lg" name="quantity" id="quantity">
                    </div>
                    <div class="col-lg-10">
                        <button class="btn btn-primary btn-block">Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
