<?php
$page_title = 'Materials';
$level1 = 'Module';
$level1_link = 'admin/modules';
$level2 = 'Course';
$level2_link = 'admin/courses/'. session('module_id');
$level3 = 'Session';
$level3_link = 'admin/sessions/'. session('course_id');
$level4 = 'Materials';
$level4_link = 'admin/materials/'. session('session_id');
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
					<i class="fa fa-gift"></i>Create Materials
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
				<form action="{{ route('admin.materials.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Session</label>
							<div class="col-md-4">
								<select name="session" class="form-control input-circle">
									<option value="">choose session</option>
									@foreach ($sessions as $session)
									<option value="{{ $session->id }}">{{ $session->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('session','<span style="color:red ;">:message</span>') !!}
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
							<label class="col-md-3 control-label">Enter Type</label>
							<div class="col-md-4">
								<select name="type" class="form-control input-circle">
									<option value="">Choose Type</option>
									<option value="link" {{ old('type') == 'link' ? 'selected' : '' }}>Link</option>
									<option value="file" {{ old('type') == 'file' ? 'selected' : '' }}>File</option>
								</select>
								{!! $errors->first('type','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Url</label>
							<div class="col-md-4">
								<textarea name="url_link" class="form-control input-circle">{{ old('url_link') }}</textarea>
								{!! $errors->first('url_link','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">File Upload</label>
							<div class="col-md-9">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="input-group input-large">
										<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
											<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
											</span>
										</div>
										<span class="input-group-addon btn default btn-file">
										<span class="fileinput-new">
										Select file </span>
										<span class="fileinput-exists">
										Change </span>
										<input type="file" name="url_file">
										</span>
										<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
										Remove </a>
									</div>
									{!! $errors->first('url_file','<span style="color:red ;">:message</span>') !!}
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle green">Submit</button>
								<a href="{{ route('admin.materials.show', [session('session_id')]) }}" class="btn btn-circle default">Cancel</a>
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