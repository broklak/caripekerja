@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="resum-form opt-log">
    <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
</section>

<!--RESUME FORM START-->

<section class="resum-form padd-tb">

    <div class="container">

        <form role="form" method="POST" id="form-job-create" action="{{ url('/job/store') }}">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6 col-sm-6">

                    <label>Kategori Pekerja</label>
                    <div class="selector">

                        <select name="category" class="multiple-select">
                            <option disabled selected>Pilih Profesi Pekerja</option>
                            @foreach($category as $key => $row)
                                <option @if(old('category') == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Nama Pekerjaan *</label>

                    <input name="title" value="{{old('title')}}" type="text" placeholder="Contoh : Supir Pribadi, Penjaga Toko Di Mall, Juru Masak Restoran Chinese Food">

                </div>

                <div style="clear: both"></div>

                <div class="col-md-6 col-sm-6">

                    <label>Gaji</label>

                    <input name="salary_min" style="width: 48%;margin-right: 10px" value="{{old('salary_min')}}" type="text" placeholder="Gaji minimal. Isi dengan angka">

                    <input name="salary_max" style="width: 48%" value="{{old('salary_max')}}" type="text" placeholder="Gaji maksimal. Isi dengan angka">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Pendidikan Terakhir Pekerja *</label>

                    <div class="selector">

                        <select name="degree" class="full-width">

                            <option disabled selected>Pilih Pendidikan Terakhir Pekerja</option>

                            @foreach ($degree as $key => $row)
                                <option @if(old('degree') == $row) selected="selected" @endif>{{$row}}</option>
                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Lokasi kerja *</label>
                    <div class="selector">

                        <select name="city" class="full-width">

                            <option disabled selected>Pilih Lokasi Kerja</option>

                            @foreach ($province as $rowProvince)
                                <option @if($employer['city'] == $rowProvince['id']) selected="selected" @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Jenis Kelamin Pekerja *</label>
                    <div class="selector">

                        <select name="gender" class="full-width">

                            <option disabled selected>Pilih Gender Pekerja</option>

                            <option @if(old('gender') == 0) selected="selected" @endif value="0">Tidak ada batasan gender</option>
                            <option @if(old('gender') == 2) selected="selected" @endif value="2">Perempuan</option>
                            <option @if(old('gender') == 1) selected="selected" @endif value="1">Laki - Laki</option>

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Tipe Waktu Kerja *</label>
                    <div class="selector">

                        <select name="type" class="full-width">

                            <option disabled selected>Pilih Tipe Waktu Kerja</option>

                            <option @if(old('type') == 1) selected="selected" @endif value="1">Full Time</option>
                            <option @if(old('type') == 2) selected="selected" @endif value="2">Part Time</option>

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">
                    <label>Pengalaman Kerja Minimal *</label>
                    <div class="selector">

                        <select name="exp" class="full-width">

                            @for($i=1; $i<= $max_exp;$i++)
                                <option @if(old('exp') == $i) selected="selected" @endif value="{{$i}}">{{$i}} Tahun</option>
                            @endfor

                            <option @if(old('exp') > $max_exp) selected="selected" @endif value="100">Lebih dari 10 Tahun</option>
                        </select>

                    </div>
                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Tanggal Posting</label>

                    <input name="start_date" style="width: 48%;margin-right: 10px" value="{{old('start_date')}}" type="text" placeholder="Tanggal Mulai" id="from">

                    <input name="end_date" style="width: 48%" value="{{old('end_date')}}" type="text" placeholder="Tanggal Akhir" id="to">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Umur Pekerja</label>

                    <input name="age_min" style="width: 48%;margin-right: 10px" value="{{old('age_min')}}" type="text" placeholder="Umur minimal. Isi dengan angka">

                    <input name="age_max" style="width: 48%" value="{{old('age_max')}}" type="text" placeholder="Umur maksimal. Isi dengan angka">

                </div>

                <div class="col-md-12">

                    <h4>Deskripsi Pekerjaan</h4>

                    <div class="text-editor-box">

                        <textarea id="description" name="description">{{old('description')}}</textarea>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="btn-col">

                        <input type="hidden" name="role" value="worker">

                        <input type="submit" value="Post Pekerjaan">

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>



@endsection