
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
				                            <a href="#">Discussion Board</a>
				                            <span class="diviver">&gt;</span>
				                            <a href="#">Main Category</a>
				                            <span class="diviver">&gt;</span>
				                            <a href="#">Current Category</a>
				                             
				                       </div>
			            			</div><!--End Post Meta Wrap-->
	            				</div>
	            				
	            			</div>
	            		</div>
	            		<div class="row">
	            			<div class="col-sm-8 col-md-8 mb-20">
	            				
	            				<div class="post boxed-bg box-shadow border-redius discussion-post wow fadeInUp ">
		                                <div class="topwrap">
		                                     <div class="userinfo pull-left">
		                                        <div class="avatar">
		                                            <a href="#"><img src="assets/demo/team/small/12.jpg" alt=""></a>
		                                        </div>
		
		                                        <div class="icons">
		                                           <a href="#">{{ $post->user->fullname }}</a>
		                                        </div>
		                                    </div>
		                                    <div class="posttext pull-left">
		                                        <h2>{{$post->title}}</h2>
		                                        <p>
		                                        	{{$post->post}}
		                                        </p>
		                                    </div>
		                                    <div class="clearfix"></div>
		                                </div>                              
		                                <div class="postinfobot">
		
		                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{$post->created_at}}</div>
		
		                                    <div class="next pull-right">                                        
		                                        <a href="#" title="reply"><i class="fa fa-reply"></i></a>
		
		                                        <a href="#" title="report inappropriate"><i class="fa fa-flag"></i></a>
		                                    </div>
		
		                                    <div class="clearfix"></div>
		                                </div>
		                            </div>
		                            @foreach($comments as $comment)
	            				
	            				<div class="post boxed-bg box-shadow border-redius discussion-post wow fadeInUp ">
		                                <div class="topwrap">
		                                     <div class="userinfo pull-left">
		                                        <div class="avatar">
		                                            <a href="#"><img src="assets/demo/team/small/12.jpg" alt=""></a>
		                                        </div>
		
		                                        <div class="icons">
		                                           <a href="#">{{ $comment->user->fullname }}</a>
		                                        </div>
		                                    </div>
		                                    <div class="posttext pull-left">
		                                        <p style="color: black;  font-weight: bold;">
		                                        	{{$comment->comment}}
		                                        </p>
		                                    </div>
		                                    <div class="clearfix"></div>
		                                </div>                              
		                                <div class="postinfobot">
		
		                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{$comment->created_at}}</div>
		
		                                    <div class="next pull-right">                                        
		                                       
		
		                                       
		                                    </div>
		
		                                    <div class="clearfix"></div>
		                                </div>
		                            </div>
	            					@endforeach
	            				
	            				     <div class="post boxed-bg box-shadow border-redius discussion-post wow fadeInUp">
		                                <form action="#" class="form" method="post">
		                                    <div class="topwrap">
		                                        <div class="userinfo pull-left">

		                                    </div>
		                                        <div class="posttext pull-left">
		                                            <div class="textwraper">
		                                         <form action="{{route('frontend.post.post')}}" method="POST">
		                                         <input type="hidden" name="post_id" value="{{$post->id}}">
		                                         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		                                                <textarea id="reply" name= "comment" placeholder="Type your Replay here" required></textarea>
		                                            </div>
		                                        </div>
		                                        <div class="clearfix"></div>
		                                    </div>                              
		                                    <div class="postinfobot">
		
		
		                                        <div class="pull-right postreply">
		                                            <div class="pull-left"><input type="submit" class="btn btn-primary" value="Post Reply"></div>
		                                            <div class="clearfix"></div>
		                                        </div>
		
		
		                                        <div class="clearfix"></div>
		                                    </div>
		                                </form>
		                            </div>
	            				
	            			
	            				
	            				<div class="paginationf">
                                <!-- <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                               
                                <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div> -->

                                {!! $comments->render() !!}
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
				  						@if (count(\Auth::user()->posts) > 0)
				  						 @foreach (\Auth::user()->posts as $post)
				  						<div class="discussion-post-side wow fadeInUp border-bottom">
			                                <div class="wrap-ut">
			                                   <div class="posttext ">
			                                        <h2><a href="{{ route('frontend.post.get', $post->id) }}">{{ $post->title }}</a></h2>
			                                    </div>
			                                    <div class="clearfix"></div>
			                                </div>
			                                <div class="postinfo">
			                                    <div class="comments pull-left"><i class="fa fa-comments"></i> {{ count($post->comments) }}</div>
			                                    <!-- <div class="views pull-left"><i class="fa fa-eye"></i> 1,568</div> -->
			                                    <div class="time pull-right"><i class="fa fa-clock-o"></i> {{ $post->created_at->diffForHumans(\Carbon\Carbon::now()) }}</div>
			                                </div>
			                                <div class="clearfix"></div>
			            				</div>
			            				 @endforeach
			            				@else
				  						<div class="discussion-post-side wow fadeInUp border-bottom">
			                                <div class="wrap-ut">
			                                   <div class="posttext ">
			                                        <h2>you don’t have any posts yet</h2>
			                                    </div>
			                                    <div class="clearfix"></div>
			                                </div>
			            				</div>
			            				@endif
				  						
			            			</div><!--End Post Meta Wrap-->
	            				</div>
	            			</div>
	            		</div>
	            		
	            		
            		</div><!--End Container-->
            	</div><!--End Blog Wrap-->		
            </section><!--End Page Section-->
         	
@stop