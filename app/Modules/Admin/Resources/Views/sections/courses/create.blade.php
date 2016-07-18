<?php
$page_title = 'Courses';
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
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Create Courses
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
				<form action="{{ route('admin.courses.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Module</label>
							<div class="col-md-4">
								<select name="module" class="form-control input-circle">
									<option value="">choose module</option>
									@foreach ($modules as $module)
									<option value="{{ $module->id }}">{{ $module->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('module','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Title</label>
							<div class="col-md-4">
								<input type="text" name="title" value="{{ old('title') }}" class="form-control input-circle" placeholder="Enter title">
								{!! $errors->first('title','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Description</label>
							<div class="col-md-9">
								<textarea name="description" class="form-control ckeditor">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Learned</label>
							<div class="col-md-9">
								<textarea name="learn" class="form-control ckeditor">{{ old('learn') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Image Upload</label>
							<div class="col-md-9">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<img src="{{ asset('assets/backend/assets/no-image.png') }}" alt=""/>
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
									</div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new">
										Select image </span>
										<span class="fileinput-exists">
										Change </span>
										<input type="file" name="img">
										</span>
										<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
										Remove </a>
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
								<input type="text" name="start_date" value="{{ old('start_date') }}" class="form-control input-circle" placeholder="Enter Start Date">
								{!! $errors->first('start_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter End Date</label>
							<div class="col-md-4">
								<input type="text" name="end_date" value="{{ old('end_date') }}" class="form-control input-circle" placeholder="Enter End Date">
								{!! $errors->first('end_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Status</label>
							<div class="col-md-9">
								<input type="checkbox" name="status" class="make-switch" data-on-text="Active" data-off-text="Inactive" checked>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle green">Submit</button>
								<a href="{{ route('admin.courses.show', [session('module_id')]) }}" class="btn btn-circle default">Cancel</a>
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