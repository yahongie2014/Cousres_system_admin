<?php
$page_title = 'Session';
$level1 = 'Module';
$level1_link = 'admin/modules';
$level2 = 'Course';
$level2_link = 'admin/courses/'. session('module_id');
$level3 = 'Session';
$level3_link = 'admin/sessions/'. session('course_id');
?>
@extends('admin::layouts.master')

@section('head')

@include('admin::partials.form_head')

@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Update Session
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{{ route('admin.sessions.update', $session->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Course</label>
							<div class="col-md-4">
								<select name="course" class="form-control input-circle">
									<option value="">choose course</option>
									@foreach ($courses as $course)
									<option value="{{ $course->id }}" {{ $course->id == $session->course_id ? 'selected': '' }}>{{ $course->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('course','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Title</label>
							<div class="col-md-4">
								<input type="text" name="title" value="{{ $session->title }}" class="form-control input-circle" placeholder="Enter title">
								{!! $errors->first('title','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Description</label>
							<div class="col-md-9">
								<textarea name="description" class="form-control ckeditor">{{ $session->description }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Image Upload</label>
							<div class="col-md-9">
							@if(isset($session->img))
								<div class="fileinput fileinput-exists" data-provides="fileinput">
							@else
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<img src="{{ asset('assets/backend/assets/no-image.png') }}" alt=""/>
									</div>
							@endif
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
										<img src="{{asset($session->img)}}" alt=""/>
									</div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new">
										Select image </span>
										<span class="fileinput-exists">
										Change </span>
										<input type="file" name="img">
										</span>
										<a href="#"  class="btn red fileinput-exists" data-dismiss="fileinput" onclick="getElementById('remove').value=1" >
										Remove </a>
										<input type="hidden" name="remove" id="remove" value="0">
									</div>
									{!! $errors->first('img','<span style="color:red">:message</span>') !!}
								</div>
								<div class="clearfix margin-top-10">
									<span class="label label-danger">
									NOTE! </span>
									Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Start Date</label>
							<div class="col-md-4">
								<input type="text" name="start_date" value="{{ $session->start_date }}" class="form-control input-circle" placeholder="Enter Start Date">
								{!! $errors->first('start_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Video url</label>
							<div class="col-md-9">
								<textarea name="video" class="form-control input-circle">{{ $session->video }}</textarea>
								{!! $errors->first('video','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Video Stop</label>
							<div class="col-md-3">
								<input type="text" name="video_stop" value="{{ $session->video_stop }}" class="form-control input-circle" placeholder="Enter Time Hour:Minute:Second">
								{!! $errors->first('video_stop','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Question</label>
							<div class="col-md-9">
								<textarea name="question" class="form-control input-circle">{{ $session->question }}</textarea>
								{!! $errors->first('question','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Choice1</label>
							<div class="col-md-9">
								<textarea name="choice1" class="form-control input-circle">{{ $session->choice1 }}</textarea>
								{!! $errors->first('choice1','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Choice2</label>
							<div class="col-md-9">
								<textarea name="choice2" class="form-control input-circle">{{ $session->choice2 }}</textarea>
								{!! $errors->first('choice2','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Choice3</label>
							<div class="col-md-9">
								<textarea name="choice3" class="form-control input-circle">{{ $session->choice3 }}</textarea>
								{!! $errors->first('choice3','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Correct Answer</label>
							<div class="col-md-9">
								<div class="margin-bottom-10">
									<label for="option1">Choice 1</label>
									<input id="option1" type="radio" name="correct_answer" value="1" class="make-switch switch-radio1" {{ $session->correct_answer == 1 ? 'checked' : '' }}>
								</div>
								<div class="margin-bottom-10">
									<label for="option2">Choice 2</label>
									<input id="option2" type="radio" name="correct_answer" value="2" class="make-switch switch-radio1" {{ $session->correct_answer == 2 ? 'checked' : '' }}>
								</div>
								<div class="margin-bottom-10">
									<label for="option3">Choice 3</label>
									<input id="option3" type="radio" name="correct_answer" value="3" class="make-switch switch-radio1" {{ $session->correct_answer == 3 ? 'checked' : '' }}>
								</div>
								{!! $errors->first('correct_answer','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Status</label>
							<div class="col-md-9">
								<input type="checkbox" name="status" class="make-switch" data-on-text="Active" data-off-text="Inactive" {{ $session->status == 1 ? 'checked' : '' }}>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle yellow">Submit</button>
								<a href="{{ route('admin.sessions.show', [session('course_id')]) }}" class="btn btn-circle default">Cancel</a>
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>

@stop

@section('script')

@include('admin::partials.form_script')

@stop