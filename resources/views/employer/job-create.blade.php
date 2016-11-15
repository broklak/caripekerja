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
    </div>
</section>

<!--RESUME FORM START-->

<section class="resum-form padd-tb">

    <div class="container">

        <form role="form" method="POST" action="{{ url('/job/store') }}">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6 col-sm-6">

                    <label>Nama Pekerjaan *</label>

                    <input name="title" value="{{old('title')}}" type="text" placeholder="Contoh : Supir Pribadi, Penjaga Toko Di Mall, Juru Masak Restoran Chinese Food">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Gaji Minimum</label>

                    <input name="salary" value="{{old('salary')}}" type="text" placeholder="Isi hanya dengan angka nominal">

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

                            <option value="0">Tidak ada batasan gender</option>
                            <option value="1">Perempuan</option>
                            <option value="2">Laki - Laki</option>

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Tipe Waktu Kerja *</label>
                    <div class="selector">

                        <select name="type" class="full-width">

                            <option disabled selected>Pilih Tipe Waktu Kerja</option>

                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>

                        </select>

                    </div>

                </div>

                <div class="col-md-12">

                    <h4>Deskripsi Pekerjaan</h4>

                    <div class="text-editor-box">

                        <textarea name="description"></textarea>

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