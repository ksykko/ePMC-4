<div class="container-fluid">
    <div class="d-flex mb-3">
        <div>
            <h3 class="d-none d-sm-block">Patient Record</h3>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p"><button id="btn-add-patient" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#modal-1" type="button"><i class="fas fa-plus-circle" style="font-size: 12px;"></i>   Add Patient Record</button>
            <?= form_open_multipart('Admin_patientrec/add_patient_validation'); ?>
            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add a Patient Record</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-bold">Personal Information</h5>
                            <hr size="5" />
                            <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Name:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- full_name -->
                                            <input class="form-control" type="text" id="full_name" name="full_name" value="<?= set_value('full_name'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Age:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="number" id="age" name="age" value="<?= set_value('age'); ?>" required min="1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Birth date:</label></div>
                                    <div class="col-6 col-sm-6">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="date" id="birthdate" name="birth_date" value="<?= set_value('birth_date'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Sex:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <select class="form-select" id="sex" name="sex" value="<?= set_value('sex'); ?>" required>
                                                <option value="select" selected>select...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Occupation:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="occupation" name="occupation" value="<?= set_value('occupation'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Address:</label></div>
                                    <div class="col">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="address" name="address" value="<?= set_value('address'); ?>" required />
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
                            <h4 class="modal-title">Add a Patient Record</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-bold">Contact Information</h5>
                            <hr size="5" />
                            <!-- <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div> -->
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Cellphone #:</label></div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="tel" id="cell_no" name="cell_no" value="<?= set_value('cell_no'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Telephone #:</label></div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="tel" id="tel_no" name="tel_no" value="<?= set_value('tel_no'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col"><label class="col-form-label">Email:</label></div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="email" id="email" name="email" value="<?= set_value('email'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <h5 class="heading-modal fw-bold mt-3">Emergency Contact</h5>
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-start align-items-center justify-content-md-start align-items-md-center justify-content-lg-start align-items-lg-center"><label class="col-form-label">Name:</label></div>
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="ec_name" name="ec_name" value="<?= set_value('ec_name'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-start align-items-center justify-content-md-start align-items-md-center"><label class="col-form-label">Relationship:</label></div>
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <select class="form-select" id="relationship" name="relationship" value="<?= set_value('relationship'); ?>" required>
                                                <option value selected>select...</option>
                                                <option value="father">Father</option>
                                                <option value="mother">Mother</option>
                                                <option value="grandparent">Grandparent</option>
                                                <option value="guardian">Guardian</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-start align-items-center justify-content-md-start align-items-md-center"><label class="col-form-label">Contact #:</label></div>
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <div class="input-group">
                                            <!-- TODO: -->
                                            <input class="form-control" type="text" id="ec_contact_no" name="ec_contact_no" value="<?= set_value('ec_contact_no'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-target="#modal-1" data-bs-toggle="modal">Back</button><button class="btn btn-primary btn-modal" type="submit" name="addPatient" style="background: #3269bf;">Save</button></div>
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
                                <th>Name</th>
                                <th class="text-center col-md-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patients as $patient) : ?>
                                <tr>
                                    <td><?= $patient->patient_id ?></td>
                                    <td><?= $patient->full_name ?></td>
                                    <td class="text-center d-xxl-flex justify-content-xxl-end align-items-xxl-center">
                                        <a class="btn btn-light mx-2" href="<?= base_url('Admin_patientrec/view_patient/') . $patient->patient_id ?>" type="button">View</a>
                                        <button class="btn btn-light mx-2" type="button">Edit</button>
                                        <a class="btn btn-link btn-sm btn-delete" href="<?= base_url('Admin_patientrec/delete_patient/') . $patient->patient_id ?>"><i class="far fa-trash-alt"></i></a>
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