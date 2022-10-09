<script src="<?=asset_path_dashboard('global/plugins/jquery.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/js.cookie.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-select/js/bootstrap-select.min.js')?>"></script>
<script src="<?=asset_path_dashboard('global/scripts/app.min.js" type="text/javascript')?>"></script> 

<script src="<?=asset_path_dashboard('pages/scripts/components-bootstrap-multiselect.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('pages/scripts/components-bootstrap-select.min.js')?>"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js')?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=asset_path_dashboard('global/plugins/select2/js/select2.full.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/jquery-validation/js/jquery.validate.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/jquery-validation/js/additional-methods.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>" type="text/javascript"></script>


<script src="<?=asset_path_dashboard('global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')?>" type="text/javascript"></script>
 <script src="<?=asset_path_dashboard('global/plugins/bootstrap-summernote/summernote.min.js')?>" type="text/javascript"></script>
  <script src="<?=asset_path_dashboard('pages/scripts/components-editors.js')?>" type="text/javascript"></script>
 <script src="<?=asset_path_dashboard('global/plugins/jquery.matchHeight-min.js')?>" type="text/javascript"></script>
 <script type="text/javascript">
    $(function() {
        $('.same_height').matchHeight();
    });
 </script>

<?php if(isset($datatable)&& $datatable == true){ ?>
<script src="<?=asset_path_dashboard('global/scripts/datatable.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/datatables/datatables.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('pages/scripts/table-datatables-buttons.js')?>" type="text/javascript"></script>
<?php }?>


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?=asset_path_dashboard('common/scripts/app.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('pages/scripts/form-validation.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('layouts/layout2/scripts/layout.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('layouts/layout2/scripts/demo.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('layouts/global/scripts/quick-sidebar.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('layouts/global/scripts/quick-nav.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')?>" type="text/javascript"></script>

<!--for doctors sorting starts-->	
<script src="<?=asset_path_dashboard('global/plugins/jquery-nestable/jquery.nestable.js')?>" type="text/javascript"></script>	
<script src="<?=asset_path_dashboard('pages/scripts/ui-nestable.min.js')?>" type="text/javascript"></script>	
<script type="text/javascript">	
    $('#nestable_list_1').nestable({maxDepth: 1});	
    $('#nestable_list_3').nestable({maxDepth: 1});	
</script>	
 <!--for doctors sorting ends here -->



<?php if(isset($multiple_uploader)&& $multiple_uploader == true){ ?>

<script src="<?=asset_path_dashboard('global/plugins/fancybox/source/jquery.fancybox.pack.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/vendor/tmpl.min.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/vendor/load-image.min.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.iframe-transport.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.fileupload.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.fileupload-process.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.fileupload-image.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.fileupload-video.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js')?>" type="text/javascript"></script>
            <script src="<?=asset_path_dashboard('global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js')?>" type="text/javascript"></script>
<?php }?>
 <?php if(isset($dashboard)&& $dashboard == true){ ?> 
<!--<script src="<?=asset_path_dashboard('pages/scripts/dashboard.min.js')?>" type="text/javascript"></script> -->
 <?php }?>
<script src="<?=asset_path_dashboard('pages/scripts/components-date-time-pickers.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('common/js/common.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('global/plugins/jquery-repeater/jquery.repeater.js')?>" type="text/javascript"></script>
<script src="<?=asset_path_dashboard('pages/scripts/form-repeater.js')?>" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){ 
        Common.init(); 
    });
</script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>