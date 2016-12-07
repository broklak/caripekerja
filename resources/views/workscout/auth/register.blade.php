@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container">

        <div class="my-account">

            <div class="title-page">
                <h1>Daftar Sebagai</h1>
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
                <!-- Daftar Pekerja -->
                <div class="tab-content" id="tab1" style="display: @if(old('role') == 'employer') none @endif;">
                    <form action="{{url('/register')}}" method="post" class="login">
                        {{ csrf_field() }}
                        <p class="form-row form-row-wide">
                            <label for="username">Nama Lengkap (Sesuai KTP)
                                <i class="ln ln-icon-User"></i>
                                <input type="text" class="input-text" name="name" id="name" value="{{old('name')}}" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="username">Nomor Handphone
                                <i class="ln ln-icon-Phone-2"></i>
                                <input type="text" class="input-text" name="phone" id="phone" value="{{old('phone')}}" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Kata Sandi
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password" id="password"/>
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Ketik Ulang Kata Sandi
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password_confirmation" id="password"/>
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="username">Kode Referral (Bila ada)
                                <i class="ln ln-icon-Code-Window"></i>
                                <input type="text" class="input-text" name="referral_code" id="referral_code" value="{{old('referral_code')}}" />
                            </label>
                        </p>

                        <p class="form-row">
                            <input type="submit" class="button border fw margin-top-10" name="login" value="Daftar" />
                        </p>
                        <input type="hidden" name="role" value="worker">
                    </form>
                </div>

                <!-- Login UKM -->
                <div class="tab-content" id="tab2" style="display: @if(old('role') == 'worker' || old('role') == null) none @endif;">

                    <form action="{{url('/employer/register')}}" method="post" class="login">
                        {{ csrf_field() }}
                        <p class="form-row form-row-wide">
                            <label for="username">Nama Usaha
                                <i class="ln ln-icon-User"></i>
                                <input type="text" class="input-text" name="name" id="name" value="{{old('name')}}" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="username">Email
                                <i class="ln ln-icon-Phone-2"></i>
                                <input type="text" class="input-text" name="email" id="phone" value="{{old('email')}}" />
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Kata Sandi
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password" id="password"/>
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password">Ketik Ulang Kata Sandi
                                <i class="ln ln-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password_confirmation" id="password"/>
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="username">Kode Referral (Bila ada)
                                <i class="ln ln-icon-Code-Window"></i>
                                <input type="text" class="input-text" name="referral_code" id="referral_code" value="{{old('referral_code')}}" />
                            </label>
                        </p>

                        <p class="form-row">
                            <input type="submit" class="button border fw margin-top-10" name="login" value="Daftar" />
                        </p>
                        <input type="hidden" name="role" value="employer">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection