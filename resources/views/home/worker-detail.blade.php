@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="resumes-section padd-tb">

    <div class="container">

        <div class="row">

            <div class="col-md-9 col-sm-8">

                {!! session('displayMessage') !!}

                <div class="resumes-content worker-detail">

                    <div class="box">

                        <div class="to-profile">
                            @if($isOwner) <a class="button-link link-blue" href="{{route('myaccount-index')}}">Ganti Profil</a> @endif
                        </div>

                        <div class="frame"><a href="#"><img style="width: 200px" src="{{\App\Helpers\GlobalHelper::setUserImage($detail['photo_profile'])}}" alt="img"></a></div>

                        <div class="text-box">

                            <h2>{{$detail['name']}}</h2>

                            <h5>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($detail['birthdate'])}} Tahun, {{\App\Helpers\GlobalHelper::maritalStatus($detail['marital'])}}</h5>

                            <div class="clearfix"> <strong><i class="fa fa-map-marker"></i>{{\App\Helpers\GlobalHelper::getCityName($detail['city'])}}</strong></div>

                            <div class="tags">{{\App\Helpers\GlobalHelper::getWorkerCategory($detail['category'])}}</div>

                            @if(!$isOwner) <div class="btn-row"> <a href="" class="contact">Hubungi Pekerja</a> </div> @endif

                        </div>

                    </div>

                    <div class="summary-box">

                        <h4>Pengalaman Kerja</h4>

                        @foreach($experience as $rowExp)

                            <div class="outer"> <strong class="title">{{$rowExp['role']}} di {{$rowExp['place']}}</strong>

                                <div class="col"> <span>{{$rowExp['years']}} tahun</span>

                                    <p>{{$rowExp['desc']}}</p>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="skills-box">

                        <h4>Keahlian</h4>

                        @foreach($skill as $rowSkill)

                            <div class="progress-box"> <strong class="title">{{$rowSkill['name']}}</strong>

                                <div class="progress">

                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: {{$rowSkill['level']}}%;"> <span> {{$rowSkill['level']}}</span> </div>

                                </div>

                            </div>

                        @endforeach

                </div>

            </div>
                </div>

            <div class="col-md-3 col-sm-4">

                <h2>Pekerja Serupa</h2>

                <aside>

                    <div class="sidebar">

                        <div class="related-people">

                            <ul>

                                <li>

                                    <div class="frame"><a href="#"><img src="images/resumes/related-img-4.jpg" alt="img"></a></div>

                                    <div class="text-box"> <strong class="name"><a href="#">Ahmad Kadir</a></strong> <span><i class="fa fa-tags"></i>Supir</span> <span><i class="fa fa-map-marker"></i>Jakarta</span> </div>

                                </li>

                                <li>

                                    <div class="frame"><a href="#"><img src="images/resumes/related-img-5.jpg" alt="img"></a></div>

                                    <div class="text-box"> <strong class="name"><a href="#">Bayu Sakti</a></strong> <span><i class="fa fa-tags"></i>Supir</span> <span><i class="fa fa-map-marker"></i>Jakarta</span> </div>

                                </li>

                                <li>

                                    <div class="frame"><a href="#"><img src="images/resumes/related-img-6.jpg" alt="img"></a></div>

                                    <div class="text-box"> <strong class="name"><a href="#">Sulaeman</a></strong> <span><i class="fa fa-tags"></i>Supir</span> <span><i class="fa fa-map-marker"></i>Jakarta</span> </div>

                                </li>

                            </ul>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>

@endsection