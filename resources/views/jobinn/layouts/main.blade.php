<!doctype html>

<html>

<head>

    @section("meta")
        @include("layouts.meta")
    @show

    @section("css")
        @include("layouts.css")
    @show

    @section("head_misc")
        @include("layouts.header_misc")
    @show

</head>

<body class="theme-style-1">

<!--WRAPPER START-->

<div id="wrapper">
    <!--HEADER START-->

    @section("header")
        @include("layouts.header")
    @show

    <!--BANNER START-->
    @if($banner_title != null)
        @include('layouts.banner')
    @endif
    <!--BANNER END-->

    <!--HEADER END-->

    @if($view_name == 'home.index')
        @section("slider")
            @include("home.slider")
        @show
    @endif

    <!--MAIN START-->

    <div id="main">
        @yield("content")
    </div>

    <!--MAIN END-->

    <!--FOOTER START-->

    @section("footer")
        @include("layouts.footer")
    @show

    <!--FOOTER END-->

</div>

<!--WRAPPER END-->

@section("js")
    @include("layouts.js")
@show

</body>

</html>

