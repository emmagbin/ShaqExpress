 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="description" content="#">
 <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
 <meta name="author" content="#">
 <!-- Favicon icon -->
 <link rel="icon" href="assets/admin/files/assets/images/favicon.ico" type="image/x-icon">
 <!-- Google font-->
 <link href="https://fonts.googleapis.com/css?family=Mada:300,400,500,600,700" rel="stylesheet">
 <!-- Required Fremwork -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/bootstrap/dist/css/bootstrap.min.css">
 <!-- light-box css -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
 <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/lightbox2/dist/css/lightbox.css">
 <!-- Date-time picker css -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
 <!-- Date-range picker css  -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/bootstrap-daterangepicker/daterangepicker.css" />
 <!-- Date-Dropper css -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/bower_components/datedropper/datedropper.min.css" />
 <!-- themify-icons line icon -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/themify-icons/themify-icons.css">
 <!-- ico font -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/icofont/css/icofont.css">
 <!-- feather Awesome -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/icon/feather/css/feather.css">
 <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/pages/social-timeline/timeline.css">
 <!-- Style.css -->
 <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/css/style.css">
 <link rel="stylesheet" type="text/css" href="assets/admin/files/assets/css/jquery.mCustomScrollbar.css">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <style>
     h1 {
         font-size: 20px;
         text-align: center;
         margin: 20px 0 20px;
     }

     h1 small {
         display: block;
         font-size: 15px;
         padding-top: 8px;
         color: gray;
     }

     .avatar-upload {
         position: relative;
         max-width: 205px;
         margin: 50px auto;
     }

     .avatar-upload .avatar-edit {
         position: absolute;
         right: 12px;
         z-index: 1;
         top: 10px;
     }

     .avatar-upload .avatar-edit input {
         display: none;
     }

     .avatar-upload .avatar-edit input+label {
         display: inline-block;
         width: 34px;
         height: 34px;
         margin-bottom: 0;
         border-radius: 100%;
         background: #FFFFFF;
         border: 1px solid transparent;
         box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
         cursor: pointer;
         font-weight: normal;
         transition: all 0.2s ease-in-out;
     }

     .avatar-upload .avatar-edit input+label:hover {
         background: #f1f1f1;
         border-color: #d6d6d6;
     }

     .avatar-upload .avatar-edit input+label:after {
         content: "\f040";
         font-family: 'FontAwesome';
         color: #757575;
         position: absolute;
         top: 10px;
         left: 0;
         right: 0;
         text-align: center;
         margin: auto;
     }

     .avatar-upload .avatar-preview {
         width: 192px;
         height: 192px;
         position: relative;
         border-radius: 100%;
         border: 6px solid #F8F8F8;
         box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
     }

     .avatar-upload .avatar-preview>div {
         width: 100%;
         height: 100%;
         border-radius: 100%;
         background-size: cover;
         background-repeat: no-repeat;
         background-position: center;
     }
 </style>


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


                     <?php if ($role === 'jobseeker') {; ?>
                         <?php include(APPPATH . 'views/admin/profile/profile.php'); ?>
                         }
                     <?php
                        } else { ?>
                         <?php include(APPPATH . 'views/admin/profile/aprofile.php'); ?>
                     <?php } ?>
                     <!-- =============================================================================================== -->
                 </div>
             </div>
         </div>
     </div>



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

     <!-- light-box js -->
     <script type="text/javascript" src="assets/admin/files/bower_components/ekko-lightbox/ekko-lightbox.js"></script>
     <script type="text/javascript" src="assets/admin/files/bower_components/lightbox2/dist/js/lightbox.js"></script>
     <!-- Bootstrap date-time-picker js -->
     <script type="text/javascript" src="assets/admin/files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
     <script type="text/javascript" src="assets/admin/files/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
     <script type="text/javascript" src="assets/admin/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
     <!-- Date-range picker js -->
     <script type="text/javascript" src="assets/admin/files/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
     <!-- Date-dropper js -->
     <script type="text/javascript" src="assets/admin/files/bower_components/datedropper/js/datedropper.min.html"></script>
     <!-- i18next.min.js -->
     <script type="text/javascript" src="assets/admin/files/bower_components/i18next/i18next.min.js"></script>
     <script type="text/javascript" src="assets/admin/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
     <script type="text/javascript" src="assets/admin/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
     <script type="text/javascript" src="assets/admin/files/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
     <!-- Custom js -->
     <script type="text/javascript" src="assets/admin/files/assets/pages/social-timeline/social.js"></script>

     <script src="assets/admin/files/assets/js/pcoded.min.js"></script>
     <script src="assets/admin/files/assets/js/vartical-layout.min.js"></script>
     <script src="assets/admin/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

     <script type="text/javascript">
         $(document).ready(function() {
             $('[data-toggle="tooltip"]').tooltip();
         });
     </script>
     <script type="text/javascript" src="assets/admin/files/assets/js/script.js"></script>



     <script type="text/javascript" src="assets/admin/files/assets/pages/accordion/accordion.js"></script>
     <script>
         function previewFile(input) {
             var file = $("input[type=file]").get(0).files[0];

             if (file) {
                 var reader = new FileReader();

                 reader.onload = function() {
                     $("#previewImg").attr("src", reader.result);
                 }

                 reader.readAsDataURL(file);
             }
         }
     </script>

     <script>
         function readURL(input) {
             if (input.files && input.files[0]) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                     $('#imagePreview').hide();
                     $('#imagePreview').fadeIn(650);
                 }
                 reader.readAsDataURL(input.files[0]);
             }
         }
         $("#imageUpload").change(function() {
             readURL(this);
         });
     </script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



     <script src="assets/toastr.min.js"></script>
     <link rel="stylesheet" href="assets/toastr.min.css">
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
             case 'error':
                 toastr.info('<?php echo $this->session->flashdata('message'); ?>', 'error', {
                     timeOut: 5000
                 });
                 break;
         }
     </script>



 </body>

 </html>