@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <style>
        .chosen-single span, .result-selected { font-family: 'FontAwesome',"Roboto", Arial, Helvetica, sans-serif; } /* This is for the placeholder */
    </style>

    <link rel="stylesheet" href="{{ asset("css") }}/dojo.css?version=1" id="colors">
    <div class="title-page list-worker"></div>
    <div class="clearfix"></div>

    <div class="container margin-bottom-10">
        <div class="four columns">
            <h2 style="margin-top: 0;color: #655">FILTER PEKERJA</h2>
        </div>

        <div class="twelve columns">
            <div class="widget sort">
                <span class="widget-sort-title">URUTKAN</span>
                <a class="widget-sort-select job-list">GAJI <i class="fa fa-chevron-down"></i></a>
                <a class="widget-sort-select job-list">TERBARU <i class="fa fa-chevron-down"></i></a>
            </div>
            <div class="widget sort-mobile" style="margin-bottom: -30px">
                <form action="{{route('job-list')}}" method="post">
                    <select name="sort">
                        <option value="0">Urut Berdasarkan</option>
                        <option value="1">Gaji</option>
                        <option value="2">Terbaru</option>
                    </select>
                </form>
            </div>
        </div>

    </div>

    <div class="container">
        <!-- Widgets -->
        <div class="four columns">
            <!-- Skills -->
            <form action="{{route('job-list')}}" method="post">
                {{csrf_field()}}
                <div class="widget wrapperzz">
                    <select data-placeholder="Pilih Profesi" name="category" class="chosen-select">
                        <option value="0">@if(!isset($param['category']) || $param['category'] == 0) &#xf0b1 &nbsp;&nbsp; @endif Semua Profesi</option>
                        @foreach($category as $key => $row)
                            <option @if(isset($param['category']) && $param['category'] == $row['id']) selected @endif value="{{$row['id']}}">@if(isset($param['category']) && $param['category'] == $row['id']) &#xf0b1 &nbsp;&nbsp; @endif {{$row['name']}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="city" class="chosen-select">
                        <option value="0">@if(!isset($param['city']) || $param['city'] == 0) &nbsp;&#xf041 &nbsp;&nbsp;  @endif Semua Lokasi</option>
                        @foreach ($province as $rowProvince)
                            <option @if(isset($param['city']) && $param['city'] == $rowProvince['id']) selected @endif value="{{$rowProvince['id']}}">@if(isset($param['city']) && $param['city'] == $rowProvince['id']) &#xf041 &nbsp; &nbsp; @endif{{$rowProvince['name']}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Tipe Waktu" name="type" class="chosen-select">
                        <option @if(!isset($param['type']) || $param['type'] == 0) selected  @endif value="0">@if(!isset($param['type']) || $param['type'] == 0) &#xf017 &nbsp;&nbsp;  @endif Semua Tipe Pekerjaan</option>
                        <option @if(isset($param['type']) && $param['type'] == 1) selected  @endif value="1">@if(isset($param['type']) && $param['type'] == 1) &#xf017 &nbsp;&nbsp;  @endif Full Time</option>
                        <option @if(isset($param['type']) && $param['type'] == 2) selected  @endif value="2">@if(isset($param['type']) && $param['type'] == 2) &#xf017 &nbsp;&nbsp;  @endif Part Time</option>
                    </select>

                </div>

                <div class="widget">
                    <ul class="checkboxes">
                        <li>
                            <input id="check-6" type="checkbox" name="salary" value="0" @if((isset($param['salary']) && $param['salary'] == 0)) || !isset($param['salary'])) checked @endif>
                            <label for="check-6">Semua Rentang Gaji</label>
                        </li>
                        <li>
                            <input id="check-7" type="checkbox" name="salary" value="1" @if(isset($param['salary']) && $param['salary'] == 1) checked @endif>
                            <label for="check-7">Rp 500,000 - Rp 1,000,000</label>
                        </li>
                        <li>
                            <input id="check-8" type="checkbox" name="salary" value="2" @if(isset($param['salary']) && $param['salary'] == 2) checked @endif>
                            <label for="check-8">Rp 1,000,000 - Rp 3,000,000</label>
                        </li>
                        <li>
                            <input id="check-9" type="checkbox" name="salary" value="3 @if(isset($param['salary']) && $param['salary'] == 3) checked @endif">
                            <label for="check-9">Rp 3,000,000 - Rp 5,000,000</label>
                        </li>
                        <li>
                            <input id="check-10" type="checkbox" name="salary" value="4" @if(isset($param['salary'])&& $param['salary'] == 4) checked @endif>
                            <label for="check-10">Diatas Rp 5,000,000</label>
                        </li>
                    </ul>

                </div>

                <div class="margin-top-15"></div>
                <button style="color: #fff;font-size: 16px;width: 100%" class="button">Filter</button>

            </form>
            <div class="margin-bottom-40"></div>
        </div>
        <!-- Widgets / End -->

        <!-- Recent Jobs -->
        <div class="twelve columns">
            <div class="padding-right">

                {{--<ul class="resumes-list">--}}

                @if(!empty($list))

                    @foreach ($list as $row)

                        <div class=" col-md-3 text-center job_listing">
                            <div class="candidate job-list-img">
                                <a href="{{route('job-detail', ['jobId' => $row['id']])}}">
                                    <h4 class="text-uppercase">{{$row['employerName']}}</h4>
                                    <img src="{{\App\Helpers\GlobalHelper::setEmployerImage($row['employerPhoto'])}}" alt="{{$row['employerName']}}"  class="img-responsive">
                                    <span style="text-transform: uppercase" class="resume-meta-info">{{(strlen($row['title']) > 18) ? substr($row['title'],0,15).'...' : $row['title']}}</span>
                                    <ul class="list-unstyled text-center about-candidate">
                                        <li><span>{{($row['type'] == 1) ? ' FULL TIME' : 'PART TIME'}}</span></li>
                                        <li><span>{{\App\Helpers\GlobalHelper::getAverageSalary($row['salary_min'], $row['salary_max'])}}</span></li>
                                        <li><i>{{$row['provinceName']}}</i></li>
                                    </ul>
                                </a>
                                <div class="hidden text-uppercase view-resume">
                                    <a href="{{route('job-detail', ['jobId' => $row['id']])}}" class="btn"><span class="btn animated slideInUp align-center">Lihat Lowongan</span></a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <p> Lowongan kerja tidak ditemukan. Coba gunakan kriteria pencarian lain</p>
                @endif
                {{--</ul>--}}
                <div class="clearfix"></div>

                {{$link}}

            </div>
        </div>

    </div>

    <div style="margin-bottom: 20px"></div>

@endsection