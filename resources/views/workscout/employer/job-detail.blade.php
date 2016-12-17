@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="mj_pagetitle2">
        <div class="mj_pagetitleimg">
            <img src="{{asset("images")}}/user/bg-profil-kerja.jpg" alt="">
            <div class="mj_mainheading_overlay"></div>
        </div>
        <div class="container">
            <div class="mj_pagetitle_inner">
                <div class="container-mesh">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mj_mainheading">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="mj_joblogo">
                                            <img src="{{\App\Helpers\GlobalHelper::setEmployerImage($detail['employerPhoto'])}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <div class="mj_pageheading" style="margin-left: 20px">
                                            <h1>{{$detail['title']}}</h1>
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i> {{($detail['type'] == 1) ? ' Full Time' : 'Part Time'}}</li>
                                                <li><i class="fa fa-map-marker"></i> {{$detail['provinceName']}}</li>
                                                <li><i class="fa fa-calendar"></i> Diposting {{\App\Helpers\GlobalHelper::getHowLongTime($detail['created_at'])}}</li>
                                                <li><i class="fa fa-money"></i> {{\App\Helpers\GlobalHelper::moneyFormat($detail['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($detail['salary_max'])}}</li>
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
    </div>
    <div class="mj_lightgraytbg mj_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mj_social_media_section mj_candidatepage_media mj_toppadder40 mj_bottompadder40">
                        @if($authRole != 'employer')
                            <a class="contact-candidate" href="{{($authRole == 'worker') ? route('job-apply', ['jobId' => $detail['id']]) : route('login')}}"
                               onclick="@if($authRole == 'worker') return confirm('Anda akan melamar pekerjaan {{$detail['title']}} di {{$detail['employerName']}}. Lanjutkan Proses ?') @else alert('Silahkan login sebagai pekerja untuk melamar') @endif "
                               data-text="Contact Candidate">LAMAR PEKERJAAN</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="mj_postdiv mj_jobdetail mj_toppadder20 mj_bottompadder50">
                            <div class="">
                                <div class="padding-right">
                                    <label class="header-about">Deskripsi Pekerjaan</label>
                                    <p class="no-desc">{{empty($detail['description']) ? 'Tidak ada deskripsi' : htmlspecialchars($detail['description'])}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="mj_postdiv mj_jobdetail mj_toppadder20 mj_bottompadder50">
                            <div class="">
                                <div class="padding-right">

                                    <label class="header-about">Profil Usaha</label>
                                    <ul class="company-profile-detail">
                                        <li>
                                            <span class="company-detail-title">Nama Usaha</span>
                                            <span class="company-detail-content">{{$detail['employerName']}}</span>
                                        </li>
                                        <li>
                                            <span class="company-detail-title">Industri</span>
                                            <span class="company-detail-content">{{empty($detail['ukm_category']) ? '-' : $detail['ukm_category']}}</span>
                                        </li>
                                        <li>
                                            <span class="company-detail-title">Nama Pemilik</span>
                                            <span class="company-detail-content">{{empty($detail['name_owner']) ? '-' : $detail['name_owner']}}</span>
                                        </li>
                                        <li>
                                            <span class="company-detail-title">Pakaian Kerja</span>
                                            <span class="company-detail-content">Kasual</span>
                                        </li>
                                        <li>
                                            <span class="company-detail-title">Jumlah Karyawan</span>
                                            <span class="company-detail-content">10 - 20 Orang</span>
                                        </li>
                                        <li>
                                            <span class="company-detail-title">Website</span>
                                            <span class="company-detail-content">{{empty($detail['website']) ? '-' : $detail['website']}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container"></div>

@endsection