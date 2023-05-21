<div class="col-sm-8 text-right m-b-20">
    <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create New Driver & Fleet Link</a>
    <div class="view-icons">
        <!-- <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                     <a href="" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> -->
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-box">

            <div class="table-responsive">

                <table id="datatable" class="table table-striped custom-table dataTable">

                    <thead>
                        <tr>

                            <th>Driver</th>
                            <th>Vehicle</th>

                            <th>Status
                            </th>
                            <th>Linked By
                            </th>

                            <th>Link Date
                            </th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($get_all_link as $record) :  ?>


                            <tr>

                                <td> <img class="avatar" src="<?php echo base_url() ?>assets/drivers/passport/<?php echo $record->passport ?>" alt="">
                                    <h2><a> <?php echo ($record->driver); ?> <span> <?php echo ($record->licenseno); ?></span></a></h2>
                                </td>

                                <td> <img class="avatar" src="<?php echo base_url() ?>assets/vehicle/photos/<?php echo $record->vehiclephoto ?>" alt="">
                                    <h2><a> <?php echo ($record->plateno); ?></a></h2>
                                </td>


                                <td>
                                    <?php if ($record->status === "1") { ?>
                                        <span class="bg-success label label-lg label-light-primary label-inline">Active</span>
                                    <?php } ?>

                                    <?php if ($record->status === "0") { ?>
                                        <span class="bg-danger label label-lg label-light-danger label-inline">Disabled</span>
                                    <?php } ?>
                                </td>
                                <td> <?php echo ($record->creator); ?> </td>
                                <td> <?php echo ($record->created_at); ?> </td>




                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" class="edit_diasble_enable_expenses" id="edit_diasble_enable_expenses" data-target="#edit_project" data-id="<?php echo $record->id; ?>" data-driverid="<?php echo $record->driverid; ?>" data-vehicleid="<?php echo $record->vehicleid; ?>">
                                                    <i class="fa fa-pencil m-r-5"></i> Edit</a></li>



                                            <?php if ($record->status === "1") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_expenses" id="edit_diasble_enable_expenses" data-target="#diasble_expenses" data-id="<?php echo $record->id; ?>" data-driverid="<?php echo $record->driverid; ?>" data-vehicleid="<?php echo $record->vehicleid; ?>">
                                                        <i class="fa fa-pencil m-r-5"></i> Disable</a></li>
                                            <?php } ?>

                                            <?php if ($record->status === "0") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_expenses" id="edit_diasble_enable_expenses" data-target="#enable_expenses" data-id="<?php echo $record->id; ?>" data-driverid="<?php echo $record->driverid; ?>" data-vehicleid="<?php echo $record->vehicleid; ?>">
                                                        <i class="fa fa-pencil m-r-5"></i> Enable</a></li> <?php } ?>

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
                <h4 class="modal-title">Driver & Fleet Link</h4>
            </div>

            <div class="card-box">
                <div class="modal-body">
                    <form method="POST" action="link_controller/createlink">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Drivers Name
                                    </label>

                                    <select class="select form-control floating txtdriverid" name="driverid" required>
                                        <option value="" selected disabled>SELECT RIDER</option>

                                        <?php foreach ($get_all_drivers  as $each) {
                                        ?>
                                            <option value="<?= $each['id'] ?>"><?= $each['drivers'] ?></option>
                                        <?php
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>&nbsp;Fleet Plate No</label>
                                    <select class="select form-control floating txtvehicleid" name="vehicleid" required>
                                        <option value="" selected disabled>SELECT Fleet Plate No</option>

                                        <?php foreach ($get_all_fleets  as $each) {
                                        ?>
                                            <option value="<?= $each['id'] ?>"><?= $each['plateno'] ?></option>
                                        <?php
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Link Driver & Fleet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Driver & Fleet</h4>
            </div>
            <div class="card-box">
                <div class="modal-body">
                    <form method="POST" action="link_controller/createlink">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Drivers Name
                                    </label>

                                    <select class="select form-control floating txtdriverid" name="driverid" id="txtdriverid" required>




                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>&nbsp;Fleet Plate No</label>
                                    <select class="select form-control floating txtvehicleid" name="vehicleid" required>




                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Update Driver & Fleet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="diasble_expenses" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Disable Link</h4>
            </div>
            <form method="POST" action="link_controller/enabl_disable_link">

                <div class="modal-body card-box">
                    <input type="hidden" value="disable" name="enabledisable">

                    <input type="hidden" class="txtid" name="id">
                    <p>Are you sure want to Disable <span class="spantxtexpensetype"></span> ?</p>
                    <div class="m-t-20 text-left">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Disable</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="enable_expenses" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">

                <h4 class="modal-title">Enable Link</h4>
            </div>
            <form method="POST" action="link_controller/enabl_disable_link">

                <div class="modal-body card-box">
                    <input type="hidden" class="txtid" name="id">

                    <input type="hidden" value="enable" name="enabledisable">

                    <p>Are you sure want to Enable <span class="spantxtexpensetype"></span> ?</p>
                    <div class="m-t-20 text-left">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Enable</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>