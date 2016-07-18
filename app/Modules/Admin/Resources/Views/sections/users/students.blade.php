<?php
$page_title = 'User';
$level1 = 'User';
$level1_link = 'admin/users';
?>
@extends('admin::layouts.master')

@section('head')

@include('admin::partials.index_head')

@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box grey-cascade">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Managed Table
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="col-md-6">
						<div class="btn-group">
							<input type="submit" class="btn green" form="myform" value="Confirm Students">
						</div>
					</div>
				</div>
				@if (session('message'))
				<div class="Metronic-alerts alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					{{ session('message')}}
				</div>
				@endif
				<form action="{{ route('confirmUsers') }}" method="post" id="myform">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<table class="table table-striped table-bordered table-hover" id="sample_2">
				<thead>
				<tr>
					<th class="table-checkbox">
						<input type="checkbox" name="all" class="group-checkable" data-set="#sample_2 .checkboxes"/>
					</th>
					<th>
						 Username
					</th>
					<th>
						 Email
					</th>
					<th>
						 Status
					</th>
					<th>
						 Confirm
					</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" name="check_user[]" class="checkboxes" value="{{ $user->id }}"/>
					</td>
					<td>
						{{ $user->fullname }}
					</td>
					<td>
						{{ $user->email }}
					</td>
					<td>
						@if ($user->status == 1)
						<span class="btn-success">Confirmed</span>
						@else
						<span class="btn-warning">Inactive</span>
						@endif
					</td>
					<td>
						@if ($user->status != 1)
						<a href="{{ route('confirmUser', $user->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Confirm</a>
						@endif
					</td>
				</tr>
				@endforeach
				</tbody>
				</table>
				</form>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>

@stop

@section('script')

@include('admin::partials.index_script')

@stop