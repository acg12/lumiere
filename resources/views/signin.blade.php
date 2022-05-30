@extends('template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}" type="text/css">
@endsection

@section('title', 'Lumiere - Sign In')

@section('content')
    <div class="d-flex flex-row align-items-center">
        <div class="card-body" id="form-container">
            <h2>Sign In</h2>
            <p>Login below to manage your orders</p>
            <form action="", method="POST">
                {{csrf_field()}}
                <div class="inp-div">
                    <input type="email" placeholder="Email Address" class="form-control" name="email" id="">
                </div>
                <div class="inp-div">
                    <input type="password" placeholder="Password" class="form-control" name="password" id="">
                </div>
                <button class="btn btn-primary btn-margin btn-signin">Sign In</button>
            </form>
        </div>
        <div class="page-divider"></div>
        <div class="card-body" id="sign-up-peek">
            <h2>Sign Up</h2>
            <p>Create an account to manage your orders by clicking below.</p>
            <a href="/signup">
                <button class="btn btn-margin btn-lg btn-outline-dark">
                    Create Account
                </button>
            </a>
        </div>
    </div>
@endsection
