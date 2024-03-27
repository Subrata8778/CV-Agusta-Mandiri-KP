@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Produk Agusta Properti</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}" class="text-muted">Agusta Properti</a></li>
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
                <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.property.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select mr-sm-2 @error('category') is-invalid @enderror" id="cbCategory" name="category">
                                    <option value="House">Rumah</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Land">Tanah</option>
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
                                <select class="form-select mr-sm-2 @error('type') is-invalid @enderror" id="cbType" name="type">
                                    <option value="Sell">Jual</option>
                                    <option value="Rent">Sewa</option>
                                    <option value="Both">Jual dan Sewa</option>
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
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="tbTitle" placeholder="Contoh: Rumah di Pusat Kota Denpasar" autofocus value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>"
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select id="cbProv" class="form-select mr-sm-2 @error('province') is-invalid @enderror" id="inlineFormCustomSelect" name="province">
                                    <option selected disabled hidden>-- Pilih Provinsi --</option>
                                    @foreach($provs as $prov)
                                    <option value="{{ $prov -> id }}">{{ $prov -> name }}</option>
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
                                <select id="cbKab" class="form-select mr-sm-2 @error('regency') is-invalid @enderror" id="inlineFormCustomSelect" name="regency"></select>
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
                                <select id="cbKec" class="form-select mr-sm-2 @error('district') is-invalid @enderror" id="inlineFormCustomSelect" name="district"></select>
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
                                <select id="cbDesa" class="form-select mr-sm-2 @error('village') is-invalid @enderror" id="inlineFormCustomSelect" name="village"></select>
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
                                <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Tuliskan alamat lengkap di sini ..." rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Link Google Maps (opsional)</label>
                            <div class="col-sm-10">
                                <input type="text" name="maps" class="form-control @error('maps') is-invalid @enderror" placeholder="https://maps.app.goo.gl/LinkTitikLokasiProperti" value="{{ old('maps') }}">
                                @error('maps')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Harga (IDR)</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="tbPrice" placeholder="Rp. 0,-" min="0" step="1" value="{{ old('price') }}">
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
                                <input type="number" name="land_area" class="form-control @error('land_area') is-invalid @enderror" id="tbLandArea" placeholder="0.0" min="0" value="{{ old('land_area') }}">
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
                                <input type="number" name="building_area" class="form-control @error('building_area') is-invalid @enderror" id="tbBuildingArea" placeholder="0.0" min="0" value="{{ old('building_area') }}">
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
                                <input type="number" name="bedroom" class="form-control @error('bedroom') is-invalid @enderror" id="tbBedroom" placeholder="0" min="0" step="1" value="{{ old('bedroom') }}">
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
                                <input type="number" name="bathroom" class="form-control @error('bathroom') is-invalid @enderror" id="tbBathroom" placeholder="0" min="0" step="1" value="{{ old('bathroom') }}">
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
                                <input type="number" name="story" class="form-control @error('story') is-invalid @enderror" id="tbStory" placeholder="1" min="1" step="1" value="{{ old('story') }}">
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
                                <input type="number" name="electricity" class="form-control @error('electricity') is-invalid @enderror" id="tbElectricity" placeholder="0" min="0" step="1" value="{{ old('electricity') }}">
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
                                    <input type="checkbox" class="custom-control-input" id="shm" name="certificate[]" value="SHM" @if(is_array(old('certificate')) && in_array('SHM', old('certificate'))) checked @endif>
                                    <label class="custom-control-label" for="shm">Surat Hak Milik (SHM)</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="imb" name="certificate[]" value="IMB" @if(is_array(old('certificate')) && in_array('IMB', old('certificate'))) checked @endif>
                                    <label class="custom-control-label" for="imb">Izin Mendirikan Bangunan (IMB)</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="hgb" name="certificate[]" value="HGB" @if(is_array(old('certificate')) && in_array('HGB', old('certificate'))) checked @endif>
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
                                <textarea type="textarea" name="desc" class="form-control @error('desc') is-invalid @enderror" id="tbDescription" placeholder="Rumah di pusat Kota Denpasar" rows="7">{{ old('desc') }}</textarea>
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
                                        <input class="form-control @error('photos') is-invalid @enderror" type="file" name="photos[]" required>
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
        // SELECT2 INITIALISATION
        $('#cbKab').attr('disabled', true);
        $('#cbKec').attr('disabled', true);
        $('#cbDesa').attr('disabled', true);

        $('#cbProv').select2({});
        $('#cbKab').select2({
            placeholder: "-- Pilih Provinsi terlebih dahulu --"
        });
        $('#cbKec').select2({
            placeholder: "-- Pilih Kabupaten/Kota terlebih dahulu --"
        });
        $('#cbDesa').select2({
            placeholder: "-- Pilih Kecamatan terlebih dahulu --"
        });

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
                placeholder: '-- Pilih Kabupaten --',
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
            $(this).parent().remove();
            $(this).parent().prev().remove();
        });

        // CATEGORY COMBO BOX LISTENER
        $('#cbCategory').change(function() {
            var selected = $(this).find('option:selected').val();

            if (selected == 'Land') {
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
        });
    });
</script>
@endsection