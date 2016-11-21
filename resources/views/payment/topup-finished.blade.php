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

                <div class="row">

                    <div class="col-md-12">

                        @if(isset($error))
                            <p>Data transaksi tidak ditemukan</p>
                        @else

                            <div>
                                <p>Hi <b>{{$employer->name}}</b>, </p>
                                <p>
                                    Terima kasih atas kepercayaan anda menggunakan layanan Top Up di CariPekerja. Kode transaksi anda adalah : <b>{{$topup->code}}</b>
                                </p>
                                <p>Berikut adalah detail Top Up anda </p>
                                <p> </p>
                                <p>Nama Paket : <b>{{ucfirst($package->name)}}</b></p>
                                <p>Harga : <b>{{\App\Helpers\GlobalHelper::moneyFormat($package->price)}}</b></p>
                                <p>Tambahan Quota : <b>{{$package->quota}}</b></p>
                                <p> </p>
                                <p>Harap melakukan pembayaran sebesar <b>{{\App\Helpers\GlobalHelper::moneyFormat($package['price'])}}</b> dengan detail berikut</p>
                                <p></p>
                                <p>Metode : <b>{{$payment->name}}</b></p>
                                <p>Nomor Rekening : <b>{{$payment->account_number}}</b></p>
                                <p>Nama pemilik Rekening : <b>{{$payment->account_name}}</b></p>
                                <p></p>
                                <p>Salam</p>
                                <p>Caripekerja.com</p>
                            </div>

                            <div class="btn-col">

                                <input type="hidden" name="role" value="worker">

                                <a class="button-link link-green" href="{{route('topup-confirm')}}">Konfirmasi Pembayaran</a>

                            </div>

                        @endif

                    </div>

                </div>
        </div>

    </section>



@endsection