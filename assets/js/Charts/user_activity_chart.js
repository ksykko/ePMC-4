var options = {
    series: [{
            name: 'Edit',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'Insertions',
            data: [11, 32, 45, 32, 34, 52, 41]
        },
        {
            name: 'Deletions',
            data: [7, 12, 19, 3, 10, 5, 9]
        },
        {
            name: 'Log ins',
            data: [3, 5, 2, 8, 1, 5, 4]
        },
        {
            name: 'Log outs',
            data: [1, 3, 4, 3, 3, 4, 4]
        }
    ],
    chart: {
        height: 350,
        width: '100%',
        type: 'area',
        fontFamily: 'Poppins, sans-serif'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2022-11-23T00:00:00.000Z", "2022-11-23T01:30:00.000Z", "2022-11-23T02:30:00.000Z", "2022-11-23T03:30:00.000Z", "2022-11-23T04:30:00.000Z", "2022-11-23T05:30:00.000Z", "2022-11-23T06:30:00.000Z"]
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
};

var chart = new ApexCharts(document.querySelector("#activity_chart"), options);
chart.render();