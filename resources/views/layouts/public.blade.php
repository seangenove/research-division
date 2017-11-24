<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Research Division</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="/css/flexslider.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- =======================================================
    Theme Name: MyBiz
    Theme URL: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
                            <span class="sr-only">Toggle</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span
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
                            <li><a href="/ordinance">Ordinances</a></li>
                            <li><a href="/resolutions">Resolutions</a></li>
                            <li><a href="/monitorAndEval">Monitoring & Evaluation</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contactUs">Contact</a></li>
                            <li><a href="/reports">Reports</a></li>
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
                                <li class="hidden-sm hidden-xs">
                                    <a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </li>
                        </ul>
                    </div>

                    <div class="search-form">
                        <form>
                            <input type="text" id="s" size="40" placeholder="Search..." />
                        </form>
                    </div>

                </div>
            </nav>
        </div>

    </header>

    @yield('content')

    <!--bottom footer-->
    <div id="bottom-footer" class="hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-2">
                        <img src="/images/client/Seal_of_baguio_city.png" alt="">
                    </div>
                    <div class="col-md-6">
                        <br>
                        <p>Baguio City Government Contacts:</p>
                        <p>Telephone: (6374) 300 6500</p>
                        <p>Fax: (6374) 442 7228</p>
                        <p>Email: baguio.webmin@gmail.com</p>
                        <p>Address: City Hall Loop, Baguio City</p>
                    </div>
                    <div class="col-md-offset-9">
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>&copy; MyBix Theme. All rights reserved</p>
                        <p>Pictures all taken from Google</p>
                        <div class="credits">
                            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=MyBiz
              -->
                            <p>Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
