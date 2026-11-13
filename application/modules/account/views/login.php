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
                <form id="login-form">
                    <div class="mt-2 my-4 pt-1 mb-0">
                        <div class="font-weight-bold">
                            <img src="<?= base_url() ?>assets/img/main-logo.png" class="main-logo" alt="Sample image">
                        </div>
                        <h6 class="card-subtitle my-3">
                            Login to your account.
                        </h6>
                    </div>
                    <div class="alert alert-danger show-error-forget d-none">
                        <i class="fas fa-exclamation-circle"></i> <span id="messg"></span>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Username</label>
                        <input type="text" class="form-control input-check" id="username" name="username" placeholder="Username" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Password</label>
                        <input type="password" class="form-control input-check" placeholder="Password" name="password" id="password" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Show Password</label>
                        </div>
                        <a href="<?= base_url('account/forgetpassword') ?>" id="forget-password-btn" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-lg-start mt-4 pt-2">
                        <button class="btn btn-primary" id="button-login">Login</button>
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