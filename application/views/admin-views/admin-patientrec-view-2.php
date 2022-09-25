
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="d-flex mb-3">
                        <div>
                            <h3 class="d-none d-sm-block">Patient Record</h3>
                        </div>
                        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4 p"><button class="btn px-3 btn-save-patient" type="button" data-bs-toggle="modal" data-bs-target="#prompt-modal" style="margin-right: 0px;"><i class="fas fa-save"></i><strong>&nbsp; Save</strong></button>
                            <div class="modal fade" role="dialog" tabindex="-1" id="prompt-modal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                        <div class="modal-body">
                                            <p><i class="typcn typcn-warning ms-3"></i>&nbsp;Are you sure you want to save changes?</p>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light btn-default" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-save-patient" type="button">Save</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center" style="padding-left: 0px;margin-left: 0px;"><a href="<?= base_url('Admin_patientrec/index') ?>" class="btn btn-back" type="button">Back</a></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold fs-5">Personal Information</p>
                                </div>
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                                    <div class="mb-3"><button class="btn btn-primary btn-sm btn-default-blue" type="button">Change Photo</button></div>
                                    <div class="row mb-2">
                                        <div class="col-4 col-lg-3 col-xl-3 col-xxl-2 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Name:</label></div>
                                        <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="full_name" value="<?= $patient->full_name ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 col-xxl-2 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Age:</label></div>
                                        <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="age" value="<?= $patient->age ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 col-sm-3 col-md-3 col-xl-3 col-xxl-2 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Birthdate:</label></div>
                                        <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="birth_date" value="<?= $patient->birth_date ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4 col-xxl-2 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Sex:</label></div>
                                        <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="sex" value="<?= $patient->sex ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-2 col-md-3 col-lg-4 col-xl-4 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Occupation:</label></div>
                                        <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="occupation" value="<?= $patient->occupation ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-2 col-md-3 col-xxl-3 d-xxl-flex justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Address:</label></div>
                                        <div class="col d-flex d-xxl-flex align-items-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" value="<?= $patient->address ?>" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0 fs-5">Contact Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-4 col-sm-2 col-lg-4 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Cellphone #:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="cell_no" value="<?= $patient->cell_no ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-2 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Telephone #</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="tel_no" value="<?= $patient->tel_no ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 col-sm-2 col-lg-3 col-xl-2 col-xxl-2 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="email" value="<?= $patient->email ?>" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0 fs-5">Emergency Contact</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-2 col-md-2 col-lg-4 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Name:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="ec_name" value="<?= $patient->ec_name ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-2 col-md-2 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Relationship:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="relationship" value="<?= $patient->relationship ?>" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 col-sm-2 col-md-2 col-xl-2 col-xxl-2 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Contact #:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="ec_contact_no" value="<?= $patient->ec_contact_no ?>" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold fs-5">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Blood Type:</strong></label><input class="form-control" type="text" id="blood" name="blood"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Pulse Rate:</strong></label><input class="form-control" type="email" id="pulse_rate" name="pulse_rate"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Systolic:</strong></label><input class="form-control" type="text" id="systolic" name="systolic"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Height:</strong></label><input class="form-control" type="text" id="height" name="height"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Diastolic:</strong></label><input class="form-control" type="text" id="diastolic" name="diastolic"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Weight:</strong></label><input class="form-control" type="text" id="weight" name="weight"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-4" id="card-prescription">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold fs-5">Prescription</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3"><textarea class="form-control text-area"></textarea></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-4" id="card-next-consultation">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold fs-5">Next Consultation</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col-xxl-12">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Date</strong></label><input class="form-control" type="text" id="diastolic-1" name="diastolic"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold fs-5">Lab Reports</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form>
                                        <div class="mb-3"><label class="form-label" for="signature"><strong>Signature</strong><br></label><textarea class="form-control" id="signature" rows="4" name="signature"></textarea></div>
                                        <div class="mb-3">
                                            <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Notify me about new replies</strong></label></div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0 fs-5">Objectives</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-2 col-md-2 col-lg-4 col-xl-3 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Name:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Relationship:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 col-sm-2 col-md-2 col-xl-2 col-xxl-2 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0 fs-5">Symptoms</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-2 col-md-2 col-lg-4 col-xl-3 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Name:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-xxl-3 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Relationship:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" readonly=""></div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 col-sm-2 col-md-2 col-xl-2 col-xxl-2 d-lg-flex d-xxl-flex align-items-lg-center justify-content-xxl-start align-items-xxl-center" style="text-align: left;"><label class="col-form-label fs-6\">Email:</label></div>
                                        <div class="col d-flex d-sm-flex d-lg-flex d-xxl-flex align-items-center align-items-sm-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                            <div class="input-group"><input class="form-control input-personal-info" type="text" name="address" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold fs-5">Lab Reports</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form>
                                                <div class="mb-3"><label class="form-label" for="signature"><strong>Signature</strong><br></label><textarea class="form-control" id="signature" rows="4" name="signature"></textarea></div>
                                                <div class="mb-3">
                                                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Notify me about new replies</strong></label></div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold fs-5">Lab Reports</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form>
                                                <div class="mb-3"><label class="form-label" for="signature"><strong>Signature</strong><br></label><textarea class="form-control" id="signature-1" rows="4" name="signature"></textarea></div>
                                                <div class="mb-3">
                                                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2"><strong>Notify me about new replies</strong></label></div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold fs-5">Lab Reports</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form>
                                                <div class="mb-3"><label class="form-label" for="signature"><strong>Signature</strong><br></label><textarea class="form-control" id="signature-2" rows="4" name="signature"></textarea></div>
                                                <div class="mb-3">
                                                    <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3"><strong>Notify me about new replies</strong></label></div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
