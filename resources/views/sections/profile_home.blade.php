<?php 
use App\Models\Assignment;
use App\Models\Lesson;

?>
@extends('layouts.main')

@section('meta')
<title>Al Amal Program</title>
<meta name="description" content="Al Amal Program">
<meta name="keywords" content="Al Amal">

@stop

@section('content')

            
            <div class="searchoverlay">
                <i class="pe-7s-close closesearch"></i>
                <form  method="get" class="searchform" action="#">
                    <input type="search" value="" name="s" class="query" placeholder="Enter Search Query...">
                    <i class="pe-7s-search"></i>
                </form>
            </div><!-- End searchoverlay -->

<section class="page-section bg-gray pt-110 pb-0">
	<div class="creative-b-wrap">
		<div class="container">
    		
    		<div class="row">
    			
    			<div class="col-sm-4 col-md-4">
    				<!-- Side Content -->
    				<div class="post boxed-bg box-shadow border-redius">
    					<div class=" thin-center-section ">
            				<div class="post-meta classic-post-meta text-center">
            					<h5 class="post-title">{{ $user->fullname }}</h5>
            					
            					<img src="assets/demo/team/12.jpg" />
	  						</div><!--End Post Meta-->
	  						
	  						<ul class="menuprofile">
	  							<li><a href="{{ route('profileHome') }}">Profile Home</a></li>
	  							<li><a href="{{ route('profileCourses') }}">Course Records</a></li>
	  							<li><a href="{{ route('frontend.discussion.get') }}">Discussion Board Posts</a></li>
	  							<li><a href="{{ route('logout') }}">Logout</a></li>
	  						</ul>
            				
	  						
            			</div><!--End Post Meta Wrap-->
    				</div>
    			</div>
    			
    			<div class="col-sm-8 col-md-8 mb-20">
    				
    				<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
								<div class="p-20">
									<div class="t-post-meta-c">
										<h5><span class="t-post-date"><i class="fa fa-user"></i> Full Name:</span>  {{ $user->fullname }}</h5>
										<h5><span class="t-post-read"><i class="fa fa-envelope-o"></i> Email:</span>  {{ $user->email }}</h5>
										<h5><span class="t-post-read"><i class="fa fa-map-marker"></i> Birth Date:</span> {{ $user->birth_date }}</h5>
										<h5><span class="t-post-read"><i class="fa fa-map-marker"></i> Phone:</span> {{ $user->phone }}</h5>
										<h5><span class="t-post-read"><i class="fa fa-map-marker"></i> Address:</span> {{ $user->address }}</h5>
										<h5><span class="t-post-read"><i class="fa fa-map-marker"></i> University:</span> {{ $user->university->name }}</h5>
										<h5><span class="t-post-read"><i class="fa fa-map-marker"></i> Major:</span> {{ $user->major }}</h5>
										<h5><span class="t-post-read"><i class="fa fa-map-marker"></i> Academic Year:</span> {{ $user->academic_year }}</h5>
									</div><!--End Meta Content-->
								</div><!--End Post Meta-->
					</article><!--End Post-->
					
					<div class="col-md-4">
						<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
								<div class="p-20">
									<div class="profile-main">
										<h5><a href="{{ route('profileCourses') }}"><span class=""><i class="fa fa-university"></i></span>Courses Records</a></h5>
									</div><!--End Meta Content-->
								</div><!--End Post Meta-->
					</article><!--End Post-->
					</div>
					
					<div class="col-md-4">
						<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
								<div class="p-20">
									<div class="profile-main">
										<h5><a href="{{ route('frontend.discussion.get') }}"><span class=""><i class="fa fa-comments-o"></i></span>Discussion Board</a></h5>
									</div><!--End Meta Content-->
								</div><!--End Post Meta-->
					</article><!--End Post-->
					</div>
					
    				<div class="col-md-4">
						<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
								<div class="p-20">
									<div class="profile-main">
										<h5><a href=""><span class=""><i class="fa fa-graduation-cap"></i></span>Exam Results</a></h5>
									</div><!--End Meta Content-->
								</div><!--End Post Meta-->
					</article><!--End Post-->
					</div>
    			</div>
    			
    			
    		</div>
    		
    		
		</div><!--End Container-->
	</div><!--End Blog Wrap-->		
</section><!--End Page Section-->

@stop