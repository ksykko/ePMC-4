<style>
    body {
        overflow-y: scroll;
    }
</style>
<div class="container-fluid patientrec-container">
    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
        <?php if ($this->session->flashdata('message') == 'success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully added a new user.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'edit_user_success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully updated a user.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'reset-password-success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully reset user's password.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'dlt_user_success') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You successfully deleted a user.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'add_failed') : ?>
            <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-error">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>You have failed in adding a new user</span>
                    <small class="text-danger"><?= form_error('first_name') ?></small>
                    <small class="text-danger"><?= form_error('middle_name') ?></small>
                    <small class="text-danger"><?= form_error('last_name') ?></small>
                    <small class="text-danger"><?= form_error('username') ?></small>
                    <small class="text-danger"><?= form_error('password') ?></small>
                    <small class="text-danger"><?= form_error('conf_password') ?></small>
                    <small class="text-danger"><?= form_error('role') ?></small>
                    <small class="text-danger"><?= form_error('specialization') ?></small>
                    <small class="text-danger"><?= form_error('birth_date') ?></small>
                    <small class="text-danger"><?= form_error('gender') ?></small>
                    <small class="text-danger"><?= form_error('contact_no') ?></small>
                    <small class="text-danger"><?= form_error('email') ?></small>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-sm-block patientrec-label">User Accounts</h1>
        </div>

        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
            <button id="btn-add-patient" onclick="formValidation()" class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-1">
                <i class="icon ion-android-add-circle"></i><span class="d-none d-lg-inline-block ms-1">Add User</span>
            </button>



            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Add a User</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <?= form_open_multipart('Admin_useracc/add_useracc_validation', array('id' => 'addUserForm')); ?>
                        <div class="modal-body mx-5">

                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Personal Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group col-md-5 px-1"><label class="form-label">First Name</label>
                                        <input class="form-control form-control-sm" type="text" id="first_name" name="first_name" /><small class="text-danger"><?= form_error('first_name') ?></small>
                                        <span id="fullName_result"></span>
                                        <label id="firstName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group col-md-4 px-1"><label class="form-label">Middle Name</label>
                                        <input class="form-control form-control-sm" type="text" id="middle_name" name="middle_name" /><small class="text-danger"><?= form_error('middle_name') ?></small>
                                        <label id="middleName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group col-md-3 px-1"><label class="form-label">Surname</label>
                                        <input class="form-control form-control-sm" type="text" id="last_name" name="last_name" /><small class="text-danger"><?= form_error('last_name') ?></small>
                                        <label id="lastName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Username</label>
                                        <input class="form-control form-control-sm" type="text" id="username" name="username" /><small class="text-danger"><?= form_error('age') ?></small>
                                        <label id="username_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group px-1"><label class="form-label">Role</label>
                                        <select class="form-select form-select-sm" id="role" name="role" onchange='toggleDropdown();' value="<?= set_value('role'); ?>">
                                            <option value="" selected>select...</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Doctor">Doctor</option>
                                            <!-- <option value="pharmacy assistant">Pharmacy Assistant</option> -->
                                        </select>
                                        <label id="role_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <!-- Add row here if doctor -->
                                <div class="row mb-2" id="specialization_div" style="display: none;">
                                    <div class="col form-group px-1"><label class="form-label">Specialization</label>
                                        <select class="form-select form-select-sm" id="specialization" value="<?= set_value('specialization'); ?>">
                                            <option value="" selected>select...</option>
                                            <option value="Internal Medicine">Internal Medicine</option>
                                            <option value="Family Medicine">Family Medicine</option>
                                            <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                            <option value="Orthopedics">Orthopedics</option>
                                        </select>
                                        <label id="spec_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <!-- Add row here if admin -->
                                <div class="row mb-2" id="admin_div" style="display: none;">
                                    <div class="col form-group px-1"><label class="form-label">Position</label>
                                        <select class="form-select form-select-sm" id="admin_spec">
                                            <option value="" selected>select...</option>
                                            <option value="General Manager">General Manager</option>
                                            <option value="Pharmacy Assistant">Pharmacy Assistant</option>
                                            <option value="Secretary">Secretary</option>
                                            <option value="Nurse">Nurse</option>
                                        </select>
                                        <label id="admin_spec_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Sex</label>
                                        <select class="form-select form-select-sm" id="sex" name="sex">
                                            <option value="" selected disabled>select ...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <label id="sex_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group px-1"><label class="form-label">Birthday</label>
                                        <input class="form-control form-control-sm" type="date" id="birth_date" name="birth_date" value="<?= set_value('birth_date'); ?>" />
                                        <label id="birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Contact Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm" type="tel" id="cell_no" name="cell_no" placeholder="09xxxxxxxxx" />
                                        <label id="cell_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group px-1"><label class="form-label">Email</label><input class="form-control form-control-sm" type="email" id="email" name="email" />
                                        <label id="email_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="submit" style="background: #3269bf;">Next</button></div> -->
                        <div class="modal-footer" style="overflow:auto;">
                            <div style="float:right;">
                                <button class="btn btn-sm btn-light" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button class="btn btn-sm btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>

                        <?= form_close(); ?>
                        <div class="mb-4" style="text-align:center;">
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-5 pt-4 pb-5">
                <div>
                    <table id="useracc-table" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Birthdate</th>
                                <th>Contact #</th>
                                <th>Email</th>
                                <th class="text-center col-md-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <div id="delete-dialog-<?= $user->user_id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title ms-3 fw-bolder">Delete User</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this user?</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_useracc/delete_useracc/') . $user->user_id ?>" type="button">Confirm</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php foreach ($users as $user) : ?>
                        <?php $updateUserInfoPath = 'Admin_useracc/edit_useracc/' . $user->user_id; ?>
                        <?= form_open_multipart($updateUserInfoPath, array('id' => 'editUser')); ?>
                        <div id="user-edit-modal-<?= $user->user_id ?>" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title ms-3 fw-bolder">Edit User</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body mx-5">
                                        <hr size="5" />
                                        <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                        <!-- <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">User ID:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group"> -->
                                        <!-- user_id -->
                                        <!-- <input class="form-control user_id" type="text" id="user_id" name="user_id" value="<?= $user->user_id ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <input type="hidden" name="modal_no" value="<?= $user->user_id ?>">
                                        <div class="row mt-4 mb-2">
                                            <div class="col-3"><label class="col-form-label">First name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control first_name" type="text" id="edt_first_name" name="edt_first_name" value="<?= $user->first_name ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('edt_first_name') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Last name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control prod_dosage" type="text" id="edt_last_name" name="edt_last_name" value="<?= $user->last_name ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('edt_last_name') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Username:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control prod_dosage" type="text" id="edt_username" name="edt_username" value="<?= $user->username ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('edt_username') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Role:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- role -->
                                                        <input class="form-control" type="text" id="edt_role" name="edt_role" value="<?= ucfirst($user->role) ?>" readonly>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('edt_role') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if ($user->role == 'Doctor' || $user->role == 'doctor') : ?>

                                            <div class="row mb-2" id="specialization_div">
                                                <div class="col-3"><label class="col-form-label">Specialization:</label></div>
                                                <div class="col-9 col-sm-9">
                                                    <div class="input-error">
                                                        <div class="input-group">
                                                            <!-- specialization -->
                                                            <select class="form-select" id="edt_specialization" name="edt_specialization">
                                                                <option value="<?= ucfirst($user->specialization) ?>" selected><?= ucfirst($user->specialization) ?></option>

                                                                <?php if ($user->specialization == 'Internal Medicine') : ?>
                                                                    <option value="Family Medicine">Family Medicine</option>
                                                                    <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                                                    <option value="Orthopedics">Orthopedics</option>
                                                                <?php elseif ($user->specialization == 'Family Medicine') : ?>
                                                                    <option value="Internal Medicine">Internal Medicine</option>
                                                                    <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                                                    <option value="Orthopedics">Orthopedics</option>
                                                                <?php elseif ($user->specialization == 'Obstetrics and Gynecology') : ?>
                                                                    <option value="Internal Medicine">Internal Medicine</option>
                                                                    <option value="Family Medicine">Family Medicine</option>
                                                                    <option value="Orthopedics">Orthopedics</option>
                                                                <?php elseif ($user->specialization == 'Orthopedics') : ?>
                                                                    <option value="Internal Medicine">Internal Medicine</option>
                                                                    <option value="Family Medicine">Family Medicine</option>
                                                                    <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                                                <?php else : ?>
                                                                    <option value="" selected disabled>select...</option>
                                                                    <option value="Internal Medicine">Internal Medicine</option>
                                                                    <option value="Family Medicine">Family Medicine</option>
                                                                    <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                                                    <option value="Orthopedics">Orthopedics</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        <small class="text-danger"><?= form_error('edt_specialization') ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="row mb-2" id="admin_div">
                                                <div class="col-3"><label class="col-form-label">Position:</label></div>
                                                <div class="col-9 col-sm-9">
                                                    <div class="input-error">
                                                        <div class="input-group">
                                                            <!-- specialization -->
                                                            <select class="form-select" id="edt_admin_spec" name="edt_specialization">
                                                                <option value="<?= ucfirst($user->specialization) ?>" selected><?= ucfirst($user->specialization) ?></option>

                                                                <?php if ($user->specialization == 'General Manager') : ?>
                                                                    <option value="Pharmacy Assistant">Pharmacy Assistant</option>
                                                                    <option value="Secretary">Secretary</option>
                                                                    <option value="Nurse">Nurse</option>
                                                                <?php elseif ($user->specialization == 'Pharmacy Assistant') : ?>
                                                                    <option value="General Manager">General Manager</option>
                                                                    <option value="Secretary">Secretary</option>
                                                                    <option value="Nurse">Nurse</option>
                                                                <?php elseif ($user->specialization == 'Secretary') : ?>
                                                                    <option value="General Manager">General Manager</option>
                                                                    <option value="Pharmacy Assistant">Pharmacy Assistant</option>
                                                                    <option value="Nurse">Nurse</option>
                                                                <?php elseif ($user->specialization == 'Nurse') : ?>
                                                                    <option value="General Manager">General Manager</option>
                                                                    <option value="Pharmacy Assistant">Pharmacy Assistant</option>
                                                                    <option value="Secretary">Secretary</option>
                                                                <?php else : ?>
                                                                    <option value="" selected disabled>select...</option>
                                                                    <option value="General Manager">General Manager</option>
                                                                    <option value="Pharmacy Assistant">Pharmacy Assistant</option>
                                                                    <option value="Secretary">Secretary</option>
                                                                    <option value="Nurse">Nurse</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        <small class="text-danger"><?= form_error('edt_admin_spec') ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>



                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Birthdate:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control" type="date" id="edt_birth_date" name="edt_birth_date" value="<?= $user->birth_date ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('edt_birth_date') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Contact #:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control stock_out" type="text" id="edt_contact_no" name="edt_contact_no" value="<?= $user->contact_no ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('edt_contact_no') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3"><label class="col-form-label">Email address:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control" type="edt_email" id="email" name="edt_email" value="<?= $user->email ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('edt_email') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Password:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="password" name="password" value="<?= $user->password ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('password') ?></small>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row row-cols-1 row-cols-md-2">
                                            <div class="col offset-md-6 text-end"><a class="me-1" href="<?= base_url('Admin_useracc/reset_password/') . $user->user_id ?>"><small class="badge bg-dark fw-light"><i class="fas fa-user-lock me-1"></i>Reset Password</small></a></div>
                                        </div>
                                        <input type="hidden" name="item_id" class="item_id">
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-modal" id="editUser" name="editUser" type="submit" style="background: #3269bf;">Save</button></div>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleDropdown() {
        let value = document.querySelector('select').value;
        console.log(value);

        if (value == "doctor" || value == "Doctor" || value == "physician" || value == "Physician") {
            document.getElementById("specialization_div").style.display = "flex";
            document.getElementById("admin_div").style.display = "none";

            // set admin to null
            $('#admin_spec').val(null);

            // remove name attribute 
            $('#admin_spec').removeAttr('name');

            // add name attribute = specialization
            $('#specialization').attr('name', 'specialization');
        } else if (value == "admin" || value == "Admin") {
            document.getElementById("admin_div").style.display = "flex";
            document.getElementById("specialization_div").style.display = "none";

            // set specialization to null
            $('#specialization').val(null);

            // remove name attribute
            $('#specialization').removeAttr('name');

            // add name attribute = specialization
            $('#admin_spec').attr('name', 'specialization');
        } else {
            document.getElementById("specialization_div").style.display = "none";
            document.getElementById("admin_div").style.display = "none";
        }
    }

    // var select_box = document.getElementById("widthpixselpercentage");
    // var y = select_box.options[select_box.selectedIndex].value;

    // function toggleDropdownEdit(role_edit) {
    //     alert(role_edit.value);
    //     if (role_edit.value == "doctor" || role_edit.value == "Doctor") {
    //         document.getElementById("specialization_div_edit").style.display = "flex";
    //     } else {
    //         document.getElementById("specialization_div_edit").style.display = "none";
    //     }
    // }
</script>