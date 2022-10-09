<div class="appointment-content">  

    <div class="tab-content">                                  

        <div class="appointment-img-area"> 

            <img src="<?=asset_path_web()?>/img/04.png" id="appointment_doc_image" alt="img">          

            <div class="doctor-info">

                <div class="name">

                    <h6 class="heading-06"> <!-- Dr George Abdreas Pompeia --></h6>

                </div>

                <div class="designation">

                    <span><!-- Specialist cardiologue --></span>

                </div>

            </div>  

        </div>

        <div class="appointment-form-area"> 

            <form class="appointment-form">

                <input type="hidden" id="selected_department" name="selected_department"  value="" />

                <input type="hidden" id="selected_doctor" name="selected_doctor" value=""  />

                <div class="message">



                </div>

                <div class="row">

                    <div class="col-lg-6">

                        <input type="text" name="name" id="appointment_name" placeholder="Your Name" class="form-control margin-15">

                        <input type="email" name="email" id="appointment_mail" placeholder="Your Email" class="form-control margin-15">    

                                                               

                            <div class="margin-15">

                                <select name="department" id="appointment_department" class="form-control  ">   

                                    <option value="">-Select Department-</option>

                                    <?php  foreach ($departments_menu as $key => $dept) { ?>

                                    <option value="<?=$dept['id']?>"><?=$dept['title']?></option>

                                    <?php } ?>                                 

                                </select>

                            </div>  

                            <div class="margin-15">            

                                <select name="doctors"  class="form-control doctors_select" >

                                    <option value="">-Select a Doctor-</option>                             

                                </select> 

                            </div>

                    </div>

                    <div class="col-lg-6">

                        <!-- <div class="custom-select margin-15"> -->

                            <select name="gender" id="appointment_gender" class="form-control margin-15">    

                                <option value="">-Your Gender-</option>

                                <option value="Male">Male</option>

                                <option value="Female">Female</option>

                            </select> 

                        <!-- </div>                                                 -->

                       <!--  <div class="calendar-icon margin-15">

                            <span class="calendar">

                                <label for="datepicker">

                                    <input type="text" id="datepicker" class="form-control appointment_date" autocomplete="off" placeholder="Date">

                                </label>                                                

                                </span>

                            <span class="icon"><i class="fas fa-calendar-week"></i></span>

                        </div>    --> 

                          

                        <!-- <div class="custom-select margin-15"> -->

                               <!-- <?php  foreach ($appointment_doctors as $key => $docs) { ?>

                                <option value="<?=$docs['id']?>"><?=$docs['title']?></option>

                                 <?php } ?> -->

                            

                        <!-- </div>   -->

                         <input type="text" name="mobile" id="appointment_mobile" placeholder="Your Mobile Number" class="form-control margin-15 phoneNumber" maxlength="10">  

                          <div class="margin-15"> 

                                    <input type="text" class="form-control appointment_date" data-date-format="dd-mm-yyyy" autocomplete="off" placeholder="Appointement Date">

                        </div> 

                    </div>

                </div>                                          

                <div class="main-btn-wrap style-02">

                    <button class="main-btn makeAppointment">Make Appointment</button>

                </div> 

            </form>

            <!--// Form End-->

        </div>                                         

    </div>                            

</div>