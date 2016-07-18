<?php
$page_title = 'Question';
$level1 = 'Modules';
$level1_link = 'admin/modules';
$level2 = 'Exams';
$level2_link = 'admin/exams/'. session('module_id');
$level3 = 'Questions';
$level3_link = 'admin/questions/'. session('exam_id');
?>
@extends('admin::layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/select2/select2.css') }}"/>

@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-equalizer font-green-haze"></i>
					<span class="caption-subject font-green-haze bold uppercase">Question Answer</span>
					<span class="caption-helper">some info...</span>
				</div>
				<div class="tools">
					<a href="" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="" class="reload">
					</a>
					<a href="" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<div class="form-body">
					<h2 class="margin-bottom-20"> View User Info - {{ $question->student->fullname }} </h2>
					<h3 class="form-section">Question Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 {{$question->question->question}}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						@if ($question->question->file != null)
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question File:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <a href="{{asset($question->question->file)}}" target="_blank"><img src="{{asset($question->question->file)}}" width="300"></a>
									</p>
								</div>
							</div>
						</div>
						@else
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question File:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <img src="{{asset('assets/backend/assets/no-image.png')}}" width="300">
									</p>
								</div>
							</div>
						</div>
						@endif
						<!--/span-->
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-md-3">Question Mark:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 {{$question->exam->essay_mark}}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<hr />
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Ideal Answer:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 {{$question->question->question_answer}}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						@if ($question->question->file != null)
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Ideal File Answer:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <a href="{{asset($question->question->file_answer)}}" target="_blank"><img src="{{asset($question->question->file_answer)}}" width="300"></a>
									</p>
								</div>
							</div>
						</div>
						@else
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question File:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <img src="{{asset('assets/backend/assets/no-image.png')}}" width="300">
									</p>
								</div>
							</div>
						</div>
						@endif
						<!--/span-->
					</div>
					<h3 class="form-section">Answer Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 {{$question->essay_answer}}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						@if ($question->essay_file != null)
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question File:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <a href="{{asset($question->essay_file)}}" target="_blank"><img src="{{asset($question->essay_file)}}" width="300"></a>
									</p>
								</div>
							</div>
						</div>
						@else
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question File:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <img src="{{asset('assets/backend/assets/no-image.png')}}" width="300">
									</p>
								</div>
							</div>
						</div>
						@endif
						<!--/span-->
					</div>
				<form action="{{ route('admin.examQuestions.update', $question->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">

					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
							<div class="form-group">
								<label class="control-label col-md-3">Question Mark:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <input type="text" name="mark" value="{{$question->mark}}" class="form-control input-circle" placeholder="Enter mark">
										 {!! $errors->first('mark','<span style="color:red ;">:message</span>') !!}
										 <input type="hidden" name="exam_mark" value="{{$question->exam->essay_mark}}">
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Submit:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <button type="submit" class="btn btn-circle yellow">Submit</button>
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
							</form>
				</div>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>

@stop

@section('script')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/select2/select2.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/backend/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/form-samples.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   FormSamples.init();
});
</script>

@stop