<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Address Settings</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                       
                                           echo form_open_multipart(base_url()."admin/sitesettings/update_address/1", array("name" => "address_settings", "id"=>"address_settings","class" => "form-horizontal address_settings" )); 
                                      
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
                                                <label class="control-label col-md-3">Country
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="country" data-required="0" class="form-control"  value="<?=(isset($result['country'])&&$result['country']!='')?$result['country']:''?>"/> </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <label class="control-label col-md-3">PhoneNumber
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="phone_number" data-required="0" class="form-control"  value="<?=(isset($result['phone_number'])&&$result['phone_number']!='')?$result['phone_number']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <input type="text" name="email" data-required="0" class="form-control"  value="<?=(isset($result['email'])&&$result['email']!='')?$result['email']:''?>"/> </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Address
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea class="form-control" name="address" ><?=(isset($result['address'])&&$result['address']!='')?$result['address']:''?> </textarea>
                                            </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
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