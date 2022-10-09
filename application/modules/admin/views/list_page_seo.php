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
                                        <i class="fa fa-globe"></i>MANAGE SEO
                                    </div>
                                    <div class="tools"> </div>
                                    
                                        
                                      <!--  <a href="<?=base_url()?>admin/page_banner_management/add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> ADD NEW</a>  -->
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>

                                                <th>Page</th>
                                                <th>SEO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                   
                                                    <td><?=$res['page']?></td>
                                                 
                                                    <td> <a type="button" class="btn  purple" href="<?=base_url()?>admin/Seo_management/manageseo/page_seo_management/<?=$res['page']?>">MANAGE SEO </a></td> 
                                                 
                                                </tr>
                                                 
                                           <?php } ?>
                                                                                      
                                            <tr>
                                                <td>
                                                    Sitemap
                                                </td>
                                                <td>
                                                    <a type="button" class="btn  green" target="_balnk" href="<?=base_url()?>sitemap.xml">Generate Sitemap </a>
                                                </td>

                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    Robot Txt
                                                </td>
                                                <td width="50%">
                                                    Actually IIRC the <strong> .htaccess </strong>file CI supplies should only allow access to specific folders like images so the application folder should never be accessible. So you don't really need to block anything in robots.txt.

                                                </td>
                                            </tr>
                                          
                                               
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          