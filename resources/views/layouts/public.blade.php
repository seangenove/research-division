<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Research Division</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords"
          content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="/css/flexslider.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    {!! NoCaptcha::renderJs() !!}
    <!-- =======================================================
    Theme Name: MyBiz
    Theme URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
    @yield('styles')
</head>

<body id="top" data-spy="scroll">
<!--top header-->

<header id="home">

    <section class="top-nav hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="navbar-header">
                        <a href="/aboutDiv" class="navbar-brand">Research Division, Baguio City</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#ftheme">
                            <span class="sr-only">Toggle</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="top-right">
                        <p>Location:<span>City Hall Dr, Baguio City, 2600 Benguet</span></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--main-nav-->

    <div id="main-nav">
        <nav class="navbar">
            <div class="container">

                <div class="navbar-collapse collapse" id="ftheme">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Home</a></li>
                        {{--<li><a href="/ordinances">Ordinances</a></li>--}}
                        {{--<li><a href="/resolutions">Resolutions</a></li>--}}

                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Research & Records <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/r&r/ordinances">
                                        Ordinances
                                    </a>
                                </li>
                                <li>
                                    <a href="/r&r/resolutions">
                                        Resolutions
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Monitoring & Evaluation <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/ordinances">
                                        Ordinances
                                    </a>
                                </li>
                                <li>
                                    <a href="/resolutions">
                                        Resolutions
                                    </a>
                                </li>
                                <li>
                                    <a href="/monitorAndEval/ordinances">
                                        Monitored Ordinances
                                    </a>
                                </li>
                                <li>
                                    <a href="/monitorAndEval/resolutions">
                                        Monitored Resolutions
                                    </a>
                                </li>
                            </ul>
                        </li>


                        {{--<li><a href="/monitorAndEval">Monitoring & Evaluation</a></li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                {{--Monitoring & Evaluation <span class="caret"></span>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="/monitorAndEval">Questionnaire</a></li>--}}
                                {{--<li><a href="/reports">Reports</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        @if (\App\Page::all()->count() > 0)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Others <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach(\App\Page::all() as $page)
                                        <li><a href="/page/{{$page->id}}">{{ $page->title }}</a></li>
                                    @endforeach
                                </ul>
                        @endif
                        <li><a href="/contactUs">Contact</a></li>
                        <li><a href="/about">About</a></li>
                        <li class="hidden-sm hidden-xs">
                            <a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="search-form">
                    <form>
                        <input type="text" id="s" size="40" placeholder="Search..."/>
                    </form>
                </div>

            </div>
        </nav>
    </div>

</header>
@if(Session::has('flash_message'))
    <div class="alert {{Session::get('alert-class', 'alert-success')}}" style="margin-top: 8vh;">
        {{ Session::get('flash_message') }}
    </div>
@endif
@yield('content')

<!--bottom footer-->
<footer class="footer" id="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-2">
                        <img src="/images/client/Seal_of_baguio_city.png" alt="Seal_of_baguio_city">
                    </div>
                    <div class="col-md-6">
                        <br>
                        <p>Baguio City Government Contacts:</p>
                        <p>Telephone: (074) 446-3366</p>
                        <p>Email: baguio.webmin@gmail.com</p>
                        <p>Address: City Hall Loop, Baguio City</p>
                    </div>
                    <div class="col-md-offset-9">
                        <br>
                        <p>&copy; MyBix Theme. All rights reserved</p>
                        <p>Pictures all taken from Google</p>
                        <div class="credits">
                            <p>Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>


<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.flexslider.js"></script>
<script src="/js/jquery.inview.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC7dvhrXSpMj_XFOeDt3DgmWuDG6JHewb4"></script>
<script src="/js/script.js"></script>
<script src="/contactform/contactform.js"></script>

</body>

</html>
