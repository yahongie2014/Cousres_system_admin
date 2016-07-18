<?php
$page_title = 'Placement';
$level1 = 'Placement';
$level1_link = 'admin/placements';
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
						 Place
					</th>
					<th>
						 Date
					</th>
					<th>
						 Time
					</th>
					<th>
						 Edit
					</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($placements as $placement)
				<tr class="odd gradeX">
					<td>
						{{ $placement->place }}
					</td>
					<td>
						{{ $placement->date }}
					</td>
					<td>
						{{ $placement->time }}
					</td>
					<td>
						<a href="{{ route('admin.placements.edit', $placement->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> edit</a>
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