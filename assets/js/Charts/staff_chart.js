var options = {
    series: [{
            name: 'Admin',
            data: [{
                    x: 'General Manager',
                    y: staff_data.genman
                },
                {
                    x: 'Pharmacy Assistant',
                    y: staff_data.pharma
                },
                {
                    x: 'Secretary',
                    y: staff_data.sec
                },
                {
                    x: 'Nurse',
                    y: staff_data.nurse
                }
            ]
        },
        {
            name: 'Doctor',
            data: [{
                    x: 'Internal Medicine',
                    y: staff_data.intmed
                },
                {
                    x: 'Family Medicine',
                    y: staff_data.fammed
                },
                {
                    x: 'Ob & Gyn',
                    y: staff_data.obgyne
                },
                {
                    x: 'Orthopedic',
                    y: staff_data.ortho
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