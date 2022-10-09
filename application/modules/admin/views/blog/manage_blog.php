<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Blog</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/blog/update/".$this->id, array("name" => "blog", "id"=>"blog","class" => "form-horizontal blog","autocomplete"=>"off" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/blog/add", array("name" => "blog", "id"=>"blog","class" => "form-horizontal blog","autocomplete"=>"off" ));   
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
                                                <label class="control-label col-md-3">Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="radio" name="blog_type" id="blog_type_img" data-required="0"   value="image" <?=(isset($result['type'])&&$result['type']=='image')?'checked':''?>  <?=($this->id=='')?'checked':''?>/> Image
                                                   <input type="radio" name="blog_type" id="blog_type_video" data-required="0"  <?=(isset($result['type'])&&$result['type']=='video')?'checked':''?>  value="video"/> Video
                                               </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Title
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="title" data-required="0" class="form-control copy-slug"  value="<?=(isset($result['title'])&&$result['title']!='')?$result['title']:''?>"/> </div>
                                            </div>
                                               <div class="form-group">
                                                <label class="control-label col-md-3">Date<span class="required"> * </span></label>
                                                <div class="col-md-2">
                                                    <div class="input-group  date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" name="created_at" value="<?=(isset($result['created_at'])&&$result['created_at']!='')?date('d-m-Y',strtotime($result['created_at'])):''?>">
                                                      
                                                    
                                                </div>
                                             </div>
                            
                                            </div>

                                            <?php ?>  <div class="form-group">
                                                <label class="control-label col-md-3">URL KEY
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="slug" data-required="0" class="form-control" id="inputTextBox"  value="<?=(isset($result['slug'])&&$result['slug']!='')?$result['slug']:''?>"/> </div>
                                            </div><?php ?>

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
                                             <div class="form-group last hide" id="blog_img" >
                                                
                                                <label class="control-label col-md-3">Image <span class="required"> * </span></label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <?php if(isset($result['image'])&& $result['image']!=''){?>
                                                           <img src="<?=base_url()?>uploads/blog/<?=$result['image']?>">
                                                            <input type="hidden" name="img_val" class="img_val" value="<?=(isset($result['image'])&& $result['image']!='')?$result['image']:'' ?>">
                                            <?php } else {?>
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                             <input type="hidden" name="img_val" class="img_val" id="img_val" value="<?=(isset($result['image'])&& $result['image']!='')?$result['image']:'' ?>">
                                                <?php }?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                           
                                                        </div>
                                                        
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image" id="image" data-width="700" data-height="400" class=""> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="clearfix margin-top-10">
                                                        <span class="required">
                                                           <?php 
                                                      echo "<h5 class='bold'>Image size should be 700*400</h5>";?>
                                                       </span><br>
                                                        </div>
                                                </div>

                                            
                                            </div> 

                                             <div class="form-group hide" id="blog_url">
                                                <label class="control-label col-md-3">URL
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="url" data-required="0" class="form-control" id="url"  value="<?=(isset($result['url'])&&$result['url']!='')?$result['url']:''?>"/> <span style="color: crimson"><strong>Note: youtube Embeded URL</strong></span></div>
                                                   
                                            </div>

                                           
                                         
                                         
                                        </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/blog/index">Cancel</a>
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

                  