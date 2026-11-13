  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-bold">Employee System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar  text-sm">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if(user()->profile_image == null || user()->profile_image == ''): ?>
            <h3 class="img-circle elevation-5 text-white text-uppercase"><?php echo $_SESSION['user_initials']  ?></h3>
          <?php else: ?>
            <img src="<?php echo base_url('upload/'). user()->profile_image ?>" class="img-circle elevation-2" alt="User Image">
          <?php endif; ?>
        </div>
        <div class="info">
          <a href="#" class="d-block text-center"><?php echo user()->first_name .' '. user()->last_name ?>
            <br> <small> (<?php echo user()->position  ?>) </small>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?php echo base_url() ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('/profile') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employees
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('/users') ?>" class="nav-link">
                  <i class="fas fa-th-list nav-icon"></i>
                  <p>View Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('users/disabled_users') ?>" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Disabled Users</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('/stock_photos') ?>" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Stock Photos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('/file_manager') ?>" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                File Manager
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('/trash') ?>" class="nav-link">
              <i class="nav-icon fas fa-trash-alt"></i>
              <p>
                Trash
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="javascript:" id="toggle_theme" class="nav-link">
            <i id="toggle_icon" ></i>
              <p>
                Dark Mode
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>



        </ul>
      </nav>
    </div>
  </aside>