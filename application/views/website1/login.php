  <style>
  *, *:after, *:before {
  box-sizing: border-box;
}

ul, li {
  margin: 0;
  padding: 0;
}
.main-nav {
  width: 70%;
  max-width: 240px;
  margin: 0 auto;
  height: 100%;
  cursor: pointer;
}
.main-nav ul {
  position: absolute;
  width: 100%;
  top: 40%;
  margin: 0;
  padding: 0;
}
.main-nav li {
  list-style: none;
  float: left;
}
.main-nav a {
  display: block;
  height: 50px;
  margin: 0px;
  padding: 2px 25px;
  text-decoration: none;
  border-radius: 30px;
  line-height: 45px;
  color: #FFF;
  -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
}

.main-nav li:nth-child(1) a {
  background: #d83d3d;
  border: 2px solid #fff;
}
.main-nav li:nth-child(1) a:hover {
  background: #fff;
  color: #d83d3d;
}

.main-nav li:nth-child(2) a {
  background: #9e2c2c;
  border: 2px solid #9e2c2c;
}
.main-nav li:nth-child(2) a:hover {
  background: #b13131;
  border: 2px solid #b13131;
}

.user-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgb(244,132,52);
  z-index: 3;
  overflow-y: auto;
  cursor: pointer;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: opacity 0.3s 0, visibility 0 0.3s;
  transition: opacity 0.3s 0, visibility 0 0.3s;
}
.user-modal.is-visible {
  visibility: visible;
  opacity: 1;
  -webkit-transition: opacity 0.3s 0, visibility 0 0;
  transition: opacity 0.3s 0, visibility 0 0;
}
.user-modal.is-visible .user-modal-container {
  -webkit-transform: translateY(0);
  transform: translateY(0);
}

.user-modal-container {
  position: relative;
  width: 90%;
  max-width: 600px;
  background: #FFF;
  margin: 3em auto 4em;
  cursor: auto;
  border-radius: 0.25em;
  -webkit-transform: translateY(-30px);
  transform: translateY(-30px);
  -webkit-transition-property: -webkit-transform;
  transition-property: -webkit-transform;
  transition-property: transform;
  transition-property: transform, -webkit-transform;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.user-modal-container .switcher:after {
  content: "";
  display: table;
  clear: both;
}
.user-modal-container .switcher li {
  width: 50%;
  float: left;
  text-align: center;
  list-style:none;
}
.user-modal-container .switcher li:first-child a {
  border-radius: .25em 0 0 0;
}
.user-modal-container .switcher li:last-child a {
  border-radius: 0 .25em 0 0;
}
.user-modal-container .switcher a {
  display: block;
  width: 100%;
  height: 50px;
  line-height: 50px;
  background: #d2d8d8;
  color: #809191;
  text-decoration: none;
}
.user-modal-container .switcher a.selected {
  background: #FFF;
  color: #505260;
}
@media only screen and (min-width: 600px) {
  .user-modal-container {
    margin: 4em auto;
  }
  .user-modal-container .switcher a {
    height: 70px;
    line-height: 70px;
  }
}

.form {
  padding: 1.4em;
}
.form .fieldset {
  position: relative;
  margin: 1.4em 0;
}
.form .fieldset:first-child {
  margin-top: 0;
}
.form .fieldset:last-child {
  margin-bottom: 0;
}
.form label {
  font-size: 14px;
  font-size: 0.875rem;
}
.form label.image-replace {
  /* replace text with an icon */
  display: inline-block;
  position: absolute;
  left: 15px;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  height: 20px;
  width: 20px;
  overflow: hidden;
  text-indent: 100%;
  white-space: nowrap;
  color: transparent;
  text-shadow: none;
  background-repeat: no-repeat;
  background-position: 50% 0;
}
.form label.username {
  background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-username.svg");
}
.form label.email {
  background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-email.svg");
}
.form label.password {
  background-image: url("https://codyhouse.co/demo/login-signup-modal-window/img/cd-icon-password.svg");
}
.form input {
  margin: 0;
  padding: 0;
  border-radius: 0.25em;
}
.form input.full-width {
  width: 100%;
}
.form input.has-padding {
  padding: 12px 20px 12px 50px;
}
.form input.has-border {
  border: 1px solid #d2d8d8;
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
}
.form input.has-border:focus {
  border-color: #343642;
  box-shadow: 0 0 5px rgba(52, 54, 66, 0.1);
  outline: none;
}
.form input.has-error {
  border: 1px solid #d76666;
}
.form input[type=password] {
  /* space left for the HIDE button */
  padding-right: 65px;
}
.form input[type=submit] {
  padding: 16px 0;
  cursor: pointer;
  background: #F64747;
  color: #FFF;
  font-weight: bold;
  border: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
}
.form input[type=submit]:hover {
  background: #d83d3d;
}
.no-touch .form input[type=submit]:hover, .no-touch .form input[type=submit]:focus {
  background: #d83d3d;
  outline: none;
}
.form .hide-password {
  display: inline-block;
  position: absolute;
  text-decoration: none;
  right: 0;
  top: 0;
  padding: 6px 15px;
  border-left: 1px solid #d2d8d8;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  font-size: 14px;
  font-size: 0.875rem;
  color: #343642;
}
.form .error-message {
  display: inline-block;
  position: absolute;
  left: -5px;
  bottom: -35px;
  background: rgba(215, 102, 102, 0.9);
  padding: .8em;
  z-index: 2;
  color: #FFF;
  font-size: 13px;
  font-size: 0.8125rem;
  border-radius: 0.25em;
  /* prevent click and touch events */
  pointer-events: none;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: opacity 0.2s 0, visibility 0 0.2s;
  transition: opacity 0.2s 0, visibility 0 0.2s;
}
.form .error-message::after {
  /* triangle */
  content: '';
  position: absolute;
  left: 22px;
  bottom: 100%;
  height: 0;
  width: 0;
  border-left: 8px solid transparent;
  border-right: 8px solid transparent;
  border-bottom: 8px solid rgba(215, 102, 102, 0.9);
}
.form .error-message.is-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity 0.2s 0, visibility 0 0;
  transition: opacity 0.2s 0, visibility 0 0;
}
@media only screen and (min-width: 600px) {
  .form {
    padding: 2em;
  }
  .form .fieldset {
    margin: 2em 0;
  }
  .form .fieldset:first-child {
    margin-top: 0;
  }
  .form .fieldset:last-child {
    margin-bottom: 0;
  }
  .form input.has-padding {
    padding: 16px 20px 16px 50px;
  }
  .form input[type=submit] {
    padding: 16px 0;
  }
}

