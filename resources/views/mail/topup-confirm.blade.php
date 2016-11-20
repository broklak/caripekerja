<div>
    Hi Rivan,
    <p>UKM {{$employer->name}} melakukan konfirmasi pembayaran top up paket {{$package->name}} dengan kode transaksi {{$confirm->code}}</p>
    <p>Berikut detail rekening pembayar</p>
    <p>Nomor Rekening : {{$confirm->account_number}}</p>
    <p>Nama Pemilik Rekening : {{$confirm->account_name}}</p>
    <p>Jumlah yang ditransfer : {{$confirm->amount}}</p>
    <p>Transfer ke rekening : {{$payment->name}} {{$payment->account_name}}</p>

</div>