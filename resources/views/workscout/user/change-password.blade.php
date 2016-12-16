@extends('layouts.main')

@section('content')

    <div id="titlebar" class="single submit-page tree-bg">
        <h2>Ganti Password</h2>
    </div>



    <div class="container">

        <div class="four columns">
            @include('user.myaccount-link')
        </div>

        <!-- Submit Page -->
        <div class="twelve columns">

            <div class="submit-page">

                <div class="form">
                    {!! session('displayMessage') !!}

                    @if (count($errors) > 0)
                        <div class="notification error closeable">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <form role="form" method="POST" id="form-job-create" action="{{route('change-password')}}">
                    {{ csrf_field() }}

                    <div class="form">
                        <h5>Password Lama</h5>
                        <input class="search-field" type="password" name="oldpass" placeholder="Password Lama Anda" />
                    </div>

                    <div class="form">
                        <h5>Password Baru</h5>
                        <input class="search-field" type="password" name="newpass" placeholder="Password Baru Anda" />
                    </div>

                    <div class="form">
                        <h5>Konfirmasi Password Baru</h5>
                        <input class="search-field" type="password" name="conpass" placeholder="Ketik Ulang Password Baru" />
                    </div>

                    <input type="hidden" name="role" value="{{$role}}">
                    <input type="hidden" name="submit" value="1">
                    <input type="submit" class="button big margin-top-5" value="Ganti Password">

                </form>

            </div>
        </div>

    </div>

    <div class="margin-bottom-20"></div>

@endsection
