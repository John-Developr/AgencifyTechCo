<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
     <div class="col-md-5 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
               <li class="breadcrumb-item active">TIMESHEETS</li>
          </ol>
     </div>
     <div class="col-md-7 align-self-center text-right d-md-block">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"><i class="sl-icon-plus mr-1"></i> Add New Timesheet</button>
     </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
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
                    <form id="add-timesheet">
                         <div class="form-group-unq">
                              <label for="message-text" class="col-form-label">Choose File:</label>
                              <div class="custom-file">
                                   <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                   <label class="custom-file-label" for="inputGroupFile04" id="file_label">Choose file</label>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-info" id="upload-timesheet-btn">Upload Timesheet</button>
                         </div>
                    </form>
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
                    <div class="table-responsive mt-2">
                         <!-- <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> -->
                         <div id="example23_wrapper" class="dt-bootstrap4">
                              <table id="timesheets-data-table" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
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
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->