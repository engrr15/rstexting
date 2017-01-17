<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Osborn's automotive</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url() ?>themes/backend/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="<?php echo base_url() ?>themes/backend/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="<?php echo base_url() ?>themes/backend/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>themes/backend/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico"/>
        <link href="<?php echo base_url() ?>webnotification/WebNotifications.js" rel="stylesheet" type="text/css"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-md login" onload="WebNotifications.askForPermission();">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url() ?>themes/backend/assets/admin/layout4/img/111.png" width="200px" alt=""/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?php echo admin_url('login'); ?>" method="post">
                <h3 class="form-title">Sign In</h3>
                <div class="alert alert-danger display-hide" <?php if ($this->session->flashdata('flash_message') != ''):echo 'style="display:block"';
endif; ?>>
                    <button class="close" data-close="alert"></button>
                    <span>
                        <?php
                        if ($msg = $this->session->flashdata('flash_message')) {
                            echo $msg;
                        } else {
                            echo 'username and password required.';
                        }
                        ?> </span>
                </div>
                <div class="form-group <?php if (form_error('username')):echo 'has-error';
                        endif; ?>">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('username'); ?></label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>"/>
<?php if (form_error('username')):echo '<span id="username-error" class="help-block">Username is required.</span>';
endif; ?>
                </div>
                <div class="form-group <?php if (form_error('pwd')):echo 'has-error';
endif; ?>">
                    <label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('password'); ?></label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="pwd"/>
<?php if (form_error('pwd')):echo '<span id="password-error" class="help-block">Password is required.</span>';
endif; ?>
                </div>
                <div class="form-actions">
                        <button type="submit" class="btn btn-success uppercase" name="loginAdmin" value="<?php echo $this->lang->line('Submit'); ?>" >
                            Login <i class="m-icon-swapright m-icon-white"></i>
                        </button>
                        <label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Remember </label>
			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
                
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form id="forgotPasswordForm" class="forget-form">
                <h3>Forget Password ?</h3>
                <div class="alert alert-danger display-hide" id="forgot_error_box">
                    <button class="close" data-close="alert"></button>
                    <span id="forgot_error_msg"> </span>
                </div>
                <div class="alert alert-success" id="S_msg" style="display:none"></div>
                <p>
                    Enter your e-mail address below to reset your password.
                </p>
                <div class="form-group">
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" id="forgot_email"/>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default"> Back </button>
                    <button type="submit" class="btn btn-success uppercase pull-right" name="forgotPassword" value="forgotPassword">
                        Submit 
                    </button>
                </div>
            </form>
            
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
<?php echo date('Y'); ?> &copy; Osborn's automotive.
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/backend/assets/global/plugins/select2/select2.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url() ?>themes/backend/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>themes/backend/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                Login.init();
                Demo.init();
                // init background slide images
                
                $("#forgotPasswordForm").submit(function (event) {
                    event.preventDefault();
                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: '<?php echo admin_url('login/forgot_password') ?>',
                        data: {
                            'email': $("#forgot_email").val(),
                            'forgotPassword':'forgotPassword',
                        },
                        dataType: "json",
                        success: function (res) {
                            if (res.flag == 0) {
                                $("#forgot_error_msg").html(res.message);
                                $("#forgot_error_box").show();
                            } else if (res.flag == 1) {
                                $("#S_msg").html(res.message);
                                $("#forgot_error_box").hide();
                                $("#S_msg").show();
                            }

                        }
                    });
                });
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>