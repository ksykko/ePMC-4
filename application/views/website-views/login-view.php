<div class="container" style="margin-bottom: 37px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0 card-body-login">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-lg-start align-items-lg-center justify-content-xxl-start align-items-xxl-center">
                            <h2 class="d-lg-flex align-self-start justify-content-lg-center align-items-lg-center h2-login-header"><strong>Welcome</strong><br /><br /></h2><img width="398" height="290" src="<?= base_url('/assets/img/others/Health checkup.png') ?>" />
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="fw-bolder text-dark mb-4">LOGIN</h4>
                                </div>
                                <form class="login">
                                    <div class="mb-3"><input class="form-control form-control-user" type="email" name="email" placeholder="Enter Email"></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" name="password" placeholder="Password"></div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small"></div>
                                    </div><button class="btn btn-primary d-block btn-user w-100"style="background: #0f6bae;">Login</button>
                                    <hr>
                                </form>
                                <div class="text-center"></div>
                                <div class="text-center d-xxl-flex justify-content-xxl-center"><a class="small" href="">Don't Have an Account? Visit PMC Now!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form class="add">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="role">Role:</label>
            <input type="text" name="role" required>

            <button>Add a user</button>
        </form>

        <form class="delete">
            <label for="id">Document id:</label>
            <input type="text" name="id" required>

            <button>Delete a user</button>
        </form>

        <form class="update">
            <label for="id">Document id:</label>
            <input type="text" name="id" required>

            <button>Update a User</button>
        </form>


        <h2>Firebase Auth</h2>

        <form class="signup">
            <label for="email">Email:</label>
            <input type="email" name="email">

            <label for="password">Password:</label>
            <input type="password" name="password">

            <button>signup</button>
        </form>

        <!-- <form class="login">
            <label for="email">Email:</label>
            <input type="email" name="email">

            <label for="password">Password:</label>
            <input type="password" name="password">

            <button>login</button>
        </form> -->

        <button class="logout">logout</button>

        <h2>Unsubscribing</h2>
        <button class="unsub">unsubscribe from db/auth changes</button>
    </div>
</div>