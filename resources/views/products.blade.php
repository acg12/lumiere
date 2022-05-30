@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" type="text/css">
@endsection

@section('title', 'Lumiere - All Products')

@section('content')
    <div id="searchbar">
        <form action="/search">
            <div class="input-group mb-3">
                @if($search_query != null)
                    <input type="text" value="{{ $search_query }}" class="form-control input-lg" name="q" id="search">
                @else
                    <input type="text" placeholder="Search..." class="form-control input-lg" name="q" id="search">
                @endif
                <div class="input-group-append">
                    <button class="btn btn-primary" id="btn-footer">Go</button>
                </div>
            </div>
        </form>
    </div>
    @if(count($data) == 0)
        <div class="d-flex flex-column justify-content-center align-items-center" style="text-align: center; margin-top: 32px">
            <h5 class="card-title">Hmm... It looks like we couldn't find
                <br>what you were looking for. Try something else.</h5>
        </div>
    @else
        <div class="container-fluid" id="product-container">
            <div class="row">
                @for($i = 0; $i < count($data); $i++)
                    <div class="col-lg-4" id="product-card">
                        <img class="card-img-top" src="{{ $data[$i]->product_image }}" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">{{ $data[$i]->product_name }}</h4>
                            <p class="card-text">Rp. {{ $data[$i]->product_price }}</p>
                            <a href="/details/{{ $data[$i]->id }}" class="btn btn-primary">See details</a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a></li>
            @for($i = 1; $i <= $data->lastPage(); $i++)
                @if($i == $data->currentPage())
                    <li class="page-item"><a class="page-link" href="#">{{ $i }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a></li>
        </ul>
    @endif
@endsection
