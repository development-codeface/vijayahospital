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
                                <h1 class="heading-1">Get In Touch</h1>
                            </div>
                        </div>
                        <ul class="page-list">
                            <li><a href="<?=base_url('')?>">Home</a></li>
                            <li>Contact</li>
                        </ul> 
                    </div>
                </div>       
            </div>
        </section>
        <!--Breadcrumb Section End Here-->


        <!--Contact Section Start Here-->
        <section class="contact-section padding-100" style="background-image:url(<?=asset_path_web()?>/img/contact/cable-call-communication.png)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-5 offset-md-5">
                        <div class="form-area">
                            <div class="form-top">
                                <div class="common-title">
                                    <h2 class="heading line-left">Contact us</h2>
                                </div>   <div class="row"> 
                                    <div class="col-lg-6 col-sm-12">  
                                <ul>
                                    
                                    <li><span>Address:</span><br><p><?=$site_settings['siteAddress']?></p></li></ul></div>
 <div class="col-lg-6 col-sm-12">  
                                <ul>
                                    <li><span>Email:</span>
                                        <br><p> <a href="mailto:<?=$site_settings['siteEmail']?>" class=" "><?=$site_settings['siteEmail']?></a></p></li>
                                    <li><span>Phone:</span><br><p><a href="tel:<?=$site_settings['phoneNumber']?>"><?=$site_settings['phoneNumber']?></a> </p></li>
                                  
                                </ul></div>
                                </ul></div> </div>
                            </div>
                            <div class="form-bottom padding-top-30">
                                <div class="common-title">
                                    <h2 class="heading line-left">Message us</h2>
                                </div> 
                                <div class="form">
                                    <form name="contact-form" id="contact-form" action="" method="post">
                                       
                                        <div class="msg1" role="alert"></div>
                                        <div class="form-group">
                                            <input type="text" class="attr-contact form-control" placeholder="Name"  name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="attr-contact form-control" placeholder="Email" name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="attr-contact form-control" placeholder="Mobile Number" minlength="10" maxlength="12" name="mobile" id="mobile">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="attr-contact form-control" placeholder="Subject"   name="subject" id="subject">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="attr-contact form-control" placeholder="Message" name="message" id="message"></textarea>
                                        </div>
                                        <div class="main-btn-wrap margin-top-40">
                                   
                                            <button class="main-btn formsubmit" type="submit">Send Message</button>
                                        </div> 
                                    </form>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Section End Here-->


    </main> 

    <?php $this->load->view('includes/footer'); ?>
    <script type="text/javascript">
        $('#mobile').keypress(function(event){ 
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault();
        }});
</script>
<script type="text/javascript">
    $(document).ready(function() {        
        $('body').on('click','.formsubmit',function(e){
                e.preventDefault(); 
                var flag= 0;
                var site_url = "<?=base_url()?>";
                if($("#name").val() == ''){
                    $("#name").css('border','1px solid red');
                    flag = 1;
                }else{
                    $("#name").css('border','');
                }
                if($("#mobile").val() == ''){
                    $("#mobile").css('border','1px solid red');
                    flag = 1;
                }else{
                    $("#mobile").css('border','');
                }
                if($("#message").val() == ''){
                    $("#message").css('border','1px solid red');
                    flag = 1;
                }else{
                    $("#message").css('border','');
                }
                if($("#email").val() == ''){
                    $("#email").css('border','1px solid red');
                    flag = 1;
                }else{
                    var email = $("#email").val() ; 
                    if(IsEmail(email)==false){ 
                        $("#email").css('border','1px solid red');
                        flag = 1;
                    }else{
                        $("#email").css('border','');
                    }
                }
                function IsEmail(email) {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(!regex.test(email)) {
                        return false;
                    }else{
                        return true;
                    }
                }
               if(flag == 1){
                    $('.msg1').html('<div class="alert alert-danger" role="alert">Please fill the required fields.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                    return false;
               }else{
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var mobile =  $("#mobile").val();
                    var subject = $("#subject").val();
                    var message = $("#message").val();               
                     $.ajax({
                        type: "POST",
                        url:site_url + 'contact-us', 
                        data: {name:name,email:email,mobile:mobile,subject:subject,message:message},
                        success: function(res) {
                           res = JSON.parse(res); 
                           $('.msg1').html(res.msg);
                        }
                        
                    });
                }

        });
    });
 
</script>