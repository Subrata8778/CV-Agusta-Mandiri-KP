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
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Produk Agusta Motor</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.car.sell.index') }}" class="text-muted">Agusta Motor</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.car.sell.index') }}" class="text-muted">Jual Mobil</a></li>
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
                <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.car.sell.update', $car->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('sell_status') is-invalid @enderror" id="inlineFormCustomSelect" name="sell_status">
                                    <option value="Available" @if($car->sell_status == 'Available') selected @endif>Tersedia</option>
                                    <option value="Sold" @if($car->sell_status == 'Sold') selected @endif>Terjual</option>
                                </select>
                                @error('sell_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Audi A8" autofocus value="{{ $car -> title }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="inputHorizontal" placeholder="YYYY" value="{{ $car -> year }}">
                                @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <select id="cbBrand" class="form-select mr-sm-2 @error('brand') is-invalid @enderror" id="inlineFormCustomSelect" name="brand">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand -> id }}" @if($car->car_brand_id == $brand -> id) selected @endif>{{ $brand -> brand }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select id="cbCategory" class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category">
                                    @foreach($categories as $category)
                                    <option value="{{ $category -> id }}" @if($car->car_category_id == $category -> id) selected @endif>{{ $category -> category }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Harga (IDR)</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="inputHorizontal" placeholder="Rp. 0,-" value="{{ $car -> price }}">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kilometer (km)</label>
                            <div class="col-sm-10">
                                <input type="number" name="kilometre" class="form-control @error('kilometre') is-invalid @enderror" id="inputHorizontal" placeholder="0 km" value="{{ $car -> kilometre }}">
                                @error('kilometre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Transmisi</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('transmission') is-invalid @enderror" id="inlineFormCustomSelect" name="transmission">
                                    <option value="Manual" @if($car->transmission == 'Manual') selected @endif>Manual</option>
                                    <option value="Automatic" @if($car->transmission == 'Automatic') selected @endif>Automatic</option>
                                    <option value="Hybrid" @if($car->transmission == 'Hybrid') selected @endif>Hybrid</option>
                                </select>
                                @error('transmission')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kapasitas Mesin (cc)</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('capacity') is-invalid @enderror" id="inlineFormCustomSelect" name="capacity">
                                    <option value="1" @if($car->capacity == '1') selected @endif>&lt; 1000 cc</option>
                                    <option value="2" @if($car->capacity == '2') selected @endif>1000 - 1500 cc</option>
                                    <option value="3" @if($car->capacity == '3') selected @endif>1500 - 2000 cc</option>
                                    <option value="4" @if($car->capacity == '4') selected @endif>2000 - 3000 cc</option>
                                    <option value="5" @if($car->capacity == '5') selected @endif>&gt; 3000 cc</option>
                                </select>
                                @error('capacity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Bahan Bakar</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('fuel') is-invalid @enderror" id="inlineFormCustomSelect" name="fuel">
                                    <option value="Petrol" @if($car->fuel == 'Petrol') selected @endif>Bensin</option>
                                    <option value="Diesel" @if($car->fuel == 'Diesel') selected @endif>Diesel</option>
                                    <option value="Electricity" @if($car->fuel == 'Electricity') selected @endif>Listrik</option>
                                    <option value="Hybrid" @if($car->fuel == 'Hybrid') selected @endif>Hybrid</option>
                                </select>
                                @error('fuel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="number" name="desc" class="form-control @error('desc') is-invalid @enderror" id="inputHorizontal" placeholder="Mobil dalam keadaan baik" rows="7">{{ $car -> description }}</textarea>
                                @error('desc')
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
                    </div>
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
        // SELECT2
        $('#cbBrand').select2();
        $('#cbCategory').select2();

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