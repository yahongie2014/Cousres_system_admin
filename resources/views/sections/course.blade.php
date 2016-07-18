@extends('layouts.main')

@section('meta')
<title>Al Amal Program</title>
<meta name="description" content="Al Amal Program">
<meta name="keywords" content="Al Amal">

@stop
@section('content')
<?php
        function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
            /*
            $interval can be:
            yyyy - Number of full years
            q - Number of full quarters
            m - Number of full months
            y - Difference between day numbers
                (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
            d - Number of full days
            w - Number of full weekdays
            ww - Number of full weeks
            h - Number of full hours
            n - Number of full minutes
            s - Number of full seconds (default)
            */
            
            if (!$using_timestamps) {
                $datefrom = strtotime($datefrom, 0);
                $dateto = strtotime($dateto, 0);
            }
            $difference = $dateto - $datefrom; // Difference in seconds
             
            switch($interval) {
             
            case 'yyyy': // Number of full years
                $years_difference = floor($difference / 31536000);
                if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
                    $years_difference--;
                }
                if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
                    $years_difference++;
                }
                $datediff = $years_difference;
                break;
            case "q": // Number of full quarters
                $quarters_difference = floor($difference / 8035200);
                while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                    $months_difference++;
                }
                $quarters_difference--;
                $datediff = $quarters_difference;
                break;
            case "m": // Number of full months
                $months_difference = floor($difference / 2678400);
                while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                    $months_difference++;
                }
                $months_difference--;
                $datediff = $months_difference;
                break;
            case 'y': // Difference between day numbers
                $datediff = date("z", $dateto) - date("z", $datefrom);
                break;
            case "d": // Number of full days
                $datediff = floor($difference / 86400);
                break;
            case "w": // Number of full weekdays
                $days_difference = floor($difference / 86400);
                $weeks_difference = floor($days_difference / 7); // Complete weeks
                $first_day = date("w", $datefrom);
                $days_remainder = floor($days_difference % 7);
                $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
                if ($odd_days > 7) { // Sunday
                    $days_remainder--;
                }
                if ($odd_days > 6) { // Saturday
                    $days_remainder--;
                }
                $datediff = ($weeks_difference * 5) + $days_remainder;
                break;
            case "ww": // Number of full weeks
                $datediff = floor($difference / 604800);
                break;
            case "h": // Number of full hours
                $datediff = floor($difference / 3600);
                break;
            case "n": // Number of full minutes
                $datediff = floor($difference / 60);
                break;
            default: // Number of full seconds (default)
                $datediff = $difference;
                break;
            }    
            return $datediff;
        }
?>
<?php 
use App\User;
?>
    <section class="home-section bg-dark-overlay-30 parallax-1" data-background="{{asset('assets/demo/new/12.jpg')}}">
                <div class="force-height-parent">
                    
                    <div class="home-content container">
                            <div class="container">
                                <div class="row">
                                    <div class="boxed-bg box-shadow p-30 mb-10 mt-120 border-radius-3 col-xs-10 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1 wow zoomIn">
                                        <h1 class="text-center">{{$course->title}}</h1>
                                        <div class="t-post-btm bg-white border-bottom-9">
                                            <div class="t-post-meta">
                                                <div class="t-post-meta-c">
                                                    <span class="t-post-author">
                                                    <i class="fa fa-users">
                                                        
                                                    </i> Instructors: 
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
                                                    

                                                        </span>
                                                        
                                                </div><!--End Meta Content-->
                                            </div><!--End Post Meta-->
                                        </div><!--End Post Bottom-->
                                        <div class="t-post-btm bg-white border-bottom-9 pt-10 pb-10">
                                            <div class="t-post-meta">
                                                <div class="t-post-meta-c">
                                                    <span class="t-post-date"><i class="fa fa-calendar"></i><?php echo datediff('ww', $course->start_date, $course->end_date, false);?> Weeks</span>
                                                    <span class="t-post-read"><i class="fa fa-list"></i> 5 Sessions</span>
                                                    <span class="t-post-comments pull-right"><i class="fa fa-calendar-o"></i>  {{$course->start_date}}</span>
                                                </div><!--End Meta Content-->
                                            </div><!--End Post Meta-->
                                        </div><!--End Post Bottom-->
                                        <div class="col-xs-12 col-sm-6 col-md-6 p-30">
                                            <h4>Description</h4>
                                            <p>
                                               {!!$course->description!!}
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 p-30 border-left">
                                            <h4>What You Will Learn</h4>
                                                <ul class="ml-0 bg-white">
                                                   {!!$course->learn!!}
                                                </ul>
                                        </div>
                                    </div><!--End Intro-->
                                        
                                </div><!--End Row-->
                            </div><!--End container-->
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
            
            <section class="page-section bg-gray">
            	<div class="thin-blog-list">
            		<div class="container">
            			<div class="row">
            				<div class="boxed-bg box-shadow p-10 mb-10 border-radius-3 col-xs-10 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1 wow zoomIn">
            							<div class="col-xs-12 col-sm-7 col-md-7 p-30">
            								<h4>Material</h4>
            								<ul class="ml-0 list-style list-check colored">
            									@foreach ($lessons as $lesson)
            									 @foreach ($lesson->materials as $material)
            									  @if ($material->type == 'file')
												<li class="border-bottom-8 clearfix pt-10 pb-10">{{ $material->title }} <span class="pull-right"><a href="#" download="{{ asset($material->url) }}" class="btn btn-mod btn-mod-defult btn-small btn-round bg-appstore">Download</a></span></li>
												  @endif
												 @endforeach
												@endforeach
											</ul>
            							</div>
            							<div class="col-xs-12 col-sm-5 col-md-5 p-30 border-left">
            								<h4>Refrences</h4>
        									<ul class="ml-0 list-style list-check colored">
            									@foreach ($lessons as $lesson)
            									 @foreach ($lesson->materials as $material)
            									  @if ($material->type == 'link')
												<li class="border-bottom-8 pt-10 pb-10"><a href="{{ $material->url }}" target="_blank">{{ $material->title }}</a></li>
												  @endif
												 @endforeach
												@endforeach
											</ul>
            							</div>
                        				
                    				</div><!--End Intro-->
                                    @foreach($lessons as $lesson)
            				<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 ">
            					<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
                						<div class="t-post-thumb pull-left">
                							<a href="{{ route('frontend.session.get', $lesson->id) }}">
                								<img src="{{asset($lesson->img)}}" alt="">
                							</a>
                						</div><!--End Col-->
            							<div class="t-post-content">
            								<h2 class="post-title"><a href="{{ route('frontend.session.get', $lesson->id) }}">{{$lesson->title}}</a></h2>
            								<div class="t-post-btm">
            								<!-- <div class="t-post-meta">
            									<div class="t-post-meta-c">
            										<span class="t-post-author">by: <a href="">Ahmed Fawzi</a>, <a href="">Hesham Awad</a></span>
            									</div>
            								</div> -->
            							</div><!--End Post Bottom-->
            								<p>{!!$lesson->description!!} </p>
            							<div class="t-post-btm">
            								<div class="t-post-meta">
            									<div class="t-post-meta-c">
            										<span class="t-post-date"><i class="fa fa-calendar"></i> {{ $lesson->start_date }}</span>
            									</div><!--End Meta Content-->
            								</div><!--End Post Meta-->
            							</div><!--End Post Bottom-->
            							<div class="mt-20">
            									<a href="{{route('frontend.session.get',$lesson->id)}}" class="btn btn-mod btn-mod-defult btn-small btn-round bg-appstore pull-right">Review Session</a>
            							</div><!--End Post Bottom-->
            						</div><!--End Post Content-->
            					</article><!--End Post-->
            					   @endforeach
