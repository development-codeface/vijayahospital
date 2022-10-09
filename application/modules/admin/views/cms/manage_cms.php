<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">CMS</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/cms/update/".$this->id, array("name" => "cms", "id"=>"cms","class" => "form-horizontal cms" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/cms/add", array("name" => "cms", "id"=>"cms","class" => "form-horizontal cms" ));   
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
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Sub Title
                                                </label>
                                                <div class="col-md-4">
                                                   <!-- <input type="text" name="subtitle" data-required="0" class="form-control"  value="<?=(isset($result['subtitle'])&&$result['subtitle']!='')?$result['subtitle']:''?>"/>  -->
                                                   <textarea class=" form-control" rows="6" name="subtitle"  data-required="0"><?=(isset($result['subtitle'])&&$result['subtitle']!='')?$result['subtitle']:''?></textarea>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Short Description
                                                </label>
                                                <div class="col-md-9">
                                                 
                                                   <textarea class=" form-control" rows="6" name="short_description" id="summernote_2"  data-required="0"><?=(isset($result['short_description'])&&$result['short_description']!='')?$result['short_description']:''?></textarea>
                                               </div>
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
                                                           <img src="<?=base_url()?>uploads/cms/<?=$result['image']?>">
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
                                                                <input type="file" name="image" id="image" data-width="" data-height="" class=""> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                     $size= '';
                                                     $txt= '';
                                                    if($result['id'] == 1 || $result['id'] == 2 || $result['id'] == 3){
                                                                $size = "480 * 554" ;
                                                                $txt = "Image size good for fit ".$size;
                                                           } else if($result['id'] == 4 || $result['id'] == 6){
                                                                $size = "390 * 390" ;
                                                                $txt = "Image size good for fit ".$size;
                                                           }else if($result['id'] == 7 || $result['id'] == 8 || $result['id'] == 9){
                                                                    $size = "370 * 300" ;
                                                                    $txt = "Image size good for fit ".$size;
                                                            }
                                                          
                                                    ?>
                                                      <div class="clearfix margin-top-10">
                                                    <span class="required"><h5 class='bold'><?=$txt ?></h5></span>
                                                     
                                                </div>

                                            
                                            </div>
                                           
                                         
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/cms">Cancel</a>
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