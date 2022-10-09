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
                                <h1 class="heading-1"><?=$patient_care['page']?> </h1>
                            </div>
                        </div>
                        <ul class="page-list">
                            <li><a href="index-2.html">Home</a></li>
                            <li> Patient stories</li>
                            <li> <?=$patient_care['page']?> </li>
                        </ul> 
                    </div>
                </div>       
            </div>
        </section>
        <!--Breadcrumb Section End Here-->

        <!--About Us Section Start Here-->
        <section class="teeth-canel padding-100">           
            <div class="container">
                <div class="row">
                    <div class="<?=(empty($patient_care['image'])?'col-lg-12':'col-lg-5')?>">
                        <div class="canel-content-area">
                            <div class="common-title padding-bottom-20">
                                <h2 class="heading line-none"><?=$patient_care['title']?></h2>
                            </div>                           
                            <p><?=$patient_care['description']?></p>
                            <!-- video popup toggler -->  
                            
                        </div>
                    </div>
                    <?php if(!empty($patient_care['image'])){ ?>
                    <div class="col-lg-7 pr-lg-0">
                        <div class="canel-img-area">
                            <?php if(!empty($patient_care['image'])){ ?>
                            <img src="<?=base_url('uploads/patient_care/').$patient_care['image']?>" alt="img">
                            <?php  } ?>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>            
        </section>
        <!--About Us Section End Here-->
<?php if(!empty($patient_care['section_title1'])||!empty($patient_care['section_title2'])){ ?>
<section class="quality-section half-section2 bg_gray " >
            <div class="container">
                <div class="row">
                    <?php if(isset($patient_care['section_title1'])&&!empty($patient_care['section_title1'])) { ?>
                    <div class="col-lg-6">
                        <!--Commen Title-->
                        <div class="common-title">
                            <h3 class="heading line-left"><?=$patient_care['section_title1']?></h3>
                        </div>
                        <div class="content-area"style="width: 95%;">
                            <p> <?=$patient_care['section_description1']?></p>                            

                        </div>
                        <div class="check-box-area">
                          
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(isset($patient_care['section_title2'])&&!empty($patient_care['section_title2'])) { ?>
                    <div class="col-lg-6">
                        <!--Commen Title-->
                        <div class="common-title">
                            <h3 class="heading line-left"><?=$patient_care['section_title2']?></h3>
                        </div>
                        <div class="content-area">
                            <p><?=$patient_care['section_description2']?> </p>                            
                        </div>
                       
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
           <?php } ?>
<?php if(isset($tagged_doctors)&&!empty($tagged_doctors)&& false) { ?>
     <section class="testimonial-section half-section our-doctor" >
     <div class="container">
                <div class="row">
        <div class="col-lg-12">
                 <div class="common-title padding-bottom-70">
                    <h2 class="heading">Our Doctors</h2>
                 </div>
              </div>
          </div></div>
            <div class="container margin-50px-top">
                <div class="row justify-content-center">
<?php  foreach ($tagged_doctors as $key => $doctor) { ?>  
 
                <div class="col-md-4"> 
                    <div class="blog-post-single-item bg_gray border-radius-10 ">
                            <div class="thumb text-center doc_imgbox">
                                <img class="width-100" src="<?=base_url('uploads/doctor/').$doctor['image']?>">
                            </div>
                            <div class="content margin-five-top">
                                
                                <h3 class="title padding-ten-lr">
                                    <a href="#"><?=$doctor['title']?></a>
                                </h3>  <ul class="post-meta doc" >
                                    
                                    <li><?=$doctor['designation']?> </li>
                                </ul>                              
                                <p class="padding-ten-lr padding-five-top padding-ten-bottom"><?=substr($doctor['description1'], 0,0)?><br>  <a id="open-form-popupnew" href="#" style="color:#ab1c1c!important; "
                data-doctor-id="<?=$doctor['id']?>" 
                data-doctor-title="<?=$doctor['title']?>"                                 
                data-doctor-designation="<?=$doctor['description']?>" 
                data-doctor-description="<?=$doctor['description1']?>"
                data-doctor-image="<?=$doctor['image']?>"
                >Read More</a>&nbsp; | &nbsp;  <a id="open-form-popup" 
                class="doc_appointment"
                data-doctor-id="<?=$doctor['id']?>"
                data-doctor-title="<?=$doctor['title']?>"                                 
                data-department-ids="<?=$doctor['departments']?>"
                data-doctor-image="<?=$doctor['image']?>"
                href="#" style="color:#ab1c1c!important; ">Make an appointment</a></p>
                           
                            </div>
                        </div> </div> 
<?php } ?>              
                        
                </div>
            </div>
            </section>
 
        <?php } ?>
        <!-- // Our Hospital Time line End Here-->
<?php $this->load->view('includes/footer'); ?>