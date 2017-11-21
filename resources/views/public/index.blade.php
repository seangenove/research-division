@extends('layouts.public')
@section('content')
    <!--slider-->
    <div id="slider" class="flexslider">

        <ul class="slides">
            <li>
                <img src="/images/slider/slider4.jpg">

                <div class="caption">
                    <h2><span>NEW! Ordinance for Urban Gardening</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
            <li>
                <img src="/images/slider/slider5.jpg">

                <div class="caption">
                    <h2><span>No Smoking Ordinance</span></h2>
                    <h1><span>PUBLISHED</span></h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
            <li>
                <img src="/images/slider/slider6.jpg">

                <div class="caption">
                    <h2><span>No Jaywalking Ordinance.</span></h2>
                    <h1><span>Jaywalking is now prohibited!</span></h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
        </ul>

    </div>


    <div id="ordinance">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="ordinance-heading">
                        <h2>Resolutions</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta
                            elementum vitae.</p>
                    </div>
                </div>
            </div>
        </div>

        <!--about wrapper left-->
        <div class="container">

            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <div class="ordinance-left">
                        <img src="/images/about/Law1.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        <div class="ordinance-right-heading">
                            <h1>Recent Resolutions</h1>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/showResolution"><h3>Resolution 1</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/showResolution"><h3>Resolution 2</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/showResolution"><h3>Resolution 3</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/showResolution"><h3>Resolution 4</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper"></div>

                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/ordinance'" class="btn btn-info">View All
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ordinance">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="ordinance-heading">
                        <h2>ordinances</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta
                            elementum vitae.</p>
                    </div>
                </div>
            </div>
        </div>

        <!--about wrapper left-->
        <div class="container">

            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <div class="ordinance-left">
                        <img src="/images/about/Law1.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">
                        <div class="ordinance-right-heading">
                            <h1>Recent Ordinances</h1>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/show_ordinance"><h3>Ordinance 1</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/show_ordinance"><h3>Ordinance 2</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/show_ordinance"><h3>Ordinance 3</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="/public/show_ordinance"><h3>Ordinance 4</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin
                                interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna
                                placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper"></div>

                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/ordinance'" class="btn btn-info">View All
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<!--about bg-->--}}
    {{--<div id="about-bg">--}}

    {{--<div class="container">--}}
    {{--<div class="row">--}}

    {{--<div class="about-bg-heading">--}}
    {{--<h1>Statistics</h1>--}}
    {{--<p>what we have achieved so far</p>--}}
    {{--</div>--}}

    {{--<div class=" col-xs-12 col-md-3">--}}
    {{--<div class="about-bg-wrapper">--}}
    {{--<span class="count"><h1><span class="border">32</span>15</h1>--}}
    {{--</span>--}}
    {{--<p>Pending Ordinances</p>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-xs-12 col-md-3">--}}
    {{--<div class="about-bg-wrapper">--}}
    {{--<span class="count"><h1>2217</h1></span>--}}
    {{--<p>Approved Ordinances</p>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-xs-12 col-md-3">--}}
    {{--<div class="about-bg-wrapper">--}}
    {{--<span class="count"><h1>1522</h1></span>--}}
    {{--<p>Data Gathered</p>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-xs-12 col-md-3">--}}
    {{--<div class="about-bg-wrapper">--}}
    {{--<span class="count"><h1>3151</h1></span>--}}
    {{--<p>Participants</p>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="cover"></div>--}}

    {{--</div>--}}
    {{--

        <!--service-->
        <div id="service">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="service-heading">
                            <h2>service</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta elementum vitae.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--services wrapper-->
            <section class="services-style-one">
                <div class="outer-box clearfix">

                    <div class="services-column">
                        <div class="content-outer">
                            <div class="row clearfix">

                                <div class="service-block col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                                        <h4>FINANCIAL PLANNING</h4>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. </div>
                                    </div>
                                </div>

                                <div class="service-block col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                                        <h4>BUSINESS PLANNING</h4>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. </div>
                                    </div>
                                </div>

                                <div class="service-block col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="fa fa-trophy" aria-hidden="true"></i></div>
                                        <h4>WORK &amp; REDUNDANCY</h4>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. </div>
                                    </div>
                                </div>

                                <div class="service-block col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="fa fa-bullhorn" aria-hidden="true"></i></div>
                                        <h4>MORTGAGE ADVISOR</h4>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. </div>
                                    </div>
                                </div>

                                <div class="service-block col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
                                        <h4>RETIREMENT PLANNING</h4>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. </div>
                                    </div>
                                </div>

                                <div class="service-block col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="fa fa-money" aria-hidden="true"></i></div>
                                        <h4>SAVING AND INVESTING</h4>
                                        <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Content Column-->
                    <div class="content-column clearfix">
                        <div class="content-box">
                            <div class="inner-box">
                                <!--Section Title-->
                                <div class="sec-title aligned-right">
                                    <h2>Our Servi<span>ces</span></h2>
                                </div>
                                <div class="text">Lorem Ipsum is simply dummy text printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since 1500s, when an unknown printer specimen book. </div>

                                <button class="btn">learn more</button>
                            </div>
                        </div>
                    </div>


                </div>
            </section>

    --}}

    {{--
            <!--service gapping-->
            <div class="service-footer hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="service-footer-left">
                                <h3>Need to <span>Consult with us</span> ? Book an appointment</h3>
                                <p>The Brady Bunch the Brady Bunch that's the way we all became the Brady Bunch</p>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="service-footer-right">
                                <button class="btn">book now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    --}}


    {{--!--client-->
    <div id="client">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <span></span><img src="/images/client/Seal_of_baguio_city.png" alt="">
                </div>

            </div>
        </div>
    </div>--}}
    <br>
@endsection