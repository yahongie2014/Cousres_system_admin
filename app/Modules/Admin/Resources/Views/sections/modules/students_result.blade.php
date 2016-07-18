<?php
$page_title = 'Module';
$level1 = 'Module';
$level1_link = 'admin/modules';
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
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<a href="{{ route('sendFailed') }}" id="sample_editable_1_new" class="btn green">
								Send Failed <i class="fa fa-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				@if (session('message'))
				<div class="Metronic-alerts alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					{{ session('message')}}
				</div>
				@endif
				<table class="table table-striped table-bordered table-hover" id="sample_2">
				<thead>
				<tr>
					<th>
						 Name
					</th>
					<th>
						 Attendance Result
					</th>
					<th>
						 Assignment Result
					</th>
					<th>
						 Exam Result
					</th>
					<th>
						 Final Result
					</th>
					<th>
						 Status
					</th>
					<th>
						 Send Result
					</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
				<tr class="odd gradeX">
					<td>
						{{ $user->fullname }}
					</td>
					<td>
						{{ $users_attendance[$user->id] }}
					</td>
					<td>
						{{ $users_assignment[$user->id] }}
					</td>
					<td>
						{{ $users_exam[$user->id] }}
					</td>
					<td>
						{{ $users_result[$user->id] }}
					</td>
					<td>
						@if ($users_result[$user->id] >= $module_pass)
						<?php $final = 'Pass'; ?>
						<span class="btn-success">Pass</span>
						@else
						<?php $final = 'Faild'; ?>
						<span class="btn-warning">Faild</span>
						@endif
					</td>
					<td>
						<a href="{{ route('sendResult', ['user_id' => $user->id, 'user_attendance' => $users_attendance[$user->id], 'user_assignment' => $users_assignment[$user->id], 'user_exam' => $users_exam[$user->id], 'user_result' => $users_result[$user->id], 'final' => $final]) }}" class="btn btn-success"><i class="fa fa-check"></i> Send</a>
					</td>
				</tr>
				@endforeach
				</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>

@stop

@section('script')

@include('admin::partials.index_script')

@stop