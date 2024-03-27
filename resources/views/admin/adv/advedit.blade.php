@extends('layouts.admin')

@section('css')
<script>
    // DELETE EXISTING PHOTOS
    var delPhotos = [];

    function deletePhoto(button) {
        var img = $(button).data('id');
        delPhotos.push(img);

        document.getElementById('del_photos').value = delPhotos;
    }
</script>
@endsection

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Produk Agusta Advertising</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.advertising.index') }}" class="text-muted">Agusta Advertising</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Produk</li>
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
                <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.advertising.update', $adv->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Billboard" autofocus value="{{ $adv -> name }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category">
                                <option value="Indoor" @if($adv->category == 'Indoor') selected @endif>Indoor</option>
                                <option value="Outdoor" @if($adv->category == 'Outdoor') selected @endif>Outdoor</option>
                                <option value="IO" @if($adv->category == 'IO') selected @endif>Indoor dan Outdoor</option>
                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div id="photos" class="form-group mb-3 row">
                        <div for="inputHorizontal" class="col-sm-2 col-form-label">Foto</div>
                        @foreach($photos as $key => $photo)
                        @if($key != 0)
                        <div for="inputHorizontal" class="col-sm-2 col-form-label"></div>
                        @endif
                        <div class="col-sm-10 mb-2">
                            <div class="input-group flex-nowrap preview border border-danger rounded">
                                <div class="custom-file w-100">
                                    <img id="photoPreview" class="img-fluid mx-auto d-block" src="{{ asset('storage/' . $photo -> url) }}">
                                </div>
                                <button class="btn btn-danger btnDelExistPhoto" type="button" data-id="{{ $photo -> id }}" onclick="deletePhoto(this)">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-sm-2 col-form-label"></div>
                        <div class="col-sm-10 mb-2">
                            <div class="input-group flex-nowrap">
                                <div class="custom-file w-100">
                                    <input id="firstInputPhoto" class="form-control @error('photo') is-invalid @enderror" type="file" name="photos[]">
                                </div>
                                <button class="btn btn-success btnAddPhoto" type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            @error('photos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="del_photos[]" id="del_photos" value="">
                    <div class="form-actions">
                        <div class="text-end">
                            <a href="{{ URL::previous() }}" type="reset" class="btn btn-outline-danger btn-rounded">Batal</a>
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
            $('#photos').append('<div class="col-sm-2 col-form-label"></div><div class="col-sm-10 mb-2"><div class="input-group flex-nowrap"><div class="custom-file w-100"><input class="form-control" type="file" name="photos[]"></div><button class="btn btn-danger btnDelPhoto" type="button"><i class="fas fa-trash-alt"></i></button></div></div>');
        })

        // DELETE PHOTO SLOTS
        $(document).on('click', '.btnDelPhoto', function() {
            $(this).parent().parent().prev().remove();
            $(this).parent().parent().remove();
        });

        // DELETE EXISTED PHOTOS FROM UI
        $(document).on('click', '.btnDelExistPhoto', function() {
            $(this).parent().parent().next().remove();
            $(this).parent().parent().remove();
        });
    });
</script>
@endsection