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
                                <h1 class="heading-1">Gallery</h1>
                            </div>
                        </div>
                        <ul class="page-list">
                            <li><a href="<?=base_url('')?>">Home</a></li>
                            <li>Gallery</li>
                        </ul> 
                    </div>
                </div>       
            </div>
        </section>
        <!--Breadcrumb Section End Here-->

        <!-- <div class="gallery-section"> -->
        <div class="blog-filter-section padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <!-- Filter Button Section Start-->
                      
                        <!--// Filter Button Section End-->
                        
                        <!--Blog Filter Content Start-->

                        <?php if(isset($galleries)&&!empty($galleries)){ ?>
                        <div class="padding-top-50 padding-bottom-20 justify-content-center">
                            <div class="gallery-filter-images">
                                <?php foreach ($galleries as $key => $gallery) { ?>
                                  <div class="col-lg-6 col-sm-12 "> 
                                <div class="gallery-grid gallery-01">
                                    <img  src="<?=base_url('uploads/events/').$gallery['image']?>" alt="img">
                                    <a href="<?=base_url('uploads/events/').$gallery['image']?>" class="plus-icon">
                                        <i class="flaticon-add-plus-button"></i>
                                    </a>
                                    <div class="gallery-content">
                                        <div class="date"><?=date('d M Y',strtotime($gallery['date']))?></div>
                                        <div class="text"><h4 style="color: white"><?=$gallery['title']?></h4></div>
                                        <div class="text"><?=substr($gallery['description'], 0,150)?></div>
                                    </div>
                                </div>  
                                  </div>
                                <?php } ?>                            
                                                           
                            </div>
                        </div>
                        <?php } else{ ?>
                            <div class="alert alert-default text-center" role="alert">
                              <h4 class="alert-heading "><i class="fa fa-exclamation-circle"></i> Sorry Not Found!</h4>
                              <hr>
                              <p class="mb-0 text-center">No Related News and Events Found.</p>
                            </div>
                        <?php } ?> 

                        <!--// Blog Filter Content End-->

                        <!--Blog Pagination Start Here-->
                        <!-- <div class="blog-pagination">
                            <ul class="page-numbers">
                                <li><a class="prev page-numbers" href="#"><i class="flaticon-left-arrow-angle"></i></a></li>
                                <li><a href="#" aria-current="page" class="page-numbers current">01</a></li>
                                <li><a class="page-numbers" href="#">02</a></li>
                                <li><a class="page-numbers" href="#">03</a></li>
                                <li><a class="next page-numbers" href="#"><i class="flaticon-right-arrow-angle"></i></a></li>
                            </ul>
                        </div> -->
                        <!--// Blog Pagination End-->
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->



    </main>
<?php $this->load->view('includes/footer'); ?>
 