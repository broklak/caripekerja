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

                {!! session('displayMessage') !!}

                <div class="col-md-12 col-sm-8">

                    <div id="content-area">

                            <ul id="myList">

                                @foreach ($list as $row)

                                <li>

                                    <div class="box">

                                        <div class="thumb hide"><a href="#"><img src="images/recent-job-thumb-4.jpg" alt="img"></a></div>

                                        <div class="text-col">

                                            <div class="hold">

                                                <h4><a href="#">{{$row['title']}}</a></h4>

                                                <a href="#" class="text"><i class="fa fa-map-marker"></i>Jakarta</a> <a href="#" class="text hide"><i class="fa fa-calendar"></i>Dec 30, 2015 - Feb 20, 2016 </a> </div>

                                        </div>

                                        <strong class="price"><i class="fa fa-money"></i>{{\App\Helpers\GlobalHelper::moneyFormat($row['salary'])}}</strong> <a onClick="alert('Kami sedang melanjutkan pengembangan fitur ini')" href="#" class="btn-1 btn-color-4 ripple">Lamar</a> </div>

                                </li>

                                @endforeach

                            </ul>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection