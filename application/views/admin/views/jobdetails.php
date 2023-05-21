    <?php include(APPPATH . 'views/admin/common/header.php'); ?>


    <!-- sweet alert framework -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/css/sweetalert.css"> -->
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>

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
                        <?php include(APPPATH . 'views/admin/jobs/jobdetails.php'); ?>
                        <!-- =============================================================================================== -->
                    </div>
                </div>
            </div>
        </div>








        <!-- Warning Section Starts -->

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

        <!-- sweet alert js -->
        <script type="text/javascript" src="assets/admin/files/assets/js/sweetalert.js"></script>
        <script type="text/javascript" src="assets/admin/files/assets/js/modal.js"></script>
        <!-- sweet alert modal.js intialize js -->
        <!-- modalEffects js nifty modal window effects -->
        <script type="text/javascript" src="assets/admin/files/assets/js/modalEffects.js"></script>
        <script type="text/javascript" src="assets/admin/files/assets/js/classie.js"></script>
        <!-- i18next.min.js -->
        <script type="text/javascript" src="assets/admin/files/bower_components/i18next/i18next.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
        <script src="assets/admin/files/assets/js/pcoded.min.js"></script>
        <script src="assets/admin/files/assets/js/vartical-layout.min.js"></script>
        <script src="assets/admin/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Custom js -->
        <script type="text/javascript" src="assets/admin/files/assets/js/script.js"></script>
        <!-- partial -->
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>


        <!-- Note: The application form uses your saved account details. Please ensure you have verified your phone number and email address before applying for a job. -->
        <script>
            document.getElementById('b5').onclick = function() {
                swal({
                        title: "Apply For Job",
                        text: "Note: The application form uses your saved account details. Please ensure you have verified your phone number and email address before applying for a job.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, Submit',
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            var jobseeker_id = '<?php echo $id; ?>';
                            var job_id = '<?php echo $jobid; ?>';


                            $.ajax({
                                type: 'POST',
                                data: {
                                    jobseeker_id: jobseeker_id,
                                    job_id: job_id
                                },
                                url: '<?php echo site_url('JobsPortal_Controller/applyforjob'); ?>',
                                success: function(result) {

                                    // alert(result);
                                    if (result == 1) {

                                        swal("Submited!", "Your application Has Been Sent successfully.!", "success");


                                    } else if (result == 0) {
                                        swal(
                                            "Cancelled",
                                            "You Have Already Applied For This Job", "error")
                                    } else {

                                        swal(
                                            "Cancelled",
                                            "You Have No CV In The System", "info")
                                    }


                                }
                            });
                            // swal("Submited!", "Your application Has Been Sent successfully.!", "success");
                        } else {
                            swal("Cancelled", "Your application Has Been Cancelled :)", "error");
                        }
                    });
            };
            document.getElementById('b4').onclick = function() {
                swal({
                        title: "Save?",
                        text: "Save Job to Apply Latter",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes, Save it!',
                        closeOnConfirm: false,
                        //closeOnCancel: false
                    },
                    function() {


                        var job_id = $('#job_id').val();



                        $.ajax({
                            type: 'POST',
                            data: {
                                job_id: job_id
                            },
                            url: '<?php echo site_url('JobsPortal_Controller/save_A_Job'); ?>',
                            success: function(result) {

                                var resultt = JSON.parse(result);

                                if (resultt === true) {
                                    swal("Saved!", "Job vacancy saved and can be accessed on save jobs page!", "success");
                                } else {
                                    swal("error!", "Job vacancy Have Already Been Saved By This User!", "error");
                                }
                                // $('.messages').html(result);

                            }
                        });



                    });
            };

            document.getElementById('b6').onclick = function() {
                swal({
                    title: "Sweet!",
                    text: "Here's a custom image.",
                    imageUrl: 'https://i.imgur.com/4NZ6uLY.jpg'
                });
            };
        </script>

    </body>


    </html>