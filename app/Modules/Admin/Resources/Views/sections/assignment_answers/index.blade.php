<?php
$page_title = 'Assignment Answers';
$level1 = 'Modules';
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
						 Student Name
					</th>
					<th>
						 Correct
					</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($students as $user)
				<?php $user_answer = \App\Models\AssignmentAnswer::whereAssignment_id($id)->whereUser_id($user->id)->first(); ?>
				@if ($user_answer)
				<tr class="odd gradeX">
					<td>
						{{ $user->fullname }}
					</td>
					<td>
					@if ($user_answer->mark != null)
						<a class="btn btn-success"><i class="fa fa-check"></i></a>
					@else
						<a href="{{ route('admin.assignmentAnswers.edit', $user_answer->id) }}" class="btn btn-danger"><i class="fa fa-check"></i></a>
					@endif
					</td>
				</tr>
				@endif
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