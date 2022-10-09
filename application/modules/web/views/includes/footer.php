

    <!-- footer area start -->

    <footer class="footer-area bg_f">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget widget logo-widget">
                            <a href="<?=base_url('')?>">
                                <img src="<?=asset_path_web()?>/img/logo-2.png" alt="Nav Logo"> </a>     
<p class="width-80">Vijaya Hospital was established at Kottarakkara on 8th May 1998. Ever since its inception in 1998, Vijaya hospital has bought a refreshing change in the healthcare sector.</p>
                                                  
                
                            <div class="footer-social-icon">
                                <a class="icon" href="<?=$site_settings['facebook']?>" target="_blank"><i class="fab fa-facebook-f"></i></a>    
                                <a class="icon" href="<?=$site_settings['instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a>    
                                <!-- <a class="icon" href="<?=$site_settings['twitter']?>" target="_blank"><i class="fab fa-twitter"></i></a>  -->   
                                <a class="icon" href="<?=$site_settings['linkedin']?>" target="_blank"><i class="fab fa-youtube"></i></a>
                                <!-- <a class="icon" href="<?=$site_settings['linkedin']?>" target="_blank"><i class="fab fa-whatsapp"></i></a> -->
                            </div>      
                        </div>        
                    </div>

                    <div class="col-lg-3 col-md-6">      
                        <div class="footer-widget widget widget_nav_menu">
                            <h4 class="widget-title">Contact Us</h4>
                            <ul>                                
                                <li>
                                    <span class="foot_tit">Address </span>
                                    </span style=" color: #000;"><?=$site_settings['siteAddress']?> 
                                </li> 
                                <li>                                   
                                    <span class="foot_tit">Phone </span>
                                    </span>
                                        <a style="color:#000" href="tel:<?=$site_settings['phoneNumber']?>"><?=$site_settings['phoneNumber']?></a>
                                </li>                                
                                <li>
                                    <span class="foot_tit">E-mail</span>
                                   <a style="color:#000" href="mailto:<?=$site_settings['siteEmail']?>" class=" "><?=$site_settings['siteEmail']?></a>
                                </li>
                            </ul>        
                        </div>              
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget widget widget_nav_menu"> 
                            <h4 class="widget-title">Department</h4>      
                             <ul>
                                <?php 
                                if(isset($departments_menu)&&!empty($departments_menu)){
                                foreach ($departments_menu as $key => $dep) {
                                    if($key<4){ 
                                 ?>

                                <li><a href="<?=base_url('department/').$dep['slug']?>"><?=$dep['title']?></a></li>

                                <?php }}}?>

                                 <!-- <li><a href="#">documentation </a></li>

                                 <li><a href="#">FAQs </a></li>

                                 <li><a href="#"> Conditions</a></li> -->
                             </ul>
                         </div>
                     </div>
                    <div class="col-lg-2 col-md-6">
<div class="footer-widget widget widget_nav_menu"> 
                            <h4 class="widget-title">Patient Care</h4>      
                             <ul>
                               
                                <li><a href="<?=base_url('patient-care/1')?>">Emergency Services </a></li>

                                        <li><a href="<?=base_url('patient-care/find-a-doctor')?>">Find a Doctor</a></li>

                                        <li><a href="<?=base_url('patient-care/2')?>">Test & Scans</a></li>

                                        <li><a href="<?=base_url('patient-care/3')?>">Health checkups</a></li>
 <li><a href="<?=base_url('patient-care/6')?>">Pharmacy</a></li>

                                        <li><a href="<?=base_url('patient-care/7')?>">Nursing Care</a></li>

                                        <li><a href="<?=base_url('blog')?>">Patient Stories</a></li>

                                                          </div>
                             </ul>
                         </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-area-inner">
                            &copy;  Copyright  2020 Vijaya Hospital.<br class=" div-only-mobile"> Developed by  
                            <a href="https://codefacetech.com/" target="_blank">Codeface Technologies</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer area end -->
    <!-- back to top area start -->

    <div class="back-to-top">

        <span class="back-top"><i class="flaticon-up-arrow"></i></span>

    </div>

    <!-- back to top area end -->



