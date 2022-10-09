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
                                <h1 class="heading-1">Career</h1>
                            </div>
                        </div>
                        <ul class="page-list">
                            <li><a href="<?=base_url('')?>">Home</a></li>
                            <li>Career</li>
                        </ul> 
                    </div>
                </div>       
            </div>
        </section>
        <!--Breadcrumb Section End Here-->

        <!--Help Section Start Here-->
        <section class="help-section padding-top-100">
            <div class="col-md-8 offset-md-2">
                <?php if($this->session->flashdata('error')){?>
                    <div class="alert alert-danger">
                        <h3><i class="fa fa-close"></i>  Error!</h3>  <?php  echo $this->session->flashdata('error'); ?>
                    </div>
                    <?php }?>
                    <?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success"><h3><i class="fa fa-check"></i> Success!</h3>  <?php echo $this->session->flashdata('success')?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>
                <?php }?>
            </div>
             
            <div class="container-fluid pl-0">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="image-area">
                            <img src="<?=asset_path_web()?>/img/help-center/chair.png" alt="img">
                        </div>                        
                    </div>
                    <div class="col-lg-4 pl-0">
                        <div class="content-area">
                            <h4 class="heading-04 padding-bottom-10">Career</h4>
                            <div class="common-title">
                                <h2 class="heading line-left"><?=$career_cms['subtitle']?></h2>
                            </div>
                            <div class="padding-top-20 padding-bottom-30">
                                <p><?=$career_cms['description']?></p>  
                            </div>                       
                            <form>
                                
                            </form>                           
                        </div>                    
                    </div>
                </div>
            </div>
        </section>
        <!--// Help Section End Here-->

        <!--Accordion Section Start Here-->
        <section class="accordion-section padding-top-100 padding-five-bottom">           
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                        <div class="common-title padding-bottom-35">
                            <h2 class="heading line-left">Available openings</h2>
                        </div>
                  </div>
                  <?php if(isset($jobs)&&!empty($jobs)){ ?>
                  <div class="col-sm-12">
                        <div class="accordion-wrapper style-03">
                            <div id="accordionOne">
                                <?php foreach ($jobs as $key => $job) { ?>                              
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <a role="button" data-toggle="collapse" data-target="#job<?=$key?>" aria-expanded="<?=(($key == 0)? 'true':'false')?>" aria-controls="collapseOne">
                                           <?=$job['title']?>
                                        </a>
                                        </h5>
                                    </div>                                            
                                    <div id="job<?=$key?>" class="collapse <?=(($key == 0)? 'show':'')?>" aria-labelledby="headingOne" data-parent="#accordionOne">
                                        <div class="card-body">
                                            <p><?=$job['description']?></p>  
                                    <div class="main-btn-wrap padding-top-25">
                                        <input class="main-btn resume_btn" data-job-id="<?=$job['id']?>" id="open-form-popupnew" type="submit" value="Send Resume">
                                    </div> 
                                                                                                 
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                                 
                            </div>
                        </div>
                  </div>
                  <?php } else{ ?>
                     <div class="col-lg-12">
                            <div class="alert alert-default text-center" role="alert">
                              <h4 class="alert-heading "><i class="fa fa-exclamation-circle"></i> Sorry!</h4>
                              <hr>
                              <p class="mb-0 text-center">Currently We Dont Have Any Openings.</p>
                            </div>
                        </div>
                        <?php } ?> 
              
              </div>
          </div>
        </section>
        <!--// Accordion Section End Here-->

        <!--Another Question Section Start Here-->
    
        <!--// Another Question Section End Here-->


    </main>
 <?php $this->load->view('includes/footer'); ?>