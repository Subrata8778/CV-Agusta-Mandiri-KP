@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Status Janji Temu</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="text-muted">Beranda</a></li>
                        <li class="breadcrumb-item">Janji Temu</li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Status Janji Temu</li>
                    </ol>
                </nav>
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
                <form class="mt-3 form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.appointment.update') }}">
                    @csrf
                    <div class="mt-4 form-horizontal">
                        <div class="form-body">
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="order_status" id="order_status">
                                        <option value="Processed" {{ $app->order_status == 'Processed' ? 'selected' : '' }}>Sedang berjalan</option>
                                        <option value="Finished" {{ $app->order_status == 'Finished' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Cancelled" {{ $app->order_status == 'Cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="inputHorizontal" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="order_id" readonly value="{{ $app -> id }}">
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
                            <div class="form-actions">
                                <div class="text-end">
                                    <a href="{{ URL::previous() }}" type="reset" class="btn btn-outline-danger btn-rounded">Batal</a>
                                    <button type="submit" class="btn btn-primary btn-rounded">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection