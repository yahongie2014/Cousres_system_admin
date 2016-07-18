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
  <body class="appear-animate creative-b">
        
        
        
        <!--Page Wrap -->
        <main class="page" id="top">
            
            <div class="searchoverlay">
                <i class="pe-7s-close closesearch"></i>
                <form  method="get" class="searchform" action="#">
                    <input type="search" value="" name="s" class="query" placeholder="Enter Search Query...">
                    <i class="pe-7s-search"></i>
                </form>
            </div><!-- End searchoverlay -->
            
            <section class="page-section bg-gray">
                <div class="thin-blog-list">
                    <div class="container">
                        <div class="row">
                            <div class="row">
                                    <div class="boxed-bg box-shadow p-30 mb-30 mt-10 border-radius-3 col-xs-10 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1 wow zoomIn">
                                        <h1 class="text-center">Assignments</h1>
                                        <div class="t-post-btm bg-white border-bottom-9">
                                        </div><!--End Post Bottom-->
                                        
                                        <div class="col-xs-12 col-sm-6 col-md-6 p-30">
                                            <h4>Overview</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed, pellentesque pulvinar massa et nulla sagittis ut. Sagittis dui vehicula blandit in, ac enim lectus nulla, id justo, habitasse sodales malesuada non. Fringilla inceptos nostra wisi turpis, enim sem. Neque est fermentum, phasellus potenti felis porttitor.
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 p-30 border-left">
                                            <h4>General Rules</h4>
                                                <ul class="ml-0 bg-white">
                                                    <li>Phasellus sit amet velit auctor turpis rhoncus.</li>
                                                    <li>Phasellus sed dolor sodales, eleifend ipsum eu.</li>
                                                    <li>Nullam id dolor in ex eleifend tempus.</li>
                                                    <li>Etiam id lorem vel neque faucibus fermentum.</li>
                                                    <li>Nunc tincidunt augue in enim sollicitudin feugiat.</li>
                                                </ul>
                                        </div>
                                        
                                    </div><!--End Intro-->
                                        
                                </div><!--End Row-->
                                @foreach($courses as $course)
                                <?php 
                                    $assignments = Assignment::where('course_id', $course->id)->get();
                                ?>
                                @foreach($assignments as $assignment)
                                <?php
                                $sessions = DB::table('session_assignment')->where('assignment_id', $assignment->id)->get();
                                $now = \Carbon\Carbon::now();
                                               
                                // $lessons = Lesson::where('id', $lessons ->session_id)->get();


                                 ?>
                                 @if ($assignment->end_date > $now)
                                <div class="boxed-bg box-shadow p-30 mb-30 mt-10 border-radius-3 col-xs-10 col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1 wow zoomIn">
                                    <div class="t-post-content">
                                            <h2 class="post-title"><a href="{{ route('frontend.assignment.get', $assignment->id) }}">{{ $assignment->title }}</a></h2>
                                            <div class="t-post-btm">
                                            <div class="t-post-meta">
                                                <div class="t-post-meta-c">
                                                    <span class="t-post-author"><i class="fa fa-users"></i>by: 
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
                                            <p>{{$assignment->overview}} </p>
                                        <div class="t-post-btm">
                                            <div class="t-post-meta">
                                                <div class="t-post-meta-c">
                                                    <span class="t-post-date"><i class="fa fa-calendar"></i> Deadline: {{$assignment->end_date}}</span>
                                                </div><!--End Meta Content-->
                                                <div class="t-post-meta-c">
                                                    <span class="t-post-read"><i class="fa fa-list"></i>Related Course:  <a href="{{ route('frontend.course.get', $course->id) }}">{{$course->title}}</a></span>
                                                </div><!--End Meta Content-->
                                                <div class="t-post-meta-c">
                                                    <span class="t-post-read"><i class="fa fa-list"></i>Related Sessions:
                                                    <?php  foreach ($sessions as $session) 
                                                    {
                                                     $lesson = Lesson::find($session->session_id);
                                                     echo $lesson->title;
                                                    } 
                                                        ?>
                                                 </span>
                                                </div><!--End Meta Content-->
                                            </div><!--End Post Meta-->
                                        </div><!--End Post Bottom-->
                                        <div class="mt-20">
                                                <a href="{{route('frontend.assignment.get', $assignment->id)}}" class="btn btn-mod btn-mod-defult btn-small btn-round bg-appstore pull-right">View Assignment</a>
                                        </div><!--End Post Bottom-->
                                    </div><!--End Post Content-->
                                        
                                </div><!--End Intro-->
                                @endif
                                
                            @endforeach
                            @endforeach
                            
                            
                        </div><!--End Row-->
                    </div><!--End Container-->
                </div><!--End Thin Blog List-->
            </section><!--End Page Section-->
 @stop