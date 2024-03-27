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
                    <li>Agusta Advertising</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing portfolio section-bg inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Agusta Advertising</h2>
                <p id="subAdv">Berikut berbagai jenis periklanan yang dapat Anda pesan dari kami</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-Indoor">Indoor</li>
                        <li data-filter=".filter-Outdoor">Outdoor</li>
                        <li data-filter=".filter-IO">Indoor & Outdoor</li>
                    </ul>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 card-container">
                @foreach($advs as $adv)
                <a href="{{ route('customer.advertising.detail', $adv) }}" class="col card-item filter-{{ $adv -> category }}">
                    <div class=" card h-100 shadow border-0">
                        @foreach($photos as $photo)
                        @if ($adv -> id == $photo -> adv_product_id)
                        <img src="{{ asset('storage/' . $photo -> url) }}" class="card-img-top" alt="{{ $adv -> name }}">
                        @break
                        @endif
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $adv -> name }}</h5>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </section>
</main>
@endsection

@section('jquery')
<script>
    $(document).ready(function() {
        const select = (el, all = false) => {
            el = el.trim()
            if (all) {
                return [...document.querySelectorAll(el)]
            } else {
                return document.querySelector(el)
            }
        }

        const on = (type, el, listener, all = false) => {
            let selectEl = select(el, all)
            if (selectEl) {
                if (all) {
                    selectEl.forEach(e => e.addEventListener(type, listener))
                } else {
                    selectEl.addEventListener(type, listener)
                }
            }
        }

        window.addEventListener('load', () => {
            let cardContainer = select('.card-container');
            if (cardContainer) {
                let cardIsotope = new Isotope(cardContainer, {
                    itemSelector: '.card-item'
                });

                let cardFilters = select('#portfolio-flters li', true);

                on('click', '#portfolio-flters li', function(e) {
                    e.preventDefault();
                    cardFilters.forEach(function(el) {
                        el.classList.remove('filter-active');
                    });
                    this.classList.add('filter-active');

                    cardIsotope.arrange({
                        filter: this.getAttribute('data-filter')
                    });
                    cardIsotope.on('arrangeComplete', function() {
                        AOS.refresh();
                        updateSubAdvText(this.options.filter);
                    });
                }, true);
            }
        });

        function updateSubAdvText(filter) {
            let subAdvText = "";

            switch (filter) {
                case "*":
                    subAdvText = "Berikut berbagai jenis periklanan yang dapat Anda pesan dari kami";
                    break;
                case ".filter-Indoor":
                    subAdvText = "Berikut berbagai jenis periklanan yang cocok digunakan untuk promosi di dalam ruangan";
                    break;
                case ".filter-Outdoor":
                    subAdvText = "Berikut berbagai jenis periklanan yang cocok digunakan untuk promosi di luar ruangan";
                    break;
                case ".filter-IO":
                    subAdvText = "Berikut berbagai jenis periklanan yang cocok digunakan untuk promosi baik di dalam maupun luar ruangan";
                    break;
                default:
                    subAdvText = "";
                    break;
            }

            select('#subAdv').textContent = subAdvText;
        }
    });
</script>
@endsection