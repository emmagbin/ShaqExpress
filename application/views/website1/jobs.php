

 <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area pt-150 bg-3 bg-opacity-black-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h2 class="text-center text-white uppercase mb-17">Job Board</h2>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center m-0">
                                            <li class="text-white uppercase ml-15 mr-15"><a href="index.html">Home</a></li>
                                            <li class="text-white uppercase ml-15 mr-15">Job Board</li>
                                        </ul>
                                    </div>
                                </div>
                               <!-- <form action="" method=""> -->
                                 <form class="login-form form"  method="post" action="<?php echo base_url();?>Web/jobs">
                     <!-- <form  method="post" action="advanceSearch"> -->
                                    <div class="form-container fix bg-opacity-blue-85 mt-125">
                                        <div class="box-select">
                                            <div class="select large" style="min-width: 40%;" >
                                                <select name="locationname" id="locationname" required="" >
                        <option  selected=""  value="All" >Select Region</option>
                        <?php foreach($locationname as $record):?>
                        <option value="<?php echo ($record->locationname);?>" ><?php echo ($record->locationname);?></option>
                        <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="select large" style="min-width: 40%;">
                                                <select name="categoryname" id="categoryname" required=""> 
                        <option selected="" value="All" >Select Category</option>
                        <?php foreach($categoryname as $record):?>
                        <option value="<?php echo ($record->categoryname);?>" ><?php echo ($record->categoryname);?></option>
                        <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="button-dark pull-right">Search</button>

                                    </div>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                <!--Start of Job Post Area-->
                <div class="job-post-area ptb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center ">
                                    <h2 class="uppercase">Available Jobs</h2>
                                    <div class="separator mt-35 mb-77">
                                        <span><img src="images/icons/1.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="job-post-container fix">

         <table  class="dt-responsive" style="width:100%"  id="example">
        
        <thead>
          <tr>
            <th></th>
           
          </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            <?php foreach($all_jobs as $record):?>
          <tr>
            <td> 

             <div class="single-job-post fix">
                                        <div class="job-title col-4 pl-30">
                                            <span class="pull-left block mtb-17">
                                                <a href="#"><img src="images/company-logo/1.png" alt=""></a>
                                            </span>
                                            <div class="fix pl-30 mt-29">
                                                <h4 class="mb-5"><?php echo ($record->jobtitle);?></h4>
                                                <h5><a href="#"><?php echo ($record->JobCategory);?></a></h5>
                                                <p>Deadline: <?php echo ($record->applicationclosingdate);?></p>
                                            </div>
                                        </div>
                                        <div class="address col-4 pl-50"> 
                                            <span class="mtb-30 block"><?php echo ($record->town);?>,<br>
                                            <?php echo ($record->joblocation);?><br>
                                            </span>
                                        </div>
                                        <div class="time-payment col-2 pl-60 text-center pt-22">
                                            <span class="block mb-6">GH₵<?php echo ($record->expectedsalary);?></span>
                                            <a href="<?php echo base_url('Web/Job/'.$record->id); ?>" class="button button-red"><?php echo ($record->jobtype);?></a>
                                             <p>Posted: <?php echo (substr($record->created_at, 0,10));?></p>
                                        </div>
                                    </div></td>
           
          </tr>
           <?php endforeach;?>

        </tbody>
        <tfoot>
        
        </tfoot>
      </table>

                                   

                                   
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Job Post Area -->
               <!-- partial -->
