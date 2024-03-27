@extends('layouts.home')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2></h2>
                <ol>
                    <li><a href="{{ route('customer.home') }}">Halaman Utama</a></li>
                    <li>Profil</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('customer.profile.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputHorizontal" placeholder="Masukkan nama Anda" required value="{{ $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="inputHorizontal" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: 1234567890" required value="{{ $user->telephone }}">
                        @error('telephone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="inputHorizontal" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh@gmail.com" required value="{{ $user->email }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-actions mt-5">
                    <div class="text-end">
                        <a href="{{ URL::previous() }}" type="reset" class="btn btn-outline-danger btn-rounded">Batal</a>
                        <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection