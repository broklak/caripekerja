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

                <form id="employer-login" action="{{url('/employer/password/reset')}}" method="post">
                    {{ csrf_field() }}

                    <div class="input-box">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <input type="text" name="email" value="{{ $email or old('email') }}" placeholder="Email">

                    </div>

                    <div class="input-box">

                        <input type="password" name="password" placeholder="Password Baru">

                    </div>

                    <div class="input-box">

                        <input type="password" name="password_confirmation" placeholder="Ketik Ulang Password Baru">

                    </div>

                    <input type="submit" value="Reset Password">

                </form>
                <!--EMPLOYER LOGIN END-->

        </div>

    </div>

</section>
@endsection
