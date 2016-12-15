@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <style>
        .chosen-single span, .result-selected { font-family: 'FontAwesome'; } /* This is for the placeholder */
    </style>

    <link rel="stylesheet" href="{{ asset("css") }}/dojo.css?version=1" id="colors">
    <div class="title-page list-worker"></div>
    <div class="clearfix"></div>

    <div class="container">
        <!-- Widgets -->
        <div class="four columns">
            <!-- Skills -->
            <form action="{{route('worker-list')}}" method="post">
                {{csrf_field()}}
                <div class="widget wrapperzz">
                    <select data-placeholder="Pilih Profesi" name="category" class="chosen-select">
                        <option value="0">&#xf0b1 &nbsp;&nbsp; Semua Profesi</option>
                        @foreach($category as $key => $row)
                            <option @if(isset($param['category']) && $param['category'] == $row['id']) selected @endif value="{{$row['id']}}">{{$row['name']}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="city" class="chosen-select">
                        <option value="0">&#xf041 &nbsp; &nbsp; Semua Lokasi</option>
                        @foreach ($province as $rowProvince)
                            <option @if(isset($param['city']) && $param['city'] == $rowProvince['id']) selected @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Jenis Kelamin" name="gender" class="chosen-select">
                        <option value="0">&#xf224; &nbsp; &nbsp; Semua Jenis Kelamin</option>
                        <option value="1">Laki - Laki</option>
                        <option value="2">Perempuan</option>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Status" name="marital" class="chosen-select">
                        <option value="0">&#xf004 &nbsp; &nbsp; Semua Status</option>
                        <option value="1">Sudah Menikah</option>
                        <option value="2">Belum Menikah</option>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="degree" class="chosen-select">
                        <option value="0">&#xf19d &nbsp; &nbsp; Semua Pendidikan</option>

                        @foreach ($degree as $key => $row)
                            <option @if(isset($param['degree']) && $param['degree'] == $row) selected @endif>{{$row}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Status" name="exp" class="chosen-select">
                        <option value="0">&#xf017 &nbsp; &nbsp; Semua Rentang Pengalaman</option>
                        <option value="1">Kurang dari 5 tahun</option>
                        <option value="2">Lebih dari 5 tahun</option>
                    </select>

                </div>

                <div class="widget">
                    <ul class="checkboxes">
                        <li>
                            <input id="check-6" type="checkbox" name="check" value="check-6" checked>
                            <label for="check-6">Semua Rentang Usia</label>
                        </li>
                        <li>
                            <input id="check-7" type="checkbox" name="check" value="check-7">
                            <label for="check-7">18 - 25 Tahun</label>
                        </li>
                        <li>
                            <input id="check-8" type="checkbox" name="check" value="check-8">
                            <label for="check-8">25 - 30 Tahun</label>
                        </li>
                        <li>
                            <input id="check-9" type="checkbox" name="check" value="check-9">
                            <label for="check-9">30 - 40 Tahun</label>
                        </li>
                        <li>
                            <input id="check-10" type="checkbox" name="check" value="check-10">
                            <label for="check-10">Diatas 40 Tahun</label>
                        </li>
                    </ul>

                </div>

                <div class="margin-top-15"></div>
                <button style="color: #fff" class="button">Filter</button>

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

                            {{--<li>--}}
                                {{--<a href="{{route('worker-detail', ['workerId' => $row['id']])}}">--}}
                                    {{--<h4>{{$row['name']}}</h4>--}}
                                    {{--<img src="{{\App\Helpers\GlobalHelper::setUserImage($row['photo_profile'])}}" alt="">--}}
                                    {{--<span class="experience-list">PENGALAMAN 1 TAHUN</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}

                        <div class=" col-md-3 text-center">
                        <div class="candidate">
                            <h4 class="text-uppercase">{{$row['name']}}</h4>
                            <img src="{{\App\Helpers\GlobalHelper::setUserImage($row['photo_profile'])}}" alt="{{$row['name']}}"  class="img-responsive">
                            <span class="resume-meta-info">
                                PENGALAMAN {{(!empty($row['years_experience'])) ? $row['years_experience'] : '1'}} TAHUN
                            </span>
                            <ul class="list-unstyled text-center about-candidate">
                                @php
                                $category = explode(',',\App\Helpers\GlobalHelper::getWorkerCategory($row['category']));
                                @endphp
                                <li><span>{{(!empty($category[0])) ? $category[0] : 'Admin'}}</span></li>
                                <li class="text-uppercase"><span>Belum ada rating</span></li>
                                <li><i>{{\App\Helpers\GlobalHelper::getCityName($row['city'])}}</i></li>
                            </ul>
                            <div class="hidden text-uppercase view-resume">
                                <a href="resume/jean-batiste/index.html" class="btn"><span class="btn animated slideInUp">Read Full Resume</span></a>
                            </div>
                        </div>
            </div>

                        @endforeach
                    @else
                        <p> Pekerja tidak ditemukan. Coba gunakan kriteria pencarian lain</p>
                    @endif
                {{--</ul>--}}
                <div class="clearfix"></div>

                {{$link}}

            </div>
        </div>

    </div>

    <div style="margin-bottom: 20px"></div>

@endsection