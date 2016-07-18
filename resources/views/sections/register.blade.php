<!DOCTYPE html>
<html>
    
<head>
       <title>Al Amal Program</title>
		<meta name="description" content="Al Amal Program">
		<meta name="keywords" content="Al Amal">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

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
        <!-- Margin & Padding-->
        <link rel="stylesheet" href="{{asset('assets/css/m-p.css')}}">
        <!-- Responsive-->
        <link rel="stylesheet" href="{{asset('assets/css/style-responsive.css')}}">
        <!-- ========================================================================= -->

        <!-- ==== Additional = Required on demand [ EX: when using Revolution Slider link his files ] ========= -->
        <link rel="stylesheet" href="{{asset('assets/css/count-down.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/exam.css')}}" />
        
        <!-- ================================================================================ -->

        <!-- ==== Header JS  [ some pages need to load js file before loading] ========= -->
        <script type="text/javascript" src="{{asset('assets/js/modernizr.custom.js')}}"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
        <!-- ================================================================================ -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

    </head>
    <body class="appear-animate creative-b">
        
        <!-- Page Loader -->        
        <div class="bo-loading">
        	<div class="loader-w loader-1"></div>
        </div>
        <!-- End Page Loader -->
        
        <!--Page Wrap -->
        <main class="page" id="top">
        	            
			<nav class="liomenu main-nav  transparent border-none stick-fixed wrapped">
				<div class="full-wrapper relative clearfix mt-0">
					<div class="container bg-white border-radius-0 mt-0">
						<div class="nav-logo-wrap local-scroll">
							<div class="logo-container">
								<a href="#" class="logo"> <img src="assets/images/logo.png"  width="205" height="50" alt=""> </a>
							</div><!--End Logo Container-->
						</div>
						<div class="mobile-nav">
							<i class="fa fa-bars"></i>
						</div>
						<!-- Main Menu -->
						
						<div class="inner-nav desktop-nav pull-right mr-20">
							<ul class="clearlist">
								<li>
									<a href="{{ route('login') }}">Login</a
								</li>

								<li>
									<a href="{{ route('getRegister') }}">Register</a
								</li>

							</ul>
						</div><!--End desktop-nav-->
						
					</div><!--End Container-->
				</div><!--End full-wrapper-->
			</nav><!-- End Navigation panel -->
            
                       
            <section class="page-section bg-gray pt-0 pb-0">
            	<div class="creative-b-wrap">
            		<div class="container">
	            		<div class="row">
	            			<div class="col-sm-12 col-md-12 mb-20">
			            		<div class="post boxed-bg box-shadow border-redius mt-110">
			            			<div class="col-sm-12 col-md-7 col-lg-7 ">
										<div class="p-30 pr-40 pl-40 text-center">
											<img src="assets/images/logo-v.png" style="width:40%;" class="mb-30"/>
											<p class="mb-10">
												2015-2016 Module Starts Soon. <br/>
												Applications Deadline 30th, December, 2015
											</p>
										</div>
									</div>
									<div class="col-sm-12 col-md-5 col-lg-5 ">
												<div class="mt-100 border-left pl-30">
													<h4>Who should Register</h4>
													<ul class="ml-0 list-style list-check colored">
														<li>Phasellus sit amet velit auctor turpis rhoncus.</li>
														<li>Phasellus sed dolor sodales, eleifend ipsum eu.</li>
														<li>Nullam id dolor in ex eleifend tempus.</li>
														<li>Etiam id lorem vel neque faucibus fermentum.</li>
														<li>Nunc tincidunt augue in enim sollicitudin feugiat.</li>
													</ul>
												</div>
												
											</div>
			            		</div><!--End Post-->
		            		</div><!--End Col-->
	            		</div><!--End Row-->
	            		
	            		<div class="row">
	            			<div class="col-sm-12 col-md-12 ">
			            		<div class="post boxed-bg box-shadow border-redius mb-30">
			            			
			            			<div class=" thin-center-section text-center">
			            				<div class="post-meta classic-post-meta">
			            					<h2 class="post-title">Registration Form</h2>
			            					<h6>Please fill all the below information</h6>

			            					
		@if (count($errors) > 0)
	        <ul class="">
	            @foreach ($errors->all() as $error)
	                <li><i class="fa fa-times"></i><strong>ERROR</strong>: {{ $error }}</li>
	            @endforeach
	        </ul>
	    @endif

	    @if (session()->has('status'))
	    	<div>
	    		{{session('status')}}
	    	</div>
	    @endif
			            					
			            					<form class="form-horizontal m-t-20" action="{{ route('postRegister') }}" method="post">
	    										<input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
							                    
							                    <div class="form-group">
												    <h5 class="">Personal Info</h5>
												</div>
							                    
							                    <div class="form-group">
												    <label for="name" class="col-sm-2 control-label">Full Name:</label>
												    <div class="col-sm-6">
												      <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Full Name">
												    </div>
												</div>
												
												<div class="form-group">
												    <label for="email" class="col-sm-2 control-label">Email:</label>
												    <div class="col-sm-6">
												      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
												    </div>
												</div>
												
												<div class="form-group">
												    <label for="birthdate" class="col-sm-2 control-label">Birth Date:</label>
												    <div class="col-sm-6">
												      <input type="text" id="datepicker" class="form-control" name="birth_date" value="{{ old('birth_date') }}" placeholder="YourBirth Date">
												    </div>
												</div>
												
												<div class="form-group">
												    <label for="phone" class="col-sm-2 control-label">Phone:</label>
												    <div class="col-sm-6">
												      <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
												    </div>
												</div>
												
												<div class="form-group">
												    <label for="address" class="col-sm-2 control-label">Address:</label>
												    <div class="col-sm-6">
												      <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
												    </div>
												</div>
												
												<div class="form-group">
												    <label for="university" class="col-sm-2 control-label">University:</label>
												    <div class="col-sm-6">
												      <select name="university_id"  class="form-control">
												      	<option>Select University</option>
												      	@foreach ($universities as $university)
												      	<option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
												      	@endforeach
												      </select>
												    </div>
												</div>
												
												<div class="form-group">
												    <label for="major" class="col-sm-2 control-label">Major:</label>
												    <div class="col-sm-6">
												      <input type="text" class="form-control" name="major" value="{{ old('major') }}" placeholder="Major">
												    </div>
												</div>
												
												<div class="form-group">
												    <label for="academic-year" class="col-sm-2 control-label">Academic Year:</label>
												    <div class="col-sm-6">
												      <select class="form-control" name="academic_year">
												      	<option>Select Year</option>
												      	<option value="1" {{ old('academic_year') == 1 ? 'selected': '' }}>1</option>
												      	<option value="2" {{ old('academic_year') == 2 ? 'selected': '' }}>2</option>
												      	<option value="3" {{ old('academic_year') == 3 ? 'selected': '' }}>3</option>
												      	<option value="4" {{ old('academic_year') == 4 ? 'selected': '' }}>4</option>
												      	<option value="5" {{ old('academic_year') == 5 ? 'selected': '' }}>5</option>
												      </select>
												    </div>
												</div>
												
												<div class="form-group">
												    <h5 class="">Account Info</h5>
												</div>
												
							                    <div class="form-group">
												    <label for="username" class="col-sm-2 control-label">UserName:</label>
												    <div class="col-sm-6">
												      <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="UserName">
												    </div>
												</div>
												
							                    <div class="form-group">
												    <label for="password" class="col-sm-2 control-label">Password:</label>
												    <div class="col-sm-6">
												      <input type="password" class="form-control" name="password" placeholder="Password">
												    </div>
												</div>
												<div class="form-group">
												    <label for="password2" class="col-sm-2 control-label">Repeat Password:</label>
												    <div class="col-sm-6">
												      <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password">
												    </div>
												</div>
												
							                    <div class="form-group text-center m-t-40">
							                        <div class="col-xs-4 col-xs-offset-4">
							                            <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
							                        </div>
							                    </div>
							                </form>
			            					
				  						</div><!--End Post Meta-->
			            			</div><!--End Post Meta Wrap-->
			            		</div><!--End Post-->
			            		
		            		</div><!--End Col-->
	            		</div><!--End Row-->
	            		
            		</div><!--End Container-->
            	</div><!--End Blog Wrap-->		
            </section><!--End Page Section-->
         	
         	
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
									<ul class="footer-list">
										<li><a href="">Home</a></li>
										<li><a href="">Terms of Services</a></li>
										<li><a href="">Site Map</a></li>
										<li><a href="">Contact</a></li>
									</ul>
								</div><!--End Col-->
							</div><!--End Row-->
						</div><!--End home-text-->
					</div><!--End home-content-->
				</div><!--End force-height-parent-->
			</footer><!--End Footer-->
         	
            
        </main><!-- End Page Wrap -->
        
        <!-- ========================================== JS ========================================== -->

        <!-- ========================= Essential JS = Required in All Pages ========================= -->
        <!-- jQuery -->
         <!-- <script type="text/javascript" src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script> -->
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
        <!-- jQuery Media Player YTPlayer -->
        <script type="text/javascript" src="{{asset('assets/js/jquery.mb.YTPlayer.js')}}"></script>
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
        <!-- jQuery countTo -->
        <script type="text/javascript" src="{{asset('assets/js/jquery.countdown.js')}}"></script>
        <script type="text/javascript">
		   	// 3 hrs from now!
			  function get15dayFromNow() {
			    return new Date(new Date().valueOf() +  3 * 60 * 60 * 1000);
			  }
					   
		   $("#exam-timecountdown")
		  	.countdown(get15dayFromNow(), function(event) {
		     var $this = $(this).html(event.strftime(''
		     + '<span>%H</span> hr'
		     + '<span>%M</span> min '
		     + '<span>%S</span> sec '));
		  });
		</script>
        
        <!-- =============================================================================================== -->

        <!-- ==== Additional Scripts  [ Here scripts that can not be replicated ] ==== -->
        
        <!-- ================================================================================================= -->
        
    </body>

</html>
