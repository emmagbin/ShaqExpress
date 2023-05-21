<div class="col-sm-8 text-right m-b-20">
    <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create New Fleet Driver/ Rider</a>
    <div class="view-icons">
        <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
        <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
    </div>
</div>
</div>
<!-- <div class="row filter-row">
    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus">
            <label class="control-label">Project Name</label>
            <input type="text" class="form-control floating" />
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus">
            <label class="control-label">Employee Name</label>
            <input type="text" class="form-control floating" />
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus select-focus">
            <label class="control-label">Role</label>
            <select class="select floating">
                <option value="">Select Roll</option>
                <option value="">Web Developer</option>
                <option value="1">Web Designer</option>
                <option value="1">Android Developer</option>
                <option value="1">Ios Developer</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <a href="#" class="btn btn-success btn-block"> Search </a>
    </div>
</div> -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <div class="card-box">
                <!-- <table class="table table-striped custom-table datatable"> -->
                <table id="datatable" class="table table-striped custom-table dataTable">

                    <thead>
                        <tr>
                            <th>Riders Name</th>
                            <th>Contact</th>
                            <th>Expiry Date</th>
                            <th>License Status</th>

                            <th>Driver Status</th>
                            <th>Created Date</th>
                            <th>Created Date</th>

                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($get_all_drivers as $record) : ?>
                            <tr>
                                <td>
                                    <img class="avatar" src="<?php echo base_url() ?>assets/drivers/passport/<?php echo $record->passport ?>" alt="">

                                    <!-- <a class="avatar">J</a> -->
                                    <h2><a> <?php echo ($record->lastname . " " . $record->othernames); ?> <span> <?php echo ($record->licenseno); ?></span></a></h2>
                                </td>
                                <td>
                                    <?php echo ($record->phonenumner); ?>
                                </td>

                                <td> <?php echo ($record->licenseexpiry); ?></td>


                                <td>
                                    <?php if ($record->licenseexpiry >= date("Y-m-d")) { ?>
                                        <span class="bg-success label label-lg label-light-primary label-inline">Active</span>
                                    <?php } ?>

                                    <?php if ($record->licenseexpiry < date("Y-m-d")) { ?>
                                        <span class="bg-danger label label-lg label-light-danger label-inline">Expired</span>
                                    <?php } ?>
                                </td>

                                <td>
                                    <?php if ($record->status === "1") { ?>
                                        <span class="bg-success label label-lg label-light-primary label-inline">Active</span>
                                    <?php } ?>

                                    <?php if ($record->status === "0") { ?>
                                        <span class="bg-danger label label-lg label-light-danger label-inline">Disabled</span>
                                    <?php } ?>
                                </td>

                                <td> <?php echo ($record->creator); ?></td>

                                <td> <?php echo ($record->created_at); ?></td>


                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" class="edit_diasble_enable" data-target="#edit_driver" data-id="<?php echo $record->id; ?>" data-lastname="<?php echo $record->lastname; ?>" data-othernames="<?php echo $record->othernames; ?>" data-dob="<?php echo $record->dob; ?>" data-phonenumner="<?php echo $record->phonenumner; ?>" data-gender="<?php echo $record->gender; ?>" data-licenseno="<?php echo $record->licenseno; ?>" data-licenseclass="<?php echo $record->licenseclass; ?>" data-licenseexpiry="<?php echo $record->licenseexpiry; ?>" data-passport="<?php echo $record->passport; ?>" data-license="<?php echo $record->license; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <?php if ($record->status === "1") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable" data-target="#disable_driver" data-id="<?php echo $record->id; ?>" data-lastname="<?php echo $record->lastname; ?>" data-othernames="<?php echo $record->othernames; ?>" data-dob="<?php echo $record->dob; ?>" data-phonenumner="<?php echo $record->phonenumner; ?>" data-gender="<?php echo $record->gender; ?>" data-licenseno="<?php echo $record->licenseno; ?>" data-licenseclass="<?php echo $record->licenseclass; ?>" data-licenseexpiry="<?php echo $record->licenseexpiry; ?>" data-passport="<?php echo $record->passport; ?>" data-license="<?php echo $record->license; ?>"><i class="fa fa-lock m-r-5"></i> Disable</a></li>
                                            <?php } ?>

                                            <?php if ($record->status === "0") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable" data-target="#enable_driver" data-id="<?php echo $record->id; ?>" data-lastname="<?php echo $record->lastname; ?>" data-othernames="<?php echo $record->othernames; ?>" data-dob="<?php echo $record->dob; ?>" data-phonenumner="<?php echo $record->phonenumner; ?>" data-gender="<?php echo $record->gender; ?>" data-licenseno="<?php echo $record->licenseno; ?>" data-licenseclass="<?php echo $record->licenseclass; ?>" data-licenseexpiry="<?php echo $record->licenseexpiry; ?>" data-passport="<?php echo $record->passport; ?>" data-license="<?php echo $record->license; ?>"><i class="fa fa-unlock m-r-5"></i> Enable</a></li>
                                            <?php } ?>


                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
