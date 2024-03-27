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
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Produk Properti</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}" class="text-muted">Agusta Properti</a></li>
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
                <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.property.update', $prop->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select id="cbStatus" class="form-select mr-sm-2 @error('status') is-invalid @enderror" id="inlineFormCustomSelect" name="status" required>
                                    <option value="Available" @if($prop->status == 'Available') selected @endif>Tersedia</option>
                                    <option value="Sold" @if($prop->status == 'Sold') selected @endif>Terjual</option>
                                </select>
                                @error('status')
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
                                    <option value="House" @if($prop->category == 'House') selected @endif>Rumah</option>
                                    <option value="Villa" @if($prop->category == 'Villa') selected @endif>Villa</option>
                                    <option value="Land" @if($prop->category == 'Land') selected @endif>Tanah</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Tipe</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('type') is-invalid @enderror" id="inlineFormCustomSelect" name="type" required>
                                    <option value="Sell" @if($prop->type == 'Sell') selected @endif>Jual</option>
                                    <option value="Rent" @if($prop->type == 'Rent') selected @endif>Sewa</option>
                                    <option value="Both" @if($prop->type == 'Both') selected @endif>Jual dan Sewa</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputHorizontal" placeholder="Contoh: Rumah di Pusat Kota Denpasar" autofocus value="{{ $prop -> title }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select id="cbProv" class="form-select mr-sm-2 @error('province') is-invalid @enderror" id="inlineFormCustomSelect" name="province">
                                    @foreach($provs as $prov)
                                    <option value="{{ $prov -> id }}" @if($prop -> village -> district -> regency -> province -> id == $prov -> id) selected @endif>{{ $prov -> name }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('regency') is-invalid @enderror" id="cbKab" name="regency" required id="cbKab">
                                    @foreach($kabs as $k)
                                    <option value="{{ $k -> id }}" @if($prop->village->district->regency->id == $k->id) selected @endif>{{ $k -> name }}</option>
                                    @endforeach
                                </select>
                                @error('regency')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <select id="cbKec" class="form-select mr-sm-2 @error('district') is-invalid @enderror" id="inlineFormCustomSelect" name="district">
                                    @foreach($kecs as $k)
                                    <option value="{{ $k -> id }}" @if($prop->village->district->id == $k->id) selected @endif>{{ $k -> name }}</option>
                                    @endforeach
                                </select>
                                @error('district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Desa</label>
                            <div class="col-sm-10">
                                <select id="cbDesa" class="form-select mr-sm-2 @error('village') is-invalid @enderror" id="inlineFormCustomSelect" name="village">
                                    @foreach($desas as $d)
                                    <option value="{{ $d -> id }}" @if($prop->village->id == $d->id) selected @endif>{{ $d -> name }}</option>
                                    @endforeach
                                </select>
                                @error('village')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Tuliskan alamat lengkap di sini ..." rows="3">{{ $prop -> address }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Harga (IDR)</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="inputHorizontal" placeholder="Rp. 0,-" min="0" step="1" value="{{ $prop -> price }}">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Luas Tanah (m<sup>2</sup>)</label>
                            <div class="col-sm-10">
                                <input type="number" name="land_area" class="form-control @error('land_area') is-invalid @enderror" id="tbLandArea" placeholder="0.0" min="0" value="{{ $prop -> land_area }}">
                                @error('land_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Luas Bangunan (m<sup>2</sup>)</label>
                            <div class="col-sm-10">
                                <input type="number" name="building_area" class="form-control @error('building_area') is-invalid @enderror" id="tbBuildingArea" placeholder="0.0" min="0" value="{{ $prop -> building_area }}">
                                @error('building_area')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                            <div class="col-sm-10">
                                <input type="number" name="bedroom" class="form-control @error('bedroom') is-invalid @enderror" id="tbBedroom" placeholder="0" min="0" step="1" value="{{ $prop -> bedroom }}">
                                @error('bedroom')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Jumlah Kamar Mandi</label>
                            <div class="col-sm-10">
                                <input type="number" name="bathroom" class="form-control @error('bathroom') is-invalid @enderror" id="tbBathroom" placeholder="0" min="0" step="1" value="{{ $prop -> bathroom }}">
                                @error('bathroom')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Jumlah Lantai</label>
                            <div class="col-sm-10">
                                <input type="number" name="story" class="form-control @error('story') is-invalid @enderror" id="tbStory" placeholder="1" min="1" step="1" value="{{ $prop -> story }}">
                                @error('story')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Listrik (Watt)</label>
                            <div class="col-sm-10">
                                <input type="number" name="electricity" class="form-control @error('electricity') is-invalid @enderror" id="tbElectricity" placeholder="0" min="0" step="1" value="{{ $prop -> electricity }}">
                                @error('electricity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Sertifikat</label>
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shm" name="certificate[]" value="SHM" @if(Str::of($prop->certification)->contains('SHM')) checked @endif>
                                    <label class="custom-control-label" for="shm">Surat Hak Milik (SHM)</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="imb" name="certificate[]" value="IMB" @if(Str::of($prop->certification)->contains('IMB')) checked @endif>
                                    <label class="custom-control-label" for="imb">Izin Mendirikan Bangunan (IMB)</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="hgb" name="certificate[]" value="HGB" @if(Str::of($prop->certification)->contains('HGB')) checked @endif>
                                    <label class="custom-control-label" for="hgb">Hak Guna Bangunan (HGB)</label>
                                </div>
                                @error('certificate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea type="textarea" name="desc" class="form-control @error('desc') is-invalid @enderror" id="tbDescription" placeholder="Rumah di pusat Kota Denpasar" rows="7">{{ $prop -> description }}</textarea>
                                @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
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
                        <div class="col-sm-10 mt-2">
                            <div class="input-group flex-nowrap">
                                <div class="custom-file w-100">
                                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photos[]">
                                </div>
                                <button class="btn btn-success btnAddPhoto" type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
        // SELECT2 INITIALISATION
        $('#cbProv').select2({});
        $('#cbKab').select2({});
        $('#cbKec').select2({});
        $('#cbDesa').select2({});

        // COMBO BOX INDONESIA
        $('#cbProv').on('change', function() {
            let prov = $(this).val();
            $('#cbKab').attr('disabled', false);
            $('#cbKec').attr('disabled', true);
            $('#cbDesa').attr('disabled', true);

            $('#cbKab').val(null).trigger("change");
            $('#cbKec').val(null).trigger("change");
            $('#cbDesa').val(null).trigger("change");

            $('#cbKab').select2({
                placeholder: '-- Pilih Kabupaten/Kota --',
                ajax: {
                    url: "{{ url('regency') }}/" + prov,
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name,
                                }
                            })
                        }
                    }
                }
            })
        });

        $('#cbKab').on('change', function() {
            let kab = $(this).val();
            if (kab != null) {
                $('#cbKec').attr('disabled', false);
                $('#cbDesa').attr('disabled', true);
            }

            $('#cbKec').val(null).trigger("change");
            $('#cbDesa').val(null).trigger("change");

            $('#cbKec').select2({
                placeholder: '-- Pilih Kecamatan --',
                ajax: {
                    url: "{{ url('district') }}/" + kab,
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name,
                                }
                            })
                        }
                    }
                }
            })
        });

        $('#cbKec').on('change', function() {
            let kec = $(this).val();
            if (kec != null) {
                $('#cbDesa').attr('disabled', false);
            }

            $('#cbDesa').val(null).trigger("change");

            $('#cbDesa').select2({
                placeholder: '-- Pilih Desa --',
                ajax: {
                    url: "{{ url('village') }}/" + kec,
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name,
                                }
                            })
                        }
                    }
                }
            })
        });

        // ADD PHOTO SLOTS
        $('.btnAddPhoto').click(function() {
            $('#photos').append('<div class="col-sm-2 col-form-label"></div><div class="col-sm-10 mt-2"><div class="input-group flex-nowrap"><div class="custom-file w-100"><input class="form-control" type="file" name="photos[]"></div><button class="btn btn-danger btnDelPhoto" type="button"><i class="fas fa-trash-alt"></i></button></div></div>');
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

        // CATEGORY COMBO BOX ON 1ST PAGE LOAD
        disableTextBox($('#cbCategory').val());

        // CATEGORY COMBO BOX LISTENER
        $('#cbCategory').change(function() {
            disableTextBox($(this).find('option:selected').val())
        });

        function disableTextBox(cat) {
            if (cat == 'Land') {
                $('#tbBuildingArea').prop('disabled', true);
                $('#tbBedroom').prop('disabled', true);
                $('#tbBathroom').prop('disabled', true);
                $('#tbStory').prop('disabled', true);
                $('#tbElectricity').prop('disabled', true);
            } else {
                $('#tbBuildingArea').prop('disabled', false);
                $('#tbBedroom').prop('disabled', false);
                $('#tbBathroom').prop('disabled', false);
                $('#tbStory').prop('disabled', false);
                $('#tbElectricity').prop('disabled', false);
            }
        }
    });
</script>
@endsection