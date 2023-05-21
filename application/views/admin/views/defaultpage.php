<!DOCTYPE html>
<html>

<!-- Mirrored from dreamguys.co.in/preadmin/hr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 May 2020 03:51:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Dashboard - HRMS admin template</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">




    <?php if ($folder === 'dashboard') {; ?>
        <link rel="stylesheet" type="text/css" href="assets/plugins/morris/morris.css">
        }
    <?php    } else if ($folder === 'staff') { ?>
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">

    <?php } else if ($folder === 'roles') {; ?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">


    <?php } else if ($folder === 'fleet') {; ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">



    <?php } else if ($folder === 'operations' || $folder === "link") {; ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <?php } else if ($folder === 'drivers' || $folder === 'fleetdoc') {; ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <?php } else if ($folder === 'fleetexpenses' || $folder == 'fleetexpensestype') {; ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <?php } else if ($folder === 'fleetcategory' || $folder === 'fleetdoctype' || $folder === "link") {; ?>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <?php } else if ($folder === 'settings') {; ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <?php } else if ($folder === 'reports') {; ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <?php } else if ($folder === 'accounts') {; ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <?php } ?>



    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" width="40" height="40" alt="">
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="la la-bars"></i></a>
            <div class="page-title-box pull-left">
                <h3>Company Name</h3>
            </div>
            <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul class="nav navbar-nav navbar-right user-menu pull-right">
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-purple pull-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="media-list">
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">
                                                <img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0 noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                            <p class="m-0"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">V</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0 noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                            <p class="m-0"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0 noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                            <p class="m-0"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">G</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0 noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                            <p class="m-0"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">V</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0 noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                            <p class="m-0"><span class="notification-time">2 days ago</span></p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i> <span class="badge bg-purple pull-right">8</span></a>
                </li>
                <li class="dropdown">
                    <a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                        <span class="user-img"><img class="img-circle" src="assets/img/user.jpg" width="40" alt="Admin">
                            <span class="status online"></span></span>
                        <span>Admin</span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.html">My Profile</a></li>
                        <li><a href="edit-profile.html">Edit Profile</a></li>
                        <li><a href="settings.html">Settings</a></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="profile.html">My Profile</a></li>
                    <li><a href="edit-profile.html">Edit Profile</a></li>
                    <li><a href="settings.html">Settings</a></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
        </div>
        <?php if ($logincount) { ?>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="<?= ($this->uri->segment(1) === 'dashboard') ? 'active' : '' ?>">
                                <a href="dashboard"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                            </li>
                            <li class="<?= ($this->uri->segment(1) === 'index2') ? 'active' : '' ?>">
                                <!-- <a href="index2"><i class="la la-dashboard"></i> <span>Dashboard System User</span></a> -->
                            </li>


                            <li class="<?= ($this->uri->segment(1) === 'operations') ? 'active' : '' ?>">
                                <a href="operations"><i class="la la-car"></i> <span>Operations</span></a>
                            </li>



                            <li class="submenu">
                                <a href="#"><i class="la la-money"></i> <span> Fleet Expenses</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li class="<?= ($this->uri->segment(1) === 'fleetexpenses') ? 'active' : '' ?>"><a href="fleetexpenses" class="<?= ($this->uri->segment(1) === 'fleetexpenses') ? 'active' : '' ?>">Fleet Expenses</a></li>
                                    <li class="<?= ($this->uri->segment(1) === 'fleetexpensestype') ? 'active' : '' ?>"><a class="<?= ($this->uri->segment(1) === 'fleetexpensestype') ? 'active' : '' ?>" href="fleetexpensestype">Fleet Expenses Type</a></li>

                                </ul>
                            </li>


                            <li class="submenu">
                                <a href="#"><i class="la la-car"></i> <span> Fleet</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">


                                    <li class="<?= ($this->uri->segment(1) === 'fleetcategory') ? 'active' : '' ?>"><a href="fleetcategory" class="<?= ($this->uri->segment(1) === 'fleetcategory') ? 'active' : '' ?>">Fleets Category</a></li>
                                    <li class="<?= ($this->uri->segment(1) === 'fleetdoctype') ? 'active' : '' ?>"><a href="fleetdoctype" class="<?= ($this->uri->segment(1) === 'fleetdoctype') ? 'active' : '' ?>">Fleets doctype</a></li>

                                    <li class="<?= ($this->uri->segment(1) === 'fleetdoc') ? 'active' : '' ?>"><a href="fleetdoc" class="<?= ($this->uri->segment(1) === 'fleetdoc') ? 'active' : '' ?>">Fleets Document</a></li>
                                    <li class="<?= ($this->uri->segment(1) === 'fleet') ? 'active' : '' ?>"><a class="<?= ($this->uri->segment(1) === 'fleet') ? 'active' : '' ?>" href="fleet">Fleets</a></li>

                                </ul>
                            </li>
                            <li class="<?= ($this->uri->segment(1) === 'link') ? 'active' : '' ?>">
                                <a href="link"><i class="la la-car"></i> <span>Driver Fleet Link</span></a>
                            </li>



                            <li class="<?= ($this->uri->segment(1) === 'drivers') ? 'active' : '' ?>">
                                <a href="drivers"><i class="la la-users"></i> <span>Driver / Riders</span></a>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="estimates">Estimates</a></li>
                                    <li><a href="Ainvoices">Invoices</a></li>
                                    <li><a href="payments">Payments</a></li>
                                    <li><a href="Aexpenses">Expenses</a></li>

                                </ul>
                            </li>



                            <li class="<?= ($this->uri->segment(1) === 'users') ? 'active' : '' ?>">
                                <a href="users"><i class="la la-user-plus"></i> <span>Users</span></a>
                            </li>
                            <!-- <li class="menu-title">Role Management</li> -->

                            <li class="<?= ($this->uri->segment(1) === 'roles') ? 'active' : '' ?>">
                                <a href="roles"><i class="la la-key"></i> <span>Roles & Permissions</span></a>
                            </li>


                            <li class="submenu">
                                <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="expenses"> Expense Report </a></li>
                                    <li><a href="income"> Revenue Report </a></li>
                                    <li><a href="invoice"> Invoice Report </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="settings"><i class="la la-building"></i> <span>Company Settings</span></a>
                            </li>

                            <li>
                                <a href="profile"><i class="la la-building"></i> <span>Profile</span></a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="page-title"><?php echo $pagetitle ?></h4>
                    </div>



                    <?php include(APPPATH . 'views/admin/' . $folder . '/' . $contentt . '.php'); ?>




                </div>

                <div class="sidebar-overlay" data-reff="#sidebar"></div>

                <?php if ($folder === 'dashboard') {; ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/plugins/morris/morris.min.js"></script>
                    <script type="text/javascript" src="assets/plugins/raphael/raphael-min.js"></script>
                    <script type="text/javascript" src="assets/js/chart.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>
                    }
                <?php  } else  if ($folder === 'staff') { ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/moment.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>
                <?php } else if ($folder === 'roles') {; ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'fleet') {; ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/moment.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'operations' || $folder === "link" || $folder === 'fleet') {; ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/moment.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'drivers' || $folder === 'fleetdoc') {; ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/moment.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'fleetexpenses' || $folder == 'fleetexpensestype') {; ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/moment.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'fleetcategory' || $folder === 'fleetdoctype') {; ?>
                    <div class="sidebar-overlay" data-reff="#sidebar"></div>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'settings') {; ?>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'reports') {; ?>
                    <div class="sidebar-overlay" data-reff="#sidebar"></div>
                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/moment.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } else if ($folder === 'accounts') {; ?>


                    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
                    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="assets/js/select2.min.js"></script>
                    <script type="text/javascript" src="assets/js/moment.min.js"></script>
                    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="assets/js/app.js"></script>

                <?php } ?>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <script type="text/javascript" src="assets/js/mydatatablefilter.js"></script>


                <script>
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Hr Analysis'
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: {
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'May',
                                'Jun',
                                'Jul',
                                'Aug',
                                'Sep',
                                'Oct',
                                'Nov',
                                'Dec'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Analysis'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                name: 'Schedules',
                                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                            }, {
                                name: 'Income From Schedules',
                                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                            }, {
                                name: 'Fleet Expenses',
                                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                            },
                            {
                                name: 'Other Revenue',
                                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                            },
                            {
                                name: 'Other Expenditure',
                                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                            }
                        ]
                    });



                    Highcharts.chart('container1', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: 0,
                            plotShadow: false
                        },
                        title: {
                            text: 'Total Fleets <br>to <br>Active Fleets',
                            align: 'center',
                            verticalAlign: 'middle',
                            y: 60
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                dataLabels: {
                                    enabled: true,
                                    distance: -50,
                                    style: {
                                        fontWeight: 'bold',
                                        color: 'white'
                                    }
                                },
                                startAngle: -90,
                                endAngle: 90,
                                center: ['50%', '75%'],
                                size: '110%'
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'Fleets',
                            innerSize: '50%',
                            data: [
                                ['Active', 58.9],


                                {
                                    name: 'Inactive',
                                    y: 7.61,
                                    dataLabels: {
                                        enabled: false
                                    }
                                }
                            ]
                        }]
                    });
                </script>

                <script>
                    $(document).on('change', '#othername,#lastname', function() {
                        document.getElementById("username").value = "";

                        document.getElementById("usernameshow").value = "";

                        var lastname = document.getElementById("lastname").value;
                        var lastnameletercount = lastname.length
                        var othername = document.getElementById("othername").value;
                        var othernamesletercount = othername.length;



                        if ((parseInt(lastnameletercount) > 0) && (parseInt(othernamesletercount) > 0)) {
                            var last = lastname.trim().split(" ");
                            var lastn = last['0'];
                            var other = othername.trim().split(" ");
                            var othern = other['0'];
                            $('#username').val(lastn.concat(othern).concat("@shaqexpress"));
                            $('#usernameshow').val(lastn.concat(othern).concat("@shaqexpress"));

                            const rand = Math.random().toString(16).substr(2, 8);

                            $('#password').val(rand);
                            $('#passwordshow').val(rand);

                            var checkusername = lastn.concat(othern).concat("@shaqexpress");



                            $.ajax({
                                type: 'POST',
                                data: {
                                    checkusername: checkusername,

                                },
                                url: '<?php echo site_url('users_controller/checkusername'); ?>',
                                success: function(result) {

                                    // alert(result);
                                    var myresult = JSON.parse(result);
                                    if (myresult.number > 0) {
                                        var d = new Date();
                                        var n = d.getMilliseconds();
                                        $('#username').val(lastn.concat(othern).concat(n).concat("@shaqexpress"));
                                        $('#usernameshow').val(lastn.concat(othern).concat(n).concat("@shaqexpress"));
                                    }


                                }
                            });

                        }
                    });
                </script>

                <!-- emmagbin318@shaqexpress -->
                <!-- cbcf5ede -->

                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

                <script>
                    var type = "<?php echo $this->session->flashdata('alert-type'); ?>";
                    switch (type) {
                        case 'success':
                            toastr.success('<?php echo $this->session->flashdata('message'); ?>', 'success', {
                                timeOut: 3000
                            });
                            break
                        case 'info':
                            toastr.info('<?php echo $this->session->flashdata('message'); ?>', 'info', {
                                timeOut: 5000
                            });
                            break;
                        case 'info':
                            toastr.warning('<?php echo $this->session->flashdata('message'); ?>', 'warning', {
                                timeOut: 5000
                            });
                            break;
                        case 'error':
                            toastr.error('<?php echo $this->session->flashdata('message'); ?>', 'error', {
                                timeOut: 5000
                            });
                            break;
                    }
                </script>

                <script>
                    $(document).on('change', '#oldpassword', function() {
                        // oldpassword
                        document.getElementById('mysubmitbutton').style.visibility = 'hidden';
                        var oldpassword = $('#oldpassword').val();
                        $.ajax({
                            type: 'POST',
                            data: {
                                oldpassword: oldpassword,

                            },
                            url: '<?php echo site_url('users_controller/checkuserpassword'); ?>',
                            success: function(result) {

                                var myresult = JSON.parse(result);
                                if (myresult === true) {
                                    document.getElementById('mysubmitbutton').style.visibility = 'visible';

                                } else {
                                    document.getElementById('mysubmitbutton').style.visibility = 'hidden';

                                }


                            }
                        });
                    });

                    $(document).on('change', '#newpassword,#confirmpassword', function() {
                        document.getElementById('mysubmitbutton').style.visibility = 'hidden';



                        var newpass = $('#newpassword').val();
                        var conpass = $('#confirmpassword').val();
                        if (newpass.length >= 6 && conpass.length >= 6 && newpass === conpass) {
                            var username = '<?php echo $username ?>';
                            var oldpass = '<?php echo $password ?>';

                            document.getElementById('mysubmitbutton').style.visibility = 'visible';

                        } else {
                            document.getElementById('mysubmitbutton').style.visibility = 'hidden';
                        }

                    });
                </script>

                <script>
                    ///////////showing edit  modal//////////////////////////
                    $(document).on('click', '#edit_delivery', function() {

                        $('#txtid').val($(this).data('idorder'));

                        // var amount = $(this).data('senderlocation');
                        // alert(amount);


                        $('#txtsendername').val($(this).data('sendername'));

                        var senderlocation = $(this).data('senderlocation');
                        $('#txtttsenderlocation').val(senderlocation);
                        $('#txtsendercontact').val($(this).data('sendercontact'));
                        $('#txtrecepientname').val($(this).data('recepientname'));
                        $('#txtrecepientlocation').val($(this).data('recepientlocation'));
                        $('#txtrecepientnumber').val($(this).data('recepientnumber'));
                        $('#txtamount').val($(this).data('amount'));
                        $('#txtmodeofpayment').val($(this).data('modeofpayment'));
                        $('#txtridersname').val($(this).data('ridersname'));
                        $('#txtpaymentstatus').val($(this).data('paymentstatus'));
                        $('#txtdeliverystatus').val($(this).data('deliverystatus'));

                    });

                    // SELECT `id`, `sendername`, `senderlocation`, `sendercontact`, `recepientname`, `recepientlocation`, `recepientnumber`,
                    // `amount`, `modeofpayment`, `ridersname`, `paymentstatus`, `deliverystatus`, `createdby`, `created_at`, `updatedby`, `updated_at` FROM `order` WHERE 1 id
                </script>
                <script>
                    ///////////showing delete modal//////////////////////////
                    $(document).on('click', '.confirmd_delivery', function() {

                        $('#txamount').val($(this).data('amount'));
                        $('.txmodeofpayment').val($(this).data('modeofpayment')).select();
                        $('#txpaymentstatus').val($(this).data('paymentstatus')).select();
                        $('#txdeliverystatus').val($(this).data('deliverystatus')).select();
                        $('#txidorder').val($(this).data('idorder'));

                        // $('#txtgender').val($(this).data('gender'));


                    });
                </script>

                <script>
                    $(document).ready(function() {




                        $("#myInput").on("change", function() {
                            var value = $(this).val().toLowerCase();

                            $("#datatable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });

                        $("#mystatus").on("change", function() {
                            var value = $(this).val().toLowerCase();

                            $("#datatable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });

                        $("#mydate").on("change", function() {
                            var value = $(this).val().toLowerCase();

                            $("#datatable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>

                <script type='text/javascript'>
                    function preview_image(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output_image');
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    function preview_image_License(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output_image_License');
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    // FOR EDITING DRIVER PICTURES
                    function preview_image_pass_edit(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output_image_edit');
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    function preview_image_License_edit(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output_image_License_edit');
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    function preview_image_vehicle_edit(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output_image_edit');
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }

                    function preview_image_doc_edit(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output_image_edit');
                            output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    }
                </script>


                <!-- DRIVERS EDIT DELETE -->
                <script>
                    ///////////showing delete modal//////////////////////////
                    $(document).on('click', '.edit_diasble_enable', function() {
                        $('.txtid').val($(this).data('id'));

                        $('#txtlastname').val($(this).data('lastname'));
                        $('#txtothernames').val($(this).data('othernames'));
                        $('#txtdob').val($(this).data('dob'));
                        $('#txtphonenumner').val($(this).data('phonenumner'));
                        $('#txtgender').val($(this).data('gender'));
                        $('#txtlicenseno').val($(this).data('licenseno'));
                        $('#txtlicenseclass').val($(this).data('licenseclass'));
                        $('#txtlicenseexpiry').val($(this).data('licenseexpiry'));
                        $('#txtpassport_id').val($(this).data('passport'));
                        $('#txtlicense_id').val($(this).data('license'));

                        document.getElementById("output_image_edit").value = "";
                        document.getElementById("output_image_License_edit").value = "";
                        var drivername = $(this).data('lastname').concat("  ").concat($(this).data('othernames'));

                        $('.drivername').html(drivername);


                        $(".txtpassport").attr("src", '<?php echo base_url() ?>assets/drivers/passport/'.concat($(this).data('passport')));
                        $(".txtlicense").attr("src", '<?php echo base_url() ?>assets/drivers/license/'.concat($(this).data('license')));
                    });
                </script>

                <!-- VEHICLE TYPE EDIT DELETE -->
                <script>
                    ///////////showing delete modal//////////////////////////
                    $(document).on('click', '.edit_diasble_enableVehicletype', function() {
                        $('.txtid').val($(this).data('id'));
                        $('.txtvehicletypename').val($(this).data('vehicletypename'));
                        var vehicletypename = $(this).data('vehicletypename');
                        $('.vehicletypename').html(vehicletypename);

                    });
                </script>


                <!-- VEHICLE EDIT DELETE -->
                <script>
                    ///////////showing delete modal//////////////////////////
                    $(document).on('click', '.edit_diasble_enable_vehicle', function() {

                        // document.getElementById("output_image").value = "";

                        $('.txtid').val($(this).data('id'));

                        $('.txtplateno').val($(this).data('plateno'));
                        $('.txtvehicleType').val($(this).data('vehicletype'));
                        $('.txtbrand').val($(this).data('brand'));
                        $('.txtmodel').val($(this).data('model'));
                        $('.txtroadworkstart').val($(this).data('roadworkstart'));
                        $('#txtroadworkExpiry').val($(this).data('roadworkexpiry'));
                        $('#txtinsurancestart').val($(this).data('insurancestart'));
                        $('#txtinsuranceexpiry').val($(this).data('insuranceexpiry'));
                        $('.txtpurchasedate').val($(this).data('purchasedate'));

                        $('.txtvehiclephoto_id').val($(this).data('vehiclephoto'));

                        var vehicle = $(this).data('plateno').concat(" of ").concat($(this).data('brand')).concat(" and Model ").concat($(this).data('model'));
                        // alert(vehicle);
                        $('.vehicle').html(vehicle);
                        $(".txtvehiclephoto").attr("src", '<?php echo base_url() ?>assets/vehicle/photos/'.concat($(this).data('vehiclephoto')));
                        // var photo = $(this).data('vehiclephoto');

                        // var mycount = photo.length;

                        // alert(mycount);
                        // if (mycount === "NULL" || mycount === null || mycount < 1 || mycount === "0" || mycount === "undefined") {
                        //     $(".txtvehiclephoto").attr("src", '<?php echo base_url() ?>'.concat('assets/vehicle/photos/defaultphoto.png'));

                        // } else {

                        //     $(".txtvehiclephoto").attr("src", '<?php echo base_url() ?>assets/vehicle/photos/'.concat($(this).data('vehiclephoto')));


                        // }





                    });
                </script>


                <!-- data-id="<?php echo $record->id; ?>"
                data-vehicleid="<?php echo $record->vehicleid; ?>"
                data-vehicledoctypeid="<?php echo $record->vehicledoctypeid; ?>"
                data-remark="<?php echo $record->remark; ?>"
                data-photopath="<?php echo $record->photopath; ?>" -->

                <!-- <img class="avatar" src="<?php echo base_url() ?>assets/vehicle/doc/<?php echo $record->vehicleid . "/" . $record->photopath ?>" alt=""> -->

                <!-- VEHICLE DOCUMMENT EDIT DELETE -->
                <script>
                    ///////////showing delete modal//////////////////////////

                    $(document).on('change', '.txtvehicleid', function() {
                        $(".txtvehiclephoto").attr("src", '<?php echo base_url() ?>assets/vehicle/doc/');




                    });
                    $(document).on('click', '.edit_diasble_enable_doc', function() {
                        $('.txtid').val($(this).data('id'));
                        $('.txtvehicleid').val($(this).data('vehicleid'));
                        $('.txtvehicledoctypeid').val($(this).data('vehicledoctypeid'));

                        $('.txtphotopath').val($(this).data('photopath'));



                        $('.txtremark').val($(this).data('remark'));
                        $(".txtvehiclephoto").attr("src", '<?php echo base_url() ?>assets/vehicle/doc/'.concat($(this).data('vehicleid')).concat('/').concat($(this).data('photopath')));


                        // var vehicletypename = $(this).data('vehicletypename');
                        // $('.vehicletypename').html(vehicletypename);

                    });
                </script>

                <!-- EXPENESE TPYE EDIT DELETE -->
                <script>
                    ///////////showing delete modal//////////////////////////
                    $(document).on('click', '.edit_diasble_enable_expensestype', function() {


                        $('.txtid').val($(this).data('id'));
                        $('.txtexpensetype').val($(this).data('expensetype'));
                        var txtexpensetype = $(this).data('expensetype');
                        // alert(txtexpensetype);
                        $('.spantxtexpensetype').html(txtexpensetype);

                    });
                </script>

                <!-- EXPENESE EDIT DELETE -->
                <script>
                    ///////////showing delete modal//////////////////////////
                    $(document).on('click', '.edit_diasble_enable_expenses', function() {



                        var driverid = $(this).data('driverid');

                        var vehicleid = $(this).data('vehicleid');

                        $.ajax({
                            type: 'POST',
                            data: {
                                driverid: driverid,
                            },
                            url: '<?php echo site_url('link_controller/driveredit'); ?>',
                            success: function(result) {
                                let dropdown = $('.txtdriverid');
                                dropdown.empty();
                                var x = JSON.parse(result);
                                // alert(x);
                                $(".txtdriverid").append(' <option value = "" selected > SELECT RIDER </option>');

                                $.each(x, function(index, value) {

                                    $(".txtdriverid").append('<option value="' + value.id + '">' + value.drivers + '</option>');
                                })

                            }
                        });




                        $.ajax({
                            type: 'POST',
                            data: {
                                vehicleid: vehicleid,
                            },
                            url: '<?php echo site_url('link_controller/vehicleedit'); ?>',
                            success: function(result) {
                                let dropdown = $('.txtvehicleid');
                                dropdown.empty();
                                var y = JSON.parse(result);
                                // alert(x);
                                $(".txtvehicleid").append('<option value="" selected >SELECT Fleet Plate No</option>');
                                $.each(y, function(index, value) {

                                    $(".txtvehicleid").append('<option value="' + value.id + '">' + value.plateno + '</option>');
                                })


                            }
                        });

                        $('.txtid').val($(this).data('id'));
                        $('.txtdriverid').val($(this).data('driverid'));
                        $('.txtvehicleid').val($(this).data('vehicleid'));
                    });
                </script>


                <!-- SELECT `id`, `fleetid`, `driverid`, `expensestype`, `amount`, 
                `expensesdate`, `description`, `reciept`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `fleetexpenses` WHERE 1 -->
                <script>
                    ///////////showing delete modal//////////////////////////
                    $(document).on('click', '.edit_diasble_enable_fleetexpensefleetexpense', function() {


                        $('.txtid').val($(this).data('id'));
                        $('.txtfleetid').val($(this).data('fleetid'));
                        $('.txtexpensestype').val($(this).data('expensestype'));
                        $('.txtamount').val($(this).data('amount'));
                        $('.txtexpensesdate').val($(this).data('expensesdate'));
                        $('.txtdescription').val($(this).data('description'));

                        $('.txtreciept_id').val($(this).data('reciept'));



                        $(".txtrecieptphoto").attr("src", '<?php echo base_url() ?>assets/reciept/'.concat($(this).data('reciept')));



                        // var txtexpensetype = $(this).data('expensetype');
                        // // alert(txtexpensetype);
                        // $('.spantxtexpensetype').html(txtexpensetype);

                    });
                </script>

</body>

</html>