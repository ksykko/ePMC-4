
<div class="container-fluid patientrec-container">

    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-lg-inline-block patientrec-label">Schedule</h1>
        </div>
        <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
            <?php if ($this->session->flashdata('message') == 'success') : ?>
                <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header toast-success">
                        <strong class="me-auto">Success!</strong>
                        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-opacity-50">
                        <span>You successfully updated an appointment.</span>
                    </div>
                </div>
            <?php elseif ($this->session->flashdata('message') == 'dlt_success') : ?>
                <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header toast-success">
                        <strong class="me-auto">Success!</strong>
                        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-opacity-50">
                        <span>You successfully deleted a product.</span>
                    </div>
                </div>
            <?php elseif ($this->session->flashdata('edit_failed')) : ?>
                <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header toast-error">
                        <strong class="me-auto">Error!</strong>
                        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-opacity-50">
                        <span>You have failed in updating an appointment.</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="d-sm-flex d-md-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center ms-auto me-4"><a href="<?= base_url('Admin_schedule/index') ?>" class="btn px-3 me-4 btn-primary dbl-btn btn-default-blue" type="button"><i class="fas me-2 fa-arrow-left"></i><strong>Back</strong></a></div>
    </div>

    <?php foreach ($schedules as $schedule) : ?>
        <?php $updateAppointmentPath = 'Admin_appointment_reqs/update_appointment/' . $schedule->schedule_id ?>
        <?= form_open_multipart($updateAppointmentPath, array('id' => 'editAppointment')); ?>
        <div id="edit-appointment-<?= $schedule->schedule_id ?>" class="modal fade modal-dialog-scrollable" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ms-3 fw-bolder">Edit Appointment</h4><button class="btn-close shadow-none" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mx-5">
                        <hr size="5" />

                        <input type="hidden" name="modal_no" value="<?= $schedule->schedule_id ?>">
                        <div class="row mt-4 mb-2">
                            <div class="col-3"><label class="col-form-label">Patient ID:</label></div>
                            <div class="col-9">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- full_name -->
                                        <input class="form-control un_patient_id" type="text" id="un_patient_id" name="un_patient_id" value="<?= $schedule->un_patient_id ?>" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3"><label class="col-form-label">Patient's name:</label></div>
                            <div class="col-9">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- TODO: -->
                                        <input class="form-control" type="text" id="patient_name" name="patient_name" value="<?= $schedule->patient_name ?>" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3"><label class="col-form-label">Doctor's Name:</label></div>
                            <div class="col-9">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- TODO: -->
                                        <input class="form-control prod_dosage" type="text" id="doctor_name" name="doctor_name" value="<?= $schedule->doctor_name ?>" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3"><label class="col-form-label">Date and Time:</label></div>
                            <div class="col-9 col-sm-9">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- role -->
                                        <input class="form-control" type="text" id="date" name="date" value="<?= $schedule->date ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-3"><label class="col-form-label">Status:</label></div>
                            <div class="col-9 col-sm-9">
                                <div class="input-error">
                                    <div class="input-group">
                                        <!-- TODO: -->
                                        <select class="form-control" id="status" name="status">
                                            <option value="Pending" <?= $schedule->status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="Confirmed" <?= $schedule->status == 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                            <option value="Cancelled" <?= $schedule->status == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="item_id" class="item_id">
                    <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-sm btn-primary btn-modal" id="editAppointment" name="editAppointment" type="submit" style="background: #3269bf;">Save</button>
                    </div>    
                    
                    </div>
                </div>
            </div>
        </div>
        <?= form_close(); ?>
    <?php endforeach; ?>

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
                                    <span>You successfully confirmed an appointment.</span>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                    <table id="sched-list-tbl" class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="col-md-2 align-middle">Patient ID</th>
                                <th class="col-md-3 align-middle">Name</th>
                                <th class="col-md-3 align-middle">Doctor's Name</th>
                                <th class="col-md-2 align-middle">Date & Time</th>
                                <th class="col-md-1 align-middle">Status</th>
                                <th class="text-center col-md-1 align-middle">Action</th>
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

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#sched-list-tbl').DataTable({
            "processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.
            responsive: true,
            "order": [], //Initial no order.
            "ajax": {
                url: "<?php echo site_url("Admin_appointment_reqs/datatable") ?>",
                type: 'POST'
            },

            //Set column definition initialisation properties.
            
        });
        
    });
</script> -->