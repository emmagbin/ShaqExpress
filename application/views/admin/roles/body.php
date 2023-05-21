<div class="col-sm-8 text-right m-b-20">
    <!-- <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create New fleet</a> -->
    <div class="view-icons">
        <!-- <a href="projects.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> -->
        <!-- <a href="project-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> -->
    </div>
</div>
</div>
<div class="row">
    <div class="col-sm-3">
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> Add Roles</a>
        <div class="roles-menu">
            <ul class="nav">
                <li class="active">
                    <a href="javascript:void(0);">Administrator
                        <span class="role-action">
                            <span class="action-circle large" title="Edit" data-toggle="modal" data-target="#edit_role">
                                <i class="material-icons">edit</i>
                            </span>
                            <span class="action-circle large delete-btn" title="Delete" data-toggle="modal" data-target="#delete_role">
                                <i class="material-icons">delete</i>
                            </span>
                        </span>
                    </a>
                </li>
                <li><a href="#">Super Admin</a></li>
                <li><a href="#">Operations</a></li>
                <li><a href="#">Fleet</a></li>
                <li><a href="#">Finance</a></li>
                
            </ul>
        </div>
    </div>
    <div class="col-sm-9">
        <h6 class="panel-title m-b-20">Module Access</h6>
        <div class="panel">
            <ul class="list-group">
                <li class="list-group-item">
                    Employee
                    <div class="material-switch pull-right">
                        <input id="staff_module" type="checkbox" />
                        <label for="staff_module" class="label-success"></label>
                    </div>
                </li>
                <li class="list-group-item">
                    Dashboard
                    <div class="material-switch pull-right">
                        <input id="holidays_module" type="checkbox" />
                        <label for="holidays_module" class="label-success"></label>
                    </div>
                </li>
                
            </ul>
        </div>
        <div class="table-responsive">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th>Module Permission</th>
                        <th class="text-center">Read</th>
                        <th class="text-center">Write</th>
                        <th class="text-center">Create</th>
                        <th class="text-center">Delete</th>
                        <th class="text-center">Import</th>
                        <th class="text-center">Export</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Employee</td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                    </tr>
                    <tr>
                        <td>Roles</td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                    </tr>
                    <tr>
                        <td>Fleets </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                    </tr>
                    <tr>
                        <td>Operations</td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
                        </td>
                        <td class="text-center">
                            <input type="checkbox" checked="">
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
<div id="delete_role" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Delete Holiday</h4>
            </div>
            <form>
                <div class="modal-body card-box">
                    <p>Are you sure want to delete this?</p>
                    <div class="m-t-20 text-left">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="add_role" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Add Role</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Role Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Create Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="edit_role" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Edit Role</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Role Name <span class="text-danger">*</span></label>
                        <input class="form-control" value="Team Leader" type="text">
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Save & Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>