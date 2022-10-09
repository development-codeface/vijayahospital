<div class="appointment-section  style-02">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!--// Appoing Title End Here-->
                <div class="appointment-content">
                    <div class="tab-content">
                        <div class="appointment-form-area " style="width:90%;">
                            <div class="msgsresume"></div>
                            <form id="career-form" action="<?=base_url('web/send_resume')?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" id="resume_name" name="name" placeholder="Your Name" class="form-control margin-15">
                                        <input type="email" id="resume_email" name="email" placeholder="Your Email" class="form-control margin-15">                                         
                                        <input type="hidden" name="career_id" id="career_id" value="" >                                         
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="resume_mobile" maxlength="10" name="mobile" placeholder="Mobile Number" class="form-control margin-15 phoneNumber">
                                        <input class="form-control margin-15 " type="file" placeholder="Upload resume" name="file" id="fileToUpload" >
                                    </div>
                                </div>
                                <div class="main-btn-wrap style-02">
                                    <button type="submit" class="main-btn career-form-btn">Send Resume</button> 
                                </div>
                            </form>
                            <!--// Form End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>