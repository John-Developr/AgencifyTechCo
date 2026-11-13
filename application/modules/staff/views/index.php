<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">STAFF</li>
        </ol>
    </div>
    <div class="col-md-7 align-self-center text-right d-md-block">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create-staff-coordinator"><i class="sl-icon-user-follow mr-1"></i> Create Staff</button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

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
                        <table id="coordinator-table-data" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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

<!-- Start: Add Constractor Modal -->
<div class="modal fade" id="create-staff-coordinator" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">CREATE STAFF FORM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-form">
                    <div class="form-row mb-2">
                        <label class="control-label">Title</label>
                        <select class="form-control form-white" name="title" id="title" required="">
                            <option value="" select hidden>Select Title Here</option>
                            <option value="RN">RN</option>
                            <option value="LPN">LPN</option>
                            <option value="CNA">CNA</option>
                            <option value="SW">SW</option>
                            <option value="Pharmacists">Pharmacists</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required="">
                        </div>
                        <div class="form-group col-6">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="emailPrepend"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" class="form-control input-check" id="email" name="email" placeholder="Email" aria-describedby="emailPrepend" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Service Location</label>
                            <select name="service_location" class="form-control input-check" required="">
                                <option hidden selected value="">Select Service Location</option>
                                <option value="Alabama"> Alabama</option>
                                <option value="Alaska"> Alaska</option>
                                <option value="Arizona"> Arizona</option>
                                <option value="Arkansas"> Arkansas</option>
                                <option value="California"> California</option>
                                <option value="Colorado"> Colorado</option>
                                <option value="Connecticut"> Connecticut</option>
                                <option value="Delaware"> Delaware</option>
                                <option value="Florida"> Florida</option>
                                <option value="Georgia"> Georgia</option>
                                <option value="Hawaii"> Hawaii</option>
                                <option value="Idaho"> Idaho</option>
                                <option value="Illinois"> Illinois</option>
                                <option value="Indiana"> Indiana</option>
                                <option value="Iowa"> Iowa</option>
                                <option value="Kansas"> Kansas</option>
                                <option value="Kentucky"> Kentucky</option>
                                <option value="Louisiana"> Louisiana</option>
                                <option value="Maine"> Maine</option>
                                <option value="Maryland"> Maryland</option>
                                <option value="Massachusetts"> Massachusetts</option>
                                <option value="Michigan"> Michigan</option>
                                <option value="Minnesota"> Minnesota</option>
                                <option value="Mississippi"> Mississippi</option>
                                <option value="Missouri"> Missouri</option>
                                <option value="Montana"> Montana</option>
                                <option value="Nebraska"> Nebraska</option>
                                <option value="Nevada"> Nevada</option>
                                <option value="New Hampshire"> New Hampshire</option>
                                <option value="New Jersey"> New Jersey</option>
                                <option value="New Mexico"> New Mexico</option>
                                <option value="New York"> New York</option>
                                <option value="North Carolina"> North Carolina</option>
                                <option value="North Dakota"> North Dakota</option>
                                <option value="Ohio"> Ohio</option>
                                <option value="Oklahoma"> Oklahoma</option>
                                <option value="Oregon"> Oregon</option>
                                <option value="Pennsylvania"> Pennsylvania</option>
                                <option value="Rhode Island"> Rhode Island</option>
                                <option value="South Carolina"> South Carolina</option>
                                <option value="South Dakota"> South Dakota</option>
                                <option value="Tennessee"> Tennessee</option>
                                <option value="Texas"> Texas</option>
                                <option value="Utah"> Utah</option>
                                <option value="Vermont"> Vermont</option>
                                <option value="Virginia"> Virginia</option>
                                <option value="Washington"> Washington</option>
                                <option value="Washington DC"> Washington DC</option>
                                <option value="West Virginia"> West Virginia</option>
                                <option value="Wisconsin"> Wisconsin</option>
                                <option value="Wyoming"> Wyoming</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Agency Affiliation</label>
                            <div class="input-group">
                                <input type="text" class="form-control input-check" id="agency" name="agency" placeholder="Agency Affiliation" aria-describedby="emailPrepend" required="">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Staff Documents:</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="btn-create">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- End: Add Contractor Modal -->

<!-- Start: View Contractor Details Modal -->

