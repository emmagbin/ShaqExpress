<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Adminty | <?php echo $page; ?>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material">
                        <div class="text-center">
                            <img src="assets/admin/files/assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" id="email" class="form-control" required="" placeholder="Your Email Address" required>
                                    <span class="form-bar"></span>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" id="firstname" class="form-control" required="" placeholder="Choose firstname" required>
                                    <span class="form-bar"></span>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" id="lastname" class=" lastname form-control" required="" placeholder="Choose lastname" required>
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <select id="Gender" name="JobType" class="form-control required" required>
                                        <option selected disabled>Select Gender
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>

                                    </select>
                                    <span class="form-bar"></span>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" id="password" class="form-control" required="" placeholder="Password" required>
                                            <span class="form-bar"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" id="Confirmpassword" class="form-control" required="" placeholder="Confirm Password" required>
                                            <span class="form-bar"></span>
                                        </div>
                                    </div>
                                </div>





                                <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" id="termsconditions" required>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept <a href="#">Terms &amp;
                                                        Conditions.</a></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <center> <span class="messages" style="color:red; font-family: Verdana; font-size: 11px "></span> </center><br>
                                        <button type="button" id="btn_sign_up" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign
                                            up now</button>
                                    </div>

                                </div>
                                <hr />
                                <p class="f-w-600 text-right"> Back to <a href="login">Login</a></p>
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
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/admin/files/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/admin/files/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/admin/files/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="assets/admin/files/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="assets/admin/files/assets/js/common-pages.js"></script>

    <script type="text/javascript">
        $(document).on('click', '#btn_sign_up', function(e) {

            // alert('hii');

            var mail = $('#email').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var Password = $('#password').val();


            // alert(Password);
            var Confirmpassword = $('#Confirmpassword').val();
            var Gender = $('#Gender').val();


            if (mail == "" || mail == null) {

                $('.messages').html("Please Enter Email");
            } else if (firstname == "" || firstname == null) {
                $('.messages').html("Please Enter First Name");
            } else if (lastname == "" || lastname == null) {
                $('.messages').html("Please Enter Last Name");
            } else if (Password == "" || Password == null || Password.length < 6) {
                $('.messages').html("Please Enter Password && Required length");
            } else if (Gender == "" || Gender == null) {
                $('.messages').html("Please Enter Gender");
            } else if (Confirmpassword == "" || Confirmpassword == null || Confirmpassword.length < 6) {
                $('.messages').html("Please Confirm Password && Required length");
            } else {

                if (Password != Confirmpassword) {
                    $('.messages').html("Password Mismatch");
                } else {

                    // alert(Password);

                    $('.messages').html("");


                    $.ajax({
                        type: 'POST',
                        data: {
                            mail: mail,
                            firstname: firstname,
                            lastname: lastname,
                            Password: Password,
                            Gender: Gender
                        },
                        url: '<?php echo site_url('Signups_Controller/addsignup'); ?>',
                        success: function(result) {
                            $('.messages').html(result);
                        }
                    });
                }
            }

        });
    </script>
</body>


<!-- Mirrored from demo.dashboardpack.com/adminty-html/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2020 16:59:02 GMT -->

</html>