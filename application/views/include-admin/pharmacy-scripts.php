<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.min.js') ?>"></script>




<script type="text/javascript">
    
    var options = {
        series: [14, 23, 21, 17, 15],
        chart: {
            type: 'polarArea',
            toolbar: {
                show: true
            },
            fontFamily: 'Poppins, sans-serif',
            height: 400,

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

    var options = {
        series: [{
                name: 'Admin',
                data: [{
                        x: 'ABC',
                        y: 10
                    },
                    {
                        x: 'DEF',
                        y: 60
                    },
                    {
                        x: 'XYZ',
                        y: 41
                    }
                ]
            },
            {
                name: 'Doctor',
                data: [{
                        x: 'ABCD',
                        y: 10
                    },
                    {
                        x: 'DEFG',
                        y: 20
                    },
                    {
                        x: 'WXYZ',
                        y: 51
                    },
                    {
                        x: 'PQR',
                        y: 30
                    },
                    {
                        x: 'MNO',
                        y: 20
                    },
                    {
                        x: 'CDE',
                        y: 30
                    }
                ]
            },
            {
                name: 'Pharmacy Assistant',
                data: [{
                    x: 'Pharmacy Assistant',
                    y: 10
                }, ]
            }
        ],
        legend: {
            show: false
        },
        chart: {
            height: 350,
            type: 'treemap',
            fontFamily: 'Poppins, sans-serif',

        },
    };

    var chart = new ApexCharts(document.querySelector("#tree_chart"), options);
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

</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>