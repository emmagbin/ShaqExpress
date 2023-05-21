 <nav class="pcoded-navbar">
 	<div class="pcoded-inner-navbar main-menu">
 		<div class="pcoded-navigatio-lavel">Navigation</div>
 		<ul class="pcoded-item pcoded-left-item">



 			<?php foreach ($privileges as $record) : ?>



 				<?php if ($record->module == 'dashboard') { ?>
 					<li class="<?= ($this->uri->segment(1) === 'dashboard') ? 'active' : '' ?>">
 						<a href="dashboard">
 							<span class="pcoded-micon"><i class="feather icon-home"></i></span>
 							<span class="pcoded-mtext">Dashboard</span>
 						</a>

 					</li>
 				<?php } ?>
 			<?php endforeach; ?>


 			<?php if ($role !== 'jobseeker') { ?>
 				<div class="pcoded-navigatio-lavel">Jobs Management </div>
 				<!-- <?php foreach ($privileges as $record) : ?>

 					<?php if ($record->module == 'Vacancies' and $record->read == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">Jobs Management1 </div>
 					<?php } elseif (($record->module == 'Applicants' and $record->read == 'yes')) { ?>
 						<div class="pcoded-navigatio-lavel">Jobs Management2 </div>
 					<?php } elseif ($record->module == 'Locations' and $record->read == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">Jobs Management3 </div>
 					<?php } elseif ($record->module == 'Industry' and $record->read == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">Jobs Management4 </div>

 					<?php } elseif ($record->module == 'Vacancies' and $record->write == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">Jobs Management 5</div>

 					<?php } elseif ($record->module == 'Locations' and $record->write == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">Jobs Management 7 </div>
 					<?php } elseif ($record->module == 'Industry' and $record->write == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">Jobs Management 8</div>
 					<?php } ?>
 				<?php endforeach; ?> -->
 			<?php } ?>
 		</ul>

 		<ul class="pcoded-item pcoded-left-item">
 			<?php if ($role !== 'jobseeker') { ?>

 				<li class="pcoded-hasmenu">
 					<?php foreach ($privileges as $record) : ?>
 						<?php if ($record->module == 'Vacancies' and $record->read == 'yes' || $record->write == 'yes') { ?>
 							<a href="javascript:void(0)">
 								<span class="pcoded-micon"><i class="feather icon-box"></i></span>
 								<span class="pcoded-mtext">Jobs vaccancies</span>
 							</a>
 						<?php } ?>
 					<?php endforeach; ?>


 					<ul class="pcoded-submenu">
 						<?php foreach ($privileges as $record) : ?>
 							<?php if ($record->module === 'Vacancies' && $record->read === 'yes') { ?>
 								<li class="<?= ($this->uri->segment(1) === 'jobs') ? 'active' : '' ?>">
 									<a href="jobs">
 										<span class="pcoded-mtext">Job List</span>
 									</a>
 								</li>
 							<?php } ?>
 						<?php endforeach; ?>
 						<?php foreach ($privileges as $record) : ?>
 							<?php if ($record->module == 'Vacancies' and $record->write == 'yes') { ?>
 								<li class=" ">
 									<a href="jobadd">
 										<span class="pcoded-mtext">New vaccancy</span>
 									</a>
 								</li>
 							<?php } ?>
 						<?php endforeach; ?>
 					</ul>



 				</li>

 				<?php foreach ($privileges as $record) : ?>
 					<?php if ($record->module == 'Applicants' and $record->read == 'yes') { ?>
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
 					<?php } ?>
 				<?php endforeach; ?>
 				<?php foreach ($privileges as $record) : ?>
 					<?php if ($record->module == 'Locations' and $record->read == 'yes' || $record->write == 'yes') { ?>
 						<li class="pcoded-hasmenu">
 							<a href="javascript:void(0)">
 								<span class="pcoded-micon"><i class="feather icon-box"></i></span>
 								<span class="pcoded-mtext">Job Locations</span>
 							</a>
 							<ul class="pcoded-submenu">
 								<?php if ($record->module == 'Locations' and $record->read == 'yes') { ?>

 									<li class=" ">
 										<a href="location">
 											<span class="pcoded-mtext">Locations</span>
 										</a>
 									</li>
 								<?php } ?>
 								<?php if ($record->module == 'Locations' and $record->write == 'yes') { ?>
 									<li class=" ">
 										<a href="locationadd">
 											<span class="pcoded-mtext">New Locations</span>
 										</a>
 									</li>
 								<?php } ?>


 							</ul>
 						</li>
 					<?php } ?>
 				<?php endforeach; ?>
 				<?php foreach ($privileges as $record) : ?>
 					<?php if ($record->module == 'Industry' and $record->read == 'yes' || $record->write == 'yes') { ?>
 						<li class="pcoded-hasmenu">
 							<a href="javascript:void(0)">
 								<span class="pcoded-micon"><i class="feather icon-box"></i></span>
 								<span class="pcoded-mtext">Job Industry</span>
 							</a>
 							<ul class="pcoded-submenu">
 								<?php if ($record->module == 'Industry' and $record->read == 'yes') { ?>

 									<li class=" ">
 										<a href="industry">
 											<span class="pcoded-mtext">Job Industry</span>
 										</a>
 									</li>
 								<?php } ?>
 								<?php if ($record->module == 'Industry' and  $record->write == 'yes') { ?>

 									<li class=" ">
 										<a href="industryadd">
 											<span class="pcoded-mtext">New Industry</span>
 										</a>
 									</li>
 								<?php } ?>


 							</ul>
 						</li>
 					<?php } ?>
 				<?php endforeach; ?>


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
 				<?php foreach ($privileges as $record) : ?>
 					<?php if ($record->module == 'SignUp' and $record->read == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">Sign Up Management</div>
 						<ul class="pcoded-item pcoded-left-item">
 							<?php if ($record->module == 'SignUp' and $record->read == 'yes') { ?>
 								<li class="pcoded-hasmenu">
 									<a href="javascript:void(0)">
 										<span class="pcoded-micon"><i class="feather icon-box"></i></span>
 										<span class="pcoded-mtext">Sign Up Management</span>
 									</a>
 									<?php foreach ($privileges as $record) : ?>
 										<?php if ($record->module == 'SignUp' and $record->read == 'yes') { ?>
 											<ul class="pcoded-submenu">
 												<li class=" ">
 													<a href="signups">
 														<span class="pcoded-mtext">Sign Ups</span>
 													</a>
 												</li>



 											</ul>
 										<?php } ?>
 									<?php endforeach ?>
 									<!-- silver light -->
 								</li>
 							<?php } ?>
 						</ul>
 					<?php } ?>
 				<?php endforeach ?>
 				<div class="pcoded-navigatio-lavel">System Settings</div>
 				<!-- <?php foreach ($privileges as $record) : ?>
 					<?php if ($record->module == 'CompanyInfo' and $record->read == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">System Settings</div>
 					<?php } elseif (($record->module == 'staff' and $record->read == 'yes')) { ?>
 						<div class="pcoded-navigatio-lavel">System Settings</div>
 					<?php } else if ($record->module == 'staff' and $record->write == 'yes') { ?>
 						<div class="pcoded-navigatio-lavel">System Settings</div>
 					<?php } ?>
 				<?php endforeach ?> -->


 				<ul class="pcoded-item pcoded-left-item">
 					<li class="pcoded-hasmenu ">

 						<a href="javascript:void(0)">
 							<span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i></span>
 							<span class="pcoded-mtext">Settings</span>
 						</a>






 						<!-- <?php foreach ($privileges as $record) : ?>
 							<?php if ($record->module == 'CompanyInfo' and $record->read == 'yes') { ?>
 								<a href="javascript:void(0)">
 									<span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i></span>
 									<span class="pcoded-mtext">Settings</span>
 								</a>
 							<?php } elseif (($record->module == 'staff' and $record->read == 'yes')) { ?>
 								<a href="javascript:void(0)">
 									<span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i></span>
 									<span class="pcoded-mtext">Settings</span>
 								</a>
 							<?php } else if ($record->module == 'staff' and $record->write == 'yes') { ?>
 								<a href="javascript:void(0)">
 									<span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i></span>
 									<span class="pcoded-mtext">Settings</span>
 								</a>
 							<?php } ?>
 						<?php endforeach ?>
 -->


 						<ul class="pcoded-submenu">

 							<li class="pcoded-hasmenu ">
 								<?php foreach ($privileges as $record) : ?>
 									<?php if ($record->module == 'staff' and $record->read == 'yes' || $record->write == 'yes') { ?>
 										<a href="javascript:void(0)">
 											<span class="pcoded-mtext">System Settings</span>
 										</a>
 									<?php } ?>
 								<?php endforeach ?>
 								<ul class="pcoded-submenu">
 									<?php foreach ($privileges as $record) : ?>
 										<?php if ($record->module == 'CompanyInfo' and $record->read == 'yes' || $record->update == 'yes') { ?>

 											<li class="">
 												<a href="companyInfo">
 													<span class="pcoded-mtext">Company Info</span>
 												</a>
 											</li>
 										<?php } ?>
 									<?php endforeach ?>
 									<?php foreach ($privileges as $record) : ?>
 										<?php if ($record->module == 'staff' and  $record->write == 'yes') { ?>
 											<li class="">
 												<a href="staffadd">
 													<span class="pcoded-mtext">Add Staff</span>
 												</a>
 											</li>
 										<?php } ?>
 									<?php endforeach ?>
 									<?php foreach ($privileges as $record) : ?>
 										<?php if ($record->module == 'staff' and $record->read == 'yes' || $record->update == 'yes') { ?>
 											<li class="">
 												<a href="staff">
 													<span class="pcoded-mtext">Manage staff</span>
 												</a>
 											</li>
 										<?php } ?>
 									<?php endforeach ?>
 								</ul>
 							</li>
 							<li class="pcoded-hasmenu ">
 								<?php foreach ($privileges as $record) : ?>
 									<?php if ($record->module == 'Role' and $record->read == 'yes' || $record->write == 'yes') { ?>
 										<a href="#">
 											<span class="pcoded-mtext">Role permission</span>
 										</a>
 									<?php } ?>
 								<?php endforeach ?>
 								<ul class="pcoded-submenu">
 									<?php foreach ($privileges as $record) : ?>
 										<?php if ($record->module == 'Role' and  $record->write == 'yes') { ?>
 											<li class="">
 												<a href="roleadd">
 													<span class="pcoded-mtext">Add Role</span>
 												</a>
 											</li>
 										<?php } ?>
 									<?php endforeach ?>
 									<li class="">
 										<?php foreach ($privileges as $record) : ?>
 											<?php if ($record->module == 'Role' and $record->read == 'yes') { ?>
 												<a href="roles">
 													<span class="pcoded-mtext">Role List</span>
 												</a>
 											<?php } ?>
 										<?php endforeach ?>
 									</li>

 								</ul>
 							</li>


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