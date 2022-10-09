
   <?php $this->load->view('includes/header'); ?>

    <!--Main Area Start Here-->
    <main>   

        <!--Breadcrumb Section Start Here-->
        <section class="breadcrumb-area padding-90" style="background-image: url(<?=asset_path_web()?>/img/bg/breadcrumb-bg.png)">
            <div class="container-fluid">        
                <div class="row">
                    <div class="breadcrumb-content">
                        <div class="col-12 px-0">
                            <div class="page-title">
                                <h1 class="heading-1"><?=$department_details['title']?></h1>
                            </div>
                        </div>
                        <ul class="page-list">
                            <li><a href="<?=base_url('')?>">Home</a></li>
                            <li> Department</li>
                            <li><?=$department_details['title']?></li>
                        </ul> 
                    </div>
                </div>       
            </div>
        </section>
        <!--Breadcrumb Section End Here-->

        <!--About Us Section Start Here-->
            <section  class="our-doctor half-section2 padding-bottom-100  padding-top-25 ">
        <div class="container">
            <div class="row">
 <div class="<?=(count($slider_images)<1)?'col-lg-12':'col-lg-6'?> col-md-12">
                        <div class="about-content-area pad-tb-40px-mob ">
                            <!-- <h4 class="heading-04">Cardiac Sciences</h4> -->
                            <div class="common-title">
                                <h2 class="heading-1 line-none font-w-600"><?=$department_details['title']?></h2>
                            </div>    
                            <div class="">                       
                                <p class="p_dep"> <?=$department_details['description']?>
                            </p>
                            </div>
                                <!-- video popup toggler -->  
                                      
                        </div> 
                        <!--Side Form Icons-->                      
                        
                    </div> 
                <!--Common Title-->                              
                <div class="col-lg-6 doctor-slider">   
                <ol class="carousel-indicators">
                    <?php foreach ($doctors as $key => $doctor) { ?>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="<?=$key?>" class="<?=$key==0?'active':''?>"></li>
                    <?php } ?>
   <!--  <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li> -->
  </ol>                     
                      <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" data-interval="3000">  
                      <div class="carousel-inner">
                        
                        <?php
                        if(isset($slider_images)){
                         foreach ($slider_images as $key => $slider_image) { ?>
                         
                        <div class="carousel-item <?=$key==0?'active':''?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="doctor-slider-img">
                                        <img src="<?=base_url('uploads/gallery/').$slider_image['image']?>" class="d-block w-100" alt="Slider Img">
                                    </div>                                 
                                </div>
                                
                            </div>                          
                        </div>
                        <?php } }?>                                                         
                      </div>         
                    </div> 
                    <!--Carousel Indicators 
         <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"> <i class="fas fa-chevron-left"></i> </span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"> <i class="fas fa-chevron-right"></i> </span>
          </a>-->                               
                </div>
                        
            </div>
        </div>
        <div id="service_info_item" class="side-form-icons">   
                            <i class="icon flaticon-phone-call" id="open-opening-popup"></i>
                            <i class="icon flaticon-placeholder" id="open-location-popup"></i>
                            <i class="icon flaticon-clock-circular-outline" id="open-form-popup"></i>
                        </div>  
    </section>    
    <?php if(isset($doctors)&&!empty($doctors)){ ?>
  <section class="testimonial-section half-section our-doctor" >
     <div class="container">
                <div class="row">
        <div class="col-lg-12">
                 <div class="common-title padding-bottom-41">
                    <h2 class="heading">Our Doctors</h2>
                 </div>
              </div>
          </div></div>
            <div class="container ">
                <div class="row justify-content-center">
                    <?php $this->load->view('includes/doctors'); ?>  
                </div>
            </div>
            </section>
        <?php } ?>
            <?php if($department_details['key_highlight_title']){ ?>
            <section class="why-choose-section padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 ">
                        <div class="why-choose-img">
                            <img src="<?=asset_path_web()?>/img/about/07.png" alt="img">
                        </div>                                
                    </div>
                    <div class="col-lg-6 col-md-12 offset-lg-1">
                        <div class="why-choose-content">
                            <div class="common-title padding-bottom-30">
                                <h2 class="heading line-none"><?=ucwords($department_details['key_highlight_title'])?></h2>
                            </div>  
                            <div class="check-box-area">
                                <ul class="check-box">
                                    <?php foreach ($dept_highlights as $key => $highlight) { ?> 
                                    <li><?=$highlight['description']?></li>
                                     <?php } ?>
                                </ul>                             
                            </div>
                        </div>                                
                    </div>
                </div>
            </div>
        </section> 
    <?php } ?>
        <!--About Us Section End Here-->
<?php if(!empty($department_details['section_title1'])&&!empty($department_details['section_desc1'])&&!empty($department_details['section_title2'])&&!empty($department_details['section_desc2'])){ ?>
<section class="quality-section half-section2 bg_gray " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!--Commen Title-->
                        <div class="common-title">
                            <h3 class="heading line-left"><?=$department_details['section_title1']?></h3>
                        </div>
                        <div class="content-area" style="width: 95%;">
                            <p><?=$department_details['section_desc1']?></p>
                        </div>
                      
                    </div>
                    <div class="col-lg-6">
                        <!--Commen Title-->
                        <div class="common-title">
                            <h3 class="heading line-left"><?=$department_details['section_title2']?></h3>
                        </div>
                        <div class="content-area">
                            <p><?=$department_details['section_desc2']?></p>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


        
        <!-- // Our Hospital Time line End Here-->
    </main>
   <?php $this->load->view('includes/footer'); ?>