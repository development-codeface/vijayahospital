<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Patient Care <i class="fa fa-right-arrow"></i> <?=$page_title?></span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/patient_care/update/".$this->id, array("name" => "patient_care", "id"=>"patient_care","class" => "form-horizontal patient_care","autocomplete"=>"off" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/patient_care/add", array("name" => "patient_care", "id"=>"patient_care","class" => "form-horizontal patient_care","autocomplete"=>"off" ));   
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
                                                <label class="control-label col-md-3">  Description
                                                   
                                                </label>
                                                <div class="col-md-6">

                                                    <textarea class="form-control"  rows="6" name="description"  ><?=(isset($result['description'])&&$result['description']!='')?$result['description']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                            <div class="form-group last">
                                                
                                                <label class="control-label col-md-3">Image <span class="required"> * </span></label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <?php if(isset($result['image'])&& $result['image']!=''){?>
                                                           <img src="<?=base_url()?>uploads/patient_care/<?=$result['image']?>">
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
                                                                <input type="file" name="image" id="image" data-width="1096" data-height="587" class="img_valid"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="clearfix margin-top-10">
                                                        <span class="required">
                                                           <?php 
                                                      echo "<h5 class='bold'>Image size should be 1096*587</h5>";?>
                                                       </span><br>
                                                        </div>
                                                </div>

                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                <div class="col-md-4"><h4>SECTION</h4><hr></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Title 1
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="section_title1" data-required="0" class="form-control"  value="<?=(isset($result['section_title1'])&&$result['section_title1']!='')?$result['section_title1']:''?>"/> </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description 1
                                                   
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="summernote_1" rows="6" name="section_description1"  ><?=(isset($result['section_description1'])&&$result['section_description1']!='')?$result['section_description1']:''?></textarea>
                                                  
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Title
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="section_title2" data-required="0" class="form-control"  value="<?=(isset($result['section_title2'])&&$result['section_title2']!='')?$result['section_title2']:''?>"/> </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description
                                                   
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="summernote_2" rows="6" name="section_description2"  ><?=(isset($result['section_description2'])&&$result['section_description2']!='')?$result['section_description2']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                          <div class="form-group">
                                                <label class="control-label col-md-3">Doctors
                                                    
                                                </label>
                                                <div class="col-md-4">
                                                   <select class="form-control" name="doctors[]" multiple>
                                                       <?php
                                                       $docs='';
                                                       if(isset($result['doctors']) && $result['doctors']!='') {
                                                           $docs = explode(",",$result['doctors']);
                                                           
                                                       }
                                                      
                                                      
                                                       ?>
                                                       <?php foreach($doctors as $doc => $val) {
                                                       $selected = (in_array($val['id'],$docs) ? 'selected="selected"' : ''); 
                                                      
                                                       ?>
                                                       
                                                            <option value="<?=$val['id']?>" <?=$selected?>  ><?=$val['title']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/patient_care/index">Cancel</a>
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