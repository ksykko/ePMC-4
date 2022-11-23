var options = {
    series: [{
            name: 'Males',
            data: male_data
        },
        {
            name: 'Females',
            data: female_data
        }
    ],
    chart: {
        type: 'bar',
        height: 355,
        stacked: true,
        fontFamily: 'Poppins, sans-serif',
    },
    colors: ['#008FFB', '#FF4560'],
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: '80%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 1,
        colors: ["#fff"]
    },

    grid: {
        xaxis: {
            lines: {
                show: false
            }
        }
    },
    yaxis: {
        min: -5,
        max: 5,
        title: {
            // text: 'Age',
        },
    },
    tooltip: {
        shared: false,
        x: {
            formatter: function(val) {
                return val
            }
        },
        y: {
            formatter: function(val) {
                return Math.abs(val)
            }
        }
    },
    title: {
        text: 'PMC Patient Population Pyramid',
    },
    xaxis: {
        categories: ['91-100', '81-90', '71-80', '61-70', '51-60', '41-50', '31-40', '21-30', '11-20', '1-10'],
        title: {
            text: 'Percent'
        },
        labels: {
            formatter: function(val) {
                return Math.abs(Math.round(val))
            }
        }
    },
};

var chart = new ApexCharts(document.querySelector("#age_chart"), options);
chart.render();