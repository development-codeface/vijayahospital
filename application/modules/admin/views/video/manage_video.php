<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Video</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/video/update/".$this->id, array("name" => "video", "id"=>"video","class" => "form-horizontal video" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/video/add/", array("name" => "video", "id"=>"video","class" => "form-horizontal video" ));   
                                        }
                                   ?>
                                        <div class="form-body">
                                           <?php if($this->session->flashdata('error')){?>
                                            <div class="note note-warning">
                                                <h3>Error!</h3>
                                                <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                                           <?php }?>
                                            <?php if($this->session->flashdata('success')){?>
                                            
                                            <div class="note note-success "><h3>Success!</h3> <?php echo $this->session->flashdata('success')?></div>
                                            <?php }?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Title
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="title" data-required="0" class="form-control"  value="<?=(isset($result['title'])&&$result['title']!='')?$result['title']:''?>"/> </div>
                                            </div>

                                            <?php /*?>    <div class="form-group">
                                                <label class="control-label col-md-3">URL KEY
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="slug" data-required="0" class="form-control" id="inputTextBox" value="<?=(isset($result['slug'])&&$result['slug']!='')?$result['slug']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Short Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class=" form-control" rows="6" name="short_description"  ><?=(isset($result['short_description'])&&$result['short_description']!='')?$result['short_description']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description
                                                   
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class=" form-control" rows="6" name="description" id="summernote_1" ><?=(isset($result['description'])&&$result['description']!='')?$result['description']:''?></textarea>
                                                  
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-3">Date<span class="required"> * </span></label>
                                                <div class="col-md-2">
                                                    <div class="input-group  date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" name="created_at" value="<?=(isset($result['created_at'])&&$result['created_at']!='')?date('d-m-Y',strtotime($result['created_at'])):''?>">
                                                      
                                                    
                                                </div>
                                             </div>
                            
                                            </div>
                                           <?php */?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">URL
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="url" data-required="0" class="form-control"  value="<?=(isset($result['url'])&&$result['url']!='')?$result['url']:''?>"/> <span style="color: crimson"><strong>Note: youtube Embeded URL</strong></span></div>
                                                   
                                            </div>

                                             

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                   <input type="hidden" id="category_id" name="category_id" value="<?=isset($result['category_id'])&&$result['category_id']!=''?$result['category_id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/video">Cancel</a>
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
