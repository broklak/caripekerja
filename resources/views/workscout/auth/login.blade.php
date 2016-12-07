@extends('layouts.main')

@section('content')

    <div class="container">

        <div class="my-account">

            <div class="title-page">
                <h1>Masuk Sebagai</h1>
            </div>
            {!! session('displayMessage') !!}

            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="notification error closable">{{ $error }}</div>
                @endforeach
            @endif
            <ul class="tabs-nav">
                <li class="@if(old('role') == 'worker' || old('role') == null) active @endif" style="width: 50%"><a href="#tab1">PEKERJA</a></li>
                <li class="@if(old('role') == 'employer') active @endif" style="width: 50%"><a href="#tab2">UKM</a></li>
            </ul>

            <div class="tabs-container">
                <!-- Login Pekerja -->
                <div class="tab-content" id="tab1" style="display: @if(old('role') == 'employer') none @endif;">
                    <form action="{{url('/login')}}" method="post" class="login">
                        {{ csrf_field() }}
                        <p class="form-row form-row-wide">
                            <label for="username">Nomor Handphone:
                                <i class="ln ln-icon-Phone-2"></i>
                                <input type="text" class="input-text" name="phone" id="phone" value="{{old('phone')}}" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Password:
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password" id="password"/>
                            </label>
                        </p>

                        <p class="form-row">
                            <input type="submit" class="button border fw margin-top-10" name="login" value="Masuk" />
                        </p>

                        <p class="lost_password">
                            <label style="float: left" for="rememberme" class="rememberme">
                             <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Ingatkan Saya</label>
                            <a style="float: right" href="#" >Lupa Password?</a>
                        </p>
                        <input type="hidden" name="role" value="worker">
                    </form>
                </div>

                <!-- Login UKM -->
                <div class="tab-content" id="tab2" style="display: @if(old('role') == 'worker' || old('role') == null) none @endif;">

                    <form action="{{url('/employer/login')}}" method="post" class="login">
                        {{ csrf_field() }}
                        <p class="form-row form-row-wide">
                            <label for="username">Email:
                                <i class="ln ln-icon-Male"></i>
                                <input type="text" class="input-text" name="email" id="email" value="{{old('email')}}" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Password:
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password" id="password"/>
                            </label>
                        </p>

                        <p class="form-row">
                            <input type="submit" class="button border fw margin-top-10" name="login" value="Masuk" />
                        </p>

                        <p class="lost_password">
                            <label style="float: left" for="rememberme" class="rememberme">
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Ingatkan Saya</label>
                            <a style="float: right" href="{{route('employer-forget-password')}}" >Lupa Password?</a>
                        </p>
                        <input type="hidden" name="role" value="employer">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 50px"></div>
@endsection
