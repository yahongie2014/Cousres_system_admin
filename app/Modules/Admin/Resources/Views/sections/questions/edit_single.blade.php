<?php
$page_title = 'Question';
$level1 = 'Modules';
$level1_link = 'admin/modules';
$level2 = 'Exams';
$level2_link = 'admin/exams/'. session('module_id');
$level3 = 'Questions';
$level3_link = 'admin/questions/'. session('exam_id');
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
					<i class="fa fa-gift"></i>Update Question
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
				<form action="{{ route('admin.questions.update', $question->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Question</label>
							<div class="col-md-9">
								<textarea name="question" class="form-control input-circle">{{ $question->question }}</textarea>
								{!! $errors->first('question','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Question Mark</label>
							<div class="col-md-4">
								<input type="text" name="question_mark" value="{{ $question->question_mark }}" class="form-control input-circle" placeholder="Enter Question Mark">
								{!! $errors->first('question_mark','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle yellow">Submit</button>
								<a href="{{ route('admin.questions.show', [session('exam_id')]) }}" class="btn btn-circle default">Cancel</a>
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