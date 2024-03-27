@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Produk Agusta Motor</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.car.sell.index') }}" class="text-muted">Agusta Motor</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.car.sell.index') }}" class="text-muted">Jual Mobil</a></li>
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
                <form class="mt-3 form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.car.sell.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Audi A8" autofocus value="{{ old('title') }}">
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
                                <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="inputHorizontal" placeholder="YYYY" minlength="4" maxlength="4" step="1" value="{{ old('year') }}">
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
                                    <option value="{{ $brand -> id }}" {{ old('brand') == $brand -> id ? 'selected' : '' }}>{{ $brand -> brand }}</option>
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
                                <select id="cbCategory" class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="inlineFormCustomSelect" name="category" required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category -> id }}" {{ old('category') == $category -> id ? 'selected' : '' }}>{{ $category -> category }}</option>
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
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="inputHorizontal" placeholder="Rp. 0,-" min="0" step="1" value="{{ old('price') }}">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kilometer</label>
                            <div class="col-sm-10">
                                <input type="number" name="km" class="form-control @error('km') is-invalid @enderror" id="inputHorizontal" placeholder="0 km" min="0" step="1" value="{{ old('km') }}">
                                @error('km')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Transmisi</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('transmission') is-invalid @enderror" id="inlineFormCustomSelect" name="transmission" required>
                                    <option value="Manual" {{ old('transmission') == "Manual" ? 'selected' : '' }}>Manual (MT)</option>
                                    <option value="Automatic" {{ old('transmission') == "Automatic" ? 'selected' : '' }}>Matic (AT)</option>
                                    <option value="Hybrid" {{ old('transmission') == "Hybrid" ? 'selected' : '' }}>Hybrid</option>
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
                                <select class="form-select mr-sm-2 @error('capacity') is-invalid @enderror" id="inlineFormCustomSelect" name="capacity" required>
                                    <option value="1" {{ old('capacity') == "1" ? 'selected' : '' }}>&lt; 1000 cc</option>
                                    <option value="2" {{ old('capacity') == "2" ? 'selected' : '' }}>1000 - 1500 cc</option>
                                    <option value="3" {{ old('capacity') == "3" ? 'selected' : '' }}>1500 - 2000 cc</option>
                                    <option value="4" {{ old('capacity') == "4" ? 'selected' : '' }}>2000 - 3000 cc</option>
                                    <option value="5" {{ old('capacity') == "5" ? 'selected' : '' }}>&gt; 3000 cc</option>
                                </select>
                                @error('capacity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Bahan bakar</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('fuel') is-invalid @enderror" id="inlineFormCustomSelect" name="fuel" required>
                                    <option value="Petrol" {{ old('fuel') == "Petrol" ? 'selected' : '' }}>Bensin</option>
                                    <option value="Diesel" {{ old('fuel') == "Diesel" ? 'selected' : '' }}>Diesel</option>
                                    <option value="Electricity" {{ old('fuel') == "Electricity" ? 'selected' : '' }}>Listrik</option>
                                    <option value="Hybrid" {{ old('fuel') == "Hybrid" ? 'selected' : '' }}>Hybrid</option>
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
                                <textarea type="textarea" name="desc" class="form-control @error('desc') is-invalid @enderror" id="inputHorizontal" placeholder="Mobil dalam keadaan baik" rows="7">{{ old('desc') }}</textarea>
                                @error('desc')
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
                                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photos[]" required>
                                    </div>
                                    <button class="btn btn-outline-secondary btnAddPhoto" type="button">
                                        <i class="fas fa-plus"></i>
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
        // SELECT2
        $('#cbBrand').select2();
        $('#cbCategory').select2();

        // ADD PHOTO SLOTS
        $('.btnAddPhoto').click(function() {
            $('#photos').append('<div class="col-sm-2 col-form-label"></div><div class="col-sm-10 mt-2"><div class="input-group flex-nowrap"><div class="custom-file w-100"><input class="form-control" type="file" name="photos[]"></div><button class="btn btn-outline-danger btnDelPhoto" type="button"><i class="fas fa-minus"></i></button></div></div>');
        })

        // DELETE PHOTO SLOTS
        $(document).on('click', '.btnDelPhoto', function() {
            $(this).parent().remove();
            $(this).parent().prev().remove();
        });
    });
</script>
@endsection