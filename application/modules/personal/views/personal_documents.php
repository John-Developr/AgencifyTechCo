        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Manage Documents</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Personal Documents</li>
                </ol>
            </div>
            <div class="col-md-7 align-self-center text-right d-md-block">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="sl-icon-plus mr-1"></i> Add Personal Documents</button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Start Page MODAL -->
        <!-- ============================================================== -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">UPLOAD TIMESHEETS FORM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-file">
                            <div class="form-group-unq">
                                <label for="message-text" class="col-form-label">Documents For:</label>
                                <select class="form-control custom-select" name="file_type" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="" selected hidden>Please select documents for:</option>
                                    <option value="Licenses">Licenses</option>
                                    <option value="TB screening/test">TB screening/test</option>
                                    <option value="Background check clearance result">Background check clearance result</option>
                                    <option value="Dementia training certificates">Dementia training certificates</option>
                                    <option value="CPR card">CPR card</option>
                                    <option value="OIG clearance repor">OIG clearance report</option>
                                    <option value="OIG clearance repor">Workers compensation insurance</option>
                                    <option value="Liability insurance">Liability insurance</option>
                                </select>
                            </div>
                            <div class="form-group-unq">
                                <label for="message-text" class="col-form-label">Choose File:</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="upload-time-btn">Upload Timesheet</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <i class="sl-icon-grid nagivation-theme-icon"></i>
                        </div>
                        <hr>
                        <!-- <div class="file-content" id="file-content"> -->
                        <!-- <h7 class="font-weight-bold d-block mb-1" style="font-size:11px;">FILES</h7>
                    <div class="dropzone-area" for="file-input-hidden"> -->
                        <!-- <-?php if (!empty($file_data)) : ?>
                            <div class="files-content-here">
                                <-?php foreach ($file_data as $key => $file_info) : ?>
                                    <div class="file-container">
                                        <div class="text-right">
                                            <button class="button-action-file " id="action-file" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="sl-icon-options-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="action-file">
                                                <a class="dropdown-item text-uppercase custom-drop-item font-weight-bold" href="<-?= base_url('upload/timesheets/'.$file_info['filename']); ?>" target="_blank" download>download</a>
                                                <a class="dropdown-item text-uppercase custom-drop-item text-danger font-weight-bold" id="remove-file" data-id ="<-?= $file_info['id'] ?>">remove</a>
                                            </div>
                                        </div>
                                        <div class="image-timesheets">
                                            <img src="<-?= base_url() ?>assets/img/timesheets.png" alt="Timesheets" class="file-icon">
                                        </div>
                                        <span class="text-left d-block name-area"><i class="fas fa-folder mr-2"></i> <-?= $file_info['filename'] ?></span>
                                    </div>
                                <-?php endforeach; ?>
                            </div>
                        <-?php else : ?>
                            <h6 class="text-uppercase font-weight-bold">Select files</h6>
                            <span class="text-uppercase d-block" style="font-size:11px;">or Drop dpf/docx Files Here</span>
                        <-?php endif; ?> -->
                        <!-- </div>
                    <input type="file" class="d-none" id="hidden-file"> -->
                        <!-- </div> -->
                        <!-- <h4 class="card-title">Data Export</h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF &amp; Print</h6> -->
                        <div class="row">
                            <div class="col-md-12 align-self-center d-md-block">
                                <div class="filter-area">
                                    Filter By:
                                    <select name="filter" style="background: #f9f9f9;border: none;border-radius: 3px;padding: 6px 8px;">
                                        <option value="" selected hidden>Select File Filter</option>
                                        <option value="" selected hidden>Please select filter for:</option>
                                        <option value="Licenses">Licenses</option>
                                        <option value="TB screening/test">TB screening/test</option>
                                        <option value="Background check clearance result">Background check clearance result</option>
                                        <option value="Dementia training certificates">Dementia training certificates</option>
                                        <option value="CPR card">CPR card</option>
                                        <option value="OIG clearance repor">OIG clearance report</option>
                                        <option value="OIG clearance repor">Workers compensation insurance</option>
                                        <option value="Liability insurance">Liability insurance</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <!-- <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> -->
                            <div id="example23_wrapper" class="dt-bootstrap4">
                                <table id="file-data-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
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
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->