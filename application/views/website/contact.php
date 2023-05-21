              <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area pt-94 pb-85 bg-3 bg-opacity-dark-blue-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h2 class="text-center text-white uppercase mb-17">Contact</h2>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center m-0">
                                            <li class="text-white uppercase ml-15 mr-15"><a href="<?php echo base_url('Web/index') ?>">Home</a></li>
                                            <li class="text-white uppercase ml-15 mr-15">Contact</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                <!--Start of Map and Contact Form Area-->
                <div class="map-conact-form-area fix">
                    <!--Start of Google Map-->
                    <div class="google-map-area">
                        <!--  Map Section -->
                        <div id="contacts" class="map-area">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1403.6001970905277!2d-0.1538158325328732!3d5.715893217071453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwNDInNTcuMyJOIDDCsDA5JzEwLjgiVw!5e0!3m2!1sen!2sgh!4v1590698479209!5m2!1sen!2sgh" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    <!--End of Google Map-->
                    <!--Start of Contact Form And info-->
                    <div class="contact-form-and-info">
                        <div class="contact-form white-bg fix pr-125 pl-125 pt-40 pb-35">
                            <form id="contact-form" action="mail.php" method="post">
                                <div class="col-5 pr-6 mb-15">
                                    <label for="name" class="block ml-20">Name</label>
                                    <input type="text" name="name" id="name" class="pl-20" placeholder="Please enter your name">
                                </div>
                                <div class="col-5 pl-6 mb-15">
                                    <label for="email" class="block ml-20">Email</label>
                                    <input type="text" name="email" id="email" class="pl-20" placeholder="Please enter your email">
                                </div>
                                <div class="col-10">
                                    <label for="message" class="block ml-20">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Please enter your message" class="mb-10"></textarea>
                                </div>
                                <div class="col-10 fix">
                                    <button type="submit" class="button submit-btn">SUBMIT</button>
                                </div>
                                <p class="form-messege"></p>
                            </form>
                        </div>
                        <div class="contact-info text-center fix pt-120 pb-115">
                            <div class="single-contact-info">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-email"></i>
                                </div>
                                <div class="single-contact-text mt-18">
                                    <span class="block">firmanchorconsult@gmail.com</span>
                                    <span class="block">admin@firmanchorconsult.com</span>
                                    
                                </div>
                            </div>
                            <div class="single-contact-info">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-phone"></i>
                                </div>
                                <div class="single-contact-text mt-18">
                                     <span class="block">+233 244 939775</span>
                                    <span class="block">+233 242 550316 </span>
                                </div>
                            </div>
                            <div class="single-contact-info">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-pin"></i>
                                </div>
                                <div class="single-contact-text mt-18">
                                   <span class="block">House No. 110 Housing Down,</span>
                                    <span class="block">Adenta, Accra-Ghana</span>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <!--End of Contact Form ANd info-->
                </div>
                <!--End of Map and Contact Form-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSLSFRa0DyBj9VGzT7GM6SFbSMcG0YNBM "></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script>
      function initialize() {
        var mapOptions = {
        zoom: 15,
        scrollwheel: false,
        center: new google.maps.LatLng(23.763494, 90.432226)
        };

        var map = new google.maps.Map(document.getElementById('googleMap'),
          mapOptions);


        var marker = new google.maps.Marker({
        position: map.getCenter(),
        animation:google.maps.Animation.BOUNCE,
        icon: 'images/map-marker.png',
        map: map
        });
                
      }
                
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>