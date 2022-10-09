<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Doctor</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/doctor/update/".$this->id, array("name" => "doctor", "id"=>"doctor","class" => "form-horizontal doctor","autocomplete"=>"off" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/doctor/add", array("name" => "doctor", "id"=>"doctor","class" => "form-horizontal doctor","autocomplete"=>"off" ));   
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
                                                <label class="control-label col-md-3">Title
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="title" data-required="0" class="form-control"  value="<?=(isset($result['title'])&&$result['title']!='')?$result['title']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Qualification
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" name="description" data-required="0" class="form-control"  value="<?=(isset($result['description'])&&$result['description']!='')?$result['description']:''?>"/> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Designation
                                                    <!--<span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="designation" data-required="0" class="form-control"  value="<?=(isset($result['designation'])&&$result['designation']!='')?$result['designation']:''?>"/> 
                                                  </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Overall Consultation Timing (For Department Listing Page)
                                                    <!--<span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="overall_consultation_time" data-required="0" class="form-control"  value="<?=(isset($result['overall_consultation_time'])&&$result['overall_consultation_time']!='')?$result['overall_consultation_time']:''?>"/> </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description
                                                   
                                                </label>
                                                <div class="col-md-6">
                                                    
                                                    <textarea class=" form-control" rows="10" name="description1"  ><?=(isset($result['description1'])&&$result['description1']!='')?$result['description1']:''?></textarea> 
                                                  
                                                  
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Departments
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                   <select class="form-control" name="departments[]" multiple>
                                                       <?php
                                                       $deps='';
                                                       if(isset($result['departments']) && $result['departments']!='') {
                                                           $deps = explode(",",$result['departments']);
                                                           
                                                       }
                                                      
                                                      
                                                       ?>
                                                       <?php foreach($departments as $dep => $val) {
                                                       $selected = (in_array($val['id'],$deps) ? 'selected="selected"' : ''); 
                                                      
                                                       ?>
                                                       
                                                            <option value="<?=$val['id']?>" <?=$selected?>  ><?=$val['title']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                              <?php 
                                                $consulting_time = ($result['consulting_time']!='')?json_decode($result['consulting_time']):'';
                                               
                                            ?>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Consulting Time
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="item1"  class="form-control"  value="<?=(isset($consulting_time[0])&&$consulting_time[0]!='')?$consulting_time[0]:''?>" placeholder="Sunday" /> 
                                                    <input type="text" name="item2" class="form-control"  value="<?=(isset($consulting_time[1])&&$consulting_time[1]!='')?$consulting_time[1]:''?>" placeholder="Monday"/> 
                                                    <input type="text" name="item3" class="form-control"  value="<?=(isset($consulting_time[2])&& $consulting_time[2]!='')?$consulting_time[2]:''?>" placeholder="Tuesday"/>
                                                   
                                                      <input type="text" name="item4"  class="form-control"  value="<?=(isset($consulting_time[3])&&$consulting_time[3]!='')?$consulting_time[3]:''?>" placeholder="Wednesday"/> 
                                                       <input type="text" name="item5"  class="form-control"  value="<?=(isset($consulting_time[4])&&$consulting_time[4]!='')?$consulting_time[4]:''?>" placeholder="Thursday"/> 
                                                        <input type="text" name="item6" class="form-control"  value="<?=(isset($consulting_time[5])&&$consulting_time[5]!='')?$consulting_time[5]:''?>" placeholder="Friday"/>
                                                         <input type="text" name="item7" class="form-control"  value="<?=(isset($consulting_time[6])&&$consulting_time[6]!='')?$consulting_time[6]:''?>" placeholder="Saturday"/>
                                           
                                                    
                                                </div>
                                              </div>
                                            <div class="form-group last">
                                                
                                                <label class="control-label col-md-3">Image <span class="required"> * </span></label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <?php if(isset($result['image'])&& $result['image']!=''){?>
                                                           <img src="<?=base_url()?>uploads/doctor/<?=$result['image']?>">
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
                                                                <input type="file" name="image" id="image" data-width="375" data-height="400" class="img_valid"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="clearfix margin-top-10">
                                                        <span class="required">
                                                           <?php 
                                                      echo "<h5 class='bold'>Image size should be 375 x 400</h5>";?>
                                                       </span><br>
                                                        </div>
                                                </div>

                                            
                                            </div>
                                            
                                           
                                         
                                         
                                        </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/doctor/index">Cancel</a>
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