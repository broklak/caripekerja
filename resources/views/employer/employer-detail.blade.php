@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="resumes-section padd-tb job-detail">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-8">

                {!! session('displayMessage') !!}

                <div class="resumes-content worker-detail">

                    <div class="box">

                        <div class="to-profile">
                            <a class="button-link link-blue" href="{{route('myaccount-index')}}">Ganti Profil</a>
                        </div>

                        <div class="frame"><a href="#"><img style="width: 200px" src="{{\App\Helpers\GlobalHelper::setEmployerImage($detail['photo_profile'])}}" alt="img"></a></div>

                        <div class="text-box">

                            <h2>{{$detail['name']}}</h2>

                            <ul class="company-small">

                                <li><strong>Bidang Usaha:</strong> {{$detail['ukm_category']}}</li>

                                <li><strong>Nama Pemilik:</strong> {{$detail['name_owner']}}</li>

                                <li><strong>Alamat:</strong> {{$detail['address']}}</li>

                                <li><strong>Kota:</strong> {{\App\Helpers\GlobalHelper::getCityName($detail['city'])}}</li>

                                <li><strong>Website:</strong> <a target="_blank" href="{{$detail['website']}}">{{$detail['website']}}</a></li>

                            </ul>

                        </div>

                    </div>

                    </div>


                    <div class="summary-box">

                        <h4>Deskripsi Usaha</h4>
                        <p>{{$detail['description']}}</p>
                    </div>

                    <div class="summary-box">
                        <section class="recent-row" style="background-color: #fff">

                            <div class="container">

                                {!! session('displayMessage') !!}

                                <div class="row">

                                    <div class="col-md-11 col-sm-8">

                                        <div id="content-area">

                                            <h4>Lowongan Pekerjaan Saya</h4>

                                            @if(!empty($job))

                                                        <ul id="myList">

                                                            @foreach ($job as $row)

                                                                    <li style="display: list-item;padding: 0">

                                                                        <div style="background-color: #f5f5f5" class="box">

                                                                            <div class="text-col">

                                                                                <div class="hold">

                                                                                    <h4><a href="#">{{$row['title']}}</a></h4>

                                                                                    <h5>{{$row['employerName']}}</h5>

                                                                                    <p>{{empty($row['description']) ? 'Tidak ada deskripsi' : $row['description']}}</p>

                                                                                    <a href="#" class="text">{{$row['provinceName']}}</a>
                                                                                    <a href="#" class="text">Diposting {{\App\Helpers\GlobalHelper::getHowLongTime($row['created_at'])}}</a> </div>

                                                                            </div>

                                                                            <strong class="price">{{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</strong>

                                                                            <a class="btn-1 btn-color-{{($row['status'] == 1) ? '2' : '1' }} ripple">{{($row['status'] == 1) ? 'Aktif' : 'Tidak Aktif' }}</a>

                                                                        </div>

                                                                    </li>

                                                            @endforeach

                                                        </ul>
                                            @else

                                                <p>Anda belum pernam memasang lowongan pekerjaan. Ayo mulai pasang lowongan dengan mengikuti link berikut. <a class="button-link link-green" href="{{route('job-create')}}">Buat Lowongan</a></p>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div style="clear: both"></div>

                        </section>

                    </div>

                </div>

        </div>
    </div>

</section>

<section class="resumes-section">
    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-8">
                {{$link}}
            </div>
        </div>
    </div>

</section>

@endsection