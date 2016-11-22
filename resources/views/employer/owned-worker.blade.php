@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <section class="resume-process padd-tb">

        <div class="container">

            @include('user.myaccount-link')

        </div>

    </section>

    <section id="employer-signup" class="resum-form padd-tb @if($authRole == 'worker' || $authRole == null) hide @endif">

        <div class="container">
            {!! session('displayMessage') !!}
            <div class="row">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#semua">Semua</a></li>
                    <li><a data-toggle="tab" href="#cocok">Cocok</a></li>
                    <li><a data-toggle="tab" href="#nococok">Tidak Cocok</a></li>
                </ul>

                {{--SEMUA PEKERJA--}}
                <div class="tab-content">
                    <div id="semua" class="tab-pane fade in active">
                        <h3>Semua Pekerja Saya</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td><b>Nama Pekerja</b></td>
                                    <td><b>Nomor Handphone</b></td>
                                    <td><b>Email</b></td>
                                    <td><b>Tindakan</b></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($worker as $row)
                                    @if($row->status == 1)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                                <a target="_blank" href="{{route('worker-detail', ['workerId' => $row->worker_id])}}" class="button-link link-blue">Lihat Profil</a>
                                                <a href="{{route('change-worker-status', ['id' => $row->id, 'status' => 2])}}" class="button-link link-green">Cocok</a>
                                                <a href="{{route('change-worker-status', ['id' => $row->id, 'status' => 3])}}" class="button-link link-red">Tidak Cocok</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="cocok" class="tab-pane fade">
                        <h3>Pekerja yang cocok</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td><b>Nama Pekerja</b></td>
                                    <td><b>Nomor Handphone</b></td>
                                    <td><b>Email</b></td>
                                    <td><b>Tindakan</b></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($worker as $row)
                                    @if($row->status == 2)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                                <a target="_blank" href="{{route('worker-detail', ['workerId' => $row->worker_id])}}" class="button-link link-blue">Lihat Profil</a>
                                                <a href="{{route('change-worker-status', ['id' => $row->id, 'status' => 2])}}" class="button-link link-green">Cocok</a>
                                                <a href="{{route('change-worker-status', ['id' => $row->id, 'status' => 3])}}" class="button-link link-red">Tidak Cocok</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--PEKERJA TIDAK COCOK --}}
                        <div id="nococok" class="tab-pane fade">
                            <h3>Pekerja yang tidak cocok</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td><b>Nama Pekerja</b></td>
                                        <td><b>Nomor Handphone</b></td>
                                        <td><b>Email</b></td>
                                        <td><b>Tindakan</b></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($worker as $row)
                                        @if($row->status == 3)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->phone}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>
                                                    <a target="_blank" href="{{route('worker-detail', ['workerId' => $row->worker_id])}}" class="button-link link-blue">Lihat Profil</a>
                                                    <a href="{{route('change-worker-status', ['id' => $row->id, 'status' => 2])}}" class="button-link link-green">Cocok</a>
                                                    <a href="{{route('change-worker-status', ['id' => $row->id, 'status' => 3])}}" class="button-link link-red">Tidak Cocok</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>

        </div>

    </section>

    <!--EMPLOYER CHANGE PROFILE END-->
@endsection