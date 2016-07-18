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
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Create Question
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
				@if (session('message'))
				<div class="Metronic-alerts alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					{{ session('message')}}
				</div>
				@endif
				<!-- BEGIN FORM-->
				<form action="{{ route('admin.questions.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Exam</label>
							<div class="col-md-4">
								<select name="exam" class="form-control input-circle">
									<option value="">choose exam</option>
									@foreach ($exams as $exam)
									<option value="{{ $exam->id }}">{{ $exam->title }}</option>
									@endforeach
								</select>
								{!! $errors->first('exam','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Enter Question</label>
							<div class="col-md-9">
								<textarea name="question" class="form-control input-circle">{{ old('question') }}</textarea>
								{!! $errors->first('question','<span style="color:red ;">:message</span>') !!}
							</div>
						</div>
						<input type="hidden" name="question_type" value="{{ $type }}">
						<div class="row">
							<div class="col-md-6">
								<div class="input_fields_wrap1">
								    <label class="col-md-4 control-label add_field_button1 btn btn-sm btn-primary btn-circle"><i class="fa fa-plus"></i> correct choices</label>
								    <div class="col-md-8">
								    	<input type="text" name="correct_choices[]" class="form-control input-circle" placeholder="Enter Choice">						    	
							    	</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input_fields_wrap2">
								    <label class="col-md-4 control-label add_field_button2 btn btn-sm btn-primary btn-circle"><i class="fa fa-plus"></i> wrong choice</label>
								    <div class="col-md-8">
								    	<input type="text" name="wrong_choices[]" class="form-control input-circle" placeholder="Enter Choice">						    	
							    	</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle green">Submit</button>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    var max_fields      = 9; //maximum input boxes allowed
	    var wrapper1         = $(".input_fields_wrap1"); //Fields wrapper
	    var add_button1      = $(".add_field_button1"); //Add button ID
	    
	    var x = 0; //initlal text box count

	    $(add_button1).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper1).append('<div class="col-md-offset-4 col-md-8" style="margin-top: 10px;"><input type="text" name="correct_choices[]" class="form-control input-circle" placeholder="Enter Choice"/><a href="#" class="remove_field1">Remove</a></div>'); //add input box
	        }
	    });
	    
	    $(wrapper1).on("click",".remove_field1", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	    })
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	    var max_fields      = 9; //maximum input boxes allowed
	    var wrapper2         = $(".input_fields_wrap2"); //Fields wrapper
	    var add_button2      = $(".add_field_button2"); //Add button ID
	    
	    var x = 0; //initlal text box count

	    $(add_button2).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper2).append('<div class="col-md-offset-4 col-md-8" style="margin-top: 10px;"><input type="text" name="wrong_choices[]" class="form-control input-circle" placeholder="Enter Choice"/><a href="#" class="remove_field2">Remove</a></div>'); //add input box
	        }
	    });
	    
	    $(wrapper2).on("click",".remove_field2", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	    })
	});
</script>

@include('admin::partials.form_script')

@stop