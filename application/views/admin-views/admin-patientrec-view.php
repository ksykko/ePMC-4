<style>
    body {
        overflow-y: scroll;
    }
</style>
<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-lg-inline-block patientrec-label">Patient Record</h1>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4">
            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Add a Patient Record</h4><button id="closeFormModal" class="btn-close me-1 shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?= form_open('Admin_patientrec/add_patient_validation', array('id' => 'regForm')); ?>
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
                                    <div class="col form-group px-1"><label class="form-label">Age</label>
                                        <input class="form-control form-control-sm" type="text" id="age" name="age" /><small class="text-danger"><?= form_error('age') ?></small>
                                        <label id="age_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group px-1"><label class="form-label">Birth date</label>
                                        <input class="form-control form-control-sm" id="birth_date" name="birth_date" type="date" /><small class="text-danger"><?= form_error('birth_date') ?></small>
                                        <label id="birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group col-md-3 px-1"><label class="form-label">Sex</label><select class="form-select form-select-sm" id="sex" name="sex">
                                            <option value="" selected disabled>select ...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select><small class="text-danger"><?= form_error('sex') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Civil Status</label><select class="form-select form-select-sm" id="civil_status" name="civil_status">
                                            <option value="" selected>select ...</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Widowed">Widowed</option>
                                        </select><small class="text-danger"><?= form_error('civil_status') ?></small></div>
                                    <div class="col form-group px-1"><label class="form-label">Occupation</label><input class="form-control form-control-sm" type="text" id="occupation" name="occupation" /></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Address</label>
                                        <input class="form-control form-control-sm" type="text" id="address" name="address" />
                                    </div>
                                </div>
                                <!-- <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Full Name</label>
                                        <input class="form-control form-control-sm combine" type="text" id="full_name" name="full_name" value="" />
                                    </div>
                                </div> -->
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Contact Information</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm" type="tel" id="cell_no" name="cell_no" placeholder="09xxxxxxxxx" />
                                        <label id="cell_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                    <div class="col form-group px-1"><label class="form-label">Telephone No.</label><input class="form-control form-control-sm" type="tel" id="tel_no" name="tel_no" />
                                        <label id="tel_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Email</label><input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="name@example.com" />
                                        <label id="email_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="tab">
                                <h5 class="heading-modal fw-semibold">Emergency Contact</h5>
                                <hr size="5" />
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mb-2">
                                    <div class="col form-group px-1"><label class="form-label">Name</label><input class="form-control form-control-sm" type="text" id="ec_name" name="ec_name" /></div>
                                    <div class="col form-group px-1"><label class="form-label">Relationship</label><select class="form-select form-select-sm" id="relationship" name="relationship">
                                            <option value="" selected disabled>select ...</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Sibling">Sibling</option>
                                            <option value="Child">Child</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Grandparent">Grandparent</option>
                                            <option value="Guardian">Guardian</option>
                                            <option value="Other">Other</option>
                                        </select></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col form-group px-1 col-md-6"><label class="form-label">Contact No.</label>
                                        <input class="form-control form-control-sm" type="tel" id="ec_contact_no" name="ec_contact_no" />
                                        <label id="ec_contact_error" class="text-danger font-monospace" style="font-size:13px"></label>
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
        <div class="d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4"><button id="btn-add-patient" class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-1"><i class="icon ion-android-add-circle"></i><span class="d-none d-lg-inline-block ms-1">Add Patient Record</span></button></div>
        <div class="d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4"><button id="btn-add-import" class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-3"><i class="fa fa-picture-o"></i><span class="d-none d-lg-inline-block ms-1">Add via Import</span></button></div>
        <div class="d-sm-flex d-md-flex d-lg-flex d-xxl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center align-items-lg-center justify-content-xxl-center align-items-xxl-center me-4"><a id="btn-view-archives" href="<?= base_url('Admin_archives/index') ?>" class="btn btn-sm btn-dark" type="button"><i class="fas fa-file-archive"></i><span class="d-none d-lg-inline-block ms-1">Archives</span></a></div>
        <div id="modal-3" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ms-3 fw-bolder">Add Via Import</h4><button class="btn-close me-1 shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?= form_open_multipart('Admin_patientrec/aws_textract_ocr'); ?>
                    <div class="modal-body mx-5">
                        <p>Import image below.</p>

                        <div class="input-group">
                            <input class="form-control form-control-sm" name="importPatientrec" type="file" />
                        </div>

                    </div>
                    <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-default-blue" type="submit">Next</button></div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('success-import')) : ?>
            <?php $ext_data = $this->session->flashdata('success-import') ?>
            <?= form_open('Admin_patientrec/verify_import', array('id' => 'importForm')); ?>
            <div id="modal-verify" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title ms-3 fw-bolder">Verify Extracted Patient Data</h4><button class="btn-close me-1 shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mx-3">
                                <div class="col d-flex justify-content-center align-items-center mb-3 mb-sm-3"><img class="img-fluid" src="<?= base_url('/assets/img/patientrec-imports/') . $ext_data['File'] ?>" /></div>
                                <!-- <div class="col">
                                    <div class="row mb-3 mt-3">
                                        <div class="col"><label class="form-label">Name:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="name" value="<?= $ext_data['Name:'] ?>" /></div>
                                        </div>
                                        <div class="col"><label class="form-label">Mobile No.:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="mobile_no" value="<?= $ext_data['Mobile No.:'] ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col"><label class="form-label">Address:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="address" value="<?= $ext_data['Address:'] ?>" /></div>
                                        </div>
                                        <div class="col"><label class="form-label">Tel No.:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="tel_no" value="<?= $ext_data['Tel. No.:'] ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col"><label class="form-label">Birthday:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="birthday" value="<?= $ext_data['Birthday:'] ?>" /></div>
                                        </div>
                                        <div class="col"><label class="form-label">Age:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="age" value="<?= $ext_data['Age:'] ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col"><label class="form-label">Sex:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="sex" value="<?= $ext_data['Sex:'] ?>" /></div>
                                        </div>
                                        <div class="col"><label class="form-label">Civil Status:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="civil_status" value="<?= $ext_data['Civil Status:'] ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col"><label class="form-label">Weight:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="weight" value="<?= $ext_data['Weight:'] ?>" /></div>
                                        </div>
                                        <div class="col"><label class="form-label">Height:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="height" value="<?= $ext_data['Height:'] ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col col-6"><label class="form-label">Occupation:</label>
                                            <div class="input-group"><input class="form-control" type="text" name="occupation" value="<?= $ext_data['Occupation:'] ?>" /></div>
                                        </div>
                                    </div>
                                </div> -->
                                <input type='hidden' name='file' value='<?= $ext_data['File'] ?>'>
                                <div class="col">
                                    <div class="row mb-3">
                                        <div class="col"><label class="form-label">Name</label>
                                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="ext_name" name="name" value="<?= $ext_data['Name'] ?>" /></div>
                                            <label id="ext_name_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col pe-1"><label class="form-label">Age</label>
                                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="ext_age" name="age" value="<?= $ext_data['Age'] ?>" /></div>
                                            <label id="ext_age_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col ps-1"><label class="form-label">Birth date</label>
                                            <div class="input-group"><input class="form-control form-control-sm" type="date" id="ext_birthdate" name="birthday" value="<?= $ext_data['Birthday'] ?>" /></div>
                                            <label id="ext_birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-3 mb-3 gy-3 gy-md-0">
                                        <div class="col pe-sm-1"><label class="form-label">Sex</label><select class="form-select form-select-sm" id="ext_sex" name="sex">
                                                <?php if ($ext_data['Sex'] == 'Male') : ?>
                                                    <option value="" disabled>select ...</option>
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female">Female</option>
                                                <?php elseif ($ext_data['Sex'] == 'Female') : ?>
                                                    <option value="" disabled>select ...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female" selected>Female</option>
                                                <?php else : ?>
                                                    <option value="" selected disabled>select ...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col col-auto px-sm-1"><label class="form-label">Civil Status</label><select class="form-select form-select-sm" id="ext_cs" name="civil_status">
                                                <option value="" selected>select ...</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col ps-sm-1"><label class="form-label">Occupation</label>
                                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="ext_occ" name="occupation" value="<?= $ext_data['Occupation'] ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col"><label class="form-label">Address</label>
                                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="ext_address" name="address" value="<?= $ext_data['Address'] ?>" /></div>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2 mb-3 gy-3 gy-md-0">
                                        <div class="col pe-sm-1"><label class="form-label">Mobile No.</label>
                                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="ext_mob" name="mobile_no" value="<?= $ext_data['Mobile No.'] ?>" /></div>
                                            <label id="ext_mob_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col ps-sm-1"><label class="form-label">Tel No.</label>
                                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="ext_tel" name="tel_no" value="<?= $ext_data['Tel. No.'] ?>" /></div>
                                            <label id="ext_tel_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col pe-1"><label class="form-label">Weight</label>
                                            <div class="input-group input-weight"><input class="form-control form-control-sm" type="text" id="ext_weight" name="weight" value="<?= $ext_data['Weight'] ?>" />
                                                <span class="input-group-text span-text">kg</span>
                                            </div>
                                            <label id="ext_weight_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col ps-1"><label class="form-label">Height</label>
                                            <div class="input-group input-height"><input class="form-control form-control-sm" type="text" id="ext_height" name="height" value="<?= $ext_data['Height'] ?>" />
                                                <span class="input-group-text span-text">cm</span>
                                            </div>
                                            <label id="ext_height_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-sm btn-primary btn-default-blue" id="save_import" onclick="validateImport()" type="button">Save</button></div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-5 pt-4 pb-5">
                <div>
                    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
                        <?php if ($this->session->flashdata('message') == 'success') : ?>
                            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header toast-success">
                                    <strong class="me-auto">Success!</strong>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-opacity-50">
                                    <span>You successfully added a new patient.</span>
                                </div>
                            </div>
                        <?php elseif ($this->session->flashdata('message') == 'import-success') : ?>
                            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header toast-success">
                                    <strong class="me-auto">Success!</strong>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-opacity-50">
                                    <span>You successfully imported a patient.</span>
                                </div>
                            </div>
                        <?php elseif ($this->session->flashdata('message') == 'dlt_success') : ?>
                            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header toast-success">
                                    <strong class="me-auto">Success!</strong>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-opacity-50">
                                    <span>You successfully deleted a patient.</span>
                                </div>
                            </div>
                        <?php elseif ($this->session->flashdata('error-import')) : ?>
                            <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header toast-error">
                                    <strong class="me-auto">Error!</strong>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-opacity-50">
                                    <span><?= $this->session->flashdata('error-import'); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <table id="example" class="table table-hover" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="align-middle">ID</th>
                            <th class="col-md-4 align-middle">Name</th>
                            <th class="col-md-3 align-middle">Date Added</th>
                            <th class="col-md-1 align-middle text-center">Type</th>
                            <th class="text-center col-md-3 align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patients as $patient) : ?>
                            <div id="delete-dialog-<?= $patient->patient_id ?>" class="modal fade" role="dialog" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete a Patient</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-danger"></i>Are you sure you want to delete this patient?</p>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_patientrec/delete_patient/') . $patient->patient_id ?>" type="button">Confirm</a></div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var form_data = JSON.parse('<?= $form_data ?>');
</script>