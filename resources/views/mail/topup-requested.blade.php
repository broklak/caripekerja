<div>
    Hi {{$employer->name}},
    <p>Terima kasih atas kepercayaan anda menggunakan layanan Top Up di CariPekerja</p>
    <p>Kode transaksi anda adalah : {{$topup->code}}</p>
    <p>Berikut adalah detail Top Up anda </p>
    <p> </p>
    <p>Nama Paket : {{$package->name}}</p>
    <p>Harga : {{\App\Helpers\GlobalHelper::moneyFormat($package->price)}}</p>
    <p>Tambahan Quota : {{$package->quota}}</p>
    <p> </p>
    <p>Harap melakukan pembayaran sebesar {{\App\Helpers\GlobalHelper::moneyFormat($package->price)}} dengan detail berikut</p>
    <p></p>
    <p>Metode : {{$payment->name}}</p>
    <p>Nomor Rekening : {{$payment->account_number}}</p>
    <p>Nama pemilik Rekening : {{$payment->account_name}}</p>
    <p></p>
    <p>Silahkan klik link berikut untuk melakukan konfirmasi pembayaran apabila telah melakukan pembayaran. <a href="{{route('topup-confirm')}}">Konfirmasi</a></p>
    <p></p>
    <p>Salam</p>
    <p>Caripekerja.com</p>
</div>