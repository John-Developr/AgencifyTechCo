    <style>
        .navbar-header {
            background-color: #242933 !important;
            height: 9vh;
        }

        .dark-logo {
            height: 60px;
            margin-top: 9px;
        }
    </style>
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
                <div class="navbar-header" style="line-height: 2px;">
                    <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="</?= base_url() ?>/assets/img/favicon.png" alt="homepage" class="dark-logo" /> -->
                            <img src="<?= base_url() ?>assets/img/main-logo12.png" alt="" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <img src="<?= base_url() ?>assets/img/main-logo22.png" alt="" class="dark-logo" />
                        </span>
                    </a>
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
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Notitications -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Bell"></i>
                                <?php if ($countnotifi != 0) { ?>
                                    <div class="notify" id="notify-unq">
                                        <span class="heartbit"></span>
                                        <span class="point"></span>
                                    </div>
                                <?php } ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications<?= $countnotifi != 0 ? '(' . $countnotifi . ')' : '' ?></div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <?php if (!empty($notications)) : ?>
                                                <?php foreach ($notications as $key => $value) : ?>
                                                    <!-- Message -->
                                                    <a href="javascript:;" data-id="<?= $value['id'] ?>" class="unread-notif" id="view-notification">
                                                        <div class="btn btn-info btn-circle"><i class="ti-calendar"></i></div>
                                                        <div class="mail-contnet">
                                                            <h5>Work Schedule</h5>
                                                            <span class="mail-desc"><?= $value['about'] ?></span>
                                                            <span class="time"><code><?= $value['date_created'] ?></code></span>
                                                        </div>
                                                        <i class="sl-icon-options-vertical"></i>
                                                    </a>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <div class="no-records-added-yet-inclass">
                                                    <div class="d-flex justify-content-center">
                                                        <img src="<?= base_url('assets/img/Empty-Notification.png'); ?>">
                                                    </div>
                                                    <div class="text-center font-weight-bold">
                                                        <p>Notification</p>
                                                    </div>
                                                    <div class="text-center">
                                                        <span>We'll let you know when we get news for you.</span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);" id="markall"> <strong>Mark all as read</strong> <i class="fas fa-check"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Notificaitons -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>assets/img/default-avatar.jpg" alt="user" class="hw-calc-3" id="profile-pic-image3" /> <span class="hidden-md-down"><i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="https://w6064.proweaversite5.com/portal/assets/img/default-avatar.jpg" class="hw-calc-2" id="profile-pic-image2" alt="user"></div>
                                            <div class="u-text">
                                                <h4 id="user-name-nav">Admin</h4>
                                                <p class="text-muted">Admin@gmail.com</p>
                                                <span class="btn btn-rounded btn-dark btn-sm user-type"><i class="sl-icon-user"></i> Admin</span>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li role="separator" class="divider"></li>
                                    <li><a href="</?= base_url('myprofile') ?>"><i class="ti-user"></i> &nbsp; &nbsp; My Profile</a></li>
                                    <li><a href="</?= base_url('myprofile') ?>"><i class="sl-icon-folder"></i> &nbsp; &nbsp; My Private Files</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="</?= base_url('myprofile') ?>"><i class="sl-icon-wrench"></i> &nbsp; &nbsp; Account Setting</a></li>-->
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url('logout') ?>"><i class="sl-icon-logout"></i> &nbsp; &nbsp; Logout</a></li>
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
        <?php
        $method = $this->router->fetch_method();
        $module_name = $this->current_class = $this->router->fetch_class();
        ?>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- DASBHOARD/SCHEDULES</li>
                        <li class="<?= ($module_name == 'dashboard' ? 'active' : 'in-active') ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('dashboard'); ?>" aria-expanded="false"><i class="sl-icon-graph nagivation-theme-icon"></i></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="<?= ($module_name == 'eventcalendar' ? 'active' : 'in-active') ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('eventcalendar'); ?>" aria-expanded="false"><i class="sl-icon-grid nagivation-theme-icon"></i><span class="hide-menu">Schedules</span></a>
                        </li>
                        <li class="nav-small-cap">--- USERS</li>
                        <li class="<?= ($module_name == 'contractors' ? 'active' : 'in-active') ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('contractors'); ?>" aria-expanded="false"><i class="sl-icon-user nagivation-theme-icon"></i><span class="hide-menu">Contractors</span></a>
                        </li>
                        <li class="<?= ($module_name == 'agencies' ? 'active' : 'in-active') ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('agencies'); ?>" aria-expanded="false"><i class="sl-icon-people nagivation-theme-icon"></i><span class="hide-menu">Staffing Agencies</span></a>
                        </li>
                        <li class="<?= ($module_name == 'coordinators' ? 'active' : 'in-active') ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('coordinators'); ?>" aria-expanded="false"><i class="sl-icon-people nagivation-theme-icon"></i><span class="hide-menu">Staffing Coordinators</span></a>
                        </li>
                        <li class="nav-small-cap">--- OTHERS</li>
                        <li class="<?= ($module_name == 'admintimesheet' ? 'active' : 'in-active') ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('admintimesheet'); ?>" aria-expanded="false"><i class="sl-icon-doc  nagivation-theme-icon"></i><span class="hide-menu">Documents</span></a>
                        </li>
                        <li class="<?= ($module_name == 'admintimesheet' ? 'active' : 'in-active') ?>">
                            <a class="waves-effect waves-dark" href="<?= base_url('admintimesheet/timesheet'); ?>" aria-expanded="false"><i class="sl-icon-docs  nagivation-theme-icon"></i><span class="hide-menu">Timesheets</span></a>
                        </li>
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
                