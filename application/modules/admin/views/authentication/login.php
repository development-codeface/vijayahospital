<head>
<meta charset="utf-8" />
<title><?=SITE_NAME?> | User Login </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="Preview page of Metronic Admin Theme #2 for " name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?=asset_path_dashboard()?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?=asset_path_dashboard()?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?=asset_path_dashboard()?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=asset_path_dashboard()?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="<?=asset_path_dashboard()?>global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?=asset_path_dashboard()?>global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="<?=asset_path_dashboard()?>common/css/login.min.css" rel="stylesheet" type="text/css" />
<link href="<?=asset_path_dashboard()?>common/css/login.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?=asset_path_dashboard('common/img/favicon.png')?>" />
<link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN : LOGIN PAGE 5-2 -->
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset">
            <img class="login-logo login-6" style="height: 100px" src="<?=asset_path_dashboard()?>/common/img/login/logo.png"/>
            <div class="login-content">
                <h1><strong><?=SITE_NAME?> LOGIN</strong></h1>
                <?php if($this->session->flashdata('error')){?>
                                            <div class="note note-warning">
                                                <h3>Error!</h3>
                                                <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                                           <?php }?>
                <form action="<?=base_url()?>admin" class="login-form" method="post" name="login-form" autocomplete="false">
                    
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>Enter valid username and password. </span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="false" placeholder="Username" name="username" required/> </div>
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="new-password" placeholder="Password" name="password" required/> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-8 text-right">
                            <div class="forgot-password">
                                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                            </div>
                            <button class="btn blue" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>
                <!-- BEGIN FORGOT PASSWORD FORM -->
                <form class="forget-form" action="javascript:;" method="post">
                  
                    <h3>Forgot Password ?</h3>
                     
                      <p class="msg"> Enter your e-mail address below to recover your password. </p>
                    <div class="form-group">
                       <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"  id="email"/> </div>
                    <div class="form-actions">
                        <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
                        <button type="submit" class="btn blue uppercase pull-right forgot_pwd">Submit</button>
                    </div>
                </form>
                <!-- END FORGOT PASSWORD FORM -->
            </div>
           
        </div>
        <div class="col-md-6 bs-reset">
           <div class="login-bg"> </div>
        </div>
    </div>
</div>

<!-- BEGIN CORE PLUGINS -->
<script src="<?=asset_path_dashboard()?>common/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=asset_path_dashboard()?>common/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="<?=asset_path_dashboard()?>common/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=asset_path_dashboard()?>common/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=asset_path_dashboard()?>common/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?=asset_path_dashboard()?>global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="<?=asset_path_dashboard()?>common/scripts/app.min.js" type="text/javascript"></script>
<script>
    var site_url;
    $(function(){
        site_url = '<?=base_url()?>';
    })
</script>
<script src="<?=asset_path_dashboard()?>common/js/login.js" type="text/javascript"></script>
    </body>
</html>