<div class="container">
    <div class="row justify-content-center" style="margin-top: 60px;">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0 card-body-login">
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
                                        <?= $this->session->flashdata('error'); ?>
                                    </div>
                                <?php elseif ($this->session->flashdata('message') == 'verify-first') : ?>
                                    <div class="alert alert-info" role="alert">
                                        <span><strong>You have successfully signed up!</strong><br>Please check your email for verification.</span>
                                    </div>
                                <?php endif; ?>
                                <form class="user">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="email" name="email" placeholder="Enter Phone No. or Email"></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" name="password" placeholder="Password"></div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small"></div>
                                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit" name="login" style="background: #0f6bae;">Login</button>
                                    <hr>
                                </form>
                                <?= form_close(); ?>
                                <div class="text-center"></div>
                                <div class="text-center d-xxl-flex justify-content-xxl-center"><a class="small" href="<?= base_url('Register/') ?>">Don't Have an Account? Register Here.</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>