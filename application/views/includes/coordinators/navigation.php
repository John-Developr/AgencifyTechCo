    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url() ?>assets/img/favicon.png" alt="homepage" class="dark-logo custom-image-logo2" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url() ?>assets/img/main-logo2.png" alt="homepage" class="light-logo custom-image-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="<?= base_url() ?>assets/img/favicon.png" alt="homepage" class="dark-logo" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down"><span></span></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>assets/img/default-avatar.jpg" style="object-fit: cover;height: 30px;" alt="user" class="profile-pic" /> &nbsp;<i class="fa fa-angle-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?= base_url() ?>assets/img/default-avatar.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?= $userdata[0]['fname'] . ' ' . $userdata[0]['lname'] ?></h4>
                                                <p class="text-muted"><?= $userdata[0]['email'] ?></p><a href="javascript:void();" class="btn btn-rounded btn-danger btn-sm"><?= $service_location?></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url('profile') ?>"><i class="ti-user mr-2"></i> My Profile</a></li>
                                    <li><a href="<?= base_url('profile') ?>"><i class="ti-settings mr-2"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url('logout') ?>"><i class="sl-icon-action-undo mr-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <span class="label label-success label-rounded" style="position: absolute;top: 72%;right: 1px;display: inline-block;max-width: 100%;"><?= $facility_name?></span>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MENU</li>
                        <li class="<?= $module_name == 'staffingcoordinators' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('staffingcoordinators') ?>" aria-expanded="false">
                                <i class="fas fa-home"></i><span class="hide-menu">Home</span>
                            </a>
                            <!-- <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Minimal </a></li>
                                <li><a href="index2.html">Analytical</a></li>
                                <li><a href="index3.html">Demographical</a></li>
                                <li><a href="index4.html">Modern</a></li>
                            </ul> -->
                        </li>
                        <li class="<?= $module_name == 'coordinatortimesheet' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('coordinatorsched') ?>" aria-expanded="false">
                                <i class="fas fa-hourglass-half"></i><span class="hide-menu">Schedules</span>
                            </a>
                        </li>
                        <li class="</?= $module_name == 'allusers' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('allusers') ?>" aria-expanded="false">
                                <i class="fas fa-users"></i><span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li class="</?= $module_name == 'workschedules' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('workschedules') ?>" aria-expanded="false">
                                <i class="fas fa-tasks"></i><span class="hide-menu">Work Schedules</span>
                            </a>
                        </li>
                        <!-- <li class="</?= $module_name == 'timesheets' ? 'active' : '' ?>"> 
                            <a class="waves-effect waves-dark" href="</?= base_url('timesheets') ?>" aria-expanded="false">
                                <i class="sl-icon-docs nagivation-theme-icon"></i><span class="hide-menu">Timesheets</span>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">