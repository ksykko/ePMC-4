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
            <div class="card mb-4 profile-card">
                <div class="card-body text-center shadow profile-card mt-5">
                    <img style="width: 200px;" class="img-fluid rounded-circle" name="avatar" src="<?= base_url('/assets/img/profile-avatars/') . $avatar ?>"><br><br>
                    <label for="avatar">Hello, <br>
                        <?= 'Dr. ' . $full_name ?>
                    </label><br>
                    <label for="avatar" class="role">
                        <?= $specialization ?>
                    </label><br>
                </div>
            </div>
            <div class="card shadow mb-4">
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
            </div>
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
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-3 gy-md-3 row-cols-1 row-cols-lg-4 mt-3">
                <div class="col-lg-7 col-xl-8">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                            <h6 class="fw-bold fs-5 m-0 ch-heading">Patient's BMI Overview</h6>
                        </div>
                        <div class="card-body mx-3 my-3">
                            <div class="chart-area">
                                <canvas id="sampleChart2"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                            <h6 class="fw-bold fs-5 m-0 ch-heading">Chart Sample</h6>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 ch-patientrec">
        </div>
        <div class="card-body mx-3">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
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
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
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
            </div>
        </div>
    </div>


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
    let bmiChart = new Chart(sampleChart2, {
        type: 'pie',
        data: {
            labels: ['Underweight, <18.5', 'Normal weight, 18.5–24.9', 'Overweight, 25–29.9', 'Obesity, BMI of 30 or greater'],
            datasets: [{
                label: 'BMI',
                data: [10, 20, 30, 40],
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
</script>


</body>