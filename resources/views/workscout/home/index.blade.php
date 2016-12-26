@extends('layouts.main')

@section('title', 'Home')

@section('content')


    <div class="container margin-top-40">
        <div class="sixteen columns">
            <div class="seven columns">
                <img src="{{asset("images")}}/baru/whatiscp.jpg">
            </div>
            <div class="eight columns desc-home margin-top-70">
                <div class="kategoribox-vertical"></div>
                <h1>APA ITU <br /> CARI PEKERJA ?</h1>
                <p>
                    CARIPEKERJA adalah sebuah portal yang menghubungkan antara Pemilik Usaha Kecil dan Menengah dengan Para Pencari Kerja di Indonesia.
                </p>
                <p>
                    CARIPEKERJA merupakan sistem informasi berbasis peranti lunak website dan seluler yang menghubungkan Pemilik Usaha dengan Pencari Kerja.
                </p>
                <p>
                    Melalui CARIPEKERJA, Pemilik Usaha Kecil dan Menengah dapat mengakses dan menghubungi Calon Pekerja yang sesuai dengan kriteria yang diinginkan.
                </p>
            </div>
        </div>
    </div>

    <div class="category-worker margin-bottom-30">
        <div class="container margin-top-20">
            <div class="sixteen columns">
                <div class="five columns">
                    <h1>KATEGORI PEKERJA</h1>
                    <div class="kategoribox"></div>
                </div>
                <div class="ten columns">
                    <ul id="popular-categories">
                        <li><a href="{{route('worker-list-category', ['url' => 'sales'])}}"><i class="ln  ln-icon-Business-Man"></i><span>Sales</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'jaga-toko'])}}"><i class="ln ln-icon-Shop"></i><span>Penjaga Toko</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'pelayan'])}}"><i class="ln ln-icon-Waiter"></i><span>Pelayan</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'kurir'])}}"><i class="ln  ln-icon-Luggage-2"></i><span>Kurir</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'admin'])}}"><i class="ln ln-icon-Administrator"></i><span>Admin</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'asisten-rumah-tangga'])}}"><i class="ln  ln-icon-Assistant"></i><span>Asisten Rumah</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'babysitter'])}}"><i class="ln ln-icon-Baby"></i><span>Baby Sitter</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'sopir'])}}"><i class="ln ln-icon-Car"></i><span>Sopir</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'buruh-pabrik'])}}"><i class="ln  ln-icon-Worker"></i><span>Buruh Pabrik</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'satpam'])}}"><i class="ln  ln-icon-Police-Man"></i><span>Satpam</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'montir'])}}"><i class="ln  ln-icon-Repair"></i><span>Montir</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'juru-masak'])}}"><i class="ln  ln-icon-Chef"></i><span>Juru Masak</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'kuli-bangunan'])}}"><i class="ln  ln-icon-Bodybuilding"></i><span>Kuli Bangunan</span></a></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'ob-og'])}}"><i class="ln  ln-icon-User"></i><span>Office Boy / Girl</a></span></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'tukang-kayu'])}}"><i class="ln  ln-icon-Saw"></i><span>Tukang Kayu</a></span></li>
                        <li><a href="{{route('worker-list-category', ['url' => 'penjahit'])}}"><i class="ln  ln-icon-Worker-Clothes"></i><span>Penjahit</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="video">
        <div class="container">
            <div class="sixteen columns">
                <div class="ten columns">
                    <div class="video-wrapper">
                        <div class="video-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/L-kbuxUkR3E" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="five columns">
                    <div class="video-title">
                        <div class="kategoribox-vertical"></div>
                        <h1>VIDEO PENGENALAN</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="container margin-top-30">

        <div class="title-page topup-title">
            <h3 class="margin-bottom-25">PAKET TOP UP</h3>
            <center><div class="kategoribox center"></div></center>
        </div>

        <div class="plan color-1 four columns">
            <div class="plan-price">
                <h3>BASIC</h3>
                <span class="plan-currency">Rp </span>
                <span class="value">100,000</span>

            </div>
            <div class="plan-features">
                <ul>
                    <li>20 Kontak</li>
                    <li>Rp 5000 / kontak</li>
                </ul>
                <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
            </div>
        </div>

        <!-- Plan #2 -->
        <div class="plan color-2 four columns">
            <div class="plan-price">
                <h3>BRONZE</h3>
                <span class="plan-currency">Rp </span>
                <span class="value">200,000</span>

            </div>
            <div class="plan-features">
                <ul>
                    <li>80 Kontak</li>
                    <li>Rp 2500 / kontak</li>
                </ul>
                <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
            </div>
        </div>

        <!-- Plan #3 -->
        <div class="plan color-1 four columns">
            <div class="plan-price">
                <h3>SILVER</h3>
                <span class="plan-currency">Rp </span>
                <span class="value">500,000</span>

            </div>
            <div class="plan-features">
                <ul>
                    <li>250 Kontak</li>
                    <li>Rp 2000 / kontak</li>
                </ul>
                <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
            </div>
        </div>

        <!-- Plan #4 -->
        <div class="plan color-1 four columns">
            <div class="plan-price">
                <h3>PLATINUM</h3>
                <span class="plan-currency">Rp </span>
                <span class="value">800,000</span>

            </div>
            <div class="plan-features">
                <ul>
                    <li>600 Kontak</li>
                    <li>Rp 1500 / kontak</li>
                </ul>
                <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
            </div>
        </div>
    </div>

    {{--<!-- Icon Boxes -->--}}
    <div class="section-background top-0 margin-top-10" style="background-color: #F3F3F3">
        <div class="title-page topup-title">
            <h3 class="margin-bottom-25">MANFAAT MENGGUNAKAN <span style="color: #558ec1">CARIPEKERJA</span></h3>
            <center><div class="kategoribox center"></div></center>
        </div>
        <div class="container">

            <div class="one-third column align-center">
                <div class="icon-box rounded alt">
                    <i class="fa fa-clock-o"></i>
                    <h4>HEMAT WAKTU</h4>
                    <p>Dapatkan pekerjaan dalam waktu yang singkat</p>
                </div>
            </div>

            <div class="one-third column align-center">
                <div class="icon-box rounded alt">
                    <i class="fa fa-money"></i>
                    <h4>HEMAT UANG</h4>
                    <p>Dapatkan kontak pekerja mulai dari Rp 2,000</p>
                </div>
            </div>

            <div class="one-third column align-center">
                <div class="icon-box rounded alt">
                    <i class="fa fa-users"></i>
                    <h4>HEMAT TENAGA</h4>
                    <p>Dapatkan pekerja yang sesuai dengan kriteria anda</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Icon Boxes / End -->

    <!-- Infobox -->
    <div class="infobox">
        <div class="container">
            <div class="sixteen columns">Dapatkan Pekerja Untuk Usaha Anda Segera <a href="{{route('register')}}">Daftar</a></div>
        </div>
    </div>

    <div class="testimonial">
        <div class="container">
            <div class="testi-image">
                <img src="{{asset('images')}}/testimonial.png">
            </div>
        </div>
        <div class="testi-left">
            <div class="testi-head-left">
                <div class="eight">
                    <span class="testi-semi-head">APA</span>
                    <h1>KATA MEREKA</h1>
                    <div class="kategoribox margin-bottom-10"></div>
                    <span class="testi-desc">TESTIMONIAL DARI KLIEN KAMI</span>
                </div>
            </div>
            <div class="testi-user">
                <img src="{{asset('images')}}/testi/testi4.png" />
                <img src="{{asset('images')}}/testi/testi1.jpg" />
                <img src="{{asset('images')}}/testi/testi2.jpg" />
                <img src="{{asset('images')}}/testi/testi3.jpg" />
                <i class="fa fa-angle-left"></i>
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
        <div class="testi-right">
            <div class="testi-content">
                <span class="quot">&rdquo;</span>
                <p>Mencari satpam untuk tempat futsal  biasanya sulit dan harus melalui penyedia layanan keamanan yang mahal. CARIPEKERJA memudahkan saya mendapatkan satpam dengan usaha dan biaya yang ringan.</p>
                <span class="testi-maker">JAMES WAHAB, PEMILIK AYO FUTSAL</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>


@endsection