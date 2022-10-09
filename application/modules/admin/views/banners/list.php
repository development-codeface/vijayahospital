<?php if($this->session->flashdata('error')){?>
<div class="note note-danger">
    <h3><i class="fa fa-close"></i>  Error!</h3>
    <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
<?php }?>
<?php if($this->session->flashdata('success')){?>
<div class="note note-success"><h3><i class="fa fa-check"></i> Success!</h3><button class="close" data-close="alert"></button>  <?php echo $this->session->flashdata('success')?></div>
<?php }?>
<div class="portlet box green">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Banner Listing
                                    </div>
                                    <div class="tools"> </div>
                                    
                                        
                                        <a href="<?=base_url()?>admin/banner_management/add" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> ADD NEW</a>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>

                                               
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                   
                                                    <td> <img src="<?=base_url()?>uploads/banners/<?=$res['image']?> " width="150" height="80"></td>
                                                 
                                                   
                                                    <td>  
                                                                <button type="button" class="change_status_btn btn <?=($res['status'] == 'Active')?'btn-success':'btn-danger'?>" data-id="<?=$res['id']?>" data-module="banner_management"><i class="fa fa-random"></i> <?=$res['status']?></button>
                                                                
                                                    </td>
                                                    <td>
                                                             
                                                                        <a  class="btn btn-sm btn-info" href="<?=base_url('admin/banner_management/update/'.$res['id'])?>"><i class="fa fa-edit"></i> Edit </a>
                                                            
                                                                       <a  data-toggle="modal" class="btn btn-sm btn-danger delete_list_item"  data-id="<?=$res['id']?>" data-module="banner_management"><i class="fa fa-trash"></i> Delete </a>
                                                                   
                                                    </td>
                                                </tr>
                                                 
                                           <?php } ?>
                                          
                                               
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          