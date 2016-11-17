@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="resumes-section padd-tb">

    <div class="container">

        <div class="row">

            <div class="col-md-3 col-sm-4 filter-worker">

                <h2>Filter Pekerja</h2>

                <form method="post" action="{{url('/filter-pekerja')}}">
                    {{csrf_field()}}
                    <aside>

                        <div class="sidebar" style="margin-bottom: 20px">

                                <div class="selector" style="background-color: #fff;">

                                    <select name="category" class="full-width">

                                        <option value="0">Semua Profesi</option>

                                        @foreach($category as $key => $row)
                                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                                        @endforeach

                                    </select>

                                </div>
                        </div>

                        <div class="sidebar" style="margin-bottom: 20px">
                                <div class="selector" style="background-color: #fff;">

                                    <select name="gender" class="full-width">

                                        <option value="0">Semua Gender</option>

                                        <option value="1">Pria</option>
                                        <option value="2">Wanita</option>

                                    </select>
                                </div>
                        </div>

                        <div class="sidebar" style="margin-bottom: 20px">
                            <div class="selector" style="background-color: #fff;">

                                <select name="city" class="full-width">

                                    <option value="0">Semua Kota</option>

                                    @foreach ($province as $rowProvince)
                                        <option value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                                    @endforeach>

                                </select>
                            </div>
                        </div>

                        <div class="sidebar" style="margin-bottom: 20px">
                            <div class="selector" style="background-color: #fff;">

                                <select name="status" class="full-width">

                                    <option value="0">Semua Status</option>

                                    <option value="1">Menikah</option>
                                    <option value="2">Belum Menikah</option>

                                </select>
                            </div>
                        </div>

                        <div class="sidebar" style="margin-bottom: 20px">
                            <div class="selector" style="background-color: #fff;">

                                <select name="degree" class="full-width">

                                    <option value="0">Semua Latar Pendidikan Terakhir</option>

                                    @foreach ($degree as $key => $row)
                                        <option>{{$row}}</option>
                                    @endforeach>

                                </select>
                            </div>
                        </div>

                        <div class="resum-form sidebar" style="margin-bottom: 20px;width: 100%;margin: 0;background: none">
                            <input type="text" name="min_exp" class="full-width" placeholder="Berapa Tahun Pengalaman">
                        </div>

                        <div class="resum-form sidebar" style="margin-bottom: 20px;width: 100%;margin: 0;background: none">
                            <input style="width: 48%;float: left;margin-right: 10px" type="text" name="min_exp" placeholder="Umur Min" class="full-width">
                            <input style="width: 48%" type="text" name="max_exp" placeholder="Umur Max" class="full-width">
                        </div>

                        <div class="resum-form sidebar" style="margin-bottom: 20px;width: 50%;text-align: center;float: none">
                            <div> <input type="submit" value="Cari"> </div>
                        </div>


                    </aside>
                </form>
            </div>

            <div class="col-md-9 col-sm-8">

                <div class="resumes-content">

                    <h2>Menampilkan Seluruh Pekerja</h2>

                    @foreach ($list as $row)

                        <div class="box">

                            <div class="frame"><a href="{{route('worker-detail', ['workerId' => $row['id']])}}"><img style="width: 165px;height: 150px" src="{{\App\Helpers\GlobalHelper::setUserImage($authRole,$row['photo_profile'])}}" alt="img"></a></div>

                                <div class="text-box">

                                    <h3><a href="{{route('worker-detail', ['workerId' => $row['id']])}}">{{substr($row['name'],0,15)}}</a></h3>

                                    <h5>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($row['birthdate'])}} Tahun</h5>

                                    <div class="clearfix"> <strong><i class="fa fa-map-marker"></i>{{\App\Helpers\GlobalHelper::getCityName($row['city'])}}</strong></div>

                                    <div class="btn-row"> <a href="{{route('worker-detail', ['workerId' => $row['id']])}}" class="contact">Lihat Profil</a> </div>

                                </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

<!--RECENT JOB SECTION END-->

@endsection