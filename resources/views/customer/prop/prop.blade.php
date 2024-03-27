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
                        <li>Agusta Properti</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section id="pricing" class="pricing section-bg inner-page">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Agusta Properti</h2>
                    <p>Berikut berbagai pilihan properti yang tersedia untuk Anda</p>
                </div>
                <div class="row">
                    <div class="col-md-2 portfolio">
                        <div>
                            <p class="mb-3"><strong>Filter</strong></p>
                            <div>
                                <p class="mb-1"><strong>Tipe</strong></p>
                                <div class="row">
                                    <div class="col-lg-12 d-flex">
                                        <ul id="filter-year">
                                            <li data-filter="*" class="filter-active">Semua</li>
                                            <li data-filter=".filter-jual">Jual</li>
                                            <li data-filter=".filter-sewa">Sewa</li>
                                            <li data-filter=".filter-both">Jual dan Sewa</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="mb-1"><strong>Harga</strong></p>
                                <div class="row">
                                    <div class="col-lg-12 d-flex">
                                        <ul id="filter-price">
                                            <li data-filter="*" class="filter-active">Semua</li>
                                            <li data-filter=".filter-price-1">
                                                < Rp. 1 miliar</li>
                                            <li data-filter=".filter-price-2">Rp. 1 - 2 miliar</li>
                                            <li data-filter=".filter-price-3">Rp. 2 - 3 miliar</li>
                                            <li data-filter=".filter-price-4">> Rp. 3 miliar</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p class="mb-1"><strong>Kategori</strong></p>
                                <div class="form-check">
                                    <input class="form-check-input filter-category" type="checkbox" value="House"
                                        data-category="Rumah" id="Rumah">
                                    <label class="form-check-label" for="Rumah">
                                        Rumah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filter-category" type="checkbox" value="Villa"
                                        data-category="Villa" id="Villa">
                                    <label class="form-check-label" for="Villa">
                                        Villa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filter-category" type="checkbox" value="Land"
                                        data-category="Tanah" id="Tanah">
                                    <label class="form-check-label" for="Tanah">
                                        Tanah
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p class="mb-1"><strong>Sertifikat</strong></p>
                                <div class="form-check">
                                    <input class="form-check-input filter-certificate" type="checkbox" value="SHM"
                                        data-certificate="SHM" id="SHM">
                                    <label class="form-check-label" for="SHM">
                                        Surat Hak Milik (SHM)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filter-certificate" type="checkbox" value="IMB"
                                        data-certificate="IMB" id="IMB">
                                    <label class="form-check-label" for="IMB">
                                        Izin Mendirikan Bangunan (IMB)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input filter-certificate" type="checkbox" value="HGB"
                                        data-certificate="HGB" id="HGB">
                                    <label class="form-check-label" for="HGB">
                                        Hak Guna Bangunan (HGB)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @php
                                $delay = 0;
                            @endphp

                            @foreach ($props as $prop)
                                <a href="{{ route('customer.property.detail', $prop) }}" class="col data-aos="
                                    data-aos="fade-up" data-aos-delay="{{ $delay }}"
                                    data-category="{{ $prop->category }}" data-certificate="{{ $prop->certification }}"
                                    data-type="{{ $prop->type }}">
                                    <div class=" card h-100 border-0 shadow">
                                        @foreach ($photos as $photo)
                                            @if ($prop->id == $photo->prop_product_id)
                                                <img src="{{ asset('storage/' . $photo->url) }}" class="card-img-top"
                                                    alt="{{ $prop->title }}">
                                            @break
                                        @endif
                                    @endforeach
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $prop->title }}</h5>
                                        <br>
                                        <p class="card-text text-primary h4 rupiah fw-bolder float-end">{{ $prop->price }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @php
                                $delay += 100;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('jquery')
<script>
    $(document).ready(function() {
        function filterProps() {
            var selectedTipe = $('#filter-year li.filter-active').attr('data-filter');
            var selectedPriceFilter = $('#filter-price li.filter-active').attr('data-filter');

            var tipeConditions = {
                '*': true,
                '.filter-jual': function(propTipe) {
                    return propTipe == "Sell" || propTipe == "Both";
                },
                '.filter-sewa': function(propTipe) {
                    return propTipe == "Rent" || propTipe == "Both";
                },
                '.filter-both': function(propTipe) {
                    return propTipe == "Both";
                },
            };

            var priceConditions = {
                '*': true,
                '.filter-price-1': function(propPrice) {
                    return propPrice < 1000000000;
                },
                '.filter-price-2': function(propPrice) {
                    return propPrice >= 1000000000 && propPrice <= 2000000000;
                },
                '.filter-price-3': function(propPrice) {
                    return propPrice > 2000000000 && propPrice <= 3000000000;
                },
                '.filter-price-4': function(propPrice) {
                    return propPrice > 3000000000;
                },
            };

            var selectedCategories = $('.filter-category:checked').map(function() {
                return $(this).val();
            }).get();
            console.log('Selected Categories:', selectedCategories);

            var selectedCertificates = $('.filter-certificate:checked').map(function() {
                return $(this).val();
            }).get();
            console.log('Selected Certificate:', selectedCertificates);

            $('.col').each(function() {
                var propTipe = $(this).data('type');;
                var propPrice = parseFloat($(this).find('.card-text strong').text().replace('Rp. ', '')
                    .replace(',', ''));

                var category = $(this).data('category');
                var certificate = $(this).data('certificate');

                var tipeCondition = tipeConditions[selectedTipe] === true || (tipeConditions[
                    selectedTipe] && tipeConditions[selectedTipe](propTipe));
                var priceCondition = priceConditions[selectedPriceFilter] === true || (priceConditions[
                    selectedPriceFilter] && priceConditions[selectedPriceFilter](propPrice));
                var categoryCondition = selectedCategories.length === 0 || selectedCategories.includes(
                    category);
                var certificateCondition = selectedCertificates.length === 0 || selectedCertificates
                    .some(cert => certificate.includes(cert.trim()));

                console.log("cate", categoryCondition);
                console.log("certificate", certificateCondition);

                if (tipeCondition && priceCondition && categoryCondition && certificateCondition) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('#filter-year li').on('click', function() {
            $('#filter-year li').removeClass('filter-active');
            $(this).addClass('filter-active');
            filterProps();
        });

        $('#filter-price li').on('click', function() {
            $('#filter-price li').removeClass('filter-active');
            $(this).addClass('filter-active');
            filterProps();
        });

        $('.filter-category').on('change', function() {
            filterProps();
        });

        $('.filter-certificate').on('change', function() {
            filterProps();
        });

        filterProps(); // Initial filter on page load
    });
</script>
@endsection
