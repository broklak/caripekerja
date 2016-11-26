@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="resumes-section padd-tb">

    <div class="container">

        <div class="row">

            <div class="col-md-3 col-sm-4 filter-worker">

                <h2>Filter Pekerja</h2>

                <form method="post" action="{{route('worker-list')}}">
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

                                    <select name="gender" class="full-width">

                                        <option value="0">Semua Gender</option>

                                        <option @if(isset($param['gender']) && $param['gender'] == 1) selected @endif value="1">Pria</option>
                                        <option @if(isset($param['gender']) && $param['gender'] == 2) selected @endif value="2">Wanita</option>

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

                        <div class="sidebar" style="margin-bottom: 20px">
                            <div class="selector" style="background-color: #fff;">

                                <select name="status" class="full-width">

                                    <option value="0">Semua Status</option>

                                    <option @if(isset($param['status']) && $param['status'] == 1) selected @endif value="1">Menikah</option>
                                    <option @if(isset($param['status']) && $param['status'] == 2) selected @endif value="2">Belum Menikah</option>

                                </select>
                            </div>
                        </div>

                        <div class="sidebar" style="margin-bottom: 20px">
                            <div class="selector" style="background-color: #fff;">

                                <select name="degree" class="full-width">

                                    <option value="0">Semua Latar Pendidikan Terakhir</option>

                                    @foreach ($degree as $key => $row)
                                        <option @if(isset($param['degree']) && $param['degree'] == $row) selected @endif>{{$row}}</option>
                                    @endforeach>

                                </select>
                            </div>
                        </div>

                        <div class="resum-form sidebar" style="margin-bottom: 20px;width: 100%;margin: 0;background: none">
                            <input type="text" name="exp" value="{{ isset($param['exp']) ? $param['exp'] : '' }}" class="full-width" placeholder="Berapa Tahun Pengalaman">
                        </div>

                        <div class="resum-form sidebar" style="margin-bottom: 20px;width: 100%;margin: 0;background: none">
                            <input style="width: 48%;float: left;margin-right: 10px" type="text" name="min_age" value="{{ isset($param['min_age']) ? $param['min_age'] : '' }}" placeholder="Umur Min" class="full-width">
                            <input style="width: 48%" type="text" name="max_age" placeholder="Umur Max" value="{{ isset($param['max_age']) ? $param['max_age'] : '' }}" class="full-width">
                        </div>

                        <div class="resum-form sidebar" style="margin-bottom: 20px;width: 50%;text-align: center;float: none">
                            <div> <input type="submit" value="Cari"> </div>
                        </div>


                    </aside>
                </form>
            </div>

            <div class="col-md-9 col-sm-8">

                <div class="resumes-content">

                    <h2>
                        @if($categoryTitle == 'all')
                            Menampilkan Seluruh Pekerja
                        @elseif($categoryTitle != null)
                            Menampilkan Profesi {{$categoryTitle}}
                        @else
                            Profesi Tidak Ditemukan
                        @endif
                    </h2>

                    @if(!empty($list))

                        @foreach ($list as $row)

                            <div class="box">

                                <div class="frame"><a href="{{route('worker-detail', ['workerId' => $row['id']])}}"><img class="list-worker-image" src="{{\App\Helpers\GlobalHelper::setUserImage($row['photo_profile'])}}" alt="img"></a></div>

                                    <div class="text-box">

                                        <h3><a href="{{route('worker-detail', ['workerId' => $row['id']])}}">{{substr($row['name'],0,15)}}</a></h3>

                                        <h5>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($row['birthdate'])}} Tahun</h5>

                                        <div class="clearfix"> <strong class="city-name-list"><i class="fa fa-map-marker"></i>{{\App\Helpers\GlobalHelper::getCityName($row['city'])}}</strong></div>

                                        <div class="btn-row"> <a href="{{route('worker-detail', ['workerId' => $row['id']])}}" class="contact">Lihat Profil</a> </div>

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

    </div>

</section>

<!--RECENT JOB SECTION END-->

@endsection