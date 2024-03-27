@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Portofolio: {{ $port -> title }}</h4>
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
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <a href="{{ route('admin.portfolio.edit', $port) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
                <button type="button" class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#delModal" data-port="{{ json_encode($port) }}" onclick="deleteSelected(this)"><i class="far fa-trash-alt"></i> Hapus</button>
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
                    <div class="col-lg-6 image-container">
                        <img src="{{ asset('storage/' . $port -> photo) }}" alt="{{ $port -> title }}" class="img-fluid mh-100">
                    </div>
                </div>
                <div class="mt-4 form-horizontal">
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $port->category == 'Adv' ? 'Agusta Advertising' : ($port->category == 'Car' ? 'Agusta Motor' : 'Agusta Properti') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $port -> title }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="inputHorizontal" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control">{{ $port -> description }}</textarea>
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
        var data = $(button).data('port');

        $('#delModal .modal-body p').html('Apakah Anda yakin ingin menghapus <b>' + data.title + '</b> dari daftar produk portofolio?');

        $('#delModal form').attr('action', '/admin/portfolio/' + data.id);
    }
</script>
@endsection