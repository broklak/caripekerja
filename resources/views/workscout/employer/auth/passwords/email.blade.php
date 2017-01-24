@extends('layouts.main')

@section('content')

<!--SIGNUP SECTION START-->

<section class="signup-section" style="margin-top: 30px">

    <div class="container">
        <div class="holder">

            <h2 class="login-as">Masukkan Email Anda</h2>

            {!! session('displayMessage') !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <!--EMPLOYER LOGIN START-->

                <form id="employer-login" action="{{url('/employer/password/email')}}" method="post">
                    {{ csrf_field() }}

                    <div class="input-box" style="padding: 30px 0">

                        <input type="text" name="email" value="{{old('email')}}" placeholder="Email">

                    </div>

                    <input type="submit" value="Masuk">

                </form>
                <!--EMPLOYER LOGIN END-->

        </div>

    </div>

    <div class="margin-bottom-30"></div>

</section>
@endsection