.form-message {
  padding: 1.4em 1.4em 0;
  font-size: 14px;
  font-size: 0.875rem;
  line-height: 1.4;
  text-align: center;
}
@media only screen and (min-width: 600px) {
  .form-message {
    padding: 2em 2em 0;
  }
}

.form-bottom-message {
  position: absolute;
  width: 100%;
  left: 0;
  bottom: -40px;
  text-align: center;
  font-size: 14px;
  font-size: 0.875rem;
}
.form-bottom-message a {
  color: #FFF;
  text-decoration: none;
  border-bottom: 1px solid rgba(255, 255, 255, .0);
  padding: 0 0 0 2px;
  -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
}
.form-bottom-message a:hover {
  -webkit-animation: borderslide-3px .5s;
          animation: borderslide-3px .5s;
  border-bottom: 1px solid rgba(255, 255, 255, 1);
  padding-bottom: 3px;
}

@-webkit-keyframes borderslide-3px {
  0% {
    padding-bottom: 1px;
  }
  50% {
    padding-bottom: 3px;
  }
}

@keyframes borderslide-3px {
  0% {
    padding-bottom: 1px;
  }
  50% {
    padding-bottom: 3px;
  }
}

@-webkit-keyframes borderslide-2px {
  0% {
    padding-bottom: 1px;
  }
  50% {
    padding-bottom: 2px;
  }
}

@keyframes borderslide-2px {
  0% {
    padding-bottom: 1px;
  }
  50% {
    padding-bottom: 2px;
  }
}

.close-form {
  /* form X button on top right */
  display: block;
  position: absolute;
  width: 40px;
  height: 40px;
  right: 0;
  top: -40px;
  background: url("../img/icon-close.svg") no-repeat center center;
  text-indent: 100%;
  white-space: nowrap;
  overflow: hidden;
}
@media only screen and (min-width: 1170px) {
  .close-form {
    display: none;
  }
}

