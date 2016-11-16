@extends('layouts.main')

@section('title', 'Home')

@section('content')

        <section class="candidates-search-bar">

            <div class="container">

                <form action="" method="get">

                    <div class="row">

                        <div class="col-md-4">

                            <input type="text" placeholder="Masukkan Nama Pekerjaan">

                        </div>

                        <div class="col-md-4">

                            <input type="text" placeholder="Masukkan Lokasi">

                        </div>

                        <div class="col-md-3">

                            <input type="text" placeholder="Masukkan Category">

                        </div>

                        <div class="col-md-1">

                            <button type="submit"><i class="fa fa-search"></i></button>

                        </div>

                    </div>

                </form>

            </div>

        </section>

        <section class="recent-row padd-tb">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 col-sm-8">

                        <div id="content-area">

                            <h2>Menampilkan Seluruh Pekerjaan</h2>

                            <ul id="myList">

                                @foreach ($list as $row)

                                    <li style="display: list-item;">

                                        <div class="box">

                                            <div class="thumb"><a href="#"><img src="images/recent-job-thumb-1.jpg" alt="img"></a></div>

                                            <div class="text-col">

                                                <div class="hold">

                                                    <h4><a href="#">{{$row['title']}}</a></h4>

                                                    <p>Waktu Kerja : Senin - Minggu (Libur 1 hari). Fasilitas : Gaji, Uang Makan</p>

                                                    <a href="#" class="text"><i class="fa fa-map-marker"></i>Jakarta, Ragunan</a>
                                                    <a href="#" class="text"><i class="fa fa-calendar"></i>Oct 30, 2016 - Nov 30, 2016 </a> </div>

                                            </div>

                                            <strong class="price"><i class="fa fa-money"></i>{{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</strong>
                                            <a href="#" onclick="alert('Kami sedang memgembangkan fitur ini')" class="btn-1 btn-color-1 ripple">Lamar Pekerjaan</a> </div>

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>



                </div>

            </div>

        </section>

@endsection