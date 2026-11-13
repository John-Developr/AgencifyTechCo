        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start: Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Manage Independent Contractors</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Independent Contractors</li>
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
                                <h4 class="card-title">List of the Contractors</h4>
                                <h6 class="card-subtitle">You can manage the contractors here</h6>
                            </div>
                            <div class="col-md-7 align-self-center text-right d-md-block">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create-const">
                                    Create Contractors <span class="modi-btn-icon"><i class="sl-icon-user-follow"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive m-t-40">
                            <div id="config-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="contractors-data-table" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Unique ID#</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Service Location</th>
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
        <div class="modal fade" id="create-const" tabindex="-1" role="dialog" aria-labelledby="Create Instructor Modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">CREATE CONTRACTORS FORM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create-form" type="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name Here" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name Here" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usernamePrepend"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control input-check" id="username" name="username" placeholder="Username" aria-describedby="usernamePrepend" required="">
                                        <div class="invalid-tooltip" id="email-tooltip">
                                            Please Enter Username.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
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
                                <div class="form-group col-md-4">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="passwordPrepend"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control input-check" id="password" name="password" placeholder="Password" aria-describedby="passwordPrepend" required="">
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
                            <div class="form-group">
                                <label class="form-label">Service Location</label>
                                <select name="service_location" class="form-control input-check">
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
                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label class="form-label">Your Degree</label>
                                    <select name="degree" class="form-control input-check">
                                        <option hidden selected value="">Select Your Degree</option>
                                        <option value="RN">RN</option>
                                        <option value="LPN/LVN">LPN/LVN</option>
                                        <option value="CNA">CNA</option>
                                        <option value="AA (Anesthesiologist Assistant)">AA (Anesthesiologist Assistant)</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Behavioral Health Tech">Behavioral Health Tech</option>
                                        <option value="CMA">CMA</option>
                                        <option value="CRNA">CRNA</option>
                                        <option value="Cardiovascular Technologist (Cath Lab Tech)">Cardiovascular Technologist (Cath Lab Tech)</option>
                                        <option value="Data Analytics/Reporting">Data Analytics/Reporting</option>
                                        <option value="EKG Technician">EKG Technician</option>
                                        <option value="EMT">EMT</option>
                                        <option value="EVS">EVS</option>
                                        <option value="Endoscopy Technician (GI Tech)">Endoscopy Technician (GI Tech)</option>
                                        <option value="Food Service">Food Service</option>
                                        <option value="Interpreter">Interpreter</option>
                                        <option value="MD/DO">MD/DO</option>
                                        <option value="Medical Laboratory Technician (MLT)">Medical Laboratory Technician (MLT)</option>
                                        <option value="Medical Technologist (MT)">Medical Technologist (MT)</option>
                                        <option value="Mental Health Technician (MHT)">Mental Health Technician (MHT)</option>
                                        <option value="NP">NP</option>
                                        <option value="Nursing Aide">Nursing Aide</option>
                                        <option value="Occupational Therapist">Occupational Therapist</option>
                                        <option value="PCT">PCT</option>
                                        <option value="Paramedic">Paramedic</option>
                                        <option value="Pharmacist">Pharmacist</option>
                                        <option value="Pharmacy Tech">Pharmacy Tech</option>
                                        <option value="Phlebotomist">Phlebotomist</option>
                                        <option value="Physical Therapist">Physical Therapist</option>
                                        <option value="Physician Assistant">Physician Assistant</option>
                                        <option value="Psychologist">Psychologist</option>
                                        <option value="Qualified Medication Aide (QMA)">Qualified Medication Aide (QMA)</option>
                                        <option value="Radiologic Tech (Rad Tech)">Radiologic Tech (Rad Tech)</option>
                                        <option value="Registrar">Registrar</option>
                                        <option value="Rehab Therapist">Rehab Therapist</option>
                                        <option value="Respiratory Therapist">Respiratory Therapist</option>
                                        <option value="Security">Security</option>
                                        <option value="Speech Language Pathologist">Speech Language Pathologist</option>
                                        <option value="Surgical Tech (Scrub Tech)">Surgical Tech (Scrub Tech)</option>
                                        <option value="Sterile Processing Tech">Sterile Processing Tech</option>
                                        <option value="Trainer Coordinator">Trainer Coordinator</option>
                                        <option value="Ultrasound Tech (Sonographer)">Ultrasound Tech (Sonographer)</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label class="form-label">Specialty</label>
                                    <select name="specialty" class="form-control input-check">
                                        <option hidden selected value="">Specialty</option>
                                        <option value="RNs">RNs</option>
                                        <option value="LPNs">LPNs</option>
                                        <option value="CNAs">CNAs</option>
                                        <option value="HHAs">HHAs</option>
                                        <option value="SWs">SWs</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group-unq">
                                <label for="message-text" class="col-form-label">Contractor Documents:</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-create">Create Contractors</button>
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
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Independent Contractor's Details</h5>
                    </div>
                    <div class="modal-body">
                        <table style="width:100%;">
                            <tbody>
                                <tr>
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Name: </td>
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
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Service Location: </td>
                                    <td style="text-align:left;padding:10px;" class="service_location" id="service_location"></td>
                                </tr>
                                <!-- <tr>
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Degree: </td>
                                    <td style="text-align:left;padding:10px;" class="degree" id="degree"></td>
                                </tr> -->
                                <tr>
                                    <td style="text-align:left;padding:10px;font-weight:bold;">Specialty: </td>
                                    <td style="text-align:left;padding:10px;" class="specialty" id="specialty"></td>
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
        <div class="modal fade" id="edit-contractor" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">EDIT CONTRACTOR DETAILS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="id" id="up-id" hidden>
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="up-fname" name="firstname">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="up-lname" name="lastname">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usernamePrepend"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control input-check" id="up-username" name="username" aria-describedby="usernamePrepend" required="">
                                        <div class="invalid-tooltip" id="email-tooltip">
                                            Please Enter Username.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="emailPrepend"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="text" class="form-control input-check" id="up-email" name="email" aria-describedby="emailPrepend" required="">
                                        <div class="invalid-tooltip" id="email-tooltip">
                                            Please Enter Email.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="passwordPrepend"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control input-check" id="up-password" name="password" aria-describedby="passwordPrepend" required="">
                                        <div class="invalid-tooltip" id="password-tooltip">
                                            Please Enter Password.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Phone</label>
                                <input type="text" class="form-control" id="up-phone" name="phone" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Service Location</label>
                                <select name="service_location" class="form-control input-check" id="up-location">
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
                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label class="form-label">Your Degree</label>
                                    <select name="degree" class="form-control input-check" id="up-degree">
                                        <option hidden selected value=""></option>
                                        <option value="RN">RN</option>
                                        <option value="LPN/LVN">LPN/LVN</option>
                                        <option value="CNA">CNA</option>
                                        <option value="AA (Anesthesiologist Assistant)">AA (Anesthesiologist Assistant)</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Behavioral Health Tech">Behavioral Health Tech</option>
                                        <option value="CMA">CMA</option>
                                        <option value="CRNA">CRNA</option>
                                        <option value="Cardiovascular Technologist (Cath Lab Tech)">Cardiovascular Technologist (Cath Lab Tech)</option>
                                        <option value="Data Analytics/Reporting">Data Analytics/Reporting</option>
                                        <option value="EKG Technician">EKG Technician</option>
                                        <option value="EMT">EMT</option>
                                        <option value="EVS">EVS</option>
                                        <option value="Endoscopy Technician (GI Tech)">Endoscopy Technician (GI Tech)</option>
                                        <option value="Food Service">Food Service</option>
                                        <option value="Interpreter">Interpreter</option>
                                        <option value="MD/DO">MD/DO</option>
                                        <option value="Medical Laboratory Technician (MLT)">Medical Laboratory Technician (MLT)</option>
                                        <option value="Medical Technologist (MT)">Medical Technologist (MT)</option>
                                        <option value="Mental Health Technician (MHT)">Mental Health Technician (MHT)</option>
                                        <option value="NP">NP</option>
                                        <option value="Nursing Aide">Nursing Aide</option>
                                        <option value="Occupational Therapist">Occupational Therapist</option>
                                        <option value="PCT">PCT</option>
                                        <option value="Paramedic">Paramedic</option>
                                        <option value="Pharmacist">Pharmacist</option>
                                        <option value="Pharmacy Tech">Pharmacy Tech</option>
                                        <option value="Phlebotomist">Phlebotomist</option>
                                        <option value="Physical Therapist">Physical Therapist</option>
                                        <option value="Physician Assistant">Physician Assistant</option>
                                        <option value="Psychologist">Psychologist</option>
                                        <option value="Qualified Medication Aide (QMA)">Qualified Medication Aide (QMA)</option>
                                        <option value="Radiologic Tech (Rad Tech)">Radiologic Tech (Rad Tech)</option>
                                        <option value="Registrar">Registrar</option>
                                        <option value="Rehab Therapist">Rehab Therapist</option>
                                        <option value="Respiratory Therapist">Respiratory Therapist</option>
                                        <option value="Security">Security</option>
                                        <option value="Speech Language Pathologist">Speech Language Pathologist</option>
                                        <option value="Surgical Tech (Scrub Tech)">Surgical Tech (Scrub Tech)</option>
                                        <option value="Sterile Processing Tech">Sterile Processing Tech</option>
                                        <option value="Trainer Coordinator">Trainer Coordinator</option>
                                        <option value="Ultrasound Tech (Sonographer)">Ultrasound Tech (Sonographer)</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label class="form-label">Specialty</label>
                                    <select name="specialty" class="form-control input-check" id="up-specialty">
                                        <option hidden selected value="">Specialty</option>
                                        <option value="RNs">RNs</option>
                                        <option value="LPNs">LPNs</option>
                                        <option value="CNAs">CNAs</option>
                                        <option value="HHAs">HHAs</option>
                                        <option value="SWs">SWs</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-update">Update Contractor</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Contractor Details -->