<?php
$page_title = 'Exam Dates';
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
								<a href="{{ route('admin.examDates.create') }}" class="btn green">
								Add New <i class="fa fa-plus"></i>
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
						 Exam Title
					</th>
					<th>
						 Start Date
					</th>
					<th>
						 End Date
					</th>
					<th>
						 Edit
					</th>
					<th>
						 Delete
					</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($exams as $exam)
				<tr class="odd gradeX">
					<td>
						{{ $exam->exam->title }}
					</td>
					<td>
						{{ $exam->start_date }}
					</td>
					<td>
						{{ $exam->end_date }}
					</td>
					<td>
						<a href="{{ route('admin.examDates.edit', $exam->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> edit</a>
					</td>
					<td>
						<a href="{{ route('admin.examDates.delete', $exam->id) }}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this recored ?')"><i class="fa fa-trash"></i> delete</a>
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