<header style="@if($view_name != 'home.index') border-bottom: 1px solid #dfdfdf;  @endif" class="@if($view_name == 'home.index') transparent @endif sticky-header full-width">
<div class="container">
    <div class="sixteen columns">

        <!-- Logo -->
        <div id="logo">
            <h1><a href="{{route('home')}}"><img src="images/{{($view_name == 'home.index') ? 'logocp.png' : 'logo-not-homepage.png'}}" alt="CariPekerja.com" /></a></h1>
        </div>

        <!-- Menu -->
        <nav id="navigation" class="menu">
            <ul id="responsive">

                <li><a href="#">Lowongan Kerja</a></li>

                <li><a href="{{route('worker-list')}}">Cari Pekerja</a></li>

                <li><a href="#">Buat Lowongan</a></li>

            </ul>


            <ul class="float-right">
                <li><a href="{{route('register')}}">Daftar</a></li>
                <li><a href="{{route('login')}}">Masuk</a></li>
                <li><a href="" style="background-color: #2196F3;color: #fff;border-radius: 4px" class="topup">Top Up</a></li>
            </ul>

        </nav>

        <!-- Navigation -->
        <div id="mobile-navigation">
            <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
        </div>

    </div>
</div>
</header>
<div class="clearfix"></div>