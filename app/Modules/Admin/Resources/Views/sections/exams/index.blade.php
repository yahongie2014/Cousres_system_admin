<?php
$page_title = 'Exam';
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
				@if (count($exams) == 0 && $user_per == 1)
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<a href="{{ route('admin.exams.create') }}" class="btn green">
								Add New <i class="fa fa-plus"></i>
								</a>
							</div>
						</div>
					</div>
				@endif
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
						 Title
					</th>
					<th>
						 Duration
					</th>
					<th>
						 Questions
					</th>
					@if ($user_per == 1)
					<th>
						 Dates
					</th>
					<th>
						 Edit
					</th>
					<th>
						 Delete
					</th>
					@endif
				</tr>
				</thead>
				<tbody>
				@foreach ($exams as $exam)
				<tr class="odd gradeX">
					<td>
						{{ $exam->title }}
					</td>
					<td>
						{{ $exam->duration }}
					</td>
					<td>
						<a href="{{ route('admin.questions.show', ['id' => $exam->id, 'user_per' => $user_per]) }}" class="btn btn-primary"><i class="fa fa-bars"></i> {{ count($exam->questions) }}</a>
					</td>
					@if ($user_per == 1)
					<td>
						<a href="{{ route('admin.examDates.show', $exam->id) }}" class="btn btn-primary"><i class="fa fa-bars"></i> {{ count($exam->dates) }}</a>
					</td>
					<td>
						<a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> edit</a>
					</td>
					<td>
					@if (count($exam->questions) > 0 || count($exam->dates) > 0)
						<a class="btn btn-danger" onclick="return confirm('Warning! this recored has chiled recoreds delete chiled recordes first.')"><i class="fa fa-trash"></i> delete</a>
					@else
						<a href="{{ route('admin.exams.delete', $exam->id) }}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this recored ?')"><i class="fa fa-trash"></i> delete</a>
					@endif
					</td>
					@endif
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