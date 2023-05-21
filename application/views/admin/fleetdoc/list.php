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
                                    <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit</span> -->
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
                                    <!-- <li class="breadcrumb-item" style="float: left;"><a href="#!">Task list</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Task list card start -->
                            <div class="card">

                                <div class="card-block task-list">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped custom-table dataTable">

                                            <!-- <table id="simpletable" class="table dt-responsive task-list-table table-striped table-bordered nowrap"> -->
                                            <thead>
                                                <tr style="text-transform:uppercase;">
                                                    <th>No</th>
                                                    <th>category name</th>

                                                    <th>status</th>
                                                    <th>created by</th>

                                                    <th>created date</th>
                                                    <th>Updated date</th>

                                                    <th>Action</th>



                                                </tr>
                                            </thead>
                                            <tbody class="task-page">

                                                <?php $no = 1; ?>
                                                <?php foreach ($jobIndustries as $record) : ?>

                                                    <tr>

                                                        <td><?php echo $no++ ?></td>
                                                        <td>
                                                            <?php echo strtoupper($record->categoryname); ?>
                                                        </td>

                                                        <td>




                                                            <?php if ($record->status == 0) { ?>
                                                                <span class=" bg-success label label-lg label-light-primary label-inline">Active</span>
                                                            <?php } ?>

                                                            <?php if ($record->status != 0) { ?>
                                                                <span class="bg-danger label label-lg label-light-danger label-inline">Inactive</span>
                                                            <?php } ?>

                                                        </td>

                                                        <td>

                                                            <?php echo strtoupper($record->lastname . " " . $record->firstname . " " . $record->othername) ?>
                                                        </td>



                                                        <td> <?php echo ($record->created_at); ?></td>
                                                        <td> <?php echo ($record->updated_at); ?></td>





                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                                                <div class="dropdown-menu">





                                                                    <!-- <a class="dropdown-item" href="#" id="bntedit" data-toggle="modal" data-target="#editstaff" data-categoryid="<?php echo $record->id; ?>" data-categoryname="<?php echo $record->categoryname; ?>">Edit Category</a> -->






                                                                    <!-- ===============================================UPDATE============================================================================================================ -->

                                                                    <?php foreach ($privileges as $recordd) : ?>
                                                                        <?php if ($recordd->module == 'Industry' and $recordd->update == 'yes') { ?>
                                                                            <form method="post" action="industryadd">
                                                                                <input type="hidden" name="categoryid" value="<?php echo $record->id ?>">
                                                                                <button type="submit" class="dropdown-item" name="categoryname" value="<?php echo ($record->categoryname); ?>">View Info</button>


                                                                            </form>


                                                                        <?php } ?>
                                                                    <?php endforeach; ?>
                                                                    <?php if (($role === 'Developer' || $role === 'jobseeker' || $role === 'Admin')) { ?>
                                                                        <form method="post" action="industryadd">
                                                                            <input type="hidden" name="categoryid" value="<?php echo $record->id ?>">
                                                                            <button type="submit" class="dropdown-item" name="categoryname" value="<?php echo ($record->categoryname); ?>">View Info</button>


                                                                        </form>

                                                                    <?php } ?>

                                                                    <!-- ===============================================DISABLE============================================================================================================ -->

                                                                    <?php foreach ($privileges as $recordd) : ?>
                                                                        <?php if ($recordd->module == 'Industry' and $recordd->disable == 'yes') { ?>
                                                                            <?php if ($record->status == 0) { ?>
                                                                                <a class="dropdown-item" href="#" id="btnlock" onclick="btnlock()" data-toggle="modal" data-target="#disUser" data-categoryid="<?php echo $record->id; ?>" data-categoryname="<?php echo strtoupper($record->categoryname); ?>">Disable Category</a>
                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    <?php endforeach; ?>
                                                                    <?php if (($role === 'Developer' || $role === 'jobseeker' || $role === 'Admin')) { ?>
                                                                        <?php if ($record->status == 0) { ?>
                                                                            <a class="dropdown-item" href="#" id="btnlock" onclick="btnlock()" data-toggle="modal" data-target="#disUser" data-categoryid="<?php echo $record->id; ?>" data-categoryname="<?php echo strtoupper($record->categoryname); ?>">Disable Category</a>
                                                                        <?php } ?>


                                                                    <?php } ?>

                                                                    <!-- ===============================================ENABLE============================================================================================================ -->

                                                                    <?php foreach ($privileges as $recordd) : ?>
                                                                        <?php if ($recordd->module == 'Industry' and $recordd->enable == 'yes') { ?>
                                                                            <?php if ($record->status != 0) { ?>
                                                                                <a class="dropdown-item" href="#" id="btnunlock" onclick="btnunlock()" data-toggle="modal" data-target="#activateuser" data-categoryid="<?php echo $record->id; ?>" data-categoryname="<?php echo strtoupper($record->categoryname); ?>">Activate Category</a>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php endforeach; ?>
                                                                    <?php if (($role === 'Developer' || $role === 'jobseeker' || $role === 'Admin')) { ?>
                                                                        <?php if ($record->status != 0) { ?>
                                                                            <a class="dropdown-item" href="#" id="btnunlock" onclick="btnunlock()" data-toggle="modal" data-target="#activateuser" data-categoryid="<?php echo $record->id; ?>" data-categoryname="<?php echo strtoupper($record->categoryname); ?>">Activate Category</a>
                                                                        <?php } ?>
                                                                    <?php } ?>


                                                                    <!-- ===============================================DELETE============================================================================================================ -->

                                                                    <?php foreach ($privileges as $recordd) : ?>
                                                                        <?php if ($recordd->module == 'Industry' and $recordd->delete == 'yes') { ?>


                                                                            <a class="dropdown-item" href="#" id="btndelete" onclick="btndelete()" data-toggle="modal" data-target="#deleteUser" data-categoryid="<?php echo $record->id; ?>" data-categoryname="<?php echo strtoupper($record->categoryname); ?>">Delete Category</a>


                                                                        <?php } ?>
                                                                    <?php endforeach; ?>
                                                                    <?php if (($role === 'Developer' || $role === 'jobseeker' || $role === 'Admin')) { ?>


                                                                        <a class="dropdown-item" href="#" id="btndelete" onclick="btndelete()" data-toggle="modal" data-target="#deleteUser" data-categoryid="<?php echo $record->id; ?>" data-categoryname="<?php echo strtoupper($record->categoryname); ?>">Delete Category</a>

                                                                    <?php } ?>



                                                                    <!-- =========================================================================================================================================================== -->



                                                                    <div class="dropdown-divider"></div>

                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                <?php endforeach; ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Zero config.table card end -->
                                <!-- Default ordering table card start -->
                                <!-- Default ordering table card end -->
                            </div>
                            <!-- Task list card end -->
                            <!-- To list card start -->

                            <!-- To list card end -->
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
            <!-- Main-body end -->

            <div id="styleSelector">

            </div>
        </div>
    </div>
</div>