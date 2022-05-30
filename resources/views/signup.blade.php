@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}" type="text/css">
@endsection

@section('title', 'Lumiere - Sign Up')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center">
        <div class="card-body" id="form-container">
            <h1>Sign Up</h1>
            <p>Sign up below to manage your orders</p>
            <form action="", method="POST">
                {{csrf_field()}}
                <div class="inp-div">
                    <input type="text" placeholder="Name" class="form-control" name="name" id="">
                </div>
                <div class="inp-div">
                    <input type="email" placeholder="Email Address" class="form-control" name="email" id="">
                </div>
                <div class="inp-div">
                    <input type="password" placeholder="Password" class="form-control" name="password" id="">
                </div>
                <button class="btn btn-primary btn-margin btn-signup">Sign Up</button>
            </form>
        </div>
    </div>
@endsection
