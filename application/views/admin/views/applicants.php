    <?php include(APPPATH . 'views/admin/common/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

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
                        <?php include(APPPATH . 'views/admin/applicants/list.php'); ?>
                        <!-- =============================================================================================== -->
                    </div>
                </div>
            </div>
        </div>
        <?php include(APPPATH . 'views/admin/common/footer.php'); ?>


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


    </body>

    </html>