<!--                                 <article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
                                        <div class="t-post-thumb pull-left">
                                            <a href="">
                                                <img src="{{asset('assets/demo/small/2.jpg')}}" alt="">
                                            </a>
                                        </div>End Col
        <div class="t-post-content">
            <h2 class="post-title"><a href="">Petroleum Systems and Exploration and Development Geochemistry</a></h2>
            <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-author">by: <a href="">Ahmed Fawzi</a>, <a href="">Hesham Awad</a></span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. </p>
        <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-date"><i class="fa fa-calendar"></i> 24th December, 2015</span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
        <div class="mt-20">
                <a href="" class="btn btn-mod btn-mod-defult btn-small btn-round bg-appstore pull-right">Start Session</a>
        </div>End Post Bottom
    </div>End Post Content
</article>End Post

<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
                                        <div class="t-post-thumb pull-left">
                                            <a href="">
                                                <img src="{{asset('assets/demo/small/2.jpg')}}" alt="">
                                            </a>
                                        </div>End Col
        <div class="t-post-content">
            <h2 class="post-title"><a href="">Petroleum Systems and Exploration and Development Geochemistry</a></h2>
            <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-author">by: <a href="">Ahmed Fawzi</a>, <a href="">Hesham Awad</a></span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. </p>
        <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-date"><i class="fa fa-calendar"></i> 24th December, 2015</span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
    </div>End Post Content
</article>End Post

<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
                                        <div class="t-post-thumb pull-left">
                                            <a href="">
                                                <img src="{{asset('assets/demo/small/2.jpg')}}" alt="">
                                            </a>
                                        </div>End Col
        <div class="t-post-content">
            <h2 class="post-title"><a href="">Petroleum Systems and Exploration and Development Geochemistry</a></h2>
            <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-author">by: <a href="">Ahmed Fawzi</a>, <a href="">Hesham Awad</a></span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. </p>
        <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-date"><i class="fa fa-calendar"></i> 24th December, 2015</span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
    </div>End Post Content
</article>End Post

<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
                                        <div class="t-post-thumb pull-left">
                                            <a href="">
                                                <img src="{{asset('assets/demo/small/2.jpg')}}" alt="">
                                            </a>
                                        </div>End Col
        <div class="t-post-content">
            <h2 class="post-title"><a href="">Petroleum Systems and Exploration and Development Geochemistry</a></h2>
            <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-author">by: <a href="">Ahmed Fawzi</a>, <a href="">Hesham Awad</a></span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. </p>
        <div class="t-post-btm">
            <div class="t-post-meta">
                <div class="t-post-meta-c">
                    <span class="t-post-date"><i class="fa fa-calendar"></i> 24th December, 2015</span>
                </div>End Meta Content
            </div>End Post Meta
        </div>End Post Bottom
    </div>End Post Content
</article>End Post -->
            					
            					
            				</div><!--End Col-->
            				
            			</div><!--End Row-->
            		</div><!--End Container-->
            	</div><!--End Thin Blog List-->
            </section><!--End Page Section-->
            
        @stop