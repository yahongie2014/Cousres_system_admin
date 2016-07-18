<?php
$page_title = 'Page';
$level1 = 'Page';
$level1_link = 'admin/pages';
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
					<i class="fa fa-gift"></i>Update Page
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
				<form action="{{ route('admin.pages.update', $page->id) }}" method="post" class="form-horizontal">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">English Title</label>
							<div class="col-md-4">
								<input type="text" name="en_title" value="{{ $page->translate('en')->title }}" class="form-control input-circle" placeholder="Enter title">
								{!! $errors->first('en_title','<span style="color:red ;">:message</span>') !!}
								<span class="help-block">
								Enter english title. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Arabic Title</label>
							<div class="col-md-4">
								<input type="text" name="ar_title" value="{{ $page->translate('ar')->title }}" dir="rtl" class="form-control input-circle" placeholder="Enter title">
								{!! $errors->first('ar_title','<span style="color:red ;">:message</span>') !!}
								<span class="help-block">
								Enter arabic title. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">English Meta Title</label>
							<div class="col-md-4">
								<input type="text" name="en_meta_title" value="{{ $page->translate('en')->meta_title }}" class="form-control input-circle" placeholder="Enter meta title">
								<span class="help-block">
								Enter english meta title. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Arabic Meta Title</label>
							<div class="col-md-4">
								<input type="text" name="ar_meta_title" value="{{ $page->translate('ar')->meta_title }}" dir="rtl" class="form-control input-circle" placeholder="Enter meta title">
								<span class="help-block">
								Enter arabic meta title. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">English Meta Keyword</label>
							<div class="col-md-9">
								<textarea name="en_meta_keyword" class="form-control input-circle">{{ $page->translate('en')->meta_keyword }}</textarea>
								<span class="help-block">
								Enter english meta keyword. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Arabic Meta Keyword</label>
							<div class="col-md-9">
								<textarea name="ar_meta_keyword" class="form-control input-circle" dir="rtl">{{ $page->translate('ar')->meta_keyword }}</textarea>
								<span class="help-block">
								Enter arabic meta keyword. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">English Meta Description</label>
							<div class="col-md-9">
								<textarea name="en_meta_description" class="form-control input-circle">{{ $page->translate('en')->meta_description }}</textarea>
								<span class="help-block">
								Enter english meta description. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Arabic Meta Description</label>
							<div class="col-md-9">
								<textarea name="ar_meta_description" class="form-control input-circle" dir="rtl">{{ $page->translate('ar')->meta_description }}</textarea>
								<span class="help-block">
								Enter arabic meta description. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Status</label>
							<div class="col-md-9">
								<input type="checkbox" name="status" class="make-switch" data-on-text="Active" data-off-text="Inactive" {{ $page->status == 1 ? 'checked' : '' }}>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle yellow">Submit</button>
								<a href="{{ route('admin.pages.index') }}" class="btn btn-circle default">Cancel</a>
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