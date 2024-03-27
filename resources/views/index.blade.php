@extends('layouts.home')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>CV Agusta Mandiri</h1>
                <h2>Perusahaan yang bergerak di bidang advertising, otomotif, dan properti di Bali</h2>
            </div>
            <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                <img src="{{ asset('customer/img/hero-img.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                    <img src="{{ asset('customer/img/about.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                    <h3>Tentang Kami</h3>
                    <p></p>
                    <p>
                        <b>CV Agusta Mandiri</b> adalah perusahaan yang berdedikasi dalam berbagai bidang, termasuk
                        periklanan, jual beli mobil bekas, dan jual properti di Bali. Sejak berdiri pada awal tahun
                        2014, kami telah tumbuh menjadi entitas yang kuat dan solid, berkat keragaman latar belakang
                        individu-individu berpengalaman yang menjadi bagian integral dari tim kami.
                    </p>
                    <p>
                        Kami percaya bahwa keberhasilan <b>CV Agusta Mandiri</b> tidak hanya bergantung pada satu aspek saja,
                        tetapi pada kombinasi sumber daya manusia yang profesional, harga yang kompetitif, dan komitmen
                        kami terhadap inovasi yang berkelanjutan. Dalam semua yang kami lakukan, kami menjaga tingkat
                        keunggulan dan kualitas tanpa kompromi.
                    </p>
                    <a href="{{ route('customer.about') }}" class="read-more">Baca Selengkapnya <i class='bx bx-chevron-right'></i></a>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $users }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Pelanggan</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $appointments }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Janji Temu Terbuat & Selesai</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $advs }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jenis Advertising</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $cps }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Mobil dan Properti Terjual</p>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Layanan</h2>
                <p>Jelajahi ragam layanan berkualitas yang kami tawarkan untuk memenuhi kebutuhan Anda</p>
            </div>

            <div class="row gy-4">
                <a href="{{ route('customer.advertising') }}" class="a-card col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174">
                                </path>
                            </svg>
                            <i class="bx bx-store"></i>
                        </div>
                        <h4>Agusta Advertising</h4>
                        <p>Solusi periklanan yang efektif untuk meningkatkan bisnis Anda</p>
                    </div>
                </a>

                <a href="{{ route('customer.car') }}" class="a-card col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-orange ">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426">
                                </path>
                            </svg>
                            <i class="bx bx-car"></i>
                        </div>
                        <h4>Agusta Motor</h4>
                        <p>Jual beli mobil bekas dengan kepercayaan dan profesionalitas</p>
                    </div>
                </a>

                <a href="{{ route('customer.property') }}" class="a-card col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box iconbox-pink">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781">
                                </path>
                            </svg>
                            <i class="bx bx-building"></i>
                        </div>
                        <h4>Agusta Properti</h4>
                        <p>Temukan properti impian Anda di Bali dengan bantuan kami</p>
                    </div>
                </a>
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Mengapa Harus Kami</h2>
                <p>Inilah beberapa keunggulan memilih kami untuk membantu Anda</p>
            </div>

            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
                    <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-receipt"></i>
                        <h4>Pengalaman Teruji</h4>
                        <p>Berdiri sejak 2014, kami telah menghadapi berbagai tantangan dan sukses di berbagai bidang yang kami tawarkan.
                        </p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-group"></i>
                        <h4>Tim Profesional Multitalenta</h4>
                        <p>Berasal dari latar belakang yang berbeda, tim kami memiliki wawasan yang lebih mendalam, baik dalam bidang periklanan, jual beli mobil, dan properti.</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-dollar-circle"></i>
                        <h4>Harga Kompetitif</h4>
                        <p>Kami menawarkan harga yang bersaing di pasar tanpa mengorbankan kualitas layanan yang kami berikan.</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-brain"></i>
                        <h4>Inovasi Berkelanjutan</h4>
                        <p>Kami selalu mencari solusi kreatif dan terus berinovasi untuk memenuhi kebutuhan Anda.</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="500">
                        <i class="bx bx-star"></i>
                        <h4>Kepuasan Pelanggan yang Utama</h4>
                        <p>Kepuasan Anda adalah prioritas utama kami, dan kami berkomitmen untuk memberikan layanan luar biasa.</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="600">
                        <i class='bx bx-shield-quarter'></i>
                        <h4>Keterpercayaan dan Integritas</h4>
                        <p>Kami dibangun di atas nilai-nilai kejujuran, transparansi, dan integritas yang kuat sehingga kami dapat menjadi mitra yang dapat dipercaya.</p>
                    </div>
                </div>
                <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('customer/img/features.svg') }}" alt="" class="img-fluid">
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portofolio</h2>
                <p>Berikut adalah beberapa pekerjaan yang telah berhasil dilakukan oleh CV Agusta Mandiri.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-Adv">Agusta Advertising</li>
                        <li data-filter=".filter-Car">Agusta Motor</li>
                        <li data-filter=".filter-Prop">Agusta Properti</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                @foreach ($portos as $porto)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $porto -> category }}">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('storage/' . $porto -> photo) }}" class="img-fluid" alt="{{ $porto -> title }}">
                        <div class="portfolio-info">
                            <h4>{{ $porto -> title }}</h4>
                            <p>{{ $porto->category == 'Adv' ? 'Agusta Advertising' : ($porto->category == 'Car' ? 'Agusta Motor' : 'Agusta Properti') }}</p>
                        </div>
                        <div class="portfolio-links">
                            <a href="{{ asset('storage/' . $porto -> photo) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $porto -> title }}"><i class="bx bx-plus"></i></a>
                            <a href="{{ route('customer.portfolio.detail', $porto -> id) }}" title="Lihat Detail"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Cleint Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Mitra</h2>
                <p>Pekerjaan kami telah dipercaya oleh perusahaan-perusahaan ternama</p>
            </div>

            <div id="carouselClient" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselClient" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselClient" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselClient" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselClient" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/oppo.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/asus.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/acer.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/lenovo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/grab.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/jnt_express.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/jnt_cargo.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/kirin.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/comforta.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/bigland.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/dulux.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/coolant.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/mie_gacoan.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/mowilex.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/roman_granit.png') }}" alt="">
                            </div>
                            <div class="col-sm mb-3 client d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('storage/clients/granito.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselClient" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselClient" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- <div class="row">

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3>Free</h3>
                        <h4><sup>$</sup>0<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li class="na">Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box featured">
                        <h3>Business</h3>
                        <h4><sup>$</sup>19<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <h3>Developer</h3>
                        <h4><sup>$</sup>29<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <span class="advanced">Advanced</span>
                        <h3>Ultimate</h3>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

            </div> -->

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apa saja layanan yang ditawarkan oleh CV. Agusta Mandiri? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <p>
                                CV Agusta Mandiri menyediakan 3 jenis layanan, yaitu periklanan, jual beli mobil bekas,
                                dan jual properti yang berlokasi di Bali.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Bagaimana saya bisa menggunakan layanan
                            periklanan dari CV Agusta Mandiri? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Anda dapat menghubungi tim kami melalui telepon atau email untuk berdiskusi tentang
                                kebutuhan periklanan Anda. Kami akan dengan senang hati membantu Anda merencanakan
                                strategi yang sesuai.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Apakah harga yang ditawarkan oleh CV.
                            Agusta Mandiri bersaing dengan pasar? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Ya, kami menawarkan harga yang sangat kompetitif di pasar tanpa mengorbankan kualitas
                                layanan kami.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Bagaimana saya bisa menjual mobil bekas
                            melalui CV. Agusta Mandiri?
                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Untuk menjual mobil bekas, hubungi kami dan kami akan membantu Anda menilai, memasarkan,
                                dan menjual mobil Anda dengan cepat dan efisien.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="500">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Apakah Anda memiliki properti yang tersedia
                            untuk dijual di Bali saat ini?
                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Untuk mengetahui daftar properti yang tersedia, silakan hubungi kami atau kunjungi situs
                                web kami. Kami akan dengan senang hati membantu Anda menemukan properti yang sesuai
                                dengan kebutuhan Anda.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="600">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed">Bagaimana saya bisa menjadi mitra bisnis
                            CV. Agusta Mandiri?
                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Kami selalu terbuka untuk berbicara dengan potensi mitra bisnis. Silakan hubungi kami
                                untuk diskusi lebih lanjut mengenai potensi kerja sama bisnis.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="700">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-7" class="collapsed">Bagaimana proses seleksi sumber daya
                            manusia dilakukan di CV. Agusta Mandiri?
                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Kami memiliki proses seleksi yang ketat untuk memastikan tim kami terdiri dari individu
                                yang profesional dan berkompeten. Anda dapat mengirimkan CV Anda melalui email kami, dan
                                kami akan menghubungi Anda jika ada peluang yang sesuai.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="800">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-8" class="collapsed">Bagaimana CV. Agusta Mandiri berkomitmen
                            terhadap keberlanjutan?
                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-8" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Kami berkomitmen untuk melakukan inovasi berkelanjutan dan perubahan demi menjadi yang
                                terbaik, handal, dan kreatif dalam semua aspek bisnis kami. Kami juga memprioritaskan
                                praktik bisnis yang ramah lingkungan dan berkelanjutan.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="900">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-9" class="collapsed">Apakah Anda menerima proyek periklanan dari
                            luar Bali?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-9" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Ya, kami menerima proyek periklanan dari berbagai lokasi di dalam dan luar Bali. Kami
                                dapat berkolaborasi secara online atau datang ke lokasi sesuai kebutuhan proyek.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="1000">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-10" class="collapsed">Bagaimana saya dapat menghubungi CV.
                            Agusta Mandiri untuk pertanyaan lebih lanjut atau penawaran khusus? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-10" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Anda dapat menghubungi kami melalui telepon di nomor kontak yang tersedia di situs web
                                kami atau mengirimkan pertanyaan Anda melalui email. Kami akan merespons dengan cepat
                                dan memberikan informasi yang Anda perlukan.
                            </p>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kontak</h2>
                <p>Hubungi kami dikontak berikut</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Kantor 1</h3>
                        <p>Jl. Tambak sari No. 27 Kapal - Mengwi</p>
                        <p>Badung - Bali</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Kantor 2</h3>
                        <p>Jl. Siulan No. 98 Penatih Dangin Puri</p>
                        <p>Denpasar Timur - Bali</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>agustabali@gmail.com</p><br>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Telepon / WhatsApp</h3>
                        <p><a href="https://wa.me/6281318733001" target="_blank" style="color: inherit;">081318733001</a></p>
                        <p><a href="https://wa.me/6281916511427" target="_blank" style="color: inherit;">081916511427</a></p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.1659757843117!2d115.17126457369945!3d-8.580035287071066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2395b030fa5b1%3A0x4dabb72045adef14!2sJl.%20Tambaksari%20No.27%2C%20Kapal%2C%20Kec.%20Mengwi%2C%20Kabupaten%20Badung%2C%20Bali%2080351!5e0!3m2!1sid!2sid!4v1696964733839!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15778.828434941186!2d115.2525199!3d-8.6240917!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f9945f458c9%3A0xd76513b3c6f7845!2sAgusta%20Advertising!5e0!3m2!1sid!2sid!4v1696964472005!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection