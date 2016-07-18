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
	  							<li><a href="">Profile Home</a></li>
	  							<li><a href="">Course Records</a></li>
	  							<li><a href="">Discussion Board Posts</a></li>
	  							<li><a href="">Logout</a></li>
	  						</ul>
            				
	  						
            			</div><!--End Post Meta Wrap-->
    				</div>
    			</div>
    			
    			<div class="col-sm-8 col-md-8 mb-20">
    				@foreach ($courses as $course)
    				<?php
				    /*$attendance_per = $module->attendance;
				    $assignment_per = $module->assignment;
				    $exam_per = $module->exam;

				    $user_id = \Auth::user()->id;

				    
				    $courses = $module->courses;
				    $exam = $module->exams()->first();
				    $assignments_mark = [];
				    $module_session = [];
				    $exams_mark = [];
				    $user_exams_result = [];
				    foreach ($courses as $course) {
				    	// total assignment for the module
				    	foreach ($course->assignments as $assignment) {
				    		$assignments_mark[$assignment->id] = $assignment->mark;
				    	}

				    	// total assignment for the module
				    	foreach ($course->sessions as $session) {
				    		$module_session[$session->id] = $session->id;
				    	}
				    }

				    	$exam_total = $exam->scq_mark * $exam->scq_count + $exam->mcq_mark * $exam->mcq_count + $exam->essay_mark * $exam->essay_count;
				    	$exams_mark[$exam->id] = $exam_total;

				    	foreach ($exam->questions as $question) {
				    		$user_answers = DB::table('exam_questions')->whereUser_id($user_id)->whereExam_id($exam->id)->whereQuestion_id($question->id)->first();
				    		// dd($user_answers->id);
				    		$user_exams_result[] = $user_answers->mark;
				    	}
				    // dd(count($module_session));

				    // total assignment answer
				    $user_assigments = \Auth::user()->assignments;
				    $assignments_answer = [];
				    if (count($user_assigments) > 0) {
				    	foreach ($user_assigments as $answer) {
					    	$assignments_answer[$answer->id] = $answer->mark; 
					    }
				    }
				    

				    // total user attendance
				    $user_attendance = \Auth::user()->sessions;
				    $attendances = [];
				    if (count($user_attendance) > 0) {
				    	foreach ($user_attendance as $attendance) {
					    	$attendances[$attendance->id] = $attendance->id; 
					    }
				    }
				    


				    // dd(count($attendances));
				    // dd(array_sum($user_exams_result));

				    $assignment_degree = array_sum($assignments_answer) / array_sum($assignments_mark);
				    $final_assignment = $assignment_degree * 100;

				    $attendance_degree = array_sum($attendances) / array_sum($module_session);
				    $final_attendance = $attendance_degree * $attendance_per;

				    $exam_degree = array_sum($user_exams_result) / array_sum($exams_mark);
				    $final_exam = $exam_degree * $exam_per;

				    $final_module = $final_assignment + $final_attendance + $final_exam;*/
    				?>
    				<article class="post boxed-bg box-shadow  border-radius-3  wow fadeInUp">
						<div class="col-md-4 pull-left">
    							<a href="">
    								<img src="assets/demo/small/2.jpg" alt="">
    							</a>
    						</div><!--End Col-->
							<div class="col-md-8">
								<h2 class="post-title"><a href="">{{ $course->title }}</a></h2>
								
								<div class="t-post-meta">
									<div class="t-post-meta-c">
										<span class="t-post-date"><i class="fa fa-calendar"></i>Attendance:   </span>
										<br/>
										<span class="t-post-read"><i class="fa fa-check-square"></i>Assignments:  %</span>
									</div><!--End Meta Content-->
								</div><!--End Post Meta-->
						</div><!--End Post Content-->
					</article><!--End Post-->
    				@endforeach
    			</div>
    			
    			
    		</div>
    		
    		
		</div><!--End Container-->
	</div><!--End Blog Wrap-->		
</section><!--End Page Section-->

@stop