


         <div class="col-sm-8 text-right m-b-20">
             <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_expense"><i class="fa fa-plus"></i> Add Expense</a>
             <div class="view-icons">
                 <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                 <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
             </div>
         </div>
     </div>
     <div class="row filter-row">
         <div class="col-sm-3 col-md-2 col-xs-6">
             <div class="form-group form-focus">
                 <label class="control-label">Item Name</label>
                 <input type="text" class="form-control floating" />
             </div>
         </div>
         <div class="col-sm-3 col-md-2 col-xs-6">
             <div class="form-group form-focus select-focus">
                 <label class="control-label">Purchased By</label>
                 <select class="select floating">
                     <option value=""> -- Select -- </option>
                     <option value="">Loren Gatlin</option>
                     <option value="1">Tarah Shropshire</option>
                 </select>
             </div>
         </div>
         <div class="col-sm-3 col-md-2 col-xs-6">
             <div class="form-group form-focus select-focus">
                 <label class="control-label">Paid By</label>
                 <select class="select floating">
                     <option value=""> -- Select -- </option>
                     <option value="0"> Cash </option>
                     <option value="1"> Cheque </option>
                 </select>
             </div>
         </div>
         <div class="col-sm-3 col-md-2 col-xs-6">
             <div class="form-group form-focus">
                 <label class="control-label">From</label>
                 <div class="cal-icon"><input class="form-control floating datetimepicker" type="text"></div>
             </div>
         </div>
         <div class="col-sm-3 col-md-2 col-xs-6">
             <div class="form-group form-focus">
                 <label class="control-label">To</label>
                 <div class="cal-icon"><input class="form-control floating datetimepicker" type="text"></div>
             </div>
         </div>
         <div class="col-sm-3 col-md-2 col-xs-6">
             <a href="#" class="btn btn-success btn-block"> Search </a>
         </div>
     </div>
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table class="table table-striped custom-table m-b-0 datatable">
                     <thead>
                         <tr>
                             <th>Item</th>
                             <th>Purchase From</th>
                             <th>Purchase Date</th>
                             <th>Purchased By</th>
                             <th>Amount</th>
                             <th>Paid By</th>
                             <th class="text-center">Status</th>
                             <th class="text-right">Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>
                                 <strong>Dell Laptop</strong>
                             </td>
                             <td>Amazon</td>
                             <td>5 May 2017</td>
                             <td>Loren Gatlin</td>
                             <td>$1215</td>
                             <td>Cash</td>
                             <td class="text-center">
                                 <div class="dropdown action-label">
                                     <a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                         <i class="fa fa-dot-circle-o text-danger"></i> Pending <i class="caret"></i>
                                     </a>
                                     <ul class="dropdown-menu pull-right">
                                         <li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Pending</a></li>
                                         <li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Approved</a></li>
                                     </ul>
                                 </div>
                             </td>
                             <td class="text-right">
                                 <div class="dropdown">
                                     <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                     <ul class="dropdown-menu pull-right">
                                         <li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_expense"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                         <li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_expense"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                     </ul>
                                 </div>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <strong>Mac System</strong>
                             </td>
                             <td>Amazon</td>
                             <td>5 May 2017</td>
                             <td>Tarah Shropshire</td>
                             <td>$1215</td>
                             <td>Cheque</td>
                             <td class="text-center">
                                 <div class="dropdown action-label">
                                     <a class="btn btn-white btn-sm rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                         <i class="fa fa-dot-circle-o text-success"></i> Approved <i class="caret"></i>
                                     </a>
                                     <ul class="dropdown-menu pull-right">
                                         <li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Pending</a></li>
                                         <li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Approved</a></li>
                                     </ul>
                                 </div>
                             </td>
                             <td class="text-right">
                                 <div class="dropdown">
                                     <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                     <ul class="dropdown-menu pull-right">
                                         <li><a href="#" title="Edit" data-toggle="modal" data-target="#edit_expense"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                         <li><a href="#" title="Delete" data-toggle="modal" data-target="#delete_expense"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                     </ul>
                                 </div>
                             </td>
                         </tr>
                     </tbody>
                 </table>
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
 <div id="delete_expense" class="modal custom-modal fade" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content modal-md">
             <div class="modal-header">
                 <h4 class="modal-title">Delete Expense</h4>
             </div>
             <div class="modal-body card-box">
                 <p>Are you sure want to delete this expense?</p>
                 <div class="m-t-20 text-left">
                     <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div id="add_expense" class="modal custom-modal fade" role="dialog">
     <div class="modal-dialog">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="modal-content modal-lg">
             <div class="modal-header">
                 <h4 class="modal-title">Add Expense</h4>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Item Name</label>
                                 <input class="form-control" type="text">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Purchase From</label>
                                 <input class="form-control" type="text">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Purchase Date</label>
                                 <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Purchased By </label>
                                 <select class="select">
                                     <option>Daniel Porter</option>
                                     <option>Roger Dixon</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Amount</label>
                                 <input placeholder="$50" class="form-control" type="text">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Paid By</label>
                                 <select class="select">
                                     <option>Cash</option>
                                     <option>Cheque</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Status</label>
                                 <select class="select">
                                     <option>Pending</option>
                                     <option>Approved</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Attachments</label>
                                 <input class="form-control" type="file">
                             </div>
                         </div>
                     </div>
                     <div class="attach-files">
                         <ul>
                             <li>
                                 <img src="assets/img/user.jpg" alt="">
                                 <a href="#" class="fa fa-close file-remove"></a>
                             </li>
                             <li>
                                 <img src="assets/img/user.jpg" alt="">
                                 <a href="#" class="fa fa-close file-remove"></a>
                             </li>
                         </ul>
                     </div>
                     <div class="m-t-20 text-center">
                         <button class="btn btn-primary">Create Expense</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <div id="edit_expense" class="modal custom-modal fade" role="dialog">
     <div class="modal-dialog">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="modal-content modal-lg">
             <div class="modal-header">
                 <h4 class="modal-title">Edit Expense</h4>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Item Name</label>
                                 <input class="form-control" value="Dell Laptop" type="text">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Purchase From</label>
                                 <input class="form-control" value="Amazon" type="text">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Purchase Date</label>
                                 <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Purchased By </label>
                                 <select class="select">
                                     <option>Daniel Porter</option>
                                     <option>Roger Dixon</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Amount</label>
                                 <input placeholder="$50" class="form-control" value="$10000" type="text">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Paid By</label>
                                 <select class="select">
                                     <option>Cash</option>
                                     <option>Cheque</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Status</label>
                                 <select class="select">
                                     <option>Pending</option>
                                     <option>Approved</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Attachments</label>
                                 <input class="form-control" type="file">
                             </div>
                         </div>
                     </div>
                     <div class="attach-files">
                         <ul>
                             <li>
                                 <img src="assets/img/user.jpg" alt="">
                                 <a href="#" class="fa fa-close file-remove"></a>
                             </li>
                             <li>
                                 <img src="assets/img/user.jpg" alt="">
                                 <a href="#" class="fa fa-close file-remove"></a>
                             </li>
                         </ul>
                     </div>
                     <div class="m-t-20 text-center">
                         <button class="btn btn-primary">Save Changes</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>