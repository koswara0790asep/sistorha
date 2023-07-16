@extends('layouts.app')

@section('content')
<div class="container mt-7">
    <div class="row justify-content-center">
        {{-- <h5>/<a href="">dasboard</a></h5>
        <hr> --}}
        <center>
            <h1>HALAMAN MASUK {{ strtoupper(Auth::user()->role) }}</h1>
        </center>
        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('WELCOME!') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Anda berhasil masuk pada Sistem Monitoring Kehadiran TEDC!') }}
                    <hr>
                    Selamat datang, {{ Auth::user()->role != 'prodi' ? '' : 'Program Studi' }} {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
