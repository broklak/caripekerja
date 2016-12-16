@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div id="titlebar" class="single submit-page tree-bg">
        <h2>TOP UP KUOTA</h2>
    </div>

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

                <form role="form" method="POST" id="form-job-create" action="{{ url('/topup-process') }}">
                    {{ csrf_field() }}

                    <div class="form">
                        <h5>Paket Top Up</h5>
                        <select name="package" class="chosen-select-no-single">
                            <option disabled selected>Pilih Paket Top Up</option>
                            @foreach($package as $key => $row)
                                <option @if(old('package') == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{ucfirst($row['name'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['price'])}} ({{$row['quota']}} quota)</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form">
                        <h5>Metode Pembayaran</h5>
                        <select name="payment" class="chosen-select-no-single">
                            <option disabled selected>Pilih Metode Pembayaran</option>
                            @foreach($payment as $key => $row)
                                <option @if(old('payment') == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{ucfirst($row['name'])}} - ({{$row['account_number']}} a / n {{$row['account_name']}})</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="button big margin-top-5" value="TOP UP">

                </form>

            </div>
        </div>

    </div>

    <div class="margin-bottom-20"></div>

@endsection