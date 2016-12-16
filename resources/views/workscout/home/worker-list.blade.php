@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <style>
        .chosen-single span, .result-selected { font-family: 'FontAwesome',"Roboto", Arial, Helvetica, sans-serif; } /* This is for the placeholder */
    </style>

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
                        <option value="0">@if(!isset($param['category']) || $param['category'] == 0) &#xf0b1 &nbsp;&nbsp; @endif Semua Profesi</option>
                        @foreach($category as $key => $row)
                            <option @if(isset($param['category']) && $param['category'] == $row['id']) selected @endif value="{{$row['id']}}">@if(isset($param['category']) && $param['category'] == $row['id']) &#xf0b1 &nbsp;&nbsp; @endif {{$row['name']}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="city" class="chosen-select">
                        <option value="0">@if(!isset($param['city']) || $param['city'] == 0) &#xf041 &nbsp;&nbsp;  @endif Semua Lokasi</option>
                        @foreach ($province as $rowProvince)
                            <option @if(isset($param['city']) && $param['city'] == $rowProvince['id']) selected @endif value="{{$rowProvince['id']}}">@if(isset($param['city']) && $param['city'] == $rowProvince['id']) &#xf041 &nbsp; &nbsp; @endif{{$rowProvince['name']}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Jenis Kelamin" name="gender" class="chosen-select">
                        <option value="0">@if(!isset($param['gender']) || $param['gender'] == 0) &#xf224; &nbsp; &nbsp; @endif Semua Jenis Kelamin</option>
                        <option @if(isset($param['gender']) && $param['gender'] == 1) selected @endif value="1">@if(isset($param['gender']) && $param['gender'] == 1) &#xf224; &nbsp; &nbsp; @endif Laki - Laki</option>
                        <option @if(isset($param['gender']) && $param['gender'] == 2) selected @endif value="2">@if(isset($param['gender']) && $param['gender'] == 2) &#xf224; &nbsp; &nbsp; @endif Perempuan</option>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Status" name="status" class="chosen-select">
                        <option value="0">@if(!isset($param['status']) || $param['status'] == 0) &#xf004 &nbsp; &nbsp; @endif Semua Status</option>
                        <option @if(isset($param['status']) && $param['status'] == 1) selected @endif value="1">@if(isset($param['status']) && $param['status'] == 1) &#xf004 &nbsp; &nbsp; @endif Sudah Menikah</option>
                        <option @if(isset($param['status']) && $param['status'] == 2) selected @endif value="2">@if(isset($param['status']) && $param['status'] == 2) &#xf004 &nbsp; &nbsp; @endif Belum Menikah</option>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="degree" class="chosen-select">
                        <option value="0">@if(!isset($param['degree']) || $param['degree'] == 0) &#xf19d &nbsp; &nbsp; @endif Semua Pendidikan</option>

                        @foreach ($degree as $key => $row)
                            <option @if(isset($param['degree']) && $param['degree'] == $row) selected @endif>@if(isset($param['degree']) && $param['degree'] == $row) &#xf19d &nbsp; &nbsp; @endif {{$row}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Status" name="exp" class="chosen-select">
                        <option value="0">&#xf017 &nbsp; &nbsp; Semua Rentang Pengalaman</option>
                        <option value="1">1 - 5 Tahun</option>
                        <option value="2">5 - 10 Tahun</option>
                        <option value="2">Lebih Dari 10 Tahun</option>
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
                <button style="color: #fff;font-size: 16px;width: 100%" class="button">Filter</button>

            </form>
            <div class="margin-bottom-40"></div>
        </div>
        <!-- Widgets / End -->

        <!-- Recent Jobs -->
        <div class="twelve columns">
            <div class="padding-right">

                    @if(!empty($list))

                        @foreach ($list as $row)

                        <div class=" col-md-3 text-center">
                        <div class="candidate">
                            <a href="{{route('worker-detail', ['workerId' => $row['id']])}}">
                            <h4 class="text-uppercase">{{$row['name']}}</h4>
                            <img src="{{\App\Helpers\GlobalHelper::setUserImage($row['photo_profile'])}}" alt="{{$row['name']}}"  class="img-responsive">
                            <span style="text-transform: uppercase" class="resume-meta-info">
                                {{\App\Helpers\GlobalHelper::getAgeByBirthdate($row['birthdate'])}}
                            </span>
                            <ul class="list-unstyled text-center about-candidate">
                                @php
                                $category = explode(',',\App\Helpers\GlobalHelper::getWorkerCategory($row['category']));
                                @endphp
                                <li><span style="text-transform: uppercase;font-weight: 600">{{(!empty($category[0])) ? $category[0] : 'Admin'}}</span></li>
                                <li class="text-uppercase"><span>Belum dinilai</span></li>
                                <li><i>{{\App\Helpers\GlobalHelper::getCityName($row['city'])}}</i></li>
                            </ul>
                            </a>
                        </div>
            </div>

                        @endforeach
                    @else
                        <p> Pekerja tidak ditemukan. Coba gunakan kriteria pencarian lain</p>
                    @endif

                <div class="clearfix"></div>

                {{$link}}

            </div>
        </div>

    </div>

    <div style="margin-bottom: 20px"></div>

@endsection