@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div id="titlebar" class="resume">
        <div class="container">
            <div class="eleven columns">
                <div class="resume-titlebar">
                    <img src="{{\App\Helpers\GlobalHelper::setUserImage($detail['photo_profile'])}}" alt="">
                    <div class="resumes-list-content">
                        <h4>{{$detail['name']}} <span>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($detail['birthdate'])}}</span></h4>
                        <span class="icons"><i class="fa fa-map-marker"></i> {{\App\Helpers\GlobalHelper::getCityName($detail['city'])}}</span>
                        <span class="icons"><i class="fa fa-users"></i> {{\App\Helpers\GlobalHelper::maritalStatus($detail['marital'])}}</span>
                        <span class="icons"><i class="fa fa-graduation-cap"></i> Tamatan {{$detail['degree']}}</span>
                        @php
                        $category = explode(',',\App\Helpers\GlobalHelper::getWorkerCategory($detail['category']));
                        @endphp
                        @if($detail['category'] != null && !empty($detail['category']))
                            <div class="skills">
                                @foreach($category as $val)
                                    <span>{{$val}}</span>
                                @endforeach
                            </div>
                        @else
                            <div class="skills">
                                <span style="background-color: #c0c0c0">Profesi Belum Tersedia</span>
                            </div>
                        @endif

                        <div class="clearfix"></div>

                        @if((isset($showCallButton) && $showCallButton))
                            <div class="call-worker">
                                <a href="{{$callLink}}" onclick="{{$callConfirm}}" class="button blue"><i class="fa fa-phone"></i> Hubungi Pekerja</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="five columns">
                <div class="worker-verify">
                    <p><i class="fa fa-{{($detail['data_verified'] == 0) ? 'times-circle' : 'check-circle'}}"></i> Identitas {{($detail['data_verified'] == 0) ? 'Belum' : ''}} Terverifikasi</p>
                    <p><i class="fa fa-{{($detail['data_verified'] == 0) ? 'times-circle' : 'check-circle'}}"></i> Kontak {{($detail['data_verified'] == 0) ? 'Belum' : ''}} Terverifikasi</p>
                    <p><i class="fa fa-{{($detail['data_verified'] == 0) ? 'times-circle' : 'check-circle'}}"></i> Pengalaman {{($detail['data_verified'] == 0) ? 'Belum' : ''}} Terverifikasi</p>

                </div>
            </div>

        </div>
    </div>

    <div class="container">
    <!-- Recent Jobs -->
        <div class="eight columns">

            <h3 class="margin-bottom-20">Pengalaman Kerja</h3>

            <!-- Resume Table -->
            @if(empty($edu))
                <p>Belum ada data pengalaman kerja</p>

            @else

                <dl class="resume-table">
                    @foreach($experience as $rowExp)
                        <dt>
                            <small class="date">{{$rowExp['start']}} - {{$rowExp['end']}}</small>
                            <strong>{{$rowExp['role']}} di {{$rowExp['place']}}</strong>
                        </dt>
                        <dd>
                            <p>{{$rowExp['desc']}}</p>
                        </dd>
                    @endforeach

                </dl>

            @endif

        </div>


    <!-- Widgets -->
    <div class="eight columns">

        <h3 class="margin-bottom-20">Pendidikan</h3>

        <!-- Resume Table -->
        @if(empty($edu))
            <p>Belum ada data pendidikan</p>

        @else

            <dl class="resume-table">
                @foreach($edu as $rowEdu)
                    <dt>
                        <small class="date">{{$rowEdu['start']}} - {{$rowEdu['end']}}</small>
                        <strong>{{$rowEdu['name']}}</strong>
                    </dt>
                @endforeach

            </dl>

        @endif

    </div>

    </div>

@endsection