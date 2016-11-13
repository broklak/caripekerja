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

                        <li><a href="#listing">Pencari Kerja</a>

                            <ul>

                                <li><a href="#listing">Baby Sitter</a></li>

                                <li><a href="#listing">Asisten Rumah Tangga</a></li>

                                <li><a href="#listing">Sopir</a></li>

                            </ul>

                        </li>

                        <li><a href="#">Pemilik Usaha</a></li>

                        <li><a href="#pricing">Paket</a></li>

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

                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img src="{{ asset("images/user") }}/user-img.png" alt="img"></button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                        <li><a href="#">{{$authUser['name']}}</a></li>

                        <li><a href="#">Change Password</a></li>

                        <li><a href="#">Edit Profile</a></li>

                        <li><a href="{{url('/logout')}}">Log off</a></li>

                    </ul>

                </div>

            </div>
        @else
            <div class="dropdown-box">

                <div class="dropdown">

                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <img src="{{ asset("images") }}/option-icon.png" alt="img"> </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                        <li> <a href="{{url('/login')}}" class="login-round"><i class="fa fa-sign-in"></i></a> <a href="#" class="btn-login">Masuk</a> </li>

                        <li> <a href="{{url('/register')}}" class="login-round"><i class="fa fa-user-plus"></i></a> <a href="{{url('/register')}}" class="btn-login">Daftar</a> </li>

                    </ul>

                </div>

            </div>
        @endif

    </div>

    <!--USER OPTION COLUMN END-->

</header>