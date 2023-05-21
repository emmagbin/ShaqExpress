
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Firm Anchor</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- favicon
        ============================================ -->        
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <link rel="stylesheet" href="assets/website/loginstyle.css">
          <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
        <!-- Google Fonts
        ============================================ -->     
 <!-- favicon
        ============================================ -->    
        <link rel="shortcut icon" type="image/x-icon" href="assets/website/images/favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google Fonts
        ============================================ -->    
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
        
        <!-- All css files are included here
        ============================================ -->    
        <!-- Bootstrap CSS
        ============================================ -->  
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/website/css/bootstrap.min.css">  
        <!-- <link rel="stylesheet" href="assets/website/css/bootstrap.min.css">  -->
        
        <!-- This core.css file contents all plugins css file
        ============================================ -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/website/css/core.css">
        <!-- <link rel="stylesheet" href="assets/website/css/core.css"> -->
        
        <!-- Theme shortcodes/elements style
        ============================================ -->  
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/website/css/shortcode/shortcodes.css">
        <!-- <link rel="stylesheet" href="assets/website/css/shortcode/shortcodes.css"> -->
        
        <!--  Theme main style
        ============================================ -->  
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/website/style.css">
        <!-- <link rel="stylesheet" href="assets/website/style.css"> -->
        
    <!-- Color CSS
    ============================================ -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/website/css/plugins/color.css">
        <!-- <link rel="stylesheet" href="assets/website/css/plugins/color.css"> -->
        
        <!-- Responsive CSS
        ============================================ -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/website/css/responsive.css">
        <!-- <link rel="stylesheet" href="assets/website/css/responsive.css"> -->
        
        <!-- Modernizr JS -->
        <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- <script src="assets/website/js/vendor/modernizr-2.8.3.min.js"></script>         -->      
        
    </head>  

                
                <!-- End of Header Area -->
                <!--Background Area Start-->
                <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <link rel="stylesheet" href="assets/website/loginstyle.css">
          <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>



                <!--Background Area Start-->
                <!--Breadcrumb Banner Area Start-->
       <div class="breadcrumb-banner-area pt-30 pb-10 bg-3 bg-opacity-dark-blue-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h2 class="text-center text-white uppercase mb-17">Login / REGISTER</h2>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--End of Breadcrumb Banner Area-->
                <!--Start of Account Area-->
                <div class="account-area pt-0 mb-250">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                               <!-- partial:index.partial.html -->
<div class="cotn_principal" style="margin-top:-100px;" >
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
        
        <h2>LOGIN</h2>  
  <p>Enter Your Username, and password to login.</p> 
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>REGISTER</h2>

  
  <p>Provide your correct details, so as to be part of firm anchor consult.</p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">REGISTER</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info"> 
       <div class="cont_img_back_grey">
       <img src="<?php echo base_url();?>assets/website/images/loginImage.jpg" alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="<?php echo base_url();?>assets/website/images/loginImage.jpg" alt="" />
       </div>
<form class="login-form"  method="post" action="VerifyLogin">
 <div class="col-md-12"><br>
                 <?php echo validation_errors(); ?>
              </div>
 <div class="cont_form_login">  

    <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>

     <h2>LOGIN</h2>

     <input type="text" id="username" name="username" placeholder="Email" />
    <input type="password" id="Password" name="password" placeholder="Password" />
    <button class="btn_login" id="btn_login" >LOGIN </button>
  </div>  
   
</form>


   <div class="cont_form_sign_up">
    <a href="#" onclick="ocultar_login_sign_up()" style=" margin:1px!important;" ><i class="material-icons">&#xE5C4;</i></a>
        <h2>REGISTER</h2>




<div class="col-md-12" style="margin-bottom: 20px;" >
   <input type="email" name="email" id="email" placeholder="Email" required="" />

  </div>
  <div class="col-md-12" style="margin-bottom: 20px;" >
    <input type="text" name="firstname" id="firstname" placeholder="First Name" required="" />
  </div>
  <div class="col-md-12" style="margin-bottom: 20px;" >
    <input type="text" name="lastname" id="lastname" placeholder="Last Name" required="" />
  </div>


 <div class="col-md-6" style="margin-bottom: 20px;" >
    <input type="password" name="password" id="password" placeholder="Password" required="" />
  </div>
  <div class="col-md-6" style="margin-bottom: 20px;" >
    <input type="password" name="Confirmpassword" id="Confirmpassword" placeholder="Confirm Password" required="" />
  </div>
<center> <span class="messages" style="color:red; font-family: Verdana; font-size: 11px "></span>  </center>


<button class="btn_sign_up" id="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>


  </div>

    </div>
    
  </div>
 </div>
