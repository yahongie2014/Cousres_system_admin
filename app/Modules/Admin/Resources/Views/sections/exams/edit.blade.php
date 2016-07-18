<?php
$page_title = 'Exam';
$level1 = 'Module';
$level1_link = 'admin/modules';
$level2 = 'Exams';
$level2_link = 'admin/exams/'. session('module_id');
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
					<i class="fa fa-gift"></i>Update Exam
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
				<form action="{{ route('admin.exams.update', $exam->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Module</label>
							<div class="col-md-4">
								<select name="module" class="form-control input-circle">
									<option value="">choose module</option>
									@foreach ($modules as $module)
									<option value="{{ $module->id }}" {{ $module->id == $exam->module_id ? 'selected': '' }}>{{ $module->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('module','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Title</label>
							<div class="col-md-4">
								<input type="text" name="title" value="{{ $exam->title }}" class="form-control input-circle" placeholder="Enter Title">
								{!! $errors->first('title','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Duration</label>
							<div class="col-md-4">
								<input type="text" name="duration" value="{{ $exam->duration }}" class="form-control input-circle" placeholder="Enter duration">
								{!! $errors->first('duration','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter SCQ Count</label>
							<div class="col-md-4">
								<input type="text" name="scq_count" value="{{ $exam->scq_count }}" class="form-control input-circle" placeholder="Enter SCQ Count">
								{!! $errors->first('scq_count','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter MCQ Count</label>
							<div class="col-md-4">
								<input type="text" name="mcq_count" value="{{ $exam->mcq_count }}" class="form-control input-circle" placeholder="Enter MCQ Count">
								{!! $errors->first('mcq_count','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Essay Count</label>
							<div class="col-md-4">
								<input type="text" name="essay_count" value="{{ $exam->essay_count }}" class="form-control input-circle" placeholder="Enter Essay Count">
								{!! $errors->first('essay_count','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter SCQ mark</label>
							<div class="col-md-4">
								<input type="text" name="scq_mark" value="{{ $exam->scq_mark }}" class="form-control input-circle" placeholder="Enter SCQ mark">
								{!! $errors->first('scq_mark','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter MCQ mark</label>
							<div class="col-md-4">
								<input type="text" name="mcq_mark" value="{{ $exam->mcq_mark }}" class="form-control input-circle" placeholder="Enter MCQ mark">
								{!! $errors->first('mcq_mark','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Essay mark</label>
							<div class="col-md-4">
								<input type="text" name="essay_mark" value="{{ $exam->essay_mark }}" class="form-control input-circle" placeholder="Enter Essay mark">
								{!! $errors->first('essay_mark','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle yellow">Submit</button>
								<a href="{{ route('admin.exams.show', [session('module_id')]) }}" class="btn btn-circle default">Cancel</a>
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