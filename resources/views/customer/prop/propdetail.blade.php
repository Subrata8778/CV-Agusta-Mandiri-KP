@extends('layouts.home')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $prop -> title }}</h2>
                <ol>
                    <li><a href="{{ route('customer.home') }}">Halaman Utama</a></li>
                    <li><a href="{{ route('customer.property') }}">Agusta Properti</a></li>
                    <li>Detail Produk</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            @auth
            <div class="row">
                <div id="notifSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil - </strong>Produk berhasil ditambahkan ke keranjangmu
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div id="notifFailed" class="alert alert-danger alert-dismissible fade show" role="alert">
                </div>
            </div>
            @endauth
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            @foreach ($photos as $photo)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $photo->url) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="d-grid gap-2 mb-3">
                        @auth
                        <button id="btnAddCart" class="add-cart" data-prop="{{ $prop }}" onclick="addToCart(this)">+ Keranjang</button>
                        @else
                        <a id="btnAddCart" class="btn btn-secondary add-cart" href="{{ route('login') }}">Login untuk tambah ke keranjang</a>
                        @endauth
                    </div>
                    <div class="portfolio-info">
                        <h3 class="rupiah">{{ $prop->price }}</h3>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Judul</small></span>
                            <span class="col-sm-7">{{ $prop->title }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Kategori</small></span>
                            <span class="col-sm-7 ">{{ $prop->category == 'House' ? 'Rumah' : ($prop->category == 'Land' ? 'Tanah' : 'Villa') }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Tipe</small></span>
                            <span class="col-sm-7">{{ $prop->type == 'Sell' ? 'Jual' : ($prop->type == 'Rent' ? 'Sewa' : 'Jual dan Sewa') }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Alamat</small></span>
                            <span class="col-sm-7 ">{{ $prop->address }}, {{ $prop->village->name }},
                                {{ $prop->village->district->name }},
                                {{ $prop->village->district->regency->name }},
                                {{ $prop->village->district->regency->province->name }}</span>
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Link Google Maps</small></span>
                            @if ($prop->maps != null)
                            <a target="_blank" href="{{ $prop->maps }}" class="col-sm-7">Lihat di Google Maps</a>
                            @else
                            <span class="col-sm-7 text-muted">Belum ada data</span>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Luas Tanah</small></span>
                            <span class="col-sm-7 ">{{ $prop->land_area }} m<sup>2</sup></span>
                        </div>
                        @if ($prop->category != 'Land')
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Luas Bangunan</small></span>
                            @if ($prop->building_area != null)
                            <span class="col-sm-7 ">{{ $prop->building_area }} m<sup>2</sup></span>
                            @else
                            <span class="col-sm-7 text-muted">Belum ada data</span>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Jumlah Kamar</small></span>
                            @if ($prop->bedroom != null)
                            <span class="col-sm-7 ">{{ $prop->bedroom }}</span>
                            @else
                            <span class="col-sm-7 text-muted">Belum ada data</span>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Jumlah Kamar Mandi</small></span>
                            @if ($prop->bathroom != null)
                            <span class="col-sm-7 ">{{ $prop->bathroom }}</span>
                            @else
                            <span class="col-sm-7 text-muted">Belum ada data</span>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Jumlah Lantai</small></span>
                            @if ($prop->story != null)
                            <span class="col-sm-7 ">{{ $prop->story }}</span>
                            @else
                            <span class="col-sm-7 text-muted">Belum ada data</span>
                            @endif
                        </div>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Listrik</small></span>
                            @if ($prop->electricity != null)
                            <span class="col-sm-7 ">{{ $prop->electricity }} Watt</span>
                            @else
                            <span class="col-sm-7 text-muted">Belum ada data</span>
                            @endif
                        </div>
                        @endif
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Surat-surat</small></span>
                            <span class="col-sm-7 ">{{ $prop->certification }}</span>
                        </div>
                    </div>
                    <div class="portfolio-description">
                        <h2>Deskripsi</h2>
                        <p>
                        <pre style="font-family: 'Open Sans'; font-size: 1rem;">{{ $prop->description }}</pre>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
@endsection
@section('jquery')
<script>
    function addToCart(button) {
        var prop = $(button).data("prop");
        var user = {{ auth()->user() ? auth()->user()->id : null }};

        $.ajax({
            type: "POST",
            url: "{{ route('customer.cart.property.addToCart') }}",
            data: {
                "_token": "<?php echo csrf_token(); ?>",
                "user_id": user,
                "prop_product_id": prop.id,
            },
            success: function(data) {
                if (data.status == "Success") {
                    $('#notifSuccess').show();
                    $('#notifFailed').hide();
                }
            },
            error: function(xhr, status, error) {
                $('#notifSuccess').hide();
                $('#notifFailed').html("<strong>Gagal - </strong>" + xhr.responseJSON.message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                );
                $('#notifFailed').show();
            }
        })
    }

    $(document).ready(function() {
        $('#notifSuccess').hide();
        $('#notifFailed').hide();
    });
</script>
@endsection