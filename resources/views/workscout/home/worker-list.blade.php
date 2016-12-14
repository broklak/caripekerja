@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="title-page"></div>

    <div class="container">
        <!-- Widgets -->
        <div class="four columns">
            <!-- Skills -->
            <form action="{{route('worker-list')}}" method="post">
                {{csrf_field()}}
                <div class="widget">
                    <select data-placeholder="Pilih Profesi" name="category" class="chosen-select">
                        <option value="0">Semua Profesi</option>
                        @foreach($category as $key => $row)
                            <option @if(isset($param['category']) && $param['category'] == $row['id']) selected @endif value="{{$row['id']}}">{{$row['name']}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="city" class="chosen-select">
                        <option value="0">Semua Kota</option>
                        @foreach ($province as $rowProvince)
                            <option @if(isset($param['city']) && $param['city'] == $rowProvince['id']) selected @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <select data-placeholder="Pilih Kota Tinggal" name="degree" class="chosen-select">
                        <option value="0">Semua Latar Pendidikan Terakhir</option>

                        @foreach ($degree as $key => $row)
                            <option @if(isset($param['degree']) && $param['degree'] == $row) selected @endif>{{$row}}</option>
                        @endforeach>
                    </select>

                </div>

                <div class="widget">
                    <ul class="checkboxes">
                        <li>
                            <input id="check-6" type="checkbox" name="check" value="check-6" checked>
                            <label for="check-6">Semua Rentang</label>
                        </li>
                        <li>
                            <input id="check-7" type="checkbox" name="check" value="check-7">
                            <label for="check-7">18 - 25 Tahun</label>
                        </li>
                        <li>
                            <input id="check-8" type="checkbox" name="check" value="check-8">
                            <label for="check-8">25 - 30 Tahun</label>
                        </li>
                        <li>
                            <input id="check-9" type="checkbox" name="check" value="check-9">
                            <label for="check-9">30 - 40 Tahun</label>
                        </li>
                        <li>
                            <input id="check-10" type="checkbox" name="check" value="check-10">
                            <label for="check-10">Diatas 40 Tahun</label>
                        </li>
                    </ul>

                </div>

                <div class="margin-top-15"></div>
                <button class="button">Filter</button>

            </form>
        </div>
        <!-- Widgets / End -->

        <!-- Recent Jobs -->
        <div class="twelve columns">
            <div class="padding-right">

                <ul class="resumes-list">

                    @if(!empty($list))

                        @foreach ($list as $row)

                            <li>
                                <a href="{{route('worker-detail', ['workerId' => $row['id']])}}">
                                    <h4>{{$row['name']}}</h4>
                                    <img src="{{\App\Helpers\GlobalHelper::setUserImage($row['photo_profile'])}}" alt="">
                                    <span class="experience-list">PENGALAMAN 1 TAHUN</span>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <p> Pekerja tidak ditemukan. Coba gunakan kriteria pencarian lain</p>
                    @endif
                </ul>
                <div class="clearfix"></div>

                {{$link}}

            </div>
        </div>

    </div>

    <div style="margin-bottom: 20px"></div>

@endsection