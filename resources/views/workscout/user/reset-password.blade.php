@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- Submit Page -->
        <div class="sixteen columns">

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

                <form role="form" method="POST" id="form-job-create">
                    {{ csrf_field() }}

                    <div class="form">
                        <h5>Password Baru</h5>
                        <input class="search-field" type="password" name="newpass" placeholder="Password Baru Anda" />
                    </div>

                    <div class="form">
                        <h5>Konfirmasi Password Baru</h5>
                        <input class="search-field" type="password" name="conpass" placeholder="Ketik Ulang Password Baru" />
                    </div>
                    <input type="hidden" name="submit" value="1">
                    <input type="submit" class="button big margin-top-5" value="Ganti Password">

                </form>

            </div>
        </div>

    </div>

    <div class="margin-bottom-20"></div>

@endsection
