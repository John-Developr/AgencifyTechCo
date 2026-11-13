        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
             <div class="col-md-12 align-self-center">
                  <h3 class="text-themecolor">Manage Timesheets</h3>
                  <ol class="breadcrumb">
                       <li class="breadcrumb-item">
                            <a href="<?= base_url('dashboard') ?>">Home</a>
                       </li>
                       <li class="breadcrumb-item active">Timesheets</li>
                  </ol>
             </div>
        </div>
        <!-- ============================================================== -->
        <!-- End: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row">
             <!-- Column -->
             <div class="col-lg-4 col-md-">
                  <div class="card">
                       <div class="card-body top">
                            <div class="d-flex p-10 no-block">
                                 <div class="align-slef-center">
                                      <h2 class="m-b-0" id="all" style="color: #3cebd2;"><?= $allfiles ?></h2>
                                      <h6 class="text-muted m-b-0" style="color:white !important;">Total Files</h6>
                                 </div>
                                 <div class="align-self-center display-6 ml-auto"><i class="text-success ti-files"></i></div>
                            </div>
                       </div>

                  </div>
             </div>
             <!-- Column -->
             <!-- Column -->
             <div class="col-lg-4 col-md-">
                  <div class="card">
                       <div class="card-body top">
                            <div class="d-flex p-10 no-block">
                                 <div class="align-slef-center">
                                      <h2 class="m-b-0" id="all" style="color: #3cebd2;"><?= $contractors ?></h2>
                                      <h6 class="text-muted m-b-0" style="color:white !important;">Independent Contractors Files</h6>
                                 </div>
                                 <div class="align-self-center display-6 ml-auto"><i class="text-primary ti-file"></i></div>
                            </div>
                       </div>

                  </div>
             </div>
             <!-- Column -->
             <!-- Column -->
             <div class="col-lg-4 col-md-6">
                  <div class="card">
                       <div class="card-body top">
                            <div class="d-flex p-10 no-block">
                                 <div class="align-slef-center">
                                      <h2 class="m-b-0" id="all" style="color: #3cebd2;"><?= $agencies ?></h2>
                                      <h6 class="text-muted m-b-0" style="color:white !important;">Staffing Agencies Files</h6>
                                 </div>
                                 <div class="align-self-center display-6 ml-auto"><i class="text-info ti-file"></i></i></div>
                            </div>
                       </div>

                  </div>
             </div>
             <!-- Column -->
        </div>
        <div class="row">
             <div class="col-12 text-right mb-2">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#upload_timesheet"><i class="sl-icon-plus mr-1"></i> Add New Timesheet</button>
             </div>
        </div>
        <div class="row">
             <div class="col-12">
                  <div class="card">
                       <div class="card-body">
                            <div class="text-right">
                                 <i class="sl-icon-grid nagivation-theme-icon"></i>
                            </div>
                            <hr>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                 <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#inedepent-contractor" role="tab"><span class="hidden-sm-up"><i class="sl-icon-user"></i></span> <span class="hidden-xs-down">Independent Contractor</span></a> </li>
                                 <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#staffing-agencies" role="tab"><span class="hidden-sm-up"><i class="sl-icon-people"></i></i></span> <span class="hidden-xs-down">Staffing Agencies</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                 <div class="tab-pane active" id="inedepent-contractor" role="tabpanel">
                                      <div class="table">
                                           <!-- <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"> -->
                                           <div id="example23_wrapper" class="dt-bootstrap4">
                                                <table id="file-data-table3" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                 <div class="tab-pane  p-20" id="staffing-agencies" role="tabpanel">
                                      <div class="tab-pane active" id="inedepent-contractor" role="tabpanel">
                                           <div class="table">
                                                <div id="example23_wrapper" class="dt-bootstrap4">
                                                     <table id="file-data-table4" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                  </div>
             </div>
        </div>
             <!-- ============================================================== -->
             <!-- Start Page MODAL -->
             <!-- ============================================================== -->
             <div class="modal fade" id="upload_timesheet" tabindex="-1" role="dialog" aria-labelledby="upload_timesheet" aria-hidden="true">
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
                                           <label for="message-text" class="col-form-label">Select user to upload to</label>
                                           <select class="select21 form-control custom-select" name="uploadTo" style="width: 100%; height:36px;">
                                                <optgroup label="Independent Contractor">
                                                     <?php if (!empty($listContractor)) : ?>
                                                          <?php foreach ($listContractor as $key => $value) : ?>
                                                               <option value="<?= $value['fk_id'] ?>"><?= $value['fname'] ?> <?= $value['lname'] ?></option>
                                                          <?php endforeach; ?>
                                                     <?php endif; ?>
                                                </optgroup>
                                                <optgroup label="Staffing Agencies Users">
                                                     <?php if (!empty($listStaffing)) : ?>
                                                          <?php foreach ($listStaffing as $key => $value) : ?>
                                                               <option value="<?= $value['fk_id'] ?>"><?= $value['fname'] ?> <?= $value['lname'] ?></option>
                                                          <?php endforeach; ?>
                                                     <?php endif; ?>
                                                </optgroup>
                                           </select>
                                      </div>
                                      <div class="form-group-unq">
                                           <label for="message-text" class="col-form-label">Choose File:</label>
                                           <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                           </div>
                                      </div>
                                      <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                           <button type="submit" class="btn btn-info" id="upload-time-btn">Upload Timesheet</button>
                                      </div>
                                 </form>
                            </div>
                       </div>
                  </div>
             </div>
<script>
     $(document).ready(function(){
          $(".select21").select2({
        dropdownParent: $('#upload_timesheet')
          });
     });
</script>