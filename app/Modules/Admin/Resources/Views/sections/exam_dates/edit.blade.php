<?php
$page_title = 'Exam Dates';
$level1 = 'Module';
$level1_link = 'admin/modules';
$level2 = 'Exam';
$level2_link = 'admin/exams/'. session('module_id');
$level3 = 'Exam Dates';
$level3_link = 'admin/examDates/'. session('exam_id');
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
					<i class="fa fa-gift"></i>Update Exam Dates
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
				<form action="{{ route('admin.examDates.update', $exam->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter exam</label>
							<div class="col-md-4">
								<select name="exam" class="form-control input-circle">
									<option value="">choose exam</option>
									@foreach ($p_exams as $p_exam)
									<option value="{{ $p_exam->id }}" {{ $p_exam->id == $exam->exam_id ? 'selected': '' }}>{{ $p_exam->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('exam','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter start Date</label>
							<div class="col-md-4">
								<input type="text" name="start_date" value="{{ $exam->start_date }}" class="form-control input-circle" placeholder="Enter start Date">
								{!! $errors->first('start_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter End Date</label>
							<div class="col-md-4">
								<input type="text" name="end_date" value="{{ $exam->end_date }}" class="form-control input-circle" placeholder="Enter End Date">
								{!! $errors->first('end_date','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle yellow">Submit</button>
								<a href="{{ route('admin.examDates.show', [session('exam_id')]) }}" class="btn btn-circle default">Cancel</a>
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