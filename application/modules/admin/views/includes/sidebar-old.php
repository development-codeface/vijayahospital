<div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                     <?php  $segment = $this->uri->segment_array();  ?>
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item <?=($segment[2]=='dashboard')?'active open':'';?> ">
                            <a href="<?=base_url()?>admin/dashboard" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                 <?php if ($segment[2]=='dashboard') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='dashboard')?'open':'';?>"></span>
                            </a>
                            
                        </li>
                        
                        <li class="nav-item  <?=($segment[2]=='sitesettings')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/sitesettings/update/1" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Site Settings</span>
                                 <?php if ($segment[2]=='sitesettings') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='sitesettings')?'open':'';?>"></span>
                            </a>
                          
                           
                          
                        </li>
                      
                        <li class="nav-item <?=($segment[2]=='banner_management' && !isset($segment[3]))?'active open':'';?>">
                            <a href="<?=base_url()?>admin/banner_management" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Banner</span>
                               <?php if ($segment[2]=='banner_management') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='banner_management')?'open':'';?>"></span>
                            </a>
                           
                          
                        </li>

                         <li class="nav-item  <?=($segment[3]=='update_banner_logo')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/banner_management/update_banner_logo/1" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Site Logo</span>
                                    </a>
                          
                        </li>
                       
                        <?php /*?><li class="nav-item  <?=($segment[2]=='companies')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/companies/index" class="nav-link nav-toggle">
                                <i class="icon-briefcase"></i>
                                <span class="title">Our Companies</span>
                               <?php if ($segment[2]=='companies') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='companies')?'open':'';?>"></span>
                            </a>
                          
                        </li><?php */?>
                        <li class="nav-item  <?=($segment[2]=='departments')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/departments/index" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Departments</span>
                               <?php if ($segment[2]=='departments') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='departments')?'open':'';?>"></span>
                            </a>
                          
                        </li>
                        
                         <li class="nav-item  <?=($segment[2]=='facility')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/facility/index" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Facilities</span>
                               <?php if ($segment[2]=='facility') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='facility')?'open':'';?>"></span>
                            </a>
                          
                        </li>
                      
                        <li class="nav-item  <?=($segment[2]=='doctor')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/doctor/index" class="nav-link nav-toggle">
                                <i class="icon-social-dribbble"></i>
                                <span class="title">Doctor</span>
                                 <?php if ($segment[2]=='doctor') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='doctor')?'open':'';?>"></span>
                            </a>
                           
                        </li>
                      
                        <li class="nav-item  <?=( (($segment[2]=='gallery') && !($segment[3]=='partner')) || ($segment[2]=='gallery_category') ) ?'active open':'';?>">
                            <a href="<?=base_url()?>admin/gallery_category/index" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Gallery</span>
                               <?php if( ($segment[2]=='gallery' && !($segment[3]=='partner')) || ($segment[2]=='gallery_category')){ ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='gallery')&& !($segment[3]=='partner')?'open':'';?>"></span>
                            </a>
                           
                        </li>

                        <li class="nav-item  <?=($segment[2]=='gallery') && ($segment[3]=='partner')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/gallery/partner" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Partner Logo</span>
                               <?php if ($segment[2]=='gallery' && ($segment[3]=='partner')) { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='gallery') && ($segment[3]=='partner')?'open':'';?>"></span>
                            </a>
                           
                        </li>

                        <li class="nav-item  <?=( ($segment[2]=='video') || $segment[2]=='video_category' )?'active open':'';?>">
                            <a href="<?=base_url()?>admin/video_category" class="nav-link nav-toggle">
                                <i class="icon-pencil"></i>
                                <span class="title">Video Category</span>
                                <?php if ($segment[2]=='video' || $segment[2]=='video_category') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='video')?'open':'';?>"></span>
                            </a>
                          
                           
                        </li>
                       
                       
                       
                        <li class="nav-item  <?=($segment[2]=='cms')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/cms" class="nav-link nav-toggle">
                                <i class="icon-pencil"></i>
                                <span class="title">CMS</span>
                                <?php if ($segment[2]=='cms') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='cms')?'open':'';?>"></span>
                            </a>
                          
                           
                        </li>

                         <li class="nav-item  <?=($segment[2]=='blog')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/blog" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Blog</span>
                                <?php if ($segment[2]=='blog') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='blog')?'open':'';?>"></span>
                            </a>
                          
                           
                        </li>

                         <li class="nav-item  <?=($segment[2]=='testimonial')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/testimonial" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Testimonial</span>
                                <?php if ($segment[2]=='testimonial') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='testimonial')?'open':'';?>"></span>
                            </a>
                          
                           
                        </li>
                       
                        <li class="nav-item  <?=($segment[2]=='contacts')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/contacts" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Enquiry</span>
                                <?php if ($segment[2]=='contacts') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='contacts')?'open':'';?>"></span>
                            </a>
                         
                        </li>

                         <li class="nav-item  <?=($segment[2]=='booking')?'active open':'';?>">
                            <a href="<?=base_url()?>admin/booking" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Bookings</span>
                                <?php if ($segment[2]=='booking') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                <span class="arrow <?=($segment[2]=='booking')?'open':'';?>"></span>
                            </a>
                         
                        </li>

                         <li class="nav-item  <?=($segment[2]=='page_seo_management')?'active open':'';?>">
                                <a href="<?=base_url()?>admin/page_seo_management" class="nav-link nav-toggle">
                                    <i class="icon-social-dropbox"></i>
                                    <span class="title">SEO</span>
                                    <?php if ($segment[2]=='page_seo_management') { ?>
                                     <span class="selected"></span>
                                      <?php } ?>
                                    <span class="arrow <?=($segment[2]=='page_seo_management')?'open':'';?>"></span>
                                </a>
                          </li>
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>