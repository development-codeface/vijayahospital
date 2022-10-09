<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Testimonial</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/testimonial/update/".$this->id, array("name" => "testimonial", "id"=>"testimonial","class" => "form-horizontal testimonial" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/testimonial/add", array("name" => "testimonial", "id"=>"testimonial","class" => "form-horizontal testimonial" ));   
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
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="name" data-required="0" class="form-control"  value="<?=(isset($result['name'])&&$result['name']!='')?$result['name']:''?>"/> </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class=" form-control" rows="6" name="description"  ><?=(isset($result['description'])&&$result['description']!='')?$result['description']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                           

                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Image</label>
                                               
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <?php if(isset($result['image'])&& $result['image']!=''){?>
                                                           <img src="<?=base_url()?>uploads/testimonial/<?=$result['image']?>">
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
                                                                <input type="file" name="image" id="image" data-width="100" data-height="100" class=""> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                     $size= '100 * 100';
                                                     $txt= "Image size good for fit ".$size;
                                                   
                                                          
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
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/testimonial">Cancel</a>
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