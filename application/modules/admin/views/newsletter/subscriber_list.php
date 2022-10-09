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
                                        <i class="fa fa-globe"></i>Subscribers
                                    </div>
                                    <div class="tools"> </div>
                                    
                                        
                                        <a href="<?=base_url()?>admin/subscribers/add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> ADD  SUBSCRIBERS</a>
                                       
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>status</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                    <td><?=$res['email']?></td>
                                                      <td>  <button type="button" class="change_status_btn btn <?=($res['status'] == 'Active')?'btn-success':'btn-danger'?>" data-id="<?=$res['id']?>" data-module="subscribers"><?=$res['status']?></button></td>                                             
                                                    <td> <div class="btn-group ">
                                                              
                                                                <button type="button" class="btn  dark dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?=base_url('admin/subscribers/update/'.$res['id'])?>"> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                       <a  data-toggle="modal" class="delete_list_item"  data-id="<?=$res['id']?>" data-module="subscribers"> Delete </a>
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
                          