<style>

    img{

        max-width: 100%;

        max-height: 100%;

        display: block; /* remove extra space below image */

    }

    .box{

        width: 100%px;  
        height: 100%px;

        border: 1px solid black;

    }    

    .box.large{

        height: 300px;

    }

    .box.small{

        height: 100px;

    }

</style>


  <div class="slider-area no-overlay center">
                    <div class="preview-2 no-directionNav">
                        <div id="nivoslider" class="slides">  
                            <img src="<?php echo base_url();?>assets/website/images/slider/homepage.jpg" alt="" title="#slider-1-caption1"/>
                            <img src="<?php echo base_url();?>assets/website/images/slider/IMG_7941.jpg" alt="" title="#slider-1-caption2"/>
                            <img src="<?php echo base_url();?>assets/website/images/slider/IMG_7990.jpg" alt="" title="#slider-1-caption2"/>
                        </div> 
            
                        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                            <div class="banner-content slider-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-content-wrapper m-0">
                                                <div class="text-content text-center">
                                                 <h1 class="title1 cd-headline letters rotate-2 text-uppercase text-white mb-0"> LOOKING FOR A JOB? </h1>
                                                    <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="3s" data-wow-delay="2s">
                                                        <a class="button slider-btn" href="<?php echo base_url('Web/jobs') ?>">Find a job</a>                  
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
                                                   <h1 class="title1 cd-headline letters rotate-2 text-uppercase text-white mb-0">LOOKING FOR A JOB? </h1>
                                                    <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="1s" data-wow-delay=".6s">
                                                        <a class="button slider-btn" href="<?php echo base_url('Web/jobs') ?>">Find a job</a>                  
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
                                                <h5><a href="#"><?php echo ($record->categoryname);?></a></h5>
                                                 <p>Deadline: <?php echo ($record->applicationclosingdate);?></p>
                                            </div>
                                        </div>
                                        <div class="address col-4 pl-50">
                                            <span class="mtb-30 block"><?php echo ($record->town);?>,<br>
                                            <?php echo ($record->locationname);?></span>
                                        </div>
                                        <div class="time-payment col-2 pl-60 text-center pt-22">
                                            <span class="block mb-6"><?php echo ($record->expectedsalary);?></span>
                                            <a href="<?php echo base_url('Web/Job/'.$record->id); ?>" class="button button-red"><?php echo ($record->jobtype);?></a>
                                            
                                            <p>Posted: <?php echo (substr($record->created_at, 0,10));?></p>
                                        </div>
                                    </div>
                                        </td>
                                        
                                      </tr>
                                     <?php endforeach;?>
                                    </table>
                                    
                                   
                                   
                                </div>
                                <div class="text-center">
                                    <a href="<?php echo base_url('Web/jobs') ?>" class="button large-button">Browse all jobs</a>
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
                                    <h1><span class="counter">500</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h3 class="pb-15 mb-23">Members</h3>
                                    <h1><span class="counter">200</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h3 class="pb-15 mb-23">Resume</h3>
                                    <h1><span class="counter">380</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h3 class="pb-15 mb-23">Company</h3>
                                    <h1><span class="counter">150</span></h1>
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
                <div class="box">
                    <img src="<?php echo base_url();?>assets/website/images/CEO/CEO22.jpg" alt="C E O">
                </div>
               </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="advertise-content pl-15">
                                    <h3 class="uppercase pb-10 mb-20">Message From The CEO</h3>
                                    <p class="pr-50">I am proud to present to you Firm Anchor Consult.
                        In Firm Anchor, we believe that we are your Business Anchor that you can lean on.
                        We are here to take away the stress of finding the right employees who will stay with your organization and make great positive impact on your activities.</p>
                    <p class="pr-50">We also go a step further to provide cleaning services and recruit domestic staff as well.
                        Clearly, you can see our focus is to relieve people in general from other activities which can be time consuming and sometimes stressful so they can focus on their core businesses.
                        We assure you of excellent service at a very affordable rate.</p>
                    <p class="pr-50">My team and I value your Partnership and will very much like to be part of your organizational and Personal journey.
                        Do contact us as per our contact details provided below and we will be glad to assist you and work hard to exceed your expectations.
                    </p>
                    <p class="pr-50">Thank You</p>
                    <a href="#" class="button large-button mt-9">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Advertise Area-->
                <!--End of Testimonial Area-->
             