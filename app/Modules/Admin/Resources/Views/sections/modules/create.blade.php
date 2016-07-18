<?php
$page_title = 'Module';
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
					<i class="fa fa-gift"></i>Create Module
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
				<form action="{{ route('admin.modules.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Title</label>
							<div class="col-md-4">
								<input type="text" name="title" value="{{ old('title') }}" class="form-control input-circle" placeholder="Enter title">
								{!! $errors->first('title','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter attendance</label>
							<div class="col-md-4">
								<input type="text" name="attendance" value="{{ old('attendance') }}" class="form-control input-circle" placeholder="Enter attendance">
								{!! $errors->first('attendance','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter assignment</label>
							<div class="col-md-4">
								<input type="text" name="assignment" value="{{ old('assignment') }}" class="form-control input-circle" placeholder="Enter assignment">
								{!! $errors->first('assignment','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter exam</label>
							<div class="col-md-4">
								<input type="text" name="exam" value="{{ old('exam') }}" class="form-control input-circle" placeholder="Enter exam">
								{!! $errors->first('exam','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter pass</label>
							<div class="col-md-4">
								<input type="text" name="pass" value="{{ old('pass') }}" class="form-control input-circle" placeholder="Enter pass">
								{!! $errors->first('pass','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Description</label>
							<div class="col-md-9">
								<textarea name="description" class="form-control input-circle ckeditor">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Start Date</label>
							<div class="col-md-4">
								<input type="text" name="start_date"  value="{{ old('start_date') }}" class="form-control input-circle" placeholder="Enter number">
								{!! $errors->first('start_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">End Date</label>
							<div class="col-md-4">
								<input type="text" name="end_date"  value="{{ old('end_date') }}" class="form-control input-circle" placeholder="Enter number">
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
								<a href="{{ route('admin.modules.index') }}" class="btn btn-circle default">Cancel</a>
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