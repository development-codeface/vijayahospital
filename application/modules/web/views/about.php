<?php $this->load->view('includes/header'); ?>

<!--Slider Section Start Here-->  

<div class="home-slider slider-style-04">

    <div class="container-fluid px-0">

        <div class="paralax-slider-area">

            <div class="paralax-slider-wrapper">

                <div class="slider-items" style="background-image: url(<?=asset_path_web()?>/img/home-03/slider2.jpg);">

                    <div class="slider-content-area">

                        <div class="slider-content">

                            <h1 class="slider-heading">Providing supreme healthcare services for generations</h1>

                        </div>

                    </div>

                </div>

            </div>

            <div class="slider-bottom-area">

                <div class="scroll-down-area">

                    <div class="scroll-down-btn">

                        <a href=".footer-area"></a>

                    </div>

                </div>

                <div class="social-icon">

                    <a class="icon" href="<?=$site_settings['facebook']?>" target="_blank"><i class="fab fa-facebook-f"></i></a>                        

                    <a class="icon" href="<?=$site_settings['instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a>                           

                    <a class="icon" href="<?=$site_settings['twitter']?>" target="_blank"><i class="fab fa-twitter"></i></a>                            

                    <a class="icon" href="<?=$site_settings['linkedin']?>about" target="_blank"><i class="fab fa-linkedin-in"></i></a>        

                </div>

            </div>

        </div>

    </div>

</div>

<!--Slider Section End Here-->   

</div>   

<!--Header Area End Here-->

<!--Main Area Start Here-->

<main>

    <!--Breadcrumb Section Start Here-->

    <!--Breadcrumb Section End Here-->

    <!--About Us Section Start Here-->

    <section class="about-us-section padding-top-100">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-6 col-md-12 px-0">

                    <div class="about-img-area">

                        <img src="<?=base_url('uploads/cms/').$aboutus['image']?>" alt="img">

                    </div>

                </div>

               <div class="col-lg-6 col-md-12">

                    <div class="about-content-area ">

                        <h4 class="heading-04 padding-twenty-top">About us</h4>

                        <div class="common-title">

                            <h2 class="heading line-none"><?=$aboutus['title']?></h2>

                        </div>

                        <div class="padding-top-20 padding-bottom-40">

                            <p> <?=$aboutus['description']?>

                            </p>

                        </div>

                           

                    </div>

                                     

                    <div id="service_info_item" class="side-form-icons">   

                        <i class="icon flaticon-phone-call" id="open-opening-popup"></i>

                        <i class="icon flaticon-placeholder" id="open-location-popup"></i>

                        <i class="icon flaticon-clock-circular-outline" id="open-form-popup"></i>

                    </div>

                </div> 

            </div>

        </div>

    </section>

    <!--About Us Section End Here-->

        <section class="ophtalmologue-section half-section2  margin-four-top">
        <div class="container-fluid">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-12 col-md-12" >
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="ophtalmologue-img">
                                    <img src="<?=base_url('uploads/cms/').$chairman_message['image']?>" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 pr-0 d-flex align-items-center">
                                <div class="ophtalmologue-content-area ">
                                   <div class=" padding-bottom-10px">
                                        <h2 class="heading abt_newedit">"Treatment is a team performance"<br>

"Treatment delayed is treatment denied"</h2>
                                    </div> 
                                    <div class="ophtalmologue-content">
                                        <p><?=$chairman_message['description']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 margin-four-top">
                        <div class="row">
