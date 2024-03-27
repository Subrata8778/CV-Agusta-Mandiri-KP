@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Laporan Performa Pelanggan</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item"><a>Performa Pelanggan</a>
                        </li>
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
                <h4 class="card-title">Performa Pelanggan CV Agusta Mandiri</h4>
                <h6 class="card-subtitle">Pada laporan berikut tidak memperhitungkan janji temu yang dibatalkan, baik oleh pihak pelanggan maupun pihak penjual.</h6>
                <div class="table-responsive">
                    <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Pelanggan</th>
                                <th>Rata-rata Janji Temu</th>
                                <th>Total Janji Temu</th>
                                <th>Bergabung Sejak</th>
                                <th>Janji Temu Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr as $index => $a)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $a['u_id'] }}</td>
                                <td>{{ $a['user_name'] }}</td>
                                <td>{{ number_format($a['average'], 2, '.', ','); }}</td>
                                <td>{{ $a['total'] }}</td>
                                <td>{{ $a['user_register'] }} ({{ $a['since'] }} hari lalu)</td>
                                <td>{{ $a['last'] }}</td>
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