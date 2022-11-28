<div class="container">
    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0 card-body-login mx-5 mt-4">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-lg-start align-items-lg-center justify-content-xxl-start align-items-xxl-center">
                            <h2 class="d-lg-flex align-self-start justify-content-lg-center align-items-lg-center h2-login-header"><strong>Welcome</strong><br /><br /></h2><img width="398" height="290" src="<?= base_url('/assets/img/others/Health checkup.png') ?>" />
                        </div>
                        <div class="col-lg-6 col-xxl-6">
                            <div class="p-5 mt-4">
                                <div class="text-center">
                                    <h4 class="fw-bolder text-dark mb-4">Reset Password</h4>
                                </div>
                                <!-- <div class="alert alert-danger">
                                    <strong>Oops!</strong> Something went wrong. Please try again.
                                </div> -->
                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger">
                                        <small><?= $this->session->flashdata('error') ?></small>
                                    </div>
                                <?php elseif ($this->session->flashdata('message') == 'verify-first') : ?>
                                    <div class="alert alert-info" role="alert">
                                        <span><strong>You have successfully signed up!</strong><br>Please check your email for verification.</span>
                                    </div>
                                <?php endif; ?>
                                <?= form_open('Login/validate_password/' . $id . '/' . $role ); ?>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" name="password" placeholder="Password"></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="conf_password" name="conf_password" placeholder="Confirm Password"></div>
                                    <button class="btn btn-primary d-block btn-user w-100" type="submit" id="continue" name="continue" style="background: #0f6bae;">Change Password</button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>