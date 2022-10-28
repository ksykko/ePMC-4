<style>
    body {
        overflow-y: scroll;
    }
</style>
<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-sm-block patientrec-label">User Accounts</h1>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p">
            <button id="btn-add-patient" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-1" type="button">
                <i class="icon ion-android-add-circle ms-1"></i>
                <span class="d-none d-xl-inline-block">Add User</span>
            </button>
            <?= form_open_multipart('Admin_useracc/add_useracc_validation'); ?>
            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Add a User</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-semibold">Personal Information</h5>
                            <hr size="5" />
                            <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                            <div class="row mt-4 mb-2">
                                <div class="col"><label class="col-form-label">First name:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- first_name -->
                                            <input class="form-control" type="text" id="first_name" name="first_name" value="<?= set_value('first_name'); ?>" />
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
                                            <input class="form-control" type="text" id="middle_name" name="middle_name" value="<?= set_value('middle_name'); ?>" />
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
                                            <input class="form-control" type="text" id="last_name" name="last_name" value="<?= set_value('last_name'); ?>" />
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
                                            <input class="form-control" type="text" id="username" name="username" value="<?= set_value('username'); ?>" />
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
                                            <input class="form-control" type="text" id="password" name="password" value="<?= set_value('password'); ?>" />
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
                                            <input class="form-control" type="text" id="conf_password" name="conf_password" value="<?= set_value('conf_password'); ?>" />
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
                                            <select class="form-select" id="role" name="role" value="<?= set_value('role'); ?>">
                                                <option value="select" selected>select...</option>
                                                <option value="admin">Admin</option>
                                                <option value="physician">Physician</option>
                                                <option value="pharmacy assistant">Pharmacy Assistant</option>
                                            </select>
                                        </div>
                                        <small class="text-danger"><?= form_error('role') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-2">
                                <div class="col"><label class="col-form-label">Specialization:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- specialization -->
                                            <input class="form-control" type="text" id="specialization" name="specialization" value="<?= set_value('specialization'); ?>" />
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
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" type="button" style="background: #3269bf;" data-bs-target="#modal-2" data-bs-toggle="modal">Next</button></div>
                    </div>
                </div>
            </div>
            <div id="modal-2" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Add a User</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-semibold">Contact Information</h5>
                            <hr size="5" />
                            <div class="row mb-2">
                                <div class="col"><label class="col-form-label">Contact #:</label></div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="tel" id="contact_no" name="contact_no" value="<?= set_value('contact_no'); ?>" />
                                        </div>
                                        <small class="text-danger"><?= form_error('contact_no') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col"><label class="col-form-label">Email:</label></div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="email" id="email" name="email" value="<?= set_value('email'); ?>" />
                                        </div>
                                        <small class="text-danger"><?= form_error('email') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-target="#modal-1" data-bs-toggle="modal">Back</button><button class="btn btn-primary btn-modal" type="submit" name="addUser" style="background: #3269bf;">Save</button></div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
        <div class="d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-3 pt-4 pb-5">
                <div>
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
                                <th class="text-center col-md-2">Action</th>
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
                                                        <select class="form-select" id="role" name="role">
                                                            <option value="<?= ucfirst($user->role) ?>" selected><?= ucfirst($user->role) ?></option>
                                                            <?php if (ucfirst($user->role) == 'Admin') : ?>
                                                                <option value="physician">Physician</option>
                                                                <option value="pharmacy assistant">Pharmacy Assistant</option>
                                                            <?php elseif (ucfirst($user->role) == 'Physician') : ?>
                                                                <option value="admin">Admin</option>
                                                                <option value="pharmacy assistant">Pharmacy Assistant</option>
                                                            <?php elseif (ucfirst($user->role) == 'Pharmacy Assistant') : ?>
                                                            <option value="admin">Admin</option>
                                                            <option value="physician">Physician</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('role') ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3"><label class="col-form-label">Specialization:</label></div>
                                            <div class="col-9 col-sm-9">
                                                <div class="input-error">
                                                    <div class="input-group">
                                                        <!-- TODO: -->
                                                        <input class="form-control quantity" type="text" id="specialization" name="specialization" value="<?= $user->specialization ?>"/>
                                                    </div>
                                                    <small class="text-danger"><?= form_error('specialization') ?></small>
                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-modal" id="editUser" name="editUser" type="submit" style="background: #3269bf;">Save</button></div>
                                    </div>
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
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            for (i = 0; i < y.length; i++) {
                y[i].className = "form-control form-control-sm valid";
            }
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
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