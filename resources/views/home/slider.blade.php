<!--BANNER START-->

<div class="banner-outer">

    <div id="banner" class="element kenburnsy">
        <img src="{{ asset("images/bg") }}/banner-img-1.png" alt="banner">
    </div>

    <div class="caption">

        <div class="holder">

            <h1>Cari Pekerjaan atau Butuh Pekerja</h1>

            <form action="#">

                <div class="container">

                    <div class="row">

                        <div class="col-md-6 col-sm-6">

                            <input type="text" placeholder="Masukkan Nama Pekerjaan">

                        </div>

                        <div class="col-md-5 col-sm-5">

                            <input type="text" placeholder="Masukkan Nama Daerah">

                        </div>

                        <div class="col-md-1 col-sm-1">

                            <button type="submit"><i class="fa fa-search"></i></button>

                        </div>

                    </div>

                </div>

            </form>

            <div class="btn-row">
                <a href="{{route('job-list')}}"><i class="fa fa-user"></i>Saya cari pekerjaan</a>
                <a href="{{route('worker-list')}}"><i class="fa fa-building-o"></i>Saya butuh pekerja</a>
            </div>

        </div>

    </div>

</div>

<!--BANNER END-->
@stack("slider")