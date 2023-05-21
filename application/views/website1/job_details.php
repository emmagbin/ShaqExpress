  <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area pt-94 pb-85 bg-3 bg-opacity-dark-blue-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h2 class="text-center text-white uppercase mb-17">JOB DETAILS</h2>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center m-0">
                                            <li class="text-white uppercase ml-15 mr-15"><a href="index.html">Home</a></li>
                                            <li class="text-white uppercase ml-15 mr-15">Job Details</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                <!--Start of Single Job Post Area-->
                 <?php foreach($jobdetial as $record):?>
                <div class="single-job-post-area pt-70 mb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form action="#">
                                    <div class="single-job-content">
                                        <div class="area-title text-center">
                                            <h2 class="pt-10 pb-10">You have almost finished</h2>
                                        </div>
                                        <div class="single-job-form" style="margin-top: 20px;" >
                                            <div class="single-info mb-14">
                                                <div class="row">
                                                <div class="col-md-1" > 
                                                    <i class="fa fa-suitcase" style="font-size:80px;margin-top: 10px;"></i>

                                                </div>
                                                 <div class="col-md-11" style="padding-left: 50px; margin-top: 10px;" > 
                                                    <h4 class="mb-5"><?php echo ($record->jobtitle);?></h4>
                                                     <p class="mb-5"><?php echo ($record->companyname);?></p>
                                                      <p class="mb-5"><?php echo ($record->JobCategory);?></p>
                                                       <span><?php echo ucfirst($record->joblocation.' | '.$record->town.'  |  '.$record->jobtype.'  |  '.$record->expectedsalary.'  |  '.substr($record->created_at,0,10));?></span>
                                                </div>
 
 
                                                </div>
                                                
                                               
                                              
                                            </div>
                                        </div>
                                         <?php if(strlen($record->description)>11){?>
                                                <div class="title uppercase pt-70 pb-26"><span>job description</span></div>
                                            <?php }?>


                                       
                                        <div class="single-job-form">
                                            <span class="number block"><?php echo ($record->description);?></span>
                                        </div>

                                         <?php if(strlen($record->benefits)>11){?>
                                                <div class="title uppercase mt-58 mb-25"><span class="medium">benefits</span></div>
                                            <?php }?>

                                        
                                        <div class="single-job-form">
                                            <div class="single-info mb-14">
                                               <span class="number block"> <?php echo ($record->benefits);?></span>
                                               
                                            </div>
                                        </div>

                                          <?php if(strlen($record->jobrequirements)>11){?>
                                                <div class="title uppercase mt-58 mb-25"><span>job requrrements</span></div>
                                            <?php }?>

                                       
                                        <div class="single-job-form">
                                            <div class="single-info mb-14">
                                                <span class="number block"> <?php echo ($record->jobrequirements);?></span>
                                              
                                            </div>
                                        </div>
                                        <div class="title uppercase pt-47 pb-26"><span class="medium">how to apply</span></div>
                                        <div class="single-job-form">
                                            <p>LOG IN OR SIGN UP TO APPLY NOW </p>
                                        </div>
                                        <div class="mt-38">
                                            <a href="<?php echo base_url('Web/jobs') ?>" class="button button-large-box lg-btn mr-20">back</a>
                                            <a href="<?php echo base_url('login') ?>" class="button button-large-box lg-btn">Apply</a>
                                        </div>


                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Single Job Post Area-->
                  <?php endforeach;?>