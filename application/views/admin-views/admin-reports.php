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
                                <div class="card h-100 chart-body-violet">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-violet">
                                        <h6 class="fw-bold ms-2 m-0 ch-heading text-white">Overall Patient Satisfaction</h6>
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
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <div class="chart-area">
                                            <canvas class="align-items-center" id="Chart1"></canvas>
                                            <div id="chart"></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                                        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading">Staff per Department</h6>
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
                                    <div class="card-body"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                                        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading">No. of Archived Patients</h6>
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
                                    <div class="card-body"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-8">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card h-100 chart-body-red">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec chart-header-red">
                                        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading text-white">Active vs Archived Patients</h6>
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
                                    <div class="card-body"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center ch-patientrec">
                                        <h6 class="fw-bold ms-2 fs-5 m-0 ch-heading">Stock Items</h6>
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
                                    <div class="card-body"></div>
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
    let Chart1 = document.getElementById('Chart1').getContext('2d');
    let satisfactionChart = new Chart(Chart1, {
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


    var options = {
        series: [{
            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
        chart: {
            type: 'bar',
            height: 350
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
            categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
                'United States', 'China', 'Germany'
            ],
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>