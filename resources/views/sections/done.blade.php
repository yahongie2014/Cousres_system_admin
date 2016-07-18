@extends('layouts.main')

@section('meta')
<title>Al Amal Program</title>
<meta name="description" content="Al Amal Program">
<meta name="keywords" content="Al Amal">

@stop
@section('content')

        
        <!-- Page Loader -->        
        <div class="bo-loading">
        	<div class="loader-w loader-1"></div>
        </div>
        <!-- End Page Loader -->
        
        <!--Page Wrap -->
        <main class="page" id="top">
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
			            			<div class="post-meta-wrap thin-center-section text-center">
			            				<div class="post-meta classic-post-meta">
			            				<h3>Done</h3> </div></div></div></div></div></div></div></section></main>
@stop