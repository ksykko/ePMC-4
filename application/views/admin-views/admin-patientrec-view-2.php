<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-sm-block patientrec-label">Patient Record</h1>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto"><button class="btn px-3 btn-save-patient me-4 btn-success dbl-btn" type="button" data-bs-toggle="modal" data-bs-target="#prompt-modal"><i class="fas fa-save"></i><strong><span style="color: var(--bs-btn-hover-color);">Save</span></strong></button>
            <div id="prompt-modal" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                        <div class="modal-body d-xxl-flex justify-content-xxl-center">
                            <p><i class="typcn typcn-warning me-2"></i><span style="color: var(--bs-modal-color); background-color: var(--bs-modal-bg);">Are you sure you want to save changes?</span></p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button id="saveHealthBtn" form="healthForm" value="Submit" class="btn btn-success" type="submit">Save</button></div>
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
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button><a href="<?= site_url('Admin_patientrec/index') ?>" class="btn btn-primary btn-default-blue" role="button">Confirm</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center"><button class="btn px-3 me-4 btn-dark btn-default edt-btn" type="button"><i class="fas fa-edit"></i><strong>Edit</strong></button></div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center"><button class="btn px-3 me-4 btn-primary dbl-btn btn-default-blue" type="button" data-bs-target="#prompt-back-modal" data-bs-toggle="modal"><i class="fas fa-arrow-left"></i><strong>Back</strong></button></div>
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
            <?php elseif ($this->session->flashdata('error-profilepic')) : ?>
                <div class="alert alert-danger alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Error!</strong> Patient's profile picture has not been updated. <?= $this->session->flashdata('error') ?></p>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show w-25" role="alert">
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
                                            <h4 class="modal-title">Upload Patient&#39;s Profile Picture</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group"><input class="form-control form-control-sm" type="file" src="<?= base_url('/assets/img/profile-avatars/') . $patient->avatar ?>" value="<?= base_url('/assets/img/profile-avatars/') . $patient->avatar ?>" name="avatar" /></div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-default-blue" data-bs-dismiss="modal">Save</button></div>
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
                <div class="card-header py-3 ch-patientrec ch-patientdiag">
                    <div class="d-flex">
                        <div class="me-auto">
                            <h6 class="bd-highlight fw-bold fs-5 ch-heading">Patient Diagnosis</h6>
                        </div>
                        <div><button id="add-diagnosis" class="btn btn-success btn-save-patient" type="button" data-bs-toggle="modal" data-bs-target="#mdl-add-diagnosis"><i class="typcn typcn-document-add"></i><span class="span-add-diagnosis d-md-inline-block d-none"> Add Diagnosis</span></button>
                            <div id="mdl-add-diagnosis" class="modal fade" role="dialog" tabindex="-1">
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
                                                                    <option value="<?= $doctor->user_id ?>"><?= $doctor->first_name . ' ' . $doctor->last_name ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <small class="text-danger"><?= form_error('role') ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success btn-save-patient" type="button">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-3">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Date</th>
                                            <th class="align-middle">Recent Diagnosis</th>
                                            <th class="align-middle">Doctor</th>
                                            <th class="text-center col-md-3 align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cell 1</td>
                                            <td>Cell 2</td>
                                            <td>Dr. Pagtakhan</td>
                                            <td class="text-center" colspan="1">
                                                <a class="btn btn-light mx-2" type="button">View</a>
                                                <button class="btn btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#edit-patient-' . $patient->patient_id . '">Edit</button>
                                                <button class="btn btn-link mx-2 shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-dialog-"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cell 3</td>
                                            <td>Cell 4</td>
                                            <td>Cell 4</td>
                                            <td class="text-center" colspan="1">
                                                <a class="btn btn-light mx-2" type="button">View</a>
                                                <button class="btn btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#edit-patient-' . $patient->patient_id . '">Edit</button>
                                                <button class="btn btn-link mx-2 shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-dialog-"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
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
                <div class="card-header py-3 ch-patientrec ch-patientdiag">
                    <div class="d-flex">
                        <div class="me-auto">
                            <h6 class="bd-highlight fw-bold fs-5 ch-heading">Treatment Plan</h6>
                        </div>
                        <div><button id="add-treatment-plan" class="btn btn-success btn-save-patient" type="button" data-bs-toggle="modal" data-bs-target="#mdl-add-treatmentplan"><i class="typcn typcn-document-add"></i><span class="span-add-diagnosis d-md-inline-block d-none"> Add Treatment Plan</span></button>
                            <div id="mdl-add-treatmentplan" class="modal fade" role="dialog" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Treatment Plan</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>The content of your modal.</p>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success btn-save-patient" type="button">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-3">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="align-middle col-md-3">Diagnosis</th>
                                            <th class="align-middle col-md-6">Treatment Plan</th>
                                            <th class="align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cell 1</td>
                                            <td>Cell 2</td>
                                            <td class="text-center" colspan="1">
                                                <a class="btn btn-light mx-2" type="button">View</a>
                                                <button class="btn btn-light mx-2" type="button" data-bs-toggle="modal" data-bs-target="#edit-patient-' . $patient->patient_id . '">Edit</button>
                                                <button class="btn btn-link mx-2 shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#delete-dialog-"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cell 3</td>
                                            <td>Cell 4</td>
                                            <td></td>
                                        </tr>
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-sm-6">Date and Time</th>
                                    <th class="col-sm-6">Doctor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-0">Cell 1</td>
                                    <td class="border-0">Cell 2</td>
                                </tr>
                                <tr>
                                    <td class="border-0">Cell 3</td>
                                    <td class="border-0">Cell 4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>