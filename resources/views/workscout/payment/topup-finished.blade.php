
@extends('layouts.main')

@section('title', 'Home')

@section('content')

    @if(isset($error))
        <div class="container margin-top-30">
            <div class="notification error">
                <p class="align-center">Maaf transaksi tidak ditemukan</p>
            </div>
        </div>

    @else

        <div class="container margin-top-30">
            <div class="notification success">
                <p>Hi <strong>{{$employer->name}}</strong>, </p>
                <p>
                    Terima kasih atas kepercayaan anda menggunakan layanan Top Up di CariPekerja. Silahkan melakukan pembayaran untuk mengaktifkan kuota.</b>
                </p>
            </div>
        </div>

        <div class="container">

            <div class="eight columns">

                <!-- Sort by -->
                <div class="widget">
                    <h4>Rincian Top Up</h4>

                    <div class="job-overview">

                        <ul>
                            <li>
                                <i class="fa fa-book"></i>
                                <div>
                                    <strong>Kode Transaksi</strong>
                                    <span>{{$topup->code}}</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-cart-plus"></i>
                                <div>
                                    <strong>Nama Paket</strong>
                                    <span>{{ucfirst($package->name)}}</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-plus"></i>
                                <div>
                                    <strong>Tambahan Kuota</strong>
                                    <span>{{$package->quota}}</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-money"></i>
                                <div>
                                    <strong>Total Tagihan</strong>
                                    <span style="font-size: 22px"><strong>{{\App\Helpers\GlobalHelper::moneyFormat($package['price'])}}</strong></span>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
            <!-- Widgets / End -->

            <!-- Widgets -->
            <div class="eight columns">

                <!-- Sort by -->
                <div class="widget">
                    <h4>Metode Pembayaran</h4>

                    <div class="job-overview">

                        <ul>
                            <li>
                                <i class="fa fa-bank"></i>
                                <div>
                                    <strong>Metode Pembayaran</strong>
                                    <span>{{$payment->name}}</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-barcode"></i>
                                <div>
                                    <strong>Nomor Rekening Tujuan</strong>
                                    <span>{{$payment->account_number}}</span>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user"></i>
                                <div>
                                    <strong>Nama Pemilik rekening</strong>
                                    <span>{{$payment->account_name}}</span>
                                </div>
                            </li>
                        </ul>


                        <a href="#small-dialog" class="popup-with-zoom-anim button">Konfirmasi Pembayaran</a>

                        <div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
                            <div class="small-dialog-headline">
                                <h2>Konfirmasi Pembayaran Tagihan <strong>#{{$topup->code}}</strong></h2>
                            </div>

                            <div class="small-dialog-content">
                                <form action="{{ url('/confirm-topup') }}" method="post" >
                                    {{csrf_field()}}
                                    <input type="number" required name="amount" value="{{old('amount')}}" placeholder="Masukkan jumlah transfer (Isi dengan angka)">
                                    <input type="number" required name="acc_number" value="{{old('acc_number')}}" placeholder="Masukkan nomor rekening pembayar" />
                                    <input type="text" required name="acc_name" value="{{old('acc_name')}}" placeholder="Masukkan nama pemilik rekening pembayar" />

                                    <input type="hidden" name="code" value="{{$topup->code}}">
                                    <input type="hidden" name="package" value="{{$topup->package_id}}">
                                    <input type="hidden" name="payment" value="{{$payment->id}}">
                                    <button class="send" type="submit">Kirim Konfirmasi</button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- Widgets / End -->

        </div>

        @endif

    <div class="margin-bottom-50"></div>

@endsection