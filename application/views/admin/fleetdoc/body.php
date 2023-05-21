<div class="col-sm-8 text-right m-b-20">
    <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create Fleet Doc</a>
    <div class="view-icons">
        <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
        <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <div class="card-box">
                <!-- <table class="table table-striped custom-table datatable"> -->
                <table id="datatable" class="table table-striped custom-table dataTable">

                    <thead>
                        <tr>
                            <th>vehicle Name</th>
                            <th>Vehicle Doc type </th>

                            <th>Document</th>

                            <th>status</th>
                            <th>Created Date</th>
                            <th>Created Date</th>

                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($get_all_drivers as $record) : ?>
                            <tr>
                                <td>

                                    <img class="avatar" src="<?php echo base_url() ?>assets/vehicle/photos/<?php echo $record->vehiclephoto ?>" alt="">

                                    <h2><a> <?php echo ($record->plateno); ?> <span> <?php echo ($record->brand); ?></span></a></h2>
                                </td>
                                <td>
                                    <?php echo ($record->vehicledoctypename); ?>
                                </td>

                                <td>

                                    <img class="avatar" src="<?php echo base_url() ?>assets/vehicle/doc/<?php echo $record->vehicleid . "/" . $record->photopath ?>" alt="">
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
                                            <li><a href="#" data-toggle="modal" class="edit_diasble_enable_doc" data-target="#edit_driver" data-id="<?php echo $record->id; ?>" data-vehicleid="<?php echo $record->vehicleid; ?>" data-vehicledoctypeid="<?php echo $record->vehicledoctypeid; ?>" data-remark="<?php echo $record->remark; ?>" data-photopath="<?php echo $record->photopath; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <?php if ($record->status === "1") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_doc" data-target="#disable_driver" data-id="<?php echo $record->id; ?>" data-vehicleid="<?php echo $record->vehicleid; ?>" data-vehicledoctypeid="<?php echo $record->vehicledoctypeid; ?>" data-remark="<?php echo $record->remark; ?>" data-photopath="<?php echo $record->photopath; ?>"><i class="fa fa-lock m-r-5"></i> Disable</a></li>
                                            <?php } ?>

                                            <?php if ($record->status === "0") { ?>
                                                <li><a href="#" data-toggle="modal" class="edit_diasble_enable_doc" data-target="#enable_driver" data-id="<?php echo $record->id; ?>" data-vehicleid="<?php echo $record->vehicleid; ?>" data-vehicledoctypeid="<?php echo $record->vehicledoctypeid; ?>" data-remark="<?php echo $record->remark; ?>" data-photopath="<?php echo $record->photopath; ?>"><i class="fa fa-unlock m-r-5"></i> Enable</a></li>
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
                <h4 class="modal-title">Create Fleet Doc</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('fleetdoc_controller/createdoc'); ?>

                <div class="card-box">
                    <h3 class="card-title">Fleet Doc Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" id="output_image" src="assets/img/user.jpg" alt="user">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload Doc</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Number Plate</label>

                                            <select class="select form-control floating" name="vehicleid">
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
                                            <label>Vehicle Document Type</label>
                                            <select class="select form-control floating" name="vehicledoctypeid">
                                                <option selected disabled>Select Vehicle Document Type</option>
                                                <?php foreach ($getdoctype  as $each) {
                                                ?>
                                                    <option value="<?= $each['id'] ?>"><?= $each['vehicledoctypename'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Remark</label>
                                            <input class="form-control floating" name="remark" type="text">

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
<div id="edit_driver" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Fleet Doc Information</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('fleetdoc_controller/updatedoc'); ?>

                <div class="card-box">
                    <h3 class="card-title">Fleet Doc Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block txtvehiclephoto" id="output_image_edit" src="assets/img/" alt="">
                                <div class="fileupload btn btn-default">
                                    <span class="btn-text">Upload Doc</span>

                                    <input class="upload" name="output_image" type="file" accept="image/*" onchange="preview_image_doc_edit(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Number Plate</label>
                                            <select class="select form-control floating txtvehicleid" name="vehicleid">
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
                                            <label>Vehicle Document Type</label>
                                            <select class="select form-control floating txtvehicledoctypeid" name="vehicledoctypeid">
                                                <option disabled>Select Vehicle Document Type</option>

                                                <?php foreach ($getdoctype  as $each) {
                                                ?>
                                                    <option value="<?= $each['id'] ?>"><?= $each['vehicledoctypename'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Remark</label>
                                            <input class="form-control floating txtremark" name="remark" type="text">

                                            <input class="form-control floating txtid" name="id" type="hidden">

                                            <input class="form-control floating txtphotopath" name="txtphotopath" type="hidden">





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
<div id="disable_driver" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Disable Fleet Document</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="fleetdoc_controller/enabl_disable_doc">

                    <input type="hidden" value="disable" name="enabledisable">

                    <input type="hidden" class="txtid" name="id">

                    <p>Are you sure want to Disable This Document ?</p>
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
                <h4 class="modal-title">Enable Fleet Document</h4>
            </div>
            <div class="modal-body card-box">
                <form method="POST" action="fleetdoc_controller/enabl_disable_doc">
                    <input type="hidden" class="txtid" name="id">
                    <input type="hidden" value="enable" name="enabledisable">

                    <p>Are you sure want to Enable This Document?</p>
                    <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Enable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>