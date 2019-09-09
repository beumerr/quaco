var ctx = document.getElementById('chart-1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    responsive: true,
    scaleFontColor: "#FFFFFF",
    // The data for our dataset
    data: {
        labels: ['00:00', '02:00', '04:00', '05:00', '06:00', '07:00', '08:00'],
        datasets: [{
            label: 'Views',
            borderColor: 'rgb(255, 255, 255)',
            pointStrokeColor: "rgb(23, 143, 211)",
            strokeColor: "rgba(16,133,135,1)",
            data: [0, 10, 5, 2, 20, 30, 45]

        }]
    },

    // Configuration options go here
    options: {
        legend: {
            display: false,
            labels: {
                fontColor: "white",
                fontSize: 18
            }
        },

        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "rgba(255,255,255,.6)",
                    fontSize: 10,
                    stepSize: 8,
                    beginAtZero: true
                }
            }],
            xAxes: [{
                ticks: {
                    fontColor: "white",
                    fontSize: 14,
                    stepSize: 2,
                    beginAtZero: true
                },
                gridLines: {
                    drawOnChartArea: false
                }

            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem) {
                    return tooltipItem.yLabel;
                }
            }
        }
    }
});