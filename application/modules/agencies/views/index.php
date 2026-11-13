        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Manage Staffing Agencies</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Staffing Agencies</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->




        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body top">
                        <div class="d-flex p-10 no-block">
                            <div class="align-slef-center">
                                <h2 class="m-b-0" id="all" style="color: #3cebd2;"><?php echo $all; ?></h2>
                                <h6 class="text-muted m-b-0" style="color:white !important;">All</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-primary icon-Target-Market"></i></div>
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
                                <h2 class="m-b-0" id="deactivated" style="color: #3cebd2;"><?php echo $deactivated; ?></h2>
                                <h6 class="text-muted m-b-0" style="color:white !important;">Deactivated</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-danger icon-Lock-User"></i></div>
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
                                <h2 class="m-b-0" id="activated" style="color: #3cebd2;"><?php echo $activated; ?></h2>
                                <h6 class="text-muted m-b-0" style="color:white !important;">Activated</h6>
                            </div>
                            <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Checked-User"></i></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End: 3 box count users -->
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
                                <h4 class="card-title">List of the Staffing Agencies</h4>
                                <h6 class="card-subtitle">You can manage the staffing agencies here</h6>
                            </div>
                            <div class="col-md-7 align-self-center text-right d-md-block">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create-staff-agency">
                                    Create Staffing Agencies <span class="modi-btn-icon"><i class="sl-icon-user-follow"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive m-t-40">
                            <div id="config-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="agencies-data-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Unique ID#</th>
                                                    <th>Agency Name</th>
                                                    <th>Email</th>
                                                    <th>Facility Location</th>
                                                    <th>Date Created</th>
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
        <!-- ============================================================== -->
        <!-- End: List of instructor Container -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Start: Modals -->
        <!-- ============================================================== -->

        <!-- Start: Add Constractor Modal -->
        <div class="modal fade" id="create-staff-agency" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">CREATE STAFFING AGENCY FORM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">Agency Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Agency Name Here">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usernamePrepend"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control input-check" id="username" name="username123" placeholder="Username" aria-describedby="usernamePrepend" required="">
                                        <div class="invalid-tooltip" id="email-tooltip">
                                            Please Enter Username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="emailPrepend"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="text" class="form-control input-check" id="email" name="email" placeholder="Email" aria-describedby="emailPrepend" required="">
                                        <div class="invalid-tooltip" id="email-tooltip">
                                            Please Enter Email.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="passwordPrepend"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control input-check" id="password" name="password123" placeholder="Password" aria-describedby="passwordPrepend" required="">
                                        <div class="invalid-tooltip" id="password-tooltip">
                                            Please Enter Password.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                            </div>
                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">Job Title</label>
                                    <input type="text" class="form-control" id="job" name="job" placeholder="Job Title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Organization</label>
                                    <input type="text" class="form-control" id="org" name="org" placeholder="Organization">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="form-label">Facility Location</label>
                                <select name="facility_location" class="form-control input-check">
                                    <option hidden selected value="">Select Facility Location</option>
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
                            <div class="form-group-unq">
                                <input type="text" class="form-control input-check" id="username1" name="username1234" placeholder="Username" aria-describedby="usernamePrepend">
                                <label for="message-text" class="col-form-label">Agency Documents:</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-create">Create Staffing Agency</button>
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
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Staffing Agencies Details</h5>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%;">
                            <tbody>
                                <tr>
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Agency Name: </td>
                                    <td style="text-align:left;padding:10px;" class="fullname" id="fullname"></td>
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
                                <tr>
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Facility Location: </td>
                                    <td style="text-align:left;padding:10px;" class="location" id="service_location"></td>
                                </tr>
                                <!-- <tr>
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Job Title: </td>
                                    <td style="text-align:left;padding:10px;" class="degree" id="job1"></td>
                                </tr> -->
                                <!-- <tr>
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Organization: </td>
                                    <td style="text-align:left;padding:10px;" class="specialty" id="org1"></td>
                                </tr> -->
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
        <div class="modal fade" id="edit-agencies" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">EDIT STAFFING AGENCY DETAILS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-form">
                            <div class="form-row" style="justify-content: center;text-align: center;">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="id" id="up-id" hidden>
                                    <label for="fname">Agency Name</label>
                                    <input type="text" class="form-control" id="up-fname" name="up-fname">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usernamePrepend"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control input-check" id="up-username" name="up-username" aria-describedby="usernamePrepend" required="">
                                        <div class="invalid-tooltip" id="email-tooltip">
                                            Please Enter Username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="emailPrepend"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="text" class="form-control input-check" id="up-email" name="up-email" aria-describedby="emailPrepend" required="">
                                        <div class="invalid-tooltip" id="email-tooltip">
                                            Please Enter Email.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="passwordPrepend"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control input-check" id="up-password" name="up-password" aria-describedby="passwordPrepend" required="">
                                        <div class="invalid-tooltip" id="password-tooltip">
                                            Please Enter Password.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Phone</label>
                                <input type="text" class="form-control" id="up-phone" name="up-phone">
                            </div>
                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">Job Title</label>
                                    <input type="text" class="form-control" id="up-job" name="up-job">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Organization</label>
                                    <input type="text" class="form-control" id="up-org" name="up-org">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="form-label">Facility Location</label>
                                <select name="up-facility_location" class="form-control input-check" id="up-location">
                                    <option hidden selected></option>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-update">Update Staffing Agency</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Contractor Details -->