<?php 
use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamQuestions;
use App\Models\Choice;
use App\Models\Module;
use App\Http\Requests;
use Carbon\Carbon;
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
	
</div><!-- End searchoverlay -->
<script type="text/javascript">
	var count=30;

var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

function timer()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
     //counter ended, do something here
     return;
  }

  //Do code for showing the number of seconds here
}
</script>
<section class="page-section bg-gray pt-0 pb-0">
	<div class="creative-b-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 mb-50">
					<div class="post boxed-bg box-shadow border-redius mt-110">
						<div class=" thin-center-section text-center">
							<div class="post-meta classic-post-meta">
								<?php 
								$now = $ans_count/$exam_counter;
								$now = $now*100;
// echo $now;
								?>
								
							
																	
								<h2 class="post-title">{{$exam->title}}</h2>
								<h2 class="post-title">Question({{$ans_count}}/{{$exam_counter}})</h2>

							</div><!--End Post Meta-->
							<div class="progress lio-sh-progress-alt">
								<div class="progress-bar" role="progressbar" aria-valuenow="{{$now}}" style="width:{{$now}}%;" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-title">Answered Questions<span>{{$ans_count}}/{{$exam_counter}}</span></div>
								</div>
							</div>
						</div><!--End Post Meta Wrap-->
						<div class="post-single-nav classic-post-single-nav border-bottom">
							<div class="container-fluid">
								<div class="extra-meta-wrap">
									<div class="extra-meta pull-left">
										<div class="post-author">
											<span class="meta-text">Question Mark: </span> <a>{{$total}}</a>
										</div><!--End Post author-->
									</div><!--End Extra Meta-->
									<div class="extra-meta  pull-right">
										<div class="post-author">
											<span class="meta-text">Remaining Time:{{$timeleft}}  Minuest </span> <span id="timer"></span>
										</div><!--End Post author-->
									</div><!--End Post Share-->
								</div><!--End Extra Meta wrap-->
							</div><!--End Container Fluid-->
						</div><!--End Single Nav-->
						<div class="single-post-wrap">
							<div class="row">
								<div class="p-40">

									<div class="col-md-3 border-right">
										<ul class="pl-10 examlist">
											
											<?php $x='1'; ?>
											@foreach($exam_count as $question_count)

												@if($question_count->id == $exam_questions->id)
						  							<li class="current"><a>Current Question</a></li>

												@elseif($question_count->is_answered == '0')
													<li class="skipped"><a href="">Question-{{$x}}</a></li>

												@elseif($question_count->is_answered == '1')
												<li class="answered"><a>Answered-{{$x}}</a></li>
												@else
												<li><a href="">Question-{{$x}}</a></li>
												@endif
						  							
						  							<?php $x++;?>

											@endforeach
											<!--<li class="answered"><a>Answered-1</a></li> -->


										</ul>
									</div>
						@if($next_id == 'done')
						<form action="{{route('frontend.question.post')}}" method="post" enctype="multipart/form-data">
						@else

						<form action="{{route('frontend.question.post', $next_id->id)}}" method="post" enctype="multipart/form-data">
						@endif

									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
									<input type="hidden" name="question_id" value="{{ $exam_questions->question_id}}">
									@if ($exam_questions->question_type == 1)
											<input type="hidden" name="type" value="mcq">
										<div class="col-md-9 ">

										
										<?php 
											$question = Question::where('id', $exam_questions->question_id)->first();
											$choises = Choice::where('question_id', $question->id)->get();
										?>
										<div class="p-20 border-bottom">
										MCQ<br>
										<h4>{{ $question->question}}  ?</h4>
										<div class="exam-check">
										
											@foreach($choises as $choise)
											
													<input type="checkbox" name="answer[]" id="checkbox1" value="{{$choise->id}}" >:
													 {{$choise->choice}}<br><br>
											                                             
												
											
											@endforeach
										
												
										
										</div><!--End Single Post Content-->

									@elseif ($exam_questions->question_type == 2)
										<input type="hidden" name="type" value="scq">
									<input type="hidden" name="question_id" value="{{ $exam_questions->question_id}}" required>

										<div class="col-md-9 ">
										<div class="p-20 border-bottom">
										<?php $question = Question::where('id', $exam_questions->question_id)->first();
											  $choises = Choice::where('question_id', $question->id)->get();
										
										?>
										Single Choice<br>
										<h4>{{ $question->question}}  ?</h4>
										<div class="exam-check">
											@foreach($choises as $choise)

											
													<input type="radio" name="answer"  value="{{$choise->id}}">
													{{$choise->choice}}<br>
											
											@endforeach
											</div>

										</div><!--End Single Post Content-->

									@else

										<input type="hidden" name="type" value="essay">
									<input type="hidden" name="question_id" value="{{ $exam_questions->question_id}}" >

										<div class="p-20 border-bottom">
										Essay <br>
										<?php $question = Question::where('id', $exam_questions->question_id)->first();
											 
										
										?>
										{{-- <div class="p-20 border-bottom">
											
											
										</br></br> --}}
											<div class="p-20 border-bottom">
														<h4>{{ $question->question}}</h4>
														<?php   if(!empty($question->file))
															    {   echo '<img src="'.asset($question->file).'"><br>';

																	echo '	<a href="'.asset($question->file).'" class="btn btn-success btn-medium waves-effect waves-light "download>Download Attachment</a>';

															       
															    }
														
														
														?>
															<textarea class="form-control" rows="6" name="answer" placeholder="Answer ..." required></textarea>
															<div class="mb-20 mb-md-10">
						                                    <label for="exampleInputFile" required>
						                                        Upload Answer
						                                    </label>
						                                    <input type="file" name="file">
						                                    
						                                   
													</div><!--End Single Post Content-->
									
									</div><!--End Single Post Content-->


									@endif

									<div class="p-20">
										<div class="row">
											<div class="pull-right">
												<input type="submit" name="submit" class="btn btn-success btn-medium waves-effect waves-light" 
												 value="Submit & Next"></form>
												 	@if($next_id == 'done')
							<a href="{{route('frontend.question.get')}}" class="btn btn-danger btn-medium waves-effect waves-light ">Skip</a>
						@else
							<a href="{{route('frontend.skip.get', $next_id->id).'?pid='.$exam_questions->id}}" class="btn btn-danger btn-medium waves-effect waves-light ">Skip</a>
						@endif
											
											</div>
										</div>
									</div><!--End Single Post Content-->
								</div>
							</div>
						</div>


					</div><!--End single-post-wrap-->
				</div><!--End Post-->
			</div><!--End Col-->
		</div><!--End Row-->
	</div><!--End Container-->
</div><!--End Blog Wrap-->		
</section><!--End Page Section-->
@stop
