<div class="col-sm-8 text-right m-b-20">
    <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create New Order</a>
    <div class="view-icons">
        <!-- <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                     <a href="" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> -->
    </div>
</div>
</div>
<div class="row filter-row">
    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus select-focus">
            <label class="control-label">Riders Name</label>
            <select class="select floating" id="myInput">

                <option value="">Select Rider</option>
                <option value="1">Android Developer</option>
                <option value="1">Ios Developer</option>
                <option value="0">Select 0</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus select-focus">
            <label class="control-label">Payment Status</label>
            <select class="select floating" id="mystatus">

                <option value="">Select Payment Mode</option>

                <option value="NOT PAID">NOT PAID</option>
                <option value="PAID">PAID</option>
            </select>
        </div>
    </div>

    <div class="col-sm-3 col-xs-6">
        <div class="form-group form-focus">
            <label class="control-label">Date</label>
            <input type="date" class="form-control floating" id="mydate" />
        </div>
    </div>

    <!-- <div class="col-sm-3 col-xs-6">
        <a href="#" class="btn btn-success btn-block"> Search </a>
    </div> -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-box">

            <div class="table-responsive">

                <table id="datatable" class="table table-striped custom-table dataTable">

                    <thead>
                        <tr>
                            <th>Date
                            </th>
                            <th>Sender Name</th>
                            <th>Sender Location</th>
                            <th> Sender Phone</th>
                            <th>Recipient Name </th>
                            <th>Recipient Location</th>

                            <th> Recipient Phone</th>
                            <th>Amount</th>
                            <th>Rider
                            </th>
                            <th> Mode Of Payment
                            </th>
                            <th>Payment Status
                            </th>
                            <th>Delivery
                            </th>

                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($get_all_orders as $record) :  ?>


                            <tr>

                                <td> <?php echo ($record->created_at); ?></td>
                                <td> <?php echo ($record->sendername); ?> </td>
                                <td> <?php echo ($record->senderlocation); ?> </td>
                                <td> <?php echo ($record->sendercontact); ?> </td>
                                <td> <?php echo ($record->recepientname); ?> </td>
                                <td> <?php echo ($record->recepientlocation); ?> </td>
                                <td> <?php echo ($record->recepientnumber); ?> </td>
                                <td> <?php echo ($record->amount); ?> </td>
                                <td> <?php echo ($record->ridersname); ?> </td>
                                <td>


                                    <span class="label label-success-border"><?php echo ($record->modeofpayment); ?></span>
                                </td>


                                <td>

                                    <span class="label label-success-border"><?php echo ($record->paymentstatus); ?></span>
                                </td>

                                <td>


                                    <span class="label label-success-border"><?php echo ($record->deliverystatus); ?></span>
                                </td>


                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" class="edit_delivery" id="edit_delivery" data-target="#edit_project" data-idorder="<?php echo $record->id; ?>" data-sendername="<?php echo $record->sendername; ?>" data-senderlocation="<?php echo $record->senderlocation; ?>" data-sendercontact="<?php echo $record->sendercontact; ?>" data-recepientname="<?php echo $record->recepientname; ?>" data-recepientlocation="<?php echo $record->recepientlocation; ?>" data-recepientnumber="<?php echo $record->recepientnumber; ?>" data-amount="<?php echo $record->amount; ?>" data-modeofpayment="<?php echo $record->modeofpayment; ?>" data-ridersname="<?php echo $record->ridersname; ?>" data-paymentstatus="<?php echo $record->paymentstatus; ?>" data-deliverystatus="<?php echo $record->deliverystatus; ?>">
                                                    <i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" class="confirmd_delivery" id="confirmd_delivery" data-target="#confirmd_" data-idorder="<?php echo $record->id; ?>" data-sendername="<?php echo $record->sendername; ?>" data-senderlocation="<?php echo $record->senderlocation; ?>" data-sendercontact="<?php echo $record->sendercontact; ?>" data-recepientname="<?php echo $record->recepientname; ?>" data-recepientlocation="<?php echo $record->recepientlocation; ?>" data-recepientnumber="<?php echo $record->recepientnumber; ?>" data-amount="<?php echo $record->amount; ?>" data-modeofpayment="<?php echo $record->modeofpayment; ?>" data-ridersname="<?php echo $record->ridersname; ?>" data-paymentstatus="<?php echo $record->paymentstatus; ?>" data-deliverystatus="<?php echo $record->deliverystatus; ?>">
                                                    <i class="fa fa-pencil m-r-5"></i> Confirm Delivery</a></li>

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
                <h4 class="modal-title">Create Order</h4>
            </div>

            <div class="card-box">
                <div class="modal-body">
                    <form method="POST" action="createorder">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SENDERS NAME</label>
                                    <input name="sendername" class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SENDERS LOCATION</label>
                                    <input name="senderlocation" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SENDER CONTACT</label>
                                    <input name="sendercontact" class="form-control" type="text" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RECEPIENT NAME</label>
                                    <input name="recepientname" class="form-control" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RECEPIENT LOCATION</label>
                                    <input name="recepientlocation" class="form-control" type="text" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RECEPIENT NUMBER</label>
                                    <input name="recepientnumber" class="form-control" maxlength="10" type="number" required>
                                </div>
                            </div>



                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RIDERS NAME
                                    </label>
                                    <select name="ridersname" class="select" required>
                                        <option>SELECT RIDER</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;PAYMENT STATUS</label>
                                    <select name="paymentstatus" class="select">
                                        <option>SELECT ONE</option>
                                        <option value="PAID">PAID</option>
                                        <option value="NOT PAID">NOT PAID
                                        </option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;DELIVERY STATUS</label>
                                    <select name="deliverystatus" class="select">
                                        <option>SELECT ONE</option>
                                        <option value="DELIVERED">DELIVERED</option>
                                        <option value="NOT DELIVERED">NOT DELIVERED
                                        </option>
                                    </select>
                                </div>
                            </div>




                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>AMOUNT</label>
                                    <input name="amount" placeholder="GHC0.00" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;MODE OF PAYMENT</label>
                                    <select name="modeofpayment" class="select">
                                        <option>SELECT ONE</option>
                                        <option value="MOMO">MOMO</option>
                                        <option value="CASH">CASH</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Create Schedule</button>
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
                <h4 class="modal-title">Edit Schedule</h4>
            </div>
            <div class="card-box">
                <div class="modal-body">
                    <form method="POST" action="updateorder">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SENDERS NAME</label>
                                    <input class="form-control" name="id" id="txtid" type="hidden">

                                    <input class="form-control" name="sendername" id="txtsendername" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SENDERS LOCATION</label>
                                    <input name="senderlocation" id="txtttsenderlocation" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SENDER CONTACT</label>
                                    <input class="form-control" name="sendercontact" id="txtsendercontact" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RECEPIENT NAME</label>
                                    <input class="form-control" id="txtrecepientname" name="recepientname" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RECEPIENT LOCATION</label>
                                    <input class="form-control" name="recepientlocation" id="txtrecepientlocation" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RECEPIENT NUMBER</label>
                                    <input class="form-control" name="recepientnumber" id="txtrecepientnumber" maxlength="10" type="number">
                                </div>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>AMOUNT</label>
                                    <input placeholder="GHC0.00" name="amount" id="txtamount" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;MODE OF PAYMENT</label>
                                    <select class="select" name="modeofpayment" id="txtmodeofpayment">
                                        <option>SELECT ONE</option>
                                        <option>MOMO</option>
                                        <option>CASH</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>RIDERS NAME
                                    </label>
                                    <select class="select" name="ridersname" id="txtridersname">
                                        <option>SELECT RIDER</option>
                                        <option value="0">Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;PAYMENT STATUS</label>
                                    <select class="select" name="paymentstatus" id="txtpaymentstatus">
                                        <option>SELECT ONE</option>
                                        <option>PAID</option>
                                        <option>NOT PAID
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;DELIVERY STATUS</label>
                                    <select class="select" name="deliverystatus" id="txtdeliverystatus">
                                        <option>SELECT ONE</option>
                                        <option>DELIVERED</option>
                                        <option>NOT DELIVERED
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Update Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirmd_" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Delivery</h4>
            </div>

            <form action="confirmdelivery" method="Post">
                <div class="modal-body card-box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>AMOUNT</label>
                                <input type="hidden" class="form-control" name="id" id="txidorder">
                                <input placeholder="GHC0.00" name="amount" id="txamount" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>&nbsp;MODE OF PAYMENT</label>
                                <select class="select txmodeofpayment" name="modeofpayment" id="txmodeofpayment">

                                    <option value="MOMO">MOMO</option>
                                    <option value="CASH">CASH</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>&nbsp;PAYMENT STATUS</label>
                                <select class="select" name="paymentstatus" id="txpaymentstatus">

                                    <option value="PAID">PAID</option>
                                    <option value="NOT PAID">NOT PAID
                                    </option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>&nbsp;DELIVERY STATUS</label>
                                <select class="select" name="deliverystatus" id="txdeliverystatus">

                                    <option value="DELIVERED">DELIVERED</option>
                                    <option value="NOT DELIVERED">NOT DELIVERED
                                    </option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="m-t-20">
                        <center> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Confirm </button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>