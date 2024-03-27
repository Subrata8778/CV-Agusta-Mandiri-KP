@extends('layouts.auth')

@section('content')
<h2 class="mt-3 text-center">Selamat datang di CV Agusta Mandiri</h2>
<p class="text-center">Daftar untuk dapat mengakses layanan dari kami dengan lebih lengkap</p>
<form class="mt-4" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label class="form-label text-dark" for="name">Nama</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label class="form-label text-dark" for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="contoh@gmail.com" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label class="form-label text-dark" for="telephone">Telephone</label>
                <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" type="number" name="telephone" placeholder="08xxxxxxxxxx" value="{{ old('telephone') }}" required>
                @error('telephone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label class="form-label text-dark" for="password">Kata Sandi</label>
                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Masukkan kata sandi Anda" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label class="form-label text-dark" for="password2">Konfirmasi kata sandi</label>
                <input class="form-control @error('password2') is-invalid @enderror" id="password2" type="password" name="password_confirmation" placeholder="Masukkan ulang kata sandi Anda" required autocomplete="new-password">
                @error('password2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button type="submit" class="btn w-100 btn-primary btn-rounded">Daftar</button>
        </div>
        <div class="col-lg-12 text-center mt-5">
            Sudah memiliki akun? <a href="{{ route('login') }}" class="text-danger">Masuk</a>
        </div>
    </div>
</form>
@endsection