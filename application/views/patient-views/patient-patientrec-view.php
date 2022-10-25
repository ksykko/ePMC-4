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
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button id="saveHealthBtn" form="editPatient" value="Submit" class="btn btn-sm btn-success" type="submit">Save</button></div>
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
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Cancel</button><a href="<?= site_url('Patient/index') ?>" class="btn btn-sm btn-primary btn-default-blue" role="button">Confirm</a></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center"><button class="btn px-3 me-4 btn-primary dbl-btn w-auto btn-default-blue" type="button" data-bs-target="#prompt-back-modal" data-bs-toggle="modal"><i class="fas fa-arrow-left"></i><strong class="d-none d-lg-inline-block">Back</strong></button></div>
    </div>
    <!-- <div class="row">
        <div class="col d-flex justify-content-center">
            <?php if ($this->session->flashdata('message') == 'success-profilepic') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's profile picture has been updated.</p>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'success-edit-patient-PI') : ?>
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <button class="btn-close shadow-none" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p><strong>Success!</strong> Patient's personal information has been updated.</p>
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
    </div> -->
    
    <section>
        <div class="row mb-3">
            <div class="col-lg-4">

                <div class="card mb-4">
                    <div class="card-header py-3 ch-patientrec" style>
                        <h6 class="m-0 fw-bold fs-5 ch-heading">Personal Information</h6>
                    </div>
                    <?php $updatePatientInfoPath = 'Patient_patientrec/edit_patient/' . $patient->patient_id; ?>
                    <?= form_open($updatePatientInfoPath, array('id' => 'editPatient')); ?>
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
                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-default-blue" data-bs-dismiss="modal" name="editPatient" type="submit">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mx-3">
                            <div class="row mb-2">
                                <div class="col-4 col-md-2 col-lg-3 col-xl-3 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6">Name:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="full_name" value="<?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name ?>"  /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6">Age:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="age" value="<?= $patient->age ?>"  /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-sm-2 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Birthdate:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="birth_date" value="<?= $patient->birth_date ?>"  /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-sm-3 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Sex:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="sex" value="<?= $patient->sex ?>"  /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 col-sm-3 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Occupation:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="occupation" value="<?= $patient->occupation ?>"  /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 col-sm-3 col-md-2 col-lg-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Address:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->address ?>"  /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 ch-patientrec">
                        <h6 class="m-0 fw-bold fs-5 ch-heading">Contact Information</h6>
                    </div>
                    <div class="card-body mx-3">
                        <div class="row mb-2">
                            <div class="col-5 col-sm-3 col-md-2 col-lg-5 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Cellphone #:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->cell_no ?>"  /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 col-sm-2 col-lg-5 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Telephone #:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->tel_no ?>"  /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 col-sm-2 col-md-2 col-lg-3 col-xl-4 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->email ?>"  /></div>
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
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->ec_name ?>"  /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 col-sm-3 col-md-2 col-lg-5 col-xl-4 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Relationship:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->relationship ?>"  /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 col-sm-2 col-md-1 col-lg-4 col-xl-4 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->ec_contact_no ?>"  /></div>
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
                                            <div class="mb-3"><label class="form-label" for="username"><strong>Blood Type:</strong></label><small class="text-danger"><?= form_error('blood_type') ?></small><select class="form-select" name="blood_type" disabled>
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
                                                <div class="input-group"><input class="form-control" type="text" name="pulse_rate" disabled value="<?= $healthinfo->pulse_rate ?>" /><span class="input-group-text d-none d-md-inline-block">bpm</span></div>
                                                <small class="text-danger"><?= form_error('pulse_rate') ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="bp_systolic"><strong>Systolic:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="bp_systolic" disabled value="<?= $healthinfo->bp_systolic ?>" /><span class="input-group-text d-none d-md-inline-block">mmHg</span></div>
                                            </div>
                                            <small class="text-danger"><?= form_error('bp_systolic') ?></small>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="height"><strong>Height:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="height" disabled value="<?= $healthinfo->height ?>" /><span class="input-group-text d-none d-md-inline-block">cm</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="bp_diastolic"><strong>Diastolic:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="bp_diastolic" disabled value="<?= $healthinfo->bp_diastolic ?>" /><span class="input-group-text d-none d-md-inline-block">mmHg</span></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="weight"><strong>Weight:</strong></label>
                                                <div class="input-group"><input class="form-control" type="text" name="weight" disabled value="<?= $healthinfo->weight ?>" /><span class="input-group-text d-none d-md-inline-block">kg</span></div>
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
                                <div class="mb-3"><textarea id="prescription" class="form-control text-area" name="prescription" disabled><?= $patient_details->prescription ?></textarea></div>

                            </div>
                        </div>
                        <div id="card-next-consultation" class="card shadow mb-4" style="height: 251px">
                            <div class="card-header py-3 ch-patientrec">
                                <h6 class="m-0 fw-bold fs-5 ch-heading">Next Consultation</h6>
                            </div>
                            <div class="card-body mx-3">
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <?php 
                                            $date = strtotime($patient_details->consul_next);
                                            $consul_next = date("l, M d Y", $date);
                                            $consul_time = date("g:i A", $date);
                                        ?>
                                        <div class="mb-3"><label class="form-label" for="consul_next"><strong>Date</strong></label><input id="consul_next" class="form-control" name="consul_next" value="<?= $consul_next?>  <?= $consul_time?>" disabled/></div>
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
        
    </section>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 ch-patientrec">
                    <h6 class="m-0 fw-bold fs-5 ch-heading">Consultation History</h6>
                </div>
                <div class="card-body mx-3">
                    <div class="table-responsive">
                        <table id="diag_table" class="table">
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