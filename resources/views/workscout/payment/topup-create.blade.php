@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container">

        <!-- Categories -->
        <div class="container">

            <div class="title-page">
                <h3 class="margin-bottom-25">Paket Topup</h3>
                <center><div class="kategoribox"></div></center>
            </div>

            <div class="plan color-1 four columns">
                <div class="plan-price">
                    <h3>BASIC</h3>
                    <span class="plan-currency">Rp </span>
                    <span class="value">100,000</span>

                </div>
                <div class="plan-features">
                    <ul>
                        <li>20 Kontak</li>
                        <li>Rp 5000 / kontak</li>
                    </ul>
                    <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
                </div>
            </div>

            <!-- Plan #2 -->
            <div class="plan color-2 four columns">
                <div class="plan-price">
                    <h3>BRONZE</h3>
                    <span class="plan-currency">Rp </span>
                    <span class="value">200,000</span>

                </div>
                <div class="plan-features">
                    <ul>
                        <li>80 Kontak</li>
                        <li>Rp 2500 / kontak</li>
                    </ul>
                    <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
                </div>
            </div>

            <!-- Plan #3 -->
            <div class="plan color-1 four columns">
                <div class="plan-price">
                    <h3>SILVER</h3>
                    <span class="plan-currency">Rp </span>
                    <span class="value">500,000</span>

                </div>
                <div class="plan-features">
                    <ul>
                        <li>250 Kontak</li>
                        <li>Rp 2000 / kontak</li>
                    </ul>
                    <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
                </div>
            </div>

            <!-- Plan #4 -->
            <div class="plan color-1 four columns">
                <div class="plan-price">
                    <h3>PLATINUM</h3>
                    <span class="plan-currency">Rp </span>
                    <span class="value">800,000</span>

                </div>
                <div class="plan-features">
                    <ul>
                        <li>600 Kontak</li>
                        <li>Rp 1500 / kontak</li>
                    </ul>
                    <a class="button" href="#"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
                </div>
            </div>
        </div>

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