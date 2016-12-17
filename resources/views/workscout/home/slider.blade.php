<div id="banner" class="with-transparent-header parallax background" style="background-image: url(images/baru/bghomenew.jpeg);background-attachment: fixed;" data-img-width="2000" data-img-height="1330" data-diff="300">
<div class="container">
    <div class="sixteen columns">

        <div class="search-container">
            <!-- Form -->
            <form method="post" action="{{route('worker-list')}}">
                {{csrf_field()}}
            <div class="bottomline slider-container"></div>
            <h2 style="text-align: center">DAPATKAN PEKERJA BERKUALITAS <br />DAN TERVERIFIKASI UNTUK USAHA ANDA</h2>

                <select name="category" class="ico-01">
                    <option disabled selected>Kategori pekerja yang dicari</option>
                    @foreach($category as $key => $row)
                        <option @if(old('category') == $row['id']) selected="selected" @endif value="{{$row['id']}}">{{$row['name']}}</option>
                    @endforeach
                </select>

                <select name="city" class="ico-02">
                    <option disabled selected>Kota atau Provinsi</option>
                    @foreach ($province as $rowProvince)
                        <option @if(old('city') == $rowProvince['id']) selected="selected" @endif value="{{$rowProvince['id']}}">{{$rowProvince['name']}}</option>
                    @endforeach
                </select>

            <button>Cari</button>
            </form>

            <div class="clearfix"></div>

            <!-- Browse Jobs -->


            <div class="browse-jobs">
                <a href="{{route('worker-list-category', ['url' => 'pelayan'])}}"> Pelayan</a>
                <a href="{{route('worker-list-category', ['url' => 'jaga-toko'])}}"> Penjaga Toko</a>
                <a href="{{route('worker-list-category', ['url' => 'asisten-rumah-tangga'])}}"> Asisten Rumah Tangga</a>
                <a href="{{route('worker-list-category', ['url' => 'babysitter'])}}">Baby Sitter</a>
                <a href="{{route('worker-list-category', ['url' => 'sopir'])}}">Sopir</a>
                <a href="{{route('worker-list-category', ['url' => 'admin'])}}"> Admin</a>
                <a href="{{route('worker-list-category', ['url' => 'buruh-pabrik'])}}"> Buruh Pabrik</a>
                <a href="{{route('worker-list-category', ['url' => 'satpam'])}}"> Satpam</a>
                <a href="{{route('worker-list-category', ['url' => 'montir'])}}"> Montir</a>
                <a href="{{route('worker-list-category', ['url' => 'kurir'])}}"> Kurir</a><br>
                <a href="{{route('worker-list-category', ['url' => 'juru-masak'])}}"> Juru Masak</a>
                <a href="{{route('worker-list-category', ['url' => 'kuli-bangunan'])}}"> Kuli Bangunan</a>
                <a href="{{route('worker-list-category', ['url' => 'ob-og'])}}"> Office Boy / Girl</a>
                <a href="{{route('worker-list-category', ['url' => 'tukang-kayu'])}}"> Tukang Kayu</a>
                <a href="{{route('worker-list-category', ['url' => 'penjahit'])}}"> Penjahit</a>
                <a href="{{route('worker-list-category', ['url' => 'pemayet'])}}"> Pemayet</a>
            </div>


            <!-- Announce -->
            <div class="announce">

                CariPekerja adalah Mitra Pencari Pekerja untuk Usaha Anda

            </div>

        </div>

    </div>
</div>
</div>