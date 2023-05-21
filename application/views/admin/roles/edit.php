   <div class="pcoded-content">
       <div class="pcoded-inner-content">
           <!-- Main-body start -->
           <div class="main-body">
               <div class="page-wrapper">
                   <!-- Page-header start -->
                   <div class="page-header">
                       <div class="row align-items-end">
                           <div class="col-lg-8">
                               <div class="page-header-title">
                                   <div class="d-inline">
                                       <h4><?php echo $pagetitle; ?></h4>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-4">
                               <div class="page-header-breadcrumb">
                                   <ul class="breadcrumb-title">
                                       <li class="breadcrumb-item" style="float: left;">
                                           <a href="../index.html"> <i class="feather icon-home"></i> </a>
                                       </li>
                                       <li class="breadcrumb-item" style="float: left;"><a href="#!"><?php echo $pageUrl; ?></a>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Page-header end -->

                   <!-- Page body start -->
                   <div class="page-body">
                       <div class="row">
                           <div class="col-sm-12">
                               <!-- Basic Form Inputs card start -->
                               <div class="card">

                                   <div class="card-block">
                                       <!-- <h4 class="sub-title">Basic Inputs</h4> -->
                                       <form method="POST" action="settingsController/editrole">
                                           <div class="form-group row">
                                               <label class="col-sm-2 col-form-label">
                                                   Role Name</label>
                                               <div class="col-sm-10">
                                                   <input type="hidden" name="myroleid" value="<?php echo ($roleid); ?>">
                                                   <input type="hidden" name="rolenameold" value="<?php echo ($rolename); ?>">
                                                   <input type="text" name="rolename" value="<?php echo $rolename ?>" class="form-control">
                                               </div>
                                           </div>






                                   </div>
                               </div>
                               <!-- Basic Form Inputs card end -->
                               <!-- Base Style - Compact start -->
                               <div class="card">
                                   <div class="card-header">
                                       <h5>New System Role Priviledges</h5>

                                   </div>
                                   <div class="card-block">
                                       <div class="dt-responsive table-responsive">
                                           <table id="compact" class="table compact table-striped table-bordered nowrap">
                                               <thead>
                                                   <tr>
                                                       <th>Module Permission</th>
                                                       <th class="text-center">Read</th>
                                                       <th class="text-center">Write</th>
                                                       <th class="text-center">Update</th>
                                                       <th class="text-center">Disable</th>
                                                       <th class="text-center">Anable</th>
                                                       <th class="text-center">Reset</th>
                                                       <th class="text-center">Delete</th>

                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   <form method="post" action="settingsController/editrole">
                                                       <?php $no = 1; ?>
                                                       <?php foreach ($Dashboard as $record) : ?>





                                                           <tr>
                                                               <td>Dashboard


                                                                   <input type="hidden" name="ddid" value="<?php echo ($record->id); ?>">
                                                                   <input type="hidden" name="dashboard" value="dashboard">
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="dread" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?> type="checkbox">
                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>

                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>
                                                       <?php foreach ($Vacancies as $record) : ?>
                                                           <tr>

                                                               <td>Job Vacancies
                                                                   <input type="hidden" name="vid" value="<?php echo ($record->id); ?>">
                                                                   <input type="hidden" name="Vacancies" value="Vacancies">
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="vread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="vwrite" type="checkbox" <?= ($record->write === 'yes') ? 'checked' : '' ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="vupdate" type="checkbox" <?php echo ($record->update == 'yes' ? 'checked' : ''); ?>>
                                                               </td>

                                                               <td class="text-center">
                                                                   <input value="yes" name="vdisable" type="checkbox" <?php echo ($record->disable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="venable" type="checkbox" <?php echo ($record->enable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="vdelete" type="checkbox" <?php echo ($record->delete == 'yes' ? 'checked' : ''); ?>>
                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>
                                                       <?php foreach ($Applicants as $record) : ?>
                                                           <tr>

                                                               <td>Applicants
                                                                   <input type="hidden" name="aid" value=" <?php echo ($record->id); ?>">
                                                                   <input type="hidden" name="Applicants" value="Applicants">
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="aread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>

                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="adelete" type="checkbox" <?php echo ($record->delete == 'yes' ? 'checked' : ''); ?>>
                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>
                                                       <?php foreach ($locations as $record) : ?>
                                                           <tr>

                                                               <td>Job locations<input type="hidden" name="lid" value=" <?php echo ($record->id); ?>"> <input type="hidden" name="locations" value="Locations"></td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="lread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="lwrite" type="checkbox" <?php echo ($record->write == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="lupdate" type="checkbox" <?php echo ($record->update == 'yes' ? 'checked' : ''); ?>>
                                                               </td>

                                                               <td class="text-center">
                                                                   <input value="yes" name="ldisable" type="checkbox" <?php echo ($record->disable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="lenable" type="checkbox" <?php echo ($record->enable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="ldelete" type="checkbox" <?php echo ($record->delete == 'yes' ? 'checked' : ''); ?>>
                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>
                                                       <?php foreach ($Industry as $record) : ?>
                                                           <tr>
                                                               <td>Job Industry <input type="hidden" name="iid" value=" <?php echo ($record->id); ?>"> <input type="hidden" name="Industry" value="Industry"></td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="iread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="iwrite" type="checkbox" <?php echo ($record->write == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="iupdate" type="checkbox" <?php echo ($record->update == 'yes' ? 'checked' : ''); ?>>
                                                               </td>

                                                               <td class="text-center">
                                                                   <input value="yes" name="idisable" type="checkbox" <?php echo ($record->disable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name='ienable' type="checkbox" <?php echo ($record->enable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="idelete" type="checkbox" <?php echo ($record->delete == 'yes' ? 'checked' : ''); ?>>
                                                               </td>


                                                           </tr>

                                                       <?php endforeach ?>
                                                       <?php foreach ($SignUp as $record) : ?>
                                                           <tr>
                                                               <td>SignUp Management <input type="hidden" name="Sid" value=" <?php echo ($record->id); ?>"> <input type="hidden" name="signup" value="SignUp"></td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="SSread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="SSwrite" type="checkbox" <?php echo ($record->write == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="SSupdate" type="checkbox" <?php echo ($record->update == 'yes' ? 'checked' : ''); ?>>
                                                               </td>

                                                               <td class="text-center">
                                                                   <input value="yes" name="SSdisable" type="checkbox" <?php echo ($record->disable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="SSenable" type="checkbox" <?php echo ($record->disable == 'yes' ? 'checked' : ''); ?>>

                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="SSreset" type="checkbox" <?php echo ($record->reset == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="SSdelete" type="checkbox" <?php echo ($record->delete == 'yes' ? 'checked' : ''); ?>>
                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>
                                                       <?php foreach ($CompanyInfo as $record) : ?>
                                                           <tr>
                                                               <td>Company Settings <input type="hidden" name="cid" value=" <?php echo ($record->id); ?>"> <input type="hidden" name="companyinfo" value="CompanyInfo"></td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="cread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="cupdate" type="checkbox" <?php echo ($record->update == 'yes' ? 'checked' : ''); ?>>
                                                               </td>

                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">

                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>
                                                       <?php foreach ($Staff as $record) : ?>
                                                           <tr>
                                                               <td>Staff Management <input type="hidden" name="sid" value=" <?php echo ($record->id); ?>"><input type="hidden" name="staff" value="staff"></td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="sread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="swrite" type="checkbox" <?php echo ($record->write == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="supdate" type="checkbox" <?php echo ($record->update == 'yes' ? 'checked' : ''); ?>>
                                                               </td>

                                                               <td class="text-center">
                                                                   <input value="yes" name="sdisable" type="checkbox" <?php echo ($record->disable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="senable" type="checkbox" <?php echo ($record->enable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="sreset" type="checkbox" <?php echo ($record->reset == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="sdelete" type="checkbox" <?php echo ($record->delete == 'yes' ? 'checked' : ''); ?>>
                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>
                                                       <?php foreach ($Role as $record) : ?>
                                                           <tr>
                                                               <td>Role Management <input type="hidden" name="rid" value=" <?php echo ($record->id); ?>"> <input type="hidden" name="role" value="Role"></td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="rread" type="checkbox" <?php echo ($record->read == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="rwrite" type="checkbox" <?php echo ($record->write == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="rupdate" type="checkbox" <?php echo ($record->update == 'yes' ? 'checked' : ''); ?>>
                                                               </td>

                                                               <td class="text-center">
                                                                   <input value="yes" name="rdisable" type="checkbox" <?php echo ($record->disable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="renable" type="checkbox" <?php echo ($record->enable == 'yes' ? 'checked' : ''); ?>>
                                                               </td>
                                                               <td class="text-center">

                                                               </td>
                                                               <td class="text-center">
                                                                   <input value="yes" name="rdelete" type="checkbox" <?php echo ($record->delete == 'yes' ? 'checked' : ''); ?>>
                                                               </td>


                                                           </tr>
                                                       <?php endforeach ?>

                                               </tbody>

                                           </table>
                                       </div>




                                   </div>
                               </div>
                               <!-- Base Style - Compact end -->

                               <div class="card">

                                   <div class="card-block">
                                       <!-- <h4 class="sub-title">Basic Inputs</h4> -->

                                       <div class="form-group row">
                                           <label class="col-sm-2 col-form-label">
                                           </label>
                                           <div class="col-sm-5">
                                               <a href="roles" class="btn btn-primary btn-outline-primary btn-block"> <i class="icofont icofont-close-circled"></i>
                                                   Cancel</a>
                                           </div>
                                           <div class="col-sm-5">
                                               <button class="btn btn-primary btn-outline-primary btn-block"><i class="icofont icofont-diskette"></i>
                                                   Save</button>
                                           </div>
                                       </div>



                                       </form>

                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
                   <!-- Page body end -->
               </div>
           </div>
           <!-- Main-body end -->

           <div id="styleSelector">

           </div>
       </div>
   </div>