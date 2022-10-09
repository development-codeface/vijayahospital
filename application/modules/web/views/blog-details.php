<?php $this->load->view('includes/header'); ?>
<!--Breadcrumb Section Start Here-->
<section class="breadcrumb-area padding-90" style="background-image: url(<?=asset_path_web()?>/img/bg/breadcrumb-bg.png)">
    <div class="container-fluid">
        <div class="row">
            <div class="breadcrumb-content">
                <div class="col-12 px-0">
                    <div class="page-title">
                        <h1 class="heading-1"><?=$blog['title']?></h1>
                    </div>
                </div>
                <ul class="page-list">
                    <li><a href="<?=base_url('')?>">Home</a></li>
                    <li><a href="<?=base_url('blog')?>">blog</a></li>
                    <li><?=$blog['title']?></li>
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
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <div class="blog-details-items">
                        <div class="content">
                            <h3 class="title"><?=$blog['title']?></h3>
                            <div class="thumb padding-top-15 padding-bottom-25">
                                <?php if($blog['type'] == 'image'){ ?>
                                <img src="<?=base_url('uploads/blog/').$blog['image']?>">
                                <?php }else{
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
                                </div>
                                <?php } ?>
                            </div>
                            <div class="post-meta">
                                <ul class="list-wrap padding-top-10 padding-bottom-20">
                                    <li><i class="icon far fa-calendar-alt"></i> <a href="#"> <?=date('d-M-Y',strtotime($blog['created_at']))?> </a></li>
                                    <!-- 
                                        <li><i class="icon far fa-eye"></i><a href="#"> 150 Viewed</a></li>
                                        <li><i class="icon far fa-comments"></i><a href="#"> 12 Comment</a></li> -->
                                </ul>
                            </div>
                            <p><?=$blog['description']?> </p>
                        </div>
                        <!--// Content-->
                        <!--// Thumbnail-->
                    </div>
                    <!--// Blog Details Item-->
                    <!--// Blog Details Testimonial-->
                </div>
                <!--Blog Details Wrap-->
            </div>
            <div class="col-lg-4">
                <!--Widgets-->
                <div class="widgets-area">
                    <!--// Search Widget-->
                    <div class="widget widget_recent_posts">
                        <h5 class="widget-title">Recent Post</h5>
                        <ul class="recent_post_item">
                            <?php foreach ($blogs as $key => $blog) { ?>
                            <li class="single-recent-post-item">
                                <div class="content">
                                    <span class="time"><i class="icon far fa-calendar-alt"></i><?=date('d-M-Y',strtotime($blog['created_at']))?></span>
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
                    <!--// Recent Post Widget-->
                    <!--// Category Widget-->
                    <div class="widget widget_follow_us">
                        <h5 class="widget-title">Following us</h5>
                        <ul>
                            <li><a class="social-icon" href="https://www.facebook.com/codingeek.net/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="social-icon" href="https://www.instagram.com/codingeeknet" target="_blank"><i class="fab fa-instagram"></i></a>    </li>
                            <li><a class="social-icon" href="https://twitter.com/codingeeknet" target="_blank"><i class="fab fa-twitter"></i></a>   </li>
                            <li><a class="social-icon" href="https://www.linkedin.com/company/codingeek/about" target="_blank"><i class="fab fa-linkedin-in"></i></a> </li>
                        </ul>
                    </div>
                    <!--// Category Widget-->
                    <!--// Archive Widget-->
                    <!--// Instagram Widget-->
                    <!--// Tags Widget-->
                    <div class="add-widget">
                        <img src="<?=asset_path_web()?>/img/blog/add/01.png">
                    </div>
                    <!--// Add Widget-->
                </div>
                <!--// Widgets-->
            </div>
        </div>
    </div>
</div>
<!--// Blog Page Content--> 
<?php $this->load->view('includes/footer'); ?>