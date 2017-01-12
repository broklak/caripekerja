@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div id="titlebar" class="single submit-page add-job">
        <h2>LOWONGAN KERJA SAYA</h2>
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
                {{--<th><i class="fa fa-money"></i> Gaji</th>--}}
                <th><i class="fa fa-calendar"></i> Lowongan Berakhir</th>
                <th><i class="fa fa-check-square"></i> Status</th>
                {{--<th><i class="fa fa-user"></i> Jumlah Pelamar</th>--}}
                <th></th>
            </tr>

            <!-- Item #1 -->
            @if(!empty($job))
                @foreach ($job as $row)
                    <tr>
                        <td class="title"><a href="{{route('job-detail', ['jobId' => $row['id']])}}">{{$row['title']}}</a></td>
                        {{--<td>{{\App\Helpers\GlobalHelper::moneyFormat($row['salary_min'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['salary_max'])}}</td>--}}
                        <td>{{date('j F Y', strtotime($row['end_date']))}}</td>
                        <td>{{($row['status'] == 1) ? 'Aktif' : 'Tidak Aktif'}}</td>
                        {{--<td><a href="manage-applications.html" class="button">Show (9)</a></td>--}}
                        <td class="action">
                            <a href="{{route('job-edit', ['jobId' => $row['id']])}}"><i class="fa fa-pencil"></i> Edit</a>
                            @if($row['status'] == 0)
                                <a onclick="return confirm('Anda akan membuka lowongan {{$row['title']}}, lanjutkan?')" href="{{route('change-application-status', ['id' => $row['id'], 'status' => 1])}}"><i class="fa fa-check-circle"></i> Aktifkan Lowongan</a>
                             @else
                                <a onclick="return confirm('Anda akan menutup lowongan {{$row['title']}}, lanjutkan?')" href="{{route('change-application-status', ['id' => $row['id'], 'status' => 0])}}"><i class="fa fa-times-circle"></i> Tutup Lowongan</a>
                             @endif
                            <a onclick="return confirm('Anda akan menghapus lowongan {{$row['title']}}, lanjutkan?')" href="{{route('job-delete', ['id' => $row['id']])}}" class="delete"><i class="fa fa-remove"></i> Hapus</a>
                        </td>
                    </tr>
                @endforeach

            @else
                <tr>
                    <td colspan="5" style="text-align: center">Anda belum pernah memasang lowongan di caripekerja. <a class="button" href="{{route('job-create')}}">Buat Lowongan Kerja</a></td>
                </tr>
            @endif

        </table>
        {{$link}}
    </div>

    </div>

    <div class="margin-bottom-25"></div>

@endsection