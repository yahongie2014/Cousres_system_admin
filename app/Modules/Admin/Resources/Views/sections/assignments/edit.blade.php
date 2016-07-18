<?php
$page_title = 'Assignment';
$level1 = 'Module';
$level1_link = 'admin/modules';
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
					<i class="fa fa-gift"></i>Update Assignment
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
				<form action="{{ route('admin.assignments.update', $assignment->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Course</label>
							<div class="col-md-4">
								<select name="course" class="form-control input-circle">
									<option value="">choose course</option>
									@foreach ($courses as $course)
									<option value="{{ $course->id }}" {{ $course->id == $assignment->course_id ? 'selected': '' }}>{{ $course->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('course','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Title</label>
							<div class="col-md-4">
								<input type="text" name="title" value="{{ $assignment->title }}" class="form-control input-circle" placeholder="Enter Title">
								{!! $errors->first('title','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Question</label>
							<div class="col-md-4">
								<textarea name="question" class="form-control input-circle">{{ $assignment->question }}</textarea>
								{!! $errors->first('question','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Mark</label>
							<div class="col-md-4">
								<input type="text" name="mark" value="{{ $assignment->mark }}" class="form-control input-circle" placeholder="Enter mark">
								{!! $errors->first('mark','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">File Upload</label>
							<div class="col-md-9">
							@if($assignment->file != null)
								<div class="fileinput fileinput-exists" data-provides="fileinput">
							@else
								<div class="fileinput fileinput-new" data-provides="fileinput">
							@endif
									<div class="input-group input-large">
										<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
											<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
											{{ $assignment->file != null ? substr($assignment->file, 20) : '' }}
											</span>
										</div>
										<span class="input-group-addon btn default btn-file">
										<span class="fileinput-new">
										Select file </span>
										<span class="fileinput-exists">
										Change </span>
										<input type="file" name="file">
										</span>
										<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" onclick="getElementById('remove').value=1">
										Remove </a>
										<input type="hidden" name="remove" id="remove" value="0">
									</div>
									{!! $errors->first('file','<span style="color:red ;">:message</span>') !!}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Start Date</label>
							<div class="col-md-4">
								<input type="text" name="start_date" value="{{ $assignment->start_date }}" class="form-control input-circle" placeholder="Enter Start Date">
								{!! $errors->first('start_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter End Date</label>
							<div class="col-md-4">
								<input type="text" name="end_date" value="{{ $assignment->end_date }}" class="form-control input-circle" placeholder="Enter End Date">
								{!! $errors->first('end_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Status</label>
							<div class="col-md-9">
								<input type="checkbox" name="status" class="make-switch" data-on-text="Active" data-off-text="Inactive" {{ $assignment->status == 1 ? 'checked' : '' }}>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle yellow">Submit</button>
								<a href="{{ route('admin.assignments.show', [session('course_id')]) }}" class="btn btn-circle default">Cancel</a>
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