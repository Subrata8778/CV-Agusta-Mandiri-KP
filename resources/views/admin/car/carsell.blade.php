@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Agusta Motor: Produk</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Agusta Motor</li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Produk</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <a href="{{ route('admin.car.sell.create') }}" class="btn btn-primary btn-rounded"><i class="fas fa-plus"></i> Tambah Produk</a>
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
                <div class="table-responsive">
                    <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Tahun</th>
                                <th>Merk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $index => $car)
                            <tr>
                                <td>{{ $index + 1 }}.</td>
                                <td class="text-center">{{ $car -> id }}</td>
                                <td>{{ $car -> title }}</td>
                                <td>{{ $car -> year }}</td>
                                <td>{{ $car -> car_brand -> brand }}</td>
                                <td>{{ $car -> car_category -> category }}</td>
                                <td class="rupiah">{{ $car -> price }}</td>
                                <td class="{{ $car -> sell_status == 'Available' ? 'bg-success' : 'bg-danger' }}" style="color: #fff;">{{ $car -> sell_status == 'Available' ? 'Tersedia' : 'Terjual' }}</td>
                                <td>
                                    <a href="{{ route('admin.car.sell.show', $car) }}" type="button" class="btn btn-success btn-rounded"><i class="far fa-folder-open"></i> Detail</a>
                                    <a href="{{ route('admin.car.sell.edit', $car) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
                                    <button type="button" class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#delModal" data-car="{{ json_encode($car) }}" onclick="deleteSelected(this)"><i class="far fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        var data = $(button).data('car');

        $('#delModal .modal-body p').html('Apakah Anda yakin ingin menghapus <b>' + data.title + '</b> dari daftar produk Agusta Motor?');

        $('#delModal form').attr('action', '/admin/car/sell/' + data.id);
    }
</script>
@endsection