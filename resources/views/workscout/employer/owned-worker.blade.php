@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container">

        <div class="title-page">
            <h2>Pekerja Saya</h2>
        </div>

    <div class="eight columns">
        <!-- Select -->
        <select data-placeholder="Filter Status" class="chosen-select-no-single">
            <option value="">Filter status</option>
            <option value="1">Baru</option>
            <option value="2">Cocok</option>
            <option value="3">Tidak Cocok</option>
            <option value="4">Sudah Dipekerjakan</option>
            <option value="5">Blacklist</option>
        </select>
        <div class="margin-bottom-15"></div>
    </div>

    <div class="eight columns">
        <!-- Select -->
        <select data-placeholder="Urutkan" class="chosen-select-no-single">
            <option value="">Urutkan Berdasarkan Data Terbaru</option>
            <option value="name">Urutkan Berdasarkan Nama</option>
            <option value="rating">Urutkan Berdasarkan Rating</option>
        </select>
        <div class="margin-bottom-35"></div>
    </div>


    <!-- Applications -->
    <div class="sixteen columns">

        @foreach($worker as $row)
            <div class="application">
                <div class="app-content">

                    <!-- Name / Avatar -->
                    <div class="info">
                        <img src="{{\App\Helpers\GlobalHelper::setUserImage($row->photo_profile)}}" alt="">
                        <span>{{$row->name}}</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-phone"></i> {{$row->phone}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{$row->email}}</a></li>
                        </ul>
                    </div>

                    <!-- Buttons -->
                    <div class="buttons">
                        <a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Ubah Status</a>
                        <a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Catatan</a>
                        <a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Rincian</a>
                    </div>
                    <div class="clearfix"></div>

                </div>

                <!--  Hidden Tabs -->
                <div class="app-tabs">

                    <a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>

                    <!-- First Tab -->
                    <div class="app-tab-content" id="one-1">

                        <div class="select-grid">
                            <select data-placeholder="Application Status" class="chosen-select-no-single">
                                <option value="">Status Pekerja</option>
                                <option value="1">Baru</option>
                                <option value="2">Cocok</option>
                                <option value="3">Tidak Cocok</option>
                                <option value="4">Sudah Dipekerjakan</option>
                                <option value="5">Blacklist</option>
                            </select>
                        </div>

                        <div class="select-grid">
                            <input type="number" min="1" max="5" placeholder="Rating (isi 1 - 5)">
                        </div>

                        <div class="clearfix"></div>
                        <a href="#" class="button margin-top-15">Simpan</a>

                    </div>

                    <!-- Second Tab -->
                    <div class="app-tab-content"  id="two-1">
                        <textarea placeholder="Catatan Tentang Pekerja"></textarea>
                        <a href="#" class="button margin-top-15">Simpan</a>
                    </div>

                    <!-- Third Tab -->
                    <div class="app-tab-content"  id="three-1">
                        <i>Full Name:</i>
                        <span>{{$row->name}}</span>

                        <i>Pendidikan Akhir:</i>
                        <span>{{$row->degree}}</span>

                        <i>Umur:</i>
                        <span>{{\App\Helpers\GlobalHelper::getAgeByBirthdate($row->birthdate)}}</span>

                        <i>Status Pernikahan:</i>
                        <span>{{\App\Helpers\GlobalHelper::maritalStatus($row->marital)}}</span>

                        <i>Pengalaman Kerja:</i>
                        <span>{{$row->years_experience}} Tahun</span>
                    </div>

                </div>

                <!-- Footer -->
                <div class="app-footer">

                    <div class="rating no-stars">
                        <div class="star-rating"></div>
                        <div class="star-bg"></div>
                    </div>

                    <ul>
                        <li><i class="fa fa-file-text-o"></i> Baru</li>
                        <li><i class="fa fa-calendar"></i> {{date('j F Y', strtotime($row->created_at))}}</li>
                    </ul>
                    <div class="clearfix"></div>

                </div>
            </div>
        @endforeach


    </div>
    </div>
@endsection