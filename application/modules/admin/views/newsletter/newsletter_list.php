<div class="portlet box green">
   <?php if($this->session->flashdata('error')){?>
                                            <div class="note note-warning">
                                                <h3>Error!</h3>
                                                <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                                           <?php }?>
                                            <?php if($this->session->flashdata('success')){?>
                                            
                                            <div class="note note-success "><h3>Success!</h3><button class="close" data-close="alert"></button>  <?php echo $this->session->flashdata('success')?></div>
                                            <?php }?>
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>NewsLetter
                                    </div>
                                    <div class="tools"> </div>
                                    
                                        
                                        <a href="<?=base_url()?>admin/newsletters/add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> ADD NEWSLETTER</a>
                                       
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>View</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                    <td><?=$res['title']?></td>
                                                    <td> <button type="button" class="change_status_btn btn <?=($res['status'] == 'Active')?'btn-success':'btn-danger'?>" data-id="<?=$res['id']?>" data-module="newsletters"><?=$res['status']?></button></td>                                       <td>  <?php if($res['status'] == 'Active'){?>
                                                                <a href="<?=base_url('admin/newsletters/view/'.$res['id'])?>" class="btn btn-success">View&Send</a>
                                                                <?php }?></td>       
                                                    <td> <div class="btn-group ">
                                                               
                                                              
                                                                <button type="button" class="btn  dark dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?=base_url('admin/newsletters/update/'.$res['id'])?>"> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                       <a  data-toggle="modal" class="delete_list_item"  data-id="<?=$res['id']?>" data-module="newsletters"> Delete </a>
                                                                    </li>
                                                                  
                                                                </ul>
                                                            </div> </td>
                                                </tr>
                                                 
                                           <?php } ?>
                                          
                                               
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          