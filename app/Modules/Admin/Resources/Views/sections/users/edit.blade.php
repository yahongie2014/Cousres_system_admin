<?php
$page_title = 'User';
$level1 = 'User';
$level1_link = 'admin/users';
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
					<i class="fa fa-gift"></i>Update User
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
				<form action="{{ route('admin.users.update', $user->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="user_type" value="{{ $user_type }}">
					<input type="hidden" name="user_id" value="{{ $user->id }}">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Username</label>
							<div class="col-md-4">
								<input type="text" name="name" value="{{ $user->name }}" class="form-control input-circle" placeholder="Enter username">
								{!! $errors->first('name','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-4">
								<input type="email" name="email" value="{{ $user->email }}" class="form-control input-circle" placeholder="Enter email">
								{!! $errors->first('email','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-4">
								<input type="password" name="password" class="form-control input-circle" placeholder="Enter password">
								{!! $errors->first('password','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Password Confirmation</label>
							<div class="col-md-4">
								<input type="password" name="password_confirmation" class="form-control input-circle" placeholder="Enter password Confirmation">
								{!! $errors->first('password_confirmation','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Full name</label>
							<div class="col-md-4">
								<input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control input-circle" placeholder="Enter fullname">
								{!! $errors->first('fullname','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Bio</label>
							<div class="col-md-9">
								<textarea name="bio" class="form-control ckeditor">{{ $user->bio }}</textarea>
								{!! $errors->first('bio','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Image Upload</label>
							<div class="col-md-9">
							@if(isset($user->img))
								<div class="fileinput fileinput-exists" data-provides="fileinput">
							@else
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<img src="{{ asset('assets/backend/assets/no-image.png') }}" alt=""/>
									</div>
							@endif
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
										<img src="{{asset($user->img)}}" alt=""/>
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
							<label class="control-label col-md-3">Status</label>
							<div class="col-md-9">
								<input type="checkbox" name="status" class="make-switch" data-on-text="Active" data-off-text="Inactive" {{ $user->status == 1 ? 'checked' : '' }}>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle yellow">Submit</button>
								<a href="{{ route('admin.users.index') }}" class="btn btn-circle default">Cancel</a>
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