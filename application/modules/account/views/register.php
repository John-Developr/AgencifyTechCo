<section class="vh-100">
    <style>
        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
    </style>

    <!-- Jumbotron -->
    <br>
    <div class="container py-5 h-100">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="card-body p-5 shadow-5">
                        <div class="mb-0">
                            <div class="font-weight-bold">
                                <img src="<?= base_url() ?>assets/img/main-logo.png" class="main-logo" alt="Sample image">
                            </div>
                            <h6 class="card-subtitle my-3">
                                Sign up now.
                            </h6>
                        </div>
                        <div class="alert alert-danger show-error-forget d-none">
                            <i class="fas fa-exclamation-circle"></i> <span id="messg"></span>
                        </div>
                        <form id="paymentform" class="" action="" method="post">
                            <div class="form-outline mb-4">
                                <label class="form-label">Registration Type</label>
                                <select name="type" class="form-control regisration-type">
                                    <option hidden selected value="">Select Type of Registrations</option>
                                    <option value="1">Independent Contractors</option>
                                    <option value="2">Staffing Agencies</option>
                                    <option value="3">Facilities Staffing Coordinator</option>
                                </select>
                            </div>
                            <hr>
                            <h5>Personal Information</h5>
                            <br>
                            <div class="row" id="facilities_name">
                            </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row" id="user_names">
                                <div class="col-md-6 mb-4" id="agency_name">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1" id="first_name">First name</label>
                                        <input type="text" placeholder="First Name" name="userdata[fname]" class="form-control input-check" id="fname" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4" id="hidethis">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example2">Last name</label>
                                        <input type="text" class="form-control input-check" name="userdata[lname]" placeholder="Last Name" id="lname" />
                                    </div>
                                </div>
                            </div>
                            <!-- Email and username input -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1">Email</label>
                                        <input type="email" placeholder="example@gmail.com" name="userdata[email]" class="form-control input-check" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example2">Username</label>
                                        <input type="text" class="form-control input-check" name="user[username]" placeholder="Username" />
                                    </div>
                                </div>
                            </div>

                            <!-- phone input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Phone</label>
                                <input type="number" class="form-control input-check" name="userdata[phone]" placeholder="Phone Number" />
                            </div>

                            <!-- password and cpassword input -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example4">Password</label>
                                        <input type="password" class="form-control input-check" name="user[password]" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example4">Confirmation Password</label>
                                        <input type="password" class="form-control input-check" name="cpassword" placeholder="Confirmation Password" />
                                    </div>
                                </div>
                            </div>
                            <div class="other-field">

                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div id="form_recaptcha" class="required"></div>
                                    <div id="form_recaptcha" class="required"></div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-12">
                                    <button class="btn font-weight-bold btn-success form-control waves-effect waves-light m-r-10 text-white">CREATE ACCOUNT</button>
                                </div>
                            </div>
                        </form>
                        <div id="success-register" style="display: none;">
                            <div class="register-success-container mb-5">
                                <div class="icon-check-here">
                                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle>
                                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                    </svg>
                                </div>
                                <div class="message-container">
                                    <h3>Congratulations!</h3>
                                    <p>You have succesfully register, please wait for a seconds. We will redirecting you to your home page.</p>
                                </div>
                            </div>
                        </div>
                        <p class="fw-bold mt-2 my-4 pt-1 mb-0">Already have an account? <a href="<?= base_url('account') ?>" class="link-danger font-weight-bold">SIGN IN ACCOUNT</a>.</p>
                        <div class="line-template"></div>
                        <div class="qoute">
                            <p><em>We use state-of-the-art technologies and innovation to create a system that will match qualified and experienced healthcare professionals who will help healthcare facilities exceed their goals when it comes to providing the best health outcomes.</em></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="<?= base_url('assets/img/background.png') ?>" height="1220" style="object-fit:none;" class="w-100 rounded-4 shadow-4" alt="" />
            </div>
        </div>
    </div>
    <!-- <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
        </div>
    </div> -->
</section>
<!-- Section: Design Block -->