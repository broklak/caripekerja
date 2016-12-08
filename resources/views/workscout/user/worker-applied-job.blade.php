@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <section class="resume-process padd-tb">

        <div class="container">

            @include('user.myaccount-link')

        </div>

    </section>

    <section class="recent-row padd-tb" style="background-color: #fff">

        <div class="container">

            {!! session('displayMessage') !!}

            <div class="row">

                <div class="col-md-12 col-sm-8">

                    <div id="content-area">

                        <h2>Lamaran Pekerjaan Saya</h2>

                        @if(!empty($job))

                            <ul id="myList">

                                @foreach ($job as $row)

                                    <li style="display: list-item;">

                                        <div style="background-color: #f5f5f5" class="box">

                                            <div class="thumb-jobs"><a href="#"><img src="{{\App\Helpers\GlobalHelper::setEmployerImage($row['employerPhoto'])}}" alt="img"></a></div>

                                            <div class="text-col">

                                                <div class="hold">

                                                    <h4><a href="#">{{$row['title']}}</a></h4>

                                                    <h5>{{$row['employerName']}}</h5>

                                                    <p>{{empty($row['description']) ? 'Tidak ada deskripsi' : $row['description']}}</p>

                                                    <a href="#" class="text"><i class="fa fa-map-marker"></i>{{$row['provinceName']}}</a>
                                                    <a href="#" class="text"><i class="fa fa-calendar"></i>Diposting {{\App\Helpers\GlobalHelper::getHowLongTime($row['created_at'])}}</a> </div>

                                            </div>

                                            <strong class="price"><i class="fa fa-money"></i>{{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</strong>

                                            @if($row['status'] == 0)

                                                <a class="btn-1 btn-color-2 ripple">Lamaran Diterima</a>

                                            @elseif($row['status'] == 1)

                                                <a class="btn-1 btn-color-4 ripple">Lamaran Ditinjau</a>

                                            @else

                                                <a class="btn-1 btn-color-1 ripple">lamaran Ditutup</a>

                                            @endif

                                        </div>

                                    </li>

                                @endforeach

                            </ul>

                        @else

                            <p>Belum ada pekerjaan yang anda lamar. Ayo mulai cari pekerjaan dengan klik link berikut. <a class="button-link link-green" href="{{route('job-list')}}">Cari Pekerjaan</a></p>

                        @endif

                    </div>

                    {{$link}}

                </div>



            </div>

        </div>

    </section>

@endsection