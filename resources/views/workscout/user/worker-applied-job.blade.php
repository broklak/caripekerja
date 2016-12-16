@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div id="titlebar" class="single submit-page people-bg">
        <h2>LAMARAN KERJA SAYA</h2>
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
                    <th><i class="fa fa-building"></i> Nama Usaha</th>
                    <th><i class="fa fa-calendar"></i> Tanggal Lamar</th>
                    <th><i class="fa fa-check-square"></i> Status</th>
                    <th></th>
                </tr>

                @if(!empty($job))
                    @foreach ($job as $row)
                        <tr>
                            <td class="title"><a href="{{route('job-detail', ['jobId' => $row['id']])}}">{{$row['title']}}</a></td>
                            <td>{{$row['employerName']}}</td>
                            <td>{{date('j F Y', strtotime($row['created_at']))}}</td>
                            <td>
                                @if($row['status'] == 0)
                                    Diterima
                                @elseif($row['status'] == 1)
                                    Ditinjau
                                @else
                                    Ditutup
                                @endif
                            </td>
                            <td><a class="button" href="{{route('job-detail', ['id' => $row['id']])}}">Lihat Lowongan</a></td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="5" style="text-align: center">Anda belum pernah melamar kerja di caripekerja. <a class="button" href="{{route('job-list')}}">Cari Lowongan Kerja</a></td>
                    </tr>
                @endif

            </table>

        </div>

    </div>

    {{$link}}

    <div class="margin-bottom-25"></div>

@endsection