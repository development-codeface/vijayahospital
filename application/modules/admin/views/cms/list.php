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
                                        <i class="fa fa-globe"></i>CMS Listing
                                    </div>
                              <!--  <a href="<?=base_url()?>admin/cms/add" class="btn btn-danger pull-right">Add New</a>   -->
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>Title </th>
                                                <!-- <th> Description</th> -->
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                    <td> <?=$res['title']?> </td>
                                                    <!-- <td> <?= strip_tags( substr($res['description'], 0,30))?> </td> -->
                                                 
                                                   
                                                    <td> 
                                                   <!--  <a type="button" class="btn  purple" href="<?=base_url()?>admin/Seo_management/manageseo/cms/<?=$res['id']?>">SEO </a> -->
                                                    <div class="btn-group ">
                                                              
                                                                <button type="button" class="btn  dark dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?=base_url('admin/cms/update/'.$res['id'])?>"> Edit </a>
                                                                    </li>
                                                                    <?php if($res['id'] == 3) { ?>
                                                                        <li>
                                                                            <a href="<?=base_url('admin/gallery/add/cms_about')?>"> Manage Images </a>
                                                                        </li>
                                                                    <?php } ?>
                                                                  
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
                          