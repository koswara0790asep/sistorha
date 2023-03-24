@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h5>/<a href="">dasboard</a></h5>
        <hr>
        <center>
            <h1>HALAMAN UTAMA {{ Auth::user()->role }}</h1>
        </center>
        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <hr>
                    Selamat datang, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
