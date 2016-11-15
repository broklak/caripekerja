@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="candidates-search-bar">

    <div class="container">

        <form action="" method="get">

            <div class="row">

                <div class="col-md-4">

                    <input type="text" placeholder="Masukkan Nama Pekerja">

                </div>

                <div class="col-md-4">

                    <input type="text" placeholder="Masukkan Lokasi">

                </div>

                <div class="col-md-3">

                    <input type="text" placeholder="Masukkan Profesi">

                </div>

                <div class="col-md-1">

                    <button type="submit"><i class="fa fa-search"></i></button>

                </div>

            </div>

        </form>

    </div>

</section>

<section class="resumes-section padd-tb">

    <div class="container">

        <div class="row">

            <div class="col-md-9 col-sm-8">

                <div class="resumes-content">

                    <h2>Menampilkan Seluruh Pekerja</h2>

                    @foreach ($list as $row)

                        <div class="box">

                            <div class="frame"><a href="#"><img src="{{asset('images')}}/user/no-image.png" alt="img"></a></div>

                                <div class="text-box">

                                    <h2>{{$row['name']}}</h2>

                                    <h5>27 Tahun, Sudah Menikah</h5>

                                    <div class="clearfix"> <strong><i class="fa fa-map-marker"></i>Jakarta</strong></div>

                                    <div class="tags">Satpam, Supir</div>

                                    <div class="btn-row"> <a href="{{route('worker-detail', ['workerId' => $row['id']])}}" class="contact">Lihat Profil</a> </div>

                                </div>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="col-md-3 col-sm-4">

                <h2>Filter Pekerja</h2>

                <aside>

                    <div class="sidebar">

                        <div class="related-people">

                            <ul>

                                <li><input type="checkbox" id="supir" /> <label for="supir">Supir</label></li>

                                <li><input type="checkbox" id="perawat" /> <label for="perawat">Perawat</label></li>

                                <li><input type="checkbox" id="koki" /> <label for="koki">Juru Masak</label></li>

                                <li><input type="checkbox" id="ast" /> <label for="ast">Asisten Rumah Tangga</label></li>

                                <li><input type="checkbox" id="satpam" /> <label for="satpam">Satpam</label></li>

                                <li><input type="checkbox" id="jagatoko" /> <label for="satpam">Penjaga Toko</label></li>

                                <li><input type="checkbox" id="penjahit" /> <label for="satpam">Penjahit</label></li>

                            </ul>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>

<!--RECENT JOB SECTION END-->

@endsection