<!DOCTYPE html>
<html>

	<head>
	@yield('meta')
		<meta charset="utf-8">
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	
	@section('head')
		<!-- ================ Favicon's ================ -->
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('assets/images/small.ico')}}">
		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" href="{{asset('assets/images/icon.png')}}">
		<!-- Apple Touch Icon 72x72 -->
		<link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/icon-72.png')}}">
		<!-- Apple Touch Icon 114x114 -->
		<link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/icon-114.png')}}">

		<!-- ================ CSS Files ================ -->

		<!-- ================ Essential Styles = Required in All Pages ================ -->
		<!-- Bootstrap min-->
		<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
		<!-- Animate-->
		<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
		<!-- YTPlayer-->
		<link rel="stylesheet" href="{{asset('assets/css/YTPlayer.css')}}">
		<!-- OWL Carousel-->
		<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
		<!-- Magnific Popup-->
		<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
		<!-- Main Style-->
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('style.css')}}">

		<!-- Margin & Padding-->
		<link rel="stylesheet" href="{{asset('assets/css/m-p.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/exam.css')}}" />

        <script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
        
		<!-- Responsive-->
		<link rel="stylesheet" href="{{asset('assets/css/style-responsive.css')}}">
				  <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- jQuery Media Player YTPlayer -->
		<!-- ========================================================================= -->

		<!-- ==== Additional = Required on demand [ EX: when using Revolution Slider link his files ] ========= -->

		<!-- ================================================================================ -->

		<!-- ==== Header JS  [ some pages need to load js file before loading] ========= -->
		<script type="text/javascript" src="{{asset('assets/js/modernizr.custom.js')}}"></script>
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js')}}"></script>
		<![endif]-->
		<!-- ================================================================================ -->

	</head>
	@show

	<body class="appear-animate agency-v">

		<!--Page Wrap -->
		<main class="page" id="top">
		@section('header')
			<nav class="liomenu main-nav  transparent border-none stick-fixed wrapped">
                <div class="full-wrapper relative clearfix mt-0">
                	<div class="container bg-white box-shadow">
	                    <div class="nav-logo-wrap ">
	                    	<div class="logo-container">
	                    		<a href="{{ route('frontend.index.get') }}" class="logo"> <img src="{{asset('assets/images/logo.png')}}"  width="205" height="50" alt=""> </a>
	                    	</div><!--End Logo Container-->
	                    </div>
	                    <div class="mobile-nav">
	                        <i class="fa fa-bars"></i>
	                    </div>
	                    
	                    <!-- Header Search -->
                        <div class="header-search pull-right">
                            <div class="option searchnav"><span class="showsearch"><i class="fa fa-search"></i></span></div>
                        </div><!--End Header Search-->
                        
	                    <!-- Main Menu -->
	                    <div class="inner-nav desktop-nav pull-left mr-20">
	                        <ul class="clearlist">
	                            <li><a href="#" class="mn-has-sub">Modules <i class="fa fa-angle-down"></i></a>
                                    <ul class="mn-sub">
                                    <?php $modules = \App\Models\Module::all(); ?>
                                    @foreach ($modules as $module)
                                    <?php $courses = $module->courses; ?>
                                        <li><a href="{{ route('frontend.module.get', $module->id) }}" class="mn-has-sub"><i class="fa fa-navicon fa-sm"></i>{{ $module->title }}<i class="fa fa-angle-right right"></i></a>
                                            <ul class="mn-sub">
                                            @foreach ($courses as $course)
                                                <li><a href="{{route('frontend.course.get', $course->id)}}">{{$course->title}}</a></li>
                                           @endforeach
                                            </ul>
                                        </li>
                                   @endforeach
                                    </ul>
                                </li>
	                            <li><a href="{{route('frontend.assignments.get')}}">Assignments</a></li>
	                            <li><a href="{{route('frontend.discussion.get')}}">Discussion Board</a></li>
	                            <?php $exam = \App\Models\Exam::first(); ?>
	                            @if ($exam)
	                            <li><a href="{{route('frontend.exams.get')}}">Announcements</a></li>
	                            @else
	                            <li><a title="there is no exams right now">Announcements</a></li>
	                            @endif
	                            <li><a href="">Calendar</a></li>
	                            <li><a href="#" class="mn-has-sub">Profile <i class="fa fa-angle-down"></i></a>
                                    <ul class="mn-sub">
                                        <li><a href="{{route('profileHome')}}">Profile</a></li>
                                        <li><a href="{{route('profileCourses')}}">Course Records</a></li>
                                        <li><a href="{{route('logout')}}">Logout</a></li>
                                    </ul>
                                </li>
	                            
	                        </ul>
	                    </div><!--End desktop-nav-->
                    </div><!--End Container-->
                </div><!--End full-wrapper-->
            </nav><!-- End Navigation panel -->
		@show

		{{-- start content --}}
			@yield('content')
		{{-- end content --}}
		
			<footer class="xtiny-section section-height-xstiny bg-dark">
				<div class="force-height-parent container relative">
					<div class="home-content">
						<div class="home-text  text-center">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<p class="copyright-text pull-left mb-0">
										Copyright © 2015 Al Amal Program. All Rights Reserved.
									</p>
								</div><!--End col-->
								<div class="col-sm-6 col-md-6">
									<div class="f-social social pull-right">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
									</div>
								</div><!--End Col-->
							</div><!--End Row-->
						</div><!--End home-text-->
					</div><!--End home-content-->
				</div><!--End force-height-parent-->
			</footer><!--End Footer-->

		</main><!-- End Page Wrap -->

		<!-- ========================================== JS ========================================== -->
