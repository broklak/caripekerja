<!--BANNER START-->

<div class="banner-outer">

    <div id="banner" class="element kenburnsy">
        <img src="{{ asset("images/bg") }}/banner-img-1.png" alt="banner">
    </div>

    <div class="caption">

        <div class="holder">

            <h1>CariPekerja adalah Mitra Pencari Pekerja untuk Usaha Kecil dan Menengah</h1>

            <div class="btn-row">
                <a href="{{route('job-list')}}"><i class="fa fa-user"></i>Saya cari pekerjaan</a>
                <a href="{{route('worker-list')}}"><i class="fa fa-building-o"></i>Saya butuh pekerja</a>
            </div>

        </div>

    </div>

</div>

<!--BANNER END-->
@stack("slider")