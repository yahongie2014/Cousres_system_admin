
<title>Al Amal Program</title>
<meta name="description" content="Al Amal Program">
<meta name="keywords" content="Al Amal">

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
<!-- login Style-->
 <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
<!-- Margin & Padding-->
<link rel="stylesheet" href="{{asset('assets/css/m-p.css')}}">
<!-- Responsive-->
<link rel="stylesheet" href="{{asset('assets/css/style-responsive.css')}}">
<!-- ========================================================================= -->

<!-- ==== Additional = Required on demand [ EX: when using Revolution Slider link his files ] ========= -->

<!-- ================================================================================ -->

<!-- ==== Header JS  [ some pages need to load js file before loading] ========= -->
<script type="text/javascript" src="{{asset('assets/js/modernizr.custom.js')}}"></script>
<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- ================================================================================ -->


        
        <!--Page Wrap -->
        <div class="wrapper-page">
        	<div class="card-box p-20 mb-20">
	            <div class="panel-heading">
	            	
	             	<div class="text-center">
		        		<img src="assets/images/login-logo.png" style="width: 60%;" />
	            	</div>

		@if (count($errors) > 0)
	        <ul class="">
	            @foreach ($errors->all() as $error)
	                <li><i class="fa fa-times"></i><strong>ERROR</strong>: {{ $error }}</li>
	            @endforeach
	        </ul>
	        @endif

                @if (session('message'))
                <ul class="">
                        <li><i class="fa fa-times"></i><strong>ERROR</strong>: {{ session('message') }}</li>
                </ul>
                @endif
	            </div>
	               
	            <div class="panel-body">
	                <form class="form-horizontal m-t-20" action="{{ route('loginUser') }}" method="post">
	    				<input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
	                    <div class="form-group">
	                        <div class="col-xs-12">
	                            <input class="form-control" type="text" name="email" required="" placeholder="Email">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-xs-12">
	                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-xs-12">
	                            <div class="checkbox checkbox-primary">
	                                <input id="checkbox-signup" type="checkbox" name="remember" value="1">
	                                <label for="checkbox-signup">Remember me</label>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group text-center m-t-40">
	                        <div class="col-xs-12">
	                            <button class="btn btn-danger btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
	                        </div>
	                    </div>
	                    <div class="form-group m-t-30 m-b-0">
	                        <div class="col-sm-12"><a href="recoverpassword.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a></div>
	                    </div>
	                </form>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-sm-12 text-center">
	                <p>Don't have an account? <a href="{{ route('getRegister') }}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
	            </div>
	        </div>
	    </div>


        <!-- ========================================== JS ========================================== -->

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
        
        
        
        <!-- =============================================================================================== -->

        <!-- ==== Additional Scripts  [ Here scripts that can not be replicated ] ==== -->
        
        <!-- ================================================================================================= -->
