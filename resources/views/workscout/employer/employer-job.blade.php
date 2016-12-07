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

                        <h2>Lowongan Pekerjaan Saya</h2>

                        @if(!empty($job))

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#yes">Aktif</a></li>
                                <li><a data-toggle="tab" href="#no">Tidak Aktif</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="yes" class="tab-pane fade in active">

                                    <ul id="myList">

                                        @foreach ($job as $row)

                                            @if($row['status'] == 1)

                                                <li style="display: list-item;">

                                                    <div style="background-color: #f5f5f5" class="box">

                                                        <div class="thumb-jobs">
                                                            <span style="font-weight: 800;font-size: 16px">Aktif</span>
                                                        </div>

                                                        <div class="text-col">

                                                            <div class="hold">

                                                                <h4><a href="#">{{$row['title']}}</a></h4>

                                                                <h5>{{$row['employerName']}}</h5>

                                                                <p>{{empty($row['description']) ? 'Tidak ada deskripsi' : $row['description']}}</p>

                                                                <a href="#" class="text"><i class="fa fa-map-marker"></i>{{$row['provinceName']}}</a>
                                                                <a href="#" class="text"><i class="fa fa-calendar"></i>Diposting {{\App\Helpers\GlobalHelper::getHowLongTime($row['created_at'])}}</a> </div>

                                                        </div>

                                                        <strong class="price"><i class="fa fa-money"></i>{{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</strong>

                                                        <a onclick="return confirm('Anda akan menutup lowongan {{$row['title']}}, lanjutkan?')" href="{{route('change-application-status', ['id' => $row['id'], 'status' => 0])}}" style="margin-left: 10px" class="btn-1 btn-color-1 ripple">Tutup Lowongan</a>

                                                        <a href="{{route('job-edit', ['jobId' => $row['id']])}}" class="btn-1 btn-color-2 ripple">Edit Lowongan</a>

                                                    </div>

                                                </li>

                                            @endif

                                        @endforeach

                                    </ul>

                                </div>

                                <div id="no" class="tab-pane fade">

                                    <ul id="myList">

                                        @foreach ($job as $row)

                                            @if($row['status'] == 0)

                                                <li style="display: list-item;">

                                                    <div style="background-color: #f5f5f5" class="box">

                                                        <div class="thumb-jobs">
                                                            <span style="font-weight: 800;font-size: 16px">Tidak Aktif</span>
                                                        </div>

                                                        <div class="text-col">

                                                            <div class="hold">

                                                                <h4><a href="#">{{$row['title']}}</a></h4>

                                                                <h5>{{$row['employerName']}}</h5>

                                                                <p>{{empty($row['description']) ? 'Tidak ada deskripsi' : $row['description']}}</p>

                                                                <a href="#" class="text"><i class="fa fa-map-marker"></i>{{$row['provinceName']}}</a>
                                                                <a href="#" class="text"><i class="fa fa-calendar"></i>Diposting {{\App\Helpers\GlobalHelper::getHowLongTime($row['created_at'])}}</a> </div>

                                                        </div>

                                                        <strong class="price"><i class="fa fa-money"></i>{{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</strong>

                                                        <a onclick="return confirm('Anda akan membuka lowongan {{$row['title']}}, lanjutkan?')" href="{{route('change-application-status', ['id' => $row['id'], 'status' => 1])}}" style="margin-left: 10px" class="btn-1 btn-color-3     ripple">Aktifkan Lowongan</a>

                                                        <a href="{{route('job-edit', ['jobId' => $row['id']])}}" class="btn-1 btn-color-2 ripple">Edit Lowongan</a>

                                                    </div>

                                                </li>

                                            @endif

                                        @endforeach

                                    </ul>

                                </div>
                                </div>

                        @else

                            <p>Anda belum pernam memasang lowongan pekerjaan. Ayo mulai pasang lowongan dengan mengikuti link berikut. <a class="button-link link-green" href="{{route('job-create')}}">Buat Lowongan</a></p>

                        @endif

                    </div>

                    {{$link}}

                </div>



            </div>

        </div>

    </section>

@endsection