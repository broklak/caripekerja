@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div style="margin-top: 30px">

    </div>

    <div class="container">

    <!-- Recent Jobs -->
    <div class="eleven columns">
        <div class="padding-right">

            <!-- Company Info -->
            <div class="company-info">
                <img src="{{\App\Helpers\GlobalHelper::setEmployerImage($detail['photo_profile'])}}" alt="">
                <div class="content">
                    <h4>{{$detail['name']}}</h4>
                    <span><a href="#"><i class="fa fa-map"></i> {{\App\Helpers\GlobalHelper::getCityName($detail['city'])}}</a></span>
                </div>
                <a class="button" style="margin-top: 20px;margin-left: 20px" href="{{route('myaccount-index')}}">Ganti Profil</a>
                <div class="clearfix"></div>
            </div>

            <p class="margin-reset">
                {{(empty($detail['description'])) ? 'Belum ada deskripsi usaha' : $detail['description']}}
            </p>
        </div>

    </div>


    <!-- Widgets -->
    <div class="five columns">

        <!-- Sort by -->
        <div class="widget">
            <h4>Data Usaha</h4>

            <div class="job-overview">

                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <strong>Alamat</strong>
                            <span>{{$detail['address']}}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-folder"></i>
                        <div>
                            <strong>Bidang Usaha</strong>
                            <span>{{$detail['ukm_category']}}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-user"></i>
                        <div>
                            <strong>Nama Pemilik</strong>
                            <span>{{$detail['name_owner']}}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-link"></i>
                        <div>
                            <strong>Website</strong>
                            <span><a target="_blank" href="{{$detail['website']}}">{{$detail['website']}}</a></span>
                        </div>
                    </li>
                </ul>

            </div>

        </div>

    </div>
    <!-- Widgets / End -->

    <div class="sixteen columns">

        <h2 style="margin: 15px 0">Pekerjaan Dari UKM {{$detail['name']}}</h2>

        <table class="manage-table responsive-table">

            <tr>
                <th><i class="fa fa-file-text"></i> Judul Pekerjaan</th>
                <th><i class="fa fa-calendar"></i> Tanggal Posting</th>
                <th><i class="fa fa-money"></i> Gaji</th>
                <th><i class="fa fa-check-square"></i> Status</th>
            </tr>

            @if(!empty($job))

                @foreach ($job as $row)

                    <tr>
                        <td class="title">{{$row['title']}}</td>
                        <td class="">{{date('j F Y', strtotime($row['created_at']))}}</td>
                        <td class="">{{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</td>
                        <td class="">{{($row['status'] == 1) ? 'Aktif' : 'Tidak Aktif' }}</td>
                    </tr>

                @endforeach

            @else

                <tr>
                    <td colspan="4" class="centered">Belum ada pekerjaan yang dipasang</td>
                </tr>

            @endif

        </table>

        {{$link}}

    </div>


    </div>

@endsection