.accept-terms {
  color: #F64747;
  text-decoration: none;
  padding: 0 1px 1px 2px;
  border-bottom: 1px solid rgba(246, 71, 71, .0);
  -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
}

.accept-terms:hover {
  -webkit-animation: borderslide-2px .5s;
          animation: borderslide-2px .5s;
  padding-bottom: 2px;
  border-bottom: 1px solid rgba(246, 71, 71, 1);
}

#login, #signup, #reset-password {
  display: none;
}

#login.is-selected, #signup.is-selected, #reset-password.is-selected {
  display: block;
}
  </style>

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
                                <!--Start of Blog Area-->
               
                     <div class="col-md-8 col-md-offset-2" style="min-height:300px;">


<!-- partial:index.partial.html -->
<nav class="main-nav">

   <div class="col-md-12">
            <center>
              <?php echo strtoupper(validation_errors()) ; ?>
            </center>
              
             </div>

  <ul>
    <li><a class="signin" href="#0">LOG IN</a></li>
    <li><a class="signup" href="#0">REGISTER</a></li>
  </ul>
</nav>

<div class="user-modal">
    <div class="user-modal-container" style="margin-top:210px;" >

      <ul class="switcher">
        <li><a href="#0">LOG IN</a></li>
        <li><a href="#0">REGISTER</a></li>
      </ul>

      <div id="login">
       
          <form class="login-form form"  method="post" action="VerifyLogin">
          <p class="fieldset">
            <label class="image-replace email" for="signin-email">E-mail</label>
            <input class="full-width has-padding has-border" name="username" id="signin-email" type="text" placeholder="E-mail">
            <span class="error-message">An account with this email address does not exist!</span>
          </p>

          <p class="fieldset">
            <label class="image-replace password" for="signin-password">Password</label>
            <input class="full-width has-padding has-border"  name="password" id="signin-password" type="password"  placeholder="Password">
            <a href="#0" class="hide-password">Show</a>
            <span class="error-message">Wrong password! Try again.</span>
          </p>

          <p class="fieldset">
            <input type="checkbox" id="remember-me" checked>
            <label for="remember-me">Remember me</label>
          </p>
           <div class="col-md-12">
            <center>
              <?php echo validation_errors(); ?>
            </center>
              
             </div>
          <p class="fieldset">
           
             <button class="btn_login" value="Login" style="width: 100%;color:white;" id="btn_login" type="submit" >LOGIN </button>
            
          </p>
          
        </form>
        
        <p class="form-bottom-message"><a href="#0">Forgot your password?</a></p>
        <!-- <a href="#0" class="close-form">Close</a> -->
      </div>

      <div id="signup">
        <form class="form">
          <p class="fieldset">
           <label class="image-replace username" for="signup-username">First Name</label>
            <input class="full-width has-padding has-border"  id="firstname"  type="text" placeholder="First Name">
            <span class="error-message">Your username can only contain numeric and alphabetic symbols!</span>
              
          </p>

          <p class="fieldset">
           <label class="image-replace username" for="signup-username">Last Name</label>
            <input class="full-width has-padding has-border" id="lastname" type="text" placeholder="Last Name">
            <span class="error-message">Your username can only contain numeric and alphabetic symbols!</span>
          </p>

         

           <p class="fieldset">
             <label class="image-replace email" for="signup-email">E-mail</label>
            <input class="full-width has-padding has-border" id="email" type="email" placeholder="E-mail">
            <span class="error-message">Enter a valid email address!</span>
          </p>
           <p class="fieldset">
            <label class="image-replace password" for="signup-password">Password</label>
            <input class="full-width has-padding has-border"  id="password" type="password"  placeholder="Password">
            <a href="#0" class="hide-password">Show</a>
            <span class="error-message">Your password has to be at least 6 characters long!</span>
          </p>
           <p class="fieldset">
            <label class="image-replace password" for="signup-password">Password</label>
            <input class="full-width has-padding has-border" id="Confirmpassword"  type="password"  placeholder="Confirm password">
            <a href="#0" class="hide-password">Show</a>
            <span class="error-message">Your password has to be at least 6 characters long!</span>
          </p>
           <p class="fieldset">
            <!-- <label class="image-replace password" for="signup-password">Password</label> -->
           <select  class="full-width has-padding has-border" id="Gender" >
              <option disabled="" selected="" >select Gender</option>
              <option value="Male" >Male</option>
              <option value="Female" >Female</option>
            </select>
            <span class="error-message">Your password has to be at least 6 characters long!</span>
          </p>
          

          <p class="fieldset">
            <input type="checkbox" id="accept-terms">
            <label for="accept-terms">I agree to the <a class="accept-terms" href="#0">Terms</a></label>
          </p>

          <p class="fieldset">
              <center> <span class="messages" style="color:red; font-family: Verdana; font-size: 11px "></span>  </center><br>
            <!-- <input class="full-width has-padding" type="submit" value="Create account"> -->
            <button class="full-width has-padding" id="btn_sign_up"  style="width: 100%;color:white;">REGISTER</button>

          </p>
        </form>

        <!-- <a href="#0" class="cd-close-form">Close</a> -->
      </div>

      <div id="reset-password">
        <p class="form-message">Lost your password? Please enter your email address.</br> You will receive a link to create a new password.</p>

        <form class="form">
          <p class="fieldset">
            <label class="image-replace email" for="reset-email">E-mail</label>
            <input class="full-width has-padding has-border" id="resetemail" type="email" placeholder="E-mail">
            <span class="error-message">An account with this email does not exist!</span>
          </p>

          <p class="fieldset">
             <center> <span class="messagesResetpassword" style="color:red; font-family: Verdana; font-size: 11px "></span>  </center><br>
             <button class="full-width has-padding" value="Reset password" style="width: 100%;color:white;" id="Resetpassword" type="submit" >Reset password </button>
            <!-- <input class="full-width has-padding" type="submit" value="Reset password"> -->
          </p>
        </form>

        <p class="form-bottom-message"><a href="#0">Back to log-in</a></p>
      </div>
      <a href="#0" class="close-form">Close</a>
    </div>
  </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



        <script src="assets/toastr.min.js"></script>
        <link rel="stylesheet" href="assets/toastr.min.css" >
        <script>
            var type="<?php echo $this->session->flashdata('alert-type'); ?>";
            switch(type)
            {
                case 'success':
                    toastr.success('<?php echo $this->session->flashdata('message'); ?>','success',{timeOut: 3000});
                    break
                case 'info':
                    toastr.info('<?php echo $this->session->flashdata('message'); ?>','info',{timeOut: 5000});
                    break;
                case 'error':
                    toastr.info('<?php echo $this->session->flashdata('message'); ?>','error',{timeOut: 5000});
                    break;
            }
        </script>
  <script>
  jQuery(document).ready(function($){
  var $form_modal = $('.user-modal'),
    $form_login = $form_modal.find('#login'),
    $form_signup = $form_modal.find('#signup'),
    $form_forgot_password = $form_modal.find('#reset-password'),
    $form_modal_tab = $('.switcher'),
    $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
    $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
    $forgot_password_link = $form_login.find('.form-bottom-message a'),
    $back_to_login_link = $form_forgot_password.find('.form-bottom-message a'),
    $main_nav = $('.main-nav');

  //open modal
  $main_nav.on('click', function(event){

    if( $(event.target).is($main_nav) ) {
      // on mobile open the submenu
      $(this).children('ul').toggleClass('is-visible');
    } else {
      // on mobile close submenu
      $main_nav.children('ul').removeClass('is-visible');
      //show modal layer
      $form_modal.addClass('is-visible'); 
      //show the selected form
      ( $(event.target).is('.signup') ) ? signup_selected() : login_selected();
    }

  });

  //close modal
  $('.user-modal').on('click', function(event){
    if( $(event.target).is($form_modal) || $(event.target).is('.close-form') ) {
      $form_modal.removeClass('is-visible');
    } 
  });
  //close modal when clicking the esc keyboard button
  $(document).keyup(function(event){
      if(event.which=='27'){
        $form_modal.removeClass('is-visible');
      }
    });

  //switch from a tab to another
  $form_modal_tab.on('click', function(event) {
    event.preventDefault();
    ( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
  });

  //hide or show password
  $('.hide-password').on('click', function(){
    var $this= $(this),
      $password_field = $this.prev('input');
    
    ( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
    ( 'Show' == $this.text() ) ? $this.text('Hide') : $this.text('Show');
    //focus and move cursor to the end of input field
    $password_field.putCursorAtEnd();
  });

  //show forgot-password form 
  $forgot_password_link.on('click', function(event){
    event.preventDefault();
    forgot_password_selected();
  });

  //back to login from the forgot-password form
  $back_to_login_link.on('click', function(event){
    event.preventDefault();
    login_selected();
  });

  function login_selected(){
    $form_login.addClass('is-selected');
    $form_signup.removeClass('is-selected');
    $form_forgot_password.removeClass('is-selected');
    $tab_login.addClass('selected');
    $tab_signup.removeClass('selected');
  }

  function signup_selected(){
    $form_login.removeClass('is-selected');
    $form_signup.addClass('is-selected');
    $form_forgot_password.removeClass('is-selected');
    $tab_login.removeClass('selected');
    $tab_signup.addClass('selected');
  }

  function forgot_password_selected(){
    $form_login.removeClass('is-selected');
    $form_signup.removeClass('is-selected');
    $form_forgot_password.addClass('is-selected');
  }

  //REMOVE THIS - it's just to show error messages 
  $form_login.find('input[type="submit"]').on('click', function(event){
    event.preventDefault();
    $form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
  });
  $form_signup.find('input[type="submit"]').on('click', function(event){
    event.preventDefault();
    $form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
  });


  //IE9 placeholder fallback
  //credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
  if(!Modernizr.input.placeholder){
    $('[placeholder]').focus(function() {
      var input = $(this);
      if (input.val() == input.attr('placeholder')) {
        input.val('');
        }
    }).blur(function() {
      var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
        input.val(input.attr('placeholder'));
        }
    }).blur();
    $('[placeholder]').parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
          input.val('');
        }
        })
    });
  }

});


