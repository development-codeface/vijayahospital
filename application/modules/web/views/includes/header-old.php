<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Vijaya Hospital </title>

    <!-- favicon -->
    <link rel="icon" href="<?=asset_path_web()?>/img/favicon.png" sizes="20x20" type="image/png"> 
    <!-- flaticon -->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/flaticon.css">
    <!-- Fonts Awesome Icons -->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/fontawesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/bootstrap.min.css">
    <!-- animate -->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/animate.css">
    <!--Video Popup-->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/rpopup.min.css">     
    <!--Slick Carousel-->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/slick.css">  
    <!--Progress bar Css-->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/jquery.rprogessbar.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/style.css">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="<?=asset_path_web()?>/css/responsive.css">

</head>
<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>

            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!--Search Popup Start Here-->
    <div class="searchOverlay">
        <div class="sidenav-wrap">
            <div class="logo-area">
                <div class="logo">
                    <a href="#">
                        <img src="<?=asset_path_web()?>/img/logo-2.png" alt="logo">
                    </a>
                </div>
            </div><!--Logo End-->
            <div class="overlay-content">
                <span class="closebtn" title="Close Overlay">×</span>              
                <form>
                    <div class="Search-section">
                        <input type="text" placeholder="What can we help you with?" name="search">	  
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Search Popup End Here-->  

    <!--Side Nav Start Here-->
    <div class="sidenav">
        <div class="sidenav-wrap">
            <div class="logo-area">
                <div class="logo">
                    <a href="#">
                        <img src="<?=asset_path_web()?>/img/logo-2.png" alt="logo">
                    </a>
                </div>
            </div><!--Logo End-->
            <div class="overlay-content">
                <span class="closebtn" title="Close Overlay">×</span>              
                <div class="overlay-menu">           
                    <ul class="side-menu">
                        <li class="items"><a  class="itme-nav" href="<?=base_url('')?>">Home</a></li>
                        <li class="items"><a  class="itme-nav" href="<?=base_url('about-us')?>">About Us</a></li>
                        <li class="items"><a class="itme-nav" href="<?=base_url('services')?>">Services</a></li>
                        <li class="items"><a  class="itme-nav" href="<?=base_url('contact-us')?>">Contact</a></li>
                       
                    </ul>
                    <div class="social-icon">
                        <a class="icon" href="https://www.facebook.com/codingeek.net/" target="_blank"><i class="fab fa-facebook-f"></i></a>                        
                        <a class="icon" href="https://www.instagram.com/codingeeknet" target="_blank"><i class="fab fa-instagram"></i></a>                           
                        <a class="icon" href="https://twitter.com/codingeeknet" target="_blank"><i class="fab fa-twitter"></i></a>                            
                        <a class="icon" href="https://www.linkedin.com/company/codingeek/about" target="_blank"><i class="fab fa-linkedin-in"></i></a>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Side Nav End Here--> 

    <!--Side Form Popup Start Here-->
    <div class="side-form-popup">
        <div class="popup-wrapper">
            <div class="logo-area">
                <a href="index-2.php">
                    <img src="<?=asset_path_web()?>/img/logo-2.png" alt="Nav Logo">
                </a>
            </div>
            <!--// Popup Logo Area End-->
            <div class="opening-popup">
                <div class="close-popup">×
                    <!-- <i class="fas fa-times"></i> -->
                </div>
                <div class="row">
                    <div class="modal-image">
                        <img src="<?=asset_path_web()?>/img/modal/modal-02.png" alt="img">
                    </div>  
                    <!--// Modal Image-->
                    <div class="address-area">
                        <div class="address-content">
                            <h4 class="heading-04 padding-10">Visiting Hours</h4>
                            <ul>
                                <li class="items"><span class="days">Monday - Friday</span> <span class="timing">2 PM to 4 PM</span> </li>
                                <li class="items"><span class="days">Saturday</span> <span class="timing">1 PM to 4 PM</span> </li>
                                <li class="items"><span class="days">Sunday</span> <span class="timing">3 PM to 4 PM</span> </li>
                            </ul>    
                            <h4 class="heading-04 padding-10">Phone Number</h4>
                            <ul>
                                <li class="items"><a href="tel:<?=$site_settings['phoneNumber']?>"><?=$site_settings['phoneNumber']?></a></li>
                                <li class="items"><a href="tel:<?=$site_settings['phoneNumber2']?>"><?=$site_settings['phoneNumber2']?></a></li>
                            </ul>
                        </div>                              
                    </div>
                    <!--// Modal Address Area-->
                </div>
            </div>
            <div class="location-popup">
                <div class="close-popup">×
                    <!-- <i class="fas fa-times"></i> -->
                </div>
                <div class="row">
                    <div id="google-map2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.1899657893728!2d90.42380431666383!3d23.779746865573756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7499f257eab%3A0xe6b4b9eacea70f4a!2sManama+Tower!5e0!3m2!1sen!2sbd!4v1561542597668!5m2!1sen!2sbd"  style="border:0" allowfullscreen></iframe>
                    </div>  
                    <div class="address-area">
                        <div class="address-content">
                            <h4>Address</h4>
                            <p class="padding-30"><?=$site_settings['siteAddress']?></p>
                            <div class="main-btn-wrap-2 modal-btn">
                                <a href="#" class="main-btn">Get Direction</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-popup">
                <div class="close-popup">×
                    <!-- <i class="fas fa-times"></i> -->
                </div>
                <div class="row">
                    <!--Appointment Section Start Here-->
                    <div class="appointment-section style-02">
                        <div class="container">
                            <div class="row">                
                                <div class="col-lg-12 col-md-12">                                 
                                    <!--// Appoing Title End Here-->
                                    <?php $this->load->view('appointment_form'); ?>
                                </div>                    
                            </div>
                        </div>
                    </div>
                    <!--Appointment Section End Here-->
                </div>
            </div>
            <div class="form-popupnew">
                <div class="close-popup">×
                    <!-- <i class="fas fa-times"></i> -->
                </div>
                <div class="row">
                    <!--Appointment Section Start Here-->
                   <?php $this->load->view('read_more'); ?>
                    <!--Appointment Section End Here-->
                </div>
            </div>
        </div>
    </div>
    <!--// Side Form Popup End Here-->
 
    <!--Header Start Here-->
 <!--Header Start Here-->
    <header>
        <div class="header-top-area grey-bg">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center">
                        <div class="header-info padding-thirty-left">
                            <span class=" "> Call Us For 24x7 Emergency Services</span>
                            <span class="header-ph "><i class="icon flaticon-phone-call"> </i><a href="tel:<?=$site_settings['phoneNumber']?>"><?=$site_settings['phoneNumber']?></a></span>
                            <span class="header-en "><i class="far fa-envelope-open"></i> <a href="mailto:<?=$site_settings['siteEmail']?>" class=" "><?=$site_settings['siteEmail']?></a></span>
                        </div>
                    </div>
                   
                </div>
            </div> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="width-17 margin-thirty-left padding-5px-top cb"><i class="fa fa-ambulance"></i>  24x7 Emergency Services
                    </div>
                    <div class="width-11 padding-5px-top cb"><i class="icon flaticon-phone-call"> </i> <a href="tel:<?=$site_settings['phoneNumber']?>"><?=$site_settings['phoneNumber']?></a></div>
                    <div class="width-15 cb padding-5px-top"><i class="far fa-envelope-open"></i>  <a href="mailto:<?=$site_settings['siteEmail']?>" class=" "><?=$site_settings['siteEmail']?></a>
                    </div>
                    <a href="#" id="open-form-popup"  class="width-17 cb req_apo"> 
                        <div >
                            <i class="fa fa-calendar"></i>  Request an Appointment 
                        </div>
                    </a> 
                </div>
            </div>
        </div>

        <div class="container-fluid">
          <div class="row">   
            <div class="header-area">          
                <div class="logo-area">
                    <a href="index-2.php">
                        <img src="<?=asset_path_web()?>/img/logo-2.png" alt="Nav Logo">
                    </a>
                </div>
                <nav class="navbar navbar-area navbar-expand-lg">
                    <div class="container nav-container margin-10px-top">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fortis_main_menu" 
                            aria-expanded="false" aria-label="Toggle navigation">
                            <!-- <span class="navbar-toggler-icon"> </span> -->
                            <span class="cross-menu">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span> 
                            </span>    
                        </button>
                        <div class="collapse navbar-collapse" id="fortis_main_menu">
                            <ul class="navbar-nav mega_menu">
                                <li><a href="<?=base_url('')?>">Home</a></li>
                                <li><a href="<?=base_url('about-us')?>">About Us</a></li>
                                                            
                                <li class="menu-item-has-children">
                                    <a href="<?=base_url('patient-care')?>">Patient Care</a>
                                    <ul class="sub-menu width-400px">
                                        <div class="f-left padding-10px-lr" > 
                                        <li><a href="<?=base_url('patient-care/1')?>">Emergency Services </a></li>
                                        <li><a href="<?=base_url('patient-care/find-a-doctor')?>">Find a Doctor</a></li>
                                        <li><a href="<?=base_url('patient-care/2')?>">Test & Scans</a></li>
                                        <li><a href="<?=base_url('patient-care/3')?>">Health checkups</a></li>                  </div>

                                       <div class="padding-10px-lr">   <li><a href="<?=base_url('patient-care/4')?>">Patient stories</a></li>
                                        <li><a href="<?=base_url('patient-care/5')?>">ICU</a></li>
                                        <li><a href="<?=base_url('patient-care/6')?>">Pharmacy</a></li>
                                        <li><a href="<?=base_url('patient-care/7')?>">Nursing Care</a></li>
                                        </div>                                           
                                    </ul> 
                                </li> 
                          
                                <li class="menu-item-has-children">
                                    <a href="<?=base_url('department')?>">Department</a>
                                        <ul class="sub-menu width-1000px"> 
                                            <?php foreach ($departments_menu as $key => $department) { ?>  
                                            <li class="width-33 sm-width-100 float-left"><a href="<?=base_url('department/')?><?=$department['slug']?>"> 
                                                <img class="width_auto" height="25px" src="<?=base_url('uploads/departments/').$department['image']?>" alt="img">&nbsp; <?=$department['title']?> </a>
                                            </li> 
                                            <?php } ?>                                            
                                        </ul>
                                </li>

                                <li><a href="<?=base_url('news-and-events')?>">News & Events</a></li>
                                <li><a href="<?=base_url('career')?>">Career</a></li>
                                <li><a href="<?=base_url('blog')?>">Blog</a></li>
                                <li><a href="<?=base_url('contact-us')?>">contact</a></li>              
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--Navbar area end here-->
               
                <!--Search area end here-->  
                <div class="header-bg"></div>    
            </div>                  
          </div>
        </div>
    </header>    
    <!--Header Area End Here-->  
    <!--Header Area End Here-->

