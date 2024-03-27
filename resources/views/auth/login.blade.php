@extends('layouts.auth')

@section('content')
    <h2 class="mt-3 text-center">Selamat datang kembali di CV Agusta Mandiri</h2>
    <p class="text-center">Masuk untuk dapat mengakses layanan dari kami dengan lebih lengkap</p>
    <form class="mt-4" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                        {{ session('loginError') }}
                    </div>
                @endif
                <div class="form-group mb-3">
                    <label class="form-label text-dark" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="contoh@gmail.com"
                        autofocus required @error('email') is-invalid @enderror value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group mb-3">
                    <label class="form-label text-dark" for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password"
                        placeholder="Masukkan password Anda" required>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn w-100 btn-primary btn-rounded">Masuk</button>
            </div>
            <div class="col-lg-12 text-center mt-5">
                Belum memiliki akun? <a href="{{ route('register') }}" class="text-danger">Daftar</a>
            </div>
        </div>
    </form>
@endsection
