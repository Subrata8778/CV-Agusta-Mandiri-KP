@extends('layouts.admin')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Laporan Produk Paling Diminati</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item"><a>Produk Terlaris</a>
                        </li>
                        <li class="breadcrumb-item"><a>Agusta Motor</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="mt-3 form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label">Dari tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputHariAwal" min="<?php echo date("2014-01-01"); ?>" max="<?php echo date("Y-m-d"); ?>" onkeydown="return false">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="mt-3 form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label">Sampai tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputHariAkhir" min="<?php echo date("2023-01-01"); ?>" max="<?php echo date("Y-m-d"); ?>" onkeydown="return false">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- multi-column ordering -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Agusta Motor</h4>
                <h6 class="card-subtitle">Berdasarkan produk Agusta Motor yang paling banyak dipesan saat membuat janji temu.</h6>
                <div class="table-responsive">
                    <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Merk</th>
                                <th>Kategori</th>
                                <th>Produk</th>
                                <th>Tahun</th>
                                <th>Harga</th>
                                <th>Jumlah Minat</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<script>
    document.getElementById('inputHariAwal').valueAsDate = new Date("2014-01-01");
    document.getElementById('inputHariAkhir').valueAsDate = new Date();

    function getData(awal, akhir) {
        $.ajax({
            type: 'POST',
            url: '{{ route("admin.report.product.car") }}',
            data: {
                "_token": "{{ csrf_token() }}",
                "awal": awal,
                "akhir": akhir
            },
            success: function(data) {
                var tableBody = $('#multi_col_order tbody');
                tableBody.empty();

                table = $('#multi_col_order').DataTable();
                table.clear().draw();

                if (data.products.length > 0) {
                    $.each(data.products, function(index, product) {
                        var row = '<tr><td>' + (index + 1) +
                            '</td><td>' + product.id +
                            '</td><td>' + product.brand +
                            '</td><td>' + product.category +
                            '</td><td>' + product.title +
                            '</td><td>' + product.year +
                            '</td><td class="rupiah">' + product.price +
                            '</td><td>' + product.quantity +
                            '</td></tr>';
                        table.row.add($(row)).draw(false);
                    });
                } else {
                    tableBody.html('<tr><td colspan="8" class="text-center">Tidak ada data tercatat pada tanggal tersebut</td></tr>');
                }

                $('.rupiah').each(function() {
                    var num = $(this).text();
                    $(this).text(rupiah(num));
                });
            }
        });
    }

    $(document).ready(function() {
        getData($('#inputHariAwal').val(), $('#inputHariAkhir').val());

        $('#inputHariAwal').on('change', function() {
            var awal = this.value;
            var akhir = $('#inputHariAkhir').val();

            if (akhir !== '' && new Date(akhir) < new Date(awal)) {
                alert('Tanggal awal harus sebelum tanggal akhir');
            } else {
                getData(awal, akhir);
            }
        });

        $('#inputHariAkhir').on('change', function() {
            var awal = $('#inputHariAwal').val();
            var akhir = this.value;

            if (awal !== '' && new Date(akhir) < new Date(awal)) {
                alert('Tanggal akhir harus setelah tanggal awal');
            } else {
                getData(awal, akhir);
            }
        });
    });
</script>
@endsection