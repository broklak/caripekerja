@extends('layouts.main')

@section('content')

<!--ACCOUNT OPTION SECTION START-->

<section class="account-option">

    <div class="container">

        <div class="inner-box">

            <div class="text-box">

                <h4>Anda belum memiliki akun ?</h4>

                <p>Klik link berikut untuk membuat akun Caripekerja. </p>

            </div>

            <a href="{{url('/daftar')}}" class="btn-style-1"><i class="fa fa-sign-in"></i>Daftar</a> </div>

    </div>

</section>

<!--ACCOUNT OPTION SECTION END-->

<!--SIGNUP SECTION START-->

<section class="signup-section">

    <div class="container">
        <div class="holder">

            <div class="thumb"><img src="{{asset('images')}}/bg/signup.png" alt="img"></div>
            <h2 class="login-as">Masuk Sebagai</h2>

            <ul class="login-as-tabs">
                <li id="as-pekerja" class="li-click @if(old('role') == 'worker' || old('role') == null) active @endif" role="presentation">PEKERJA</li>
                <li id="as-ukm" class="li-click @if(old('role') == 'employer') active @endif">UKM</li>
            </ul>

            {!! session('displayMessage') !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

                    <!--WORKER LOGIN START-->

            <form id="worker-login" action="{{url('/login')}}" class="@if(old('role') == 'employer') hide @endif" method="post" >
                {{ csrf_field() }}

                <div class="input-box"> <i class="fa fa-user"></i>

                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="Nomor Handphone">

                </div>

                <div class="input-box"> <i class="fa fa-unlock"></i>

                    <input type="password" name="password" placeholder="Password">

                </div>

                <div class="check-box">

                    <input id="id3" type="checkbox" />

                    <strong>Ingatkan Akun Saya</strong> </div>

                <input type="hidden" name="role" value="worker">

                <input type="submit" value="Masuk">

            </form>

                <!--WORKER LOGIN END-->

                <!--EMPLOYER LOGIN START-->

            <form id="employer-login" action="{{url('/employer/login')}}" method="post" class="@if(old('role') == 'worker' || old('role') == null) hide @endif">
                {{ csrf_field() }}

                <div class="input-box"> <i class="fa fa-user"></i>

                    <input type="text" name="email" value="{{old('email')}}" placeholder="Email">

                </div>

                <div class="input-box"> <i class="fa fa-unlock"></i>

                    <input type="password" name="password" placeholder="Password">

                </div>

                <input type="hidden" name="role" value="employer">

                <input type="submit" value="Masuk">

                <div style="clear: both">
                    <a href="{{route('employer-forget-password')}}" class="login">Lupa Password</a>
                </div>



            </form>
                <!--EMPLOYER LOGIN END-->

        </div>

    </div>

</section>
@endsection