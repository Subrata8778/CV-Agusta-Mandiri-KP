@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Portofolio</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Laporan</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.index') }}" class="text-muted">Portofolio</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Portfolio</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- multi-column ordering -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="mt-3 form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.portfolio.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category">
                                    <option value="Adv" {{ old('category') == "Adv" ? 'selected' : '' }}>Agusta Advertising</option>
                                    <option value="Car" {{ old('category') == "Car" ? 'selected' : '' }}>Agusta Motor</option>
                                    <option value="Prop" {{ old('category') == "Prop" ? 'selected' : '' }}>Agusta Properti</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Pemasangan Neon Box di Restoran di pusat Kota Denpasar" autofocus value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="inputHorizontal" placeholder="Tuliskan deskripsi dari portofolio ini" value="{{ old('description') }}"></textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <div class="input-group flex-nowrap">
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" required>
                                </div>
                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <button type="reset" class="btn btn-outline-danger btn-rounded">Batal</button>
                            <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection