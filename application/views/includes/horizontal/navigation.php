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
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>assets/img/default-avatar.jpg" style="object-fit: cover;height: 30px;" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?= base_url() ?>assets/img/default-avatar.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?= $userdata[0]['fname'] . ' ' . $userdata[0]['lname'] ?></h4>
                                                <p class="text-muted"><?= $userdata[0]['email'] ?></p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
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
                        <li class="<?= $module_name == 'home' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('home') ?>" aria-expanded="false">
                                <i class="sl-icon-home nagivation-theme-icon"></i><span class="hide-menu">Home</span>
                            </a>
                            <!-- <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Minimal </a></li>
                                <li><a href="index2.html">Analytical</a></li>
                                <li><a href="index3.html">Demographical</a></li>
                                <li><a href="index4.html">Modern</a></li>
                            </ul> -->
                        </li>
                        <!-- <li class="</?= $module_name == 'schedule' && $method == 'pending'  ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="</?= base_url('schedule/pending') ?>" aria-expanded="false">
                                <i class="sl-icon-hourglass nagivation-theme-icon"></i><span class="hide-menu">Pending Schedules</span>
                            </a>
                        </li>
                        <li class="</?= $module_name == 'schedule' && $method == 'decline'  ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="</?= base_url('schedule/decline') ?>" aria-expanded="false">
                                <i class="sl-icon-close nagivation-theme-icon"></i><span class="hide-menu">Decline Schedule</span>
                            </a>
                        </li> -->
                        <li class="<?= $module_name == 'timesheets' && $method == 'index' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('timesheets') ?>" aria-expanded="false">
                                <i class="sl-icon-docs nagivation-theme-icon"></i><span class="hide-menu">Documents</span>
                            </a>
                        </li>
                        <?php if($_SESSION['type'] == 2 || $_SESSION['type'] == 1) : ?>
                        <li class="<?= $module_name == 'timesheets' && $method == 'files' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('timesheets/files') ?>" aria-expanded="false">
                                <i class="sl-icon-docs nagivation-theme-icon"></i><span class="hide-menu">Timesheets</span>
                            </a>
                        </li>
                        <?php endif ; ?>
                        <?php if($_SESSION['type'] == 2) : ?>
                        <li class="<?= $module_name == 'staff' ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('staff') ?>" aria-expanded="false">
                                <i class="sl-icon-people nagivation-theme-icon"></i><span class="hide-menu">Staff</span>
                            </a>
                        </li>
                        <?php endif ; ?>
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