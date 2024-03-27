@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Janji Temu: Sedang Berjalan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Janji Temu</li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Sedang Berjalan</li>
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
                <div class="table-responsive">
                    <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apps as $index => $app)
                            <tr>
                                <td>{{ $index + 1 }}.</td>
                                <td class="text-center">{{ $app -> id }}</td>
                                <td>{{ $app -> user -> name }}</td>
                                <td>{{ $app -> date }}</td>
                                <td>{{ $app->start }} - {{ $app -> end }} WITA</td>
                                <td>
                                    <a href="{{ route('admin.appointment.detail', $app -> id) }}" type="button" class="btn btn-success btn-rounded"><i class="far fa-folder-open"></i> Detail</a>
                                    <a href="{{ route('admin.appointment.edit', $app -> id) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit Status</a>
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
@endsection