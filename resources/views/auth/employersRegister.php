@extends('layouts.main')

@section('title', 'Home')

@section('content')


        <!--ACCOUNT OPTION SECTION START-->

<section class="account-option">

    <div class="container">

        <div class="inner-box">

            <div class="text-box">

                <h4>Anda sudah memiliki akun ?</h4>

                <p>Apabila anda belum memiliki akun, silahkan isi data dibawah ini. Apabila sudah memiliki akun silahkan klik link masuk berikut. </p>

            </div>

            <a href="#" class="btn-style-1"><i class="fa fa-sign-in"></i>Masuk</a> </div>

    </div>

</section>

<!--ACCOUNT OPTION SECTION END-->



<!--RESUME FORM START-->

<section class="resum-form padd-tb">

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

        <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6 col-sm-6">

                    <label>Nama Lengkap (Sesuai KTP) *</label>

                    <input name="name" value="{{old('name')}}" type="text" placeholder="Nama Lengkap">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Email *</label>

                    <input name="email" value="{{old('email')}}" type="text" placeholder="Email">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Nomor HP *</label>

                    <input name="phone" value="{{old('phone')}}" type="text" placeholder="Nomor HP">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Jenis Kelamin *</label>

                    <div style="float: left;width: 50%">
                        <input style="margin-right: 10px" type="radio" @if(old('gender') == '1') checked="checked" @endif name="gender" value="1" id="male"> <label for="male">Laki - Laki</label>
                    </div>

                    <div style="float:right;width: 50%;">
                        <input style="margin-right: 10px;" type="radio" @if(old('gender') == '2') checked="checked" @endif name="gender" value="2" id="female"> <label for="female">Perempuan</label>
                    </div>

                    <div class="clearfix"></div>

                </div>

                <div style="clear: both"></div>

                <div class="col-md-6 col-sm-6">

                    <label>Pendidikan Terakhir *</label>

                    <div class="selector">

                        <select name="degree" class="full-width">

                            <option disabled selected>Pilih Pendidikan Terakhir</option>

                            @foreach ($degree as $key => $row)
                                <option @if(old('degree') == $row) selected="selected" @endif>{{$row}}</option>
                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Kota Tempat Tinggal *</label>
                    <div class="selector">

                        <select name="city" class="full-width">

                            <option disabled selected>Pilih Kota Tempat Tinggal</option>

                            @foreach ($province as $province)
                                <option @if(old('city') == $province['id']) selected="selected" @endif value="{{$province['id']}}">{{$province['name']}}</option>
                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Tanggal Lahir</label>

                    <input name="birthdate" id="datepicker" type="text" placeholder="Tanggal Lahir">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Status *</label>

                    <div style="float: left;width: 50%">
                        <input style="margin-right: 10px" type="radio" @if(old('marital') == '1') checked="checked" @endif name="marital" value="1" id="yes"> <label for="yes">Menikah</label>
                    </div>

                    <div style="float:right;width: 50%;">
                        <input style="margin-right: 10px;" type="radio" name="marital" @if(old('marital') == '2') checked="checked" @endif value="2" id="no"> <label for="no">Belum Menikah</label>
                    </div>

                    <div class="clearfix"></div>

                </div>

                <div style="clear: both"></div>

                <div class="col-md-6 col-sm-6">

                    <label>Kata Sandi *</label>

                    <input name="password" type="password" placeholder="Kata Sandi">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Ketik Ulang Kata Sandi *</label>

                    <input name="password_confirmation" type="password" placeholder="Ketik Ulang Kata Sandi">

                </div>

                <div class="col-md-12">

                    <div class="btn-col">

                        <input type="submit" value="Daftar Sebagai Calon Pekerja">

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

<!--RESUME FORM END-->
@endsection