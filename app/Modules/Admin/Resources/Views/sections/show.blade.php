@extends('admin::layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/select2/select2.css') }}"/>

@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-equalizer font-green-haze"></i>
					<span class="caption-subject font-green-haze bold uppercase">Form Sample</span>
					<span class="caption-helper">some info...</span>
				</div>
				<div class="tools">
					<a href="" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="" class="reload">
					</a>
					<a href="" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<div class="form-body">
					<h2 class="margin-bottom-20"> View User Info - Bob Nilson </h2>
					<h3 class="form-section">Person Info</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">First Name:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 Bob
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Last Name:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 Nilson
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Gender:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 Male
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Date of Birth:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 20.01.1984
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Category:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 Category1
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Membership:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 Free
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<h3 class="form-section">Address</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Address:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 #24 Sun Park Avenue, Rolton Str
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">City:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 New York
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">State:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 New York
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Post Code:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 457890
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Country:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										 USA
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
				</div>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>

@stop

@section('script')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/select2/select2.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/backend/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/form-samples.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   FormSamples.init();
});
</script>

@stop