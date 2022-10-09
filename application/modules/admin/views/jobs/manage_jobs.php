<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Jobs</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/jobs/update/".$this->id, array("name" => "jobs", "id"=>"jobs","class" => "form-horizontal jobs","autocomplete"=>"off" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/jobs/add", array("name" => "jobs", "id"=>"jobs","class" => "form-horizontal jobs","autocomplete"=>"off" ));   
                                        }
                                   ?>
                                        <div class="form-body">
                                             <div id="img_msg"></div>
                                           <?php if($this->session->flashdata('error')){?>
                                            <div class="note note-warning">
                                                <h3>Error!</h3>
                                                <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                                           <?php }?>
                                            <?php if($this->session->flashdata('success')){?>
                                            
                                            <div class="note note-success "><h3>Success!</h3> <?php echo $this->session->flashdata('success')?></div>
                                            <?php }?>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">  Title
                                                   
                                                </label>
                                                <div class="col-md-6">
                                                    <input class="form-control" name="title" value="<?=(isset($result['title'])&&$result['title']!='')?$result['title']:''?>" />
                                                  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description
                                                   
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" rows="6" name="description"  ><?=(isset($result['description'])&&$result['description']!='')?$result['description']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                             
                                            
                                         
                                        </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/jobs/index">Cancel</a>
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