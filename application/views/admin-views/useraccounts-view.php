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
                                            <input class="form-control" type="text" id="role" name="role" value="<?= set_value('role'); ?>" />
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
                                <div class="col"><label class="col-form-label">Address:</label></div>
                                <div class="col">
                                    <div class="input-error">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="address" name="address" value="<?= set_value('address'); ?>" />
                                        </div>
                                        <small class="text-danger"><?= form_error('address') ?></small>
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
            <div id="input-search" class="input-group"><input class="form-control search-input" type="search" /><button class="btn btn-primary d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center btn-search" type="button"><i class="fas fa-search" style="font-size: 12px;"></i></button></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4">
                <div id="patient-table" class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Specialization</th>
                                <th>Birthdate</th>
                                <th>Address</th>
                                <th>Contact #</th>
                                <th>Email</th>
                                <th class="text-center col-md-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $user->user_id ?></td>
                                        <td><?= $user->first_name ?></td>
                                        <td><?= $user->last_name ?></td>
                                        <td><?= $user->username ?></td>
                                        <td><?= $user->role ?></td>
                                        <td><?= $user->specialization ?></td>
                                        <td><?= $user->birth_date ?></td>
                                        <td><?= $user->address ?></td>
                                        <td><?= $user->contact_no ?></td>
                                        <td><?= $user->email ?></td>
                                        <td class="text-center d-xxl-flex justify-content-xxl-end align-items-xxl-center">
                                            <button class="btn btn-light mx-2" type="button">Edit</button>
                                            <a class="btn btn-link btn-sm btn-delete" href="<?= base_url('Admin_useracc/delete_useracc/') . $user->user_id ?>"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?= $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
    </div>
</div>