// A jQuery function that will execute the function when the document is ready. */
$(document).ready(function () {
    login();
    showpassword();
    forgetpassword();
    register();
    changepassword();
});

const login = () => {
    $(document).on('submit', '#login-form', function (event) {
        event.preventDefault();
        $('#button-login').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>`);
        $('.alert-danger').addClass('d-none').removeClass('d-block');
        param['input'] = $('.input-check');
        param['ERROR'] = 0;
        param['input'].map(function () {
            if (!$(this).val()) {
                param['ERROR']++;
            }
        });
        if (param['ERROR'] == 0) {
            param['FORM'] = new FormData(this);
            param['serve_request'] = server(`${param['BASE_URL']}account/auth`, param['FORM']);
            if (param['serve_request'].status) {
                if (param['serve_request'].type == 0) {
                    window.location = `${param['BASE_URL']}dashboard`;
                } else if (param['serve_request'].type == 3) {
                    window.location = `${param['BASE_URL']}staffingcoordinators`;
                } else {
                    window.location = `${param['BASE_URL']}home`;
                }
            } else {
                setTimeout(function () {
                    $('#button-login').html(`Login`);
                    $('.alert-danger').removeClass('d-none').addClass('d-block');
                    $('#messg').html(`${param['serve_request'].msg}`);
                }, 1500);
            }
        } else {
            $('#messg').html(`Error, Invalid Username/Password.`);
            $('.alert-danger').removeClass('d-none').addClass('d-block');
            $('#button-login').html('Login');
        }
    });
}

const showpassword = () => {
    $(document).on('click', '#customCheck3', function () {
        if ($(this).hasClass('show-password')) {
            $(this).removeClass('show-password');
            $('#password').attr('type', 'password');
            $('#cpassword').attr('type', 'password');
        } else {
            $(this).addClass('show-password');
            $('#password').attr('type', 'text');
            $('#cpassword').attr('type', 'text');
        }
    });
}

// forget password action
const forgetpassword = () => {
    $(document).on('submit', '#forget-password-form', function (event) {
        event.preventDefault();
        $('.show-error-forget').addClass('d-none').removeClass('d-block');
        param['FORM'] = new FormData(this);
        param['serve_request'] = server(`${param['BASE_URL']}account/requestchangepass`, param['FORM']);
        if (param['serve_request'].status) {
            $('.show-error-forget').addClass('d-none').removeClass('d-block');
            $('#fort-passswor-child').hide();
            $('#success-reset').show();
        } else {
            setTimeout(function () {
                $('#reset-password').html(`Reset Password`);
                $('.show-error-forget').removeClass('d-none').addClass('d-block').html(`<i class="fas fa-exclamation-circle"></i> ${param['serve_request'].message}`);
            }, 1500);
        }
    });
    $(document).on('click', '#back-confirmation', function () {
        $('#success-reset').hide();
        $('#fort-passswor-child').show();
    });
}


const register = () => {
    $(document).on('submit', '#paymentform', function (event) {
        event.preventDefault();
        param['FORM'] = new FormData(this);
        param['input'] = $('.input-check');
        param['ERROR'] = 0;
        param['password'] = $('[name="user[password]"]').val();
        param['cpassword'] = $('[name="cpassword"]').val();
        if (!$('.regisration-type').val()) {
            $('.alert-danger').removeClass('d-none').addClass('d-block');
            $('#messg').text('Please select a Regiration Type');
        } else {
            param['input'].each(function () {
                if (!$(this).val()) {
                    param['ERROR']++;
                }
            });
            if (param['ERROR'] == 0) {
                $('.alert-danger').addClass('d-none').removeClass('d-block');
                param['serve_request'] = server(`${param['BASE_URL']}account/register_data`, param['FORM']);
                if (param['serve_request'].status) {
                    $('#success-register').show();
                    $('#paymentform').hide();
                    setTimeout(function () {
                        if (param['serve_request'].type == 0) {
                            window.location = `${param['BASE_URL']}dashboard`;
                        } else if (param['serve_request'].type == 3) {
                            window.location = `${param['BASE_URL']}staffingcoordinators`;
                        } else {
                            window.location = `${param['BASE_URL']}home`;
                        }
                    }, 1500);
                } else {
                    $('.alert-danger').removeClass('d-none').addClass('d-block');
                    $('#messg').html(`${param['serve_request'].msg}`);
                }
            } else {
                $('.alert-danger').removeClass('d-none').addClass('d-block');
                $('#messg').html('Please fill up the form');
            }
        }
    });
    $(document).on('change', '.regisration-type', function () {
        param['regisrtation_type'] = $(this).val();
        if (param['regisrtation_type'] == 1) {
            $('.other-field').html(independent_constractor());
            $('#hidethis').show();
            $('#agency_name').attr('class','col-md-6 mb-4');
            $('#first_name').html('First name');
            $('#fname').attr('placeholder','First Name');
            $('#lname').addClass('input-check');
            $('#facility').remove();
        } else if (param['regisrtation_type'] == 2) {
            $('.other-field').html(staffing_agencies());
            $('#hidethis').hide();
            $('#agency_name').attr('class','col-md-12 mb-4');
            $('#first_name').html('Agency name');
            $('#fname').attr('placeholder','Agency Name');
            $('#lname').removeClass('input-check');
            $('#facility').remove();
        } else {
            $('#facilities_name').html(facilitynames());
            $('.other-field').html(facilities_staffing_coordinator());
            $('#hidethis').show();
            $('#agency_name').attr('class','col-md-6 mb-4');
            $('#first_name').html('First name');
            $('#fname').attr('placeholder','First Name');
            $('#lname').addClass('input-check');
        }
    });
}

const changepassword = () => {
    $(document).on('submit', '#change-password-form', function (event) {
        event.preventDefault();
        $('.show-error-forget').addClass('d-none').removeClass('d-block');
        param['FORM'] = new FormData(this);
        param['input'] = $('.input-check');
        param['ERROR'] = 0;
        param['input'].each(function () {
            if (!$(this).val()) {
                param['ERROR']++;
            }
        });
        if (param['ERROR'] == 0) {
            $('.alert-danger').addClass('d-none').removeClass('d-block');
            param['serve_request'] = server(`${param['BASE_URL']}account/changenow`, param['FORM']);
            if (param['serve_request'].status) {
                $('#change-password-form').hide();
                $('#success-reset').show();
                setTimeout(function () {
                    window.location = `${param['BASE_URL']}account`;
                }, 2500);
            } else {
                setTimeout(function () {
                    $('.show-error-forget').removeClass('d-none').addClass('d-block').html(`<i class="fas fa-exclamation-circle"></i> ${param['serve_request'].message}`);
                }, 1500);
            }
        } else {
            $('.show-error-forget').removeClass('d-none').addClass('d-block').html('<i class="fas fa-exclamation-circle"></i> ERROR, Please fill up the form');
        }
    });
}

// const independent_constractor = () => {
//     return `<hr>
//     <div class="form-outline mb-4">
//         <label class="form-label">Service Location</label>
//         <select name="userdata[service_location]" class="form-control input-check">
//             <option hidden selected value="">Select Service Location</option>
//             <option value="Alabama"> Alabama</option>
//             <option value="Alaska"> Alaska</option>
//             <option value="Arizona"> Arizona</option>
//             <option value="Arkansas"> Arkansas</option>
//             <option value="California"> California</option>
//             <option value="Colorado"> Colorado</option>
//             <option value="Connecticut"> Connecticut</option>
//             <option value="Delaware"> Delaware</option>
//             <option value="Florida"> Florida</option>
//             <option value="Georgia"> Georgia</option>
//             <option value="Hawaii"> Hawaii</option>
//             <option value="Idaho"> Idaho</option>
//             <option value="Illinois"> Illinois</option>
//             <option value="Indiana"> Indiana</option>
//             <option value="Iowa"> Iowa</option>
//             <option value="Kansas"> Kansas</option>
//             <option value="Kentucky"> Kentucky</option>
//             <option value="Louisiana"> Louisiana</option>
//             <option value="Maine"> Maine</option>
//             <option value="Maryland"> Maryland</option>
//             <option value="Massachusetts"> Massachusetts</option>
//             <option value="Michigan"> Michigan</option>
//             <option value="Minnesota"> Minnesota</option>
//             <option value="Mississippi"> Mississippi</option>
//             <option value="Missouri"> Missouri</option>
//             <option value="Montana"> Montana</option>
//             <option value="Nebraska"> Nebraska</option>
//             <option value="Nevada"> Nevada</option>
//             <option value="New Hampshire"> New Hampshire</option>
//             <option value="New Jersey"> New Jersey</option>
//             <option value="New Mexico"> New Mexico</option>
//             <option value="New York"> New York</option>
//             <option value="North Carolina"> North Carolina</option>
//             <option value="North Dakota"> North Dakota</option>
//             <option value="Ohio"> Ohio</option>
//             <option value="Oklahoma"> Oklahoma</option>
//             <option value="Oregon"> Oregon</option>
//             <option value="Pennsylvania"> Pennsylvania</option>
//             <option value="Rhode Island"> Rhode Island</option>
//             <option value="South Carolina"> South Carolina</option>
//             <option value="South Dakota"> South Dakota</option>
//             <option value="Tennessee"> Tennessee</option>
//             <option value="Texas"> Texas</option>
//             <option value="Utah"> Utah</option>
//             <option value="Vermont"> Vermont</option>
//             <option value="Virginia"> Virginia</option>
//             <option value="Washington"> Washington</option>
//             <option value="Washington DC"> Washington DC</option>
//             <option value="West Virginia"> West Virginia</option>
//             <option value="Wisconsin"> Wisconsin</option>
//             <option value="Wyoming"> Wyoming</option>
//         </select>
//     </div>
//     <div class="row">
//         <div class="col-md-6 mb-4">
//             <div class="form-outline">
//                 <label class="form-label">Your Degree</label>
//                 <select name="userdata[degree]" class="form-control input-check">
//                     <option hidden selected value="">Select Your Degree</option>
//                     <option value="RN">RN</option>
//                     <option value="LPN/LVN">LPN/LVN</option>
//                     <option value="CNA">CNA</option>
//                     <option value="AA (Anesthesiologist Assistant)">AA (Anesthesiologist Assistant)</option>
//                     <option value="Admin">Admin</option>
//                     <option value="Behavioral Health Tech">Behavioral Health Tech</option>
//                     <option value="CMA">CMA</option>
//                     <option value="CRNA">CRNA</option>
//                     <option value="Cardiovascular Technologist (Cath Lab Tech)">Cardiovascular Technologist (Cath Lab Tech)</option>
//                     <option value="Data Analytics/Reporting">Data Analytics/Reporting</option>
//                     <option value="EKG Technician">EKG Technician</option>
//                     <option value="EMT">EMT</option>
//                     <option value="EVS">EVS</option>
//                     <option value="Endoscopy Technician (GI Tech)">Endoscopy Technician (GI Tech)</option>
//                     <option value="Food Service">Food Service</option>
//                     <option value="Interpreter">Interpreter</option>
//                     <option value="MD/DO">MD/DO</option>
//                     <option value="Medical Laboratory Technician (MLT)">Medical Laboratory Technician (MLT)</option>
//                     <option value="Medical Technologist (MT)">Medical Technologist (MT)</option>
//                     <option value="Mental Health Technician (MHT)">Mental Health Technician (MHT)</option>
//                     <option value="NP">NP</option>
//                     <option value="Nursing Aide">Nursing Aide</option>
//                     <option value="Occupational Therapist">Occupational Therapist</option>
//                     <option value="PCT">PCT</option>
//                     <option value="Paramedic">Paramedic</option>
//                     <option value="Pharmacist">Pharmacist</option>
//                     <option value="Pharmacy Tech">Pharmacy Tech</option>
//                     <option value="Phlebotomist">Phlebotomist</option>
//                     <option value="Physical Therapist">Physical Therapist</option>
//                     <option value="Physician Assistant">Physician Assistant</option>
//                     <option value="Psychologist">Psychologist</option>
//                     <option value="Qualified Medication Aide (QMA)">Qualified Medication Aide (QMA)</option>
//                     <option value="Radiologic Tech (Rad Tech)">Radiologic Tech (Rad Tech)</option>
//                     <option value="Registrar">Registrar</option>
//                     <option value="Rehab Therapist">Rehab Therapist</option>
//                     <option value="Respiratory Therapist">Respiratory Therapist</option>
//                     <option value="Security">Security</option>
//                     <option value="Speech Language Pathologist">Speech Language Pathologist</option>
//                     <option value="Surgical Tech (Scrub Tech)">Surgical Tech (Scrub Tech)</option>
//                     <option value="Sterile Processing Tech">Sterile Processing Tech</option>
//                     <option value="Trainer Coordinator">Trainer Coordinator</option>
//                     <option value="Ultrasound Tech (Sonographer)">Ultrasound Tech (Sonographer)</option>
//                     <option value="Other">Other</option>
//                 </select>
//             </div>
//         </div>
//         <div class="col-md-6 mb-4">
//             <div class="form-outline">
//                 <label class="form-label">Your Specialty</label>
//                 <select name="userdata[specialty]" class="form-control input-check">
//                     <option hidden selected value="">Select Your Specialty</option>
//                     <option value="Acute Care">Acute Care</option>
//                     <option value="Ambulatory Care">Ambulatory Care</option>
//                     <option value="Ambulatory OR">Ambulatory OR</option>
//                     <option value="Apheresis">Apheresis</option>
//                     <option value="Behavioral Health">Behavioral Health</option>
//                     <option value="Bone Densitometry">Bone Densitometry</option>
//                     <option value="BSCU (Burns Specialty Care)">BSCU (Burns Specialty Care)</option>
//                     <option value="Burns">Burns</option>
//                     <option value="Cardiac Cath Lab">Cardiac Cath Lab</option>
//                     <option value="Cardiothoracic">Cardiothoracic</option>
//                     <option value="Cardiovascular">Cardiovascular</option>
//                     <option value="Case Management">Case Management</option>
//                     <option value="CCU (Coronary Care)">CCU (Coronary Care)</option>
//                     <option value="Charge Nurse">Charge Nurse</option>
//                     <option value="CISD (Coronary ICU Stepdown)">CISD (Coronary ICU Stepdown)</option>
//                     <option value="Corrections">Corrections</option>
//                     <option value="CT">CT</option>
//                     <option value="CVICU (Cardiovascular Care)">CVICU (Cardiovascular Care)</option>
//                     <option value="CVOR (Cardiovascular Operating Room)">CVOR (Cardiovascular Operating Room)</option>
//                     <option value="Deployment Health Screener">Deployment Health Screener</option>
//                     <option value="Diabetic (Diabetes)">Diabetic (Diabetes)</option>
//                     <option value="Dialysis">Dialysis</option>
//                     <option value="ED (Emergency Department)">ED (Emergency Department)</option>
//                     <option value="Employee Health">Employee Health</option>
//                     <option value="Endoscopy">Endoscopy</option>
//                     <option value="ENT">ENT</option>
//                     <option value="EVS">EVS</option>
//                     <option value="First Assist">First Assist</option>
//                     <option value="Geriatrics">Geriatrics</option>
//                     <option value="GI (Gastrointestinal)">GI (Gastrointestinal)</option>
//                     <option value="Hemodialysis">Hemodialysis</option>
//                     <option value="Home Health Care">Home Health Care</option>
//                     <option value="Hospice">Hospice</option>
//                     <option value="Housekeeping">Housekeeping</option>
//                     <option value="ICU (Intensive Care Unit)">ICU (Intensive Care Unit)</option>
//                     <option value="Infection Control">Infection Control</option>
//                     <option value="Inpatient">Inpatient</option>
//                     <option value="Interventional Radiology">Interventional Radiology</option>
//                     <option value="Labor and Delivery">Labor and Delivery</option>
//                     <option value="Long Term Care">Long Term Care</option>
//                     <option value="LTAC (Long Term Acute Care)">LTAC (Long Term Acute Care)</option>
//                     <option value="Maintenance Porter - Floor Care">Maintenance Porter - Floor Care</option>
//                     <option value="Mammography">Mammography</option>
//                     <option value="MDS (Minimum Data Set)">MDS (Minimum Data Set)</option>
//                     <option value="Medical">Medical</option>
//                     <option value="Medical and Surgical">Medical and Surgical</option>
//                     <option value="MICU (Medical Intensive Care)">MICU (Medical Intensive Care)</option>
//                     <option value="MISD (Medical ICU Stepdown)">MISD (Medical ICU Stepdown)</option>
//                     <option value="MRI">MRI</option>
//                     <option value="Musculoskeletal">Musculoskeletal</option>
//                     <option value="Neurology">Neurology</option>
//                     <option value="NICU (Neonatal Intensive Care)">NICU (Neonatal Intensive Care)</option>
//                     <option value="NSICU (Neurosurgical Intensive Care)">NSICU (Neurosurgical Intensive Care)</option>
//                     <option value="NSSD (Neurological ICU Stepdown)">NSSD (Neurological ICU Stepdown)</option>
//                     <option value="Nuclear Medicine">Nuclear Medicine</option>
//                     <option value="OB/GYN">OB/GYN</option>
//                     <option value="Oncology">Oncology</option>
//                     <option value="Ophthalmology">Ophthalmology</option>
//                     <option value="OR (Operating Room)">OR (Operating Room)</option>
//                     <option value="Orthopedics">Orthopedics</option>
//                     <option value="Outpatient">Outpatient</option>
//                     <option value="PACU (Post Operative Care)">PACU (Post Operative Care)</option>
//                     <option value="PCU/Stepdown (Progressive Care Unit)">PCU/Stepdown (Progressive Care Unit)</option>
//                     <option value="Pediatric ED (Emergency Department)">Pediatric ED (Emergency Department)</option>
//                     <option value="Pediatric Medical and Surgical">Pediatric Medical and Surgical</option>
//                     <option value="Pediatric PCU/Stepdown">Pediatric PCU/Stepdown</option>
//                     <option value="Pediatrics">Pediatrics</option>
//                     <option value="PICU (Pediatrics Intensive Care)">PICU (Pediatrics Intensive Care)</option>
//                     <option value="Post Partum">Post Partum</option>
//                     <option value="PREOP (Pre Operative OR)">PREOP (Pre Operative OR)</option>
//                     <option value="Psychiatry">Psychiatry</option>
//                     <option value="Rehabilitation">Rehabilitation</option>
//                     <option value="SICU (Surgical Intensive Care)">SICU (Surgical Intensive Care)</option>
//                     <option value="SISD (Surgical ICU Stepdown)">SISD (Surgical ICU Stepdown)</option>
//                     <option value="Supervisor">Supervisor</option>
//                     <option value="Surgical Transplants">Surgical Transplants</option>
//                     <option value="Telemetry">Telemetry</option>
//                     <option value="Urology">Urology</option>
//                     <option value="Wound Care">Wound Care</option>
//                     <option value="Xray">Xray</option>
//                     <option value="NA/Other">NA/Other</option>
//                 </select>
//             </div>
//         </div>
//     </div>`;
// }

const independent_constractor = () => {
    return `<hr>
    <div class="form-outline mb-4">
        <label class="form-label">Service Location</label>
        <select name="userdata[service_location]" class="form-control input-check">
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
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="form-outline">
                <label class="form-label">Specialty</label>
                <select name="userdata[specialty]" class="form-control input-check">
                    <option hidden selected value="">Specialty</option>
                    <option value="RNs">RNs</option>
                    <option value="LPNs">LPNs</option>
                    <option value="CNAs">CNAs</option>
                    <option value="SWs">SWs</option>
                    <option value="Pharmacists">Pharmacists</option>
                </select>
            </div>
        </div>
        </div>
    </div>`
}

const staffing_agencies = () => {
    return `<hr>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <label class="form-label" for="form3Example4">Job Title</label>
                <select name="userdata[job_title]" class="form-control input-check">
                    <option hidden selected value="">Job Title</option>
                    <option value="RNs">RNs</option>
                    <option value="LPNs">LPNs</option>
                    <option value="CNAs">CNAs</option>
                    <option value="SWs">SWs</option>
                    <option value="Pharmacists">Pharmacists</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-outline">
            <label class="form-label">Facility Location</label>
            <select name="userdata[facility_location]" class="form-control input-check">
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
        </div>
    </div>`;
}

const facilities_staffing_coordinator = () => {
    return `<hr>
    <div class="form-outline mb-4">
        <label class="form-label">Service Location</label>
        <select name="userdata[service_location]" class="form-control input-check">
            <option hidden selected value="">Service Location</option>
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
    </div>`;
}

const facilitynames = () => {
    return `
    <div class="col-md-12 mb-4" id="facility">
        <div class="form-outline">
            <label class="form-label" for="form3Example1">Facility Name</label>
            <input type="text" placeholder="Facility Name" name="userdata[facility_name]" class="form-control input-check" id="fac_name" />
        </div>
    </div>
    `
}