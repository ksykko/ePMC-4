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