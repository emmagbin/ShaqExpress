<div class="col-sm-8 text-right m-b-20">
    <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Create New fleet Category</a>
    <div class="view-icons">
        <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
        <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <!-- SELECT `id`, `vehicletypename`, `status`, `createdby`, `created_at`, `updatedby`, `updated_at` FROM `vehicletype` WHERE 1 -->
            <div class="card-box">
                <table id="datatable" class="table table-striped custom-table dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vehicle Type Name</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($get_all_vehicletype as $record) : ?>

                            <tr>
                                <td><?php $no++ ?></td>
                                <td> <?php echo ($record->vehicletypename); ?></td>
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
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" class="edit_diasble_enableVehicletype" data-target="#edit_vehicletype" title="Edit" data-id="<?php echo $record->id; ?>" data-vehicletypename="<?php echo $record->vehicletypename; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>

                                            <?php if ($record->status === "1") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enableVehicletype" data-target="#disable_vehicletype" title="Disable" data-id="<?php echo $record->id; ?>" data-vehicletypename="<?php echo $record->vehicletypename; ?>"><i class="fa fa-lock m-r-5"></i> Disable</a></li>
                                            <?php } ?>

                                            <?php if ($record->status === "0") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enableVehicletype" data-target="#enable_vehicletype" title="Enable" data-id="<?php echo $record->id; ?>" data-vehicletypename="<?php echo $record->vehicletypename; ?>"><i class="fa fa-unlock m-r-5"></i> Enable</a></li>
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

<div id="add_department" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="modal-content modal-md">
            <div class="card-box">
                <div class="modal-header">
                    <h4 class="modal-title">Add Fleet Category</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Fleetcategory_Controller/createvehicletype">
                        <div class="form-group">
                            <label>Fleet Category Name <span class="text-danger">*</span></label>
                            <input class="form-control" name="vehicletypename" required="" type="text">
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Create Fleet Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit_vehicletype" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Edit Fleet Category</h4>
            </div>
            <div class="card-box">
                <div class="modal-body">
                    <form method="POST" action="Fleetcategory_Controller/updatevehicleType">

                        <div class="form-group">
                            <input class="form-control txtid" name="id" type="hidden">

                            <label>Fleet Category Name <span class="text-danger">*</span></label>
                            <input class="form-control txtvehicletypename" name="vehicletypename" type="text">
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="enable_vehicletype" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Enable Fleet Category</h4>
            </div>
            <form method="POST" action="Fleetcategory_Controller/enabl_disable_vehicleType">
                <input type="hidden" class="txtid" name="id">
                <input type="hidden" value="enable" name="enabledisable">
                <div class="modal-body card-box">

                    <p>Are you sure want to Enable <span style="text-transform: capitalize;color:brown;" class="vehicletypename"></span>?</p>
                    <div class="m-t-20 text-left">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Enable</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="disable_vehicletype" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Disable Fleet Category</h4>
            </div>
            <form method="POST" action="Fleetcategory_Controller/enabl_disable_vehicleType">
                <input type="hidden" class="txtid" name="id">
                <input type="hidden" value="disable" name="enabledisable">

                <div class="modal-body card-box">

                    <p>Are you sure want to Disable <span style="text-transform: capitalize;color:brown;" class="vehicletypename"></span>?</p>
                    <div class="m-t-20 text-left">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Disable</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>