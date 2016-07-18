<?php
$page_title = 'Assignment Answers';
$level1 = 'Modules';
$level1_link = 'admin/modules';
$level2 = 'Courses';
$level2_link = 'admin/courses/'. session('module_id');
$level3 = 'Assignment';
$level3_link = 'admin/assignments/'. session('course_id');
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
					<span class="caption-subject font-green-haze bold uppercase">Assignment Answer</span>
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
					<h2 class="margin-bottom-20"> View User Info - {{ $assignment->student->fullname }} </h2>
					<h3 class="form-section">Question Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 {{$assignment->assignment->question}}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						@if ($assignment->assignment->file != null)
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question File:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <a href="{{asset($assignment->assignment->file)}}" target="_blank"><img src="{{asset($assignment->assignment->file)}}" width="300"></a>
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
										 {{$assignment->assignment->mark}}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<h3 class="form-section">Answer Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 {{$assignment->answer}}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						@if ($assignment->file != null)
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Question File:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <a href="{{asset($assignment->file)}}" target="_blank"><img src="{{asset($assignment->file)}}" width="300"></a>
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
				<form action="{{ route('admin.assignmentAnswers.update', $assignment->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">

					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
							<div class="form-group">
								<label class="control-label col-md-3">Question Mark:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 <input type="text" name="mark" value="{{$assignment->mark}}" class="form-control input-circle" placeholder="Enter mark">
										 {!! $errors->first('mark','<span style="color:red ;">:message</span>') !!}
										 <input type="hidden" name="assignment_mark" value="{{$assignment->assignment->mark}}">
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