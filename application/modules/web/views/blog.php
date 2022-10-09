<?php $this->load->view('includes/header'); ?>
<style type="text/css">
    .page-numbers > li> a{
        font-weight: bold;
        color:orange ; 
        font-family: Helvetica, sans-serif
        font-size: 20px !important;
    }    
</style>
<!--Breadcrumb Section Start Here-->
<section class="breadcrumb-area padding-90" style="background-image: url(<?=asset_path_web()?>/img/bg/breadcrumb-bg.png)">
    <div class="container-fluid">
        <div class="row">
            <div class="breadcrumb-content">
                <div class="col-12 px-0">
                    <div class="page-title">
                        <h1 class="heading-1">Blog</h1>
                    </div>
                </div>
                <ul class="page-list">
                    <li><a href="<?=base_url('')?>">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Breadcrumb Section End Here-->
<!--Blog Page Content-->
<div class="blog-page-content padding-100">
    <div class="container">
        <div class="row">
            <?php if(isset($blogs)&&!empty($blogs)){ ?> 
            <div class="col-lg-8">
                <!--Blog Single Item-->
                <?php foreach ($blogs as $key => $blog) { ?>
                <?php if($blog['type'] == 'image'){ ?>
                <div class="blog-post-single-item">
                    <div class="thumb">
                        <img  src="<?=base_url('uploads/blog/').$blog['image']?>">
                    </div>
                    <div class="content">
                        <ul class="post-meta">
                            <li><a href="#"><i class="icon far fa-calendar-alt"></i> <?=date('d-M-Y',strtotime($blog['created_at']))?> </a></li>
                            <!-- <li><a href="#"><i class="icon far fa-bookmark"></i> Technology </a></li> -->
                        </ul>
                        <h3 class="title padding-top-10">
                            <a href="<?=base_url('blog-details/')?><?=$blog['slug']?>"><?=$blog['title']?></a>
                        </h3>
                        <p class="padding-top-5 padding-bottom-15"><?=$blog['short_description']?></p>
                        <ul class="post-meta two">
                            <li><a href="#"><i class="icon">By</i>Admin</a></li>
                            <!-- 
                                <li><a href="#"><i class="icon far fa-eye"></i>2.6k views</a></li>
                                <li><a href="#"><i class="icon fas fa-share-alt"></i>560 share</a></li> -->
                        </ul>
                    </div>
                </div>
                <?php } else{ ?> <?php  
                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $blog['url'], $match);
                            $youtube_id = $match[1];
                     ?>
                <div class="blog-post-single-item">
                    <div class="thumb">
                        <div class="play-area">
                            <!-- video popup toggler -->  
                            <a href="https://www.youtube.com/watch?v=<?=$youtube_id?>" class="hosted-popup">
                                <div class="play-btn">
                                    <i class="icon flaticon-play-button"></i> 
                                </div>
                            </a>
                        </div>
                        <img  src="https://img.youtube.com/vi/<?=$youtube_id?>/maxresdefault.jpg" alt="img">
                    </div>
                    <div class="content">
                        <ul class="post-meta">
                            <li><a href="#"><i class="icon far fa-calendar-alt"></i> <?=date('d-M-Y',strtotime($blog['created_at']))?> </a></li>
                            <!-- <li><a href="#"><i class="icon far fa-bookmark"></i> Minimal </a></li> -->
                        </ul>
                        <h3 class="title padding-top-10">
                            <a href="<?=base_url('blog-details/')?><?=$blog['slug']?>"><?=$blog['title']?></a>
                        </h3>
                        <p class="padding-top-5 padding-bottom-15"><?=$blog['short_description']?></p>
                        <ul class="post-meta two">
                            <li><a href="#"><i class="icon">By</i>Admin</a></li>
                            <!-- 
                                <li><a href="#"><i class="icon far fa-eye"></i>2.6k views</a></li>
                                <li><a href="#"><i class="icon fas fa-share-alt"></i>560 share</a></li> -->
                        </ul>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <!--// Blog Single Item-->
            </div>
            <div class="col-lg-4">
                <!--Widgets-->
                <div class="widgets-area">
                    <div class="widget widget_recent_posts">
                        <h5 class="widget-title">Recent Post</h5>
                        <ul class="recent_post_item">
                            <?php foreach ($blogs as $key => $blog) { ?>
                            <li class="single-recent-post-item">
                                <div class="content">
                                    <span class="time"><i class="icon far fa-calendar-alt"></i> <?=date('d-M-Y',strtotime($blog['created_at']))?></span>
                                    <h5 class="title"><a href="<?=base_url('blog-details/')?><?=$blog['slug']?>"><?=$blog['title']?></a></h5>
                                </div>
                                <div class="thumb">
                                    <?php if($blog['type'] == 'image'){ ?>
                                    <img src="<?=base_url('uploads/blog/').$blog['image']?>" alt="recent post">
                                    <?php }else{
                                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $blog['url'], $matchn);
                                                           $youtube_id = $matchn[1];
                                        ?>
                                    <img  src="https://img.youtube.com/vi/<?=$youtube_id?>/maxresdefault.jpg" alt="img">
                                    <?php } ?>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!--// Widgets-->
            </div>
            <?php } else{ ?>
             <div class="col-lg-12">
                    <div class="alert alert-default text-center" role="alert">
                      <h4 class="alert-heading "><i class="fa fa-exclamation-circle"></i> Sorry! No Records Found!</h4>
                      <hr>
                      <p class="mb-0 text-center">No Related Blogs Found.</p>
                    </div>
                </div>
            <?php } ?> 
            <div class="blog-pagination">
                <ul class="page-numbers">
                    <?=$links?>
                </ul>
                <!--  <ul class="page-numbers">
                    <li><a class="prev page-numbers" href="#"><i class="flaticon-left-arrow-angle"></i></a></li>
                    <li><a href="#" aria-current="page" class="page-numbers current">01</a></li>
                    <li><a class="page-numbers" href="#">02</a></li>
                    <li><a class="page-numbers" href="#">03</a></li>
                    <li><a class="next page-numbers" href="#"><i class="flaticon-right-arrow-angle"></i></a></li>
                    </ul> -->
            </div>
        </div>
    </div>
</div>
<!--// Blog Page Content-->
<?php $this->load->view('includes/footer'); ?>