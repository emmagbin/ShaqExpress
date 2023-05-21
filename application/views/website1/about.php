   <link rel='stylesheet' href='https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css'>
   <style>
.accordion {
  color: #444;
  cursor: pointer;
 
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: white;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.twPc-div {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #e1e8ed;
    border-radius: 6px;
    height: auto;
    max-width: 50%; // orginal twitter width: 290px;
}
.twPc-bg {
    background-color: rgb(244,132,52);
    background-position: 0 50%;
    background-size: 100% auto;
    border-bottom: 1px solid #e1e8ed;
    border-radius: 4px 4px 0 0;
    height: 95px;
    width: 100%;
}
.twPc-block {
    display: block !important;
}
.twPc-button {
    margin: -35px -10px 0;
    text-align: right;
    width: 100%;
}
.twPc-avatarLink {
    background-color: #fff;
    border-radius: 6px;
    display: inline-block !important;
    float: left;
    margin: -30px 5px 0 8px;
    max-width: 100%;
    padding: 1px;
    vertical-align: bottom;
}
.twPc-avatarImg {
    border: 2px solid #fff;
    border-radius: 7px;
    box-sizing: border-box;
    color: #fff;
    height: 72px;
    width: 72px;
}
.twPc-divUser {
    margin: 5px 0 0;
}
.twPc-divName {
    font-size: 18px;
    font-weight: 700;
    line-height: 21px;
}
.twPc-divName a {
    color: #4fc1f0;
}
.twPc-divStats {
    margin-left: 11px;
    padding: 10px 0;
}
.twPc-Arrange {
    box-sizing: border-box;
    display: table;
    margin: 0;
    min-width: 100%;
    padding: 0;
    table-layout: auto;
}
ul.twPc-Arrange {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.twPc-ArrangeSizeFit {
    display: table-cell;
    padding: 0;
    vertical-align: top;
}
.twPc-ArrangeSizeFit a:hover {
    text-decoration: none;
}
.twPc-StatValue {
    display: block;
    font-size: 18px;
    font-weight: 500;
    transition: color 0.15s ease-in-out 0s;
}
.twPc-StatLabel {
    color: black;
    font-size: 12px;
    letter-spacing: 0.02em;
    overflow: hidden;
    transition: color 0.15s ease-in-out 0s;
}
</style>

 <div class="breadcrumb-banner-area pt-80 pb-85 bg-3 bg-opacity-dark-blue-90" data-aos="zoom-in-up">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h2 class="text-center text-white uppercase mb-17">about company</h2>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center m-0">
                                            <li class="text-white uppercase ml-15 mr-15"><a href="index.html">Home</a></li>
                                            <li class="text-white uppercase ml-15 mr-15">our company</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                <!--Start of Blog Area-->
                <div class="blog-area pt-92 pb-11">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-blog hover-effect mb-50">
                                    <div class="blog-image box-hover">
                                        <a href="#" class="block">
                                            <img src="<?php echo base_url(); ?>assets/website/images/blog/l-1.jpg" alt="">
                                        </a>
                                    </div>

                                </div>
                                
                       </div>
                            <div class="col-md-6">
                                
                               
                                <div class="single-sidebar-widget mb-48">
                                    <div class="sidebar-widget-title">
                                        <h4 class="mb-23">Our Values</h4>


                                    </div>
                                    <div class="recent-posts light-gray-bg">


<button class="accordion">Values 1</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Values 2</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Values 3</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
                                    </div>
                                </div>
                            </div>




                        </div>




                      
                            <div class="col-md-12"  >
                                <div class="single-blog hover-effect mb-50">
                                    
                                    <div class="blog-text"  data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                        <h5 class="pt-42 mb-14 l-text">About Company</h5>
                                        <p class="mb-25" >It is a long established fact that a reader will be distracted by the readable content of a page when looking  its layout. The point of using Lorem Ipsum is tat it has a more-or-less normal distribution of letters It is a long established fact that a reader will be distracted by the readable content of a page when looking  its layout. The point of using Lorem Ipsum is tat it has a more Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum..</p>
                                        <p class="mb-25">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                                        <p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    </div>
                                </div>
                               
                       </div>   



                       <div class="col-md-12"  > 
                       <div class="contact-info text-center fix pt-100 pb-115">
                            <div class="single-contact-info" >
                              <div class="col-md-2 item" data-aos="flip-left">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-email"></i>
                                </div>
                                 </div>
                              <div class="col-md-10" data-aos="zoom-in-up">
                                 <h4 style="float: left">Mission</h4>
                                <div class="single-contact-text mt-18">
                                  <p style="float: left;text-align: left;
  text-justify: inter-word;">Establish and professionally manage a common database to share information on the credit payment behavior of borrowers.</p>

                                  <!--   <span class="block">devitems@email.com</span>
                                    <span class="block">jobhelp25@email.com</span> -->
                                </div>
                                 </div>
                            </div>
                            <div class="single-contact-info">
                              <div class="col-md-2" data-aos="flip-right">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-phone"></i>
                                </div>
                                </div>
                              <div class="col-md-10" data-aos="zoom-in-down">
                                 <h4 style="float: left">Vision</h4>

                                <div class="single-contact-text mt-18">
                                    <p style="float: left;text-align: left;
  text-justify: inter-word;">Establish and professionally manage a common database to share information on the credit payment behavior of borrowers.</p>
                                   <!--  <span class="block">+9 55845 5485 685</span>
                                    <span class="block">+58 96584 5785 658</span> -->
                                </div>
                                </div>
                            </div>
                            <div class="single-contact-info">
                             <div class="col-md-2" data-aos="flip-up">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-pin"></i>
                                </div>
                              </div>
                              <div class="col-md-10" data-aos="zoom-in-right">
                                <h4  style="float: left" >Goal</h4>
                                <div class="single-contact-text mt-18">
                                  <p style="float: left;text-align: left;
  text-justify: inter-word;">Our goal is to create value for our clients by providing effective services. We meet their needs by combining our local market knowledge with our extensive range of skills with international.</p>
                                   <!--  <span class="block">House 09, Road 32, Mohammadpur,</span>
                                    <span class="block">Dhaka-1200, UK</span> -->
                                </div>
                            </div>
                            </div>
                        </div>
                          </div>    



               <div class="col-md-12" style="margin-top: -50px!important;" > 
              <div class="contact-info text-center fix pt-11 pb-30">
                            <div class="single-contact-info">
                              <div class="col-md-2" data-aos="flip-down">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-email"></i>
                                </div>
                                 </div>
                              <div class="col-md-10" data-aos="zoom-in-left">
                                 <h4 style="float: left">Business Model</h4>
                                <div class="single-contact-text mt-18">
                                  <p style="float: left;text-align: left;
  text-justify: inter-word;">Establish and professionally manage a common database to share information on the credit payment behavior of borrowers.</p>

                                   <!--  <span class="block">devitems@email.com</span>
                                    <span class="block">jobhelp25@email.com</span> -->
                                </div>
                                 </div>
                            </div>
                            <div class="single-contact-info">
                              <div class="col-md-2"  data-aos="flip-left">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-phone"></i>
                                </div>
                                </div>
                              <div class="col-md-10" data-aos="zoom-in">
                                 <h4 style="float: left">Our Team</h4>

                                <div class="single-contact-text mt-18">
                                    <p style="float: left;text-align: left;
  text-justify: inter-word;">Establish and professionally manage a common database to share information on the credit payment behavior of borrowers.</p>
                                    <!-- <span class="block">+9 55845 5485 685</span>
                                    <span class="block">+58 96584 5785 658</span> -->
                                </div>
                                </div>
                            </div>
                            <div class="single-contact-info">
                             <div class="col-md-2" data-aos="flip-right">
                                <div class="single-contact-icon">
                                    <i class="zmdi zmdi-pin"></i>
                                </div>
                              </div>
                              <div class="col-md-10" data-aos="zoom-out-left">
                                <h4  style="float: left" >Collaborative Effort</h4>
                                <div class="single-contact-text mt-18">
                                  <p style="float: left;text-align: left;
  text-justify: inter-word;">Our goal is to create value for our clients by providing effective services. We meet their needs by combining our .</p>
                                   <!--  <span class="block">House 09, Road 32, Mohammadpur,</span>
                                    <span class="block">Dhaka-1200, UK</span> -->
                                </div>
                            </div>
                            </div>
                        </div>
                          </div>                      
                           
                    </div>
                </div>



<div class="blog-area ptb-11">
                    <div class="container" >
                        <div class="row">
                            <div class="col-md-12" data-aos="flip-down">
                                <div class="section-title text-center ">
                                    <h2 class="uppercase">Our Management Team</h2>
                                    <div class="separator mt-35 mb-77">
                                        <span><img src="assets/website/images/icons/1.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="blog-carousel carousel-style-two">
                                <div class="col-xs-12" data-aos="zoom-in-right">
                                    <div class="single-blog hover-effect">
                                        <div class="blog-image box-hover">
                                            <a href="#" class="block">
                                                <img src="assets/website/images/blog/1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="blog-text">
                                            
                                            <div class="blog-post-info">
                                                
                                              <div class="social-links pull-right">
                                                  <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                              </div>
                                   
                                            </div>
                                            <h5 class="pt-28 mb-6"><a href="#">Obed Dodoo</a></h5>
                                            <p>CEO</p>
                                            <p class="mb-21">It is a long established fact that a reader will be distracted by the readable content of a page when looking  its layout. The point of using Lorem Ipsum is tat it has a more-or-less normal distribution of letters</p>
                                            <a href="#"  data-toggle="modal" data-target="#productModal" class="button large-button">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12" data-aos="zoom-out-up">
                                    <div class="single-blog hover-effect">
                                        <div class="blog-image box-hover">
                                            <a href="#" class="block">
                                                <img src="assets/website/images/blog/2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="blog-text">
                                           
                                            <div class="blog-post-info">
                                                 <div class="social-links pull-right">
                                                  <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                              </div>
                                            </div>
                                            <h5 class="pt-28 mb-6"><a href="#">Obed Semekor</a></h5>
                                            <p>CEO</p>
                                            <p class="mb-21">It is a long established fact that a reader will be distracted by the readable content of a page when looking  its layout. The point of using Lorem Ipsum is tat it has a more-or-less normal distribution of letters</p>
                                            <a href="#" class="button large-button">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12" data-aos="zoom-in-left">
                                    <div class="single-blog hover-effect">
                                        <div class="blog-image box-hover">
                                            <a href="#" class="block">
                                                <img src="assets/website/images/blog/3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="blog-text">
                                            
                                            <div class="blog-post-info">
                                                 <div class="social-links pull-right">
                                                  <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                              </div>
                                            </div>
                                            <h5 class="pt-28 mb-6"><a href="#">Marvin Yaw</a></h5>
                                            <p>CEO</p>
                                            <p class="mb-21">It is a long established fact that a reader will be distracted by the readable content of a page when looking  its layout. The point of using Lorem Ipsum is tat it has a more-or-less normal distribution of letters</p>
                                            <a href="#" class="button large-button">Read More</a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>


        <!-- Modal -->
  <div class="modal fade" id="productModal1452" role="dialog" >
    <div class="modal-dialog " style="min-height:100%!important;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
         <div class="container">
<div class="row">

<div class="twPc-div">
    <a class="twPc-bg twPc-block"></a>

  <div>
   

    <a class="twPc-avatarLink">
     
      <img class="twPc-avatarImg" src="assets/website/images/testimonial/1.jpg" alt="">
    </a>

    <div class="twPc-divUser">
      <div class="twPc-divName">
        <a >Mert S. Kaplan</a>
      </div>
      <span>
        <a >ceo</a>
      </span>
    </div>

    <div class="twPc-divStats"   >
      
      <br>
       <span class="twPc-StatLabel twPc-block" >
        
        <p>Meet George, the Chief Executive Officer of xdsdata Ghana. He is also the Chief Executive Officer of Debenture Trust Company Limited, one of the new innovative up and coming financial services companies registered in Ghana. George has over 20 years experience in Banking in the United States and Africa. Before leaving the sector, he was the Area Manager for Treasury Operations at Standard Chartered Bank Ghana responsible for the West African region from February 1999 to February 2003. He was offered a new appointment in Singapore as the Head of Derivative Operations responsible for Standard Chartered Bank units for all the countries east of Bangladesh. He served on the team to implement the Bank of Ghana payment systems, a clearing system now in operation among the Banks. He was a member of the project team responsible for coming up with a framework for the implementation of the West African Payment Systems. Prior to to Standard Chartered Bank, he was Assistant Vice President and Manager of derivative products at Rabo bank International New York, and also Assistant Vice President of Rabo Capital Services Inc. New York, where he pioneered the operations from the start. Before Rabo bank, George was an Assistant Vice president and Manager of the Strategic Instruments department at Canadian Imperial bank of Commerce, New York. He was Operations Officer and Manager of Derivative Operations at Union Bank of Switzerland, New York and Assistant Treasurer at Republic National Bank, New York. George wields varied and extensive experience in Banking haven worked with all the above for many years and a product of the State University of New York Maritime College, a military Institution in New York, where he obtained a Bachelor of Science degree in management alongside several professional certificates in Capital Markets, Derivatives, Management, and also a Third Officer’s license.
        </p>
      </span>
    </div>




  </div>
</div>
<!-- code end -->
</div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>







 <!--Start of Login Form-->
        <div id="quickview-login">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                       <div class="container">
<div class="row">

<div class="twPc-div">
    <a class="twPc-bg twPc-block"></a>

  <div>
   

    <a class="twPc-avatarLink">
     
      <img class="twPc-avatarImg" src="assets/website/images/testimonial/1.jpg" alt="">
    </a>

    <div class="twPc-divUser">
      <div class="twPc-divName">
        <a >Mert S. Kaplan</a>
      </div>
      <span>
        <a >ceo</a>
      </span>
    </div>

    <div class="twPc-divStats"   >
      
      <br>
       <span class="twPc-StatLabel twPc-block" >
        
        <p>Meet George, the Chief Executive Officer of xdsdata Ghana. He is also the Chief Executive Officer of Debenture Trust Company Limited, one of the new innovative up and coming financial services companies registered in Ghana. George has over 20 years experience in Banking in the United States and Africa. Before leaving the sector, he was the Area Manager for Treasury Operations at Standard Chartered Bank Ghana responsible for the West African region from February 1999 to February 2003. He was offered a new appointment in Singapore as the Head of Derivative Operations responsible for Standard Chartered Bank units for all the countries east of Bangladesh. He served on the team to implement the Bank of Ghana payment systems, a clearing system now in operation among the Banks. He was a member of the project team responsible for coming up with a framework for the implementation of the West African Payment Systems. Prior to to Standard Chartered Bank, he was Assistant Vice President and Manager of derivative products at Rabo bank International New York, and also Assistant Vice President of Rabo Capital Services Inc. New York, where he pioneered the operations from the start. Before Rabo bank, George was an Assistant Vice president and Manager of the Strategic Instruments department at Canadian Imperial bank of Commerce, New York. He was Operations Officer and Manager of Derivative Operations at Union Bank of Switzerland, New York and Assistant Treasurer at Republic National Bank, New York. George wields varied and extensive experience in Banking haven worked with all the above for many years and a product of the State University of New York Maritime College, a military Institution in New York, where he obtained a Bachelor of Science degree in management alongside several professional certificates in Capital Markets, Derivatives, Management, and also a Third Officer’s license.
        </p>
      </span>
    </div>



  </div>
  <div class="modal-footer">
          <button type="button" style="min-width: 100%;" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
</div>
<!-- code end -->
</div>
</div>
            </div>  
          </div>  
        </div>
      </div>
        </div>
        <!--End of Login Form-->
       
        



  <script src='https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js'></script>
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
