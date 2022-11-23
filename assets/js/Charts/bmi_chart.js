var options = {
    series: [bmiData.underweight, bmiData.normal, bmiData.overweight, bmiData.obese],
    chart: {
        width: '100%',
        height: '100%',
        type: 'pie',
        fontFamily: 'Poppins, sans-serif',
        toolbar: {
            show: true
        },
    },
    colors: ['#283D3B', '#197278', '#C44536', '#772E25'],
    legend: {
        show: true,
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '12px',
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
    labels: ['Underweight', 'Normal', 'Overweight', 'Obese'],
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
    }]
};

var chart = new ApexCharts(document.querySelector("#bmiChart"), options);
chart.render();