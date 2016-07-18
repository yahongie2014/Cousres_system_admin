@extends('layouts.main')

@section('meta')
<title>Al Amal Program</title>
<meta name="description" content="Al Amal Program">
<meta name="keywords" content="Al Amal">

@stop
@section('content')


        	<section class="home-section  bg-dark parallax-1 section-height-small bg-dark-overlay-30" data-background="{{asset('assets/demo/new/12.jpg')}}">
        		<div class="force-height-parent">
	        		<div class="home-content container">
	        			<div class="cover-text">
	        				<div class="container">
		        				<div class="row">
		        				</div><!--End Row-->
	        				</div><!--End container-->
	        			</div><!--End Cover Text-->
	        		</div><!--End Home Content-->
        		</div><!--End Height Full-->
        	</section><!-- End Cover Section -->
        	            
		
            <div class="searchoverlay">
				<i class="pe-7s-close closesearch"></i>
				<form  method="get" class="searchform" action="#">
					<input type="text" value="" name="s" class="query" placeholder="Enter Search Query...">
					<i class="pe-7s-search"></i>
				</form>
			</div><!-- End searchoverlay -->
            
            <section class="page-section bg-gray pt-0 pb-0">
            	<div class="creative-b-wrap">
            		<div class="container">
	            		<div class="row">
	            			<div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1 mb-50">
			            		<div class="post boxed-bg box-shadow border-redius mt--110">
			            				@if(empty($picked_date))
			            			
			            			<div class="post-meta-wrap thin-center-section text-center">
			            				<div class="post-meta classic-post-meta">
			            					<h1 class="post-title">{{$module->title}}</h1>
			            					<h2 class="post-title">{{$exam->title}}</h2>
											@foreach($dates as $date)
											<form action="{{route('frontend.exams.post')}}" method="POST">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
											<input type="hidden" name="exam_id" value="{{$exam->id}}">
				  							<span class="date-meta"> <input type="radio" name="date" value="{{$date->id}}"required><i class="fa fa-calendar-o" > {{$date->start_date}}</i></span>

				  							<span class="read-meta"><i class="fa fa-bookmark"></i> {{$date->end_date-$date->start_date}}<span  class="meta-text"> HRS</span></span><br>
				  							@endforeach
				  							<br><input type="submit" class="btn btn-success" value="choose"></form>

				  						</div><!--End Post Meta-->
			            			</div><!--End Post Meta Wrap-->
			            			@else
									<div class="single-post-content entry-content border-bottom-9">
											<h3>The Exam will Start in</h3>
											
				<?php $mytime = Carbon\Carbon::now();

					$mytime = $mytime->toDateString();
					

					?>
				@if ($mytime == $date->start_date) 
					 <a class="btn btn-success" href="{{route('frontend.exam.get', $exam->id)}}">Now</a>
				@else
<?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($date->start_date))->diffForHumans() ?>
				@endif
										
											{{-- <div class="text-center">
												<div id="exam-timedown"></div>
											</div> --}}
											
										</div><!--End Single Post Content-->
				  					@endif
			            			<div class="post-single-nav classic-post-single-nav border-bottom">
										<div class="container-fluid">
											<div class="extra-meta-wrap">
												<div class="extra-meta pull-left">
													<div class="post-author">
										  				<span class="meta-text">Total Mark: </span> <a href="#">{{$total}}</a>
										  			</div><!--End Post author-->
												</div><!--End Extra Meta-->
												<div class="extra-meta  pull-right">
													<div class="post-author">
										  				<span class="meta-text">Exam Time: </span> 12:00 PM 
										  			</div><!--End Post author-->
												</div><!--End Post Share-->
											</div><!--End Extra Meta wrap-->
										</div><!--End Container Fluid-->
									</div><!--End Single Nav-->
									<div class="single-post-wrap">
										
										
										
										<div class="single-post-content entry-content border-bottom-9">
											<h3>Notes</h3>
											<p>Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
											<ul class="ml-0">
												<li class="border-bottom-8">Phasellus sit amet velit auctor turpis rhoncus </li>
												<li class="border-bottom-8">Phasellus sit amet velit auctor turpis rhoncus </li>
												<li class="border-bottom-8">Phasellus sit amet velit auctor turpis rhoncus </li>
												<li class="border-bottom-8">Phasellus sit amet velit auctor turpis rhoncus </li>
											</ul>
										</div><!--End Single Post Content-->
										
									</div><!--End single-post-wrap-->
			            		</div><!--End Post-->
		            		</div><!--End Col-->
	            		</div><!--End Row-->
            		</div><!--End Container-->
            	</div><!--End Blog Wrap-->		
            </section><!--End Page Section-->
      @stop
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
		   $("#exam-timedown")
		  	.countdown("2016/01/17", function(event) {
		     var $this = $(this).html(event.strftime(''
		     + '<h1><span>%D</span> day%!d </h1>'
		     + '<h1><span>%H</span> hr </h1>'
		     + '<h1><span>%M</span> min </h1>'
		     + '<h1><span>%S</span> sec </h1>'));
		  });
		</script>
        
      @stop