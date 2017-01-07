@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div id="titlebar" class="single submit-page people-bg">
        <h2>Upload Foto Kartu Tanda Pengenal (KTP)</h2>
    </div>

    <div class="container margin-top-30">
        {!! session('displayMessage') !!}
    </div>

    <div class="container">
        <div class="four columns">
            @include('user.myaccount-link')
        </div>
        <!-- Submit Page -->
        <div class="twelve columns">
            <div class="submit-page">

                @if (count($errors) > 0)
                    <div class="form">

                        <div class="notification error closeable">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>

                    </div>
                @endif

                <form role="form" method="POST" id="form-job-create" action="{{ route('verify-identity') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form">
                        <h5>Kartu Tanda Pengenal</h5>
                        <div class="frame"><img style="width: 250px;height: 200px" src="{{$imageKTP}}" alt="img"></div>

                        <input type="file" name="imageKTP" accept="image/*">
                    </div>

                    <div class="form">
                        <h5>Surat Keterangan Catatan Kepolisian</h5>
                        <div class="frame"><img style="width: 250px;height: 200px" src="{{$imageSKCK}}" alt="img"></div>

                        <input type="file" name="imageSKCK" accept="image/*">
                    </div>

                    <input type="hidden" name="submit" value="true">
                    <input type="submit" class="button big margin-top-5" value="Upload">

                </form>

            </div>
        </div>

    </div>

    <div class="margin-bottom-20"></div>
@endsection