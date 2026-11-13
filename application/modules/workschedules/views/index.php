        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Manage Work Schedules</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('staffingcoordinators') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Work Schedules</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Work Schedules </h4>
                        <h6 class="card-subtitle">Manage work schedules for Independent Contractors and Staffing Agencies here</h6>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home8" role="tab" aria-selected="true"><span><i class="mdi mdi-account-multiple"></i></span> Contrators</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8" role="tab" aria-selected="false"><span><i class="mdi mdi-account-multiple"></i></span> Agencies</a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content ">
                            <div class="tab-pane active" id="home8" role="tabpanel">
                                <div class="p-20">
                                    <table id="contractors-data-table" class="display nowrap table table-hover text-center" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Fullname</th>
                                                <th>Event Name</th>
                                                <th>Date Started</th>
                                                <th>Date Ended</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane " id="profile8" role="tabpanel">
                                <div class="p-20" style="padding-bottom: 4%;">
                                    <table id="agencies-datatable" class="display nowrap table table-hover text-center" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Fullname</th>
                                                <th>Event Name</th>
                                                <th>Date Started</th>
                                                <th>Date Ended</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>