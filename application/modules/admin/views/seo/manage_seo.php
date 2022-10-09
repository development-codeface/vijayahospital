<div class="row">
   <div class="col-md-12">
      <!-- BEGIN VALIDATION STATES-->
      <div class="portlet light portlet-fit portlet-form ">
         <div class="portlet-title">
            <div class="caption">
               <i class="icon-settings font-dark"></i>
               <span class="caption-subject font-dark sbold uppercase">SEO Details <?=(isset($result['URL_slug'])&&$result['URL_slug']!='')? "Of ".$result['URL_slug']:''?></span>
            </div>
         </div>
         <div class="portlet-body">
            <!-- BEGIN FORM-->
            <?php
               $this->id = (isset($result['product_id'])&& $result['product_id']!='')?$result['product_id']:'';
               
            echo form_open_multipart(base_url()."admin/seo_management/manageseo/".$module."/".$Pid, array("name" => "seo", "id"=>"seo","class" => "form-horizontal seo_management" )); 
               
               ?>
            <div class="form-body">
               <?php if($this->session->flashdata('error')){?>
               <div class="note note-warning">
                  <h3>Error!</h3>
                  <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?>
               </div>
               <?php }?>
               <?php if($this->session->flashdata('success')){?>
               <div class="note note-success ">
                  <h3>Success!</h3>
                  <?php echo $this->session->flashdata('success')?>
               </div>
               <?php }?>

               <?php /*?><div class="form-group">
                  <label class="control-label col-md-3">URL Slug
                  <span class="required"> * </span>
                  </label>
                  <div class="col-md-4">
                     <input type="text" name="url_slug" data-required="0" class="form-control " id="inputTextBox"  value="<?=(isset($result['URL_slug'])&&$result['URL_slug']!='')?$result['URL_slug']:  set_value('URL_slug')?>"/> 
                  </div>
               </div><?php */?>
               <div class="form-group">
                  <label class="control-label col-md-3">Meta Title
                  </label>
                  <div class="col-md-4">
                     <input type="text" name="metatitle" data-required="0" class="form-control"  value="<?=(isset($result['metatitle'])&&$result['metatitle']!='')?$result['metatitle']:  set_value('metatitle')?>"/> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3">  Meta Desciption
                
                  </label>
                  <div class="col-md-9">
                     <textarea class="form-control" rows="6" name="metadescription" ><?=(isset($result['metadescription'])&&$result['metadescription']!='')?$result['metadescription']:set_value('metadescription');?></textarea>
                     <div id="editor1_error"> </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3">  Meta Keyword
                
                  </label>
                  <div class="col-md-9">
                     <textarea class="form-control" rows="6" name="metakeyword" ><?=(isset($result['metakeyword'])&&$result['metakeyword']!='')?$result['metakeyword']:set_value('metakeyword');?></textarea>
                     <div id="editor1_error"> </div>
                  </div>
               </div>
               <?php /*?><div class="form-group">
                  <label class="control-label col-md-3">  Alt Tags
                 
                  </label>
                  <div class="col-md-9">
                     <textarea class="form-control" rows="6" name="atl_tags" ><?=(isset($result['atl_tags'])&&$result['atl_tags']!='')?$result['atl_tags']:set_value('atl_tags');?></textarea>
                     <div id="editor1_error"> </div>
                  </div>
               </div>
            </div><?php */?>
            <div class="form-actions">
               <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                     <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                     <button type="submit" class="btn green">Submit</button>
                     <a type="button" class="btn default" href="<?=base_url()?>admin/<?=$result['module']?>/index">Cancel</a>
                  </div>
               </div>
            </div>
            </form>
            <!-- END FORM-->
         </div>
         <!-- END VALIDATION STATES-->
      </div>
   </div>
</div>
