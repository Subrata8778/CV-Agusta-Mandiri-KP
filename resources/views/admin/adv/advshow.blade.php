@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Agusta Advertising: {{ $adv -> name }}</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.advertising.index') }}" class="text-muted">Agusta Advertising</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Produk</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <a href="{{ route('admin.advertising.edit', $adv) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
                <button type="button" class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#delModal" data-adv="{{ json_encode($adv) }}" onclick="deleteSelected(this)"><i class="far fa-trash-alt"></i> Hapus</button>
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
                                    <img class="d-block w-100" src="{{ asset('storage/' . $photo->url) }}">
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
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $adv -> name }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <label class="form-control">{{ $adv->category == 'IO' ? 'Indoor & Outdoor' : $adv->category }}</label>
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
<script>
    function deleteSelected(button) {
        var data = $(button).data('adv');

        $('#delModal .modal-body p').html('Apakah Anda yakin ingin menghapus <b>' + data.name + '</b> dari daftar produk advertising?');

        $('#delModal form').attr('action', '/admin/advertising/' + data.id);
    }
</script>
@endsection