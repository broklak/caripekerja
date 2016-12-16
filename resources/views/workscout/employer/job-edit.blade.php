@extends('layouts.main')

@section('title', 'Home')

@section('content')

        <!-- Titlebar
================================================== -->
<div id="titlebar" class="single submit-page add-job">
    <h2>EDIT LOWONGAN</h2>
</div>

<div class="container">

    <!-- Submit Page -->
    <div class="sixteen columns">

        <div class="submit-page">

            <!-- Notice -->
            {{--<div class="notification notice closeable margin-bottom-40">--}}
            {{--<p><span>Have an account?</span> If you don’t have an account you can create one below by entering your email address. A password will be automatically emailed to you.</p>--}}
            {{--</div>--}}

            <div class="form">
                @if (count($errors) > 0)
                    <div class="notification error closeable">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <form role="form" method="POST" id="form-job-create" action="{{ url('/job/update/'.$job['id']) }}">
                {{ csrf_field() }}

                <div class="form">
                    <h5>Profesi Pekerja</h5>
                    <select name="category" class="chosen-select-no-single">
                        <option disabled selected>Pilih Profesi Pekerja</option>
                        @foreach($category as $key => $row)
                            <option @if($job['category'] == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{$row['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Email -->
                <div class="form">
                    <h5>Nama Pekerjaan</h5>
                    <input class="search-field" name="title" value="{{$job['title']}}" type="text" placeholder="Contoh : Supir Pribadi, Penjaga Toko Di Mall, Juru Masak Restoran Chinese Food" />
                </div>

                <div class="form">
                    <h5>Lokasi</h5>
                    <select name="city" class="chosen-select-no-single">
                        <option disabled selected>Pilih Lokasi Kerja</option>
                        @foreach ($province as $rowProvince)
                            <option @if($job['city'] == $rowProvince['id']) selected="selected" @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form">
                    <h5>Gaji</h5>
                    <input class="search-field" name="salary_min" style="width: 49%;margin-right: 15px;float: left" value="{{$job['salary_min']}}" type="text" placeholder="Gaji minimal. Isi dengan angka">

                    <input class="search-field" name="salary_max" style="width: 49%" value="{{$job['salary_max']}}" type="text" placeholder="Gaji maksimal. Isi dengan angka">
                </div>

                <div class="form">
                    <h5>Pendidikan Terakhir</h5>
                    <select name="degree" class="chosen-select-no-single">
                        <option disabled selected>Pilih Pendidikan Terakhir</option>
                        @foreach ($degree as $key => $row)
                            <option @if($job['minimum_degree'] == $row) selected="selected" @endif>{{$row}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form">
                    <h5>Periode Posting</h5>
                    <input class="search-field" name="start_date" style="width: 49%;margin-right: 15px;float: left" value="{{$job['start_date']}}" id="from" type="text" placeholder="Tanggal lowongan dimulai">

                    <input class="search-field" name="end_date" style="width: 49%" value="{{$job['end_date']}}" type="text" id="to" placeholder="Tanggal lowongan berakhir">
                </div>

                <div class="form">
                    <h5>Tipe Waktu Kerja</h5>
                    <select data-placeholder="Full-Time" name="type" class="chosen-select-no-single">
                        <option @if($job['type'] == 1) selected="selected" @endif value="1">Full-Time</option>
                        <option @if($job['type'] == 2) selected="selected" @endif value="2">Part-Time</option>
                    </select>
                </div>


                <!-- Choose Category -->
                <div class="form">
                    <div class="select">
                        <h5>Pengalaman Kerja Minimal</h5>
                        <select data-placeholder="Pilih Pengalaman Kerja" name="exp" class="chosen-select">
                            @for($i=1; $i<= $max_exp;$i++)
                                <option @if($job['exp'] == $i) selected="selected" @endif value="{{$i}}">{{$i}} Tahun</option>
                            @endfor

                            <option @if($job['exp'] > $max_exp) selected="selected" @endif value="100">Lebih dari 10 Tahun</option>
                        </select>
                    </div>
                </div>

                <div class="form">
                    <h5>Umur Pekerja</h5>
                    <input class="search-field" name="age_min" style="width: 49%;margin-right: 15px;float: left" value="{{$job['age_min']}}" type="text" placeholder="Umur minimal">

                    <input class="search-field" name="age_max" style="width: 49%" value="{{$job['age_max']}}" type="text" placeholder="Umur maksimal">
                </div>

                <div class="form">
                    <h5>Jenis Kelamin</h5>
                    <select data-placeholder="Full-Time" name="gender" class="chosen-select-no-single">
                        <option @if($job['gender'] == 0) selected="selected" @endif value="0">Tidak ada batasan gender</option>
                        <option @if($job['gender'] == 2) selected="selected" @endif value="2">Perempuan</option>
                        <option @if($job['gender'] == 1) selected="selected" @endif value="1">Laki - Laki</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="form">
                    <h5>Deskripsi Pekerjaan</h5>
                    <textarea name="description" cols="40" rows="10" id="summary" spellcheck="true">{{$job['description']}}</textarea>
                </div>

                <input type="submit" class="button big margin-top-5" value="Edit Lowongan">

            </form>

        </div>
    </div>

</div>

<div class="margin-bottom-20"></div>

@endsection