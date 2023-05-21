 <nav class="pcoded-navbar">
     <div class="pcoded-inner-navbar main-menu">
         <div class="pcoded-navigatio-lavel">Navigation</div>
         <ul class="pcoded-item pcoded-left-item">




             <li class="<?= ($this->uri->segment(1) === 'dashboard') ? 'active' : '' ?>">
                 <a href="dashboard">
                     <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                     <span class="pcoded-mtext">Dashboard</span>
                 </a>

             </li>
             <?php if ($role !== 'jobseeker') { ?>

                 <div class="pcoded-navigatio-lavel">Jobs Management</div>

             <?php } ?>
         </ul>

         <ul class="pcoded-item pcoded-left-item">
             <?php if ($role !== 'jobseeker') { ?>
                 <li class="pcoded-hasmenu">
                     <a href="javascript:void(0)">
                         <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                         <span class="pcoded-mtext">Jobs vaccancies</span>
                     </a>



                     <ul class="pcoded-submenu">

                         <li class="<?= ($this->uri->segment(1) === 'jobs') ? 'active' : '' ?>">
                             <a href="jobs">
                                 <span class="pcoded-mtext">Job List</span>
                             </a>
                         </li>

                         <li class=" ">
                             <a href="jobadd">
                                 <span class="pcoded-mtext">New vaccancy</span>
                             </a>
                         </li>


                     </ul>



                 </li>

                 <li class="pcoded-hasmenu">
                     <a href="javascript:void(0)">
                         <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                         <span class="pcoded-mtext">Applicants</span>
                     </a>

                     <ul class="pcoded-submenu">
                         <li class=" ">
                             <a href="applicants">
                                 <span class="pcoded-mtext">Applicants</span>
                             </a>
                         </li>



                     </ul>

                 </li>


                 <li class="pcoded-hasmenu">
                     <a href="javascript:void(0)">
                         <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                         <span class="pcoded-mtext">Job Locations</span>
                     </a>
                     <ul class="pcoded-submenu">

                         <li class=" ">
                             <a href="location">
                                 <span class="pcoded-mtext">Locations</span>
                             </a>
                         </li>

                         <li class=" ">
                             <a href="locationadd">
                                 <span class="pcoded-mtext">New Locations</span>
                             </a>
                         </li>


                     </ul>
                 </li>


                 <li class="pcoded-hasmenu">
                     <a href="javascript:void(0)">
                         <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                         <span class="pcoded-mtext">Job Industry</span>
                     </a>
                     <ul class="pcoded-submenu">

                         <li class=" ">
                             <a href="industry">
                                 <span class="pcoded-mtext">Job Industry</span>
                             </a>
                         </li>


                         <li class=" ">
                             <a href="industryadd">
                                 <span class="pcoded-mtext">New Industry</span>
                             </a>
                         </li>



                     </ul>
                 </li>



             <?php } ?>
             <?php if ($role === 'jobseeker') { ?>
                 <div class="pcoded-navigatio-lavel">Navigation</div>

                 <li class=" ">
                     <a href="profile">
                         <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                         <span class="pcoded-mtext">Profile</span>

                     </a>
                 </li>
                 <li class=" ">
                     <a href="jobs">
                         <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                         <span class="pcoded-mtext">Jobs</span>

                     </a>
                 </li>
                 <li class=" ">
                     <a href="applications">
                         <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                         <span class="pcoded-mtext">My Applications</span>

                     </a>
                 </li>
                 <li class=" ">
                     <a href="savedJobs">
                         <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                         <span class="pcoded-mtext">Saved Jobs</span>

                     </a>
                 </li>
             <?php } ?>
             <?php if ($role !== 'jobseeker') { ?>

                 <div class="pcoded-navigatio-lavel">Sign Up Management</div>
                 <ul class="pcoded-item pcoded-left-item">

                     <li class="pcoded-hasmenu">
                         <a href="javascript:void(0)">
                             <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                             <span class="pcoded-mtext">Sign Up Management</span>
                         </a>

                         <ul class="pcoded-submenu">
                             <li class=" ">
                                 <a href="signups">
                                     <span class="pcoded-mtext">Sign Ups</span>
                                 </a>
                             </li>



                         </ul>

                     </li>

                 </ul>


                 <div class="pcoded-navigatio-lavel">System Settings</div>
                 <ul class="pcoded-item pcoded-left-item">
                     <li class="pcoded-hasmenu ">
                         <a href="javascript:void(0)">
                             <span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i></span>
                             <span class="pcoded-mtext">Settings</span>
                         </a>
                         <ul class="pcoded-submenu">

                             <li class="pcoded-hasmenu ">

                                 <a href="javascript:void(0)">
                                     <span class="pcoded-mtext">System Settings</span>
                                 </a>

                                 <ul class="pcoded-submenu">

                                     <li class="">
                                         <a href="companyInfo">
                                             <span class="pcoded-mtext">Company Info</span>
                                         </a>
                                     </li>

                                     <li class="">
                                         <a href="staffadd">
                                             <span class="pcoded-mtext">Add Staff</span>
                                         </a>
                                     </li>

                                     <li class="">
                                         <a href="staff">
                                             <span class="pcoded-mtext">Manage staff</span>
                                         </a>
                                     </li>

                                 </ul>
                             </li>
                             <li class="pcoded-hasmenu ">

                                 <a href="#">
                                     <span class="pcoded-mtext">Role permission</span>
                                 </a>

                                 <ul class="pcoded-submenu">

                                     <li class="">
                                         <a href="roleadd">
                                             <span class="pcoded-mtext">Add Role</span>
                                         </a>
                                     </li>

                                     <li class="">

                                         <a href="roles">
                                             <span class="pcoded-mtext">Role List</span>
                                         </a>

                                     </li>
                                     <!-- <li class="">
 									<a href="roleassign">
 										<span class="pcoded-mtext">Assign User Role</span>
 									</a>
 								</li> -->
                                 </ul>
                             </li>
                             <!-- <li class="pcoded-hasmenu ">
 							<a href="javascript:void(0)">
 								<span class="pcoded-mtext">Email/SMS</span>
 							</a>
 							<ul class="pcoded-submenu">
 								<li class="">
 									<a href="javascript:void(0)">
 										<span class="pcoded-mtext">Email Config</span>
 									</a>
 								</li>
 								<li class="">
 									<a href="javascript:void(0)">
 										<span class="pcoded-mtext">SMS Config</span>
 									</a>
 								</li>
 							</ul>
 						</li> -->

                             <li class="">
                                 <a href="javascript:void(0)">
                                     <span class="pcoded-mtext">Support</span>
                                 </a>
                             </li>


                         </ul>
                     </li>



                 </ul>

             <?php } ?>
     </div>

 </nav>