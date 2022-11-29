<div class="container-fluid patientrec-container">



    <div class="d-flex mb-3">
        <div>
            <h1 class="patientrec-label">Audit Log</h1>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col">
            <div>
                <ul class="nav nav-tabs d-flex justify-content-end me-md-3" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#admin_audit">Admin</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#patient_audit">Patient</a></li>
                </ul>
                <div class="tab-content">
                    <div id="admin_audit" class="tab-pane active" role="tabpanel">
                        <p>Admin</p>
                    </div>
                    <div id="patient_audit" class="tab-pane" role="tabpanel">
                        <p>Patient</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-lg-12 col-xxl-12 mb-4">
            <div class="card shadow mb-4 p-5 pt-4 pb-5">
                <div>
                    <ul class="nav nav-tabs d-flex justify-content-end me-md-3" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#admin_audit">Admin</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#patient_audit">Patient</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="admin_audit" class="tab-pane fade show active" role="tabpanel">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="audit_log" class="table table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <!-- <th class="col-md-1">ID</th> -->
                                                <!-- Include avatar -->
                                                <th class="col-md-3 align-middle">Name</th>
                                                <th class="col-md-1">Role</th>
                                                <th>Activity</th>
                                                <th class="col-md-2">Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="patient_audit" class="tab-pane fade" role="tabpanel">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="patient_audit_log" class="table table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <!-- <th class="col-md-1">ID</th> -->
                                                <!-- Include avatar -->
                                                <th class="col-md-3 align-middle">Patient ID</th>
                                                <th class="col-md-1">Role</th>
                                                <th>Activity</th>
                                                <th class="col-md-2">Date & Time</th>
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
        </div>
    </div>





</div>