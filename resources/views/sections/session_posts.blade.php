

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
					<input type="text" value="" name="s" class="query" placeholder="Enter Search Query...">
					<i class="pe-7s-search"></i>
				</form>
			</div><!-- End searchoverlay -->
            
            <section class="page-section bg-gray pt-110 pb-0">
            	<div class="creative-b-wrap">
            		<div class="container">
	            		<div class="row">
	            			<div class="col-sm-12 col-md-12">
	            				<div class="post boxed-bg box-shadow border-redius mt-20">
	            					<div class=" thin-center-section text-center">
			            				<div class="post-meta classic-post-meta">
			            					<h3 class="post-title">Discussion Board</h3>
				  						</div><!--End Post Meta-->
				  						<div class="breadcrumbf">
                            <a href="{{route('frontend.discussion.get')}}">Discussion Board</a> <span class="diviver">&gt;</span> <a href="{{route('frontend.discussion.courses.get', $module->id)}}">{{$module->title}} Module</a>
                             <span class="diviver">&gt;</span> <a href="{{route('frontend.discussion.sessions.get', $course->id)}}">{{$course->title }} Course</a>
                             <span class="diviver">&gt;</span> <a href="#"> {{$session->title }}  Session</a>
                       </div>
			            			</div><!--End Post Meta Wrap-->
	            				</div>
	            				
	            			</div>
	            		</div>
	            		<div class="row">
	            			<div class="col-sm-8 col-md-8 mb-20">
	            				<div class="post boxed-bg box-shadow border-redius">
								
									
	            				</div>
	            				@foreach($posts as $post)
	            				
	            				<div class="post boxed-bg box-shadow border-redius discussion-post wow fadeInUp">
		                                <div class="wrap-ut pull-left">
		                                    <div class="userinfo pull-left">
		                                        <div class="avatar">
		                                            <a href="#"><img src="{{asset('assets/demo/team/small/12.jpg')}}" alt=""></a>
		                                        </div>
		
		                                        <div class="icons">
		                                           <a href="#">Mohamed Amin</a>
		                                        </div>
		                                    </div>
		                                    <div class="posttext pull-left">
		                                        <h2><a href="{{route('frontend.post.get', $post->id)}}">{{$post->title}}</a></h2>
		                                        <p>{{$post->post}}</p>
		                                    </div>
		                                    <div class="clearfix"></div>
		                                </div>
		                                <div class="postinfo pull-left">
		                                    <div class="comments">
		                                        <div class="commentbg">
		                                            560
		                                            <div class="mark"></div>
		                                        </div>
		
		                                    </div>
		                                    <div class="views"><i class="fa fa-eye"></i> 1,568</div>
		                                    <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>                                    
		                                </div>
		                                <div class="clearfix"></div>
	            				</div>
	            				@endforeach
	            			
	            				
	            				<div class="paginationf">
                                <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                                
                                <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                                <div class="clearfix"></div>
                            </div>
	            				
	            			</div>
	            			
	            			<div class="col-sm-4 col-md-4">
	            				<!-- Side Content -->
	            				<div class="post boxed-bg box-shadow border-redius">
	            					<div class=" thin-center-section ">
			            				<div class="post-meta classic-post-meta text-center">
			            					<h5 class="post-title">My Active Topics</h5>
			            					
				  						</div><!--End Post Meta-->
				  						
				  						<div class="discussion-post-side wow fadeInUp border-bottom">
			                                <div class="wrap-ut">
			                                   <div class="posttext ">
			                                        <h2><a href="02_topic.html">Lorem ipsum dolor sit amet, tellus proin adipiscing odio</a></h2>
			                                    </div>
			                                    <div class="clearfix"></div>
			                                </div>
			                                <div class="postinfo">
			                                    <div class="comments pull-left"><i class="fa fa-comments"></i> 560</div>
			                                    <div class="views pull-left"><i class="fa fa-eye"></i> 1,568</div>
			                                    <div class="time pull-left"><i class="fa fa-clock-o"></i> 24 min</div>                                    
			                                </div>
			                                <div class="clearfix"></div>
			            				</div>
			            				
			            				<div class="discussion-post-side wow fadeInUp border-bottom">
			                                <div class="wrap-ut">
			                                   <div class="posttext ">
			                                        <h2><a href="02_topic.html">Lorem ipsum dolor sit amet, tellus proin adipiscing odio</a></h2>
			                                    </div>
			                                    <div class="clearfix"></div>
			                                </div>
			                                <div class="postinfo">
			                                    <div class="comments pull-left"><i class="fa fa-comments"></i> 560</div>
			                                    <div class="views pull-left"><i class="fa fa-eye"></i> 1,568</div>
			                                    <div class="time pull-left"><i class="fa fa-clock-o"></i> 24 min</div>                                    
			                                </div>
			                                <div class="clearfix"></div>
			            				</div>
			            				
			            				<div class="discussion-post-side wow fadeInUp border-bottom">
			                                <div class="wrap-ut">
			                                   <div class="posttext ">
			                                        <h2><a href="02_topic.html">Lorem ipsum dolor sit amet, tellus proin adipiscing odio</a></h2>
			                                    </div>
			                                    <div class="clearfix"></div>
			                                </div>
			                                <div class="postinfo">
			                                    <div class="comments pull-left"><i class="fa fa-comments"></i> 560</div>
			                                    <div class="views pull-left"><i class="fa fa-eye"></i> 1,568</div>
			                                    <div class="time pull-left"><i class="fa fa-clock-o"></i> 24 min</div>                                    
			                                </div>
			                                <div class="clearfix"></div>
			            				</div>
				  						
			            			</div><!--End Post Meta Wrap-->
	            				</div>
	            			</div>
	            		</div>
	            		
	            		
            		</div><!--End Container-->
            	</div><!--End Blog Wrap-->		
            </section><!--End Page Section-->
       @stop