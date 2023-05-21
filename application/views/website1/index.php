  <div class="slider-area no-overlay center">
                    <div class="preview-2 no-directionNav">
                        <div id="nivoslider" class="slides">  
                            <img src="<?php echo base_url();?>assets/website/images/slider/1.jpg" alt="" title="#slider-1-caption1"/>
                            <img src="<?php echo base_url();?>assets/website/images/slider/3.jpg" alt="" title="#slider-1-caption2"/>
                        </div> 
            
                        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                            <div class="banner-content slider-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-content-wrapper m-0">
                                                <div class="text-content text-center">
                                                 <h1 class="title1 cd-headline letters rotate-2 text-uppercase text-white mb-0"> LOOKING FOR A JOB 1? </h1>
                                                    <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="3s" data-wow-delay="2s">
                                                        <a class="button slider-btn" href="#">Find a job</a>                  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                            <div class="banner-content slider-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-content-wrapper m-0">
                                                <div class="text-content slide-2 text-center">
                                                   <h1 class="title1 cd-headline letters rotate-2 text-uppercase text-white mb-0">LOOKING FOR A JOB 2? </h1>
                                                    <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="1s" data-wow-delay=".6s">
                                                        <a class="button slider-btn" href="#">Find a job</a>                  
                                                    </div>
                                                </div>
                                            </div>
                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                     </div>

                </div>
      
                <!--Start of Job Post Area-->
                <div class="job-post-area ptb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center ">
                                    <h2 class="uppercase">Recent Jobs</h2>
                                    <div class="separator mt-35 mb-77">
                                        <span><img src="assets/website/images/icons/1.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="job-post-container fix mb-70">
                                    <table style="width:100%">
                                      <?php foreach($recent_jobs as $record):?>
                                      <tr>
                                        <td>
                                    <div class="single-job-post fix">
                                        <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                               
                                              <!--   <a href="#"><img src="assets/website/images/company-logo/1.png" alt=""></a> -->
                                                 <a href="#"><i class="fa fa-institution" style="font-size:48px;margin-top: 15px;"></i></a>
                                            </span>
                                            <div class="fix pl-30 mt-29">
                                                <h4 class="mb-5"><?php echo ($record->jobtitle);?></h4>
                                                <h5><a href="#"><?php echo ($record->JobCategory);?></a></h5>
                                                 <p>Deadline: <?php echo ($record->applicationclosingdate);?></p>
                                            </div>
                                        </div>
                                        <div class="address col-4 pl-50">
                                            <span class="mtb-30 block"><?php echo ($record->town);?>,<br>
                                            <?php echo ($record->joblocation);?></span>
                                        </div>
                                        <div class="time-payment col-2 pl-60 text-center pt-22">
                                            <span class="block mb-6"><?php echo ($record->expectedsalary);?></span>
                                            <a href="#" class="button button-red"><?php echo ($record->jobtype);?></a>
                                            <p>Posted: <?php echo (substr($record->created_at, 0,10));?></p>
                                        </div>
                                    </div>
                                        </td>
                                        
                                      </tr>
                                     <?php endforeach;?>
                                    </table>
                                    
                                   
                                   
                                </div>
                                <div class="text-center">
                                    <a href="jobs" class="button large-button">Browse all jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Job Post Area -->
               
                <!--Start of Fun Factor Area-->
                <div class="fun-factor-area bg-1 text-center fix bg-opacity-blue-10 ptb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h3 class="pb-15 mb-23">Jobs</h3>
                                    <h1><span class="counter">1250</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h3 class="pb-15 mb-23">Members</h3>
                                    <h1><span class="counter">500</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h3 class="pb-15 mb-23">Resume</h3>
                                    <h1><span class="counter">700</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h3 class="pb-15 mb-23">Company</h3>
                                    <h1><span class="counter">1250</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Fun Factor Area-->
                <!--Start of Advertise Area-->
                <div class="advertise-area ptb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-6 col-xs-12">
                <div class="fix video-post embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MLBKJUF7TwM"></iframe>
                </div>
               </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="advertise-content pl-15">
                                    <h3 class="uppercase pb-10 mb-20">Join Thousands of <br>
                                    Companies That Rely on Jobify</h3>
                                    <p class="pr-50">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.available, but the majority have suffered alteration in some form,</p>
                                    <a href="#" class="button large-button mt-9">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Advertise Area-->
                <!--End of Testimonial Area-->
             <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" style="background-color: rgba(20, 177, 187, 0.7);" data-ride="carousel" id="quote-carousel">
                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner text-center">
                        <!-- Quote 1 -->
                        <div class="item active">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. !</p>
                                        <small>Someone famous</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 2 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <small>Someone famous</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 3 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. .</p>
                                        <small>Someone famous</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active">

                          <img class="img-responsive " src="assets/website/images/testimonial/1.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/adhamdannaway/128.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="">
                        </li>
                    </ol>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
      
    </div>