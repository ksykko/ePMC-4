var options = {
    series: [{
        data: [1, 2, 3, 4, 5]
    }],
    chart: {
        type: 'bar',
        height: 295,
        width: '100%',
        fontFamily: 'Poppins, sans-serif'
    },
    colors: ['#8338EC'],
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
            style: {
                fontSize: '12px'
            },
            //rotate: -45,
        }
    },

};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();