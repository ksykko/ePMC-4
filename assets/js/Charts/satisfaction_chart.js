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