<div class="container-fluid">
    <div class="d-flex mb-3">
        <div>
            <h3 class="d-none d-sm-block">Patient Record</h3>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p"><button id="btn-add-patient" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#modal-1" type="button"><i class="fas fa-plus-circle" style="font-size: 12px;"></i>   Add Patient Record</button>
            <div id="modal-1" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add a Patient Record</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-5">
                            <h5 class="heading-modal fw-bold">Personal Information</h5>
                            <hr size="5" />
                            <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div>
                            <form>
                                <div class="row mt-4 mb-2">
                                    <div class="col"><label class="col-form-label">Name:</label></div>
                                    <div class="col">
                                        <div class="input-group"><input class="form-control" type="text" name="full_name" required /></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Age:</label></div>
                                    <div class="col">
                                        <div class="input-group"><input class="form-control" type="number" name="age" required min="1" /></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Birth date:</label></div>
                                    <div class="col-6 col-sm-6">
                                        <div class="input-group"><input class="form-control" type="date" name="birth_date" required /></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Sex:</label></div>
                                    <div class="col">
                                        <div class="input-group"><select class="form-select" required>
                                                <option value="select" selected>select...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Occupation:</label></div>
                                    <div class="col">
                                        <div class="input-group"><input class="form-control" type="text" name="occupation" required /></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Address:</label></div>
                                    <div class="col">
                                        <div class="input-group"><input class="form-control" type="text" name="address" required /></div>
                                    </div>
                                </div>
                            </form>
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
                            <div class="alert alert-warning" role="alert"><span><strong>Alert</strong> text.</span></div>
                            <form>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Cellphone #:</label></div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="input-group"><input class="form-control" type="tel" name="cell_no" required /></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col"><label class="col-form-label">Telephone #:</label></div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="input-group"><input class="form-control" type="tel" name="tel_no" required /></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col"><label class="col-form-label">Email:</label></div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="input-group"><input class="form-control" type="email" name="email" required /></div>
                                    </div>
                                </div>
                                <div class="row mt-4 mb-3">
                                    <div class="col d-lg-flex justify-content-lg-start align-items-lg-center"><label class="col-form-label fw-semibold">Emergency Contact</label></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-start align-items-center justify-content-md-start align-items-md-center justify-content-lg-start align-items-lg-center"><label class="col-form-label">Name:</label></div>
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <div class="input-group"><input class="form-control" type="text" name="ec_name" required /></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 d-flex justify-content-start align-items-center justify-content-md-start align-items-md-center"><label class="col-form-label">Relationship:</label></div>
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <div class="input-group"><select class="form-select">
                                                <option value selected>select...</option>
                                                <option value="father">Father</option>
                                                <option value="mother">Mother</option>
                                                <option value="grandparent">Grandparent</option>
                                                <option value="guardian">Guardian</option>
                                                <option value="others">Others</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-start align-items-center justify-content-md-start align-items-md-center"><label class="col-form-label">Contact #:</label></div>
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <div class="input-group"><input class="form-control" type="text" name="ec_contact_no" required /></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-target="#modal-1" data-bs-toggle="modal">Back</button><button class="btn btn-primary btn-modal" type="button" style="background: #3269bf;">Save</button></div>
                    </div>
                </div>
            </div>
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
                                        <button class="btn btn-light mx-2" type="button">View</button>
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