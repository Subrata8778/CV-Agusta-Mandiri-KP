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
                    <li><a href="{{ route('customer.property') }}">Agusta Properti</a></li>
                    <li>Keranjang</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing portfolio section-bg inner-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Keranjang: Agusta Properti</h2>
            </div>

            <div class="row flex-lg-row">
                <div class="col-lg-5">
                    <div class="row">
                        <div id="notifSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil - </strong>Produk berhasil dihapus dari keranjangmu
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div id="notifFailed" class="alert alert-danger alert-dismissible fade show" role="alert">
                        </div>
                    </div>
                    @foreach ($user->property_cart as $cart)
                    <div id="cardCartId_{{ $cart->id }}" class="card mb-3 cardt border-0 shadow">
                        <div class="row g-0">
                            @foreach ($photos as $photo)
                            @if ($cart->id == $photo->prop_product_id)
                            <img src="{{ asset('storage/' . $photo->url) }}" class="col-md-4 img-fluid rounded" alt="{{ $cart->name }}" style="object-fit: cover;">
                            @break
                            @endif
                            @endforeach
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $cart->title }}</h5>
                                    <p class="card-text"><small class="text-muted">Kategori :</small>
                                        {{ $cart->category == 'House' ? 'Rumah' : ($cart->category == 'Land' ? 'Tanah' : 'Villa') }}
                                        <br>
                                        <small class="text-muted">Harga :</small>
                                        <span class="rupiah">
                                            {{ $cart->price }}
                                        </span>
                                    </p>
                                    <button class="btn float-end" onclick="removeCartItem({{ auth()->user()->id }}, {{ $cart->id }})">
                                        <i class='bx bx-trash text-danger' style="font-size: 24px"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div id="txtEmpty" class="card mb-3 bg-transparent border-0">
                        <div class="card-body text-muted fs-4">Anda belum menambahkan produk apapun ke keranjang</div>
                    </div>
                </div>
                <div class="col-lg-7 mb-5">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fw-bold">Buat Janji Temu</h5>
                            <p class="card-text d-flex justify-content-between mb-1">
                                <span class="text-muted"><small>Jenis Produk</small></span>
                                <span>Properti</span>
                            </p>
                            <p class="card-text d-flex justify-content-between mb-4">
                                <span class="text-muted"><small>Jumlah Produk</small></span>
                                <span id="txtTotal"></span>
                            </p>
                            <p class="h6 card-title mt-5 mb-3 fw-bold">Pilih Jadwal</p>
                            <form action="{{ route('customer.appointment.makeAppointment') }}" method="post">
                                @csrf
                                <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="type" value="Prop">
                                @foreach ($user->property_cart as $cart)
                                <input id="cartId_{{ $cart->id }}" name="ids[]" type="hidden" value="{{$cart->id}}">
                                @endforeach
                                <div class="mb-3 row">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="inputDate" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+13 day')); ?>" value="<?php echo date('Y-m-d'); ?>" name="date">
                                        <div class="form-text">
                                            Anda hanya dapat membuat janji temu untuk 2 minggu kedepan.
                                        </div>
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="rdoTime1" class="col-sm-2 col-form-label">Jam</label>
                                    <div class="col-sm-10">
                                        <div class="@error('start') is-invalid @enderror @error('end') is-invalid @enderror">
                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime1" autocomplete="off" onclick="selectedTime(this)" data-start="10:00:00" data-end="11:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime1">10:00 - 11:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime2" autocomplete="off" onclick="selectedTime(this)" data-start="11:00:00" data-end="12:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime2">11:00 - 12:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime3" autocomplete="off" onclick="selectedTime(this)" data-start="12:00:00" data-end="13:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime3">12:00 - 13:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime4" autocomplete="off" onclick="selectedTime(this)" data-start="13:00:00" data-end="14:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime4">13:00 -
                                                14:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime5" autocomplete="off" onclick="selectedTime(this)" data-start="14:00:00" data-end="15:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime5">14:00 -
                                                15:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime6" autocomplete="off" onclick="selectedTime(this)" data-start="15:00:00" data-end="16:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime6">15:00 -
                                                16:00</label>

                                            <input type="radio" class="btn-check" name="rdoTime" id="rdoTime7" autocomplete="off" onclick="selectedTime(this)" data-start="16:00:00" data-end="17:00:00">
                                            <label class="btn btn-outline-primary" for="rdoTime7">16:00 -
                                                17:00</label>

                                            <input type="hidden" name="start" id="start" value="">
                                            <input type="hidden" name="end" id="end" value="">
                                        </div>
                                        <div class="form-text">
                                            Waktu yang ditampilkan dalam zona Waktu Indonesia Tengah (WITA) - UTC+08:00.
                                        </div>
                                        @error('start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        @error('end')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="rdoTime1" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <p type="text" readonly class="form-control-plaintext" id="staticEmail">Agusta Motor - Jl. Raya Munggu-Kapal No.27, Kapal, Kec. Mengwi, Kabupaten Badung, Bali 80351</p>
                                        <iframe class="form-control-plaintext rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.153577723857!2d115.17234427401867!3d-8.581228591463304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd239a2edf729b9%3A0xec4d1cd867a12284!2sAgusta%20Motor!5e0!3m2!1sen!2sid!4v1704902549953!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="mt-5 form-actions">
                                    <div class="d-grid gap-2">
                                        <button id="btnMake" class="add-cart btn">Buat Janji Temu</button>
                                    </div>
                                    <div id="txtMake" class="form-text">Pilih produk terlebih dahulu untuk dapat membuat janji temu</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection

@section('jquery')
<script>
    // Cek validitas waktu
    function validTime(selectedDate) {
        // Ambil tanggal dan waktu sekarang
        var today = new Date();
        var year = today.getFullYear();
        var month = today.getMonth() + 1;
        var date = today.getDate();
        var hour = today.getHours();
        var min = today.getMinutes();
        // Ubah tanggal dan waktu sekarang dalam menit
        var nowMin = year * 525600 + month * 43800 + date * 1440 + hour * 60 + min;

        // Ambil tanggal terpilih
        var selectedDateSplit = selectedDate.split('-');
        var selectedYear = parseInt(selectedDateSplit[0]);
        var selectedMonth = parseInt(selectedDateSplit[1]);
        var selectedDay = parseInt(selectedDateSplit[2]);
        // Ubah tanggal terpilih dalam menit
        var selectedDateMin = selectedYear * 525600 + selectedMonth * 43800 + selectedDay * 1440;

        // Ambil radio button jam
        var rdoTime = document.getElementsByName('rdoTime');

        for (var i = 0; i < rdoTime.length; i++) {
            // Tambahkan tanggal terpilih dengan waktu dari tiap radio button
            var end = rdoTime[i].getAttribute('data-end');
            var endMin = selectedDateMin + parseInt(end.split(':')[0]) * 60 + parseInt(end.split(':')[1]);

            if (selectedDateMin < nowMin && endMin < nowMin) {
                rdoTime[i].disabled = true;
                rdoTime[i].classList.add('disabled');
            } else {
                rdoTime[i].disabled = false;
                rdoTime[i].classList.remove('disabled');
            }
        }
    }

    function availableTimes(date) {
        // Lakukan permintaan AJAX untuk mendapatkan janji temu yang sudah ada pada tanggal tersebut
        $.ajax({
            url: "/appointment/" + date + "/get-appointments",
            type: "GET",
            success: function(response) {
                // Tampilkan jam-jam yang tersedia
                showAvailableTimes(response);
            },
            error: function(error) {
                console.error('Error fetching appointments:', error);
            }
        });
    }

    // Ubah value waktu mulai dan selesai
    function selectedTime(button) {
        document.getElementById('start').value = button.getAttribute('data-start');
        document.getElementById('end').value = button.getAttribute('data-end');
    }

    // Able/disable button buat janji temu
    function totalProduk() {
        // Hitung total produk di keranjang
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

    $(document).ready(function() {
        // Hide div notifikasi
        $('#notifSuccess').hide();
        $('#notifFailed').hide();

        totalProduk();

        // Cek jam aktif saat pertama load page
        var selectedDate = document.getElementById('inputDate').value;
        validTime(selectedDate);
        availableTimes(selectedDate);

        // Cek jam aktif saat ubah tanggal
        $('#inputDate').on('change', function() {
            // Ambil tanggal yang dipilih
            validTime(this.value);
            availableTimes(this.value);
        });
    });

    function showAvailableTimes(appointments) {
        // Loop melalui jam-jam yang tersedia
        $('.btn-check').prop('disabled', false);

        // Loop melalui janji temu yang sudah ada
        $.each(appointments, function(index, appointment) {
            var startTime = appointment.start;
            var endTime = appointment.end;

            // Nonaktifkan tombol radio untuk jam yang sudah dibooking
            $('[data-start="' + startTime + '"][data-end="' + endTime + '"]').prop('disabled', true);
        });
    }

    function removeCartItem(userId, cartId) {
        // Hapus input hidden dan card berdasarkan ID keranjang
        $('#cartId_' + cartId).remove();
        $('#cardCartId_' + cartId).remove();

        totalProduk();

        $.ajax({
            url: '/cart/property/delete/' + userId + '/' + cartId,
            type: 'GET',
            success: function(data) {
                if (data.status == "Success") {
                    $('#notifSuccess').show();
                    $('#notifFailed').hide();
                }
            },
            error: function(error) {
                $('#notifSuccess').hide();
                $('#notifFailed').html("<strong>Gagal - </strong>" + xhr.responseJSON.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
                $('#notifFailed').show();
            }
        });
    }
</script>
@endsection