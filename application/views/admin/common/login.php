<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>FirmAchor | <?php echo $page; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/website/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/css/style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <?php echo validation_errors(); ?>

                    <!-- Form -->
                    <!-- <?php echo form_open('VerifyLogin/index');  ?> -->

                    <form action="VerifyLogin/index" method="POST" class="md-float-material form-material">
                        <!-- <form class="md-float-material form-material"  > -->
                        <div class="text-center">
                            <img src="assets/admin/files/assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Sign In</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required="" placeholder="Your Email Address">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="" placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>


                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <!-- <a href="dashboard" class="text-right f-w-600">Dashboard
                                            </a> -->
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            <a href="forgetpassword" class="text-right f-w-600"> Forgot
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
                                            in</button>
                                    </div>
                                </div>
                                <hr />
                                <p class="f-w-600 text-right"> <a href="register">Sign up</a></p>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="Web/index"><b class="f-w-600">Back
                                                    to website</b></a></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="assets/admin/files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->



    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/admin/files/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/popper/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/admin/files/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/admin/files/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/admin/files/bower_components/chart.js/dist/Chart.js"></script>
    <!-- amchart js -->
    <script src="assets/admin/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="assets/admin/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/admin/files/assets/pages/widget/amchart/light.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/admin/files/assets/js/SmoothScroll.js"></script>
    <script src="assets/admin/files/assets/js/pcoded.min.js"></script>
    <script src="assets/admin/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/admin/files/assets/js/vartical-layout.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/assets/pages/dashboard/analytic-dashboard.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/assets/js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script>
        var type = "<?php echo $this->session->flashdata('alert-type'); ?>";
        switch (type) {
            case 'success':
                toastr.success('<?php echo $this->session->flashdata('message'); ?>', 'success', {
                    timeOut: 3000
                });
                break
            case 'info':
                toastr.info('<?php echo $this->session->flashdata('message'); ?>', 'info', {
                    timeOut: 5000
                });
                break;
            case 'info':
                toastr.warning('<?php echo $this->session->flashdata('message'); ?>', 'warning', {
                    timeOut: 5000
                });
                break;
            case 'error':
                toastr.error('<?php echo $this->session->flashdata('message'); ?>', 'error', {
                    timeOut: 5000
                });
                break;
        }
    </script>

</body>


<!-- Mirrored from demo.dashboardpack.com/adminty-html/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2020 16:59:02 GMT -->

</html>