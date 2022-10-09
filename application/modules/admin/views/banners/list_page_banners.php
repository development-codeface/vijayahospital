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
                                        <i class="fa fa-globe"></i>Page banners
                                    </div>
                                    <div class="tools"> </div>
                                    
                                        
                                      <!--  <a href="<?=base_url()?>admin/page_banner_management/add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> ADD NEW</a>  -->
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>

                                                <th>Page</th>
                                                <th>Image</th>
                                                <th>SEO</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                   
                                                    <td><?=$res['category']?></td>
                                                    <td> <img src="<?=base_url()?>uploads/banners/pages/<?=$res['image']?> " width="150" height="80"></td>
                                                 
                                                    <td> <a type="button" class="btn  purple" href="<?=base_url()?>admin/Seo_management/manageseo/page_banner_management/<?=$res['category']?>">MANAGE SEO </a></td> 
                                                    <td> <div class="btn-group ">
                                                               
                                                                <button type="button" class="btn  dark dropdown-toggle" data-toggle="dropdown">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?=base_url('admin/page_banner_management/update/'.$res['id'])?>"> Edit </a>
                                                                    </li>
                                                                  
                                                                    
                                                                  
                                                                </ul>
                                                            </div> </td>
                                                </tr>
                                                 
                                           <?php } ?>
                                           <tr>
                                             <td>Home</td>
                                             <td></td>
                                             <td> <a type="button" class="btn  purple" href="<?=base_url()?>admin/Seo_management/manageseo/page_banner_management/home">MANAGE SEO </a></td> 
                                             <td></td>
                                           </tr>
                                          
                                               
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          