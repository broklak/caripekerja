@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container">

        <!-- Blog Posts -->
        <div class="twelve columns">
            <div class="padding-right">

                <!-- Post -->
                <div class="post-container">
                    <div class="post-content">
                        <a href="#"><h3>Kalau Pengangguran Tinggi, Mengapa Susah Mencari Pekerja?</h3></a>
                        <div class="meta-tags">
                            <span>December 17, 2016 oleh Rivan Kurniawan</span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="margin-bottom-25"></div>

                        <p>
                            Setelah di postingan saya sebelumnya, Indonesia Negara Ke-3 di Asia Tenggara dengan tingkat pengangguran tertinggi, kita membahas tentang tingginya tingkat pengangguran di Indonesia, saya menemui beberapa pelaku usaha UMKM. Ada yang bergerak di bidang kuliner, ada yang bergerak di bidang furniture, ada yang bergerak di bidang fashion, dll. Ketika saya berdiskusi dengan mereka, ada insight menarik yang saya temukan di lapangan.
                        </p>
                        <p>
                            Ketika saya tanyakan mengenai kendala apa yang mereka hadapi pada usaha mereka saat ini? Pemasaran produk menjadi kendala nomor 1, dan yang mengejutkan ternyata mencari karyawan menjadi kendala nomor 2. Lho katanya, pengangguran banyak tapi mengapa mencari karyawan susah? Nah di sini ternyata saya menemukan fakta menarik.
                        </p>
                        <p>
                            Ternyata, ketika para pelaku usaha kecil dan menengah ini mencari karyawan, kebanyakan UMKM masih mencari melalui media konvensional seperti koran, kemudian mencari referensi dari rekan, atau memasang pengumuman lowongan kerja di brosur atau leaflet. Dan tahukah anda ternyata cara-cara konvensional ini memiliki banyak kekurangan.
                        </p>
                        <p>
                            <div style="font-weight: bold">1. Butuh waktu mingguan bahkan bulanan menunggu aplikasi pelamar kerja yang masuk</div>
                            <div>
                                Saat ini koran masih menjadi media yang paling banyak digunakan UMKM untuk mencari pekerja, namun ternyata pemilik usaha membutuhkan waktu mingguan bahkan bulanan sampai mendapatkan pekerja yang cocok. Untuk beberapa usaha, ketiadaan karyawan satu hari saja bisa mengganggu proses produksi mereka, apalagi mingguan sampai bulanan.
                            </div>
                        </p>
                        <p>
                            <div style="font-weight: bold">2. Pemilik usaha tidak dapat memfilter pelamar yang masuk sesuai dengan kriteria yang diinginkan</div>
                            <div>
                                Kelemahan lainnya adalah pemilik usaha tidak dapat memfilter pelamar yang masuk. Karena pemilik usaha kecil dan menengah biasanya tidak memiliki bagian rekrutmen tersendiri, biasanya pemilik usaha akan kebingungan untuk memfilter pekerja yang masuk. Hal ini memakan banyak waktu sehingga operasional bisnis bisa terbengkalai.
                            </div>
                        </p>
                        <p>
                            <div style="font-weight: bold">3. Banyak pelamar yang asal melamar tanpa mengetahui detail pekerjaannya</div>
                            <div>
                                Hal lain yang dialami para pemilik usaha ini ternyata meskipun jumlah pelamar yang masuk ada lumayan banyak, ternyata kebanyakan mereka "asal melamar" dan bahkan para pelamar itu tidak tahu apa detail pekerjaannya. Hal ini yang paling mengejutkan. "yang penting asal dapat kerjaan", begitu kurang lebih gambarannya. Hal ini merugikan karena para pemilik usaha tentunya mencari orang yang kemampuannya sesuai dengan jenis pekerjaannya.
                            </div>
                        </p>
                        <p>
                            Kira-kira itulah gambaran yang bisa saya jelaskan, mengapa meskipun tingkat pengangguran tinggi, namun para pencari pekerja ini kesulitan mencari pekerja. Nantikan postingan saya selanjutnya.
                        </p>

                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="margin-top-35"></div>

            </div>
        </div>
        <!-- Blog Posts / End -->

        <div class="four columns margin-top-30">
            <div style="border: 1px solid #333;padding: 10px;border-radius: 5px;" class="widget">
                <h4>Blog Lain</h4>
                <div class="widget-text">
                    <h5><a href="{{url('blog/1')}}">Indonesia Negara ke-3 di Asia Tenggara dengan Tingkat Pengangguran Tertinggi</a></h5>
                    <span>December 14, 2016</span>
                </div>
            </div>
        </div>

    </div>

@endsection