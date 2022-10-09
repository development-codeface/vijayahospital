                    
<div class="portlet box green">
   <?php if($this->session->flashdata('error')){?>
                                            <div class="note note-warning">
                                                <h3>Error!</h3>
                                                <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                                           <?php }?>
                                            <?php if($this->session->flashdata('success')){?>
                                            
                                            <div class="note note-success "><h3>Success!</h3><button class="close" data-close="alert"></button>  <?php echo $this->session->flashdata('success')?></div>
                <?php }?>
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-globe"></i>Send NewsLetter
        </div>
                                            </div>   
        <div class="portlet-body">
            <div class="portlet light ">
                <div class="portlet-body">
                    <form name="form1" id="form1" class="" method="post" action="<?=base_url()?>admin/newsletters/view">
                            <table class="table">
                           
                                <?=$result['description']?>
                            
                            </table>
                            <div class="form-group">
                                <label class="control-label col-md-3"> Subscriber List
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select class="mt-multiselect btn purple col-md-6" multiple="multiple" data-width="100%" id="example-confirmation" name="email[]">
                                            <option value="all">All</option>
                                        <?php foreach($subscribers as $sub) { ?>
                                             <option value="<?=$sub['email']?>" class="opt"><?=$sub['email']?></option>
                                        <?php }?>
                                   
                                    </select>
                                </div>
                                <input type="hidden" name="id" id="" value="<?=$id?>"                            ></div>
                       
                        <div class="form-actions">
                                            <div class="row">
                                                <button  class="btn btn-success pull-right" style="margin-top:25px;"><i class="fa fa-mail"></i> SEND NEWS LETTER</button>
                                               
                                            </div>
                                    </div>
                        </form>
                       
                 
        
                </div>
            </div>
        </div>
    </div>
                                            </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-confirmation').multiselect({
            onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = $('#example-confirmation option:selected');
                $('#example-confirmation option').each(function() {
                    var input = $('input[value="' + $(this).val() + '"]');
                    input.prop('disabled', false);
                    input.parent('li').addClass('disabled');
                });
               
            }
        });
    });
</script>