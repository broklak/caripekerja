@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <style>
        .chosen-single span, .result-selected { font-family: 'FontAwesome',"Roboto", Arial, Helvetica, sans-serif; } /* This is for the placeholder */
    </style>
    <div class="title-page list-worker"></div>
    <div class="clearfix"></div>

    <div class="container worker-step">
        <div class="step-left">
            <div class="steps">
                <img src="{{asset('images')}}/top-up-pic.png" />
                <label class="topup-step">TOP UP</label>
            </div>
            <img class="arrow-step" src="{{asset('images')}}/arrow-pic.png">
            <div class="steps">
                <img src="{{asset('images')}}/pilih-pekerja-pic.png" />
                <label class="other-step">PILIH <br/> pekerja</label>
            </div>
            <img class="arrow-step" src="{{asset('images')}}/arrow-pic.png">
            <div class="steps">
                <img class="kontak-step" src="{{asset('images')}}/kontak-pic.png" />
                <label class="other-step">HUBUNGI <br /> pekerja</label>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="need-help">
            <label>Anda butuh bantuan? &nbsp; 0877 8023 3123</label>
            <img src="{{asset('images')}}/whatsapp-pic.png">
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="container package-worker-wrapper margin-bottom-30">
        <div class="four columns">
            <h4>BASIC</h4>
            <div class="package-worker">
                <div class="package-detail">
                    <span class="package-contact"><strong>20</strong> kontak</span>
                    <span class="package-price-list">Rp 100,000</span>
                </div>
                <div class="package-buy">
                    <a href="{{route('topup-create')}}" class="buy-kuota">BELI</a>
                </div>
            </div>
        </div>
        <div class="four columns">
            <h4>BRONZE</h4>
            <div class="package-worker">
                <div class="package-detail">
                    <span class="package-contact"><strong>80</strong> kontak</span>
                    <span class="package-price-list">Rp 200,000</span>
                </div>
                <div class="package-buy">
                    <span class="popular-package">POPULER</span>
                    <a href="{{route('topup-create')}}" class="buy-kuota">BELI</a>
                </div>
            </div>
        </div>
        <div class="four columns">
            <h4>SILVER</h4>
            <div class="package-worker">
                <div class="package-detail">
                    <span class="package-contact"><strong>250</strong> kontak</span>
                    <span class="package-price-list">Rp 500,000</span>
                </div>
                <div class="package-buy">
                    <a href="{{route('topup-create')}}" class="buy-kuota">BELI</a>
                </div>
            </div>
        </div>
        <div class="four columns">
            <h4>PLATINUM</h4>
            <div class="package-worker">
                <div class="package-detail">
                    <span class="package-contact"><strong>600</strong> kontak</span>
                    <span class="package-price-list">Rp 800,000</span>
                </div>
                <div class="package-buy">
                    <a href="{{route('topup-create')}}" class="buy-kuota">BELI</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container job-filter margin-bottom-40">
        <div class="four columns">
            <h2>FILTER PEKERJA</h2>
            <div class="kategoribox"></div>
        </div>

        <div class="twelve columns">
            <div class="widget sort">
                    <span class="widget-sort-title">URUTKAN</span>
                    <a href="{{route('worker-list')}}" class="widget-sort-select worker-list @if(!isset($param['sort'])) active @endif">TERBARU <i class="fa fa-chevron-down"></i></a>
                    <a href="{{route('worker-list')}}?sort=exp" class="widget-sort-select worker-list @if(isset($param['sort']) && $param['sort'] == 'exp') active @endif">PENGALAMAN <i class="fa fa-chevron-down"></i></a>
                    <a href="{{route('worker-list')}}?sort=age" class="widget-sort-select worker-list @if(isset($param['sort']) && $param['sort'] == 'age') active @endif">USIA <i class="fa fa-chevron-down"></i></a>
                    <a href="{{route('worker-list')}}?sort=degree" class="widget-sort-select worker-list @if(isset($param['sort']) && $param['sort'] == 'degree') active @endif">PENDIDIKAN <i class="fa fa-chevron-down"></i></a>
                    <a href="{{route('worker-list')}}?sort=rating" class="widget-sort-select worker-list @if(isset($param['sort']) && $param['sort'] == 'rating') active @endif">RATING <i class="fa fa-chevron-down"></i></a>
            </div>
            <div class="widget sort-mobile" style="margin-bottom: -30px">
                <form action="{{route('worker-list')}}" method="post">
                    <select name="sort">
                        <option value="0">Urut Berdasarkan</option>
                        <option value="1">Pengalaman</option>
                        <option value="2">Usia</option>
                        <option value="3">Pendidikan</option>
                        <option value="4">Rating</option>
                    </select>
                </form>
            </div>
        </div>

    </div>

    <div class="container">
        <!-- Widgets -->
        <div class="four columns">
            <!-- Skills -->
            <form action="{{route('worker-list')}}" method="post">
                {{csrf_field()}}
                <div class="widget wrapper">
                    <select data-placeholder="Pilih Profesi" name="category" class="chosen-select desktop-filter">
                        <option value="0">Semua Profesi</option>
                        @foreach($category as $key => $row)
                            <option @if(isset($param['category']) && $param['category'] == $row['id']) selected @endif value="{{$row['id']}}">{{$row['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="city" class="chosen-select desktop-filter">
                        <option value="0">Semua Lokasi</option>
                        @foreach ($province as $rowProvince)
                            <option @if(isset($param['city']) && $param['city'] == $rowProvince['id']) selected @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                        @endforeach>
                    </select>
                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Jenis Kelamin" name="gender" class="chosen-select desktop-filter">
                        <option value="0">Semua Jenis Kelamin</option>
                        <option @if(isset($param['gender']) && $param['gender'] == 1) selected @endif value="1">Laki - Laki</option>
                        <option @if(isset($param['gender']) && $param['gender'] == 2) selected @endif value="2">Perempuan</option>
                    </select>
                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Status" name="status" class="chosen-select desktop-filter">
                        <option value="0">Semua Status</option>
                        <option @if(isset($param['status']) && $param['status'] == 1) selected @endif value="1">Sudah Menikah</option>
                        <option @if(isset($param['status']) && $param['status'] == 2) selected @endif value="2">Belum Menikah</option>
                    </select>
                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="degree" class="chosen-select desktop-filter">
                        <option value="0">Semua Pendidikan</option>

                        @foreach ($degree as $key => $row)
                            <option @if(isset($param['degree']) && $param['degree'] == $row) selected @endif>{$row}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Status" name="exp" class="chosen-select desktop-filter">
                        <option value="0">Semua Rentang Pengalaman</option>
                        <option @if(isset($param['exp']) && $param['exp'] == 1) selected @endif value="1">1 - 5 Tahun</option>
                        <option @if(isset($param['exp']) && $param['exp'] == 2) selected @endif value="2">5 - 10 Tahun</option>
                        <option @if(isset($param['exp']) && $param['exp'] == 3) selected @endif value="3">Lebih Dari 10 Tahun</option>
                    </select>

                </div>

                <div class="widget">
                    <ul class="checkboxes">
                        <li>
                            <input id="check-6" type="checkbox" name="age[]" value="0" @if((isset($param['age']) && in_array('0', $param['age'])) || !isset($param['age'])) checked @endif >
                            <label for="check-6">Semua Rentang Usia</label>
                        </li>
                        <li>
                            <input id="check-7" type="checkbox" name="age[]" value="1" @if(isset($param['age']) && in_array('1', $param['age'])) checked @endif >
                            <label for="check-7">18 - 25 Tahun</label>
                        </li>
                        <li>
                            <input id="check-8" type="checkbox" name="age[]" value="2" @if(isset($param['age']) && in_array('2', $param['age'])) checked @endif >
                            <label for="check-8">26 - 35 Tahun</label>
                        </li>
                        <li>
                            <input id="check-9" type="checkbox" name="age[]" value="3" @if(isset($param['age']) && in_array('3', $param['age'])) checked @endif >
                            <label for="check-9">35 - 45 Tahun</label>
                        </li>
                        <li>
                            <input id="check-10" type="checkbox" name="age[]" value="4" @if(isset($param['age']) && in_array('4', $param['age'])) checked @endif >
                            <label for="check-10">Diatas 45 Tahun</label>
                        </li>
                    </ul>

                </div>

                <div class="margin-top-15"></div>
                <button style="color: #fff;font-size: 16px;width: 100%" class="button">Filter</button>

            </form>
            <div class="margin-bottom-40"></div>
        </div>
        <!-- Widgets / End -->

        <!-- Recent Jobs -->
        <div class="twelve columns">
            <div class="padding-right">

                    @if(!empty($list))

                        @foreach ($list as $row)

                        <div class=" col-md-3 text-center">
                            <div class="candidate candidate-list-img">
                                <a href="{{route('worker-detail', ['workerId' => $row['id']])}}">
                                <h4 class="text-uppercase">{{\App\Helpers\GlobalHelper::simplifyName($row['name'])}}</h4>
                                <img src="{{\App\Helpers\GlobalHelper::setUserImage($row['photo_profile'])}}" alt="{{$row['name']}}"  class="img-responsive">
                                <span style="text-transform: uppercase" class="resume-meta-info">
                                    {{\App\Helpers\GlobalHelper::getAgeByBirthdate($row['birthdate'])}}
                                </span>
                                <ul class="list-unstyled text-center about-candidate">
                                    @php
                                    $category = explode(',',\App\Helpers\GlobalHelper::getWorkerCategory($row['category']));
                                    @endphp
                                    <li><span style="text-transform: uppercase;font-weight: 600">{{(!empty($category[0])) ? $category[0] : 'Admin'}}</span></li>
                                    <li class="text-uppercase"><span>
                                            <div class="rating no-stars">
                                                <div class="star-rating"></div>
                                                <div class="star-bg"></div>
                                            </div>
                                        </span></li>
                                    <li><i>{{\App\Helpers\GlobalHelper::getCityName($row['city'])}}</i></li>
                                </ul>
                                </a>
                                <div class="hidden text-uppercase view-resume">
                                    <a href="{{route('worker-detail', ['workerId' => $row['id']])}}" class="btn"><span class="btn animated slideInUp align-center">Lihat Profil</span></a>
                                </div>
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

    <div style="margin-bottom: 20px"></div>

@endsection