@section('script')
		<!-- ========================= Essential JS = Required in All Pages ========================= -->
		<!-- jQuery -->
		<script type="text/javascript" src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
		<!-- jQuery.easing -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
		<!-- jQuery Bootstrap -->
		<script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
		<!-- jQuery.scrollTo -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
		<!-- jQuery.localScroll -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.localScroll.min.js')}}"></script>
		<!-- jQuery.viewport -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.viewport.mini.js')}}"></script>
		<!-- jQuery.appear -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.appear.js')}}"></script>
		<!-- Sticky Plugin -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.sticky.js')}}"></script>
		<!-- Parallax -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.parallax-1.1.3.js')}}"></script>
		<!-- FitVids -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.fitvids.js')}}"></script>
		<!-- imagesLoaded -->
		<script type="text/javascript" src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
		<!-- Magnific Popup -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
		<!-- owl carousel -->
		<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<!-- Masonry PACKAGED -->
		<script type="text/javascript" src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
		<!-- Isotope -->
		<script type="text/javascript" src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
		<!-- WOW -->
		<script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
		<!-- jQuery countTo -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.countTo.js')}}"></script>
		<!-- Basic jQuery Functions -->
		<script type="text/javascript" src="{{asset('assets/js/custom-scripts.js')}}"></script>

		<script type="text/javascript" src="{{asset('assets/js/jquery.mb.YTPlayer.js')}}"></script>
		  <!-- jQuery countTo -->
        <script type="text/javascript" src="{{asset('assets/js/jquery.countdown.js')}}"></script>

        <script type="text/javascript">
		   $("#exam-timedown")
		  	.countdown("2016/01/17", function(event) {
		     var $this = $(this).html(event.strftime(''
		     + '<h1><span>%D</span> day%!d </h1>'
		     + '<h1><span>%H</span> hr </h1>'
		     + '<h1><span>%M</span> min </h1>'
		     + '<h1><span>%S</span> sec </h1>'));
		  });
		</script>
		<!-- jQuery extended placeholder plugin -->

		<!--[if lt IE 10]><script type="text/javascript" src="{{asset('assets/js/placeholder.js')}}"></script><![endif]-->
		<!-- =============================================================================================== -->

		<!-- ========================= Additional JS File  = Required When needed ========================= -->
		<!-- modernizr.custom -->
		<script type="text/javascript" src="{{asset('assets/js/modernizr.custom.25376.js')}}"></script>
		<!-- classie -->
		<script type="text/javascript" src="{{asset('assets/js/classie.js')}}"></script>
		<!-- jQuery Background video plugin for jQuery -->
		<script type="text/javascript" src="{{asset('assets/js/jquery.backgroundvideo.min.js')}}"></script>

		<!-- =============================================================================================== -->

		<!-- ==== Additional Scripts  [ Here scripts that can not be replicated ] ==== -->

		<!-- ================================================================================================= -->
		<!-- Contact Form  -->
        <script type="text/javascript" src="{{asset('assets/js/contact-form.js')}}"></script>
        <!-- Google Maps  -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
        <script type="text/javascript" src="{{asset('assets/js/gmap3.min.js')}}"></script>

@show
	</body>

</html>
