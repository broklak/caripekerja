{!! session('displayMessage') !!}
<div id="banner" class="background" style="background-image: url(images/baru/homefix.jpg)">
<div class="container-mesh">
    <div class="sixteen columns">

        <div class="search-container">
            <!-- Form -->
            <form method="post" action="{{route('worker-list')}}">
                {{csrf_field()}}
            <div class="bottomline slider-container"></div>
                <h2 style="text-align: center">DAPATKAN PEKERJA BERKUALITAS DAN TERVERIFIKASI UNTUK USAHA ANDA</h2>
                <div class="container" style="text-align: center">
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
                </div>

            </form>

            <div class="clearfix"></div>

            <!-- Browse Jobs -->


            <div class="browse-jobs" style="display: none">
                <a href="{{route('worker-list-category', ['url' => 'sales'])}}"> Sales</a>
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
            </div>

        </div>

    </div>
</div>
</div>