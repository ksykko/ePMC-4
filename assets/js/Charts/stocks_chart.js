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