</div>
<!-- partial -->
  <script  src="assets/website/loginscript.js"></script>

                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Account Area-->
               
              

                <!-- jquery latest version
    ========================================================= --> 
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- <script src="assets/website/js/vendor/jquery-1.12.4.min.js"></script> -->
        
        <!-- Bootstrap framework js
    ========================================================= -->  
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/bootstrap.min.js"></script>   
        <!-- <script src="assets/website/js/bootstrap.min.js"></script> -->
        
        <!-- Owl Carousel js
    ========================================================= -->  
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/owl.carousel.min.js"></script> 
        <!-- <script src="assets/website/js/owl.carousel.min.js"></script> -->
        
        <!-- nivo slider js
    ========================================================= -->     
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/lib/nivo-slider/js/jquery.nivo.slider.js"></script>
    <!-- <script src="assets/website/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script> -->
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/lib/nivo-slider/home.js"></script>
    <!-- <script src="assets/website/lib/nivo-slider/home.js" type="text/javascript"></script> -->
        
        <!-- Js plugins included in this file
    ========================================================= --> 
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/plugins.js"></script>
        <!-- <script src="assets/website/js/plugins.js"></script> -->
        
    <!-- Video Player JS
    ========================================================= -->   
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/jquery.mb.YTPlayer.js"></script>  
        <!-- <script src="assets/website/js/jquery.mb.YTPlayer.js"></script> -->
        
    <!-- AJax Mail JS
    ========================================================= -->   
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/ajax-mail.js"></script>  
        <!-- <script src="assets/website/js/ajax-mail.js"></script> -->
        
    <!-- Mail Chimp JS
    ========================================================= -->     
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/jquery.ajaxchimp.min.js"></script>
        <!-- <script src="assets/website/js/jquery.ajaxchimp.min.js"></script> -->
        
        <!-- Waypoint Js
    ========================================================= --> 
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/waypoints.min.js"></script>
        <!-- <script src="assets/website/js/waypoints.min.js"></script> -->
        
        <!-- Main js file contents all jQuery plugins activation
    ========================================================= --> 
     <script type = 'text/javascript' src = "<?php echo base_url();?>assets/website/js/main.js"></script>  
        <!-- <script src="assets/website/js/main.js"></script> -->

        
        <!-- jquery latest version
        ========================================================= -->   
        <script src="assets/website/js/vendor/jquery-1.12.4.min.js"></script>
        
        <!-- Bootstrap framework js
        ========================================================= -->           
        <script src="assets/website/js/bootstrap.min.js"></script>
        
        <!-- Owl Carousel js
        ========================================================= -->       
        <script src="assets/website/js/owl.carousel.min.js"></script>
        
        <!-- nivo slider js
        ========================================================= -->       
        <script src="assets/website/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="assets/website/lib/nivo-slider/home.js" type="text/javascript"></script>
        
        <!-- Js plugins included in this file
        ========================================================= -->   
        <script src="assets/website/js/plugins.js"></script>
        
        <!-- Video Player JS
        ========================================================= -->           
        <script src="assets/website/js/jquery.mb.YTPlayer.js"></script>
        
        <!-- AJax Mail JS
        ========================================================= -->           
        <script src="assets/website/js/ajax-mail.js"></script>
        
        <!-- Mail Chimp JS
        ========================================================= -->           
        <script src="assets/website/js/jquery.ajaxchimp.min.js"></script>
        
        <!-- Waypoint Js
        ========================================================= -->   
        <script src="assets/website/js/waypoints.min.js"></script>
        
        <!-- Main js file contents all jQuery plugins activation
        ========================================================= -->       
        <script src="assets/website/js/main.js"></script>


        <script type="text/javascript">
    $(document).on('click','#btn_sign_up',function(e) {

      var mail=$('#email').val();
      var firstname=$('#firstname').val();
      var lastname=$('#lastname').val();
      var Password=$('#password').val();
      var Confirmpassword=$('#Confirmpassword').val();
     


      if(mail == "" || mail == null)
      {
       
     $('.messages').html("Please Enter Email");
      }
     else if(firstname == "" || firstname == null)
      {
      $('.messages').html("Please Enter First Name");
      }
     else if(lastname == "" ||lastname == null)
      {
      $('.messages').html("Please Enter Last Name");
      }
     else if(Password == "" || Password == null || Password.length<6)
      {
      $('.messages').html("Please Enter Password && Required length");
      }
     else if(Confirmpassword == "" || Confirmpassword == null  || Confirmpassword.length>6 )
      {
      $('.messages').html("Please Confirm Password && Required length");
      }
     else{

        if(Password!=Confirmpassword)
        {
        $('.messages').html("Password Mismatch");
        }
        else{

         // alert(Password);
                  
          $('.messages').html("");


                          $.ajax({
                    type:'POST',
                      data:{mail:mail,firstname:firstname,lastname:lastname,Password:Password },
                      url:'<?php echo site_url('Signups_Controller/addsignup'); ?>',
                    success:function(result)
                    {
                      $('.messages').html(result);
                    }
                });
              }

          

        }

  



           
              });
        </script>
        
    </body>
</html>