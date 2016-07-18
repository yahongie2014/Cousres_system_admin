
@extends('layouts.main')

@section('meta')
        <title>Al Amal Program</title>
        <meta name="description" content="Al Amal Program">
        <meta name="keywords" content="Al Amal">

@stop

@section('header')
            <nav class="liomenu main-nav  transparent border-none stick-fixed wrapped">
                <div class="full-wrapper relative clearfix mt-0">
                    <div class="container bg-white border-radius-0 mt-0">
                        <div class="nav-logo-wrap local-scroll">
                            <div class="logo-container">
                                <a href="{{ route('frontend.index.get') }}" class="logo"> <img src="assets/images/logo.png"  width="205" height="50" alt=""> </a>
                            </div><!--End Logo Container-->
                        </div>
                        <div class="mobile-nav">
                            <i class="fa fa-bars"></i>
                        </div>
                        <!-- Main Menu -->
                        
                        <div class="inner-nav desktop-nav pull-right mr-20">
                            <ul class="clearlist">
                                <li>
                                    <a href="{{route('login')}}">Login</a>
                                </li>

                                <li>
                                    <a href="{{route('getRegister')}}">Register</a>
                                </li>

                            </ul>
                        </div><!--End desktop-nav-->
                        
                    </div><!--End Container-->
                </div><!--End full-wrapper-->
            </nav><!-- End Navigation panel -->

@stop

@section('content')


            <section class="home-section bg-dark parallax-4 bg-dark-overlay-30" data-background="assets/demo/new/12.jpg">
                <div class="force-height-full">
                    <div class="home-content container">
                        <div class="cover-text">
                            <div class="container">
                                <div class="row">
                                    <div class="welcome-intro col-sm-6 col-md-6  mt--80" data-wow-delay="0.1s" data-wow-duration="2s">
                                        <h1 class="fontsize-xxxl fontweight-900 transform-uppercase">{{ \App\Models\PageDesc::whereId(1)->first()->title }}</h1>
                                        <p class="cover-excerpt">
                                            {!! \App\Models\PageDesc::whereId(1)->first()->description!!}
                                        </p>
                                    </div><!--End Intro-->
                                </div><!--End Row-->
                            </div><!--End container-->
                        </div><!--End Cover Text-->
                    </div><!--End Home Content-->
                </div><!--End Height Full-->
            </section><!-- End Cover Section -->
            <!-- services Section -->
            <section class="page-section bg-gray-lighter2 pt-0 pb-40 overflow-v z-index">
                <div class="container relative">
                            <div class="row">

                                <div class="col-sm-12 col-md-12 col-lg-12 mb-0">
                                    <div class="mb-0 boxed-bg box-shadow mt--90">
                                            <div class="col-sm-12 col-md-7 col-lg-7 ">
                                                <div class="p-30 pr-40 pl-40 text-center">
                                                    <img src="assets/images/logo-v.png" style="width:40%;" class="mb-30"/>
                                                    <p class="mb-10">
                                                        {!! \App\Models\PageDesc::whereId(2)->first()->description !!}
                                                    </p>
                                                    <a href="#" target="_self" class="btn btn-mod btn-mod-defult btn-medium btn-round bg-appstore">Sign Up</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-5 ">
                                                <div class="mt-100 border-left pl-30">
                                            <h4>{{ \App\Models\PageDesc::whereId(3)->first()->title }}</h4>
                                            <ul class="ml-0 list-style list-check colored">
                                            {!! \App\Models\PageDesc::whereId(3)->first()->description !!}
                                        </ul>
                                                </div>
                                                
                                            </div>
                                    </div>
                                </div><!-- End Service Item -->

                            </div><!--End Row-->
                </div><!--End Container-->
            </section><!-- End services Section -->
