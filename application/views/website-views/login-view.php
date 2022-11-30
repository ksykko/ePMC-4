<div class="container">
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0 card-body-login mx-5 mt-4">
                    <div class="card-body p-0 card-body-login mx-5 mt-4">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-lg-start align-items-lg-center justify-content-xxl-start align-items-xxl-center">
                                <h2 class="d-lg-flex align-self-start justify-content-lg-center align-items-lg-center h2-login-header"><strong>Welcome</strong><br /><br /></h2><img width="398" height="290" src="<?= base_url('/assets/img/others/Health checkup.png') ?>" />
                            </div>
                            <div class="col-lg-6 col-xxl-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="fw-bolder text-dark mb-4">LOGIN</h4>
                                    </div>
                                    <?= form_open('Login/validate'); ?>
                                    <?php if ($this->session->flashdata('error')) : ?>
                                        <div class="alert alert-danger">
                                            <small><?= $this->session->flashdata('error'); ?></small>
                                        </div>
                                    <?php elseif ($this->session->flashdata('error-email')) : ?>
                                        <div class="alert alert-danger">
                                            <?= $this->session->flashdata('error-email'); ?>
                                        </div>
                                    <?php elseif ($this->session->flashdata('message') == 'verify-first') : ?>
                                        <div class="alert alert-info" role="alert">
                                            <small><strong>You have successfully signed up!</strong><br>Please check your email for verification.</small>
                                        </div>
                                    <?php elseif ($this->session->flashdata('success') == 'changed-password') : ?>
                                        <div class="alert alert-info" role="alert">
                                            <small><strong>Success!</strong><br>You have successfully changed your password. Please login to continue.</small>
                                        </div>
                                    <?php elseif ($this->session->flashdata('success')) : ?>
                                        <div class="alert alert-info" role="alert">
                                            <small><strong>Success!</strong><br><?= $this->session->flashdata('success'); ?></small>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user">
                                        <label for="text" style="font-size: 20px; padding-bottom:7px;"><strong>Patient ID or Email</strong></label>
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="text" name="email" placeholder="Enter Patient ID or Email"></div>
                                        <label for="text" style="font-size: 20px; padding-bottom:7px;"><strong>Password</strong></label>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" name="password" placeholder="Password"></div>
                                        <dsv class="mb-3">
                                            <dsv class="mb-3">
                                                <div class="custom-control custom-checkbox small"></div>
                                            </dsv><button class="btn btn-primary d-block btn-user w-100" type="submit" name="login" style="background: #0f6bae;">Login</button>

                                            
                                    </form>
                                    
                                    <div class="row mt-3">
                                        <a class="small text-decoration-none  btn btn-primary d-block btn-user w-100" style="font-size: 15px; color:white !important;" href="<?= base_url('Register/') ?>">Sign Up</a>
                                    </div>
                                    <hr>
                                    <?= form_close(); ?>
                                    <div class="text-center"></div>
                                    
                                    <div class="row mt-3">
                                        <div class="col d-flex justify-content-end">
                                            <a href="<?= base_url('Login/forgot_password') ?>" class="small text-decoration-none text-muted" style="font-size: 20px;">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>