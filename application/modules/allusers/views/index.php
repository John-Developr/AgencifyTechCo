   <!-- ============================================================== -->
   <!-- ============================================================== -->
   <!-- Start: Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <div class="row page-titles">
       <div class="col-md-12 align-self-center">
           <h3 class="text-themecolor">Manage Independent Coordinators and Staffing Agencies</h3>
           <ol class="breadcrumb">
               <li class="breadcrumb-item">
                   <a href="<?= base_url('dashboard') ?>">Home</a>
               </li>
               <li class="breadcrumb-item active"> List of Independent Coordinators and Staffing Agencies</li>
           </ol>
       </div>
   </div>
   <!-- ============================================================== -->
   <!-- End: Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <!-- Start: Content -->

   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <h4 class="card-title">List of Users Tab</h4>
                   <h6 class="card-subtitle">Independent Coordinators and Staffing Agencies are displayed in this page</h6>
                   <!-- Nav tabs -->
                   <ul class="nav nav-tabs" role="tablist">
                       <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#payment" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span>
                               <span class="hidden-xs-down">Independent Coordinators</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#payment-plan" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span>
                               <span class="hidden-xs-down">Staffing Agencies</span></a>
                       </li>
                   </ul>
                   <!-- Tab panes -->
                   <div class="tab-content tabcontent-border">
                       <div class="tab-pane active" id="payment" role="tabpanel">
                           <div class="p-20">
                               <div id="config-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                   <div class="row">
                                       <div class="col-sm-12">
                                           <table id="independent-data-table" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                                               <thead>
                                                   <tr>
                                                       <th>Fullname</th>
                                                       <th>Email</th>
                                                       <!-- <th>Degree</th>
                                                       <th>Specialty</th> -->
                                                       <th>Location</th>
                                                       <th>Status</th>
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
                       <div class="tab-pane p-20" id="payment-plan" role="tabpanel">
                           <div id="config-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                               <div class="row">
                                   <div class="col-sm-12">
                                       <table id="agencies-data-table" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                                           <thead>
                                               <tr>
                                                   <th>Fullname</th>
                                                   <th>Email</th>
                                                   <!-- <th>Job Title</th>
                                                   <th>Organization</th> -->
                                                   <th>Location</th>
                                                   <th>Status</th>
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
   </div>


   <!-- End: Content -->


   <div class="modal fade" id="indecont-modal" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Independent Contractors Details</h5>
            </div>
            <div class="modal-body">
                <table style="width:100%;">
                    <tbody>
                       
                        <tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Name: </td>
                            <td style="text-align:left;padding:10px;" class="fullname" id="fullname"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Email: </td>
                            <td style="text-align:left;padding:10px;" class="amt_paid" id="email"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Phone: </td>
                            <td style="text-align:left;padding:10px;" class="date_paid" id="phone"></td>
                        </tr>
                        <td style="text-align:left;padding:10px;font-weight:bold;">Service Location: </td>
                        <td style="text-align:left;padding:10px;" class="payment_specification" id="location"></td>
                        </tr>
                        <!-- <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;"  class="degree">Degree: </td>
                            <td style="text-align:left;padding:10px;" class="degree" id="degree"></td>
                        </tr> -->
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;" class="specialty">Specialty: </td>
                            <td style="text-align:left;padding:10px;" class="specialty" id="specialty"></td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ======================================== -->

<div class="modal fade" id="staff-modal" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Staffing Agencies Details</h5>
            </div>
            <div class="modal-body">
                <table style="width:100%;">
                    <tbody>
                       
                        <tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Name: </td>
                            <td style="text-align:left;padding:10px;" class="fullname" id="fullname1"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Email: </td>
                            <td style="text-align:left;padding:10px;" class="amt_paid" id="email1"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Phone: </td>
                            <td style="text-align:left;padding:10px;" class="date_paid" id="phone1"></td>
                        </tr>
                        <td style="text-align:left;padding:10px;font-weight:bold;">Facility Location: </td>
                        <td style="text-align:left;padding:10px;" class="payment_specification" id="location1"></td>
                        </tr>
                        <tr id="change3">
                            <td style="text-align:left;padding:10px;font-weight:bold;"  class="degree">Job Title: </td>
                            <td style="text-align:left;padding:10px;" class="job" id="job"></td>
                        </tr>
                        <tr id="change4">
                            <td style="text-align:left;padding:10px;font-weight:bold;"  class="degree">Organization: </td>
                            <td style="text-align:left;padding:10px;" class="org" id="org"></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>