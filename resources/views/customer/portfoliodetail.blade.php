@extends('layouts.home')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $porto -> title }}</h2>
                <ol>
                    <li><a href="{{ route('customer.home') }}">Home</a></li>
                    <li>Portfolio</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $porto -> photo) }}" alt="{{ $porto -> title }}">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Informasi Portofolio</h3>
                        <div class="row mb-2">
                            <span class="col-sm-5 text-muted"><small>Kategori</small></span>
                            <span class="col-sm-7">{{ $porto->category == 'Adv' ? 'Agusta Advertising' : ($porto->category == 'Car' ? 'Agusta Motor' : 'Agusta Properti') }}</span>
                        </div>
                    </div>
                    <div class="portfolio-description">
                        <h2>Deskripsi</h2>
                        <p>
                            {{ $porto -> description }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection