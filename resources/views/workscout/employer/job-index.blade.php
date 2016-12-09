@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container">

        <div class="title-page">
            <h2>Lowongan Pekerjaan</h2>
        </div>

    <!-- Recent Jobs -->
    <div class="eleven columns">
        <div class="padding-right">

            <form action="#" method="get" class="list-search">
                <button><i class="fa fa-search"></i></button>
                <input type="text" placeholder="Cari Lowongan Kerja Berdasarkan Kata Kunci" value=""/>
                <div class="clearfix"></div>
            </form>

            <ul class="job-list full">
                @if(!empty($list))

                    @foreach ($list as $row)

                        <li>
                            <a href="{{($authRole == 'worker') ? route('job-apply', ['jobId' => $row['id']]) : route('login')}}" onclick="@if($authRole == 'worker') return confirm('Anda akan melamar pekerjaan {{$row['title']}} di {{$row['employerName']}}. Lanjutkan Proses ?') @else alert('Silahkan login sebagai pekerja untuk melamar') @endif ">
                                    <img src="{{\App\Helpers\GlobalHelper::setEmployerImage($row['employerPhoto'])}}" alt="">
                                    <div class="job-list-content">
                                        <h4>{{$row['title']}}</h4>
                                        <div class="job-icons">
                                            <span><i class="fa fa-briefcase"></i> {{$row['employerName']}}</span>
                                            <span><i class="fa fa-map-marker"></i>{{$row['provinceName']}}</span>
                                            <span class="money"><i class="fa fa-money"></i> {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</span>
                                        </div>
                                        <p>{{empty($row['description']) ? 'Tidak ada deskripsi' : $row['description']}}</p>
                                    </div>
                                @if($authRole != 'employer') <span class="apply-job">Lamar</span> @endif
                            </a>
                            <div class="clearfix"></div>
                        </li>
                    @endforeach
                @else
                    <p> Lowongan tidak ditemukan. Coba gunakan kriteria pencarian lain</p>
                @endif
            </ul>
            <div class="clearfix"></div>

            {{$link}}

        </div>
    </div>


    <!-- Widgets -->
    <div class="five columns">

        <div class="five columns">
            <!-- Skills -->
            <form action="{{route('job-list')}}" method="post">
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

                <div class="widget">
                    <h4>Rentang Gaji</h4>

                    <ul class="checkboxes">
                        <li>
                            <input id="check-6" type="checkbox" name="check" value="check-6" checked>
                            <label for="check-6">Semua Rentang</label>
                        </li>
                        <li>
                            <input id="check-7" type="checkbox" name="check" value="check-7">
                            <label for="check-7">Rp 500,000 - Rp 1,000,000</label>
                        </li>
                        <li>
                            <input id="check-8" type="checkbox" name="check" value="check-8">
                            <label for="check-8">Rp 1,000,000 - Rp 3,000,000</label>
                        </li>
                        <li>
                            <input id="check-9" type="checkbox" name="check" value="check-9">
                            <label for="check-9">Rp 3,000,000 - Rp 5,000,000</label>
                        </li>
                        <li>
                            <input id="check-10" type="checkbox" name="check" value="check-10">
                            <label for="check-10">Lebih Dari Rp 5,000,000</label>
                        </li>
                    </ul>

                </div>

                <div class="margin-top-15"></div>
                <button class="button">Filter</button>

            </form>
        </div>

    </div>
    <!-- Widgets / End -->

    </div>

    <div style="margin-bottom: 20px"></div>

@endsection