@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div id="titlebar" class="single submit-page add-job">
        <h2>LIHAT PELAMAR</h2>
    </div>

    <div class="container">

        <div class="four columns">
            @include('user.myaccount-link')
        </div>

        <!-- Table -->
        <div class="twelve columns">

            {{--<p class="margin-bottom-25">Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.</p>--}}

            {!! session('displayMessage') !!}

            <table class="manage-table responsive-table">

                <tr>
                    <th><i class="fa fa-file-text"></i> Pekerjaan</th>
                    <th><i class="fa fa-user"></i> Nama Pelamar</th>
                    <th><i class="fa fa-user-secret"></i> Umur</th>
                    <th><i class="fa fa-graduation-cap"></i> Pendidikan</th>
                    <th></th>
                </tr>

                <!-- Item #1 -->
                @if(!empty($worker))
                    @foreach ($worker as $row)
                        <tr>
                            <td class="title"><a href="{{route('job-detail', ['jobId' => $row['id']])}}">{{$row['title']}}</a></td>
                            <td class="title">{{$row['workersName']}}</td>
                            <td>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($row['birthdate'])}}</td>
                            <td>{{$row['degree']}}</td>
                            <td class="action">
                                <a href="{{route('worker-detail', ['workerId' => $row['id']])}}"><i class="fa fa-user"></i> Lihat Profil</a>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="5" style="text-align: center">Belum ada pekerja yang melamar di lowongan anda</td>
                    </tr>
                @endif

            </table>
            {{$link}}
        </div>

    </div>

    <div class="margin-bottom-25"></div>

@endsection