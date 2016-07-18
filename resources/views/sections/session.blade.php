@extends('layouts.main')

@section('meta')
<title>Al Amal Program</title>
<meta name="description" content="Al Amal Program">
<meta name="keywords" content="Al Amal">
<meta id="token" name="token" value="{ csrf_token() }">

@stop
@section('content')
<?php 
use App\Models\Assignment;
use App\Models\Lesson;
?>


        
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
			</div>

			<!-- End searchoverlay -->
                	<button type="button" class="btn btn-primary" style=" visibility: hidden;" data-toggle="modal" data-target=".bs-example-modal-sm">Popup View</button>
    <div id="pause">  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
												  <div class="modal-dialog modal-md">
												    <div class="modal-content mt-110">
												      <div class="p-20">
												      <div id="hideme">
												      	the right answer is 
												      </div>
							            					<form target="_blank" action="{{route('frontend.session.post')}}" method="POST">
							            					<h4 id="bad">The Right answer</h4>
							            					<h4 id="good">You Choosed the right answer</h4>
							            					<h4>{{$lesson->question}}</h4>
							            					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							            					<input type="hidden" name="id" value="{{$lesson->id}}">
																<div class="exam-check">
																	<div class="checkbox ">
						                                                <input id="checkbox1" name="choice" type="radio" value="{{$lesson->choice1}}">
						                                                <label id="1" for="checkbox1">{{$lesson->choice1}}</label>
					                                            	</div>

					                                            	
					                                            	<div class="checkbox ">
						                                                <input id="checkbox3" name="choice" type="radio" value="{{$lesson->choice2}}">
						                                                <label id="2" for="checkbox3">{{$lesson->choice2}}</label>
					                                            	</div>
					                                            	
					                                            	<div class="checkbox ">
						                                                <input id="checkbox4" name="choice" type="radio" value="{{$lesson->choice3}}">
						                                                <label id="3" for="checkbox4">{{$lesson->choice3}}</label>
					                                            	</div>
																</div>
																<?php $correct = $lesson->correct_answer ; ?>
													<div id="correct" data-field-id="{{$correct}}" ></div>

																<button type="submit" id="cho" class="btn btn-success btn-medium waves-effect waves-light" onclick="document.getElementById('{{$correct}}').style.color = 'green'">Send</button></form
								  						</div><!--End Post Meta-->
												    </div>
												  </div>
												</div></div>
            <section class="page-section bg-gray pt-0 pb-0">
            	<div class="creative-b-wrap">
            		<div class="container">
	            		<div class="row">
	            			<div class="col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1 mb-50">
			            		<div class="post boxed-bg box-shadow border-redius mt--110">
			            			<div class="post-meta-wrap thin-center-section text-center">
			            				<div class="post-meta classic-post-meta">
			            					<h1 class="post-title">{{$lesson->title}}</h1>
			            					<h2 class="post-title">Session 5</h2>
				  							<span class="date-meta"><i class="fa fa-calendar-o"></i> {{$lesson->start_date}}</span>
				  							<span class="read-meta"><i class="fa fa-bookmark"></i> {{$lesson->duration}} <span  class="meta-text">HRS</span></span>
				  							<span class="category-meta"><i class="fa fa-video-camera"></i> 2 <span  class="meta-text">Videos</span><br> </span>
				  						</div><!--End Post Meta-->
			            			</div><!--End Post Meta Wrap-->
			            			<div class="post-single-nav classic-post-single-nav border-bottom">
										<div class="container-fluid">
											<div class="extra-meta-wrap">
												<div class="extra-meta pull-left">
													<div class="post-author">
										  				<span class="meta-text">Course: </span> <a href="#"> {{$lesson->course->title}}</a>
										  			</div><!--End Post author-->
												</div><!--End Extra Meta-->
												<div class="extra-meta  pull-right">
													<div class="post-author">
										  				<span class="meta-text">Instructors: </span> 
                                                    <?php $x='0';$y='1'?>
                                                    @foreach($inst as $count)
                                                    <?php 
                                                    $x++;
                                                    ?>
                                                    @endforeach

                                                    @foreach($inst as $inst)
                                                    <a href="">{{ \App\User::find($inst->id)->name }}</a>
                                                    <?php 
                                                    if($y < $x)
                                                    {echo ",";}?>
                                                    @endforeach
										  			</div><!--End Post author-->
												</div><!--End Post Share-->
											</div><!--End Extra Meta wrap-->
										</div><!--End Container Fluid-->
									</div><!--End Single Nav-->
									<div class="single-post-wrap">
										<div class="single-post-content entry-content border-bottom-9">
											<h3>Video</h3>
											<ul class="ml-0">
												</ul>
											
											  <div id="player"></div>
<?php
$video_pos = strpos($lesson->video, '=') + 1;
$video_id = substr($lesson->video, $video_pos);

$str_time = $lesson->video_stop;

sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

$time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
$time_seconds = $time_seconds *1000;
?>
<div id="field" data-field-id="{{$video_id}}" ></div>
<div id="time" data-field-id="{{$time_seconds}}" ></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
      	var fieldId = $('#field').data("field-id");
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: fieldId,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(pauseVideo, {{$time_seconds}});
          done = true;
        }
      }
      function pauseVideo() {

        player.pauseVideo();
        document.getElementsByClassName("btn btn-primary")[0].click();
      
    $("#good").hide();

if (document.getElementById("choice").checked == true) {
    $("#good").show();
  }
	

      }
    </script>
 



										</div><!--End Single Post Content-->
			<script type="text/javascript">

			</script>							
											
										
										<div class="single-post-content entry-content border-bottom-9">
											<h3>Description</h3><p id="demo"></p>
											{!!$lesson->description!!}										</div><!--End Single Post Content-->
										
										<div class="single-post-content entry-content border-bottom-8">
											<h3>Session Material</h3>
											<ul class="ml-0">

											
												@foreach($files as $file)
											<li class="border-bottom-8">{{$file->title}}<span class="pull-right"><a  href="{{asset($file->url)}}" download>Download</a></span></li>

											@endforeach
											@foreach($links as $link)
											<li class="border-bottom-8">{{$link->title}}<span class="pull-right"><a target="_blank" href="{{$link->url}}" >Download</a></span></li>

											@endforeach
											</ul>
											
											<div class="clear"></div><!--End Clear-->
										</div><!--End Single Post Content-->
										
										
										<div class="single-post-content entry-content border-bottom-8">
											<h3>Assignments</h3>
											<ul class="ml-0">
											<?php 
										$assignments = DB::table('session_assignment')->where('session_id', $lesson->id)->get();
                                               
                                		  foreach ($assignments as $assignment) 
                                              {
                                              	
                                		 		$assign = Assignment::where('id', $assignment->assignment_id)->first();
                                		 		echo 
                                		 		'<li class="border-bottom-8">'.$assign->title.'<span class="pull-right"><a href="'.route("frontend.assignment.get", $assignment->id).'">View</a></span></li>';
                                                }
                                                      
									   ?>
												
											</ul>
											
											<div class="clear"></div><!--End Clear-->
										</div><!--End Single Post Content-->
										
									</div><!--End single-post-wrap-->
			            		</div><!--End Post-->
		            		</div><!--End Col-->
	            		</div><!--End Row-->
            		</div><!--End Container-->
            	</div><!--End Blog Wrap-->		
            </section><!--End Page Section-->
  @stop