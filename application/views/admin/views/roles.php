<?php include(APPPATH . 'views/admin/common/header.php'); ?>
<link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="assets/admin/files/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">


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
                    <?php include(APPPATH . 'views/admin/roles/list.php'); ?>
                    <!-- =============================================================================================== -->
                </div>
            </div>
        </div>
    </div>








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




    <!-- data-table js -->
    <script src="assets/admin/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/admin/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/admin/files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="assets/admin/files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="assets/admin/files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="assets/admin/files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/admin/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/admin/files/assets/pages/data-table/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/admin/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/admin/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Custom js -->
    <script src="assets/admin/files/assets/pages/data-table/js/data-table-custom.js"></script>



    <!-- Note: The application form uses your saved account details. Please ensure you have verified your phone number and email address before applying for a job. -->
    <script>
        $(document).on('click', '#btnlock', function() {
            $('.txtid').val($(this).data('id'));
            var id = $(this).data('roleid');
            var name = $(this).data('rolename');
            $('.spanname').html(name);
            var systemUser = '<?php echo $id ?>';


            swal({
                    title: "Lock?",
                    text: "lock ".concat(name),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, Lock it!',
                    closeOnConfirm: false,
                    //closeOnCancel: false
                },
                function() {
                    $.ajax({
                        type: 'POST',
                        data: {
                            id: name,
                            systemUser: systemUser
                        },
                        url: '<?php echo site_url('settingsController/disable_role'); ?>',
                        success: function(result) {

                            // alert(result);
                            var myresult = JSON.parse(result);

                            if (myresult === true) {

                                swal({
                                        title: "Locked",
                                        text: "role Have Successfully Been Locked.",
                                        imageUrl: 'https://i.imgur.com/4NZ6uLY.jpg'
                                    },
                                    function() {
                                        location.reload();
                                    }
                                );

                            } else {
                                swal("Locked!", "role Lock Failed", "error");
                            }
                        }
                    });
                });
        });


        $(document).on('click', '#btnunlock', function() {
            $('.txtid').val($(this).data('id'));
            var id = $(this).data('roleid');
            var name = $(this).data('rolename');
            $('.spanname').html(name);
            var systemUser = '<?php echo $id ?>';

            swal({
                    title: "Enable role?",
                    text: "Enable ".concat(name),
                    // text: "Are You Sure?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, Unlock role!',
                    closeOnConfirm: false,
                    //closeOnCancel: false
                },
                function() {
                    $.ajax({
                        type: 'POST',
                        data: {
                            id: name,
                            systemUser: systemUser
                        },
                        url: '<?php echo site_url('settingsController/activate_role'); ?>',
                        success: function(result) {
                            var myresult = JSON.parse(result);
                            // alert(myresult);
                            if (myresult === true) {

                                swal({
                                        title: "Unlocked!",
                                        text: "role Have Successfully Been Unlocked.",
                                        imageUrl: 'https://i.imgur.com/4NZ6uLY.jpg'
                                    },
                                    function() {
                                        location.reload();
                                    }
                                );

                            } else {
                                swal("Locked!", "role Lock Failed", "error");
                            }
                        }
                    });
                });
        });


        $(document).on('click', '#btndelete', function() {
            $('.txtid').val($(this).data('id'));
            var id = $(this).data('roleid');
            var name = $(this).data('rolename');
            var systemUser = '<?php echo $id ?>';



            swal({
                    title: "Delete?",
                    text: "Delete ".concat(name),
                    // text: "Are You Sure",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, Delete role!',
                    closeOnConfirm: false,
                    //closeOnCancel: false
                },
                function() {
                    $.ajax({
                        type: 'POST',
                        data: {
                            id: name,
                            systemUser: systemUser
                        },
                        url: '<?php echo site_url('settingsController/delete_role'); ?>',
                        success: function(result) {
                            // alert(result);
                            var myresult = JSON.parse(result);

                            if (myresult === true) {

                                swal({
                                        title: "Deleted!",
                                        text: "role Have Been Deleted Successfully.",
                                        imageUrl: 'https://i.imgur.com/4NZ6uLY.jpg'
                                    },
                                    function() {
                                        location.reload();
                                    }
                                );

                            } else {
                                swal("Delete!", "Role Delete Failed Role have Users", "error");
                            }
                        }
                    });
                });
        });



        $(document).on('click', '#btReset', function() {
            $('.txtid').val($(this).data('id'));
            var id = $(this).data('roleid');
            var name = $(this).data('rolename');
            var systemUser = '<?php echo $id ?>';

            swal({
                    title: "Reset Password?",
                    text: "Reset Password ".concat(name),
                    // text: "Are You Sure",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, Reset Password!',
                    closeOnConfirm: false,
                    //closeOnCancel: false
                },
                function() {
                    $.ajax({
                        type: 'POST',
                        data: {
                            id: name,
                            systemUser: systemUser
                        },
                        url: '<?php echo site_url('settingsController/delete_jobseeker'); ?>',
                        success: function(result) {
                            var myresult = JSON.parse(result);

                            if (myresult === true) {

                                swal({
                                        title: "Deleted!",
                                        text: "User Password Have Been Reset Successfully.",
                                        imageUrl: 'https://i.imgur.com/4NZ6uLY.jpg'
                                    },
                                    function() {
                                        location.reload();
                                    }
                                );

                            } else {
                                swal("Delete!", "User Password Reset Failed", "error");
                            }
                        }
                    });
                });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">




    <!-- <script src="assets/toastr.min.js"></script>
    <link rel="stylesheet" href="assets/toastr.min.css"> -->
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


</html>