<?php
$page_title = 'Page';
$level1 = 'Page';
$level1_link = 'admin/pages';
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
								<a href="{{ route('admin.pages.create') }}" class="btn green">
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
						 Title
					</th>
					<th>
						 Status
					</th>
					<th>
						 Page Desecriptions
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
				@foreach ($pages as $page)
				<tr class="odd gradeX">
					<td>
						{{ $page->title }}
					</td>
					<td>
						@if ($page->status == 1)
						<span class="btn-success">Active</span>
						@else
						<span class="btn-warning">Inactive</span>
						@endif
					</td>
					<td>
						<a href="{{ route('admin.pageDescs.show', $page->id) }}" class="btn btn-primary"><i class="fa fa-bars"></i> {{ count($page->page_descs) }}</a>
					</td>
					<td>
						<a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> edit</a>
					</td>
					<td>
						<a href="{{ route('admin.pages.delete', $page->id) }}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this recored ?')"><i class="fa fa-trash"></i> delete</a>
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