<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Manage Video</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/gallery_content/update_video/".$this->id, array("name" => "videos", "id"=>"videos","class" => "form-horizontal videos" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/gallery_content/update_video", array("name" => "videos", "id"=>"videos","class" => "form-horizontal videos" ));   
                                        }
                                   ?>
                                        <div class="form-body">
                                        <input type="hidden" name="id" value="<?=$result['id']?>">
                                           <?php if($this->session->flashdata('error')){?>
                                            <div class="note note-warning">
                                                <h3>Error!</h3>
                                                <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                                           <?php }?>
                                            <?php if($this->session->flashdata('success')){?>
                                            
                                            <div class="note note-success "><h3>Success!</h3> <?php echo $this->session->flashdata('success')?></div>
                                            <?php }?>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Video URL
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="video" data-required="0" class="form-control"  value="<?=(isset($result['video_url'])&&$result['video_url']!='')?$result['video_url']:  set_value('video_url')?>"/> </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/gallery_content/index">Cancel</a>
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