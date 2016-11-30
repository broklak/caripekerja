@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <!--POPULAR JOB CATEGORIES START-->

    <section id="listing" class="popular-categories">

        {!! session('displayMessage') !!}

        <div class="container">

            <div class="clearfix">

                <h2>Pilihan Profesi Pekerja</h2>

                <a href="{{route('worker-list')}}" class="btn-style-1">Lihat Semua Kategori Pekerja</a>
            </div>

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <a href="{{route('worker-list-category', ['url' => 'asisten-rumah-tangga'])}}">
                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/art.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Asisten Rumah Tangga</h4>

                        </div>
                    </a>

                </div>


                <a href="{{route('worker-list-category', ['url' => 'babysitter'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/babysitter.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Baby Sitter</h4>

                        </div>

                    </div>
                </a>


                <a href="{{route('worker-list-category', ['url' => 'sopir'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/sopir.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Sopir</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'pelayan'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/pelayan.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Pelayan</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'jaga-toko'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/jagatoko.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Penjaga Toko</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'admin'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/admin.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Admin</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'buruh-pabrik'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/buruh.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Buruh Pabrik</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'satpam'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/satpam.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Satpam</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'montir'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/montir.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Montir</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'kurir'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/kurir.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Kurir</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'juru-masak'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/koki.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Juru Masak</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'kuli-bangunan'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/kuli.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Kuli Bangunan</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'ob-og'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/ob.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Office Boy / Girl</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'tukang-kayu'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/tukang-kayu.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Tukang Kayu</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'penjahit'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/penjahit.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Penjahit</h4>

                        </div>

                    </div>
                </a>

                <a href="{{route('worker-list-category', ['url' => 'pemayet'])}}">
                    <div class="col-md-3 col-sm-6">

                        <div style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ) ,url('{{asset('images/bg/bgpekerja/pemayet.png')}}');background-size: cover" class="box bg-pekerja">

                            <h4>Pemayet</h4>

                        </div>

                    </div>
                </a>

            </div>

        </div>

    </section>

    <!--POPULAR JOB CATEGORIES END-->

    <!--CARA KERJA AREA START-->

    <section id="how-it-works" class="post-section padd-tb">

        <div class="container carikerja">

            <h2 style="margin-bottom: 50px">Bagaimana cara kerjanya?</h2>

            <div class="row">

                <div class="col-md-3 col-sm-3">
                    <div class="text-center">
                        <h4>Cari Pekerja</h4>
                        <i class="fa fa-search fa-3x"></i>
                        <p>Pilih profesi pekerja yang anda cari</p>
                    </div>
                </div>

                <div id="arrow-cara-1" class="col-md-1 col-sm-1">
                    <i class="fa fa-long-arrow-right fa-3x"></i>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="text-center">
                        <h4>Pilih Pekerja</h4>
                        <i class="fa fa-hand-pointer-o fa-3x"></i>
                        <p>Masukkan kriteria pekerja yang anda inginkan</p>
                    </div>
                </div>

                <div id="arrow-cara-2" class="col-md-1 col-sm-1">
                    <i class="fa fa-long-arrow-right fa-3x"></i>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="text-center">
                        <h4>Hubungi Pekerja</h4>
                        <i class="fa fa-phone fa-3x"></i>
                        <p>Dapatkan kontak pekerja dan rekrut segera</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!--CARA KERJA AREA END-->

    <!--PRICE TABLE STYLE 1 START-->

    <section class="price-table" id="pricing">

        <div class="container">

            <h2>Paket Top Up</h2>

            <div class="box">

                <h4>BASIC</h4>

                <strong class="amount"><span>Rp </span>100,000</strong>

                <ul>

                    <li>untuk 20 kontak</li>

                    <li>Rp 5000 / Kontak</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Beli Sekarang</a>
            </div>

            <div class="box">

                <div class="head">Penawaran Terbaik</div>

                <h4>BRONZE</h4>

                <strong class="amount"><span>Rp </span>200,000</strong>

                <ul>

                    <li>untuk 80 kontak</li>

                    <li>Rp 2500 / Kontak</li>

                </ul>

                <a href="#" style="background: #f44336;" class="btn-choose btn-color-2">Beli Sekarang</a>
            </div>

            <div class="box">

                <h4>SILVER</h4>

                <strong class="amount"><span>Rp </span>500,000</strong>

                <ul>

                    <li>untuk 250 kontak</li>

                    <li>Rp 2000 / Kontak</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Beli Sekarang</a>
            </div>

            <div class="box">

                <h4>PLATINUM</h4>

                <strong class="amount"><span>Rp </span>800,000</strong>

                <ul>

                    <li>untuk 600 kontak</li>

                    <li>Rp 1500 / Kontak</li>

                </ul>

                <a href="#" class="btn-choose btn-color-2">Beli Sekarang</a>
            </div>

        </div>

    </section>

    <!--PRICE TABLE STYLE 1 END-->

    <!--KEUNTUNGAN AREA START-->

    <section class="post-section padd-tb">

        <div class="container">

            <h2>Manfaat menggunakan <label class="logo-text">caripekerja.com</label></h2>

            <div class="row">

                <div class="col-md-4 col-sm-4">
                    <div class="text-center">
                        <i class="fa fa-clock-o fa-5x"></i>
                        <h5>Hemat Waktu</h5>
                        <p>Dapatkan pekerja dalam waktu yang singkat</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="text-center">
                        <i class="fa fa-money fa-5x"></i>
                        <h5>Hemat Uang</h5>
                        <p>Dapatkan kontak pekerja mulai dari Rp 2000 / kontak</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="text-center">
                        <i class="fa fa-users fa-5x"></i>
                        <h5>Hemat Tenaga</h5>
                        <p>Dapatkan pekerja yang sesuai dengan kriteria anda</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!--KEUNTUNGAN AREA END-->


    <!--TESTIOMONIALS SECTION START-->

    <section id="testimonial" class="testimonials-section">

        <div class="container">

            <div id="testimonials-slider" class="owl-carousel owl-theme">

                <div class="item">

                    <div class="holder">

                        <div class="thumb"><img src="{{ asset("images/testi") }}/testo-img.png" alt="img"></div>

                        <div class="text-box"> <em>Calon karyawan yang ada di caripekerja.com memiliki kapabilitas yang sesuai dengan data yang ditampilkan di website nya </em>

                            <strong class="name">Ahmad Nuzirwan</strong> <span class="post">Supervisor Gudang Carrefour</span> </div>

                    </div>

                </div>

                <div class="item">

                    <div class="holder">

                        <div class="thumb"><img src="{{ asset("images/testi") }}/testo-img.png" alt="img"></div>

                        <div class="text-box"> <em>Cara baru dalam mendapatkan pekerja yang sesuai dengan ekspektasi</em>

                            <strong class="name">Alief Nochtavio</strong> <span class="post">Pemilik Restoran SariNusa</span> </div>

                    </div>

                </div>

            </div>

        </div>

        <!--CLIENTS SECTION START-->

        <section class="client-logo-row">

        </section>

        <!--CLIENTS SECTION END-->

    </section>

    <!--TESTIOMONIALS SECTION END-->


    <section>

    </section>

@endsection