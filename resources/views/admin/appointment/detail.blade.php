@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Janji Temu</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item">Janji Temu</li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Detail Janji Temu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <a href="{{ route('admin.appointment.edit', $app -> id) }}" type="button" class="btn btn-warning btn-rounded"><i class="far fa-edit"></i> Edit</a>
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
                <div class="mt-4 form-horizontal">
                    <div class="form-body">
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <label class="form-control {{ $app->order_status == 'Processed' ? 'bg-warning text-dark' : ($app->order_status == 'Finished' ? 'bg-success text-white' : 'bg-danger text-white') }}">{{ $app->order_status == 'Processed' ? 'Sedang berjalan' : ($app->order_status == 'Finished' ? 'Selesai' : 'Dibatalkan') }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $app -> id }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Pelanggan</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $app -> user -> name }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $app -> date }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Waktu Mulai</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $app -> start }} WITA</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Waktu Selesai</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ $app -> end }} WITA</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Tipe Produk</label>
                            <div class="col-sm-10">
                                <label class="form-control">Agusta {{ $app->product_type == 'Adv' ? 'Advertising' : ($app->product_type == 'Car' ? 'Motor' : 'Properti') }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="inputHorizontal" class="col-sm-2 col-form-label">Jumlah Produk</label>
                            <div class="col-sm-10">
                                <label class="form-control">{{ count(explode(';', $app->product_id)) }} produk</label>
                            </div>
                        </div>
                        <div id="photos" class="form-group mb-3 row">
                            <div for="inputHorizontal" class="col-sm-2 col-form-label">Produk dipesan</div>
                            @foreach(explode(';', $app->product_id) as $key => $id)
                            @if($key != 0)
                            <div for="inputHorizontal" class="col-sm-2 col-form-label"></div>
                            @endif
                            <div class="col-sm-10 mb-2">
                                @php
                                $product = $products->where('id', $id)->first();
                                $photo = $photos->where($path, $id)->first();
                                @endphp
                                <div class="form-control fw-bolder">
                                    @if ($app->product_type == "Adv")
                                    {{ $product -> name }}
                                    @else
                                    {{ $product -> title }}
                                    @endif
                                </div>
                                <div class="input-group flex-nowrap preview border rounded">
                                    <div class="custom-file w-100">
                                        <img id="photoPreview" class="img-fluid mx-auto d-block" src="{{ asset('storage/' . $photo -> url) }}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection