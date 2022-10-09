<?php $this->load->view('includes/header'); ?>

<!--Main Area Start Here-->

<main>

    <!--Slider Section Start Here-->    

    <div class="home-slider home-slider-one">

        <div class="container-fluid">

            <div class="row">

                <!--Scroll Down Area-->                           

                <div class="scroll-down-area">

                    <div class="carousel-dots-area"></div>

                    <div class="slider-bottom-area">

                        <!-- Scroll Down -->   

                        <div class="scroll-down">

                            <a href=".footer-area"> Scroll down </a>

                        </div>

                    </div>

                </div>

                <!--Scroll Down End--> 

                <!--slider strar-->

                <div class="home-slider-wrapper">

                    <!--slider item-->

                    <?php foreach ($banners as $key => $banner) { 

                        ?>                      

                    <div class="slider-items">

                        <div class="slider-content-area">

                            <div class="slider-content">

                                <h1 class="slider-heading"><?=$banner['title1']?></h1>

                                <div class="padding-30 width-60">

                                    <p><?=$banner['description']?></p>

                                </div>

                                <?php if($banner['title2']){ ?>

                                <div class="main-btn-wrap">

                                    <a href="<?=$banner['title2']?>" class="main-btn"> More Information</a>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="slider-img" style="background-image: url(<?=base_url('uploads/banners/').$banner['image']?>)">

                        </div>

                    </div>

                    <?php } ?>

                    <!--slider item-->

                </div>

                <!--slidr end-->

                <div class="social-icon">

                    <a class="icon" href="<?=$site_settings['facebook']?>" target="_blank"><i class="fab fa-facebook-f"></i></a>                        

                    <a class="icon" href="<?=$site_settings['instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a>                           

                    <a class="icon" href="<?=$site_settings['twitter']?>t" target="_blank"><i class="fab fa-twitter"></i></a>                            

                    <a class="icon" href="<?=$site_settings['linkedin']?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>        

                </div>

                <!--social icon end-->                

            </div>

        </div>

    </div>

    <!--Slider Section End Here--> 

    <!--Slider Section End Here-->    

    <section class="pricing padding-bottom-100 style-02 half-section2">

        <div class="container">

            <div class="row">

                <!--Common Title-->

                <div class="col-lg-12">
                    

                    <div class="common-title padding-bottom-70">

                        <h2 class="heading ">Our Services</h2>

                    </div>

                </div>

                <div class="pricing-wrap">

                    <div class="pricing-column" style=" background-image: url(<?=asset_path_web()?>img/home-04/01.png);">

                        <a href="<?=base_url('patient-care/find-a-doctor')?>">

                            <div class="price-content">

                                <h6 class="heading-6"><img  class="width-30" src="<?=asset_path_web()?>img/home-04/f1.png"></h6>

                                <div class="price">

                                    <h4 class="heading-6">Find Doctor </h4>

                                    <p class="text-center padding-ten-lr color-white"><?=$our_services_finddoctor['description']?> </p>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="pricing-column" style=" background-image: url(<?=asset_path_web()?>img/home-04/03.png);">

                        <a href="<?=base_url('contact-us')?>">

                            <div class="price-content">

                                <h6 class="heading-6"><img class="width-30" src="<?=asset_path_web()?>img/home-04/f2.png"></h6>

                                <div class="price">

                                    <h4 class="heading-6">Send An Enquiry</h4>

                                    <p class="text-center padding-ten-lr color-white"><?=$our_services_contactus['description']?> </p>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="pricing-column" style=" background-image: url(<?=asset_path_web()?>img/home-04/04.png);">

                        <a id="open-form-popup">

                            <div class="price-content">

                                <h6 class="heading-6"><img  class="width-30" src="<?=asset_path_web()?>img/home-04/f3.png"></h6>

                                <div class="price">

                                    <h4 class="heading-6">Book Appointment</h4>

                                    <p class="text-center padding-ten-lr color-white"><?=$our_services_appointmentform['description']?> </p>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--Service Section Start Here-->    

    <!--Service Section Start Here--> 

    <section id="service" class="service padding-100">

        <div class="container-fluid px-0">

            <!-- Side form icons -->                

            <div id="service_info_item" class="side-form-icons">

                <i class="icon flaticon-phone-call" id="open-opening-popup"></i>

                <i class="icon flaticon-placeholder" id="open-location-popup"></i>

                <i class="icon flaticon-clock-circular-outline" id="open-form-popup" ></i>

                <!-- <i class="icon flaticon-clock-circular-outline" id="open-form-popup" ></i> -->

            </div>

            <div class="container">

                <div class="row mx-0">

                    <!--Service Left Column-->

                    <div class="col-lg-4 col-md-12">

                        <div class="service-left">

                            <h3 class="heading-3">Centre of excellence</h3>

                            <div class="padding-bottom-35 padding-top-30">

                                <p> <?=$whychoose['short_description']?>

                                </p>

                            </div>

                            <div class="main-btn-wrap">

                                <a href="<?=base_url('about-us')?>" class="main-btn2">Read more</a>

                            </div>

                        </div>

                    </div>

                    <!--Service Left Column End-->

                    <!--Service Right Column-->

                    <div class="col-lg-8 col-md-12">

                        <div class="service-right">

                            <div class="row">

                                <div class="p-2 col-md-12 text-wrap">

                                    <?php  

                                        $splitCount = (count($departments)<=2)?1:2;

                                        $depts = array_chunk($departments, $splitCount, true);  

                                        ?> 

                                </div>

                                <?php if(isset($depts[0])){ ?>

                                <div class="col-md-6 col-sm-12">

                                    <div class="right-column-one">

                                        <?php foreach ($depts[0] as $key => $dept) { ?>

                                        <div class="service-item">

                                            <img class="width_auto" src="<?=base_url('uploads/departments/').$dept['image']?>" alt="img">

                                            <h6 class="heading-6"><?=$dept['title']?></h6>

                                            <p><?=$dept['short_description']?> </p>

                                            <div class="main-btn-wrap"> <a href="<?=base_url('department/')?><?=$dept['slug']?>"style="min-width: 100%;margin-top: 20px;" class="main-btn">Read more</a>

                                            </div>

                                        </div>

                                        <?php } ?> 

                                    </div>

                                </div>

                                <?php } ?> 

                                <?php if(isset($depts[1])){ ?>

                                <div class="col-md-6 col-sm-12">

                                    <div class="right-column-two">

                                        <?php foreach ($depts[1] as $key => $dept) { ?>

                                        <div class="service-item">

                                            <img class="width_auto" src="<?=base_url('uploads/departments/').$dept['image']?>" alt="img">

                                            <h6 class="heading-6"><?=$dept['title']?></h6>

                                            <p><?=$dept['short_description']?> </p>

                                            <div class="main-btn-wrap"> <a href="<?=base_url('department/')?><?=$dept['slug']?>"style="min-width: 100%;margin-top: 20px;" class="main-btn">Read more</a>

                                            </div>

                                        </div>

                                        <?php } ?> 

                                    </div>

                                </div>

                                <?php } ?> 

                            </div>

                        </div>

                    </div>

                    <!--Service Right Column End-->

                </div>

            </div>

        </div>

    </section>

    <!--Service Section End Here-->

    <!--Pricing Section Start Here-->

    <!--Pricing Section End Here-->

    <!--Doctor Section Start Here-->  

    <?php if(isset($doctors)&&!empty($doctors)){ ?>

    <section class="testimonial-section half-section our-doctor" >

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="common-title padding-bottom-41">

                        <h2 class="heading">Our Doctors</h2>

                    </div>

                </div>

            </div>

        </div>

        <div class="container ">

            <div class="row justify-content-center">



                 <?php $this->load->view('includes/doctors'); ?>

                

            </div>
 <div class="row justify-content-center padding-top-40px"><div class="col-lg-2"><div class="main-btn-wrap"> <a href="<?=base_url('patient-care/find-a-doctor')?>" style="min-width: 100%;margin-top: 60px;" class="main-btn">View More Doctors</a> </div> </div>
 </div>
        </div>

    </section>

    <?php } ?>

    <!--Appointment Section End Here-->

    <!--Testimonials Section Start Here-->    

    <?php if(isset($departments_menu)&&!empty($departments_menu)){ ?>

    <section class="testimonial-section default-style  padding-top-25">

        <div class="container">

            <div class="row">

                <!-- Common Title-->

                <div class="col-lg-12">

                    <div class="common-title padding-bottom-30 padding-bottom-mob-60">

                        <h2 class="heading"> Departments </h2>

                    </div>

                </div>

                <div class="testimonials-carousel">
<!-- 
                    <div class="testimonials-carousel-controller">                        

                        <span class="active-controller">01</span> 

                        <span class="controller-devided">/</span>

                        <span class="total-controller">0<?=count($departments_menu)?></span>

                    </div> -->

                    <!--Testimonial Thumbnail-->                 

                    <div class="testimonial-carousel-img hider">

                        <?php foreach ($departments_menu as $key => $department) { ?>                         

                        <div class="carousel-items">

                            <img src="<?=base_url('uploads/departments/').$department['image_large']?>" alt="img">

                        </div>

                        <?php } ?>

                    </div>

                    <!--// Testimonial Thumbnail--> 

                    <div class="testimonial-content-wrap">

                        <!--Testimonial Description-->

                        <div class="testimonial-carousel-content">

                            <?php foreach ($departments_menu as $key => $department) { ?>    

                            <div class="carousel-items">

                                <div class="content">

                                    <h4 class="heading-4"><?=ucfirst(strtolower($department['title']))?></h4>

                                    <!-- <h6 class="heading-6">Heart Patient</h6> -->

                                    <div class="padding-top-20 padding-bottom-30 ">

                                        <!-- <p> “<?=$department['short_description']?>”</p> -->

                                        <p><?=$department['short_description']?></p>

                                        <div class="d-flex">

                                            <div class="main-btn-wrap margin-top-40 margin-left-mob-28">

                                                <a href="<?=base_url('department/').$department['slug']?>" class="main-btn">Learn More</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <?php } ?>

                        </div>

                        <!--// Testimonial Description End-->

                        <!--Testimonial Arrow-->

                        <div class="testimonial-arrow"></div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <?php } ?>

    <!--Testimonials Section End Here-->

    <?php $this->load->view('includes/statistics_section'); ?>

    <!--Doctor Section Start Here-->        

    <section  class="our-doctor half-section2 padding-top-25 hider">

        <div class="container">

            <div class="row">

                <!--Common Title-->                              

                <div class="col-lg-6 doctor-slider">
<!-- 
                    <ol class="carousel-indicators">

                        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>

                        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>

                        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>

                    </ol> -->

                    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">

                            <div class="carousel-item active">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="doctor-slider-img">

                                            <img src="<?=asset_path_web()?>/img/doctor/1.png" class="d-block w-100" alt="Slider Img">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!--// Carouse Item-->

                         

                            <!--// Carouse Item-->                  

                          

                            <!--// Carouse Item-->                                                                    

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

                <div class="col-lg-6">

                    <div class="doctor-slider-content padding-40px-left">

                        <h4 class="heading-4"><a href="#">

                            <img style="max-width: 54%;" src="<?=asset_path_web()?>/img/logo-3.png" alt="logo">

                            </a>

                        </h4>

                        <div class="padding-top-30 padding-bottom-35">

                            <p><?=$eye_care['description']?></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
 


<!-- only mobile start -->
    <section  class="our-doctor half-section2 padding-top-25 mobonly">

        <div class="container">

            <div class="row">

                <!--Common Title-->                              
                <div class="col-lg-6 col-sm-12">

                    <div class="doctor-slider-content  padding-top-30 " style="text-align: center;" >

                        <h4 class="heading-4"><a href="#">

                            <img style="max-width: 54%;" src="<?=asset_path_web()?>/img/logo-3.png" alt="logo">

                            </a>

                        </h4>

                       

                    </div>

                </div>
                <div class="col-lg-6 doctor-slider">

                   <!--  <ol class="carousel-indicators">

                        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>

                        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>

                        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>

                    </ol> -->

                    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">

                            <div class="carousel-item active">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="doctor-slider-img">

                                            <img src="<?=asset_path_web()?>/img/doctor/1.png" class="d-block w-100" alt="Slider Img">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!--// Carouse Item-->

                           

                      
                            <!--// Carouse Item-->                                                                    

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

                <div class="col-lg-6 col-sm-12">

                    <div class="doctor-slider-content ">

                    

                        <div class="padding-top-30 padding-bottom-35">

                            <p><?=$eye_care['description']?></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
<!-- only mobile ends  -->

    <?php if(isset($blogs)&&!empty($blogs)){ ?>

    <!--Our Latest Stories Start Here-->

    <section class="latest-stories padding-bottom-100">

        <div class="container-fluid">

            <div class="row">

                <div class="carousel-right-area">


                    <div class="col-lg-12">

                        <!--Commen Title-->

                        <div class="common-title padding-bottom-40">

                            <h2 class="heading ">Our latest stories</h2>

                        </div>

                    </div>

                    <div class="col-lg-12">

                        <div class="storiest-carousel">

                            <?php foreach ($blogs as $key => $blog) { ?>

                            <div class="item blogs_scrol">

                                <?php if($blog['type'] == 'image'){ ?>

                                <div class="carousel-img">

                                    <img src="<?=base_url('uploads/blog/').$blog['image']?>" alt="img">

                                </div>

                                <?php } else{ 

                                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $blog['url'], $match);

                                    $youtube_id = $match[1];

                                    

                                    ?>

                                <div class="play-area">

                                    <!-- video popup toggler -->  

                                    <a href="https://www.youtube.com/watch?v=<?=$youtube_id?>" class="hosted-popup">

                                        <!--  <div class="play-btn">

                                            <i class="icon flaticon-play-button"></i> 

                                            </div>   -->

                                    </a>

                                </div>

                                <img class="tumbc"  src="https://img.youtube.com/vi/<?=$youtube_id?>/maxresdefault.jpg" alt="img">

                                <?php } ?>

                                <div class="catousel-content">

                                    <div class="hover-icon">

                                        <a href="<?=base_url('blog-details/').$blog['slug']?>">                                        

                                        <span class="icon"> 

                                        <i class="flaticon-add-plus-button"></i>

                                        </span>   

                                        </a>

                                    </div>

                                    <div class="stories-text">

                                        <div class="date"><?=date('d-M-Y',strtotime($blog['created_at']))?></div>

                                        <div class="text">

                                            <h6 class="heading-06"><?=$blog['title']?></h6>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
<section class="pricing padding-bottom-100 style-02 ">

        <div class="container">

            <div class="row">

                <!--Common Title-->

                <div class="col-lg-12">

                    <div class="common-title padding-bottom-30">

                        <h2 class="heading">Our Insurances</h2>

                    </div>

                </div>
                  <div class="col-lg-12">                           
                            <div class="storiest-carousel">                               
                                <div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in1.jpg" alt="img">
                                    </div>
                                </div>
                                <div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in2.jpg" alt="img">
                                    </div>
                                </div>                        
                                <div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in3.jpg" alt="img">
                                    </div>
                                </div>                      
                                <div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in4.jpg" alt="img">
                                    </div>
                                </div>   
                                <div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in5.jpg" alt="img">
                                    </div>
                                </div>                    
                                <div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in6.jpg" alt="img">
                                    </div>
                                </div> 
<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-90p" src="<?=asset_path_web()?>/img/in7.jpg" alt="img">
                                    </div>
                                </div>                                 
<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in8.jpg" alt="img">
                                    </div>
                                </div>                                 
<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in9.jpg" alt="img">
                                    </div>
                                </div>                                 
<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in10.jpg" alt="img">
                                    </div>
                                </div>                                 
<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in11.jpg" alt="img">
                                    </div>
                                </div>                                 
<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in12.jpg" alt="img">
                                    </div>
                                </div>                                 
<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                         <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in13.jpg" alt="img">
                                    </div>
                                </div>  

<div class="item margin-10px-all">
                                    <div class="carousel-img">
                                        <img class="width-70 mob-width-100p" src="<?=asset_path_web()?>/img/in14.jpg" alt="img">
                                    </div>
                                </div>

                            </div>
                        </div>          
                  
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <!--Our Latest Stories End Here-->

    <!--Google Map -->

    <!--// Google Map End-->

</main>

<!-- Button trigger modal -->

<!--Main Area End Here-->

<?php $this->load->view('includes/footer'); ?>