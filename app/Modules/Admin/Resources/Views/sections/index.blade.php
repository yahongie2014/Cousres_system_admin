@extends('admin::layouts.master')

@section('head')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>

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
					<a href="#portlet-config" data-toggle="modal" class="config">
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
								<button id="sample_editable_1_new" class="btn green">
								Add New <i class="fa fa-plus"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
				<thead>
				<tr>
					<th class="table-checkbox">
						<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
					</th>
					<th>
						 Username
					</th>
					<th>
						 Email
					</th>
					<th>
						 Points
					</th>
					<th>
						 Joined
					</th>
					<th>
						 Status
					</th>
				</tr>
				</thead>
				<tbody>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 shuxer
					</td>
					<td>
						<a href="mailto:shuxer@gmail.com">
						shuxer@gmail.com </a>
					</td>
					<td>
						 120
					</td>
					<td class="center">
						 12 Jan 2012
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 looper
					</td>
					<td>
						<a href="mailto:looper90@gmail.com">
						looper90@gmail.com </a>
					</td>
					<td>
						 120
					</td>
					<td class="center">
						 12.12.2011
					</td>
					<td>
						<span class="label label-sm label-warning">
						Suspended </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 userwow
					</td>
					<td>
						<a href="mailto:userwow@yahoo.com">
						userwow@yahoo.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.12.2012
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 user1wow
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						userwow@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.12.2012
					</td>
					<td>
						<span class="label label-sm label-default">
						Blocked </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 restest
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						test@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.12.2012
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 foopl
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 19.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 weep
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 19.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 coop
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 19.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 pppol
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 19.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 test
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 19.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 userwow
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						userwow@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.12.2012
					</td>
					<td>
						<span class="label label-sm label-default">
						Blocked </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 test
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						test@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.12.2012
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 goop
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 weep
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 15.11.2011
					</td>
					<td>
						<span class="label label-sm label-default">
						Blocked </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 toopl
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 16.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 userwow
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						userwow@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 9.12.2012
					</td>
					<td>
						<span class="label label-sm label-default">
						Blocked </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 tes21t
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						test@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 14.12.2012
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 fop
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 13.11.2010
					</td>
					<td>
						<span class="label label-sm label-warning">
						Suspended </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 kop
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 17.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 vopl
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 19.11.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 userwow
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						userwow@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.12.2012
					</td>
					<td>
						<span class="label label-sm label-default">
						Blocked </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 wap
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						test@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 12.12.2012
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 test
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 19.12.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 toop
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 17.12.2010
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						<input type="checkbox" class="checkboxes" value="1"/>
					</td>
					<td>
						 weep
					</td>
					<td>
						<a href="mailto:userwow@gmail.com">
						good@gmail.com </a>
					</td>
					<td>
						 20
					</td>
					<td class="center">
						 15.11.2011
					</td>
					<td>
						<span class="label label-sm label-success">
						Approved </span>
					</td>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>

@stop

@section('script')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/backend/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/layout2/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/assets/admin/pages/scripts/table-managed.js') }}"></script>
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   TableManaged.init();
});
</script>

@stop