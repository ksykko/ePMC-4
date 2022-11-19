<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-lg-inline-block patientrec-label">Archives</h1>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4"><a href="<?= ($user_role == 'Doctor') ? base_url('Doctor_patientrec/index') : base_url('Admin_patientrec/index') ?>" class="btn px-3 me-4 btn-primary dbl-btn btn-default-blue" type="button"><i class="fas me-2 fa-arrow-left"></i><strong>Back</strong></a></div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-5 pt-4 pb-5">
                <div>
                    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
                        <?php if ($this->session->flashdata('message') == 'rstr_success') : ?>
                            <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">

                                <div class="toast-header text-bg-success bg-opacity-75">
                                    <strong class="me-auto">Success!</strong>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-opacity-50">
                                    <span>You successfully restore a patient record.</span>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                    <table id="example" class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="align-middle">ID</th>
                                <th class="col-md-4 align-middle">Name</th>
                                <th class="col-md-3 align-middle">Date Deleted</th>
                                <th class="text-center col-md-3 align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patients as $patient) : ?>
                                <div id="restore-patient-<?= $patient->patient_id ?>" class="modal fade" role="dialog" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="d-md-flex justify-content-md-center align-items-md-center">Are you sure you want to restore this patient?</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-light btn-sm" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-sm btn-info" href="<?= base_url('Admin_archives/restore_patient/') . $patient->patient_id ?>" type="button">Confirm</a></div>
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