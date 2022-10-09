<html lang="en">
    <head>
       
       <?php $this->load->view('includes/header_assets');?>
       </head>
<!--     <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md" oncontextmenu="return false;"> -->
          <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md"  >
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
           <?php $this->load->view('includes/top_header');?>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
             <?php $this->load->view('includes/sidebar');?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                   <div class="page-content">
                    <?php echo $content;?>
                   </div>
                <!-- END CONTENT BODY -->
            </div>
           
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner" style="text-align: center;"> <?=date('Y')?> &copy; Codeface
               
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
            <!-- END FOOTER -->           
            <?php $this->load->view('includes/footer_assets');?>
            
             <!--Popup For ALL!-->
            
          <div class="showPopup"></div>    
    </body>

</html>
