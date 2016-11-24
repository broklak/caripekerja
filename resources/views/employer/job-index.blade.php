@extends('layouts.main')

@section('title', 'Home')

@section('content')

        <section class="recent-row padd-tb">

            <div class="container">

                <div class="row">

                    <div class="col-md-3 col-sm-4 filter-worker">

                        <h2>Cari Lowongan</h2>

                        <form method="post" action="{{route('job-list')}}">
                            {{csrf_field()}}
                            <aside>

                                <div class="sidebar" style="margin-bottom: 20px">

                                    <div class="selector" style="background-color: #fff;">

                                        <select name="category" class="full-width">

                                            <option value="0">Semua Profesi</option>

                                            @foreach($category as $key => $row)
                                                <option @if(isset($param['category']) && $param['category'] == $row['id']) selected @endif value="{{$row['id']}}">{{$row['name']}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="sidebar" style="margin-bottom: 20px">
                                    <div class="selector" style="background-color: #fff;">

                                        <select name="city" class="full-width">

                                            <option value="0">Semua Kota</option>

                                            @foreach ($province as $rowProvince)
                                                <option @if(isset($param['city']) && $param['city'] == $rowProvince['id']) selected @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                                            @endforeach>

                                        </select>
                                    </div>
                                </div>

                                <div class="resum-form sidebar" style="margin-bottom: 20px;width: 100%;margin: 0;background: none">
                                    <input style="width: 48%;float: left;margin-right: 10px" type="text" name="min_salary" value="{{ isset($param['min_salary']) ? $param['min_salary'] : '' }}" placeholder="Gaji Minimal" class="full-width">
                                    <input style="width: 48%" type="text" name="max_salary" placeholder="Gaji Maksimal" value="{{ isset($param['max_salary']) ? $param['max_salary'] : '' }}" class="full-width">
                                </div>

                                <div class="resum-form sidebar" style="margin-bottom: 20px;width: 50%;text-align: center;float: none">
                                    <div> <input type="submit" value="Cari"> </div>
                                </div>


                            </aside>
                        </form>
                    </div>

                    <div class="col-md-9 col-sm-8">

                        <div id="content-area">

                            <h2>Menampilkan Seluruh Pekerjaan</h2>

                            @if(!empty($list))

                                <ul id="myList">

                                    @foreach ($list as $row)

                                        <li style="display: list-item;">

                                            <div class="box">

                                                <div class="thumb-jobs"><a href="#"><img src="{{\App\Helpers\GlobalHelper::setEmployerImage($row['employerPhoto'])}}" alt="img"></a></div>

                                                <div class="text-col">

                                                    <div class="hold">

                                                        <h4><a href="#">{{$row['title']}}</a></h4>

                                                        <h5>{{$row['employerName']}}</h5>

                                                        <p>{{empty($row['description']) ? 'Tidak ada deskripsi' : $row['description']}}</p>

                                                        <a href="#" class="text"><i class="fa fa-map-marker"></i>{{$row['provinceName']}}</a>
                                                        <a href="#" class="text"><i class="fa fa-calendar"></i>Diposting {{\App\Helpers\GlobalHelper::getHowLongTime($row['created_at'])}}</a> </div>

                                                </div>

                                                <strong class="price"><i class="fa fa-money"></i>
                                                    @if($isValidWorker)
                                                        {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}
                                                    @else
                                                        <a style="color: #000;font-size: 14px" href="{{route('login')}}">Masuk sebagai pekerja untuk melihat gaji</a>
                                                    @endif
                                                </strong>
                                                @if($authRole != 'employer') <a href="{{($authRole == 'worker') ? route('job-apply', ['jobId' => $row['id']]) : route('login')}}" onclick="@if($authRole == 'worker') return confirm('Anda akan melamar pekerjaan {{$row['title']}} di {{$row['employerName']}}. Lanjutkan Proses ?') @else alert('Silahkan login sebagai pekerja untuk melamar') @endif " class="btn-1 btn-color-1 ripple">Lamar Pekerjaan</a> @endif
                                            </div>

                                        </li>

                                    @endforeach

                                </ul>

                            @else
                                <p>Lowongan kerja tidak ditemukan. Coba gunakan kriteria pencarian lain</p>
                            @endif
                        </div>

                        {{$link}}

                    </div>



                </div>

            </div>

        </section>

@endsection