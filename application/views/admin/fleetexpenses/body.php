<div class="col-sm-8 text-right m-b-20">
    <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create New Fleet Expeses</a>
    <div class="view-icons">
        <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
        <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
    </div>
</div>
</div>
<!-- <div class="row filter-row">
    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus">
            <label class="control-label">Fleet No</label>
            <input type="text" class="form-control floating" />
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus">
            <label class="control-label">Date from</label>
            <input type="date" class="form-control floating" />
        </div>
    </div>

    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus">
            <label class="control-label">Date To</label>
            <input type="date" class="form-control floating" />
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
                <table id="datatable" class="table table-striped custom-table dataTable">
                    <thead>
                        <tr>
                            <th>Rider</th>
                            <th>Fleet</th>
                            <th>Reciept</th>
                            <th>Cost</th>
                            <th>Expenses Type</th>
                            <th>Expenses Date</th>
                            <th>Expenses Status</th>

                            <th>Entered By</th>
                            <th>Date</th>

                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($get_all_fleetexpenses as $record) : ?>
                            <tr>
                                <td>
                                    <img class="avatar" src="<?php echo base_url() ?>assets/drivers/passport/<?php echo $record->passport ?>" alt="">
                                    <h2><a> <?php echo ($record->driver); ?> <span> <?php echo ($record->licenseno); ?></span></a></h2>
                                </td>
                                <td>
                                    <img class="avatar" src="<?php echo base_url() ?>assets/vehicle/photos/<?php echo $record->vehiclephoto ?>" alt="">

                                    <h2><a> <?php echo ($record->plateno); ?> <span> <?php echo ($record->vehicleType); ?></span><span>
                                                <?php if ($record->vstatus === "1") { ?>
                                                    <span class="bg-success label label-lg label-light-primary label-inline " style="color: white !important;">Active</span>
                                                <?php } ?>

                                                <?php if ($record->vstatus === "0") { ?>
                                                    <span class="bg-danger label label-lg label-light-danger label-inline" style="color: white !important;">Disabled</span>
                                                <?php } ?></span></a> </h2>

                                </td>
                                <td>
                                    <img class="avatar" src="<?php echo base_url() ?>assets/reciept/<?php echo $record->reciept ?>" alt="">

                                </td>

                                <td><?php echo $record->amount ?> </td>
                                <td><?php echo $record->expensetype ?> </td>
                                <td><?php echo $record->expensesdate ?> </td>
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
                                            <li><a href="#" data-toggle="modal" class="edit_diasble_enable_fleetexpensefleetexpense" data-target="#edit_project" data-id="<?php echo $record->id; ?>" data-fleetid="<?php echo $record->fleetid; ?>" data-expensestype="<?php echo $record->expensestype; ?>" data-amount="<?php echo $record->amount; ?>" data-expensesdate="<?php echo $record->expensesdate; ?>" data-description="<?php echo $record->description; ?>" data-reciept="<?php echo $record->reciept; ?>"> <i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <?php if ($record->status === "1") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_fleetexpensefleetexpense" data-target="#disable_project" data-id="<?php echo $record->id; ?>" data-fleetid="<?php echo $record->fleetid; ?>" data-expensestype="<?php echo $record->expensestype; ?>" data-amount="<?php echo $record->amount; ?>" data-expensesdate="<?php echo $record->expensesdate; ?>" data-description="<?php echo $record->description; ?>"><i class="fa fa-trash-o m-r-5"></i> Disable</a></li>
                                            <?php } ?>

                                            <?php if ($record->status === "0") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_fleetexpensefleetexpense" data-target="#enable_project" data-id="<?php echo $record->id; ?>" data-fleetid="<?php echo $record->fleetid; ?>" data-expensestype="<?php echo $record->expensestype; ?>" data-amount="<?php echo $record->amount; ?>" data-expensesdate="<?php echo $record->expensesdate; ?>" data-description="<?php echo $record->description; ?>"><i class="fa fa-trash-o m-r-5"></i> Enable</a></li>
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
                <h4 class="modal-title">Fleet Expenses</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Fleet_expenses_controller/createfleetexpenses'); ?>

                <div class="card-box">
                    <h3 class="card-title">Fleet Expenses Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" id="output_image" src="assets/reciept/default.png" alt="user">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload Receipt</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Number Plate</label>

                                            <select class="select form-control floating" name="fleetid">
                                                <option selected disabled>Select Number Plate</option>
                                                <?php foreach ($get_all_fleets  as $each) {
                                                ?>
                                                    <option value="<?= $each['id'] ?>"><?= $each['plateno'] ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Expenses Type</label>
                                            <select class="select form-control floating" name="expensestype">
                                                <option selected disabled>Select Vehicle Expenses Type</option>
                                                <?php foreach ($getexpensestype  as $each) {
                                                ?>
                                                    <option value="<?= $each['id'] ?>"><?= $each['expensetype'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- SELECT `id`, `fleetid`, `expensestype`, `amount`, `expensesdate`, `description`, `reciept`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `fleetexpenses` WHERE 1 -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control floating" name="amount" type="text">

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Expenses Made Date</label>
                                            <input class="form-control floating" name="expensesdate" type="date">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control floating" name="description" rows="4" cols="50"> </textarea>

                                        </div>
                                    </div>



                                </div>


                            </div>
                        </div>
                    </div>

                </div>



                <div class="card-box">
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Save Vehicle Document</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="edit_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Fleet Expenses</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Fleet_expenses_controller/updateFleet_expenses'); ?>

                <div class="card-box">
                    <h3 class="card-title">Fleet Expenses Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block txtrecieptphoto" id="output_image_edit" src="assets/img/" alt="">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Edit reciept</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image_doc_edit(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="txtreciept_id" class="txtreciept_id">
                                            <input type="hidden" name="id" class="txtid">

                                            <label>Vehicle Number Plate</label>
                                            <select class="select form-control floating txtfleetid" name="fleetid">
                                                <option disabled>Select Number Plate</option>

                                                <?php foreach ($get_all_fleets  as $each) {
                                                ?>
                                                    <option value="<?= $each['id'] ?>"><?= $each['plateno'] ?></option>
                                                <?php
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Expenses Type</label>
                                            <select class="select form-control floating txtexpensestype" name="expensestype">
                                                <option selected disabled>Select Vehicle Expenses Type</option>
                                                <?php foreach ($getexpensestype  as $each) {
                                                ?>
                                                    <option value="<?= $each['id'] ?>"><?= $each['expensetype'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control floating txtamount" name="amount" type="text">

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Expenses Made Date</label>
                                            <input class="form-control floating txtexpensesdate" name="expensesdate" type="date">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control floating txtdescription" name="description" rows="4" cols="50"> </textarea>

                                        </div>
                                    </div>



                                </div>



                            </div>
                        </div>
                    </div>

                </div>







                <div class="card-box">
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Update Vehicle Doc </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="disable_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Disable Fleet Expenses</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="Fleet_expenses_controller/enable_disable_Fleet_expenses">

                    <input type="hidden" value="disable" name="enabledisable">

                    <input type="hidden" class="txtid" name="id">

                    <p>Are you sure want to Disable This Expense ?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Disable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="enable_project" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Enable Fleet Expenses</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="Fleet_expenses_controller/enable_disable_Fleet_expenses">

                    <input type="hidden" value="enable" name="enabledisable">

                    <input type="hidden" class="txtid" name="id">

                    <p>Are you sure want to Enable This Expense ?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Enable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>