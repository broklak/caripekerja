@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="mj_pagetitle2">
        <div class="mj_pagetitleimg">
            <img src="{{asset("images")}}/user/bg-profil-kerja.jpg" alt="">
            <div class="mj_mainheading_overlay"></div>
        </div>
        <div class="container-mesh">
            <div class="mj_pagetitle_inner">
                <div class="container-mesh">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mj_mainheading">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-lg-offset-1 col-xs-12">
                                        <div class="mj_joblogo">
                                            <img src="{{\App\Helpers\GlobalHelper::setUserImage($detail['photo_profile'])}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mj_pageheading">
                                            <h1>{{$detail['name']}}</h1>
                                            <ul>
                                                @php
                                                    $category = explode(',',\App\Helpers\GlobalHelper::getWorkerCategory($detail['category']));
                                                @endphp
                                                <li><i class="fa fa-map-marker"></i> {{\App\Helpers\GlobalHelper::getCityName($detail['city'])}}</li>
                                                <li><i class="fa fa-briefcase"></i> {{(!empty($category[0])) ? $category[0] : 'Admin'}}</li>
                                                <li><i class="fa fa-clock-o"></i> {{\App\Helpers\GlobalHelper::getAgeByBirthdate($detail['birthdate'])}}</li>
                                                <li><i class="fa fa-heart"></i> {{\App\Helpers\GlobalHelper::maritalStatus($detail['marital'])}}</li>
                                                {{--<li><i class="fa fa-graduation-cap"></i> Tamatan {{$detail['degree']}}</li>--}}
                                                @if((isset($ownedByEmployer) && $ownedByEmployer))
                                                    <div class="clearfix"></div>
                                                    <li class="purchased-data"><i class="fa fa-phone"></i> {{$detail['phone']}}</li>
                                                    <li class="purchased-data"><i class="fa fa-envelope"></i> {{(empty($detail['email'])) ? 'Belum memiliki email' :$detail['email']}}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <ul class="verify-worker mj_toppadder10">
                                            <li><i class="fa fa-{{($detail['data_verified'] == 0) ? 'times' : 'check'}}"></i> Identitas {{($detail['data_verified'] == 0) ? 'Belum' : 'Sudah'}} Terverifikasi</li>
                                            <li><i class="fa fa-{{($detail['contact_verified'] == 0) ? 'times' : 'check'}}"></i> Kontak {{($detail['contact_verified'] == 0) ? 'Belum' : 'Sudah'}} Terverifikasi</li>
                                            <li><i class="fa fa-{{($detail['exp_verified'] == 0) ? 'times' : 'check'}}"></i> Pengalaman {{($detail['exp_verified'] == 0) ? 'Belum' : 'Sudah'}} Terverifikasi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="mj_lightgraytbg mj_bottompadder80">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mj_social_media_section mj_candidatepage_media mj_toppadder40 mj_bottompadder40">
                            @if((isset($showCallButton) && $showCallButton))
                                <a class="contact-candidate" href="{{$callLink}}" onclick="{{$callConfirm}}" data-text="Contact Candidate">HUBUNGI PEKERJA</a>
                            @endif
                                @if($isOwner)
                                    <a class="contact-candidate" href="{{route('myaccount-index')}}">Ganti Profil</a>
                                @endif
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="mj_postdiv mj_jobdetail mj_toppadder20 mj_bottompadder50">
                                <div class="">
                                    <div class="padding-right">

                                        <label class="header-about">PENGALAMAN KERJA</label>
                                        <!-- Resume Table -->
                                        @if(empty($experience))
                                            <p class="no-desc">Belum ada data pengalaman kerja</p>

                                        @else

                                            <dl class="resume-table">
                                                @foreach($experience as $rowExp)
                                                    <dt>
                                                        <small class="date">{{(isset($rowExp['start'])) ? $rowExp['start'] : 'Tahun '}} - {{(isset($rowExp['end'])) ? $rowExp['end'] : 'Tahun '}}</small>
                                                        <strong>{{(isset($rowExp['role'])) ? $rowExp['role'] : 'Pekerja'}} di {{(isset($rowExp['place'])) ? $rowExp['place'] : 'Usaha'}}</strong>
                                                    </dt>
                                                    <dd>
                                                        <p>{{(!empty($rowExp['desc'])) ? $rowExp['desc'] : 'Tidak ada deskripsi'}}</p>
                                                    </dd>
                                                @endforeach

                                            </dl>

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="mj_postdiv mj_jobdetail mj_toppadder20 mj_bottompadder50">
                                <div class="">
                                    <div class="padding-right">

                                        <label class="header-about">PENDIDIKAN</label>
                                        <!-- Resume Table -->
                                        @if(empty($edu))
                                            <p class="no-desc">Belum ada data pendidikan</p>

                                        @else

                                            <dl class="resume-table">
                                                @foreach($edu as $rowEdu)
                                                    <dt>
                                                        <small class="date">{{(isset($rowEdu['start'])) ? $rowEdu['start'] : 'Tahun '}} - {{(isset($rowEdu['end'])) ? $rowEdu['end'] : 'Tahun '}}</small>
                                                        <strong>{{(isset($rowEdu['name'])) ? $rowEdu['name'] : 'Sekolah / Universitas'}}</strong>
                                                    </dt>
                                                    <dd>
                                                       <p>{{(!empty($rowEdu['desc'])) ? $rowEdu['desc'] : 'Tidak ada deskripsi'}}</p>
                                                    </dd>
                                                @endforeach

                                            </dl>

                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="mj_postdiv mj_jobdetail mj_toppadder20 mj_bottompadder50 skill-box">
                                <div class="padding-right">
                                    <label class="header-about">KETERAMPILAN</label>
                                    <!-- Resume Table -->
                                    @if(empty($skill))
                                        <p class="no-desc">Belum ada keterampilan</p>
                                    @else
                                        <ul>
                                            @foreach($skill as $rowSKill)
                                                <li>{{$rowSKill['name']}}</li>
                                            @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-mesh other-worker">
        <div class="title">
            <h1>LIHAT PEKERJA LAIN</h1>
            <div class="kategoribox detail"></div>
        </div>

        @foreach($otherWorker as $key => $row)
            <div class=" col-md-2 text-center">
                <div class="candidate candidate-list-img">
                    <a href="{{route('worker-detail', ['workerId' => $row->id])}}">
                        <h4 class="text-uppercase">{{\App\Helpers\GlobalHelper::simplifyName($row->name)}}</h4>
                        <img src="{{\App\Helpers\GlobalHelper::setUserImage($row->photo_profile)}}" alt="{{$row->name}}"  class="img-responsive">
                                <span style="text-transform: uppercase" class="resume-meta-info">
                                    {{\App\Helpers\GlobalHelper::getAgeByBirthdate($row->birthdate)}}
                                </span>
                        <ul class="list-unstyled text-center about-candidate">
                            @php
                            $category = explode(',',\App\Helpers\GlobalHelper::getWorkerCategory($row->category));
                            @endphp
                            <li><span style="text-transform: uppercase;font-weight: 600">{{(!empty($category[0])) ? $category[0] : 'Admin'}}</span></li>
                            <li class="text-uppercase"><span>
                                            <div class="rating no-stars">
                                                <div class="star-rating"></div>
                                                <div class="star-bg"></div>
                                            </div>
                                        </span></li>
                            <li><i class="city-other">{{\App\Helpers\GlobalHelper::getCityName($row->city)}}</i></li>
                        </ul>
                    </a>
                    <div class="hidden text-uppercase view-resume">
                        <a href="{{route('worker-detail', ['workerId' => $row->id])}}" class="btn"><span class="btn animated slideInUp align-center">Lihat Profil</span></a>
                    </div>
                </div>
            </div>
        @endforeach
        <div style="clear: both"></div>
    </div>
    <div class="container"></div>

@endsection