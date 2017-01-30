@extends('layouts.main')

@section('content')

        <!--SIGNUP SECTION START-->

<section class="signup-section" style="margin-top: 30px">

    <div class="container">
        <div class="holder">

            <h2 class="login-as">Masukkan Nomor Handphone Anda</h2>

            {!! session('displayMessage') !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{route('request-change-password')}}" method="post">
                {{ csrf_field() }}

                <div class="input-box" style="padding: 30px 0">

                    <input type="text" name="phone" placeholder="Nomor Handphone">

                </div>

                <input type="hidden" name="submit" value="1">
                <input type="submit" value="Masuk">

            </form>

        </div>

    </div>

    <div class="margin-bottom-30"></div>

</section>
@endsection
