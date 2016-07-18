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
                    <input type="text" value="" name="s" class="query" placeholder="Enter Search Query...">
                    <i class="pe-7s-search"></i>
                </form>
            </div><!-- End searchoverlay -->
            
            <section class="page-section bg-gray pt-0 pb-0">
                <div class="creative-b-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="boxed-bg box-shadow p-30 mb-10 mt-110 border-radius-3 col-xs-12 col-sm-12 col-md-12 wow zoomIn">
                                        <h1 class="text-center mb-20">Assignments</h1>
                                        <h3 class="text-center">{{$assignment->title}}</h3>
                                        <div class="border-bottom">
                                            <div class="container-fluid">
                                                <div class="extra-meta-wrap">
                                                    <div class="extra-meta pull-left">
                                                        <div class="post-author">
                                                            <span class="meta-text">Related Sessions: </span>
                                <?php

                                $sessions = DB::table('session_assignment')->where('assignment_id', $id)->get();

                                foreach ($sessions as $session) 
                                    {
                                     $lesson = Lesson::find($session->session_id);
                                     echo $lesson->title.' - ';
                                    }   
                                                        

                                ?>

                                                            
                                                        </div><!--End Post author-->
                                                    </div><!--End Extra Meta-->
                                                    <div class="extra-meta  pull-right">
                                                        <div class="post-author">
                                                            <span class="meta-text">Deadline: </span> {{$assignment->end_date}}
                                                        </div><!--End Post author-->
                                                    </div><!--End Post Share-->
                                                </div><!--End Extra Meta wrap-->
                                            </div><!--End Container Fluid-->
                                        </div><!--End Single Nav-->
                                        
                                        <div class="col-xs-12 col-sm-6 col-md-6 p-30">
                                            <h4>Overview</h4>
                                            <p>
                                                {!!$assignment->overview!!}
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 p-30 border-left">
                                            <h4>General Rules</h4>
                                                <ul class="ml-0 bg-white">
                                                    {!! $assignment->general_rules  !!}
                                                </ul>
                                        </div>
                                        
                                    </div><!--End Intro-->
                            <div class="col-sm-12 col-md-12 mb-50">
                                <div class="post boxed-bg box-shadow border-redius mt-30">
                                    <div class="single-post-wrap">
                                    	@if (count($assignment->answers) == 0)
                                        <div class="row">
                                            <div class="p-40">
                                                <div class="col-md-12 ">
                                                    <div class="p-20 border-bottom">
                                                        <h4>{{ $assignment->question }}?</h4>
                                                        <a href="{{asset($assignment->file)}}" class="btn btn-success btn-medium waves-effect waves-light " download>Download Attachment</a>
                                                        </br></br>
                                                        <form method="post" action="{{ route('frontend.assignment.post') }}" class="form" enctype="multipart/form-data">
                                                            
                                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                            <input type="hidden" name="assignment_id" value="{{$assignment->id}}" >
                                                            <textarea name="answer" class="form-control" rows="6" placeholder="Answer ..." required></textarea>
                                                            <div class="mb-20 mb-md-10">
                                                            <label for="exampleInputFile">
                                                                Upload Answer
                                                            </label>
                                                            <input type="file" name="file" id="exampleInputFile" required>
                                                        </div>
                                                        <input class="btn btn-success btn-medium waves-effect waves-light " type="submit">
                                                        </form>
                                                        
                                                    </div><!--End Single Post Content-->
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="p-40">
                                                <div class="col-md-12 ">
                                                    <div class="p-20 border-bottom">
                                                    	@if (session()->has('message'))
                                                    	 <h3 class="text-success">{{session('message')}}</h3>
                                                    	@endif
                                                        <h4>{{ $assignment->question }}?</h4>
                                                        <a href="{{asset($assignment->file)}}" class="btn btn-success btn-medium waves-effect waves-light " download>Download Attachment</a>
                                                        </br></br>
                                                        <form method="post" action="{{ route('frontend.assignment.post', ['edit' => 1])}}" class="form" enctype="multipart/form-data">
                                                            
                                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                            <input type="hidden" name="assignment_id" value="{{$assignment->id}}" >
                                                            <textarea name="answer" class="form-control" rows="6" placeholder="" required>{{ $assignment->answers()->first()->answer }}</textarea>
                                                            <div class="mb-20 mb-md-10">
                                                            <label for="exampleInputFile">
                                                                Edit Upload Answer
                                                            </label>
                                                            <input type="file" name="file" id="exampleInputFile" required>
                                                        </div>
                                                        <input class="btn btn-success btn-medium waves-effect waves-light " type="submit" value="Edit">
                                                        </form>
                                                        
                                                    </div><!--End Single Post Content-->
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div><!--End single-post-wrap-->
                                </div><!--End Post-->
                            </div><!--End Col-->
                        </div><!--End Row-->
                    </div><!--End Container-->
                </div><!--End Blog Wrap-->      
            </section><!--End Page Section-->
 @stop