<?php
$page_title = 'Page Descriptions';
$level1 = 'Page';
$level1_link = 'admin/pages';
$level2 = 'Page Descriptions';
$level2_link = 'admin/pageDescs/'. session('page_id');
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
					<i class="fa fa-gift"></i>Create Page Description
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
				<form action="{{ route('admin.pageDescs.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Page</label>
							<div class="col-md-4">
								<select name="page" class="form-control input-circle">
									<option value="">choose page</option>
									@foreach ($pages as $page)
									<option value="{{ $page->id }}">{{ $page->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('page','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">English Title</label>
							<div class="col-md-4">
								<input type="text" name="en_title" value="{{ old('en_title') }}" class="form-control input-circle" placeholder="Enter title">
								{!! $errors->first('en_title','<span style="color:red ;">:message</span>') !!}
								<span class="help-block">
								Enter english title. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Arabic Title</label>
							<div class="col-md-4">
								<input type="text" name="ar_title" value="{{ old('ar_title') }}" dir="rtl" class="form-control input-circle" placeholder="Enter title">
								{!! $errors->first('ar_title','<span style="color:red ;">:message</span>') !!}
								<span class="help-block">
								Enter arabic title. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">English Description</label>
							<div class="col-md-9">
								<textarea name="en_description" class="form-control input-circle ckeditor">{{ old('en_description') }}</textarea>
								<span class="help-block">
								Enter english description. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Arabic Description</label>
							<div class="col-md-9">
								<textarea name="ar_description" class="form-control input-circle ckeditor" dir="rtl">{{ old('ar_description') }}</textarea>
								<span class="help-block">
								Enter arabic description. </span>
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
							<label class="control-label col-md-3">Order</label>
							<div class="col-md-4">
								<input type="text" name="arrange"  value="{{ old('arrange') }}" class="form-control input-circle" placeholder="Enter number">
								{!! $errors->first('arrange','<span style="color:red ;">:message</span>') !!}
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
								<a href="{{ route('admin.pageDescs.index') }}" class="btn btn-circle default">Cancel</a>
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