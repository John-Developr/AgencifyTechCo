        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body top">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0" style="color: #3cebd2;"><?= $all ?></h2>
                               <h6 class="text-muted m-b-0" style="color:white !important;">All Account</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body top">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0" style="color: #3cebd2;"><?= $contractor ?></h2>
                               <h6 class="text-muted m-b-0" style="color:white !important;">Contractors</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-info icon-Add-UserStar"></i></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body top">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0" style="color: #3cebd2;"><?= $agencies ?></h2>
                               <h6 class="text-muted m-b-0" style="color:white !important;">Agencies</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-primary icon-Remove-User"></i></div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body top">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0" style="color: #3cebd2;"><?= $coordinator ?></h2>
                               <h6 class="text-muted m-b-0" style="color:white !important;">Coordinators</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-warning icon-Add-User"></i></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="ribbon ribbon-bookmark  ribbon-default text-info" style="font-weight: 900;">Work Schedule(s) Of The Day</div>
                        <div id="weekly-calendar" class="fc fc-unthemed fc-ltr"> </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title chart" style="color: #20aee3 ;font-weight: 900;"><?= date("Y") ?>’s Total Work Schedules</h4>
                        <div class="chart">
                            <canvas id="chartWork" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ============================================================== -->