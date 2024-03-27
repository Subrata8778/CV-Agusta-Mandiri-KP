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
                    <li>Tentang Kami</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="about" class="inner-page about">
        <div class="section-title">
            <h2>Tentang Kami</h2>
        </div>
        <div class="container content">
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
            <br>
            <div class="section-title">
                <h2>Visi</h2>
            </div>
            <p>Menjadi pemimpin terdepan dalam industri periklanan, jual beli mobil bekas, dan jual properti di Bali, dengan reputasi yang tak tertandingi dalam hal profesionalisme, kreativitas, dan keandalan.</p>
            <br>
            <div class="section-title">
                <h2>Misi</h2>
            </div>
            <ul>
                <li><i class="bi bi-check-circle"></i> Berkomitmen dalam memberikan layanan terbaik demi kepuasan pelanggan yang tak tergoyahkan. Setiap layanan yang ditawarkan dirancang untuk memenuhi dan melampaui ekspektasi klien.</li>
                <li><i class="bi bi-check-circle"></i> Selektif dalam pemilihan sumber daya manusia yang profesional, memberikan mereka kesempatan untuk berkembang, dan menciptakan lingkungan kerja yang mendukung pertumbuhan pribadi dan profesionalitas.</li>
                <li><i class="bi bi-check-circle"></i> Menjaga harga yang kompetitif di pasaran tanpa mengorbankan kualitas hasil yang kami berikan.</li>
                <li><i class="bi bi-check-circle"></i> Berinovasi dan berubah untuk tetap menjadi yang terbaik dengan terus mengikuti perkembangan zaman dan menghadirkan ide-ide kreatif baru dalam setiap tugas yang dikerjakan.</li>
                <li><i class="bi bi-check-circle"></i> Menjaga integritas sebagai perusahaan yang dapat dipercaya klien dengan memberikan layanan yang jujur, transparan, dan profesional.</li>
            </ul>
        </div>
    </section>
</main>
@endsection