<div class="container-fluid patientrec-container">
    <div class="d-flex mb-3">
        <div>
            <h1 class="d-none d-lg-inline-block patientrec-label">Reports</h1>
        </div>
    </div>

    <div class="card shadow mb-4 p-3 pt-3 pb-3">
        <div class="card">
            <div class="card-body mx-3 my-3">
                <div class="row gy-3 row-cols-1 row-cols-lg-2">
                    <div class="col-lg-5 col-xl-4">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card chart-body-violet" style="height: 448px;">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-violet">
                                        <h6 class="fw-bold ms-2 m-0 ch-heading text-white">Overall Patient Satisfaction</h6>
                                        <!-- <div class="dropdown no-arrow"><button class="btn btn-link btn-sm shadow-none" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-white"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                <p class="text-center dropdown-header">View:</p><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Print<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                        <path d="M448 192H64C28.65 192 0 220.7 0 256v96c0 17.67 14.33 32 32 32h32v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h32c17.67 0 32-14.33 32-32V256C512 220.7 483.3 192 448 192zM384 448H128v-96h256V448zM432 296c-13.25 0-24-10.75-24-24c0-13.27 10.75-24 24-24s24 10.73 24 24C456 285.3 445.3 296 432 296zM128 64h229.5L384 90.51V160h64V77.25c0-8.484-3.375-16.62-9.375-22.62l-45.25-45.25C387.4 3.375 379.2 0 370.8 0H96C78.34 0 64 14.33 64 32v128h64V64z"></path>
                                                    </svg></a>
                                            </div>
                                        </div> -->
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
                                        <!-- <div class="dropdown no-arrow"><button class="btn btn-link btn-sm shadow-none" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-white"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                <p class="text-center dropdown-header">View:</p><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Print<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                        <path d="M448 192H64C28.65 192 0 220.7 0 256v96c0 17.67 14.33 32 32 32h32v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h32c17.67 0 32-14.33 32-32V256C512 220.7 483.3 192 448 192zM384 448H128v-96h256V448zM432 296c-13.25 0-24-10.75-24-24c0-13.27 10.75-24 24-24s24 10.73 24 24C456 285.3 445.3 296 432 296zM128 64h229.5L384 90.51V160h64V77.25c0-8.484-3.375-16.62-9.375-22.62l-45.25-45.25C387.4 3.375 379.2 0 370.8 0H96C78.34 0 64 14.33 64 32v128h64V64z"></path>
                                                    </svg></a>
                                            </div>
                                        </div> -->
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
                                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm shadow-none" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-white"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                <p class="text-center dropdown-header">View:</p><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Print<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                        <path d="M448 192H64C28.65 192 0 220.7 0 256v96c0 17.67 14.33 32 32 32h32v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h32c17.67 0 32-14.33 32-32V256C512 220.7 483.3 192 448 192zM384 448H128v-96h256V448zM432 296c-13.25 0-24-10.75-24-24c0-13.27 10.75-24 24-24s24 10.73 24 24C456 285.3 445.3 296 432 296zM128 64h229.5L384 90.51V160h64V77.25c0-8.484-3.375-16.62-9.375-22.62l-45.25-45.25C387.4 3.375 379.2 0 370.8 0H96C78.34 0 64 14.33 64 32v128h64V64z"></path>
                                                    </svg></a>
                                            </div>
                                        </div>
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
                                        <!-- <div class="dropdown no-arrow"><button class="btn btn-link btn-sm shadow-none" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-white"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                <p class="text-center dropdown-header">View:</p><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Print<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                        <path d="M448 192H64C28.65 192 0 220.7 0 256v96c0 17.67 14.33 32 32 32h32v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h32c17.67 0 32-14.33 32-32V256C512 220.7 483.3 192 448 192zM384 448H128v-96h256V448zM432 296c-13.25 0-24-10.75-24-24c0-13.27 10.75-24 24-24s24 10.73 24 24C456 285.3 445.3 296 432 296zM128 64h229.5L384 90.51V160h64V77.25c0-8.484-3.375-16.62-9.375-22.62l-45.25-45.25C387.4 3.375 379.2 0 370.8 0H96C78.34 0 64 14.33 64 32v128h64V64z"></path>
                                                    </svg></a>
                                            </div>
                                        </div> -->
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

    var options = {
        series: [{
            data: [1, 2, 3, 4, 5]
        }],
        chart: {
            type: 'bar',
            height: 350,
            fontFamily: 'Poppins, sans-serif'
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Strongly Agree', 'Agree', 'Neutral', 'Disagree', 'Strongly Disagree'],
        },
        yaxis: {
            labels: {
                style:{
                    fontSize: '9px'
                },
                //rotate: -45,
            }
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();


    var stock_products = JSON.parse('<?= $stock_products ?>');
    var stock_in = JSON.parse('<?= $stock_in ?>');
    var stock_out = JSON.parse('<?= $stock_out ?>');
    console.log(stock_products);

    var options = {
        series: [{
            name: 'Stock In',
            data: stock_in
        }, {
            name: 'Stock Out',
            data: stock_out
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            stackType: '100%',
            fontFamily: 'Poppins, sans-serif'
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: stock_products,
        },
        fill: {
            opacity: 1,
            colors: ['#EA4873', '#F47867']

        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 40
        },
        dataLabels: {
            style: {
                colors: ['#fff']
            }
        },
        colors: ['#EA4873', '#F47867']
    };

    var stockChart = new ApexCharts(document.querySelector("#stock_chart"), options);
    stockChart.render();


    var options = {
        series: [{
            name: "Patient Records",
            data: [10, 41, 35, 51, 49, 100]
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
            fontFamily: 'Poppins, sans-serif'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        },
        colors: ['#EDB007']
    };

    var add_dlt = new ApexCharts(document.querySelector("#add_dlt"), options);
    add_dlt.render();

    var recent_days = JSON.parse('<?= $recent_days ?>');
    var recent_data = JSON.parse('<?= $recent_data ?>');
    var recent_deleted = JSON.parse('<?= $recent_deleted ?>');

    var options = {
        series: [{
            name: 'Insertions',
            data: recent_data
        }, {
            name: 'Deletions',
            data: recent_deleted
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
        series: [14, 23 , 21, 17, 15],
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