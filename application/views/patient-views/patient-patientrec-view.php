<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-sm-block patientrec-label">Patient Record</h1>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto"><button class="btn px-3 me-4 btn-dark btn-default w-auto" type="button" data-bs-toggle="modal" data-bs-target="#mdl-personal-info"><i class="fas fa-edit me-lg-1"></i><strong class="d-none d-lg-inline-block">Edit Personal Info</strong></button>
            <div id="mdl-personal-info" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-dialog modal-lg" role="document">
                        <?php if ($patient->type == 'import') : ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title ms-3 fw-bolder">Edit Patient's Personal Information</h4><button id="closeFormModal" class="btn-close me-1 shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <?php $updatePatientInfoPath = 'Patient_patientrec/edit_patient/' . $patient->patient_id; ?>
                                <?= form_open($updatePatientInfoPath, array('id' => 'editPatient')); ?>
                                <div class="modal-body mx-5">

                                    <!-- One "tab" for each step in the form: -->
                                    <div class="tab">
                                        <h5 class="heading-modal fw-semibold">Personal Information</h5>
                                        <hr size="5" />
                                        <div class="row mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Name</label>
                                                <input class="form-control form-control-sm" type="text" id="first_name" name="first_name" value="<?= $patient->first_name ?>" /><small class="text-danger"><?= form_error('first_name') ?></small>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Age</label>
                                                <input class="form-control form-control-sm" type="text" id="age" name="age" value="<?= $patient->age ?>" /><small class="text-danger"><?= form_error('age') ?></small>
                                                <label id="age_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                            <div class="col form-group px-1"><label class="form-label">Birth date</label>
                                                <input class="form-control form-control-sm" id="birth_date" name="birth_date" type="date" value="<?= $patient->birth_date ?>" /><small class="text-danger"><?= form_error('birth_date') ?></small>
                                                <label id="birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Sex</label><select class="form-select form-select-sm" id="sex" name="sex">
                                                    <?php if ($patient->sex == 'Male') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Male" selected>Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php elseif ($patient->sex == 'Female') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female" selected>Female</option>
                                                    <?php else : ?>
                                                        <option value="" selected disabled>select ...</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php endif; ?>
                                                </select><small class="text-danger"><?= form_error('sex') ?></small></div>
                                            <div class="col form-group px-1"><label class="form-label">Civil Status</label><select class="form-select form-select-sm" id="civil_status" name="civil_status">
                                                    <?php if ($patient->civil_status == 'Single') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single" selected>Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Married') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married" selected>Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Divorced') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced" selected>Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Separated') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated" selected>Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Widowed') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed" selected>Widowed</option>
                                                    <?php else : ?>
                                                        <option value="" selected>select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php endif; ?>
                                                </select><small class="text-danger"><?= form_error('civil_status') ?></small></div>
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
                                            <div class="col form-group px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm" type="tel" id="cell_no" name="cell_no" value="<?= $patient->cell_no ?>" />
                                                <label id="cell_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                            <div class="col form-group px-1"><label class="form-label">Telephone No.</label><input class="form-control form-control-sm" type="tel" id="tel_no" name="tel_no" value="<?= $patient->tel_no ?>" />
                                                <label id="tel_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Email</label><input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="name@example.com" value="<?= $patient->email ?>" /><small class="text-danger"><?= form_error('email') ?></small>
                                                <label id="email_error" class="text-danger font-monospace" style="font-size:13px"></label>
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
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father" selected>Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Mother') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother" selected>Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Sibling') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling" selected>Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Child') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child" selected>Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Spouse') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse" selected>Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Grandparent') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent" selected>Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Guardian') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian" selected>Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Other') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other" selected>Other</option>
                                                    <?php else : ?>
                                                        <option value="" selected disabled>select ...</option>
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
                        <?php else : ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title ms-3 fw-bolder">Edit Patient's Personal Information</h4><button id="closeFormModal" class="btn-close me-1 shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <?php $updatePatientInfoPath = 'Patient_patientrec/edit_patient/' . $patient->patient_id; ?>
                                <?= form_open($updatePatientInfoPath, array('id' => 'editPatient')); ?>
                                <div class="modal-body mx-5">

                                    <!-- One "tab" for each step in the form: -->
                                    <div class="tab">
                                        <h5 class="heading-modal fw-semibold">Personal Information</h5>
                                        <hr size="5" />
                                        <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                            <div class="col form-group col-md-5 px-1"><label class="form-label">First Name</label>
                                                <input class="form-control form-control-sm" type="text" id="first_name" name="first_name" value="<?= $patient->first_name ?>" /><small class="text-danger"><?= form_error('first_name') ?></small>
                                                <span id="fullName_result"></span>
                                                <label id="firstName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                            <div class="col form-group col-md-4 px-1"><label class="form-label">Middle Name</label>
                                                <input class="form-control form-control-sm" type="text" id="middle_name" name="middle_name" value="<?= $patient->middle_name ?>" /><small class="text-danger"><?= form_error('middle_name') ?></small>
                                                <label id="middleName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                            <div class="col form-group col-md-3 px-1"><label class="form-label">Surname</label>
                                                <input class="form-control form-control-sm" type="text" id="last_name" name="last_name" value="<?= $patient->last_name ?>" /><small class="text-danger"><?= form_error('last_name') ?></small>
                                                <label id="lastName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Age</label>
                                                <input class="form-control form-control-sm" type="text" id="age" name="age" value="<?= $patient->age ?>" /><small class="text-danger"><?= form_error('age') ?></small>
                                                <label id="age_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                            <div class="col form-group px-1"><label class="form-label">Birth date</label>
                                                <input class="form-control form-control-sm" id="birth_date" name="birth_date" type="date" value="<?= $patient->birth_date ?>" /><small class="text-danger"><?= form_error('birth_date') ?></small>
                                                <label id="birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col form-group col-md-3 px-1"><label class="form-label">Sex</label><select class="form-select form-select-sm" id="sex" name="sex">
                                                    <?php if ($patient->sex == 'Male') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Male" selected>Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php elseif ($patient->sex == 'Female') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female" selected>Female</option>
                                                    <?php else : ?>
                                                        <option value="" selected disabled>select ...</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    <?php endif; ?>
                                                </select><small class="text-danger"><?= form_error('sex') ?></small></div>
                                            <div class="col form-group px-1"><label class="form-label">Civil Status</label><select class="form-select form-select-sm" id="civil_status" name="civil_status">
                                                    <?php if ($patient->civil_status == 'Single') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single" selected>Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Married') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married" selected>Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Divorced') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced" selected>Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Separated') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated" selected>Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php elseif ($patient->civil_status == 'Widowed') : ?>
                                                        <option value="">select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed" selected>Widowed</option>
                                                    <?php else : ?>
                                                        <option value="" selected>select ...</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    <?php endif; ?>
                                                </select><small class="text-danger"><?= form_error('civil_status') ?></small></div>
                                            <div class="col form-group px-1"><label class="form-label">Occupation</label><input class="form-control form-control-sm" type="text" id="occupation" name="occupation" value="<?= $patient->occupation ?>" /></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Address</label>
                                                <input class="form-control form-control-sm" type="text" id="address" name="address" value="<?= $patient->address ?>" />
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
                                            <div class="col form-group px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm" type="tel" id="cell_no" name="cell_no" value="<?= $patient->cell_no ?>" placeholder="09xxxxxxxxx" />
                                                <label id="cell_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                            <div class="col form-group px-1"><label class="form-label">Telephone No.</label><input class="form-control form-control-sm" type="tel" id="tel_no" name="tel_no" value="<?= $patient->tel_no ?>" />
                                                <label id="tel_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Email</label><input class="form-control form-control-sm" type="email" id="email" name="email" placeholder="name@example.com" value="<?= $patient->email ?>" />
                                                <label id="email_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab">
                                        <h5 class="heading-modal fw-semibold">Emergency Contact</h5>
                                        <hr size="5" />
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mb-2">
                                            <div class="col form-group px-1"><label class="form-label">Name</label><input class="form-control form-control-sm" type="text" id="ec_name" name="ec_name" value="<?= $patient->ec_name ?>" /></div>
                                            <div class="col form-group px-1"><label class="form-label">Relationship</label><select class="form-select form-select-sm" id="relationship" name="relationship">
                                                    <?php if ($patient->relationship == 'Father') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father" selected>Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Mother') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother" selected>Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Sibling') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling" selected>Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Child') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child" selected>Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Spouse') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse" selected>Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Grandparent') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent" selected>Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Guardian') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian" selected>Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif ($patient->relationship == 'Other') : ?>
                                                        <option value="" disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other" selected>Other</option>
                                                    <?php else : ?>
                                                        <option value="" selected disabled>select ...</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Other">Other</option>
                                                    <?php endif; ?>
                                                </select></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col form-group px-1 col-md-6"><label class="form-label">Contact No.</label>
                                                <input class="form-control form-control-sm" type="tel" id="ec_contact_no" name="ec_contact_no" value="<?= $patient->ec_contact_no ?>" />
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center"><a class="btn px-3 me-4 btn-primary dbl-btn w-auto btn-default-blue" type="button" data-bs-target="#prompt-back-modal" data-bs-toggle="modal"><i class="fas fa-arrow-left me-lg-1"></i><strong class="d-none d-lg-inline-block">Back</strong></a>
            <div id="prompt-back-modal" class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title"></h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-xxl-flex justify-content-xxl-center">
                            <p><i class="typcn typcn-warning me-2"></i>Any unsaved changes will not be saved.</p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Cancel</button><a href="<?= base_url('Patient/') ?>" class="btn btn-sm btn-primary btn-default-blue" role="button">Confirm</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
        <?php if ($this->session->flashdata('message') == 'success-profilepic') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>Your profile picture has been updated.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'success-healthinfo') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>Your health information has been updated.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('message') == 'success-edit-patient-PI') : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header toast-success">
                    <strong class="me-auto">Success!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>Your personal information has been updated.</span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('error-profilepic')) : ?>
            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header text-bg-danger bg-opacity-100">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>Your profile picture has not been updated. <?= $this->session->flashdata('error') ?></span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('error') == 'error-upload') : ?>
            <div id="liveToast" class="toast toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header text-bg-danger bg-opacity-100">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <?php $errors = $this->session->flashdata('error') ?>
                    <span><?= $errors ?></span>
                </div>
            </div>
        <?php elseif ($this->session->flashdata('error-doc')) : ?>
            <div id="liveToast" class="toast toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header text-bg-danger bg-opacity-100">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span>Invalid input/s.</span>
                </div>
            </div>
        <?php endif; ?>
    </div>

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
                                    <?php $updatePatientPath = 'Patient_patientrec/update_profilepic/' . $patient->patient_id; ?>
                                    <?= form_open_multipart($updatePatientPath, array('id' => 'healthForm')); ?>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title ms-3 fw-bolder">Upload Profile Picture</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group"><input class="form-control form-control-sm" type="file" src="<?= base_url('/assets/img/profile-avatars/') . $patient->avatar ?>" value="<?= base_url('/assets/img/profile-avatars/') . $patient->avatar ?>" name="avatar" /></div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-default-blue" data-bs-dismiss="modal" name="editPatient" type="submit">Save</button></div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mx-3">
                            <div class="row mb-2">
                                <div class="col-4 col-md-2 col-lg-3 col-xl-3 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6">Name:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="full_name" readonly value="<?= ($patient->first_name) ? $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name : 'N/A' ?>" /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6">Age:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="age" readonly value="<?= ($patient->age) ? $patient->age : 'N/A' ?>" /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-sm-2 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Birthdate:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="birth_date" readonly value="<?= ($patient->birth_date == '0000-00-00') ? 'N/A' : $patient->birth_date ?>" /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-sm-3 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Sex:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="sex" readonly value="<?= ($patient->sex) ? $patient->sex : 'N/A' ?>" /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 col-sm-3 col-md-2 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Occupation:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="occupation" readonly value="<?= ($patient->occupation) ? $patient->occupation : 'N/A' ?>" /></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 col-sm-3 col-md-2 col-lg-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Address:</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                    <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="address" readonly value="<?= ($patient->address) ? $patient->address : 'N/A' ?>" /></div>
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
                                <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="address" readonly value="<?= ($patient->cell_no) ? $patient->cell_no : 'N/A' ?>" /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 col-sm-2 col-lg-5 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Telephone #:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="address" readonly value="<?= ($patient->tel_no) ? $patient->tel_no : 'N/A' ?>" /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 col-sm-2 col-md-2 col-lg-3 col-xl-4 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="address" readonly value="<?= ($patient->email) ? $patient->email : 'N/A' ?>" /></div>
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
                                <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="address" readonly value="<?= ($patient->ec_name) ? $patient->ec_name : 'N/A' ?>" /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 col-sm-3 col-md-2 col-lg-5 col-xl-4 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Relationship:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="address" readonly value="<?= ($patient->relationship) ? $patient->relationship : 'N/A' ?>" /></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3 col-sm-2 col-md-1 col-lg-4 col-xl-4 col-xxl-4 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                            <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                <div class="input-group"><input class="form-control form-control-sm input-personal-info" type="text" name="address" readonly value="<?= ($patient->ec_contact_no) ? $patient->ec_contact_no : 'N/A' ?>" /></div>
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
                                            <div class="mb-3"><label class="form-label" for="username"><strong>Blood Type:</strong></label><small class="text-danger"><?= form_error('blood_type') ?></small>
                                                <input type="text" class="form-control" name="blood_type" readonly value="<?= ($healthinfo->blood_type) ? $healthinfo->blood_type : 'N/A' ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="pulse_rate"><strong>Pulse Rate:</strong></label>
                                                <div class="input-group"><input class="form-control rounded-end-sm" type="text" name="pulse_rate" readonly value="<?= ($healthinfo->pulse_rate == NULL || $healthinfo->pulse_rate == '0') ? 'N/A' : $healthinfo->pulse_rate ?>" /><span class="input-group-text d-none d-md-inline-block">bpm</span></div>
                                                <small class="text-danger"><?= form_error('pulse_rate') ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="bp_systolic"><strong>Systolic:</strong></label>
                                                <div class="input-group"><input class="form-control rounded-end-sm" type="text" name="bp_systolic" readonly value="<?= ($healthinfo->bp_systolic == NULL || $healthinfo->bp_systolic == '0') ? 'N/A' : $healthinfo->bp_systolic ?>" /><span class="input-group-text d-none d-md-inline-block">mmHg</span></div>
                                            </div>
                                            <small class="text-danger"><?= form_error('bp_systolic') ?></small>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="height"><strong>Height:</strong></label>
                                                <div class="input-group"><input class="form-control rounded-end-sm" type="text" name="height" readonly value="<?= ($healthinfo->height == NULL || $healthinfo->height == '0') ? 'N/A' : $healthinfo->height ?>" /><span class="input-group-text d-none d-md-inline-block">cm</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="bp_diastolic"><strong>Diastolic:</strong></label>
                                                <div class="input-group"><input class="form-control rounded-end-sm" type="text" name="bp_diastolic" readonly value="<?= ($healthinfo->bp_diastolic == NULL || $healthinfo->bp_diastolic == '0') ? 'N/A' : $healthinfo->bp_diastolic ?>" /><span class="input-group-text d-none d-md-inline-block">mmHg</span></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="weight"><strong>Weight:</strong></label>
                                                <div class="input-group"><input class="form-control rounded-end-sm" type="text" name="weight" readonly value="<?= ($healthinfo->weight == NULL || $healthinfo->weight == '0') ? 'N/A' : $healthinfo->weight ?>" /><span class="input-group-text d-none d-md-inline-block">kg</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="card-prescription" class="card shadow mb-4" style="height: 540px;">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 ch-patientrec add-header">
                                    <div class="d-flex">
                                        <div class="me-auto">
                                            <h6 class="m-0 fw-bold fs-5 ch-heading">Prescription</h6>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-success btn-save-patient" onclick="printPage()" type="button"><i class="typcn typcn-document-add"></i><span class="span-add-diagnosis d-md-inline-block d-none">Print</span></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="print_prescription" class="card-body mx-3">
                                    <div class="mb-2"><textarea class="form-control text-area" id="prescription" name="prescription" style="height: 426px;" readonly><?= $healthinfo->prescription ?></textarea></div>
                                </div>
                            </div>
                        </div>
                        <div id="card-next-consultation" class="card shadow mb-4" style="height: 249px">
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
                                        <div class="mb-3"><label class="form-label" for="consul_next"><strong>Date</strong></label><input id="consul_next" class="form-control" name="consul_next" value="<?= $consul_next ?>  <?= $consul_time ?>" readonly /></div>
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
    <div class="row mb-4">
        <div class="col">
            <div id="accordion-1" class="accordion" role="tablist">
                <div class="accordion-item">
                    <div>
                        <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed bd-highlight fw-bold fs-5 ch-heading" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-1" aria-expanded="true" aria-controls="accordion-1 .item-1">Documents</button></h2>
                    </div>
                    <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body mx-3">
                            <div class="row">
                                <?php foreach ($documents as $document) : ?>
                                    <?php if ($document->doc_name == NULL || $document->document == NULL) : continue ?>
                                    <?php else : ?>
                                        <div class="col p-4 col-sm-6 col-md-4 col-lg-3">
                                            <div class="card shadow">
                                                <?php
                                                $fileExt = pathinfo($document->document, PATHINFO_EXTENSION);
                                                if ($fileExt == 'pdf') {
                                                    $thumbnail = base_url('/assets/img/others/pdf-thumbnail.png');
                                                } else {
                                                    $thumbnail = base_url('/uploads/') . $document->patient_id . '/' . $document->document;
                                                }
                                                ?>
                                                <img class="card-img-top w-100 d-block" src="<?= $thumbnail ?>" height="150px" />
                                                <div class="card-body">
                                                    <h5><?= $document->doc_name ?></h5>
                                                    <div class="d-xl-flex d-xxl-flex justify-content-xl-between justify-content-xxl-between">
                                                        <small>file_name</small>
                                                        <small>size: </small>
                                                    </div>
                                                    <div class="btn-group btn-group-sm d-flex justify-content-center align-items-center mt-4" role="group"><button class="btn btn-light fw-semibold" type="button" data-bs-toggle="modal" data-bs-target="#view-doc-<?= $document->id ?>"><span class="d-none d-xxl-inline-block">View</span><svg class="text-muted ms-lg-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor">
                                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                <path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"></path>
                                                            </svg>
                                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                            <path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path>
                                                            </svg>
                                                        </button><a class="btn btn-light fw-semibold" type="button" href="<?= base_url('Admin_patientrec/download_document/') . $document->patient_id . '/' . $document->id ?>"><span class="d-none d-xxl-inline-block">Download</span><svg class="text-muted ms-lg-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                <path d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path>
                                                            </svg></a></div>
                                                </div>
                                            </div>
                                            <div id="view-doc-<?= $document->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title ms-3 fw-bolder"><?= $document->doc_name ?></h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body d-xl-flex justify-content-xl-center align-items-xl-center"><img class="img-fluid" src="<?= base_url('/uploads/') . $document->patient_id . '/' . $document->document ?>" /></div>
                                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="delete-doc-<?= $document->id ?>" class="modal fade" role="dialog" tabindex="-1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title ms-3 fw-bolder">Delete a Document</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="d-md-flex justify-content-md-center align-items-md-center"><i class="fa fa-warning me-1 text-danger"></i>Are you sure you want to delete this document?</p>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-danger" href="<?= base_url('Admin_patientrec/delete_document/') . $document->patient_id . '/' . $document->id ?>" type="button">Confirm</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>

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
                            <h6 class="bd-highlight fw-bold fs-5 ch-heading">Diagnoses</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-3 pt-4 pb-5">
                    <div class="row">
                        <div class="col">
                            <div>
                                <table id="diag_table" class="table table-hover" style="width: 100%">
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
                                                        <div class="modal-body mx-sm-5">
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-3 col-sm-4"><label class="col-form-label">Diagnosis:</label></div>
                                                                <div class="col">
                                                                    <div class="input-group"><textarea class="form-control" id="p_recent_diagnosis" name="p_recent_diagnosis" style="height: 250px;" readonly><?= $diagnosis->p_recent_diagnosis ?></textarea></div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-3 col-sm-4"><label class="col-form-label">Doctor:</label></div>
                                                                <div class="col">
                                                                    <div class="input-error">
                                                                        <div class="input-group">
                                                                            <input class="form-control" type="text" id="p_doctor" name="p_doctor" value="<?= $diagnosis->p_doctor ?>" readonly />
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
                <div class="card-header py-3 ch-patientrec ch-patientdiag">
                    <div class="d-flex">
                        <div class="me-auto">
                            <h6 class="bd-highlight fw-bold fs-5 ch-heading">Treatment Plan</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-3">
                    <div class="row">
                        <div class="col">
                            <div>
                                <table id="treatment_plan_table" class="table table-hover" style="width: 100%">
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
                                                        <div class="modal-body mx-sm-5">
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-3 col-sm-4"><label class="col-form-label">Diagnosis:</label></div>
                                                                <div class="col">
                                                                    <div class="input-group"><textarea class="form-control" id="p_diagnosis" name="p_diagnosis" style="height: 250px;" disabled><?= $treatment->p_diagnosis ?></textarea></div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4 mb-2">
                                                                <div class="col col-3 col-sm-4"><label class="col-form-label">Treatment Plan:</label></div>
                                                                <div class="col">
                                                                    <div class="input-group"><textarea class="form-control" id="p_treatment_plan" name="p_treatment_plan" style="height: 250px;" disabled><?= $treatment->p_treatment_plan ?></textarea></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
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
                        <table id="consul_table" class="table table-hover" style="width: 100%">
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