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

    <!--HEADER END-->

    @section("slider")
        @include("home.slider")
    @show

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

