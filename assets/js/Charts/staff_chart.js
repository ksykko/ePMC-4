var options = {
    series: [{
            name: 'Admin',
            data: [{
                    x: 'General Manager',
                    y: 2
                },
                {
                    x: 'Pharmacy Assistant',
                    y: 3
                },
                {
                    x: 'Secretary',
                    y: 3
                },
                {
                    x: 'Nurse',
                    y: 3
                }
            ]
        },
        {
            name: 'Doctor',
            data: [{
                    x: 'Internal Medicine',
                    y: 2
                },
                {
                    x: 'Family Medicine',
                    y: 2
                },
                {
                    x: 'Ob & Gyn',
                    y: 1
                },
                {
                    x: 'Orthopedic',
                    y: 1
                }
            ]
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