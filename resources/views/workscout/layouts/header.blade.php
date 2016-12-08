<header style="@if($view_name != 'home.index') border-bottom: 1px solid #dfdfdf;  @endif" class="@if($view_name == 'home.index') transparent @endif sticky-header full-width">
<div class="container">
    <div class="sixteen columns">

        <!-- Logo -->
        <div id="logo">
            <h1><a href="{{route('home')}}"><img src="{{asset("images")}}/{{($view_name == 'home.index') ? 'logocp.png' : 'logo-not-homepage.png'}}" alt="CariPekerja.com" /></a></h1>
        </div>

        <!-- Menu -->
        <nav id="navigation" class="menu">
            <ul id="responsive">

                @if($authRole != 'employer') <li><a href="{{route('job-list')}}">Lowongan Kerja</a></li> @endif

                @if($authRole != 'worker') <li><a href="{{route('worker-list')}}">Cari Pekerja</a></li> @endif

                @if($authRole != 'worker') <li><a href="#">Buat Lowongan</a></li> @endif

            </ul>


            @if($isLogged)
                <ul class="responsive float-right">
                    <li><a href="{{route('myaccount-profile')}}">Hi, {{$authUser['name']}} @if($authRole == 'employer') | Anda memiliki {{$authUser['quota']}} Kuota @endif</a>
                        <ul>
                            <li><a href="{{route('owned-worker')}}">Akun Saya</a></li>
                            <li><a href="{{url('/keluar')}}">Keluar</a></li>
                        </ul>
                    </li>
                    <li><a href="" style="background-color: #2196F3;color: #fff;border-radius: 4px;padding: 15px" class="topup">Top Up</a></li>
                </ul>
            @else
                <ul class="responsive float-right">
                    <li><a href="{{route('register')}}">Daftar</a></li>
                    <li><a href="{{route('login')}}">Masuk</a></li>
                    <li><a href="" style="background-color: #2196F3;color: #fff;border-radius: 4px;padding: 15px" class="topup">Top Up</a></li>
                </ul>

            @endif

        </nav>

        <!-- Navigation -->
        <div id="mobile-navigation">
            <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
        </div>

    </div>
</div>
</header>
<div class="clearfix"></div>