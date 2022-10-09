<?php  
         $weekdetail = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

        foreach ($doctors as $key => $doctor) { $finalRsult ="";?> 

<div class="col-md-4 margin-30px-top">

    <div class="blog-post-single-item bg_gray border-radius-10 ">

        <div class="thumb text-center doc_imgbox">

            <img class="width-100" src="<?=base_url('uploads/doctor/').$doctor['image']?>">

        </div>

        <div class="content margin-five-top">

            <h3 class="title padding-ten-lr">

                <a href="#"><?=$doctor['title']?></a>

            </h3>
            
            <ul class="post-meta doc" >

                <li><?=$doctor['description']?> </li>

            </ul>

            <ul class="post-meta doc" >
                
                <li><?=$doctor['designation']?> </li>

            </ul>

            <?php 
             $consultant = $doctor["consulting_time"];
             $order   = array("\"","[", "]");
             $replace = array("","","");
             $strResult = str_replace($order, $replace, $consultant);
             $resultrray = explode(",", $strResult);
             foreach ($resultrray as $key => $time){
                if(isset($time) && !empty($time)){
                    $finalRsult  = $finalRsult.'<br/><span>'.$weekdetail[$key].'</span> : &nbsp;'.$time;
                }
             }
            ?>

            <p class="padding-ten-lr padding-five-top padding-ten-bottom"><?=substr($doctor['description1'], 0,0)?>  <a id="open-form-popupnew" href="#" style="color:#ab1c1c!important; "

                data-doctor-id="<?=$doctor['id']?>" 

                data-doctor-title="<?=$doctor['title']?>"                                 

                data-doctor-designation="<?=$doctor['description']?>" 
                 data-doctor-description="<?=$doctor['designation']?>"

                data-doctor-image="<?=$doctor['image']?>"
                data-doctor-description1="<?=$doctor['description1']?>"
                data-doctor-consultant = '<?=$finalRsult ?>'

                >Read More</a>&nbsp; | &nbsp;  <a id="open-form-popup" 

                class="doc_appointment"

                data-doctor-id="<?=$doctor['id']?>"

                data-doctor-title="<?=$doctor['title']?>"                                 

                data-department-ids="<?=$doctor['departments']?>"

                data-doctor-image="<?=$doctor['image']?>"

                href="#" style="color:#ab1c1c!important; ">Make an appointment</a> </p>

        </div>

    </div>

</div>

<?php } ?>