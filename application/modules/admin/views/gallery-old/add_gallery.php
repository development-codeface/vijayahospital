<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Gallery/Videos</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/gallery_content/update/".$this->id, array("name" => "gallery_content", "id"=>"gallery_content","class" => "form-horizontal gallery_content" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/gallery_content/add", array("name" => "gallery_content", "id"=>"gallery_content","class" => "form-horizontal gallery_content" ));   
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
                                                <label class="control-label col-md-3">Category
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <select class="form-control" name="category">
                                                    <option value="gallery" <?=(isset($result['category'])&& $result['category'] =='gallery')?'selected':'';?>>Gallery</option>
                                                    <option value="video" <?=(isset($result['category']) && $result['category'] =='video')?'selected':'';?>>Video</option>
                                                </select>
                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Title
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="title" data-required="0" class="form-control"  value="<?=(isset($result['title'])&&$result['title']!='')?$result['title']:  set_value('title')?>"/> </div>
                                            </div>
                              
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class=" form-control" rows="6" name="description" id="summernote_1" ><?=(isset($result['description'])&&$result['description']!='')?$result['description']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                          

                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Image</label>
                                               
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <?php if(isset($result['image'])&& $result['image']!=''){?>
                                                           <img src="<?=base_url()?>uploads/gallery/front/<?=$result['image']?>">
                                                            <input type="hidden" name="img_val" class="img_val" value="<?=(isset($result['image'])&& $result['image']!='')?$result['image']:'' ?>">
                                            <?php } else {?>
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                             <input type="hidden" name="img_val" class="img_val" value="<?=(isset($result['image'])&& $result['image']!='')?$result['image']:'' ?>">
                                                <?php }?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                           
                                                        </div>
                                                        
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image" id="image" data-width="850" data-height="620" class="img_valid"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                <span class="required">
                                                    <?php 
                                                echo "<h5 class='bold'>Image size should be 850*620</h5>";?>
                                                </span><br>
                                                </div>
                                                </div>
                                               
                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Date<span class="required"> * </span></label>
                                                <div class="col-md-4">
                                                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" name="date" value="<?=(isset($result['date'])&&$result['date']!='')?date('d-m-Y',strtotime($result['date'])):''?>" autocomplete="off">
                                                    
                                                    
                                                </div>
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