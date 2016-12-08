@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <section class="resum-form opt-log">
        <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        </div>
    </section>

    <!--RESUME FORM START-->

    <section class="resum-form padd-tb">

        <div class="container">

            <form role="form" method="POST" action="{{ url('/topup-process') }}">
                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-6 col-sm-6">

                        <label>Paket Top Up</label>
                        <div class="selector">

                            <select name="package" class="multiple-select">
                                <option disabled selected>Pilih Paket Top Up</option>
                                @foreach($package as $key => $row)
                                    <option @if(old('package') == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{ucfirst($row['name'])}} - {{\App\Helpers\GlobalHelper::moneyFormat($row['price'])}} ({{$row['quota']}} quota)</option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6">

                        <label>Metode Pembayaran</label>
                        <div class="selector">

                            <select name="payment" class="multiple-select">
                                <option disabled selected>Pilih Metode Pembayaran</option>
                                @foreach($payment as $key => $row)
                                    <option @if(old('payment') == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{ucfirst($row['name'])}} - ({{$row['account_number']}} a / n {{$row['account_name']}})</option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="btn-col">

                            <input type="hidden" name="role" value="worker">

                            <input type="submit" value="TOP UP">

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </section>



@endsection