<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-sm-block patientrec-label">Patient Record</h1>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto"><button class="btn px-3 btn-save-patient me-4 btn-success dbl-btn w-auto" type="button" data-bs-toggle="modal" data-bs-target="#prompt-modal"><i class="fas fa-save"></i><strong class="d-none d-lg-inline-block"><span style="color: var(--bs-btn-hover-color);">Save</span></strong></button>
            <div id="prompt-modal" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                        <div class="modal-body d-xxl-flex justify-content-xxl-center">
                            <p><i class="typcn typcn-warning me-2"></i><span style="color: var(--bs-modal-color); background-color: var(--bs-modal-bg);">Are you sure you want to save changes?</span></p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button id="saveHealthBtn" form="healthForm" value="Submit" class="btn btn-sm btn-success" type="submit">Save</button></div>
                    </div>
                </div>
            </div>
            <div id="prompt-back-modal" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title"></h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-xxl-flex justify-content-xxl-center">
                            <p><i class="typcn typcn-warning me-2"></i>Any unsaved changes will not be saved.</p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Cancel</button><a href="<?= ($user_role == 'Doctor') ? site_url('Doctor_patientrec/index') : site_url('Admin_patientrec/index') ?>" class="btn btn-sm btn-primary btn-default-blue" role="button">Confirm</a></div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($user_role == 'Admin') : ?>
            <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center"><button class="btn px-3 me-4 btn-dark btn-default w-auto" type="button" data-bs-toggle="modal" data-bs-target="#mdl-personal-info"><i class="fas fa-edit"></i><strong class="d-none d-lg-inline-block">Edit Personal Info</strong></button>
                <div id="mdl-personal-info" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title ms-3 fw-bolder">Edit Patient's Personal Information</h4><button id="closeFormModal" class="btn-close me-1 shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <?php $updatePatientInfoPath = 'Admin_patientrec/edit_patient/' . $patient->patient_id; ?>
                            <?= form_open($updatePatientInfoPath, array('id' => 'editPatient')); ?>
                            <div class="modal-body mx-5">

                                <!-- One "tab" for each step in the form: -->
                                <div class="tab">
                                    <h5 class="heading-modal fw-semibold">Personal Information</h5>
                                    <hr size="5" />
                                    <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                        <div class="col form-group col-md-5 px-1"><label class="form-label">First Name</label>
                                            <input class="form-control form-control-sm" type="text" id="first_name" name="first_name" value="<?= $patient->first_name ?>" /><small class="text-danger"><?= form_error('first_name') ?></small>
                                        </div>
                                        <div class="col form-group col-md-4 px-1"><label class="form-label">Middle Name</label>
                                            <input class="form-control form-control-sm" type="text" id="middle_name" name="middle_name" value="<?= $patient->middle_name ?>" /><small class="text-danger"><?= form_error('middle_name') ?></small>
                                        </div>
                                        <div class="col form-group col-md-3 px-1"><label class="form-label">Surname</label>
                                            <input class="form-control form-control-sm" type="text" id="last_name" name="last_name" value="<?= $patient->last_name ?>" /><small class="text-danger"><?= form_error('last_name') ?></small>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Age</label>
                                            <input class="form-control form-control-sm" type="text" id="age" name="age" value="<?= $patient->age ?>" /><small class="text-danger"><?= form_error('age') ?></small>
                                            <!-- <div class="invalid-tooltip" style="display: block;">Please enter valid age.</div> -->
                                        </div>
                                        <div class="col form-group px-1"><label class="form-label">Birth date</label>
                                            <input class="form-control form-control-sm" id="birth_date" name="birth_date" type="date" value="<?= $patient->birth_date ?>" /><small class="text-danger"><?= form_error('birth_date') ?></small>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Sex</label><select class="form-select form-select-sm" id="sex" name="sex">
                                                <?php if ($patient->sex == 'Male') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female">Female</option>
                                                <?php elseif ($patient->sex == 'Female') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female" selected>Female</option>
                                                <?php else : ?>
                                                    <option value="select" selected disabled>select ...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                <?php endif; ?>
                                            </select><small class="text-danger"><?= form_error('sex') ?></small></div>
                                        <div class="col form-group px-1"><label class="form-label">Occupation</label><input class="form-control form-control-sm" type="text" id="occupation" name="occupation" value="<?= $patient->occupation ?>" /><small class="text-danger"><?= form_error('occupation') ?></small></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Address</label>
                                            <input class="form-control form-control-sm" type="text" id="address" name="address" value="<?= $patient->address ?>" /><small class="text-danger"><?= form_error('address') ?></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab">
                                    <h5 class="heading-modal fw-semibold">Contact Information</h5>
                                    <hr size="5" />
                                    <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm" type="tel" id="cell_no" name="cell_no" value="<?= $patient->cell_no ?>" /><small class="text-danger"><?= form_error('cell_no') ?></small></div>
                                        <div class="col form-group px-1"><label class="form-label">Telephone No.</label><input class="form-control form-control-sm" type="tel" id="tel_no" name="tel_no" value="<?= $patient->tel_no ?>" /><small class="text-danger"><?= form_error('tel_no') ?></small></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Email</label><input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="name@example.com" value="<?= $patient->email ?>" /><small class="text-danger"><?= form_error('email') ?></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab">
                                    <h5 class="heading-modal fw-semibold">Emergency Contact</h5>
                                    <hr size="5" />
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Name</label><input class="form-control form-control-sm" type="text" id="ec_name" name="ec_name" value="<?= $patient->ec_name ?>" /><small class="text-danger"><?= form_error('ec_name') ?></small></div>
                                        <div class="col form-group px-1"><label class="form-label">Relationship</label>
                                            <select class="form-select form-select-sm" id="relationship" name="relationship">
                                                <?php if ($patient->relationship == 'Father') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father" selected>Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php elseif ($patient->relationship == 'Mother') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother" selected>Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php elseif ($patient->relationship == 'Sibling') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling" selected>Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php elseif ($patient->relationship == 'Child') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child" selected>Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php elseif ($patient->relationship == 'Spouse') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse" selected>Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php elseif ($patient->relationship == 'Grandparent') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent" selected>Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php elseif ($patient->relationship == 'Guardian') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian" selected>Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php elseif ($patient->relationship == 'Other') : ?>
                                                    <option value="select" disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other" selected>Other</option>
                                                <?php else : ?>
                                                    <option value="select" selected disabled>select ...</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Sibling">Sibling</option>
                                                    <option value="Child">Child</option>
                                                    <option value="Spouse">Spouse</option>
                                                    <option value="Grandparent">Grandparent</option>
                                                    <option value="Guardian">Guardian</option>
                                                    <option value="Other">Other</option>
                                                <?php endif; ?>

                                            </select><small class="text-danger"><?= form_error('relationship') ?></small>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col form-group px-1 col-md-6"><label class="form-label">Contact No</label>
                                            <input class="form-control form-control-sm" type="tel" id="ec_contact_no" name="ec_contact_no" value="<?= $patient->ec_contact_no ?>" /><small class="text-danger"><?= form_error('ec_contact_no') ?></small>
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
                            <!-- Circles which indicates the steps of the form: -->
                            <div class="mb-4" style="text-align:center;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center"><button class="btn px-3 me-4 btn-primary dbl-btn w-auto btn-default-blue" type="button" data-bs-target="#prompt-back-modal" data-bs-toggle="modal"><i class="fas fa-arrow-left"></i><strong class="d-none d-lg-inline-block">Back</strong></button></div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <?php if ($this->session->flashdata('message') == 'success-profilepic') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's profile picture has been updated.</p>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'success-healthinfo') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's health information has been updated.</p>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'success-diagnosis') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's diagnosis has been added.</p>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'success-treatment') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's treatment plan has been added.</p>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'success-edit-patient-PI') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's personal information has been updated.</p>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'success-dlt-diagnosis') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's diagnosis has been deleted.</p>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'success-dlt-treatment') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's treatment plan has been deleted.</p>
                </div>
            <?php elseif ($this->session->flashdata('error-profilepic')) : ?>
                <div class="alert alert-danger alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Error!</strong> Patient's profile picture has not been updated. <?= $this->session->flashdata('error') ?></p>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Error!</strong> Invalid input/s.</p>
                    <p style="margin-bottom: 0rem;"><?php echo $this->session->flashdata('error-profilepic') ?></p>
                    <p style="margin-bottom: 0rem;"><?php echo $this->session->flashdata('error') ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $updatePatientPath = 'Admin_patientrec/update_health_info/' . $patient->patient_id; ?>
    <?= form_open_multipart($updatePatientPath, array('id' => 'healthForm')); ?>
    <section>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header py-3 ch-patientrec" style>
                        <h6 class="m-0 fw-bold fs-5 ch-heading">Personal Information</h6>
                    </div>

                    <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="<?= base_url('/assets/img/profile-avatars/') . $patient->avatar ?>" width="160" height="160" />
                        <div class="mb-3"><button class="btn btn-primary btn-sm btn-default-blue" type="button" data-bs-toggle="modal" data-bs-target="#mdl-uploadpic">Change Photo</button>
                            <div id="mdl-uploadpic" class="modal fade" role="dialog" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title ms-3 fw-bolder">Upload Patient&#39;s Profile Picture</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group"><input class="form-control form-control-sm" type="file" src="<?= base_url('/assets/img/profile-avatars/') . $patient->avatar ?>" value="<?= base_url('/assets/img/profile-avatars/') . $patient->avatar ?>" name="avatar" /></div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-default-blue" data-bs-dismiss="modal">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-3">
                            <div class="row mb-2">
                                <div class="col-4 col-md-2 col-lg-3 col-xl-3 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6">Name:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="full_name" value="<?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name ?>" readonly /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6">Age:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="age" value="<?= $patient->age ?>" readonly /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-sm-2 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Birthdate:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="birth_date" value="<?= $patient->birth_date ?>" readonly /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-sm-3 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Sex:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="sex" value="<?= $patient->sex ?>" readonly /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 col-sm-3 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Occupation:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="occupation" value="<?= $patient->occupation ?>" readonly /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 col-sm-3 col-md-2 col-lg-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Address:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->address ?>" readonly /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 ch-patientrec">
                        <h6 class="m-0 fw-bold fs-5 ch-heading">Contact Information</h6>
                    </div>
                    <div class="card-body mx-3">
                        <div class="row mb-2">
                            <div class="col-5 col-sm-3 col-md-2 col-lg-5 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Cellphone #:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->cell_no ?>" readonly /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 col-sm-2 col-lg-5 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Telephone #:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->tel_no ?>" readonly /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 col-sm-2 col-md-2 col-lg-3 col-xl-4 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->email ?>" readonly /></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header py-3 ch-patientrec">
                        <h6 class="m-0 fw-bold fs-5 ch-heading">Emergency Contact</h6>
                    </div>
                    <div class="card-body mx-3">
                        <div class="row mb-2">
                            <div class="col-5 col-sm-3 col-md-2 col-lg-4 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Name:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->ec_name ?>" readonly /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 col-sm-3 col-md-2 col-lg-5 col-xl-4 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Relationship:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->relationship ?>" readonly /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 col-sm-2 col-md-1 col-lg-4 col-xl-4 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->ec_contact_no ?>" readonly /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-12 h-">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 ch-patientrec">
                                <h6 class="m-0 fw-bold fs-5 ch-heading">Vital Signs</h6>
                            </div>
                            <div class="card-body mx-3">
                                <form>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="username"><strong>Blood Type:</strong></label><small class="text-danger"><?= form_error('blood_type') ?></small><select class="form-select" name="blood_type">
                                                    <?php if ($healthinfo->blood_type == 'A+') : ?>
                                                        <option disabled>select ...</option>
                                                        <option value="A+" selected>A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    <?php elseif ($healthinfo->blood_type == 'A-') : ?>
                                                        <option disabled>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-" selected>A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    <?php elseif ($healthinfo->blood_type == 'B+') : ?>
                                                        <option disabled>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+" selected>B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    <?php elseif ($healthinfo->blood_type == 'B-') : ?>
                                                        <option disabled>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-" selected>B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    <?php elseif ($healthinfo->blood_type == 'AB+') : ?>
                                                        <option disabled>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+" selected>AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <?php elseif ($healthinfo->blood_type == 'AB-') : ?>\
                                                        <option disabled>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-" selected>AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    <?php elseif ($healthinfo->blood_type == 'O+') : ?>
                                                        <option disabled>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+" selected>O+</option>
                                                        <option value="O-">O-</option>
                                                    <?php elseif ($healthinfo->blood_type == 'O-') : ?>
                                                        <option disabled>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-" selected>O-</option>
                                                    <?php else : ?>
                                                        <option disabled selected>select ...</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="pulse_rate"><strong>Pulse Rate:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="pulse_rate" value="<?= $healthinfo->pulse_rate ?>" /><span class="input-group-text d-none d-md-inline-block">bpm</span></div>
                                                <small class="text-danger"><?= form_error('pulse_rate') ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="bp_systolic"><strong>Systolic:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="bp_systolic" value="<?= $healthinfo->bp_systolic ?>" /><span class="input-group-text d-none d-md-inline-block">mmHg</span></div>
                                            </div>
                                            <small class="text-danger"><?= form_error('bp_systolic') ?></small>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="height"><strong>Height:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="height" value="<?= $healthinfo->height ?>" /><span class="input-group-text d-none d-md-inline-block">cm</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="bp_diastolic"><strong>Diastolic:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="bp_diastolic" value="<?= $healthinfo->bp_diastolic ?>" /><span class="input-group-text d-none d-md-inline-block">mmHg</span></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="weight"><strong>Weight:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="weight" value="<?= $healthinfo->weight ?>" /><span class="input-group-text d-none d-md-inline-block">kg</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="card-prescription" class="card shadow mb-4" style="height: 548px;">
                            <div class="card-header py-3 ch-patientrec">
                                <h6 class="m-0 fw-bold fs-5 ch-heading">Prescription</h6>
                            </div>
                            <div class="card-body mx-3">
                                <div class="mb-3"><textarea id="prescription" class="form-control text-area" name="prescription"><?= $healthinfo->prescription ?></textarea></div>

                            </div>
                        </div>
                        <div id="card-next-consultation" class="card shadow mb-4" style="height: 251px">
                            <div class="card-header py-3 ch-patientrec">
                                <h6 class="m-0 fw-bold fs-5 ch-heading">Next Consultation</h6>
                            </div>
                            <div class="card-body mx-3">
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="mb-3"><label class="form-label" for="consul_next"><strong>Date</strong></label><input id="consul_next" class="form-control" name="consul_next" value="<?= $healthinfo->consul_next ?>" type="datetime-local" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card shadow mb-4">
            <div class="card-header py-3 ch-patientrec">
                <h6 class="m-0 fw-bold fs-5 ch-heading">Lab Reports</h6>
            </div>
            <div class="card-body mx-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Column 1</th>
                                <th>Column 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                            </tr>
                            <tr>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->
        <div class="row row-cols-1">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 ch-patientrec">
                        <h6 class="m-0 fw-bold fs-5 ch-heading">Objectives</h6>
                    </div>
                    <div class="card-body mx-3">
                        <div class="mb-3"><textarea class="form-control text-area" id="objectives" name="objectives"><?= $healthinfo->objectives ?></textarea></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 ch-patientrec">
                        <h6 class="m-0 fw-bold fs-5 ch-heading">Symptoms</h6>
                    </div>
                    <div class="card-body mx-3">
                        <div class="mb-3"><textarea class="form-control text-area" id="symptoms" name="symptoms"><?= $healthinfo->symptoms ?></textarea></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= form_close() ?>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 ch-patientrec ch-patientdiag add-header">
                    <div class="d-flex">
                        <div class="me-auto">
                            <h6 class="bd-highlight fw-bold fs-5 ch-heading">Patient Diagnosis</h6>
                        </div>
                        <div><button id="add-diagnosis" class="btn btn-success btn-save-patient" type="button" data-bs-toggle="modal" data-bs-target="#mdl-add-diagnosis"><i class="typcn typcn-document-add"></i><span class="span-add-diagnosis d-md-inline-block d-none"> Add Diagnosis</span></button>
                            <div id="mdl-add-diagnosis" class="modal fade" role="dialog" tabindex="-1">
                                <?php $addDiagnosisPath = 'Admin_patientrec/add_diagnosis/' . $patient->patient_id; ?>
                                <?= form_open_multipart($addDiagnosisPath, array('id' => 'addDiagnosisForm')); ?>
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title ms-3 fw-bolder">Add a Diagnosis</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body mx-5">
                                            <div class="row mt-4 mb-2">
                                                <div class="col col-sm-4"><label class="col-form-label">Diagnosis:</label></div>
                                                <div class="col">
                                                    <div class="input-group"><textarea class="form-control" id="p_recent_diagnosis" name="p_recent_diagnosis" style="height: 200px;"></textarea></div>
                                                </div>
                                            </div>
                                            <div class="row mt-4 mb-2">
                                                <div class="col col-sm-4"><label class="col-form-label">Doctor:</label></div>
                                                <div class="col">
                                                    <div class="input-error">
                                                        <div class="input-group">
                                                            <!-- role -->
                                                            <select class="form-select" id="p_doctor" name="p_doctor" value="<?= set_value('p_doctor'); ?>">
                                                                <option value="select" disabled selected>select...</option>
                                                                <?php foreach ($doctors as $doctor) : ?>
                                                                    <option value="<?= $doctor->first_name . ' ' . $doctor->last_name ?>"><?= $doctor->first_name . ' ' . $doctor->last_name ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <small class="text-danger"><?= form_error('role') ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-success btn-save-patient" type="submit">Save</button></div>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-3 pt-4 pb-5">
                    <div class="row">
                        <div class="col">
                            <div>
                                <table id="diag_table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Date Created</th>
                                            <th class="align-middle col-md-6">Diagnosis</th>
                                            <th class="align-middle">Doctor</th>
                                            <th class="text-center col-md-2 align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($diagnoses as $diagnosis) : ?>
                                            <div id="view-diagnosis-<?= $diagnosis->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <?php
                                                        $diag_date = unix_to_human(mysql_to_unix($diagnosis->p_diag_date));
                                                        ?>
                                                        <div class="modal-header">
                                                            <h4 class="modal-title ms-3 fw-bolder">Diagnosis <?= $diag_date ?></h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body mx-5">
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-sm-4"><label class="col-form-label">Diagnosis:</label></div>
                                                                <div class="col">
                                                                    <div class="input-group"><textarea class="form-control" id="p_recent_diagnosis" name="p_recent_diagnosis" style="height: 250px;" disabled><?= $diagnosis->p_recent_diagnosis ?></textarea></div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-sm-4"><label class="col-form-label">Doctor:</label></div>
                                                                <div class="col">
                                                                    <div class="input-error">
                                                                        <div class="input-group">
                                                                            <!-- role -->
                                                                            <select class="form-select" id="p_doctor" name="p_doctor" disabled value="<?= set_value('p_doctor'); ?>">
                                                                                <option value="<?= $diagnosis->p_doctor ?>" disabled selected><?= $diagnosis->p_doctor ?></option>
                                                                            </select>
                                                                        </div>
                                                                        <small class="text-danger"><?= form_error('role') ?></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="delete-diagnosis-<?= $diagnosis->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title ms-3 fw-bolder">Delete a Diagnosis</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-danger"></i>Are you sure you want to delete this diagnosis?</p>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_patientrec/delete_diagnosis/') . $diagnosis->patient_id . '/' . $diagnosis->id ?>" type="button">Confirm</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 ch-patientrec ch-patientdiag add-header">
                    <div class="d-flex">
                        <div class="me-auto">
                            <h6 class="bd-highlight fw-bold fs-5 ch-heading">Treatment Plan</h6>
                        </div>
                        <div><button id="add-treatment-plan" class="btn btn-success btn-save-patient" type="button" data-bs-toggle="modal" data-bs-target="#mdl-add-treatment-plan"><i class="typcn typcn-document-add"></i><span class="span-add-diagnosis d-md-inline-block d-none"> Add Treatment Plan</span></button>
                            <div id="mdl-add-treatment-plan" class="modal fade" role="dialog" tabindex="-1">
                                <?php $addTreatmentPath = 'Admin_patientrec/add_treatment/' . $patient->patient_id; ?>
                                <?= form_open_multipart($addTreatmentPath, array('id' => 'addTreatmentForm')); ?>
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title ms-3 fw-bolder">Add Treatment Plan</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body mx-5">
                                            <div class="row mt-4 mb-2">
                                                <div class="col col-sm-4"><label class="col-form-label">Diagnosis:</label></div>
                                                <div class="col">
                                                    <div class="input-group"><textarea class="form-control" id="p_diagnosis" name="p_diagnosis" style="height: 250px;"></textarea></div>
                                                </div>
                                            </div>
                                            <div class="row mt-4 mb-2">
                                                <div class="col col-sm-4"><label class="col-form-label">Treatment Plan:</label></div>
                                                <div class="col">
                                                    <div class="input-group"><textarea class="form-control" id="p_treatment_plan" name="p_treatment_plan" style="height: 250px;"></textarea></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success btn-save-patient" type="submit">Save</button></div>
                                    </div>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-3">
                    <div class="row">
                        <div class="col">
                            <div>
                                <table id="treatment_plan_table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="align-middle col-md-5">Diagnosis</th>
                                            <th class="align-middle col-md-5">Treatment Plan</th>
                                            <th class="align-middle col-md-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($treatments as $treatment) : ?>
                                            <div id="view-treatment-<?= $treatment->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title ms-3 fw-bolder">Treatment Plan</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body mx-5">
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-sm-4"><label class="col-form-label">Diagnosis:</label></div>
                                                                <div class="col">
                                                                    <div class="input-group"><textarea class="form-control" id="p_diagnosis" name="p_diagnosis" style="height: 250px;" disabled><?= $treatment->p_diagnosis ?></textarea></div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-sm-4"><label class="col-form-label">Treatment Plan:</label></div>
                                                                <div class="col">
                                                                    <div class="input-group"><textarea class="form-control" id="p_treatment_plan" name="p_treatment_plan" style="height: 250px;" disabled><?= $treatment->p_treatment_plan ?></textarea></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="delete-treatment-<?= $treatment->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title ms-3 fw-bolder">Delete a Treatment Plan</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-danger"></i>Are you sure you want to delete this diagnosis?</p>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_patientrec/delete_treatment/') . $treatment->patient_id . '/' . $treatment->id ?>" type="button">Confirm</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 ch-patientrec">
                    <h6 class="m-0 fw-bold fs-5 ch-heading">Consultation History</h6>
                </div>
                <div class="card-body mx-3">
                    <div>
                        <table id="consul_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-sm-6">Date and Time</th>
                                    <th class="col-sm-6">Doctor</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
            document.getElementById("editPatient").submit();

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
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                input_valid = false;
            } else
                y[i].className = "form-control form-control-sm valid";
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