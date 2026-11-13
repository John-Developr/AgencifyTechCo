        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Manage Timesheets</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('staffingcoordinators') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Timesheets</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <i class="sl-icon-grid nagivation-theme-icon"></i>
                        </div>
                        <hr>
                        <h7 class="font-weight-bold d-block mb-2" style="font-size:11px;">SELECT USER TYPE </h7>
                        <select name="type" class="select123 form-control custom-select">
                            <option value="" selected hidden> --- SELECT A USER TYPE HERE ---</option>
                            <option value="1"> Independent Contractors</option>
                            <option value="2"> Staffing Agencies</option>
                        </select>
                        <div class="other_fields" id="other_fields" style="display:none;">
                            <hr>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#inedepent-contractor" role="tab"><span class="hidden-sm-up"><i class="sl-icon-user"></i></span> <span class="hidden-xs-down">Documents</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#staffing-agencies" role="tab"><span class="hidden-sm-up"><i class="sl-icon-people"></i></i></span> <span class="hidden-xs-down">Timesheets</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="inedepent-contractor" role="tabpanel">
                                    <div class="table">
                                        <!-- <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> -->
                                        <div id="example23_wrapper" class="dt-bootstrap4">
                                            <table id="independentsheets-data-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>File Name</th>
                                                        <th>Uploaded By</th>
                                                        <th>Type</th>
                                                        <th>Date Added</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="staffing-agencies" role="tabpanel">
                                    <div class="tab-pane active" id="inedepent-contractor" role="tabpanel">
                                        <div class="table">
                                            <div id="example23_wrapper" class="dt-bootstrap4">
                                                <table id="independentdocs-data-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>File Name</th>
                                                            <th>Uploaded By</th>
                                                            <th>Date Added</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </hr>
                            </div>
                        </div>
                        <div class="other_fields2" id="other_fields2" style="display:none;">
                            <hr>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#inedepent-contractor1" role="tab"><span class="hidden-sm-up"><i class="sl-icon-user"></i></span> <span class="hidden-xs-down">Timesheets</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#staffing-agencies1" role="tab"><span class="hidden-sm-up"><i class="sl-icon-people"></i></i></span> <span class="hidden-xs-down">Documents</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="inedepent-contractor1" role="tabpanel">
                                    <div class="table">
                                        <!-- <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> -->
                                        <div id="example23_wrapper" class="dt-bootstrap4">
                                            <table id="agencysheets-data-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>File Name</th>
                                                        <th>Uploaded By</th>
                                                        <th>Type</th>
                                                        <th>Date Added</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="staffing-agencies1" role="tabpanel">
                                    <div class="tab-pane active" id="inedepent-contractor" role="tabpanel">
                                        <div class="table">
                                            <div id="example23_wrapper" class="dt-bootstrap4">
                                                <table id="agencydocs-data-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>File Name</th>
                                                            <th>Uploaded By</th>
                                                            <th>Date Added</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </hr>
                        </div>
                    </div>

                </div>

            </div>