<div class="notification-box">
    <div class="msg-sidebar notifications msg-noti">
        <div class="topnav-dropdown-header">
            <span>Messages</span>
        </div>
        <div class="drop-scroll msg-list-scroll">
            <ul class="list-box">
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">R</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Richard Miles </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item new-message">
                            <div class="list-left">
                                <span class="avatar">J</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">John Doe</span>
                                <span class="message-time">1 Aug</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">T</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Tarah Shropshire </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">M</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Mike Litorus</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">C</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Catherine Manseau </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">D</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Domenic Houston </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">B</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Buster Wigton </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">R</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Rolland Webber </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">C</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Claire Mapes </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">M</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Melita Faucher</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">J</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Jeffery Lalor</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">L</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Loren Gatlin</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">T</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Tarah Shropshire</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="topnav-dropdown-footer">
            <a href="chat.html">See all messages</a>
        </div>
    </div>
</div>
</div>
<div id="create_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Create Rider</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Drivers_Controller/createdriver'); ?>

                <div class="card-box">
                    <h3 class="card-title">Driver / Rider Boi Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" id="output_image" src="assets/img/user.jpg" alt="user">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload picture</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Rider Last Name</label>
                                            <input class="form-control floating" name="lastname" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Rider Other Names</label>

                                            <input class="form-control floating" name="othernames" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="select form-control floating" name="gender">
                                                <option value="">Select Gendar</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input class="form-control floating" name="dob" type="date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Rider Contact</label>
                                            <div><input class="form-control floating" name="phonenumner" type="text"></div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>


                <div class="card-box">
                    <h3 class="card-title">License Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" id="output_image_License" src="assets/img/user.jpg" alt="user">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload License </span>
                                    <input class="upload" name="output_image_License" type="file" accept="image/*" onchange="preview_image_License(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Drivers License Number</label>
                                            <input class="form-control" name="licenseno" type="text">
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Drivers License Expiry Date</label>
                                            <input class="form-control" name="licenseexpiry" type="date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp; Drivers License Class</label>
                                            <select class="select" name="licenseclass">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br> <br>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="card-box">
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Create Driver</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="edit_driver" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Riders Information</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Drivers_Controller/updatedriver'); ?>

                <div class="card-box">
                    <h3 class="card-title">Driver / Rider Boi Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block txtpassport" id="output_image_edit" src="assets/img/user.jpg" alt="">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload picture</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image_pass_edit(event)">


                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Rider Last Name</label>

                                            <input type="hidden" name="id" class="txtid">

                                            <input type="hidden" name="txtpassport_id" id="txtpassport_id">




                                            <input class="form-control floating " id="txtlastname" name="lastname" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Rider Other Names</label>

                                            <input class="form-control floating " id="txtothernames" name="othernames" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="select form-control floating" id="txtgender" name="gender">
                                                <option value="">Select Gendar</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input class="form-control floating datetimepicker" id="txtdob" name="dob" type="date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Rider Contact</label>
                                            <div><input class="form-control floating" id="txtphonenumner" name="phonenumner" type="text"></div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>


                <div class="card-box">
                    <h3 class="card-title">License Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <input type="hidden" name="txtlicense_id" id="txtlicense_id">
                                <img class="inline-block txtlicense" id="output_image_License_edit" src="assets/img/user.jpg" alt="">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload License </span>
                                    <input class="upload " name="output_image_License" type="file" accept="image/*" onchange="preview_image_License_edit(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Drivers License Number</label>
                                            <input class="form-control" name="licenseno" id="txtlicenseno" type="text">
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Drivers License Expiry Date</label>
                                            <input class="form-control" id="txtlicenseexpiry" name="licenseexpiry" type="date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp; Drivers License Class</label>
                                            <select class="select" id="txtlicenseclass" name="licenseclass">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br> <br>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="card-box">
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Update Driver</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="disable_driver" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Disable Driver / Rider</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="Drivers_Controller/enabl_disable_edriver">

                    <input type="hidden" value="disable" name="enabledisable">

                    <input type="hidden" class="txtid" name="id">

                    <p>Are you sure want to Disable <span style="text-transform: capitalize;color:brown;" class="drivername"></span>?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Disable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="enable_driver" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Enable Driver / Rider</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="Drivers_Controller/enabl_disable_edriver">
                    <input type="hidden" class="txtid" name="id">
                    <input type="hidden" value="enable" name="enabledisable">

                    <p>Are you sure want to Enable <span style="text-transform: capitalize;color:brown;" class="drivername"></span>?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Enable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>