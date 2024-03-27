@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Portofolio: {{ $port -> title }}</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Laporan</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.index') }}" class="text-muted">Portofolio</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Portfolio</li>
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
                <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.portfolio.update', $port->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category">
                                    <option value="Adv" {{ $port -> category == "Adv" ? 'selected' : '' }}>Agusta Advertising</option>
                                    <option value="Car" {{ $port -> category == "Car" ? 'selected' : '' }}>Agusta Motor</option>
                                    <option value="Prop" {{ $port -> category == "Prop" ? 'selected' : '' }}>Agusta Properti</option>
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
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Pemasangan Neon Box di Restoran di pusat Kota Denpasar" value="{{ $port -> title }}">
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
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Tuliskan deskripsi dari portofolio ini">{{ $port -> description }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div for="inputHorizontal" class="col-sm-2 col-form-label">Foto</div>
                            <div class="col-sm-10">
                                <div class="input-group flex-nowrap preview border border-warning rounded">
                                    <div class="custom-file w-100">
                                        <img id="photoPreview" class="img-fluid mx-auto d-block" src="{{ asset('storage/' . $port -> photo) }}">
                                    </div>
                                    <input type="file" id="photo" style="display: none;" accept="image/*" name="photo" class="@error('photo') is-invalid @enderror">
                                    <button id="changePhoto" class="btn btn-warning" type="button">
                                        <i class="fas fa-edit"></i>
                                    </button>
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
                            <a href="{{ route('admin.portfolio.index') }}" type="reset" class="btn btn-outline-danger btn-rounded">Batal</a>
                            <button type="submit" class="btn btn-primary btn-rounded">Edit Portofolio</button>
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
        $('#changePhoto').on('click', function() {
            $('#photo').trigger('click');
        });

        $('#photo').on('change', function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#photoPreview").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection