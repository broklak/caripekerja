@extends('layouts.main')

@section('content')

    <div class="container">

        <!-- Submit Page -->
        <div class="sixteen columns margin-top-30">

            @if(!session('displayMessage'))
                <div class="notification warning closeable align-center">
                    Kami sudah mengirimkan sms berisi kode verifikasi ke nomor handphone anda. Silahkan masukkan kode di sms untuk memverifikasi kontak pekerja anda.
                </div>
            @else
                <div class="align-center">
                    {!! session('displayMessage') !!}
                </div>
            @endif
            <div class="submit-page">

                <div class="form">
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
                        <h5>Kode Verifikasi</h5>
                        <input class="search-field" type="text" name="code" placeholder="Masukkan Kode Verifikasi" />
                    </div>

                    <input type="hidden" name="submit" value="1">
                    <a href="{{route('worker-resend-code')}}" class="custom-link send-code">KIRIM ULANG KODE</a>
                    <input type="submit" class="button verify" value="Verifikasi">
                    <a href="{{route('myaccount-profile')}}" class="custom-link skip-verify">NANTI SAJA</a>
                </form>

            </div>
        </div>

    </div>

    <div class="margin-bottom-20"></div>

@endsection