<!-- Call Action Section -->
            <section class="page-section banner-section pb-0 bg-gray-lighter2">
                <div class="container relative">

                    <div class="row">

                        <div class="col-sm-6">

                            <div class="bref-content">
                                <div class="banner-content pb-100">
                                    <h2 class="banner-heading font-alt">{{ \App\Models\PageDesc::whereId(4)->first()->title }}</h2>
                                    <div class="banner-decription">
                                        {!! \App\Models\PageDesc::whereId(4)->first()->description !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 banner-image wow fadeInUp text-center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/5mpqhtK0NuU" frameborder="0" allowfullscreen></iframe>
                        </div>
                        

                    </div>

                </div>
            </section>
            <!-- End Call Action Section -->
            <section class="page-section bg-gray pt-30 pb-50">
                <div class="container relative">
                    <div class="row">
                        <div class="text-center">
                            <h2>How it Works</h2>
                        </div>
                        <div class="col-sm-3 col-md-3 text-center">
                                            <img src="{{asset(\App\Models\PageDesc::whereId(5)->first()->img)}}" />
                                            <h3 class="mt-30">{{ \App\Models\PageDesc::whereId(5)->first()->title }}</h3>    
                                            {!! \App\Models\PageDesc::whereId(5)->first()->description !!}
                            <a href="#" target="_self" class="btn btn-mod btn-mod-defult btn-medium btn-round bg-appstore">Register</a>
                        </div><!--End Col-->
                        <div class="col-sm-3 col-md-3 text-center">
                                            <img src="{{asset(\App\Models\PageDesc::whereId(6)->first()->img)}}" />
                                            <h3 class="mt-30">{{ \App\Models\PageDesc::whereId(6)->first()->title }}</h3>    
                                            {!! \App\Models\PageDesc::whereId(6)->first()->description !!}
                        </div><!--End Col-->
                        <div class="col-sm-3 col-md-3 text-center"> 
                                            <img src="{{asset(\App\Models\PageDesc::whereId(7)->first()->img)}}" />
                                            <h3 class="mt-30">{{ \App\Models\PageDesc::whereId(7)->first()->title }}</h3>       
                                            {!! \App\Models\PageDesc::whereId(7)->first()->description !!}
                        </div><!--End Col-->
                        <div class="col-sm-3 col-md-3 text-center"> 
                                            <img src="{{asset(\App\Models\PageDesc::whereId(8)->first()->img)}}" />
                                            <h3 class="mt-30">{{ \App\Models\PageDesc::whereId(8)->first()->title }}</h3>       
                                            {!! \App\Models\PageDesc::whereId(8)->first()->description !!}
                        </div><!--End Col-->
                    </div><!-- End Row -->
                </div><!-- End Container-->
            </section><!-- End  Section -->

            <section class="bg-gray fun-fucts">
                <div class="container">
                    <div class="p-30 bg-dark bg-appstore border-radius mb-70">
                        <div class="row">
                            <div class="col-xs-6 col-sm-2 fun-fuct align-center">
                                <div class="count-number">
                                    2011
                                </div><!--End Number-->
                                <span class="count-title font-alt">Founded</span>
                            </div><!--End Col-->
                            <div class="col-xs-6 col-sm-2 fun-fuct align-center">
                                <div class="count-number">
                                    100
                                </div><!--End Number-->
                                <span class="count-title font-alt">Students/Year</span>
                            </div><!--End Col-->
                            <div class="col-xs-6 col-sm-2 fun-fuct align-center">
                                <div class="count-number">
                                    8
                                </div><!--End Number-->
                                <span class="count-title font-alt">Courses</span>
                            </div><!--End Col-->
                            <div class="col-xs-6 col-sm-2 fun-fuct align-center">
                                <div class="count-number">
                                    30
                                </div><!--End Number-->
                                <span class="count-title font-alt">Professors</span>
                            </div><!--End Col-->
                            <div class="col-xs-6 col-sm-2 fun-fuct align-center">
                                <div class="count-number">
                                    80
                                </div><!--End Number-->
                                <span class="count-title font-alt">Sessions</span>
                            </div><!--End Col-->
                            <div class="col-xs-6 col-sm-2 fun-fuct align-center">
                                <div class="count-number">
                                    500
                                </div><!--End Number-->
                                <span class="count-title font-alt">Graduated Students</span>
                            </div><!--End Col-->
                        </div><!--End Row-->
                    </div><!--End Padding-->
                </div><!--Enc Container-->
            </section><!--End Facts-->


            <section class="page-section border-bottom pt-30">
                <div class="container relative">
                    <div class="section-text">
                        <div class="row">

                            <div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1 text-center mb-10">
                            @foreach($pages as $page)   
                                            @if($page->title == 'Meet Our Leaders')
                                            
                                            <h2>{{ $page->title}}</h2>
                                            <p class="fontsize-m">  
                                            {!! $page->description!!}</p>
                                            @endif
                                            @endforeach
                            
                            </div><!--End Col-->

                            <div class="col-sm-3 mb-xs-30 wow fadeInUp">
                                <div class="team-col team-alt text-center">
                                    <div class="team-col-image">
                                        <img src="assets/demo/team/9.jpg" alt="" />
                                    </div><!--End Image-->
                                    <div class="team-col-descr font-alt">
                                        <div class="team-col-name">
                                            Ahmed Fawzi
                                        </div><!--End Name-->
                                        <div class="team-col-role">
                                            Professor
                                        </div><!--End Role-->
                                    </div><!--End Desc-->
                                    <div class="team-col-info-btm">
                                        <div class="team-social-links">
                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div><!--End Social Links-->
                                    </div><!--End Image Info-->
                                </div><!-- End Team Person -->
                            </div><!--End Col-->

                            <div class="col-sm-3 mb-xs-30 wow fadeInUp">
                                <div class="team-col team-alt text-center">
                                    <div class="team-col-image">
                                        <img src="assets/demo/team/10.jpg" alt="" />
                                    </div><!--End Image-->
                                    <div class="team-col-descr font-alt">
                                        <div class="team-col-name">
                                            Ismail Essa
                                        </div><!--End Name-->
                                        <div class="team-col-role">
                                            Professor
                                        </div><!--End Role-->
                                    </div><!--End Desc-->
                                    <div class="team-col-info-btm">
                                        <div class="team-social-links">
                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div><!--End Social Links-->
                                    </div><!--End Image Info-->
                                </div><!-- End Team Person -->
                            </div><!--End Col-->

                            <div class="col-sm-3 mb-xs-30 wow fadeInUp">
                                <div class="team-col team-alt text-center">
                                    <div class="team-col-image">
                                        <img src="assets/demo/team/15.jpg" alt="" />
                                    </div><!--End Image-->
                                    <div class="team-col-descr font-alt">
                                        <div class="team-col-name">
                                            Ragab Safwan
                                        </div><!--End Name-->
                                        <div class="team-col-role">
                                            Professor
                                        </div><!--End Role-->
                                    </div><!--End Desc-->
                                    <div class="team-col-info-btm">
                                        <div class="team-social-links">
                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div><!--End Social Links-->
                                    </div><!--End Image Info-->
                                </div><!-- End Team Person -->
                            </div><!--End Col-->

                            <div class="col-sm-3 mb-xs-30 wow fadeInUp">
                                <div class="team-col team-alt text-center">
                                    <div class="team-col-image">
                                        <img src="assets/demo/team/4.jpg" alt="" />
                                    </div><!--End Image-->
                                    <div class="team-col-descr font-alt">
                                        <div class="team-col-name">
                                            Samy Gamal
                                        </div><!--End Name-->
                                        <div class="team-col-role">
                                            Professor
                                        </div><!--End Role-->
                                    </div><!--End Desc-->
                                    <div class="team-col-info-btm">
                                        <div class="team-social-links">
                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div><!--End Social Links-->
                                    </div><!--End Image Info-->
                                </div><!-- End Team Person -->
                            </div><!--End Col-->

                        </div><!--End Row-->
                    </div><!--Section Text-->
                </div><!--End Container-->
            </section><!-- End Section -->



            <!-- Clients Section -->
            <section class="small-section bg-borderd-v">
                <div class="container relative">
                    <div class="row">
                        <div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1 text-center mb-10">
                            <h2>Our Partners</h2>
                        </div><!--End Col-->
                        <div class="col-md-12">

                            <div class="small-item-carousel appstore owl-carousel mb-0 animate-init" data-anim-type="fade-in-right-large" data-anim-delay="100">

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-1.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-2.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-3.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-4.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-5.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-6.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-1.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                                <!-- Logo Item -->
                                <div class="logo-item">
                                    <img src="assets/demo/clients-logos/client-2.png" width="67" height="67" alt="" />
                                </div>
                                <!-- End Logo Item -->

                            </div><!--End Carousel-->

                        </div><!--End Col-->
                    </div><!--End Row-->
                </div><!--End Container-->
            </section><!-- End Clients Section -->

            <!-- Call Action Section -->
            <section class="tiny-section bg-dark bg-appstore">
                <div class="container relative">
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2">
                            <div class="align-left">
                                <h3 class="banner-heading font-alt pull-left mb-0 lh-26">Hurry up and Register before 25th, December, 2015</h3>
                                <div class="pull-right pull-right-xs">
                                    <a href="#" class="btn btn-mod btn-mod-defult  btn-medium btn-round btn-glass-white btn-border-w">Signup</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->
            </section>
            <!-- End Call Action Section -->
            
            <section class="page-section pb-0" id="contact">
                <div class="container relative">
                    
                    <div class="row mb-10 mb-xs-40">
                        <div class="col-md-6">
                            <section class="home-section bg-dark section-height-med mb-50">
                                <div class="force-height-parent">
                                    <!-- Google Map -->
                                    <div class="google-map">
                                        <div data-address="Cairo, Egypt" id="map-section"></div>
                                    </div>
                                    <!-- End Google Map -->
                                </div><!--End Height Full-->
                            </section><!-- End Cover Section -->
                        </div><!--End Col-->
                        <div class="col-md-6">
                        
                            <h4 class="section-title align-left font-alt mb-30 mb-sm-30  pl-10">
                                Have a questions?
                            </h4>
                            <!-- Features Grid -->
                            <div class="row alt-features-grid">
                                
                                
                                <!-- Features Item -->
                                <div class="col-sm-6 pl-30 mb-20">
                                    <div class="alt-features-item align-left pt-10">
                                        <div class="alt-features-icon pull-left mr-30">
                                            <span class="et-phone"></span>
                                        </div>
                                        <h3 class="alt-features-title mb-10 mt-0">Phone</h3>
                                        <p>+20123456789</p>
                                    </div>
                                </div>
                                <!-- End Features Item -->
                                
                                <!-- Features Item -->
                                <div class="col-sm-6 pl-30 mb-20">
                                    <div class="alt-features-item align-left pt-10">
                                        <div class="alt-features-icon pull-left mr-30">
                                            <span class="et-map-pin"></span>
                                        </div>
                                        <h3 class="alt-features-title mt-0 mb-10">Address</h3>
                                        <p>23 Main st, Maadi, Cairo, Egypt</p>
                                    </div>
                                </div>
                                <!-- End Features Item -->
                                
                                
                                 <!-- Features Item -->
                                <div class="col-sm-6 pl-30 mb-20">
                                    <div class="alt-features-item align-left pt-10">
                                        <div class="alt-features-icon pull-left mr-30">
                                            <span class="et-envelope"></span>
                                        </div>
                                        <h3 class="alt-features-title mt-0 mb-10">Email</h3>
                                        <p><a href="mailto:info@companyname.com">info@alamal.com</a></p>
                                    </div>
                                </div>
                                
                                
                                <!-- Features Grid -->
                                
                                <div class="col-md-12 pl-30 pt-40">
                                    <h4 class="mb-40 mb-sm-30mt-40">
                                        Send us A Message
                                    </h4>
                                    <form class="form contact-form" id="contact_form">
                                        <div class="clearfix">
                                            
                                            <div class="cf-left-col">
                                                
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name" class="input-md round form-control" placeholder="Name" pattern=".{3,100}" required>
                                                </div>
                                                
                                                <!-- Email -->
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" class="input-md round form-control" placeholder="Email" pattern=".{5,100}" required>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="cf-right-col">
                                                
                                                <!-- Message -->
                                                <div class="form-group">                                            
                                                    <textarea name="message" id="message" class="input-md round form-control" style="height: 84px;" placeholder="Message"></textarea>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="clearfix">
                                            
                                            <div class="pull-left">
                                                
                                                <!-- Inform Tip -->                                        
                                                <div class="form-tip pt-20">
                                                    <i class="fa fa-info-circle"></i> All the fields are required
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="pull-right">
                                                
                                                <!-- Send Button -->
                                                <div class="align-right pt-10">
                                                    <button class="submit_btn btn btn-mod btn-mod-defult btn-medium btn-round m-0" id="submit_btn">Submit Message</button>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div id="result"></div>
                                    </form>
                                    
                                </div>
                                
                           </div>
                           
                        </div>
                        
                    </div>
                    
                   
                    
                </div>
            </section>
            <!-- End Contact Section -->
@stop