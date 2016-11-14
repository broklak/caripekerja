<header id="header">

    <div class="container">

        <!--NAVIGATION START-->

        <div class="navigation-col">

            <nav class="navbar navbar-inverse">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

                    <strong class="logo"><a href="{{url('/')}}"><img style="width: 200px" src="{{ asset("images") }}/logocp.png" alt="logo"></a></strong> </div>

                <div id="navbar" style="margin-top: 40px" class="collapse navbar-collapse">

                    <ul class="nav navbar-nav" id="nav">

                        <li><a href="{{route('job-list')}}">Lowongan Kerja</a></li>

                        <li><a href="{{route('worker-list')}}">Butuh Pekerja</a></li>

                        <li><a href="{{route('job-create')}}">Buat Lowongan</a></li>

                        <li><a href="#testimonial">Testimonial</a></li>

                        <li><a href="#how-it-works">Cara Kerja</a></li>

                        <li><a href="#">Kontak</a></li>

                    </ul>

                </div>

            </nav>

        </div>

        <!--NAVIGATION END-->

    </div>



    <!--USER OPTION COLUMN START-->
    <div class="user-option-col">

        @if($isLogged)
            <div class="thumb">

                <div class="dropdown">

                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img src="{{ asset("images") }}/bg/signup.png" class="user-icon" alt="img"></button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                        <li><a href="#">Akun Saya</a></li>

                        <li><a href="{{url('/keluar')}}">Log off</a></li>

                    </ul>

                </div>

            </div>
        @else
            <div class="dropdown-box">

                <div class="dropdown">

                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img src="{{ asset("images") }}/option-icon.png" alt="img"> </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                        <li> <a href="{{url('/masuk')}}" class="login-round"><i class="fa fa-sign-in"></i></a> <a href="{{url('/masuk')}}" class="btn-login">Masuk</a> </li>

                        <li> <a href="{{url('/daftar')}}" class="login-round"><i class="fa fa-user-plus"></i></a> <a href="{{url('/daftar')}}" class="btn-login">Daftar</a> </li>

                    </ul>

                </div>

            </div>
        @endif

    </div>

    <!--USER OPTION COLUMN END-->

</header>