<!-- <style>
    body {
        font-family: 'Roboto', sans-serif !important;
        height: 100vh;
        display: flex;
        background-color: #f0f0f0 !important;
        flex-direction: column;
    }

    * {
        margin: 0;
        padding: 0;
    }

    i {
        margin-right: 10px;
    }
</style> -->
<!-- Toasts -->
<div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
    <?php if ($this->session->flashdata('message') == 'edit-user-success') : ?>
        <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header toast-success">
                <strong class="me-auto">Success!</strong>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-opacity-50">
                <span>You successfully edited your profile details.</span>
            </div>
        </div>
    <?php elseif ($this->session->flashdata('message') == 'success-update-avatar') : ?>
        <div id="liveToast" class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header toast-success">
                <strong class="me-auto">Success!</strong>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-opacity-50">
                <span>You successfully updated your profile picture.</span>
            </div>
        </div>
    <?php elseif ($this->session->flashdata('error-upload')) : ?>
        <div id="liveToast" class="toast border-0 toast-error" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header toast-error">
                <strong class="me-auto">Error!</strong>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-opacity-50">
                <span><?= $this->session->flashdata('error-upload') ?></span>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="container-fluid mt-5">
    <!-- Start: first row -->
    <div class="row gy-3 row-cols-1 row-cols-lg-4 mb-4 dshb-main">
        <div class="col">
            <div class="card dashboard-cards border-0 h-100">
                <div class="card-body bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-notes-medical"></i>
                        <label for="" class="number-label">
                            <?= $patient_count ?>
                        </label>
                        <label for="" class="description-label">Total no. of Patient
                            Records</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card dashboard-cards border-0 h-100">
                <div class="card-body bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-archive"></i>
                        <label for="" class="number-label">
                            <?php
                            $sum_stockin = 0;
                            $sum_stockout = 0;
                            foreach ($inventory_stocks as $product) {
                                $sum_stockin += $product->stock_in;
                                $sum_stockout += $product->stock_out;
                            }
                            echo $sum_stockin + $sum_stockout;
                            ?>
                        </label>
                        <label for="" class="description-label">Total no. of Inventory
                            Items</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card dashboard-cards border-0 h-100">
                <div class="card-body bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-user-alt"></i>
                        <label for="" class="number-label">
                            <?= $users_count ?>
                        </label>
                        <label for="" class="description-label">Total no. of User
                            Accounts</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card dashboard-cards border-0 h">
                <div class="card-body bw-dashboard">
                    <div class="dash-inner-content">
                        <i class="fas fa-address-book"></i>
                        <label for="" class="number-label">
                            <?= $new_patient_count ?>
                        </label>
                        <label for="" class="description-label">Total no. of New Patients
                            today</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: first row -->
    <!-- Start: second row -->
    <div class="row gy-3 row-cols-1 row-cols-lg-3 mb-4">
        <div class="col col-lg-3">
            <div class="card shadow mb-4 profile-card">
                <div class="card-body text-center shadow profile-card">
                    <img class="mt-4 rounded-circle" style="width: 200px;" class="img-fluid" name="avatar" src="<?= base_url('/assets/img/profile-avatars/') . $user->avatar ?>"><br><br>
                    <label for="avatar">Hello, <br>
                        <?= $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name ?>
                    </label><br>
                    <label for="avatar" class="role">
                        <?= $user->role ?>
                    </label><br>
                    <div class="btn-group mt-3" role="group"><button class="btn btn-sm btn-light" type="button" data-bs-toggle="modal" data-bs-target="#mdl-uploadpic">Change Photo</button></div>
                    <div class="btn-group mt-3 mt-lg-2" role="group"><button class="btn btn-sm btn-light" style="width: 151.84px;" type="button" data-bs-toggle="modal" data-bs-target="#view-pers-info">View Profile</button></div>

                </div>
            </div>
        </div>
        <div class="col col-lg-6">
            <div class="card shadow mb-4 h-100 chart-body-red">
                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-red">
                    <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Patient's Age Range Overview</h6>
                </div>
                <div class="card-body mx-3 my-3">
                    <div class="chart-area">
                        <canvas id="sampleChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="col col-lg-3">
            <div class="card shadow mb-4 h-100 chart-body-violet">
                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-violet">
                    <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Patient Satisfaction</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <!-- <canvas class="align-items-center" id="satis_chart"></canvas> -->
                        <div id="satis_chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: second row -->
    <!-- Edit Info modal -->
    <div id="view-pers-info" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <?php $updateUserInfoPath = 'Doctors/edit_useracc/' . $admin_id; ?>
                <?= form_open($updateUserInfoPath, array('id' => 'edit_info')) ?>
                <div class="modal-header">
                    <h4 class="modal-title ms-3 fw-bolder text-body">Personal Information</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5 px-lg-5">
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">First Name</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="first_name" name="first_name" readonly value="<?= $user->first_name ?>" /></div>
                            <label id="firstName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Middle Name</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="middle_name" name="middle_name" readonly value="<?= $user->middle_name ?>" /></div>
                            <label id="middleName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Surname</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="last_name" name="last_name" readonly value="<?= $user->last_name ?>" /></div>
                            <label id="lastName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Username</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="text" id="username" name="username" readonly value="<?= $user->username ?>" /></div>
                            <label id="username_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Birth date</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="date" id="birth_date" name="birth_date" readonly value="<?= $user->birth_date ?>" /></div>
                            <label id="birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Contact No.</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="tel" id="cell_no" name="cell_no" readonly value="<?= $user->contact_no ?>" /></div>
                            <label id="cell_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Email</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="email" id="email" name="email" readonly value="<?= $user->email ?>" /></div>
                            <label id="email_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Password</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="password" id="password" name="password" readonly value="<?= $user->password ?>" /></div>
                            <label id="password_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2 mb-1 mb-lg-1">
                        <div class="col col-lg-5"><label class="col-form-label text-body">Confirm Password</label></div>
                        <div class="col col-lg-7">
                            <div class="input-group"><input class="form-control form-control-sm" type="password" id="confpass" name="confpass" readonly value="" /></div>
                            <label id="confpass_error" class="text-danger font-monospace" style="font-size:13px"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-dark" type="button" style="width: 85.52px;" onclick="editInfo()"><strong>Edit</strong>
                    </button><button class="btn btn-sm btn-default-blue btn-primary" onclick="validateForm()" type="button">Save</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- Upload photo modal -->
    <div id="mdl-uploadpic" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php $updatePhotoPath = 'Doctors/update_photo/' . $user->user_id; ?>
                <?= form_open_multipart($updatePhotoPath) ?>
                <div class="modal-header">
                    <h4 class="modal-title ms-3 fw-bolder">Upload Profile Picture</h4><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group"><input class="form-control form-control-sm" type="file" src="<?= base_url('/assets/img/profile-avatars/') . $user->avatar ?>" value="<?= base_url('/assets/img/profile-avatars/') . $user->avatar ?>" name="avatar" /></div>
                </div>
                <div class="modal-footer"><button class="btn btn-sm btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary btn-sm btn-default-blue" data-bs-dismiss="modal">Save</button></div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    
