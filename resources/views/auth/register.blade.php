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

            <a href="{{url('/login')}}" class="btn-style-1"><i class="fa fa-sign-in"></i>Masuk</a> </div>

    </div>

</section>

<!--ACCOUNT OPTION SECTION END-->

<section class="resum-form opt-log">
    <div class="container">
        <div class="row">
            <h2 class="login-as">Daftar Sebagai</h2>

            <ul class="login-as-tabs">
                <li id="as-pekerja" class="li-click @if(old('role') == 'worker' || old('role') == null) active @endif" role="presentation">PEKERJA</li>
                <li id="as-ukm" class="li-click @if(old('role') == 'employer') active @endif">UKM</li>
            </ul>

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

<section id="worker-signup" class="resum-form padd-tb @if(old('role') == 'employer') hide @endif">

    <div class="container">

        <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6 col-sm-6">

                    <label>Nama Lengkap (Sesuai KTP) *</label>

                    <input name="name" value="{{old('name')}}" type="text" placeholder="Nama Lengkap">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Nomor HP *</label>

                    <input name="phone" value="{{old('phone')}}" type="text" placeholder="Nomor HP">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Kata Sandi *</label>

                    <input name="password" type="password" placeholder="Kata Sandi">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Ketik Ulang Kata Sandi *</label>

                    <input name="password_confirmation" type="password" placeholder="Ketik Ulang Kata Sandi">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Kode Referal</label>

                    <input name="referral_code" type="text" value="{{old('referral_code')}}" placeholder="Kode referral (bila ada)">

                </div>

                <div class="col-md-12">

                    <div class="btn-col">

                        <input type="hidden" name="role" value="worker">

                        <input type="submit" value="Daftar Sebagai Calon Pekerja">

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>


<!--EMPLOYER SIGNUP START-->

<section id="employer-signup" class="resum-form padd-tb @if(old('role') == 'worker' || old('role') == null) hide @endif">

    <div class="container">

        <form role="form" method="POST" action="{{ url('/employer/register') }}">
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6 col-sm-6">

                    <label>Nama Usaha *</label>

                    <input name="name" value="{{old('name')}}" type="text" placeholder="Nama Usaha">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Email *</label>

                    <input name="email" value="{{old('email')}}" type="text" placeholder="Email">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Kata Sandi *</label>

                    <input name="password" type="password" placeholder="Kata Sandi">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Ketik Ulang Kata Sandi *</label>

                    <input name="password_confirmation" type="password" placeholder="Ketik Ulang Kata Sandi">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Kode Referal</label>

                    <input name="referral_code" type="text" placeholder="Kode referral (bila ada)">

                </div>

                <div style="clear: both"></div>

                <div class="col-md-12">

                    <div class="btn-col">

                        <input type="hidden" name="role" value="employer">

                        <input type="submit" value="Daftar Sebagai UKM">

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

<!--EMPLOYER SIGNUP END-->
@endsection