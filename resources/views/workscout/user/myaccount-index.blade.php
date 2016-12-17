@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div id="titlebar" class="single submit-page people-bg">
        <h2>Update Profil</h2>
    </div>

    <div class="container margin-top-30">
        {!! session('displayMessage') !!}
        <div class="notification success">
            <p class="align-center">Kode Referal Anda : <strong>{{$referral}}</strong>. Ajak teman anda untuk mendaftar di Caripekerja dan gunakan kode referal ini di halaman pendaftaran.</p>
        </div>
    </div>


    <div class="container">

    <div class="four columns">
        @include('user.myaccount-link')
    </div>
    <!-- Submit Page -->
    <div class="twelve columns">

        @if($authRole == 'worker')
            @include('user.worker-change-data')
        @else
            @include('employer.employer-change-data')
        @endif

    </div>

</div>

<div class="margin-bottom-20"></div>
@endsection