<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    @section("meta")
        @include("layouts.meta")
    @show

    <!-- CSS
    ================================================== -->
    @section("css")
        @include("layouts.css")
    @show

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
@section("tracking")
    @include("layouts.tracking")
@show
<div id="wrapper" class="content-grey">


    <!-- Header
    ================================================== -->
    @section("header")
        @include("layouts.header")
    @show

    <!-- Banner
    ================================================== -->
    @if($view_name == 'home.index')
        @section("slider")
            @include("home.slider")
        @show
    @endif


    <!-- Content
    ================================================== -->
    @yield("content")


    <!-- Footer
    ================================================== -->
    @section("footer")
        @include("layouts.footer")
    @show


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
@section("js")
    @include("layouts.js")
@show


</body>
</html>