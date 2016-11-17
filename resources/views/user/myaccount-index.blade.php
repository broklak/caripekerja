@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <section class="resume-process padd-tb">

        <div class="container">

            <h2>Kode Referal Anda : {{$referral}}</h2>

            <strong>Ajak teman anda untuk mendaftar di Caripekerja dan gunakan kode referal ini di halaman pendaftaran</strong>

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <div class="option-box">

                        <div class="icon-box icon-colo-1"><i class="fa fa-files-o"></i></div>

                        <h4>Lengkapi Profil</h4>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="option-box">

                        <div class="icon-box icon-colo-2"><i class="fa fa-search"></i></div>

                        <h4>Cari Pekerja</h4>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="option-box">

                        <div class="icon-box icon-colo-3"><i class="fa fa-paper-plane-o"></i></div>

                        <h4>Cari Lowongan</h4>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="option-box">

                        <div class="icon-box icon-colo-4"><i class="fa fa-lock"></i></div>

                        <h4>Ganti Kata Sandi</h4>

                    </div>

                </div>

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

                    <input name="name" value="{{$authData['name']}}" type="text" placeholder="Nama Lengkap">

                </div>

                <div class="col-md-6 col-sm-6">

                    <label>Nomor HP *</label>

                    <input name="phone" value="{{$authData['phone']}}" type="text" placeholder="Nomor HP">

                </div>

                <div class="col-md-12">

                    <div class="btn-col">

                        <input type="hidden" name="role" value="worker">

                        <input type="submit" value="Ubah Profil">

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

                    <input name="referral_code" type="text" value="{{old('referral_code')}}" placeholder="Kode referral (bila ada)">

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