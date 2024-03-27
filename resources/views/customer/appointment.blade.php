@extends('layouts.home')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2></h2>
                <ol>
                    <li><a href="{{ route('customer.home') }}">Halaman Utama</a></li>
                    <li>Janji Temu</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Janji Temu</h2>
                <p>Pertemuan berlokasi di Agusta Motor - Jl. Tambaksari No.27, Kapal, Kecamatan Mengwi, Kabupaten Badung, Bali 80351</p>
                <a target="_blank" href="https://maps.app.goo.gl/N3AtvPwy1vszbbGe7">Lihat di Google Maps</a>
            </div>

            <div class="row flex-lg-row">
                <div class="col">
                    <div class="row">
                        <div id="notifSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil - </strong>Janji temu berhasil dibatalkan
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div id="notifFailed" class="alert alert-danger alert-dismissible fade show" role="alert">
                        </div>
                    </div>
                    @foreach ($apps as $index => $a)
                    <div id="app_{{ $a->id }}" class="card w-100 border-0 shadow mb-3 cardt">
                        <div class="card-header text-white fw-bolder {{ $a->product_type == 'Adv' ? 'bg-success' : ($a->product_type == 'Car' ? 'bg-danger' : 'bg-info') }}">Agusta {{ $a->product_type == 'Adv' ? 'Advertising' : ($a->product_type == 'Car' ? 'Motor' : 'Properti') }}</div>
                        <div class="card-body">
                            <p class="card-text row">
                                <span class="col-lg-2 text-muted"><small>Tanggal</small></span>
                                <span class="col-lg-10">{{ $a -> date }}</span>
                                <br>
                                <span class="col-lg-2 text-muted"><small>Jam</small></span>
                                <span class="col-lg-10">{{ $a -> start }} - {{ $a -> end }} WITA</span>
                                <br>
                                <span class="col-lg-2 text-muted"><small>Total produk</small></span>
                                <span class="col-lg-10">{{ count(explode(';', $a->product_id)) }} produk</span>
                                <br>
                                <span class="col-lg-2 text-muted"><small>Produk dipesan</small></span>
                                <span class="col-lg-10">
                                    @if ($a->product_type == 'Adv')
                                    @foreach ($adv as $advItem)
                                    @if (in_array($advItem->id, explode(';', $a->product_id)))
                                    {{ $advItem->name }},
                                    @endif
                                    @endforeach
                                    @elseif ($a->product_type == 'Car')
                                    @foreach ($car as $carItem)
                                    @if (in_array($carItem->id, explode(';', $a->product_id)))
                                    [{{ $carItem->year }}] {{ $carItem->title }},
                                    @endif
                                    @endforeach
                                    @elseif ($a->product_type == 'Prop')
                                    @foreach ($prop as $propItem)
                                    @if (in_array($propItem->id, explode(';', $a->product_id)))
                                    {{ $propItem->title }},
                                    @endif
                                    @endforeach
                                    @endif
                                </span>
                            </p>
                            <button type="button" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#cancelModal" data-app="{{ json_encode($apps) }}" onclick="btnCancel(this, {{ $index }})">
                                <i class="fa fa-times" aria-hidden="true"></i> Batalkan
                            </button>
                        </div>
                    </div>
                    @endforeach
                    <div id="txtEmpty" class="card mb-3 bg-transparent border-0">
                        <div class="card-body text-muted fs-4">Anda belum membuat janji temu</div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

<div class="modal fade modal-dialog modal-dialog-centered" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Batalkan Janji Temu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="cancel(this)">Batalkan</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('jquery')
<script>
    $(document).ready(function() {
        // Hide div notifikasi
        $('#notifSuccess').hide();
        $('#notifFailed').hide();

        totalAppointment();
        $('#cancelModal').modal('hide');
    });

    function totalAppointment() {
        var total = $('.cardt').length;
        $('#txtTotal').html(total + " produk");
        if (total <= 0) {
            $('#btnMake').prop('disabled', true)
            $('#txtMake').show();
            $('#txtEmpty').show();
        } else {
            $('#btnMake').prop('disabled', false)
            $('#txtMake').hide();
            $('#txtEmpty').hide();
        }
    }

    function btnCancel(button, index) {
        var data = $(button).data('app');

        $('#cancelModal .modal-body p').html('Apakah Anda yakin ingin membatalkan janji temu pada <b>' + data[index].date + '</b> pukul <b>' + data[index].start + ' - ' + data[index].end + ' WITA</b>?');

        $('#cancelModal .modal-footer button').attr('data-id', data[index].id);
    }

    function cancel(button) {
        var id = $(button).data('id');

        $.ajax({
            url: '/appointment/' + id + '/cancel',
            type: 'GET',
            success: function(data) {
                if (data.status == "Success") {
                    $('#notifSuccess').show();
                    $('#notifFailed').hide();

                    $('#cancelModal').modal('hide');
                    $('#app_' + id).remove();
                }
            },
            error: function(error) {
                $('#notifSuccess').hide();
                $('#notifFailed').html("<strong>Gagal - </strong>" + xhr.responseJSON.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
                $('#notifFailed').show();
            }
        });

        totalAppointment();
    }
</script>
@endsection