@extends('admin::layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/typeahead/typeahead.css') }}">
<link href="{{ asset('assets/backend/assets/global/plugins/jquery-minicolors/jquery.minicolors.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/clockface/css/clockface.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/bootstrap-select/bootstrap-select.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/jquery-multi-select/css/multi-select.css') }}"/>

@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Form Actions On Bottom
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
				<form action="#" class="form-horizontal">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Text</label>
							<div class="col-md-4">
								<input type="text" class="form-control input-circle" placeholder="Enter text">
								<span class="help-block">
								A block of help text. </span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email Address</label>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon input-circle-left">
									<i class="fa fa-envelope"></i>
									</span>
									<input type="email" class="form-control input-circle-right" placeholder="Email Address">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>
							<div class="col-md-4">
								<div class="input-group">
									<input type="password" class="form-control input-circle-left" placeholder="Password">
									<span class="input-group-addon input-circle-right">
									<i class="fa fa-user"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Left Icon</label>
							<div class="col-md-4">
								<div class="input-icon">
									<i class="fa fa-bell-o"></i>
									<input type="text" class="form-control input-circle" placeholder="Left icon">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Right Icon</label>
							<div class="col-md-4">
								<div class="input-icon right">
									<i class="fa fa-microphone"></i>
									<input type="text" class="form-control input-circle" placeholder="Right icon">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Input With Spinner</label>
							<div class="col-md-4">
								<input type="password" class="form-control spinner input-circle" placeholder="Password">
							</div>
						</div>
						<div class="form-group last">
							<label class="col-md-3 control-label">Static Control</label>
							<div class="col-md-4">
								<span class="form-control-static">
								email@example.com </span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn btn-circle blue">Submit</button>
								<button type="button" class="btn btn-circle default">Cancel</button>
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

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/fuelux/js/spinner.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/typeahead/handlebars.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('assets/backend/assets/global/plugins/typeahead/typeahead.bundle.min.js') }}" type="text/javascript"></script> -->
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/bootstrap-selectsplitter/bootstrap-selectsplitter.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/global/plugins/autosize/autosize.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/clockface/js/clockface.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/backend/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/form-samples.js') }}"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/components-form-tools.js') }}"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/components-form-tools2.js') }}"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/components-pickers.js') }}"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/components-dropdowns.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   FormSamples.init();
   ComponentsFormTools.init();
   ComponentsFormTools2.init();
   ComponentsPickers.init();
   ComponentsDropdowns.init();
});
</script>

@stop