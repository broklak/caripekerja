@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container">

        <div class="title-page">
            <h2>Daftar Pekerja</h2>
        </div>

        <!-- Widgets -->
        <div class="five columns">
            <!-- Skills -->
            <form action="{{route('worker-list')}}" method="post">
                {{csrf_field()}}
                <div class="widget">
                    <h4>Profesi</h4>
                        <select data-placeholder="Pilih Profesi" name="category" class="chosen-select">
                            <option value="0">Semua Profesi</option>
                            @foreach($category as $key => $row)
                                <option @if(isset($param['category']) && $param['category'] == $row['id']) selected @endif value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>

                </div>

                <div class="widget">
                    <h4>Lokasi</h4>
                    <select data-placeholder="Pilih Kota Tinggal" name="city" class="chosen-select">
                        <option value="0">Semua Kota</option>
                        @foreach ($province as $rowProvince)
                            <option @if(isset($param['city']) && $param['city'] == $rowProvince['id']) selected @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <h4>Pendidikan Terakhir</h4>
                    <select data-placeholder="Pilih Kota Tinggal" name="degree" class="chosen-select">
                        <option value="0">Semua Latar Pendidikan Terakhir</option>

                        @foreach ($degree as $key => $row)
                            <option @if(isset($param['degree']) && $param['degree'] == $row) selected @endif>{{$row}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="margin-top-15"></div>
                <button class="button">Filter</button>

            </form>
        </div>
        <!-- Widgets / End -->

        <!-- Recent Jobs -->
        <div class="eleven columns">
            <div class="padding-right">
                <ul class="resumes-list">

                    @if(!empty($list))

                        @foreach ($list as $row)

                            <li><a href="{{route('worker-detail', ['workerId' => $row['id']])}}">
                                    <img src="{{\App\Helpers\GlobalHelper::setUserImage($row['photo_profile'])}}" alt="">
                                    <div class="resumes-list-content">
                                        <h4>{{$row['name']}} <span>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($row['birthdate'])}}</span></h4>
                                        <span><i class="fa fa-map-marker"></i> {{\App\Helpers\GlobalHelper::getCityName($row['city'])}}</span>
                                        {{--<span><i class="fa fa-money"></i> $100 / hour</span>--}}
                                        {{--<p>Over 8000 hours on oDesk (only Drupal related). Highly motivated, goal-oriented, hands-on senior software engineer with extensive technical skills and over 15 years of experience in software development</p>--}}

                                        @php
                                        $category = explode(',',\App\Helpers\GlobalHelper::getWorkerCategory($row['category']));
                                        @endphp
                                        @if($row['category'] != null && !empty($row['category']))
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

                                    </div>
                                </a>
                                <div class="clearfix"></div>
                            </li>
                        @endforeach
                    @else
                        <p> Pekerja tidak ditemukan. Coba gunakan kriteria pencarian lain</p>
                    @endif
                </ul>
                <div class="clearfix"></div>

                {{$link}}

            </div>
        </div>

    </div>

    <div style="margin-bottom: 20px"></div>

@endsection