<?php $this->load->view('includes/footer_asset'); ?>

 

    </body>

    </html>
<script type="text/javascript">

    $(document).ready(function() {
      // $("#appointment_department").select2();
      // $(".doctors_select").select2(); 
    });

</script>
<script type="text/javascript">

    $(document).ready(function() { 
      $(".appointment_date").datepicker({
        startDate:'-0m', 
      });
    });

</script>
 <script type="text/javascript">
       
var AppointmentForm = function ($) { 
   var site_url = "<?=base_url()?>";
   $('#selected_department').val('');
   $('#selected_doctor').val('');
   var selectDocs = function() {
        $('body').on('change', '#appointment_department', function () {
            var id  = $(this).val();  
             $.ajax({
                type: "POST",
                url:site_url+ '/web/searchDocsByDepartment',
                data: {id:id},
                success: function(res) {   
                     $('.doctors_select').html(res);
                    },
                error: function() {
                   
                }
            });                  
        });
        $('body').on('click', '.doc_appointment',function(){
            var docId = $(this).data('doctor-id');
            var docName = $(this).data('doctor-title');
            var deptIds = $(this).data('department-ids');
            var docImage = $(this).data('doctor-image');
            $('#selected_doctor').val(docId);
            $('#selected_department').val(deptIds);
              $.ajax({
                type: "POST",
                url:site_url+ '/web/searchDepartments',
                data: {deptIds:deptIds},
                success: function(res) {   
                      $('#appointment_department').html(res);
                },
                error: function() {
                   
                }
            });    
            $('.doctors_select').html('<option value="'+docId+'" selected>'+docName+'</option>');
           
            $('#appointment_doc_image').attr('src',site_url+'/uploads/doctor/'+docImage);
          
            
        });
        $('body').on('change', '.doctors_select',function(){
            var docImg = $(this).children("option:selected").data('doc-image');
            $('#appointment_doc_image').attr('src',site_url+'/uploads/doctor/'+docImg);
            
        });
         $('body').on('click', '#open-form-popupnew',function(){
            var docImg = $(this).data('doctor-image');
            var docDesignation = $(this).data('doctor-designation');
            var docDescription = $(this).data('doctor-description');
            var docDescription1 = $(this).data('doctor-description1');
            var docTitle = $(this).data('doctor-title');
            var consutant = $(this).data('doctor-consultant');
            console.log(consutant);
           $('.doctor-read-more-image').attr('src',site_url+'/uploads/doctor/'+docImg);
           $('.doctor-read-more-designation').html(docDesignation);
           $('.doctor-read-more-description').html(docDescription);
           $('.doctor-read-more-description1').html(docDescription1);
           $('.doctor-read-more-consultant').html(consutant);
           $('.doctor-read-more-title').html(docTitle);
            
        });
        $('body').on('click', '.makeAppointment', function (e) {
                e.preventDefault();
                var name = $('#appointment_name').val();
                var email = $('#appointment_mail').val();
                var mobile = $('#appointment_mobile').val();
                var department = $('#appointment_department').val();
                var gender = $('#appointment_gender').val();
                var appointment_date = $('.appointment_date').val();
                var doctor = $('.doctors_select').val();
                var flag= 0;
                if($("#appointment_name").val() == ''){
                    $("#appointment_name").css('border','1px solid red');
                    flag = 1;
                }else{
                    $("#appointment_name").css('border','');
                }
                if($("#appointment_mobile").val() == ''){
                    $("#appointment_mobile").css('border','1px solid red');
                    flag = 1;
                }else{
                    $("#appointment_mobile").css('border','');
                }
                 if($("#appointment_department").val() == ''){
                    $("#appointment_department").css('border','1px solid red');
                    flag = 1;
                }else{
                    $("#appointment_department").css('border','');
                }
                if($("#appointment_gender").val() == ''){
                    $("#appointment_gender").css('border','1px solid red');
                    flag = 1;
                }else{
                    $("#appointment_gender").css('border','');
                }
                if($(".appointment_date").val() == ''){
                    $(".appointment_date").css('border','1px solid red');
                    flag = 1;
                }else{
                    $(".appointment_date").css('border','');
                }
                if($(".doctors_select").val() == ''){
                    $(".doctors_select").css('border','1px solid red');
                    flag = 1;
                }else{
                    $(".doctors_select").css('border','');
                }
                if($("#appointment_mail").val() == ''){
                    $("#appointment_mail").css('border','1px solid red');
                    flag = 1;
                }
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
                var email = $("#appointment_mail" ).val(); 
                if(!regex.test(email)){
                    $("#appointment_mail").css('border-color','red');
                     flag  = 1;
                }else{
                    $("#appointment_mail").css('border-color','');
                    
                }  
                if(flag == 1) {
                    $('.message').html('<div class="alert alert-danger" role="alert">Please Check! All fields are required.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                    return false;
                }else{
                    $.ajax({
                        type: "POST",
                        url:site_url+ '/web/book',
                        data: {name:name,email:email,department:department,gender:gender,appointment_date:appointment_date,mobile:mobile,doctor:doctor},
                        success: function(res) {  
                              res = JSON.parse(res);
                              $('.message').html(res.msg);
                              $('.appointment-form')[0].reset();
                        },
                        error: function() {
                           
                        }
                    });  
                }           
        });
        $('body').on('click','.submit_news',function(e){
            e.preventDefault();
            if($("input[name='emailid']" ).val() == ''){
                $("input[name='emailid']").css('border-color','red');
                return false;
            }else{
                var email = $("input[name='emailid']" ).val() ;
                    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                    var v= expr.test(email);
                    if(v == false) {
                        $("input[name='emailid']").css('border-color', 'red');
                        return false;
                    } 
            }
            var  values = $('#form_news').serializeArray();
            $('.submit_news').attr('disabled',true);
            $('.submit_news').html('<span class="fa fa-spinner"></span> Loading..');
            $.ajax({
                type: "POST",
                url:site_url + 'web/subscription',
                data: {values:values},
                success: function(data) {
                    $('#form_news')[0].reset();
                    $('.msgs').html(data);
                    $('.submit_news').html('Subscribe');
                    $('.submit_news').attr('disabled',false); 
                },
                error: function() {
                }
            });
          
            
        });
        $('body').on('click','.resume_btn',function(e){
            var career_id = $(this).data('job-id');
            $('#career_id').val(career_id);
        });

        $('body').on('click','.career-form-btn',function(e){
            e.preventDefault();
            var cflag = true;
            if($("#resume_name").val() == ''){
                $("#resume_name").css('border','1px solid red');
                cflag = false;
            }else{
                $("#resume_name").css('border','');
            }
            if($("#resume_email" ).val() == ''){
                $("#resume_email").css('border','1px solid red');               
                cflag = false;
            } 
            else{
                $("#resume_email").css('border-color',''); 
            }  
            if($("#resume_mobile" ).val() == ''){
                $("#resume_mobile").css('border','1px solid red');               
                cflag = false;
            } 
            else{
                $("#resume_mobile").css('border-color',''); 
            }   
            if($("#fileToUpload" ).val() == ''){
                $("#fileToUpload").css('border','1px solid red');               
                cflag = false;
            } 
            else{
                $("#fileToUpload").css('border-color',''); 
            }
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
            var cemail = $("#resume_email" ).val(); 
            if(!regex.test(cemail)){
                $("#resume_email").css('border','1px solid red');
                 flag  = 1;
            }else{
                $("#resume_email").css('border','');
                
            } 
            if(cflag == false){
                $('.msgsresume').html('<div class="alert alert-danger" role="alert">Please fill the required fields.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            }else{
                $('.career-form-btn').attr('disabled',true);
                $('.career-form-btn').html('<span class="fa fa-spinner"></span> Loading..');
               setTimeout(function(){
                    $('#career-form').submit();
                }, 3000);
            }

            
        });
         
   }
return {
    init : function () {      
        selectDocs();
       }
   }
}(jQuery)
</script>
<script type="text/javascript">
     AppointmentForm.init(); 
</script>
 
<script> 
$(".phoneNumber").keypress(function(e){
    var keyCode = e.which;

    if (!(keyCode >= 48 && keyCode <= 57))
    {
      e.preventDefault();
    }
  });
</script>
 

 