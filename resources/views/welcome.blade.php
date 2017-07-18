@extends('layouts.app')

@section('content')
<div id="header" >
                <a href="" id="hamburger">
                <span></span><span></span><span></span>
                </a>
            </div>


            <div class="top-gap"></div>
            <div class="wrapper">
                <section class="header header-filter" style="background-image: url({{asset('img/home.jpg')}}); background-position:center;background-size:auto 50%;background-size:cover;background-repeat:no-repeat;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="brand">
                                    <h5 class="text-center"><br><br><br><span><img class="text-center" src="http://hubresearchllc.com/wp-content/uploads/2015/12/ipane2.png?x28804" alt="ipane2" width="56" height="56">
                                        </span><br><br>
                                        <span>WEBSITE FOR ONLINE EXAM.</span>
                                    </h5>
                                    <h6 class="text-center">Get Started - Now!</h6>
                                    <div class="text-center">
                                        <h3>
                                        Among those who watch any TV through a game console, <strong>one third</strong> say watching TV was a<strong> main reason</strong> they bought their console.
                                        <h3>
                                    </div>
                                    <div class="text-center">
                                        <button class="button-signup">
                                            <div style="vertical-align: middle;">SIGN UP</div>
                                        </button>
                                    </div>
                                    <br>
                                    <br><br><br><br><br><br>
                                    <br>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="gray-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
                                <h4 id="gray-block-header">Our fully-automated platform helps mobile services maximise<br />availability, increase productivity and explore new markets.</h4>
                                <h5>Give your customers exactly what they want, whenever they need it.</h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
                                <div class="service-cards">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <figure class="graphic">
                                            <img src="http://www.riyo.io/wp-content/uploads/2016/09/icon-book-min.png"
                                                width="130"
                                                height="129"
                                                alt="">
                                        </figure>
                                        <h4>Book</h4>
                                        <p>Customer can choose scheduled or on-demand.</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <figure class="graphic">
                                            <img src="http://www.riyo.io/wp-content/uploads/2016/09/dispatch-min.png"
                                                width="130"
                                                height="129"
                                                alt="">
                                        </figure>
                                        <h4>Dispatch</h4>
                                        <p>Total resource management with real-time updates.</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <figure class="graphic">
                                            <img src="http://www.riyo.io/wp-content/uploads/2016/09/icon-pay-min.png"
                                                width="130"
                                                height="129"
                                                alt="">
                                        </figure>
                                        <h4>Pay</h4>
                                        <p>Secure payments and instant feedback.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- .service-cards -->
                        </div>
                    </div>
                </section>
                <!-- .gray-block -->
                <div class="block infrastructure">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <figure class="graphic">
                                    <img width="478" height="280" src="http://www.riyo.io/wp-content/uploads/2016/09/infastructure-graphic-min-768x450.png" class="attachment-478x280 size-478x280" alt="" srcset="http://www.riyo.io/wp-content/uploads/2016/09/infastructure-graphic-min-768x450.png 768w, http://www.riyo.io/wp-content/uploads/2016/09/infastructure-graphic-min-300x176.png 300w, http://www.riyo.io/wp-content/uploads/2016/09/infastructure-graphic-min.png 956w" sizes="(max-width: 478px) 100vw, 478px" />
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="detail">
                                    <h2 class="block-title-red">An effective infrastructure to reinforce and grow your business.</h2>
                                    <p>Our world class, highly-scalable white-label BDP platform is perfect for service based businesses looking to take bookings, deliver services and collect payments in the ways modern customers have come to expect.</p>
                                    <p>With our easy drag and drop configuration, you and your team can respond to scheduled or on-demand bookings, create new schedules, dispatch workers, monitor and record transactions and process customer payments &#8211; all on one simple, unified platform.</p>
                                </div>
                                <!-- .detail -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .block.infrastructure -->
                <section id="carousel" class="membership">
                    <div class="bg">
                        <div class="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2400 708" preserveAspectRatio="none">
                                <path fill="#ffffff" d="M0.5,80.5l2400-80v628l-2400,80V80.5Z"/>
                            </svg>
                        </div>
                        <div class="top">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2400 708" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="gradient_color" gradientTransform="rotate(90)">
                                        <stop offset="0%" stop-color="#f44c67"/>
                                        <stop offset="100%" stop-color="#fb377f"/>
                                    </linearGradient>
                                </defs>
                                <path fill="#ffffff" d="M0,140L2400,0V568L0,708V140Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="inside">
                        <div class="slides">
                            <div class="slide membership">
                                <div class="box">
                                    <h3 class="membership">
                                        <svg class="membership">
                                            <use xlink:href="#svg_membership" />
                                        </svg>
                                        <em>Membership</em>
                                    </h3>
                                    <h4 class="membership">Create your own subscription business.</h4>
                                    <p>You’ll have customers signing up for your new business in just a few minutes. Plasso handles all the technical details like recurring billing, member management and more.</p>
                                    <a href="/membership" class="btn membership empty">Learn More</a>
                                </div>
                            </div>
                            <div class="slide billing">
                                <div class="box">
                                    <h3 class="billing">
                                        <svg class="billing">
                                            <use xlink:href="#svg_billing" />
                                        </svg>
                                        <em>Billing</em>
                                    </h3>
                                    <h4 class="billing">Recurring billing and customer management.</h4>
                                    <p>Instantly create a pay-wall on your website using your own content. An entire customer billing, management, storage and authentication system ready to be embedded into your website.</p>
                                    <a href="/billing" class="btn billing empty">Learn More</a>
                                </div>
                            </div>
                            <div class="slide storefront">
                                <div class="box">
                                    <h3 class="storefront">
                                        <svg class="storefront">
                                            <use xlink:href="#svg_storefront" />
                                        </svg>
                                        <em>Storefront</em>
                                    </h3>
                                    <h4 class="storefront">Accept payments and sell anything.</h4>
                                    <p>Powerful and easy one-off purchases. Sell physical and digital goods, charge for services, accept donations, sell pre-orders and more. Storefront makes it all too easy.</p>
                                    <a href="/storefront" class="btn storefront empty">Learn More</a>
                                </div>
                            </div>
                            <!-- <div class="slide invoice">
                                <div class="box">
                                  <h3 class="invoice"><svg class="invoice"><use xlink:href="#svg_invoice" /></svg> <em>Invoice</em></h3>
                                  <h4 class="invoice">Create and send invoices.</h4>
                                  <p>Smart invoicing that will get you paid. Create and send one-off invoices or send recurring invoices that will automatically bill your clients/customers on a recurring basis.</p>
                                  <a href="/invoice" class="btn invoice empty">Learn More</a>
                                </div>
                                </div> -->
                        </div>
                        <div class="markers">
                            <a href="" class="marker selected"><span></span></a><a href="" class="marker"><span></span></a><a href="" class="marker"><span></span></a>
                        </div>
                    </div>
                </section>
                
                <!-- #colophon -->
            </div>
            <!-- #page -->
@endsection
