<style>
    body {
        overflow-y: scroll;
    }
</style>
<div class="container-fluid patientrec-container">
    <?php if ($this->session->flashdata('message') == 'success') : ?>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="alert alert-success alert-dismissible mt-3 mx-5 mb-5 w-50" role="alert">
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span>
                        <strong>Success!</strong> You successfully added a new user.</span>
                </div>
            </div>
        </div>
        <?php elseif ($this->session->flashdata('message') == 'edit_user_success') : ?>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="alert alert-success alert-dismissible mt-3 mx-5 mb-3 w-50" role="alert">
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span>
                        <strong>Success!</strong> You successfully updated a user.</span>
                </div>
            </div>
        </div>  
        <?php elseif ($this->session->flashdata('message') == 'add_failed') : ?>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="alert alert-danger alert-dismissible mt-3 mx-5 mb-3 w-50" role="alert">
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span>
                        <strong>Fail!</strong> You have failed in adding a new user.</span>
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
        </div>  
        <?php elseif ($this->session->flashdata('message') == 'dlt_user_success') : ?>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="alert alert-success alert-dismissible mt-3 mx-5 mb-3 w-50" role="alert">
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span>
                        <strong>Success!</strong> You successfully deleted a user.</span>
                </div>
            </div>
        </div> 
        
    <?php endif; ?>
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

                        <?= form_open_multipart('Admin_useracc/add_useracc_validation', array('id' => 'regForm')); ?>
                        <div class="modal-body mx-5">
                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Personal Information</h5>
                                <hr size="5" />

                                <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">First name:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- first_name -->
                                                <input class="form-control" type="text" id="first_name" name="first_name" value="<?= set_value('first_name'); ?>" placeholder="Juan" />
                                            </div>
                                            <small class="text-danger"><?= form_error('first_name') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Middle name:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- middle_name -->
                                                <input class="form-control" type="text" id="middle_name" name="middle_name" value="<?= set_value('middle_name'); ?>" placeholder="Martinez" />
                                            </div>
                                            <small class="text-danger"><?= form_error('middle_name') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Last name:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- last_name -->
                                                <input class="form-control" type="text" id="last_name" name="last_name" value="<?= set_value('last_name'); ?>" placeholder="Dela Cruz" />
                                            </div>
                                            <small class="text-danger"><?= form_error('last_name') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Username:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- username -->
                                                <input class="form-control" type="text" id="username" name="username" value="<?= set_value('username'); ?>" placeholder="jmdelacruz"/>
                                            </div>
                                            <small class="text-danger"><?= form_error('username') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Password:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- password -->
                                                <input class="form-control" type="password" id="password" name="password" value="<?= set_value('password'); ?>" placeholder="•••••••" />
                                            </div>
                                            <small class="text-danger"><?= form_error('password') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Confirm password:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- password -->
                                                <input class="form-control" type="password" id="conf_password" name="conf_password" value="<?= set_value('conf_password'); ?>" placeholder="•••••••" />
                                            </div>
                                            <small class="text-danger"><?= form_error('conf_password') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Role:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- role -->
                                                <select class="form-select" id="role" name="role" onchange='toggleDropdown();' value="<?= set_value('role'); ?>">
                                                    <option value="select" selected>select...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="doctor">Doctor</option>
                                                    <option value="pharmacy assistant">Pharmacy Assistant</option>
                                                </select>
                                            </div>
                                            <small class="text-danger"><?= form_error('role') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-2" id="specialization_div" style="display: none;">
                                    <div class="col"><label class="col-form-label">Specialization:</label></div>
                                    <div class="col">
                                    <div class="input-error">
                                            <div class="input-group">
                                                <!-- specialization -->
                                                <select class="form-select" id="specialization" name="specialization" value="<?= set_value('specialization'); ?>">
                                                    <option value=" " selected>select...</option>
                                                    <option value="internal medicine">Internal Medicine</option>
                                                    <option value="family medicine">Family Medicine</option>
                                                    <option value="obstetrics and gynecology">Obstetrics and Gynecology</option>
                                                    <option value="orthopedics">Orthopedics</option>
                                                </select>
                                            </div>
                                            <small class="text-danger"><?= form_error('specialization') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Birthdate:</label></div>
                                    <div class="col-6 col-sm-6">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- TODO: -->
                                                <input class="form-control" type="date" id="birth_date" name="birth_date" value="<?= set_value('birth_date'); ?>" />
                                            </div>
                                            <small class="text-danger"><?= form_error('birth_date') ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Gender:</label></div>
                                    <div class="col">
                                        <div class="input-error">
                                            <div class="input-group">
                                                <!-- TODO: -->
                                                <select class="form-select" id="gender" name="gender" value="<?= set_value('gender'); ?>">
                                                    <option value="select" selected>select...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <small class="text-danger"><?= form_error('gender') ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Contact Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Cellphone No.</label>
                                    <input class="form-control form-control-sm" type="tel" id="contact_no" name="contact_no" placeholder="09561234567"/>
                                    <small class="text-danger"><?= form_error('contact_no') ?></small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Email</label>
                                    <input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="name@example.com" />
                                    <small class="text-danger"><?= form_error('email') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

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
            <div class="card shadow mb-4 p-3 pt-4 pb-5">
                <div>
                    <table id="useracc-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Specialization</th>
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
                                                <h4 class="modal-title">Delete User</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-warning"></i>Are you sure you want to delete this user?</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-danger" href="<?= base_url('Admin_useracc/delete_useracc/') . $user->user_id ?>" type="button">Confirm</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php foreach ($users as $user) : ?>
                        <?php $updateUserInfoPath = 'Admin_useracc/edit_useracc/'. $user->user_id; ?>
                        <?= form_open_multipart($updateUserInfoPath, array('id' => 'editUser')); ?>
                        <div id="user-edit-modal-<?= $user->user_id?>" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title ms-3 fw-bolder" id="title-prod-name-edit"></h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body mx-5">
                                        <h5 class="heading-modal fw-semibold">Edit User</h5>
                                        <hr size="5" />
                                        <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">User ID:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- user_id -->
                                                        <input class="form-control user_id" type="text" id="user_id" name="user_id" value="<?= $user->user_id ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4 mb-2">
                                            <div class="col-3"><label class="col-form-label">First name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- full_name -->
                                                        <input class="form-control first_name" type="text" id="first_name" name="first_name" value="<?= $user->first_name ?>"/>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('first_name') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Last name:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control prod_dosage" type="text" id="last_name" name="last_name" value="<?= $user->last_name ?>"/>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('last_name') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Username:</label></div>
                                            <div class="col-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control prod_dosage" type="text" id="username" name="username" value="<?= $user->username ?>"/>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('username') ?></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Role:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- role -->
                                                        
                                                        <select class="form-select" id="role" name="role" onchange='toggleDropdown();' value="<?= set_value('role'); ?>">
                                                            <option value="<?= ucfirst($user->role) ?>" selected><?= ucfirst($user->role) ?></option>
                                                            <?php if (ucfirst($user->role) == 'Admin') : ?>
                                                                    <option value="doctor">Doctor</option>
                                                                    <option value="pharmacy assistant">Pharmacy Assistant</option>
                                                            <?php elseif (ucfirst($user->role) == 'Doctor') : ?>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="pharmacy assistant">Pharmacy Assistant</option>
                                                            <?php elseif (ucfirst($user->role) == 'Pharmacy Assistant') : ?>
                                                                <option value="admin">Admin</option>
                                                                <option value="doctor">Doctor</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('role') ?></small>
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
                                                        <select class="form-select" id="specialization" name="specialization">
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
                                                                <option value=" " selected>select...</option>
                                                                <option value="Internal Medicine">Internal Medicine</option>
                                                                <option value="Family Medicine">Family Medicine</option>
                                                                <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                                                <option value="Orthopedics">Orthopedics</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('specialization') ?></small>
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
                                                        <input class="form-control" type="date" id="birth_date" name="birth_date" value="<?= $user->birth_date ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('birth_date') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Contact #:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control stock_out" type="text" id="contact_no" name="contact_no" value="<?= $user->contact_no ?>"/>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('contact_no') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Email address:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control" type="email" id="email" name="email" value="<?= $user->email ?>" />
                                                    </div>
                                                    <small class="text-danger"><?= form_error('email') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <input type="hidden" name="item_id" class="item_id">
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" id="editUser" name="editUser" type="submit" style="background: #3269bf;">Save</button></div>
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

    function toggleDropdown(){
    let value = document.querySelector('select').value;

      if (value == "doctor" || value == "Doctor") {
        document.getElementById("specialization_div").style.display = "flex !important";
      } else {
        document.getElementById("specialization_div").style.display = "none";
     }
    }

    function toggleDropdownEdit(){
    let value = document.querySelector('select').value;

      if (value == "doctor" || value == "Doctor") {
        document.getElementById("specialization_div").style.display = "flex !important";
      } else {
        document.getElementById("specialization_div").style.display = "none";
     }
    }


    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {

            document.getElementById("nextBtn").innerHTML = "Submit";

        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();

            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, j, input_valid = true,
            select_valid = true;

        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        z = x[currentTab].getElementsByTagName("select");

        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If an input field is empty...
            if (y[i].value == ''){
                y[i].className += " invalid";
                input_valid = false;
            } else {
                y[i].className += " form-control form-control-sm valid"; 
            }
        }

        // A loop that checks every select field in the current tab:
        for (j = 0; j < z.length; j++) {
            // If a select field is empty...
            if (z[j].value == "select") {
                // add an "invalid" class to the field:
                z[j].className += " invalid";
                // and set the current valid status to false
                select_valid = false;
            } else
                z[j].className = "form-select form-select-sm valid";
                
        }


        // If all the fields are valid, return true. Otherwise, return false:
        if (input_valid && select_valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }

        console.log(select_valid);
        // return the valid status
        return input_valid && select_valid;
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {

            const first_name = document.getElementById('first_name')
            const middle_name = document.getElementById('middle_name')
            const last_name = document.getElementById('last_name')
            const username = document.getElementById('username')
            const password = document.getElementById('password')
            const conf_password = document.getElementById('conf_password')
            const role = document.getElementById('role')
            const specialization = document.getElementById('specialization')
            const birth_date = document.getElementById('birth_date')
            const gender = document.getElementById('gender')
            const contact_no = document.getElementById('contact_no')
            const email = document.getElementById('email')

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const setError = (element, message) => {
                const inputControl = element.parentElement;
                const errorDisplay = inputControl.querySelector('.error');

                errorDisplay.innerText = message;
                inputControl.classList.add('invalid');
                inputControl.classList.remove('success')
            }

            // Fetch all the forms we want to apply custom Bootstrap validation styles to 
            const setSuccess = element => {
                const inputControl = element.parentElement;
                const errorDisplay = inputControl.querySelector('.error');

                errorDisplay.innerText = '';
                inputControl.classList.add('success');
                inputControl.classList.remove('error');
            };

            const isValidEmail = email => {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }


            // fetch all the forms we want to apply custom style
            var inputs = document.getElementsByClassName('form-control')

            // loop over each input and watch blur event
            var validation = Array.prototype.filter.call(inputs, function(input) {

                input.addEventListener('blur', function(event) {
                    // reset
                    input.classList.remove('is-invalid')
                    input.classList.remove('is-valid')

                    // if (input.checkValidity() === false) {
                    //     input.classList.add('is-invalid')
                    // } else {
                    //     input.classList.add('is-valid')
                    // }

                    // const first_nameValue = first_name.value.trim();
                    // const middle_nameValue = middle_name.value.trim();
                    // const last_nameValue = last_name.value.trim();
                    // const ageValue = age.value.trim();
                    // const birthdateValue = birthdate.value.trim();
                    // const sexValue = sex.value.trim();
                    // const occupationValue = occupation.value.trim();
                    // const addressValue = address.value.trim();
                    // const cell_noValue = cell_no.value.trim();
                    // const tel_noValue = tel_no.value.trim();
                    // const emailValue = email.value.trim();
                    // const ec_nameValue = ec_name.value.trim();
                    // const relationshipValue = relationship.value.trim();
                    // const ec_contact_noValue = ec_contact_no.value.trim();

                    if (first_name.value === '') {
                        setError(first_name, 'First name cannot be blank');
                    } else {
                        setSuccess(first_name);
                    }

                }, false);
            });
        }, false);
    })()
</script>

<script>
    var forms = document.querySelectorAll('.needs-validation');

    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
</script>