</div>






<!-- // ! BMI CHART -->
<!-- <div class="card shadow mb-4 h-100 chart-body-purp">
    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-purp">
        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Patient's BMI Overview</h6>
    </div>
    <div class="card-body mx-3 my-3 d-flex justify-content-center">
        <div class="chart-area">
            <canvas class=" align-items-center" id="sampleChart2"></canvas>
        </div>
    </div>
</div> -->
<script>
    var cData = JSON.parse('<?= $age_range_data; ?>');
    console.log(cData);

    let sampleChart = document.getElementById('sampleChart').getContext('2d');

    let ageRangeChart = new Chart(sampleChart, {
        type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data: {
            labels: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61-70', '71-80', '81-90', '91-100'],
            datasets: [{
                label: 'Age Range',
                data: cData.total,
                backgroundColor: [
                    "#cc001b",
                    "#100002",
                    "#a30015",
                    "#390007",
                    "#9b0014",
                    "#410008",
                    "#72000f",
                    "#6a000e",
                    "#a30015",
                    "#100002"
                ]
            }]
        },
        options: {
            legend: {
                display: false
            },
            responsive: true,
            scales: {
                y: {
                    display: true,
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        min: 0,
                        max: 100
                    },

                }
            }
        }
    });

    // var bmiData = JSON.parse('<?= $bmi_data; ?>');
    // console.log(bmiData);
    // let sampleChart2 = document.getElementById('sampleChart2').getContext('2d');
    // let bmiChart = new Chart(sampleChart2, {
    //     type: 'pie',
    //     data: {
    //         labels: ['Underweight, <18.5', 'Normal weight, 18.5–24.9', 'Overweight, 25–29.9', 'Obesity, BMI of 30 or greater'],
    //         datasets: [{
    //             label: 'BMI',
    //             data: [bmiData['underweight'], bmiData['normal'], bmiData['overweight'], bmiData['obese']],
    //             backgroundColor: [
    //                 "#115f9a",
    //                 "#1984c5",
    //                 "#22a7f0",
    //                 "#48b5c4",
    //                 "#76c68f",
    //                 "#a6d75b",
    //                 "#c9e52f",
    //                 "#d0ee11",
    //                 "#f4f100"
    //             ]
    //         }]
    //     },
    //     options: {
    //         legend: {
    //             display: true
    //         },
    //         responsive: false,
    //     }
    // })

    let sampleChart3 = document.getElementById('sampleChart3').getContext('2d');
    let satisfactionChart = new Chart(sampleChart3, {
        type: 'polarArea',
        data: {
            labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Unsatisfied', 'Very Unsatisfied'],
            datasets: [{
                label: 'Satisfaction',
                data: [59, 20, 42, 16, 4],
                backgroundColor: [
                    "#CB2B92",
                    "#FC3F93",
                    "#FE77FE",
                    "#8c0d49",
                    "#FF1696"
                ]
            }]
        },
        options: {
            legend: {
                display: true
            },
            responsive: true,
        }

    })
</script>


</body>