<?php
$page_title = 'University';
$level1 = 'University';
$level1_link = 'admin/universities';
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
					<i class="fa fa-gift"></i>Create University
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
				<form action="{{ route('admin.universities.store') }}" method="post" class="form-horizontal">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Name</label>
							<div class="col-md-4">
								<input type="text" name="name" value="{{ old('name') }}" class="form-control input-circle" placeholder="Enter Name">
								{!! $errors->first('name','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Order</label>
							<div class="col-md-4">
								<input type="text" name="arrange" value="{{ old('arrange') }}" class="form-control input-circle" placeholder="Enter Order">
								{!! $errors->first('arrange','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle green">Submit</button>
								<a href="{{ route('admin.universities.index') }}" class="btn btn-circle default">Cancel</a>
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