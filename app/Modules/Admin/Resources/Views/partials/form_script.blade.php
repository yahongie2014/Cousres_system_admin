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