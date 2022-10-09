<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Departments</span>
                                       
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                  
                                    <!-- BEGIN FORM-->
                                    <?php
                                        $this->id = (isset($result['id'])&& $result['id']!='')?$result['id']:'';
                                        if($this->id!=''){
                                           echo form_open_multipart(base_url()."admin/departments/update/".$this->id, array("name" => "departments", "id"=>"departments","class" => "form-horizontal departments","autocomplete"=>"off" )); 
                                        }else{
                                           echo form_open_multipart(base_url()."admin/departments/add", array("name" => "departments", "id"=>"departments","class" => "form-horizontal departments","autocomplete"=>"off" ));   
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
                                                <label class="control-label col-md-3">Short  Description (For Department Listing Page)
                                                   
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" rows="2" name="short_description"  ><?=(isset($result['short_description'])&&$result['short_description']!='')?$result['short_description']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">  Description
                                                   
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="summernote_12" rows="6" name="description"  ><?=(isset($result['description'])&&$result['description']!='')?$result['description']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                            <div class="form-group last">
                                                
                                                <label class="control-label col-md-3">Image Thumbnail<span class="required"> * </span></label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <?php if(isset($result['image'])&& $result['image']!=''){?>
                                                           <img src="<?=base_url()?>uploads/departments/<?=$result['image']?>">
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
                                                                <input type="file" name="image" id="image" data-width="63" data-height="63" class="img_valid"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="clearfix margin-top-10">
                                                        <span class="required">
                                                           <?php 
                                                      echo "<h5 class='bold'>Image size should be 63 x 63</h5>";?>
                                                       </span><br>
                                                        </div>
                                                </div>

                                            
                                            </div>
                                            <div class="form-group last">
                                                
                                                <label class="control-label col-md-3">Image <span class="required"> * </span></label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <?php if(isset($result['image_large'])&& $result['image_large']!=''){?>
                                                           <img src="<?=base_url()?>uploads/departments/<?=$result['image_large']?>">
                                                            <input type="hidden" name="img_val_new" class="img_front_val" value="<?=(isset($result['image_large'])&& $result['image_large']!='')?$result['image_large']:'' ?>">
                                            <?php } else {?>
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                             <input type="hidden" name="img_val_new" class="img_front_val" value="<?=(isset($result['image_large'])&& $result['image_large']!='')?$result['image_large']:'' ?>">
                                                <?php }?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                           
                                                        </div>
                                                        
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="img_val_new" id="image" data-width="142" data-height="420" class="img_valid"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="clearfix margin-top-10">
                                                        <span class="required">
                                                           <?php 
                                                      echo "<h5 class='bold'>Image size should be 142 x 420</h5>";?>
                                                       </span><br>
                                                        </div>
                                                </div>

                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Key highlights Title
                                                    
                                                </label>
                                                <div class="col-md-6">
                                                     
                                                   <input type="text" name="key_highlight_title" data-required="0" class="form-control"  value="<?=(isset($result['key_highlight_title'])&&$result['key_highlight_title']!='')?$result['key_highlight_title']:''?>"/>
                                                </div>
                                            </div>
                                            <?php if(isset($result)&&!empty($result)){  ?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Key highlights 
                                                </label>  
                                                 <div class="col-md-6">
                                                    <a data-toggle="modal" data-target="#addKeyHighlights" class="btn btn-primary btn-sm" >Add New Highlights</a><br/><br/>
                                                    <div class="highlight_listing">
                                                        <ul>
                                                            <?php foreach ($key_highlights as $key => $highlight) { ?> 
                                                            <li><?=$highlight['description']?>  <a data-highlight-id="<?=$highlight['id']?>" id="deleteHighlightBtn" > <i class="fa fa-trash"></i></a> <a data-highlight-id="<?=$highlight['id']?>" data-toggle="modal" data-target="#editKeyHighlights<?=$key?>" > <i class="fa fa-edit"></i></a></li>
                                                             
                                                            <div class="modal" id="editKeyHighlights<?=$key?>">
                                                              <div class="modal-dialog">
                                                                <div class="modal-content"> 
                                                                  <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Hightlight  </h4>
                                                                    <input type="hidden" id="dept_id" value="<?=$result['id']?>">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  </div> 
                                                                  <div class="modal-body">
                                                                    <div class="option_msg"></div> 
                                                                    <textarea name="" class="form-control" id="edithighlight<?=$highlight['id']?>" cols="30" rows="10"><?=$highlight['description']?></textarea>

                                                                  </div> 
                                                                  <div class="modal-footer">
                                                                    <a id="edithighlightBtn" data-editId="<?=$highlight['id']?>" style="color:white;" class="btn btn-primary">Edit</a>
                                                                  </div>

                                                                </div>
                                                              </div>
                                                            </div>

                                                             <?php } ?>
                                                        </ul>

                                                    </div>
                                                     <!-- The Modal -->
                                                    <div class="modal" id="addKeyHighlights">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">

                                                          <!-- Modal Header -->
                                                          <div class="modal-header">
                                                            <h4 class="modal-title">Add New Hightlight <?=(isset($result['title'])&&$result['title']!='')?'('.$result['title'].')':''?></h4>
                                                            <input type="hidden" id="dept_id" value="<?=$result['id']?>">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          </div>

                                                          <!-- Modal body -->
                                                          <div class="modal-body">
                                                            <div class="option_msg"></div>
                                                            <!-- <input type="" name="" class="form-control" id="highlight"> -->
                                                            <textarea name="" class="form-control" id="highlight" cols="30" rows="10"></textarea>
                                                          </div>

                                                          <!-- Modal footer -->
                                                          <div class="modal-footer">
                                                            <a id="addhighlightBtn" style="color:white;" class="btn btn-primary">Add</a>
                                                          </div>

                                                        </div>
                                                      </div>
                                                    </div>                           
                                                </div>
                                                
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Section title 1
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="section_title1" data-required="0" class="form-control"  value="<?=(isset($result['section_title1'])&&$result['section_title1']!='')?$result['section_title1']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Section Description 1
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class=" form-control" rows="6" name="section_desc1"  ><?=(isset($result['section_desc1'])&&$result['section_desc1']!='')?$result['section_desc1']:''?></textarea>           
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Section title 2 
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="section_title2" data-required="0" class="form-control"  value="<?=(isset($result['section_title2'])&&$result['section_title2']!='')?$result['section_title2']:''?>"/> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Section Description 2
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class=" form-control" rows="6" name="section_desc2"  ><?=(isset($result['section_desc2'])&&$result['section_desc2']!='')?$result['section_desc2']:''?></textarea>           
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3">Meta Title
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                   <input type="text" name="metaTitle" data-required="0" class="form-control"  value="<?=(isset($result['metaTitle'])&&$result['metaTitle']!='')?$result['metaTitle']:''?>"/> </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Meta Keywords
                                                  
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class=" form-control" rows="6" name="metaKeywords" ><?=(isset($result['metaKeywords'])&&$result['metaKeywords']!='')?$result['metaKeywords']:''?></textarea>
                                                  
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Meta Description
                                                    
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class=" form-control" rows="6" name="metaDescription"  ><?=(isset($result['metaDescription'])&&$result['metaDescription']!='')?$result['metaDescription']:''?></textarea>
                                                  
                                                </div>
                                            </div>
                                         
                                        </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <input type="hidden" id="id" name="id" value="<?=isset($result['id'])&&$result['id']!=''?$result['id']:''?>">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a type="button" class="btn default" href="<?=base_url()?>admin/departments/index">Cancel</a>
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



<script>
    $('body').on('click','#addhighlightBtn',function(e){ 
        var flg = true;
        if(($("#highlight" ).val() == '')){
                $("#highlight").css('border-color','red');
                 flg  = false;
            }else{
                $("#highlight").css('border-color','');
                flg  = true;
            }  
            if(flg == true){
                $('#addhighlightBtn').attr('disabled',true);
                $('#addhighlightBtn').html('<span class="fa fa-spinner"></span> Loading..');
                 var highlight_desc = $("#highlight" ).val();
                 var dept_id = $("#dept_id" ).val();
                $.ajax({
                    type: "POST",
                    url:'<?=base_url()?>admin/Departments/add_highlight',
                    data: {highlight_desc:highlight_desc,dept_id:dept_id},
                    success: function(data) {    
                       $('.highlight_listing').html(data);
                       $("#highlight" ).val('');     
                       $('#addhighlightBtn').html('Add');
                       $('#addhighlightBtn').attr('disabled',false);
                       $("#addKeyHighlights").modal('hide');
                    },
                    error: function() {
                    }
                });
            
            }
    });

     $('body').on('click','#deleteHighlightBtn',function(e){ 
        e.preventDefault(); 
        if (confirm("Are you sure you want to delete this item?")) {
          var h_id = $(this).data('highlight-id');
          var dept_id = $("#dept_id" ).val();
           $.ajax({
                type: "POST",
                url:'<?=base_url()?>admin/Departments/delete_highlight',
                data: {h_id:h_id,dept_id:dept_id},
                success: function(data) {    
                   $('.highlight_listing').html(data); 
                },
                error: function() {
                }
            });
        }
    });
    $('body').on('click','#edithighlightBtn',function(e){ 
        e.preventDefault(); 
      var h_id = $(this).data('editid'); 
      var dept_id = $("#dept_id" ).val();
      var desc = $('#edithighlight'+h_id+'').val();
      $.ajax({
            type: "POST",
            url:'<?=base_url()?>admin/Departments/edit_highlight',
            data: {h_id:h_id,desc:desc,dept_id:dept_id},
            success: function(data) {    
               $('.highlight_listing').html(data); 
               location.reload();
            },
            error: function() {
            }
        });
    });
     
</script>