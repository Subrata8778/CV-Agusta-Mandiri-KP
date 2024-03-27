@extends('layouts.admin')

@section('css')
<!-- Custom CSS -->
<link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
<!-- This Page CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin/extra-libs/prism/prism.css') }}">

@endsection

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Properti: {{ $prop -> title }}</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}" class="text-muted">Agusta Properti</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Detail Produk</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <a href="{{ route('admin.property.edit', $prop) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
                <button type="button" class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#delModal" data-prop="{{ json_encode($prop) }}" onclick="deleteSelected(this)"><i class="far fa-trash-alt"></i> Hapus</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div id="carouselPhotos" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($photos as $key => $photo)
                                <li data-bs-target="#carouselPhotos" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($photos as $key => $photo)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img class="d-block w-100 img-fluid" src="{{ asset('storage/' . $photo->url) }}">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPhotos" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselPhotos" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-4 form-horizontal">
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <label class="form-control {{ $prop -> status == 'Available' ? 'bg-success' : 'bg-danger' }}" style="color: #fff;">{{ $prop -> status == 'Available' ? 'Tersedia' : 'Terjual/Tersewa' }}</label>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <label class="form-control">{{ $prop -> category == 'House' ? 'Rumah' : ( $prop -> category == 'Land' ? 'Tanah' : 'Villa') }}</label>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10">
                            <label class="form-control">{{ $prop -> type == 'Sell' ? 'Jual' : ( $prop -> type == 'Rent' ? 'Sewa' : 'Jual dan Sewa') }}</label>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $prop -> title }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $prop -> address }}, {{ $prop -> village -> name }}, {{ $prop -> village -> district -> name }}, {{ $prop -> village -> district -> regency -> name }}, {{ $prop -> village -> district -> regency -> province -> name }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Link Google Maps</label>
                            <div class="col-sm-10">
                                @if($prop -> maps != null)
                                <a target="_blank" href="{{ $prop -> maps }}" class="form-control link-txt">Lihat di Google Maps <i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
                                @else
                                <label class="form-control text-muted">Belum ada data</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <label class="form-control">Rp. {{ $prop -> price }}</label>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Luas Tanah</label>
                        <div class="col-sm-10">
                            <label class="form-control">{{ $prop -> land_area }} m<sup>2</sup></label>
                        </div>
                    </div>
                    @if( $prop -> category != 'Land' )
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Luas Bangunan</label>
                        <div class="col-sm-10">
                            @if($prop->building_area != null)
                            <label class="form-control">{{ $prop -> building_area }} m<sup>2</sup></label>
                            @else
                            <label class="form-control text-muted">Belum ada data</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                        <div class="col-sm-10">
                            @if($prop->bedroom != null)
                            <label class="form-control">{{ $prop -> bedroom }}</label>
                            @else
                            <label class="form-control text-muted">Belum ada data</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Jumlah Kamar Mandi</label>
                        <div class="col-sm-10">
                            @if($prop->bathroom != null)
                            <label class="form-control">{{ $prop -> bathroom }}</label>
                            @else
                            <label class="form-control text-muted">Belum ada data</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Jumlah Lantai</label>
                        <div class="col-sm-10">
                            @if($prop->story != null)
                            <label class="form-control">{{ $prop -> story }}</label>
                            @else
                            <label class="form-control text-muted">Belum ada data</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Listrik</label>
                        <div class="col-sm-10">
                            @if($prop->electricity != null)
                            <label class="form-control">{{ $prop -> electricity }} Watt</label>
                            @else
                            <label class="form-control text-muted">Belum ada data</label>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Sertifikasi</label>
                        <div class="col-sm-10">
                            <label class="form-control">{{ $prop -> certification }}</label>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <label class="form-control">
                                <pre style="font-family: 'Rubik'; font-size: 1rem;">{{ $prop -> description }}</pre>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Danger Header Modal -->
<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Hapus Produk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btnDel">Hapus</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('jquery')
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('admin/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('admin/extra-libs/sparkline/sparkline.js') }}"></script>
<!-- This Page JS -->
<script src="{{ asset('admin/extra-libs/prism/prism.js') }}"></script>

<script>
    function deleteSelected(button) {
        var data = $(button).data('prop');

        $('#delModal .modal-body p').html('Apakah Anda yakin ingin menghapus <b>' + data.title + '</b> dari daftar produk Agusta Properti?');

        $('#delModal form').attr('action', '/admin/property/' + data.id);
    }
</script>
@endsection