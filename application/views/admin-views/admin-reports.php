<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-lg-inline-block patientrec-label">Reports</h1>
        </div>
    </div>

    <div class="card shadow mb-4 p-3 pt-3 pb-3">
        <div>
            <ul class="nav nav-tabs d-flex justify-content-end me-md-3" role="tablist">
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Audit Log</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="tab" href="#user_audit">User</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="tab" href="#patient_audit">Patient</a></li>
                    </ul>
                </li>
                <li class="nav-item" role="presentation"><a class="nav-link text-dark" role="tab" data-bs-toggle="tab" href="#charts">Chart</a></li>
            </ul>
            <div class="tab-content">
                <div id="charts" class="tab-pane fade" role="tabpanel">
                    <div class="card">
                        <div class="card-body mx-3 my-3">
                            <div class="row gy-3 row-cols-1 row-cols-lg-2">
                                <div class="col-lg-5 col-xl-4">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="card chart-body-violet" style="height: 448px;">
                                                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-violet">
                                                    <h6 class="fw-bold ms-2 m-0 ch-heading text-white">Overall Patient Satisfaction</h6>
                                                </div>
                                                <div class="card-body d-flex justify-content-center align-items-center">
                                                    <!-- <div class="chart-area">
                                            <canvas class="align-items-center" id="Chart1"></canvas>
                                        </div> -->
                                                    <div id="satis_chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="card h-100 chart-body-darkblue">
                                                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-darkblue">
                                                    <h5 class="fw-bold ms-2 m-0 ch-heading text-white">Doctor's Treatment Plan</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div id="chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                                        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading">No. of Archived Patients</h6>
                                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm shadow-none" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-white"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                <p class="text-center dropdown-header">View:</p><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Print<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                        <path d="M448 192H64C28.65 192 0 220.7 0 256v96c0 17.67 14.33 32 32 32h32v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h32c17.67 0 32-14.33 32-32V256C512 220.7 483.3 192 448 192zM384 448H128v-96h256V448zM432 296c-13.25 0-24-10.75-24-24c0-13.27 10.75-24 24-24s24 10.73 24 24C456 285.3 445.3 296 432 296zM128 64h229.5L384 90.51V160h64V77.25c0-8.484-3.375-16.62-9.375-22.62l-45.25-45.25C387.4 3.375 379.2 0 370.8 0H96C78.34 0 64 14.33 64 32v128h64V64z"></path>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body"></div>
                                </div>
                            </div>
                        </div> -->
                                </div>
                                <div class="col-lg-7 col-xl-8">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="card h-100 chart-body-yellow">
                                                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-yellow">
                                                    <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Insertions vs Deletions of Patients</h6>
                                                </div>
                                                <div class="card-body">
                                                    <!-- <div id="add_dlt"></div> -->

                                                    <div id="recent_chart"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card h-100 chart-body-red">
                                                <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-red">
                                                    <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Stock Items</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div id="stock_chart"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="user_audit" class="tab-pane show active fade" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="audit_log" class="table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th class="col-md-1">ID</th> -->
                                        <!-- Include avatar -->
                                        <th>ID</th>
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
                                        <th>ID</th>
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
<script>
    // let Chart1 = document.getElementById('Chart1').getContext('2d');
    // let satisfactionChart = new Chart(Chart1, {
    //     type: 'polarArea',
    //     data: {
    //         labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Unsatisfied', 'Very Unsatisfied'],
    //         datasets: [{
    //             label: 'Satisfaction',
    //             data: [59, 20, 42, 16, 4],
    //             backgroundColor: [
    //                 "#CB2B92",
    //                 "#FC3F93",
    //                 "#FE77FE",
    //                 "#8c0d49",
    //                 "#FF1696"
    //             ]
    //         }]
    //     },
    //     options: {
    //         legend: {
    //             display: true
    //         },
    //         responsive: true,
    //     }

    // })    
    var font = "font-family: 'Poppins', sans-serif;";

    $(document).ready(function() {
        $('#audit_log').DataTable({
            "processing": true,
            order: [
                [0, 'desc']
            ],
            responsive: true,
            "ajax": {
                url: "<?= site_url('Admin/audit_log_dt'); ?>",
                type: "POST"
            },
            // add print button to the table
            dom: 'Bfrtip',
            buttons: [
                // style the print button
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"><small style="' + font + '"> Print</small></i>',
                    className: 'btn btn-dark btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ],


            "columnDefs": [{
                    "targets": [3],
                    "orderable": false,
                },
                {
                    "targets": [0, 1, 2, 3, 4],
                    "className": "align-middle"
                },
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }

            ],
        });

    });

    $(document).ready(function() {
        $('#patient_audit_log').DataTable({
            "processing": true,
            order: [
                [0, 'desc']
            ],
            responsive: true,
            "ajax": {
                url: "<?= site_url('Admin/patient_audit_dt'); ?>",
                type: "POST"
            },
            // add print button to the table
            dom: 'Bfrtip',
            buttons: [
                // style the print button
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"><small style="' + font + '"> Print</small></i>',
                    className: 'btn btn-dark btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ],
            autoWidth: false,


            "columnDefs": [{
                    "targets": [2],
                    "orderable": false,
                },
                {
                    "targets": [0, 1, 2, 3],
                    "className": "align-middle"
                },
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }

            ],
        });



    });

    var insertions = JSON.parse('<?= $insertions; ?>');
    console.log(insertions);

    var stock_products = JSON.parse('<?= $stock_products ?>');
    var stock_in = JSON.parse('<?= $stock_in ?>');
    var stock_out = JSON.parse('<?= $stock_out ?>');


    var recent_days = JSON.parse('<?= $recent_days ?>');
    var recent_data = JSON.parse('<?= $recent_data ?>');
    var recent_deleted = JSON.parse('<?= $recent_deleted ?>');

    console.log(recent_days);

    var options = {
        series: [{
            name: 'Insertions',
            data: Object.values(insertions.inserted).reverse()
        }, {
            name: 'Deletions',
            data: Object.values(insertions.deleted).reverse()
        }],
        chart: {
            type: 'bar',
            height: 350,
            fontFamily: 'Poppins, sans-serif'
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: recent_days,
        },
        yaxis: {
            title: {
                text: 'Insertions / Deletion for the past 7 days'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function(val) {
                        return val
                    }
                }
            }, {
                title: {
                    formatter: function(val) {
                        return val;
                    }
                }
            }, {
                title: {
                    formatter: function(val) {
                        return val;
                    }
                }
            }]
        },
        colors: ['#EDB007', '#FB5607']
    };

    var recentChart = new ApexCharts(document.querySelector("#recent_chart"), options);
    recentChart.render();


    var options = {
        series: [14, 23, 21, 17, 15],
        chart: {
            type: 'polarArea',
            toolbar: {
                show: true
            },
            fontFamily: 'Poppins, sans-serif',
            height: 350,

        },
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            fontFamily: 'Poppins, sans-serif',
            markers: {
                width: 10,
                height: 10,
            },
            itemMargin: {
                horizontal: 5,
                vertical: 5
            }
        },
        plotOptions: {
            polarArea: {
                rings: {
                    strokeWidth: 1,
                    //strokeColor: '#000000'
                },
                spokes: {
                    strokeWidth: 0,
                    //connectorColors: '#000000'
                },
            }
        },
        labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied'],
        fill: {
            opacity: 0.8,
            color: ['#F72585', '#7209B7', '#3A0CA3', '#4361EE', '#4CC9F0'],
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        colors: ['#F72585', '#7209B7', '#3A0CA3', '#4361EE', '#4CC9F0'],
    };

    var satisChart = new ApexCharts(document.querySelector("#satis_chart"), options);
    satisChart.render();
</script>