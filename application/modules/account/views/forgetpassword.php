<style>
    .footer_comp {
        width: 5px;
        display: inline-block;
        height: 5px;
        background: #fff;
        border-radius: 100%;
        margin-bottom: 3px !important;
        /*! padding: 0px inherit; */
        margin: 0px 7px;
    }
</style>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= base_url() ?>assets/img/right-image.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form id="forget-password-form">
                    <div id="fort-passswor-child">
                        <div class="mt-2 my-4 pt-1 mb-0">
                            <div class="font-weight-bold">
                                <img src="<?= base_url() ?>assets/img/main-logo.png" class="main-logo" alt="Sample image">
                            </div>
                            <h6 class="card-subtitle my-3">
                                Enter your registered email to our portal
                            </h6>
                        </div>
                        <div class="mb-4 my-2 pt-1 mb-0">
                            <a href="<?= base_url('account') ?>" id="back-login"><i class="sl-icon-arrow-left-circle"></i> Back to login</a>
                        </div>
                        <div id="container-forget-holder">
                            <div class="alert alert-danger show-error-forget d-none">
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" />
                            </div>
                            <button class="btn btn-primary" id="reset-password">Send Email Confirmation</button>
                        </div>
                    </div>
                    <div id="success-reset" style="display: none;">
                        <div class="mt-2 my-4 pt-1 mb-0">
                            <div class="font-weight-bold">
                                <img src="<?= base_url() ?>assets/img/main-logo.png" class="main-logo" alt="Sample image">
                            </div>
                        </div>
                        <div class="register-success-container">
                            <div class="icon-check-here">
                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle>
                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                </svg>
                            </div>
                            <div class="message-container">
                                <h3>Confirmation Email Sent!</h3>
                                <p>We have succesfully sent an confirmation changing password, Please check your email. Thank you.</p>
                                <a href="javascript:;" id="back-confirmation"><i class="sl-icon-reload"></i> Send Email Confirmation Again</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-lg-start mt-4 pt-2">
                        <p class="fw-bold mt-2 my-4 pt-1 mb-0">Don't have an account? <a href="<?= base_url('account/register') ?>" class="font-weight-bold link-danger">CREATE ACCOUNT</a>.</p>
                        <hr>
                        <div class="qoute">
                            <p><em>We use state-of-the-art technologies and innovation to create a system that will match qualified and experienced healthcare professionals who will help healthcare facilities exceed their goals when it comes to providing the best health outcomes.</em></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="fixed-bottom text-md-start justify-content-between py-3 px-3 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
        Copyright 2022 - <?= date('Y') ?> <span class="footer_comp"></span> Designed by <a href="http://proweaver.com" class="font-weight-bold text-inverse" style="color:#000 important;" target="_blank">Proweaver</a>.
    </div>
    <!-- Copyright -->
</div>