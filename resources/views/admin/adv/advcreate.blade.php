@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Produk Agusta Advertising</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.advertising.index') }}" class="text-muted">Agusta Advertising</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Produk</li>
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
                <form class="mt-3 form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.advertising.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Billboard" autofocus value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category">
                                    <option value="Indoor" {{ old('category') == "Indoor" ? 'selected' : '' }}>Indoor</option>
                                    <option value="Outdoor" {{ old('category') == "Outdoor" ? 'selected' : '' }}>Outdoor</option>
                                    <option value="IO" {{ old('category') == "IO" ? 'selected' : '' }}>Indoor dan Outdoor</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div id="photos" class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <div class="input-group flex-nowrap">
                                    <div class="custom-file w-100">
                                        <input class="form-control inputPhoto @error('photos') is-invalid @enderror" type="file" name="photos[]" required>
                                    </div>
                                    <button class="btn btn-outline-secondary btnAddPhoto" type="button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- <div class="input-group flex-nowrap preview mt-1">
                                    <div class="custom-file w-100"></div>
                                </div> -->
                                @error('photos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <button type="reset" class="btn btn-outline-danger btn-rounded">Hapus</button>
                            <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<script>
    $(document).ready(function() {
        // ADD PHOTO SLOTS
        $('.btnAddPhoto').click(function() {
            $('#photos').append('<div class="col-sm-2 col-form-label"></div><div class="col-sm-10 mt-2"><div class="input-group flex-nowrap"><div class="custom-file w-100"><input class="form-control" type="file" name="photos[]"></div><button class="btn btn-outline-danger btnDelPhoto" type="button"><i class="fas fa-minus"></i></button></div></div>');
        })

        // DELETE PHOTO SLOTS
        $(document).on('click', '.btnDelPhoto', function() {
            $(this).parent().parent().prev().remove();
            $(this).parent().parent().remove();
        });
    });
</script>
@endsection