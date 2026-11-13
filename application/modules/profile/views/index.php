                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <div class="">
                        <!-- <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button> -->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30" id="data1">
                                    <img src="<?= base_url('assets/img/default-avatar.jpg') ?>" alt="Placeholder" class="profile-pic-page" width="150" />
                                    <h4 class="card-title m-t-10"><?= $userdata[0]['fname'] . ' ' . $userdata[0]['lname'] ?></h4>
                                    <?php if ($_SESSION['userdata']['type'] == 1) { ?>
                                        <h6 class="card-subtitle">Independent Contractors</h6>
                                    <?php } else if ($_SESSION['userdata']['type'] == 2) { ?>
                                        <h6 class="card-subtitle">Staffing Agencies</h6>
                                    <?php } else { ?>
                                        <h6 class="card-subtitle">Facilities Staffing Coordinator</h6>
                                    <?php } ?>
                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body" id="data2">
                                <small class="text-muted">Email address </small>
                                <h6><?= $userdata[0]['email'] ?></h6>
                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?= $userdata[0]['phone'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <?php if ($_SESSION['userdata']['type'] == 1) { ?>
                                            <!-- Independent Contractors for select -->
                                            <input type="hidden" name="forServiceLocation" value="<?= $userdata[0]['service_location'] ?>">
                                            <!-- <input type="hidden" name="forDegree" value="<-?= $userdata[0]['degree'] ?>"> -->
                                            <input type="hidden" name="forSpecialy" value="<?= $userdata[0]['specialty'] ?>">
                                        <?php } else if ($_SESSION['userdata']['type'] == 2) { ?>
                                            <!-- Staffing Agencies for select -->
                                            <input type="hidden" name="forJobTittle" value="<?= $userdata[0]['job_title'] ?>">
                                            <input type="hidden" name="forOrganization" value="<?= $userdata[0]['organization'] ?>">
                                            <input type="hidden" name="forFacilityLocation" value="<?= $userdata[0]['facility_location'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" name="forServiceLocationCoor" value="<?= $userdata[0]['service_location'] ?>">
                                            <!-- Facilities Staffing Coordinator for select -->
                                        <?php } ?>
                                        <h5>Personal Information</h5>
                                        <form class="form-horizontal form-material" id="profile-form">
                                            <div class="card-body">
                                                <div class="alert alert-danger show-error-forget d-none">
                                                    <i class="fas fa-exclamation-circle"></i> <span id="messg"></span>
                                                </div>
                                                <?php
                                                 if($_SESSION['userdata']['type'] != 1) : ?>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form3Example4">Facility Name</label>
                                                    <input type="text" class="form-control input-check" name="userdata[facility_name]" value="<?= $userdata[0]['facility_name'] ?>">
                                                </div>
                                                <?php endif ; ?>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form3Example1">First name</label>
                                                            <input type="text" class="form-control input-check" placeholder="First Name" name="userdata[fname]" value="<?= $userdata[0]['fname'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <label class="form-label" for="form3Example2">Last name</label>
                                                            <input type="text" class="form-control input-check" name="userdata[lname]" value="<?= $userdata[0]['lname'] ?>" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form3Example4">Email</label>
                                                    <input type="email" class="form-control input-check" name="userdata[email]" value="<?= $userdata[0]['email'] ?>" placeholder="example@gmail.com">
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form3Example4">Username</label>
                                                    <input type="text" class="form-control input-check" name="user[username]" value="<?= $userdata[0]['username'] ?>" placeholder="Username">
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form3Example4">Phone No</label>
                                                    <input type="number" class="form-control input-check" name="userdata[phone]" value="<?= $userdata[0]['phone'] ?>" placeholder="Phone No">
                                                </div>
                                                <?php if ($_SESSION['userdata']['type'] == 1) { ?>
                                                    <!-- <div class="other-field">
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label">Service Location</label>
                                                            <select name="userdata[service_location]" class="form-control input-check">
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
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label">Your Degree</label>
                                                                    <select name="userdata[degree]" class="form-control input-check">
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
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label">Your Specialty</label>
                                                                    <select name="userdata[specialty]" class="form-control input-check">
                                                                        <option value="Acute Care">Acute Care</option>
                                                                        <option value="Ambulatory Care">Ambulatory Care</option>
                                                                        <option value="Ambulatory OR">Ambulatory OR</option>
                                                                        <option value="Apheresis">Apheresis</option>
                                                                        <option value="Behavioral Health">Behavioral Health</option>
                                                                        <option value="Bone Densitometry">Bone Densitometry</option>
                                                                        <option value="BSCU (Burns Specialty Care)">BSCU (Burns Specialty Care)</option>
                                                                        <option value="Burns">Burns</option>
                                                                        <option value="Cardiac Cath Lab">Cardiac Cath Lab</option>
                                                                        <option value="Cardiothoracic">Cardiothoracic</option>
                                                                        <option value="Cardiovascular">Cardiovascular</option>
                                                                        <option value="Case Management">Case Management</option>
                                                                        <option value="CCU (Coronary Care)">CCU (Coronary Care)</option>
                                                                        <option value="Charge Nurse">Charge Nurse</option>
                                                                        <option value="CISD (Coronary ICU Stepdown)">CISD (Coronary ICU Stepdown)</option>
                                                                        <option value="Corrections">Corrections</option>
                                                                        <option value="CT">CT</option>
                                                                        <option value="CVICU (Cardiovascular Care)">CVICU (Cardiovascular Care)</option>
                                                                        <option value="CVOR (Cardiovascular Operating Room)">CVOR (Cardiovascular Operating Room)</option>
                                                                        <option value="Deployment Health Screener">Deployment Health Screener</option>
                                                                        <option value="Diabetic (Diabetes)">Diabetic (Diabetes)</option>
                                                                        <option value="Dialysis">Dialysis</option>
                                                                        <option value="ED (Emergency Department)">ED (Emergency Department)</option>
                                                                        <option value="Employee Health">Employee Health</option>
                                                                        <option value="Endoscopy">Endoscopy</option>
                                                                        <option value="ENT">ENT</option>
                                                                        <option value="EVS">EVS</option>
                                                                        <option value="First Assist">First Assist</option>
                                                                        <option value="Geriatrics">Geriatrics</option>
                                                                        <option value="GI (Gastrointestinal)">GI (Gastrointestinal)</option>
                                                                        <option value="Hemodialysis">Hemodialysis</option>
                                                                        <option value="Home Health Care">Home Health Care</option>
                                                                        <option value="Hospice">Hospice</option>
                                                                        <option value="Housekeeping">Housekeeping</option>
                                                                        <option value="ICU (Intensive Care Unit)">ICU (Intensive Care Unit)</option>
                                                                        <option value="Infection Control">Infection Control</option>
                                                                        <option value="Inpatient">Inpatient</option>
                                                                        <option value="Interventional Radiology">Interventional Radiology</option>
                                                                        <option value="Labor and Delivery">Labor and Delivery</option>
                                                                        <option value="Long Term Care">Long Term Care</option>
                                                                        <option value="LTAC (Long Term Acute Care)">LTAC (Long Term Acute Care)</option>
                                                                        <option value="Maintenance Porter - Floor Care">Maintenance Porter - Floor Care</option>
                                                                        <option value="Mammography">Mammography</option>
                                                                        <option value="MDS (Minimum Data Set)">MDS (Minimum Data Set)</option>
                                                                        <option value="Medical">Medical</option>
                                                                        <option value="Medical and Surgical">Medical and Surgical</option>
                                                                        <option value="MICU (Medical Intensive Care)">MICU (Medical Intensive Care)</option>
                                                                        <option value="MISD (Medical ICU Stepdown)">MISD (Medical ICU Stepdown)</option>
                                                                        <option value="MRI">MRI</option>
                                                                        <option value="Musculoskeletal">Musculoskeletal</option>
                                                                        <option value="Neurology">Neurology</option>
                                                                        <option value="NICU (Neonatal Intensive Care)">NICU (Neonatal Intensive Care)</option>
                                                                        <option value="NSICU (Neurosurgical Intensive Care)">NSICU (Neurosurgical Intensive Care)</option>
                                                                        <option value="NSSD (Neurological ICU Stepdown)">NSSD (Neurological ICU Stepdown)</option>
                                                                        <option value="Nuclear Medicine">Nuclear Medicine</option>
                                                                        <option value="OB/GYN">OB/GYN</option>
                                                                        <option value="Oncology">Oncology</option>
                                                                        <option value="Ophthalmology">Ophthalmology</option>
                                                                        <option value="OR (Operating Room)">OR (Operating Room)</option>
                                                                        <option value="Orthopedics">Orthopedics</option>
                                                                        <option value="Outpatient">Outpatient</option>
                                                                        <option value="PACU (Post Operative Care)">PACU (Post Operative Care)</option>
                                                                        <option value="PCU/Stepdown (Progressive Care Unit)">PCU/Stepdown (Progressive Care Unit)</option>
                                                                        <option value="Pediatric ED (Emergency Department)">Pediatric ED (Emergency Department)</option>
                                                                        <option value="Pediatric Medical and Surgical">Pediatric Medical and Surgical</option>
                                                                        <option value="Pediatric PCU/Stepdown">Pediatric PCU/Stepdown</option>
                                                                        <option value="Pediatrics">Pediatrics</option>
                                                                        <option value="PICU (Pediatrics Intensive Care)">PICU (Pediatrics Intensive Care)</option>
                                                                        <option value="Post Partum">Post Partum</option>
                                                                        <option value="PREOP (Pre Operative OR)">PREOP (Pre Operative OR)</option>
                                                                        <option value="Psychiatry">Psychiatry</option>
                                                                        <option value="Rehabilitation">Rehabilitation</option>
                                                                        <option value="SICU (Surgical Intensive Care)">SICU (Surgical Intensive Care)</option>
                                                                        <option value="SISD (Surgical ICU Stepdown)">SISD (Surgical ICU Stepdown)</option>
                                                                        <option value="Supervisor">Supervisor</option>
                                                                        <option value="Surgical Transplants">Surgical Transplants</option>
                                                                        <option value="Telemetry">Telemetry</option>
                                                                        <option value="Urology">Urology</option>
                                                                        <option value="Wound Care">Wound Care</option>
                                                                        <option value="Xray">Xray</option>
                                                                        <option value="NA/Other">NA/Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="other-field">
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label">Service Location</label>
                                                            <select name="userdata[service_location]" class="form-control input-check">
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
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label">Specialty</label>
                                                                    <select name="userdata[specialty]" class="form-control input-check">
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
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($_SESSION['userdata']['type'] == 2) { ?>
                                                    <div class="other-field">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form3Example4">Job Title</label>
                                                                    <input type="text" class="form-control input-check" name="userdata[job_title]" placeholder="Job Title">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="form3Example4">Organization</label>
                                                                    <input type="text" class="form-control input-check" name="userdata[organization]" placeholder="Organization">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label">Facility Location</label>
                                                            <select name="userdata[facility_location]" class="form-control input-check">
                                                                <option selected="" value="" hidden="">Select Facility Location</option>
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
                                                    </div>
                                                <?php } ?>
                                                <?php if ($_SESSION['userdata']['type'] == 3) { ?>
                                                    <div class="other-field">
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label">Service Location</label>
                                                            <select name="userdata[service_location]" class="form-control">
                                                                <option value="" selected hidden><?= $service_location?></option>
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
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group pl-1">
                                                    <div class="form-check custom-control custom-checkbox mr-sm-2">
                                                        <input type="checkbox" class="custom-control-input form-check-input" name="change_password" value="isset" id="change-password" data-checker="0">
                                                        <label class="custom-control-label form-check-label" for="change-password">Change Password</label>
                                                    </div>
                                                </div>
                                                <div class="password-area" id="password-area">

                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->