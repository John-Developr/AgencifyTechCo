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
       <div class="col-md-7 align-self-center text-right d-none d-md-block">
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create_modal"><i class="fa fa-plus-circle"></i> Create New Schedule</button>
       </div>
   </div>

   <!-- ============================================================== -->
   <!-- End: Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->

   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="">
                   <div class="row">
                       <div class="col-lg-12">
                           <div class="card-body b-l calender-sidebar">
                               <div id="calendar-schedule"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
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
                               </select>
                           </div>
                           <div class="col-md-12">
                               <label class="control-label">Shift Schedule</label>
                               <!-- <textarea class="form-control form-white" name="description" id="description" placeholder="Enter Description" cols="20" rows="3"></textarea> -->
                               <select class="form-control form-white" name="shift_sched" id="shift_sched">
                                   <option value="" select hidden>Select Shift Here</option>
                                   <option value="am">AM Shift</option>
                                   <option value="pm">PM Shift</option>
                                   <option value="noc">NOC Shift</option>
                               </select>
                           </div>
                           <div class="col-md-12">
                               <label class="control-label">Start Time</label>
                               <div class="input-group">
                                   <div class="input-group-append">
                                       <span class="input-group-text"><i class="ti-time"></i></span>
                                   </div>
                                   <input type="time" class="form-control mytimepicker" name="time_start"  id="time_start">
                               </div>
                           </div>
                           <div class="col-md-12">
                               <label class="control-label">End Time</label>
                               <div class="input-group">
                                   <div class="input-group-append">
                                       <span class="input-group-text"><i class="ti-time"></i></span>
                                   </div>
                                   <input type="time" class="form-control mytimepicker" name="time_end"  id="time_end">
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
                           <div class="col-md-12">
                               <label class="form-label">Color</label>
                               <select name="color" class="form-control" id="color">
                                   <option value="" selected hidden>SELECT COLOR</option>
                                   <option style="color:#6772e5;" value="#6772e5">&#9724; Purple</option>
                                   <option style="color:#24d2b5;" value="#24d2b5">&#9724; Green</option>
                                   <option style="color:#20aee3;" value="#20aee3">&#9724; Blue</option>
                                   <option style="color:#ff9041;" value="#ff9041">&#9724; Orange</option>
                                   <option style="color:#ff5c6c;" value="#ff5c6c">&#9724; Red</option>
                                   <option style="color:#000;" value="#000">&#9724; Black</option>
                               </select>
                           </div>
                       </div>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-success save-event waves-effect waves-light" id="btn-create">Create event</button>
               </div>
           </div>
       </div>
   </div>
   <!-- END MODAL -->

   <!-- Modal Edit Category -->
   <div class="modal none-border" id="edit_modal">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title"><strong id="modal_title">View Event Schedule</strong></h4>
               </div>
               <div class="modal-body">
                   <form id="form-edit">
                       <div class="row">
                           <!-- <div class="col-md-12">
                               <label class="control-label">Uploader Name</label>
                               <input class="form-control form-white" placeholder="Enter Title" type="text" name="up-title" id="up-name" readonly />
                           </div> -->
                           <div class="col-md-12">
                               <input type="text" name="calendar_id" id="up-id" hidden>
                               <label class="control-label">Title</label>
                               <input class="form-control form-white" placeholder="Enter Title" type="text" name="up-title" id="up-title" readonly />
                           </div>
                           <div class="col-md-12">
                               <label class="control-label">Description</label>
                               <textarea class="form-control form-white" name="up-description" id="up-description" placeholder="No Description Yet...." cols="20" rows="3" readonly></textarea>
                           </div>
                           <div class="col-md-12">
                               <label class="control-label">Start Date</label>
                               <div class="input-group">
                                   <input type="date" class="form-control mydatepicker" name="up-start" id="up-start" placeholder="MM/DD/YYYY" readonly>
                                   <div class="input-group-append">
                                       <span class="input-group-text"><i class="ti-calendar"></i></span>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-12">
                               <label class="control-label">End Date</label>
                               <div class="input-group">
                                   <input type="date" class="form-control mydatepicker" name="up-end" id="up-end" placeholder="MM/DD/YYYY" readonly>
                                   <div class="input-group-append">
                                       <span class="input-group-text"><i class="ti-calendar"></i></span>
                                   </div>
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
                           <div class="col-md-12">
                               <label class="form-label">Color</label>
                               <select name="up-color" class="form-control" id="up-color" disabled>
                                   <option value="" selected hidden>SELECT COLOR</option>
                                   <option style="color:#6772e5;" value="#6772e5">&#9724; Purple</option>
                                   <option style="color:#24d2b5;" value="#24d2b5">&#9724; Green</option>
                                   <option style="color:#20aee3;" value="#20aee3">&#9724; Blue</option>
                                   <option style="color:#ff9041;" value="#ff9041">&#9724; Orange</option>
                                   <option style="color:#ff5c6c;" value="#ff5c6c">&#9724; Red</option>
                                   <option style="color:#000;" value="#000">&#9724; Black</option>
                               </select>
                           </div>
                       </div>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="sl-icon-close"></i> Close</button>
                   <button type="submit" class="btn btn-danger save-event waves-effect waves-light" id="btn-delete"><i class="sl-icon-trash"></i> Delete</button>
                   <button type="submit" class="btn btn-success save-event waves-effect waves-light" id="btn-edit"><i class="sl-icon-note"></i> Edit</button>
               </div>
           </div>
       </div>
   </div>
   <!-- END MODAL -->