<div class="col-lg-4 col-md-4">
                                <div class="ophtalmologue-img">
                                    <img src="<?=base_url('uploads/cms/').$visechairman_message['image']?>" alt="img">
                                </div>
                            </div>                            
                            <div class="col-lg-6 col-md-6 pr-0 d-flex align-items-center">
                                <div class="ophtalmologue-content-area">
                                   <div class="padding-bottom-30">
                                        <h2 class="heading line-left"> </h2>
                                    </div> 
                                    <div class="ophtalmologue-content" style=" width:100%;">
                                        <p><?=$visechairman_message['description']?></p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--About Page Doctor Section Start Here-->       

    <!--About Page Doctor Section End Here-->

    <!--Our Mission Section Start Here

    <section class="our-mission-section padding-bottom-50">

        <div class="container">

            <div class="row">

              

                <div class="col-lg-12 col-md-12">

                  

                    <div class="mission-tab-area padding-top-60">

                       

                        <div class="tab-navbar-area">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">

                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vision</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mission</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Values</a>

                                </li>

                            </ul>

                        </div>

                        <div class="tab-content-area">

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="tab-content">

                                        <div class="col-lg-6 col-md-12">

                                            <div class="paragraph-wrap">

                                                <div class="paragraph-area padding-30">

                                                    
                                                    <p><?=$awards['description']?></p>

                                                </div>

                                               

                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-12">

                                            <div class="mission-img-area">

                                                <img src="<?=asset_path_web()?>/img/about/creation.jpg" alt="img">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <div class="tab-content">

                                        <div class="col-lg-6 col-md-12">

                                            <div class="paragraph-wrap">

                                                <div class="paragraph-area padding-30">

                                                    <p> <?=$vision['description']?>

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-12">

                                            <div class="mission-img-area">

                                                <img src="<?=asset_path_web()?>/img/about/analysis.jpg" alt="img">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                    <div class="tab-content">

                                        <div class="col-lg-6 col-md-12">

                                            <div class="paragraph-wrap">

                                                <div class="paragraph-area padding-30">

                                                    <p> <?=$mission['description']?>

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-12">

                                            <div class="mission-img-area">

                                                <img src="<?=asset_path_web()?>/img/about/strategy.jpg" alt="img">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                      

                    </div>

                  

                </div>

            </div>

        </div>

    </section>
    Coundown Section Start Here-->

    <?php $this->load->view('includes/statistics_section'); ?>

    <!--Coundown Section End Here-->

    <!--Why Patient Choose Section Start Here-->

    <section class="about-us-section padding-100">

        <div class="container-fluid">

            <div class="row">
         
                <div class="col-lg-10 col-md-12 px-0">

                    <div class="about-img-area">

                        <img src="<?=asset_path_web()?>/img/about/107.png" alt="img">

                    </div>

                </div> 
 
              <!--   <div class="col-lg-5 col-md-12 ">

                    <div class="why-choose-content">

                        <div class="common-title padding-bottom-30">

                            <h2 class="heading line-none">Why patients choose our hospital ? </h2><br>
                              <p class="fon-18" style=" padding-top: 4px;"><b>"Treatment is a team performance"</b></p><p class="fon-18"><b>"Treatment delayed is treatment denied"</b></p><br>

                              <p> <?=$why_patient_choose['description']?></p>
                        </div>

                    </div>

                </div> -->

            </div>

        </div>

    </section>

    <!--Why Patient Choose Section End Here-->


    <!-- // Our Mission Section End Here-->

    <!--Our Hospital Time line Start Here-->

    <?php if(isset($hospital_history)&&!empty($hospital_history)){ ?>

    <section class="timeline-section padding-100 ">

        <div class="container">

            <div class="row">

                <!--Common Title-->

                <div class="col-12">

                    <div class="common-title padding-bottom-50">

                        <h2 class="heading line-left m-auto">Our Hospital’s History</h2>

                    </div>

                </div>

                <div class="col-lg-12">

                    <div class="time-line-area">

                        <div class="big-slider-area">

                            <div class="year-area">

                                <ul>

                                    <?php foreach ($hospital_history as $key => $history) { ?> 

                                    <li data-slide-index="<?=$key?>" class="<?=(($key == 0)?'active':'')?>"><?=$history['year']?></li>

                                    <?php }  ?> 

                                </ul>

                            </div>

                            <div class="timeline-slider-big">

                                <?php foreach ($hospital_history as $key => $hist) { ?> 

                                <div class="items">

                                    <div class="d-flex">

                                        <div class="items-img"> 

                                            <img src="<?=base_url('uploads/hospitalhistory/').$hist['image']?>" alt="img">      

                                        </div>

                                        <div class="items-content">

                                            <h3 class="heading-03"><?=$hist['title']?></h3>

                                            <p><?=$hist['description']?></p>

                                        </div>

                                    </div>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                        <!--// Big Slider Area End-->

                        <div class="small-slider-area">

                            <div class="timeline-slider-small">

                                <?php foreach ($hospital_history as $key => $hist) { ?> 

                                <div class="items">

                                    <img src="<?=base_url('uploads/hospitalhistory/').$hist['image']?>" alt="img">    

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                        <!--// Small Slider Area End-->   

                    </div>

                </div>

            </div>

        </div>

    </section>

    <?php } ?>

    <!-- // Our Hospital Time line End Here-->

</main>

<?php $this->load->view('includes/footer'); ?>