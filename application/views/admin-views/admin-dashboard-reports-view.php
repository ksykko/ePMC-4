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

<div class="container-fluid mt-5">
    <div class="row mb-3">
        <div class="col-lg-3">
            <div class="card mb-4 profile-card h-100">
                <div class="card-body text-center shadow profile-card">
                    <img style="width: 200px;" class="img-fluid" name="avatar" src="<?= base_url('/assets/img/avatars/avatar1.png') ?>"><br><br>
                    <label for="avatar">Hello, <br>
                        <?= $user_name ?>
                    </label><br>
                    <label for="avatar" class="role">
                        <?= $user_role ?>
                    </label><br>
                </div>
            </div>
            <!-- <div class="card shadow mb-4">
                <div class="card-header py-3 ch-patientrec">
                </div>
                <div class="card-body mx-3">
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header py-3 ch-patientrec">
                </div>
                <div class="card-body mx-3">

                </div>
            </div> -->
        </div>

        <div class="col gy-3 gy-md-3 gy-lg-0">
            <div class="row gy-3 gy-md-3 row-cols-1 row-cols-lg-4 dshb-main">
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

            <div class="row gy-3 gy-md-3 row-cols-1 row-cols-lg-4 mt-3">
                <div class="col-lg-7 col-xl-8">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                            <h6 class="fw-bold fs-5 m-0 ch-heading">Patient's Age Range Overview</h6>
                        </div>
                        <div class="card-body mx-3 my-3">
                            <div class="chart-area">
                                <canvas id="sampleChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                            <h6 class="fw-bold fs-5 m-0 ch-heading">Patient Satisfaction</h6>
                        </div>
                        <div class="card-body mx-3 my-3 d-flex justify-content-center">
                            <div class="chart-area">
                                <canvas class="align-items-center" id="sampleChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-3 gy-md-3 row-cols-1 row-cols-lg-4 mt-3">
                <div class="col-lg-7 col-xl-8">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                            <h6 class="fw-bold fs-5 m-0 ch-heading">User Activity</h6>
                        </div>
                        <div class="card-body mx-3 my-3">
                            <div class="chart-area">
                                <canvas id="sampleChart4"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                            <h6 class="fw-bold fs-5 m-0 ch-heading">Patients' Sex Overview</h6>
                        </div>
                        <div class="card-body mx-3 my-3 d-flex justify-content-center">
                            <div class="chart-area">
                                <canvas class=" align-items-center" id="sampleChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row gy-3 gy-md-3 row-cols-1 row-cols-lg-4 mt-3">
                <div class="col-lg-12 col-xl-12">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                            <h6 class="fw-bold fs-5 m-0 ch-heading">Recent Activity</h6>
                        </div>
                        <div class="card-body mx-3 ">
                            <table id="recent_activity_table" class="table table-hover d-column w-100  ">
                                <thead>
                                    <tr>
                                        <th class="inv-td">Activity</th>
                                        <th class="inv-td">Date</th>
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
    
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3 ch-patientrec">
        </div>
        <div class="card-body mx-3">
        </div>
    </div> -->

</div>

<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 col-xl-8">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                    <h6 class="fw-bold fs-5 m-0 ch-heading">Age Range of Patients</h6>
                </div>
                <div class="card-body mx-5 my-5">
                    <div class="chart-area">
                        <canvas id="sampleChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-4">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Revenue Sources</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#"> Action</a><a class="dropdown-item" href="#"> Another action</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"> Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area"><canvas height="360" width="334" style="display: block; height: 320px; width: 297px;"></canvas></div>
                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i> Direct</span><span class="me-2"><i class="fas fa-circle text-success"></i> Social</span><span class="me-2"><i class="fas fa-circle text-info"></i> Refferal</span></div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="box-wrapper bw-dashboard">

    <label class="recent-act-label" for="" style="margin-left: 20px;"><br>Recent Activity<br></label>
    <div class="dash-inner-content">
    </div>
</div>
</main>
</div>
</div> -->

<script>
    var cData = JSON.parse('<?= $chart_data; ?>');
    console.log(cData);

    let sampleChart = document.getElementById('sampleChart').getContext('2d');

    let ageRangeChart = new Chart(sampleChart, {
        type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data: {
            labels: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61-70', '71-80', '81-90', '91-100'],
            datasets: [{
                label: 'Age Range',
                data: cData,
                backgroundColor: [
                    "#115f9a",
                    "#1984c5",
                    "#22a7f0",
                    "#48b5c4",
                    "#76c68f",
                    "#a6d75b",
                    "#c9e52f",
                    "#d0ee11",
                    "#f4f100"
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

    let sampleChart2 = document.getElementById('sampleChart2').getContext('2d');
    let satisfactionChart = new Chart(sampleChart2, {
        type: 'polarArea',
        data: {
            labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Unsatisfied', 'Very Unsatisfied'],
            datasets: [{
                label: 'Satisfaction',
                data: [59, 20, 42, 16, 4],
                backgroundColor: [
                    "#115f9a",
                    "#1984c5",
                    "#22a7f0",
                    "#48b5c4",
                    "#76c68f",
                    "#a6d75b",
                    "#c9e52f",
                    "#d0ee11",
                    "#f4f100"
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

    var genderData = JSON.parse('<?= $gender_data; ?>');
    console.log(genderData);

    let sampleChart3 = document.getElementById('sampleChart3').getContext('2d');
    let genderChart = new Chart(sampleChart3, {
        type: 'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Sex',
                data: [genderData['male'], genderData['female']],
                backgroundColor: [
                    "#115f9a",
                    "#1984c5",
                    "#22a7f0",
                    "#48b5c4",
                    "#76c68f",
                    "#a6d75b",
                    "#c9e52f",
                    "#d0ee11",
                    "#f4f100"
                ]
            }]
        }
    })

    let sampleChart4 = document.getElementById('sampleChart4').getContext('2d');
    let userActChart = new Chart(sampleChart4, {
        type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'User Activity',
                data: [12, 19, 3, 5, 2, 3, 1, 2, 3, 4, 5, 6],
                backgroundColor: [
                    "#115f9a",
                    "#1984c5",
                    "#22a7f0",
                    "#48b5c4",
                    "#76c68f",
                    "#a6d75b",
                    "#c9e52f",
                    "#d0ee11",
                    "#f4f100"
                ]
            }]
        },
    })
</script>


</body>