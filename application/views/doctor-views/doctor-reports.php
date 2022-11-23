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
                                <div class="card chart-body-violet" style="height: 420px;">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-violet">
                                        <h6 class="fw-bold ms-2 m-0 ch-heading text-white">Patient Satisfaction</h6>
                                    </div>
                                    <div class="card-body">
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
                                <div class="card chart-body-darkblue" style="height: 449px;">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-darkblue">
                                        <h5 class="fw-bold ms-2 m-0 ch-heading text-white">BMI Overview</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="bmiChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-8">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card shadow mb-4 h-100 chart-body-purp">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-purp">
                                        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Treatment Plan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <div id="chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card h-100 chart-body-red" >
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-red">
                                        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Patient Age Range Overview</h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- <div id="stock_chart"></div> -->
                                        <div id="age_chart"></div>
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
   

    

    // var options = {
    //     series: [{
    //         name: "Patient Records",
    //         data: [10, 41, 35, 51, 49, 100]
    //     }],
    //     chart: {
    //         height: 350,
    //         type: 'line',
    //         zoom: {
    //             enabled: false
    //         },
    //         fontFamily: 'Poppins, sans-serif'
    //     },
    //     dataLabels: {
    //         enabled: false
    //     },
    //     stroke: {
    //         curve: 'straight'
    //     },
    //     grid: {
    //         row: {
    //             colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
    //             opacity: 0.5
    //         },
    //     },
    //     xaxis: {
    //         categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    //     },
    //     colors: ['#EDB007']
    // };

    // var add_dlt = new ApexCharts(document.querySelector("#add_dlt"), options);
    // add_dlt.render();

    // var recent_days = JSON.parse('<?= $recent_days ?>');
    // var recent_data = JSON.parse('<?= $recent_data ?>');
    // var recent_deleted = JSON.parse('<?= $recent_deleted ?>');

    // var options = {
    //     series: [{
    //         name: 'Insertions',
    //         data: recent_data
    //     }, {
    //         name: 'Deletions',
    //         data: recent_deleted
    //     }],
    //     chart: {
    //         type: 'bar',
    //         height: 350,
    //         fontFamily: 'Poppins, sans-serif'
    //     },
    //     plotOptions: {
    //         bar: {
    //             horizontal: false,
    //             columnWidth: '55%',
    //             endingShape: 'rounded'
    //         },
    //     },
    //     dataLabels: {
    //         enabled: false
    //     },
    //     stroke: {
    //         show: true,
    //         width: 2,
    //         colors: ['transparent']
    //     },
    //     xaxis: {
    //         categories: recent_days,
    //     },
    //     yaxis: {
    //         title: {
    //             text: 'Insertions / Deletion for the past 7 days'
    //         }
    //     },
    //     fill: {
    //         opacity: 1
    //     },
    //     tooltip: {
    //         y: [{
    //             title: {
    //                 formatter: function(val) {
    //                     return val
    //                 }
    //             }
    //         }, {
    //             title: {
    //                 formatter: function(val) {
    //                     return val;
    //                 }
    //             }
    //         }, {
    //             title: {
    //                 formatter: function(val) {
    //                     return val;
    //                 }
    //             }
    //         }]
    //     },
    //     colors: ['#EDB007', '#FB5607']
    // };

    // var recentChart = new ApexCharts(document.querySelector("#recent_chart"), options);
    // recentChart.render();


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