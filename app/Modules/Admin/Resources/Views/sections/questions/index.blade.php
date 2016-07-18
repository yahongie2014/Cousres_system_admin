<?php
$page_title = 'Question';
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
				@if (in_array($user_per, [1, 2]))
					<div class="row">
						<div class="col-md-4">
							<div class="btn-group">
								<a href="{{ route('admin.questions.create', ['type' => 1]) }}" class="btn green">
								Add New Single Choice Question <i class="fa fa-plus"></i>
								</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="btn-group">
								<a href="{{ route('admin.questions.create', ['type' => 2]) }}" class="btn green">
								Add New Multi Choice Question <i class="fa fa-plus"></i>
								</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="btn-group pull-right">
								<a href="{{ route('admin.questions.create', ['type' => 3]) }}" class="btn green">
								Add New Essay Question <i class="fa fa-plus"></i>
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
						 Question
					</th>
					<th>
						 Question Type
					</th>
					@if (in_array($user_per, [1, 3]))
					<th>
						 Essay Answer
					</th>
					@endif
					@if (in_array($user_per, [1, 2]))
					<th>
						 Delete
					</th>
					@endif
				</tr>
				</thead>
				<tbody>
				@foreach ($questions as $question)
				<tr class="odd gradeX">
					<td>
						{{ $question->question }}
					</td>
					<td>
					@if ($question->question_type == '1') 
						Single choice
					@elseif ($question->question_type == '2')
						Multible choice
					@else
						Essay
					@endif
					</td>
					@if (in_array($user_per, [1, 3]))
					<td>
					<?php $question_answers = $question->question_answers()->whereMark(null)->first(); ?>
					@if ($question->question_type == '3')
					  @if ($question_answers)
						<a href="{{ route('admin.examQuestions.show', ['id' => $question->id, 'exam_id' => $question->exam_id]) }}" class="btn btn-danger"><i class="fa fa-check"></i> </a>
					  @else
						<a class="btn btn-success"><i class="fa fa-check"></i> </a>
					  @endif
					@endif
					</td>
					@endif
					@if (in_array($user_per, [1, 2]))
					<td>
						<a href="{{ route('admin.questions.delete', $question->id) }}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this recored ?')"><i class="fa fa-trash"></i> delete</a>
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