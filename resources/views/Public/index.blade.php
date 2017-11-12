@extends('layouts.public')
@section('content')
    <!--slider-->
    <div id="slider" class="flexslider">

        <ul class="slides">
            <li>
                <img src="/images/slider/slider1.jpg">

                <div class="caption">
                    <h2><span>Participatory Governance</span></h2>
                    <h2><span>Baguio City</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
            <li>
                <img src="/images/slider/slider2.jpg">

                <div class="caption">
                    <h2><span>yet another slide</span></h2>
                    <h2><span>html theme</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn">Read More</button>
                </div>

            </li>
            <li>
                <img src="/images/slider/slider3.jpg">

                <div class="caption">
                    <h2><span>one more slide</span></h2>
                    <h2><span>html theme</span></h2>
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
                        <h2>ordinances</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta elementum vitae.</p>
                    </div>
                </div>
            </div>
        </div>

        <!--about wrapper left-->
        <div class="container">

            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <div class="ordinance-left">
                        <img src="/images/about/about1.jpg" alt="">
                    </div>
                </div>
                <!--about wrapper right-->
                <div class="col-xs-12 col-md-7">
                    <div class="ordinance-right">

                        <div class="ordinance-right-heading">
                            <h1>Recent Ordinances</h1>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="#"><h3>Ordinance 1</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="#"><h3>Ordinance 2</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="#"><h3>Ordinance 3</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper">
                            <a href="#"><h3>Ordinance 4</h3></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                        </div>

                        <div class="ordinance-right-wrapper"></div>

                        <div class="pull-right">
                            <div class="ordinance-right-wrapper">
                                <button onclick="window.location.href='/ordinance'" class="btn btn-info">View All</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--about bg-->
    <div id="about-bg">

        <div class="container">
            <div class="row">

                <div class="about-bg-heading">
                    <h1>Statistics</h1>
                    <p>what we have achieved so far</p>
                </div>

                <div class=" col-xs-12 col-md-3">
                    <div class="about-bg-wrapper">
						<span class="count"><h1><span class="border">32</span>15</h1>
						</span>
                        <p>Pending Ordinances</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="about-bg-wrapper">
                        <span class="count"><h1>2217</h1></span>
                        <p>Approved Ordinances</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="about-bg-wrapper">
                        <span class="count"><h1>1522</h1></span>
                        <p>Data Gathered</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="about-bg-wrapper">
                        <span class="count"><h1>3151</h1></span>
                        <p>Participants</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="cover"></div>

    </div>

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

    <!--portfolio-->
    <div id="portfolio">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="portfolio-heading">
                        <h2>We are</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta elementum vitae.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="portfolio-thumbnail">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio1.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>lorem ipsum amet</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio2.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>lorem ipsum amet</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio3.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>lorem ipsum amet</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio4.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>lorem ipsum amet</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio5.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>what you see</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio6.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>lorem ipsum amet</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio7.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>lorem ipsum amet</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="item">
                            <img src="/images/portfolio/portfolio8.jpg" alt="">
                            <div class="caption">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <p>lorem ipsum amet</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--contact form-->
    <div id="get-touch">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="get-touch-heading">
                        <h2>get in touch</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta elementum vitae.</p>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="row">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>

                    <form action="" method="post" role="form" class="form contactForm">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="submit">
                            <button class="btn btn-default" type="submit">Send Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--contact-->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <div class="contact-heading">
                        <h2>contact</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus magna,malesuada porta elementum vitae.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="google-map" data-latitude="16.414162" data-longitude="120.591581"></div>
    </div>


    <!--client-->
    <div id="client">
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-2">
                    <span></span><img src="/images/client/client1.png" alt="">
                </div>

                <div class="col-sm-4 col-md-2">
                    <span></span><img src="/images/client/client2.png" alt="">
                </div>

                <div class="col-sm-4 col-md-2">
                    <span></span><img src="/images/client/client3.png" alt="">
                </div>

                <div class="col-sm-4 col-md-2">
                    <span></span><img src="/images/client/client4.png" alt="">
                </div>

                <div class="col-sm-4 col-md-2">
                    <span></span><img src="/images/client/client5.png" alt="">
                </div>

                <div class="col-sm-4 col-md-2">
                    <span></span><img src="/images/client/client6.png" alt="">
                </div>

            </div>
        </div>
    </div>
@endsection