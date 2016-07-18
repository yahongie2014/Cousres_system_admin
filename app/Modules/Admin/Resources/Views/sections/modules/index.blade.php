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
				@if ($create_per)
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<a href="{{ route('admin.modules.create') }}" class="btn green">
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
						 Start Date
					</th>
					<th>
						 Status
					</th>
					@if (\Auth::user()->hasRole('admin'))
					<th>
						 Assign Instructor
					</th>
					@else
					<th>
						 Question Instructor
					</th>
					<th>
						 Exam Instructor
					</th>
					@endif
					<th>
						 Exams
					</th>
					@if($access_per)
					<th>
						 Student Results
					</th>
					<th>
						 Courses
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
				@foreach ($modules as $module)
				<tr class="odd gradeX">
					<td>
						{{ $module->title }}
					</td>
					<td>
						{{ $module->start_date }}
					</td>
					<td>
						@if ($module->status == 1)
						<span class="btn-success">Active</span>
						@else
						<span class="btn-warning">Inactive</span>
						@endif
					</td>
					<?php
					$head_instructor = [];
					foreach ($module->module_instructors as $instructor) {
						$head_instructor[] = $instructor->id;
					}
					?>
					@if (\Auth::user()->hasRole('admin'))
					<td>
						<a href="{{ route('getInstructors', $module->id) }}" class="btn btn-primary"><i class="fa fa-bars"></i> </a>
					</td>
					@else
					@if (in_array(\Auth::user()->id, $head_instructor))
					<td>
						<a href="{{ route('getInvites', ['module_id' => $module->id, 'permission' => 1]) }}" class="btn btn-primary"><i class="fa fa-bars"></i> </a>
					</td>
					<td>
						<a href="{{ route('getInvites', ['module_id' => $module->id, 'permission' => 2]) }}" class="btn btn-primary"><i class="fa fa-bars"></i> </a>
					</td>
					@else
					<td></td>
					<td></td>
					@endif
					@endif
					<td>
						<a href="{{ route('admin.exams.show', ['id' => $module->id, 'user_per' => $user_per]) }}" class="btn btn-primary"><i class="fa fa-bars"></i> {{ count($module->exams) }}</a>
					</td>
					@if($access_per)
					<td>
						<a href="{{ route('studentsResult', $module->id) }}" class="btn btn-primary"><i class="fa fa-bars"></i> </a>
					</td>
					<td>
						<a href="{{ route('admin.courses.show', $module->id) }}" class="btn btn-primary"><i class="fa fa-bars"></i> {{ count($module->courses) }}</a>
					</td>
					<td>
						<a href="{{ route('admin.modules.edit', $module->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> edit</a>
					</td>
					<td>
					@if (count($module->courses) > 0 || count($module->exams) > 0)
						<a class="btn btn-danger" onclick="return confirm('Warning! this recored has chiled recoreds delete chiled recordes first.')"><i class="fa fa-trash"></i> delete</a>
					@else
						<a href="{{ route('admin.modules.delete', $module->id) }}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this recored ?')"><i class="fa fa-trash"></i> delete</a>
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