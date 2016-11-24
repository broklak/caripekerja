@extends('layouts.main')

@section('content')

<!--SIGNUP SECTION START-->

<section class="signup-section">

    <div class="container">
        <div class="holder">
            <h2>Ganti Password</h2>

            {!! session('displayMessage') !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <!--EMPLOYER LOGIN START-->

                <form id="employer-login" action="{{route('change-password')}}" method="post">
                    {{ csrf_field() }}

                    <div class="input-box"> <i class="fa fa-lock"></i>

                        <input type="password" name="oldpass" placeholder="Password Lama Anda">

                    </div>

                    <div class="input-box"> <i class="fa fa-lock"></i>

                        <input type="password" name="newpass" placeholder="Password Baru Anda">

                    </div>

                    <div class="input-box"> <i class="fa fa-lock"></i>

                        <input type="password" name="conpass" placeholder="Ketik Ulang Password Baru Anda">

                    </div>

                    <input type="hidden" name="role" value="{{$role}}">
                    <input type="hidden" name="submit" value="1">

                    <input type="submit" value="Masuk">

                </form>
                <!--EMPLOYER LOGIN END-->

        </div>

    </div>

</section>
@endsection