//credits https://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
  return this.each(function() {
      // If this function exists...
      if (this.setSelectionRange) {
          // ... then use it (Doesn't work in IE)
          // Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
          var len = $(this).val().length * 2;
          this.setSelectionRange(len, len);
      } else {
        // ... otherwise replace the contents with itself
        // (Doesn't work in Google Chrome)
          $(this).val($(this).val());
      }
  });
};
  </script>

              


                                        
                           
                    </div>
                </div>

       
        



  <script >
  AOS.init({
  duration: 1000
});
  </script>

  <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<script type="text/javascript">
    $(document).on('click','#btn_sign_up',function(e) {

      // alert('hii');

      var mail=$('#email').val();
      var firstname=$('#firstname').val();
      var lastname=$('#lastname').val();
      var Password=$('#password').val();

     // alert(Password);
      var Confirmpassword=$('#Confirmpassword').val();
      var Gender=$('#Gender').val();


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
      $('.messages').html("");
      }
     else if(Password == "" || Password == null || Password.length<6)
      {
      $('.messages').html("Please Enter Password && Required length");
      }
     else if(Confirmpassword == "" || Confirmpassword == null  || Confirmpassword.length<6 )
      {
      $('.messages').html("Please Confirm Password && Required length");
      }

      else if(Gender == "" || Gender == null )
      {
      $('.messages').html("Please Enter Gender");
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
                      data:{mail:mail,firstname:firstname,lastname:lastname,Password:Password,Gender:Gender },
                      url:'<?php echo site_url('Signups_Controller/addsignup'); ?>',
                    success:function(result)
                    {
                      $('.messages').html(result);
                    }
                });
              }
        }
           
              });


    $(document).on('click','#Resetpassword',function(e) {
     
      var resetemail=$('#resetemail').val();


  if(resetemail == "" || resetemail == null)
      {
       
     $('.messagesResetpassword').html("Please Enter Email");
      }
     else
      {
          $('.messagesResetpassword').html();
          // alert(resetemail);

                  $.ajax({
                    type:'POST',
                      data:{resetemail:resetemail},
                      url:'<?php echo site_url('admin_controller/Resetpassword'); ?>',
                    success:function(result)
                    {
                      // alert(result);
                     $('.messagesResetpassword').html(result);
                    }
                });
      }


});
    
        </script>
        