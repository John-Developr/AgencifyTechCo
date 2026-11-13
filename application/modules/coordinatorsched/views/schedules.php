   <!-- ============================================================== -->
   <!-- ============================================================== -->
   <!-- Start: Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <div class="row page-titles">
        <div class="col-md-5 align-self-center">
             <h3 class="text-themecolor">Manage Schedules</h3>
             <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                       <a href="<?= base_url('dashboard') ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item active"> Schedules</li>
             </ol>
        </div>
   </div>

   <!-- ============================================================== -->
   <!-- End: Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <!-- ============================================================== -->
   <!-- Start: List of instructor Container -->
   <!-- ============================================================== -->
   <div class="row">
        <div class="col-12">
             <div class="card">
                  <div class="card-body">
                       <div class="row">
                            <div class="col-md-5 align-self-center">
                                 <h4 class="card-title">List of all Schedules</h4>
                                 <h6 class="card-subtitle">You can manage the schedules here</h6>
                            </div>
                            <div class="col-md-7 align-self-center text-right d-md-block">
                                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create_modal"><i class="fa fa-plus-circle"></i> Create New Schedule</button>
                            </div>
                       </div>
                       <div class="table-responsive m-t-40">
                            <div id="config-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                 <div class="row">
                                      <div class="col-sm-12">
                                           <table id="schedules-data-table" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                                                <thead>
                                                     <tr>
                                                          <th>ID#</th>
                                                          <th>Title</th>
                                                          <th>Shift Type</th>
                                                          <!-- <th>Service Location</th> -->
                                                          <th>Start Time</th>
                                                          <th>End Time</th>
                                                          <th>Start Date</th>
                                                          <th>End Date</th>
                                                          <th>Action</th>
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
   <!-- ============================================================== -->
   <!-- End: List of instructor Container -->
   <!-- ============================================================== -->


   <!-- ============================================================== -->
   <!-- Start: Modals -->
   <!-- ============================================================== -->
   <!-- Modal Add Category -->
   <div class="modal none-border fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
        <div class="modal-dialog">
             <div class="modal-content">
                  <div class="modal-header">
                       <h4 class="modal-title"><strong>Add Schedule</strong></h4>
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                       <form id="form_create">
                            <div class="row">
                                 <div class="col-md-12">
                                      <label class="control-label">Title</label>
                                      <!-- <input class="form-control form-white" placeholder="Enter Title" type="text" name="title" id="title"> -->
                                      <select class="form-control form-white" name="title" id="title">
                                           <option value="" select hidden>Select Title Here</option>
                                           <option value="RN">RN</option>
                                           <option value="CNA">CNA</option>
                                           <option value="HHA">HHA</option>
                                           <option value="LPN">LPN</option>
                                           <option value="SW">SW</option>
                                           <option value="Pharmacists">Pharmacists</option>
                                      </select>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Shift Schedule</label>
                                      <!-- <textarea class="form-control form-white" name="description" id="description" placeholder="Enter Description" cols="20" rows="3"></textarea> -->
                                      <select class="form-control form-white" name="shift_sched" id="shift_sched">
                                           <option value="" select hidden>Select Shift Here</option>
                                           <option value="AM">AM Shift</option>
                                           <option value="PM">PM Shift</option>
                                           <option value="NOC">NOC Shift</option>
                                      </select>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Start Time</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-time"></i></span>
                                           </div>
                                           <input type="time" class="form-control mytimepicker" name="time_start" id="time_start">
                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">End Time</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-time"></i></span>
                                           </div>
                                           <input type="time" class="form-control mytimepicker" name="time_end" id="time_end">
                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Start Date</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-calendar"></i></span>
                                           </div>
                                           <input type="date" class="form-control mydatepicker" name="start" placeholder="MM/DD/YYYY" id="start">

                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">End Date</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-calendar"></i></span>
                                           </div>
                                           <input type="date" class="form-control mydatepicker" name="end" placeholder="MM/DD/YYYY" id="end">
                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Service Location</label>
                                      <div class="input-group">
                                           <input type="text" class="form-control " name="up-service_location" id="up-service_location" readonly placeholder="<?= $location; ?>">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-map"></i></span>
                                           </div>
                                      </div>
                                 </div>
                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-success save-event waves-effect waves-light" id="btn-create">Submit</button>
                            </div>
                       </form>
                  </div>
             </div>
        </div>
   </div>
   <!-- END MODAL -->

   <!-- Modal Edit Category -->
   <div class="modal none-border fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
        <div class="modal-dialog">
             <div class="modal-content">
                  <div class="modal-header">
                       <h4 class="modal-title"><strong id="modal_title">Edit Schedule</strong></h4>
                  </div>
                  <div class="modal-body">
                       <form id="form-edit">
                            <div class="row">
                                 <input type="text" name="up_id" id="up_id" hidden>
                                 <div class="col-md-12">
                                      <label class="control-label">Title</label>
                                      <select class="form-control form-white" name="up_title" id="up_title">
                                           <option select value="" hidden></option>
                                           <option value="RN">RN</option>
                                           <option value="CNA">CNA</option>
                                           <option value="HHA">HHA</option>
                                           <option value="LPN">LPN</option>
                                           <option value="SW">SW</option>
                                           <option value="Pharmacists">Pharmacists</option>
                                      </select>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Shift Schedule</label>
                                      <select class="form-control form-white" name="up_shift_sched" id="up_shift_sched">
                                           <option value="" select hidden></option>
                                           <option value="AM">AM Shift</option>
                                           <option value="PM">PM Shift</option>
                                           <option value="NOC">NOC Shift</option>
                                      </select>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Start Time</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-time"></i></span>
                                           </div>
                                           <input type="time" class="form-control mytimepicker" name="up_time_start" id="up_time_start">
                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">End Time</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-time"></i></span>
                                           </div>
                                           <input type="time" class="form-control mytimepicker" name="up_time_end" id="up_time_end">
                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Start Date</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-calendar"></i></span>
                                           </div>
                                           <input type="date" class="form-control mydatepicker" name="up_start" placeholder="MM/DD/YYYY" id="up_start">
                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">End Date</label>
                                      <div class="input-group">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-calendar"></i></span>
                                           </div>
                                           <input type="date" class="form-control mydatepicker" name="up_end" placeholder="MM/DD/YYYY" id="up_end">
                                      </div>
                                 </div>
                                 <div class="col-md-12">
                                      <label class="control-label">Service Location</label>
                                      <div class="input-group">
                                           <input type="text" class="form-control " name="up_service_location" id="up_service_location" readonly placeholder="<?= $location; ?>">
                                           <div class="input-group-append">
                                                <span class="input-group-text"><i class="ti-map"></i></span>
                                           </div>
                                      </div>
                                 </div>
                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="sl-icon-close"></i> Close</button>
                                 <button type="submit" class="btn btn-success save-event waves-effect waves-light" id="btn-edit"><i class="sl-icon-note"></i> Submit</button>
                            </div>
                       </form>
                  </div>
             </div>
        </div>
   </div>
   <!-- END MODAL -->

   <!-- Start: View Contractor Details Modal -->

   <div class="modal fade" id="view-details-modal" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal" role="document">
             <div class="modal-content">
                  <div class="modal-header">
                       <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Schedule's Details</h5>
                  </div>
                  <div class="modal-body">
                       <table style="width:100%;">
                            <tbody>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">Title: </td>
                                      <td style="text-align:left;padding:10px;" class="fullname" id="title12"></td>
                                 </tr>
                                 <tr>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">Shift Type: </td>
                                      <td style="text-align:left;padding:10px;" class="phone" id="type"></td>
                                 </tr>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">Service Location: </td>
                                      <td style="text-align:left;padding:10px;" class="email" id="location"></td>
                                 </tr>
                                 </tr>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">Start Time: </td>
                                      <td style="text-align:left;padding:10px;" class="username" id="stime"></td>
                                 </tr>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">End Time: </td>
                                      <td style="text-align:left;padding:10px;" class="username" id="etime"></td>
                                 </tr>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">Start Date: </td>
                                      <td style="text-align:left;padding:10px;" class="username" id="sdate"></td>
                                 </tr>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">End Date: </td>
                                      <td style="text-align:left;padding:10px;" class="username" id="edate"></td>
                                 </tr>
                                 <tr>
                                      <td style="text-align:left;padding:10px;font-weight:bold;">Date Created: </td>
                                      <td style="text-align:left;padding:10px;" class="username" id="created"></td>
                                 </tr>
                            </tbody>
                       </table>
                  </div>
                  <div class="modal-footer">
                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
             </div>
        </div>
   </div>
   <!-- End: View Contractor Details Modal -->