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
                                        <i class="fa fa-globe"></i>Gallery Listing
                                    </div>
                                    <a href="<?=base_url()?>admin/Gallery_content/add" class="btn btn-danger pull-right">Add New</a>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>Title </th>
                                                <th> Type</th>
                                                <th>Date</th>
                                                <th>GALLERY/VIDEO</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                    <td> <?=$res['title']?> </td>

                                                    <td> <?=$res['category']?> </td>
                                                    <td><?=date('d-m-Y',strtotime($res['date']))?></td>
                                                   
                                                    <td> 
                                                   <?php if($res['category'] == 'gallery') { ?>
                                                             <a type="button" class="btn btn-success" href="<?=base_url()?>admin/gallery/add/<?=$res['id']?>">Manage Gallery</a>
                                                   <?php }  else { ?>
                                                        <a type="button" class="btn btn-danger" href="<?=base_url()?>admin/Gallery_content/update_video/<?=$res['id']?>">Manage Videos  </a>
                                                   <?php } ?></td>
                                                               <td> <div class="btn-group "><button type="button" class="btn  dark dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?=base_url('admin/Gallery_content/update/'.$res['id'])?>"> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                       <a  data-toggle="modal" class="delete_list_item"  data-id="<?=$res['id']?>" data-module="Gallery_content"> Delete </a>
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
                          