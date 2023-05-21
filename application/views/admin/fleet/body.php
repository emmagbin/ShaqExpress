<div class="col-sm-8 text-right m-b-20">
    <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create New Fleet</a>
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
                            <th>Number Plate</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>RoadWork Status</th>

                            <th>Insurance Status</th>

                            <th>Purchased Date</th>

                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Created Date</th>

                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($get_all_fleets as $record) : ?>
                            <tr>
                                <td>
                                    <img class="avatar" src="<?php echo base_url() ?>assets/vehicle/photos/<?php echo $record->vehiclephoto ?>" alt="">

                                    <h2><a> <?php echo ($record->plateno); ?> <span> <?php echo ($record->vehicleType); ?></span></a> </h2>
                                </td>
                                <td>
                                    <?php echo ($record->brand); ?>
                                </td>

                                <td> <?php echo ($record->model); ?></td>


                                <td>
                                    <?php if ($record->roadworkExpiry >= date("Y-m-d")) { ?>
                                        <span class="bg-success label label-lg label-light-primary label-inline">Active</span>
                                    <?php } ?>

                                    <?php if ($record->roadworkExpiry < date("Y-m-d")) { ?>
                                        <span class="bg-danger label label-lg label-light-danger label-inline">Expired</span>
                                    <?php } ?>
                                </td>


                                <td>
                                    <?php if ($record->insuranceexpiry >= date("Y-m-d")) { ?>
                                        <span class="bg-success label label-lg label-light-primary label-inline">Active</span>
                                    <?php } ?>

                                    <?php if ($record->insuranceexpiry < date("Y-m-d")) { ?>
                                        <span class="bg-danger label label-lg label-light-danger label-inline">Expired</span>
                                    <?php } ?>
                                </td>


                                <td> <?php echo ($record->purchasedate); ?></td>
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
                                <!-- `plateno`, vehiclephoto `vehicleType`, `brand`, `model`, `roadworkstart`, `roadworkExpiry`, `insurancestart`, `insuranceexpiry`, `purchasedate` -->


                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" class="edit_diasble_enable_vehicle" data-target="#edit_driver" data-id="<?php echo $record->id; ?>" data-plateno="<?php echo $record->plateno; ?>" data-vehiclephoto="<?php echo $record->vehiclephoto; ?>" data-vehicleType="<?php echo $record->vehicleType; ?>" data-brand="<?php echo $record->brand; ?>" data-model="<?php echo $record->model; ?>" data-roadworkstart="<?php echo $record->roadworkstart; ?>" data-roadworkExpiry="<?php echo $record->roadworkExpiry; ?>" data-insurancestart="<?php echo $record->insurancestart; ?>" data-insuranceexpiry="<?php echo $record->insuranceexpiry; ?>" data-purchasedate="<?php echo $record->purchasedate; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>

                                            <?php if ($record->status === "1") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_vehicle" data-target="#disable_driver" data-id="<?php echo $record->id; ?>" data-plateno="<?php echo $record->plateno; ?>" data-vehiclephoto="<?php echo $record->vehiclephoto; ?>" data-vehicleType="<?php echo $record->vehicleType; ?>" data-brand="<?php echo $record->brand; ?>" data-model="<?php echo $record->model; ?>" data-roadworkstart="<?php echo $record->roadworkstart; ?>" data-roadworkExpiry="<?php echo $record->roadworkExpiry; ?>" data-insurancestart="<?php echo $record->insurancestart; ?>" data-insuranceexpiry="<?php echo $record->insuranceexpiry; ?>" data-purchasedate="<?php echo $record->purchasedate; ?>"><i class="fa fa-lock m-r-5"></i> Disable</a></li>
                                            <?php } ?>

                                            <?php if ($record->status === "0") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_vehicle" data-target="#enable_driver" data-id="<?php echo $record->id; ?>" data-plateno="<?php echo $record->plateno; ?>" data-vehiclephoto="<?php echo $record->vehiclephoto; ?>" data-vehicleType="<?php echo $record->vehicleType; ?>" data-brand="<?php echo $record->brand; ?>" data-model="<?php echo $record->model; ?>" data-roadworkstart="<?php echo $record->roadworkstart; ?>" data-roadworkExpiry="<?php echo $record->roadworkExpiry; ?>" data-insurancestart="<?php echo $record->insurancestart; ?>" data-insuranceexpiry="<?php echo $record->insuranceexpiry; ?>" data-purchasedate="<?php echo $record->purchasedate; ?>"><i class="fa fa-unlock m-r-5"></i> Enable</a></li>
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
                <h4 class="modal-title">Create New Vehicle</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Fleet_controller/createfleet'); ?>

                <!-- `plateno`, vehiclephoto `vehicleType`, `brand`, `model`, `roadworkstart`, `roadworkExpiry`, `insurancestart`, `insuranceexpiry`, `purchasedate` -->

                <div class="card-box">
                    <h3 class="card-title">Vehicle Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" id="output_image_edit" src="assets/vehicle/photos/defaultphot.png" alt="user">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload Vehicle</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image_vehicle_edit(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number Plate</label>
                                            <input class="form-control floating" name="plateno" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>vehicleType</label>
                                            <select class="select form-control floating" name="vehicleType">
                                                <option value="">Select Gendar</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Brand</label>
                                            <input class="form-control floating" name="brand" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Model</label>
                                            <input class="form-control floating" name="model" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Road Workstart</label>
                                            <input class="form-control floating" name="roadworkstart" type="date">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Roadwork Expiry</label>
                                            <input class="form-control floating" name="roadworkExpiry" type="date">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insurance Start</label>
                                            <input class="form-control floating" name="insurancestart" type="date">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insurance Expiry</label>
                                            <input class="form-control floating" name="insuranceexpiry" type="date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Purchase Date</label>
                                            <div><input class="form-control floating" name="purchasedate" type="date"></div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>




                <div class="card-box">
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Add Vehicle</button>
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
                <h4 class="modal-title">Edit Vehicle</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Fleet_controller/updatefleet'); ?>

                <div class="card-box">
                    <h3 class="card-title">Vehicle Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block txtvehiclephoto" id="output_image" src="assets/vehicle/photos/defaultphot.png" alt="">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Edit Photo</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <input type="text" name="id" class="txtid">

                                            <input type="text" name="txtvehiclephoto_id" class="txtvehiclephoto_id">


                                            <label>Number Plate</label>
                                            <input class="form-control floating txtplateno" name="plateno" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>vehicleType</label>
                                            <select class="select form-control txtvehicleType" id="txtvehicleType" name="vehicleType">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Brand</label>
                                            <input class="form-control floating txtbrand" name="brand" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Model</label>
                                            <input class="form-control floating txtmodel" name="model" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Road Workstart</label>
                                            <input class="form-control floating txtroadworkstart" name="roadworkstart" type="date">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Roadwork Expiry</label>
                                            <input class="form-control floating " id="txtroadworkExpiry" name="roadworkExpiry" type="date">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insurance Start</label>
                                            <input class="form-control floating  " id="txtinsurancestart" name="insurancestart" type="date">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insurance Expiry</label>
                                            <input class="form-control floating txtinsuranceexpiry" id="txtinsuranceexpiry" name="insuranceexpiry" type="date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Purchase Date</label>
                                            <div><input class="form-control floating txtpurchasedate" name="purchasedate" type="date"></div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>




                <div class="card-box">
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Update Vehicle</button>
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
                <h4 class="modal-title">Disable Vehicle</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="Fleet_controller/enabl_disable_fleet">

                    <input type="hidden" value="disable" name="enabledisable">

                    <input type="hidden" class="txtid" name="id">

                    <p>Are you sure want to Disable Vehicle with Number Plate as <span style="text-transform: capitalize;color:brown;" class="vehicle"></span>?</p>
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
                <h4 class="modal-title">Enable Vehicle</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="Fleet_controller/enabl_disable_fleet">
                    <input type="hidden" class="txtid" name="id">
                    <input type="hidden" value="enable" name="enabledisable">

                    <p>Are you sure want to Enable Vehicle With Number Plate <span style="text-transform: capitalize;color:brown;" class="vehicle"></span>?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Enable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>