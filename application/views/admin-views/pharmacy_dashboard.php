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
                    <img class="mt-4" style="width: 200px;" class="img-fluid" name="avatar" src="<?= base_url('/assets/img/avatars/avatar1.png') ?>"><br><br>
                    <label for="avatar">Hello, <br>
                        <?= $full_name ?>
                    </label><br>
                    <label for="avatar" class="role">
                        <?= $specialization ?>
                    </label><br>
                    <!-- <div class="btn-group" role="group"><button class="btn btn-light" type="button">View Personal Information</button></div> -->
                </div>
            </div>
        </div>
        <div class="col col-lg-6">
            <div class="card h-100 chart-body-red">
                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-red">
                    <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Stock Items</h6>
                </div>
                <div class="card-body">
                    <div id="stock_chart"></div>
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
                        <div id="satis_chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: second row -->














</div>
