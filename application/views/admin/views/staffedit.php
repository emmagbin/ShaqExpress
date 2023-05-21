    <?php include(APPPATH . 'views/admin/common/header.php'); ?>
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/icofont/css/icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/feather/css/feather.css">
    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/jquery.steps/demo/css/jquery.steps.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/css/jquery.mCustomScrollbar.css">
    </head>

    <body>
        <?php include(APPPATH . 'views/admin/common/preloader.php'); ?>
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <?php include(APPPATH . 'views/admin/common/topbar.php'); ?>
                <?php include(APPPATH . 'views/admin/common/sidebar_right.php'); ?>
                <?php include(APPPATH . 'views/admin/common/showchat.php'); ?>
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">

                        <?php if ($role === 'Admin' || $role === 'Developer' || $role === 'jobseeker') {; ?>
                            <?php include(APPPATH . 'views/admin/common/sidemenuDefault.php'); ?>
                            }
                        <?php
                        } else { ?>
                            <?php include(APPPATH . 'views/admin/common/sidemenu.php'); ?>
                        <?php } ?>

                        <!--================================= theme body that will be changing =============================-->
                        <?php include(APPPATH . 'views/admin/staff/edit.php'); ?>
                        <!-- =============================================================================================== -->
                    </div>
                </div>
            </div>
        </div>



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
        <!--Forms - Wizard js-->
        <script src="assets/admin/files/bower_components/jquery.cookie/jquery.cookie.js"></script>
        <script src="assets/admin/files/bower_components/jquery.steps/build/jquery.steps.js"></script>
        <script src="assets/admin/files/bower_components/jquery-validation/dist/jquery.validate.js"></script>
        <!-- Validation js -->
        <script src="assets/admin/assets/admin/assets/admin/cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="assets/admin/assets/admin/assets/admin/cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/assets/pages/form-validation/validate.js"></script>
        <!-- Custom js -->
        <script src="assets/admin/files/assets/pages/forms-wizard-validation/form-wizard.js"></script>
        <script src="assets/admin/files/assets/js/pcoded.min.js"></script>
        <script src="assets/admin/files/assets/js/vartical-layout.min.js"></script>
        <script src="assets/admin/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/assets/js/script.js"></script>


    </body>

    </html>