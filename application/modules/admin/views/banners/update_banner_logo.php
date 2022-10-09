<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Banner  Logos & Certificate</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        
                                           echo form_open_multipart(base_url()."admin/banner_management/update_banner_logo/".$id, array("name" => "banner_logo", "id"=>"banner_logo","class" => "form-horizontal banner_logo" ));
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
                                           
                                         

                                              <div class="form-group last">
                                                <label class="control-label col-md-3">Company Logo  <span class="required"> * </span></label>
                                               
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" > <?php if(isset($result['logo_company'])&& $result['logo_company']!=''){?>
                                                           <img src="<?=base_url()?>uploads/banners/logo/<?=$result['logo_company']?>">
                                                            <input type="hidden" name="img_val_company" class="img_val_company" value="<?=(isset($result['logo_company'])&& $result['logo_company']!='')?$result['logo_company']:'' ?>">
                                            <?php } else {?>
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                             <input type="hidden" name="img_val_company" class="img_val_company" value="<?=(isset($result['logo_company'])&& $result['logo_company']!='')?$result['logo_company']:'' ?>">
                                                <?php }?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                           
                                                        </div>
                                                        
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="logo_company" id="logo_company" data-width="400" data-height="80" class="img_valid"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                        <span class="required">
                                                           <?php 
                                                      echo "<h5 class='bold'>Image size should be 400*80</h5>";?>
                                                       </span><br>
                                                        </div>
                                                </div>

                                            
                                            </div>


                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Welcome Home Image  <span class="required"> * </span></label>
                                               
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" > <?php if(isset($result['logo_welcome'])&& $result['logo_welcome']!=''){?>
                                                           <img src="<?=base_url()?>uploads/banners/logo/<?=$result['logo_welcome']?>">
                                                            <input type="hidden" name="img_val_welcome" class="img_val_welcome" value="<?=(isset($result['logo_welcome'])&& $result['logo_welcome']!='')?$result['logo_welcome']:'' ?>">
                                            <?php } else {?>
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                             <input type="hidden" name="img_val_welcome" class="img_val_welcome" value="<?=(isset($result['logo_welcome'])&& $result['logo_welcome']!='')?$result['logo_welcome']:'' ?>">
                                                <?php }?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                           
                                                        </div>
                                                        
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="logo_welcome" id="logo_welcome" data-width="550" data-height="300" class="img_valid"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                        <span class="required">
                                                           <?php 
                                                      echo "<h5 class='bold'>Image size should be 550*300</h5>";?>
                                                       </span><br>
                                                        </div>
                                                </div>

                                            
                                            </div>
                                         
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="1">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    
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