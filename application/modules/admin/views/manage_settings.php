<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Site Settings</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                       
                                           echo form_open_multipart(base_url()."admin/sitesettings/update/1", array("name" => "site_settings", "id"=>"site_settings","class" => "form-horizontal site_settings" )); 
                                      
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
                                                <label class="control-label col-md-3">Site Name
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="siteName" data-required="0" class="form-control"  value="<?=(isset($result['siteName'])&&$result['siteName']!='')?$result['siteName']:''?>"/> </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Contact Email
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="siteEmail" data-required="0" class="form-control"  value="<?=(isset($result['siteEmail'])&&$result['siteEmail']!='')?$result['siteEmail']:''?>"/> </div>
                                            </div>
                                           <!--  <div class="form-group">
                                                <label class="control-label col-md-3">Career Email
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="careerEmail" data-required="0" class="form-control"  value="<?=(isset($result['careerEmail'])&&$result['careerEmail']!='')?$result['careerEmail']:''?>"/> </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Admin Email
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="adminEmail" data-required="0" class="form-control"  value="<?=(isset($result['adminEmail'])&&$result['adminEmail']!='')?$result['adminEmail']:''?>"/> </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Address
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="siteAddress" rows="4" cols="47"><?=(isset($result['siteAddress'])&&$result['siteAddress']!='')?$result['siteAddress']:''?></textarea> </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="control-label col-md-3">Plant Address 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="farmAddress" rows="4" cols="47"><?=(isset($result['farmAddress'])&&$result['farmAddress']!='')?$result['farmAddress']:''?></textarea> </div>
                                            </div> -->
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Phone Number
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="phoneNumber1"  data-required="0" class="form-control"  value="<?=(isset($result['phoneNumber'])&&$result['phoneNumber']!='')?$result['phoneNumber']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Emergency Contact Number
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="phoneNumber2"  data-required="0" class="form-control"  value="<?=(isset($result['phoneNumber2'])&&$result['phoneNumber2']!='')?$result['phoneNumber2']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Appointment Contact Number
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="phoneNumber3"  data-required="0" class="form-control"  value="<?=(isset($result['phoneNumber3'])&&$result['phoneNumber3']!='')?$result['phoneNumber3']:''?>"/> </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Opening Hours
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="opening_time" data-required="0" class="form-control"  value="<?=(isset($result['opening_time'])&&$result['opening_time']!='')?$result['opening_time']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Doctors
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="doctors" pattern="^[0-9]*$" data-required="0" class="form-control"  value="<?=(isset($result['doctors'])&&$result['doctors']!='')?$result['doctors']:''?>"/> 
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Staffs
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="staffs" pattern="^[0-9]*$" data-required="0" class="form-control"  value="<?=(isset($result['staffs'])&&$result['staffs']!='')?$result['staffs']:''?>"/> 
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Happy Patients
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="happy_patient" pattern="^[0-9]*$" data-required="0" class="form-control"  value="<?=(isset($result['happy_patient'])&&$result['happy_patient']!='')?$result['happy_patient']:''?>"/> 
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Year of Experience
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="year_of_exp" pattern="^[0-9]*$" data-required="0" class="form-control"  value="<?=(isset($result['year_of_exp'])&&$result['year_of_exp']!='')?$result['year_of_exp']:''?>"/> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Beds
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="beds" pattern="^[0-9]*$" data-required="0" class="form-control"  value="<?=(isset($result['beds'])&&$result['beds']!='')?$result['beds']:''?>"/> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Storeyed Buildings
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" pattern="^[0-9]*$" name="storeyed_buildings" data-required="0" class="form-control"  value="<?=(isset($result['storeyed_buildings'])&&$result['storeyed_buildings']!='')?$result['storeyed_buildings']:''?>"/> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Ambulances
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" pattern="^[0-9]*$" name="ambulances" data-required="0" class="form-control"  value="<?=(isset($result['ambulances'])&&$result['ambulances']!='')?$result['ambulances']:''?>"/> 
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-3"> Specialization Text
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="special" rows="4" cols="47"><?=(isset($result['special'])&&$result['special']!='')?$result['special']:''?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> Facilities Text
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="facility" rows="4" cols="47"><?=(isset($result['facility'])&&$result['facility']!='')?$result['facility']:''?></textarea>
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3">  Meta Title
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="metaTitle" data-required="0" class="form-control"  value="<?=(isset($result['metaTitle'])&&$result['metaTitle']!='')?$result['metaTitle']:''?>"/>
                                                    <div id="editor1_error"> </div>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">  Meta Keyword
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="metaKeyword" rows="4" cols="47"><?=(isset($result['metaKeyword'])&&$result['metaKeyword']!='')?$result['metaKeyword']:''?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Schema Script
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="schemaScript" rows="4" cols="47"><?=(isset($result['schemaScript'])&&$result['schemaScript']!='')?$result['schemaScript']:''?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">  Analytics
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="analytics" rows="4" cols="47"><?=(isset($result['analytics'])&&$result['analytics']!='')?$result['analytics']:''?></textarea>
                                                </div>
                                            </div>
                                             <!--<div class="form-group">
                                                <label class="control-label col-md-3">  Google Ads
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="google_ads" rows="4" cols="47"><?=(isset($result['google_ads'])&&$result['google_ads']!='')?$result['google_ads']:''?></textarea>
                                                </div>
                                            </div> -->
                                             <div class="form-group">
                                                <label class="control-label col-md-3">  Meta content
                                                </label>
                                                <div class="col-md-4">
                                                   <textarea name="metaContent" rows="4" cols="47"><?=(isset($result['metaContent'])&&$result['metaContent']!='')?$result['metaContent']:''?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Facebook
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="facebook" data-required="0" class="form-control"  value="<?=(isset($result['facebook'])&&$result['facebook']!='')?$result['facebook']:''?>"/> </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Twitter
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="twitter" data-required="0" class="form-control"  value="<?=(isset($result['twitter'])&&$result['twitter']!='')?$result['twitter']:''?>"/> </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Instagram
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="instagram" data-required="0" class="form-control"  value="<?=(isset($result['instagram'])&&$result['instagram']!='')?$result['instagram']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Youtube
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="youtube" data-required="0" class="form-control"  value="<?=(isset($result['youtube'])&&$result['youtube']!='')?$result['youtube']:''?>"/> </div>
                                            </div>
                                           <!--  <div class="form-group">
                                                <label class="control-label col-md-3">whatsApp
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="googlePlus" data-required="0" class="form-control"  value="<?=(isset($result['googlePlus'])&&$result['googlePlus']!='')?$result['googlePlus']:''?>"/> </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Linkedin
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="linkedin" data-required="0" class="form-control"  value="<?=(isset($result['linkedin'])&&$result['linkedin']!='')?$result['linkedin']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Pinterest
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="pinterest" data-required="0" class="form-control"  value="<?=(isset($result['pinterest'])&&$result['pinterest']!='')?$result['pinterest']:''?>"/> </div>
                                            </div>
                                          
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


                     