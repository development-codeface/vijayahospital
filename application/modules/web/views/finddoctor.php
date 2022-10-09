 <?php $this->load->view('includes/header'); ?>
 <style type="text/css"> 
    .select2-selection{
        border: #f58a2f 1px solid  !important;
        border-radius: 25px !important;
        background-color: #f0fafb  !important; 
        height: 51px  !important;   
        text-align: center;     
        padding: 10px 0 0 5px !important;   
        margin-right: 20px;
    } 
    .select2-selection__arrow > b{
             margin: 10px 5px 0 5px !important; 

    }
    .select2-results{
        border-color: #f58a2f !important;
    }
 </style>
    <!--Main Area Start Here-->
    <main>   

        <!--Breadcrumb Section Start Here-->
        <!-- <section class="breadcrumb-area padding-90" style="background-image: url(<?=asset_path_web()?>/img/bg/breadcrumb-bg.png)">
            <div class="container-fluid">        
                <div class="row">
                    <div class="breadcrumb-content">
                        <div class="col-12 px-0">
                            <div class="page-title">
                                <h1 class="heading-1">Find a Doctor</h1>
                            </div>
                        </div>
                        <ul class="page-list">
                            <li><a href="index-2.html">Home</a></li>
                            <li>Find a Doctor</li>
                        </ul> 
                    </div>

                </div>       
            </div>
        </section> -->
        <section class="breadcrumb-area padding-90" style="background-image: url(<?=asset_path_web()?>/img/bg/breadcrumb-bg.png)">
                <div class="container-fluid">
                    <div class="row">
                        <div class="breadcrumb-content">
                            <div class="col-12 px-0">
                                <div class="page-title">
                                    <h1 class="heading-1">Find a Doctor</h1>
                                </div>
                            </div>
                            <ul class="page-list">
                                <li><a href="<?=base_url('')?>">Home</a></li>
                                <li>Find a Doctor</li>
                            </ul>
                        </div>
                    </div>
                    <form>
                        <div class="row padding-30px-top">
                            <div class="col-lg-3 col-sm-12 no-padding-left findsz">
                                 <select class="form-control" id="departments" style="border: #f58a2f 1px solid;border-radius: 25px;background-color: #f0fafb; height: 51px;">
                                  <option value="">-Select/Search Department-</option>
                                  <?php foreach ($departments as $key => $dept) { ?>
                                    <option value="<?=$dept['id']?>"><?=$dept['title']?></option>
                                   <?php } ?>
                                  
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-12 findsz">
                                <select class="form-control" style="border: #f58a2f 1px solid;border-radius: 25px;background-color: #f0fafb; height: 51px;"  id="doctors_select" >
                                  <option value="">-Select/Search Doctor-</option>                                   
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-12 findsz">
                                <div class="main-btn-wrap style-02">
                                    <input class="main-btn searchButton" type="submit" value="Find Now">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        <!--Breadcrumb Section End Here-->

        <!--Help Section Start Here-->
         
        <!--// Help Section End Here-->
 <section class="testimonial-section half-section our-doctor" > 

     <div class="container">
                <div class="row">
        <div class="col-lg-12">
                 <div class="common-title padding-bottom-41">
                    <h2 class="heading">Search Details</h2>
                 </div>
              </div>
          </div></div>
            <div class="container ">
                <div class="row search_result justify-content-center">
                    <?php $this->load->view('includes/doctors'); ?>
 
                                

                </div>
            </div>
            </section>
    

        
     

    </main>
   <?php $this->load->view('includes/footer'); ?>

<script type="text/javascript">
       
var SearchFunctionality = function ($) {
   var site_url = "<?=base_url()?>";
   var searchdoctors = function() {
        $('body').on('change', '#departments', function () {
            var id  = $('#departments').val(); 
             $.ajax({
                type: "POST",
                url:site_url+ '/web/searchDocsByDepartment',
                data: {id:id},
                success: function(res) {  
                     $('#doctors_select').html(res);
                },
                error: function() {
                   
                }
            });
                  
        });
        $('body').on('click', '.searchButton', function (e) {
                e.preventDefault();
                var dept = $('#departments').val();
                var doc = $('#doctors_select').val();
                $.ajax({
                type: "POST",
                url:site_url+ '/web/searchDocs',
                data: {dept:dept,doc:doc},
                success: function(res) {  
                      $('.search_result').html(res);
                       $('html, body').animate({
                            scrollTop: $(".search_result").offset().top
                        }, 1000);
                },
                error: function() {
                   
                }
            });  

        });
   }
return {
    init : function () {      
        searchdoctors();
       }
   }
}(jQuery)
</script>
<script type="text/javascript">
     SearchFunctionality.init(); 
   </script>
 