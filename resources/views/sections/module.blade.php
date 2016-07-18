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
<section class="home-section bg-dark-overlay-30 parallax-1" data-background="{{asset('assets/demo/new/12.jpg')}}">
                <div class="force-height-full">
                    
                    <div class="home-content container">
                            <div class="container">
                                <div class="row">
                                    <div class="boxed-bg box-shadow p-30 mb-10 mt-120 border-radius-3 col-xs-10 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1 wow zoomIn">
                                        <h1 class="text-center">{{$module->title}}</h1>
                                        
                                        <p class="">
                                            {!!$module->description!!}
                                        </p>
                                    </div><!--End Intro-->
                                        <div class="col-xs-6 col-sm-offset-1 col-sm-2 fun-fuct align-center bg-white">
                                            <div class="boxed-bg box-shadow p-30 border-radius">
                                                <div class="fuct-icon mb-10">
                                                    <span class="f-icon"><i class="sline-book-open"></i></span>
                                                </div><!--End Fuct Icon-->
                                                <div class="count-number fontsize-m fontweight-600">
                                                <?php $course_count = '0';?>
                                                 @foreach($courses as $course_counter)
                                               <?php  $course_count++;?>

                                                @endforeach
                                                {{$course_count}}
                                                </div><!--End Number-->

                                                <span class="count-title font-alt">Courses</span>
                                            </div><!--End Shadow-->
                                        </div><!--End Col-->
                                        
                                        <div class="col-xs-6 col-sm-2 col-sm-offset-2 fun-fuct align-center bg-white">
                                            <div class="boxed-bg box-shadow p-30 border-radius">
                                                <div class="fuct-icon mb-10">
                                                    <span class="f-icon"><i class="sline-user"></i></span>
                                                </div><!--End Fuct Icon-->
                                                <div class="count-number fontsize-m fontweight-600">24</div><!--End Number-->
                                                <span class="count-title font-alt">Instructors</span>
                                            </div><!--End Shadow-->
                                        </div><!--End Col-->
                                        <div class="col-xs-6 col-sm-2 col-sm-offset-2 fun-fuct align-center bg-white">
                                            <div class="boxed-bg box-shadow p-30 border-radius">
                                                <div class="fuct-icon mb-10">
                                                    <span class="f-icon"><i class="sline-calendar"></i></span>
                                                </div><!--End Fuct Icon-->
                                                <div class="count-number fontsize-m fontweight-600"><?php echo datediff('m', $module->start_date, $module->end_date, false);?></div><!--End Number-->
                                                <span class="count-title font-alt">Months</span>
                                            </div><!--End Shadow-->
                                        </div><!--End Col-->
                                    
                                    
                                        
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
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 ">
                @foreach($courses as $course)
                    <article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
                        <div class="t-post-thumb pull-left">
                            <a href="{{route('frontend.course.get',$course->id)}}">
                                <img src="{{asset($course->img)}}" alt="">
                            </a>
                         
                        </div><!--End Col-->
                        <div class="t-post-content">
                            <h2 class="post-title"><a href="{{route('frontend.course.get',$course->id)}}">{{$course->title}}</a></h2>
                            <p>{!!$course->description!!} </p>
                            <div class="t-post-btm">
                                <div class="t-post-meta">
                                    <div class="t-post-meta-c">
                                        <span class="t-post-date"><i class="fa fa-calendar"></i>    <?php echo datediff('ww', $course->start_date, $course->end_date, false);?> Weeks</span>
                                        <span class="t-post-read"><i class="fa fa-list"></i> 5 Sessions</span>
                                        <span class="t-post-comments pull-right"><i class="fa fa-calendar-o"></i> {{$course->start_date}}</span>
                                    </div><!--End Meta Content-->
                                </div><!--End Post Meta-->
                            </div><!--End Post Bottom-->
                            <div class="mt-20">
                                <a href="{{route('frontend.course.get',$course->id)}}" class="btn btn-mod btn-mod-defult btn-small btn-round bg-appstore pull-right">Start Course</a>
                            </div><!--End Post Bottom-->
                        </div><!--End Post Content-->
                    </article><!--End Post-->



                @endforeach








                </div><!--End Col-->

            </div><!--End Row-->
        </div><!--End Container-->
    </div><!--End Thin Blog List-->
</section><!--End Page Section-->

@stop