<div class="modal fade" id="view-details-modal" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Staffing Coordinator's Details</h5>
            </div>
            <div class="modal-body">
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Name: </td>
                            <td style="text-align:left;padding:10px;" class="fullname" id="fullname"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Title: </td>
                            <td style="text-align:left;padding:10px;" class="fullname" id="view_title"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Phone: </td>
                            <td style="text-align:left;padding:10px;" class="phone" id="contact"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Email: </td>
                            <td style="text-align:left;padding:10px;" class="email" id="emailaddress"></td>
                        </tr>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Username: </td>
                            <td style="text-align:left;padding:10px;" class="username" id="user"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding:10px;font-weight:bold;">Password: </td>
                            <td style="text-align:left;padding:10px;" class="password"><input type="password" id="bu_password" style="border: hidden; color: #67757c;" readonly><span id="showpwd" class="fas fa-eye"></span></td>
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
<!-- Start: Edit Contractor Details -->
<div class="modal fade" id="edit-coordinator" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">EDIT STAFF FORM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    <div class="form-row mb-2">
                        <label class="control-label">Title</label>
                        <select class="form-control form-white" name="title" id="title" required="">
                            <option value="" select hidden>Select Title Here</option>
                            <option value="RN">RN</option>
                            <option value="LPN">LPN</option>
                            <option value="CNA">CNA</option>
                            <option value="SW">SW</option>
                            <option value="Pharmacists">Pharmacists</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required="">
                        </div>
                        <div class="form-group col-6">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="emailPrepend"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" class="form-control input-check" id="email" name="email" placeholder="Email" aria-describedby="emailPrepend" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Service Location</label>
                            <select name="service_location" class="form-control input-check" required="">
                                <option hidden selected value="">Select Service Location</option>
                                <option value="Alabama"> Alabama</option>
                                <option value="Alaska"> Alaska</option>
                                <option value="Arizona"> Arizona</option>
                                <option value="Arkansas"> Arkansas</option>
                                <option value="California"> California</option>
                                <option value="Colorado"> Colorado</option>
                                <option value="Connecticut"> Connecticut</option>
                                <option value="Delaware"> Delaware</option>
                                <option value="Florida"> Florida</option>
                                <option value="Georgia"> Georgia</option>
                                <option value="Hawaii"> Hawaii</option>
                                <option value="Idaho"> Idaho</option>
                                <option value="Illinois"> Illinois</option>
                                <option value="Indiana"> Indiana</option>
                                <option value="Iowa"> Iowa</option>
                                <option value="Kansas"> Kansas</option>
                                <option value="Kentucky"> Kentucky</option>
                                <option value="Louisiana"> Louisiana</option>
                                <option value="Maine"> Maine</option>
                                <option value="Maryland"> Maryland</option>
                                <option value="Massachusetts"> Massachusetts</option>
                                <option value="Michigan"> Michigan</option>
                                <option value="Minnesota"> Minnesota</option>
                                <option value="Mississippi"> Mississippi</option>
                                <option value="Missouri"> Missouri</option>
                                <option value="Montana"> Montana</option>
                                <option value="Nebraska"> Nebraska</option>
                                <option value="Nevada"> Nevada</option>
                                <option value="New Hampshire"> New Hampshire</option>
                                <option value="New Jersey"> New Jersey</option>
                                <option value="New Mexico"> New Mexico</option>
                                <option value="New York"> New York</option>
                                <option value="North Carolina"> North Carolina</option>
                                <option value="North Dakota"> North Dakota</option>
                                <option value="Ohio"> Ohio</option>
                                <option value="Oklahoma"> Oklahoma</option>
                                <option value="Oregon"> Oregon</option>
                                <option value="Pennsylvania"> Pennsylvania</option>
                                <option value="Rhode Island"> Rhode Island</option>
                                <option value="South Carolina"> South Carolina</option>
                                <option value="South Dakota"> South Dakota</option>
                                <option value="Tennessee"> Tennessee</option>
                                <option value="Texas"> Texas</option>
                                <option value="Utah"> Utah</option>
                                <option value="Vermont"> Vermont</option>
                                <option value="Virginia"> Virginia</option>
                                <option value="Washington"> Washington</option>
                                <option value="Washington DC"> Washington DC</option>
                                <option value="West Virginia"> West Virginia</option>
                                <option value="Wisconsin"> Wisconsin</option>
                                <option value="Wyoming"> Wyoming</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Staff Documents:</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" multiple>

                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="btn-update">Update Staff</button>
            </div>
        </div>
    </div>
</div>
<!-- End: Contractor Details -->