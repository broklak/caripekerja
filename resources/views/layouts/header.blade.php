<header id="header">

    <div class="container">

        <!--NAVIGATION START-->

        <div class="navigation-col">

            <nav class="navbar navbar-inverse">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

                    <strong class="logo"><a href="{{url('/')}}"><img style="width: 200px" src="{{ asset("images") }}/logocpbeta.png" alt="logo"></a></strong> </div>

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

                        <li><a href="{{route('myaccount-index')}}">Akun Saya</a></li>

                        <li><a href="{{url('/keluar')}}">Log off</a></li>

                    </ul>

                </div>

            </div>
        @else
            <div class="dropdown-box">
                <span><a href="{{route('login')}}">Masuk</a></span> | <span><a href="{{route('register')}}">Daftar</a></span>
            </div>
        @endif

    </div>

    <!--USER OPTION COLUMN END-->

</header>