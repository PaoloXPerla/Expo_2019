$(document).ready(function()
{
 //Aqui es dponde se muestran todas las graficas para la pagina de incio de el sitio privado
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Gaseosas", "Energeticas", "Calientes",],
        datasets: [{
            label: '# Ventas por Categoria',
            data: [35, 59, 22],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
            ],
            borderWidth: 3
        }]
    },
    options: {
      responsive: true,
      legend: {
      labels: {
       fontColor: "black",
       fontSize: 15
      }

     },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    fontColor: 'black'
                },
            }],
            xAxes: [{
                ticks: {
                    beginAtZero:true,
                    fontColor: 'black'
                },
            }]
          }
    }
  });

var ctx = document.getElementById("myChart2").getContext('2d');
var myChart2 = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: ["Coca Loca", "LimoFresa", "Kolashanpan",],
      datasets: [{
          label: '# Ventas por Bebidas Gaseosas',
          data: [12, 19, 3],
          backgroundColor: [
              'rgba(255, 206, 86, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(255, 206, 86, 0.2)',
          ],
          borderColor: [
              'rgba(255, 206, 86, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(255, 206, 86, 1)',
          ],
          borderWidth: 3
      }]
  },
  options: {
    responsive: true,
    legend: {
    labels: {
     fontColor: "black",
     fontSize: 15
    }

   },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true,
                  fontColor: 'black'
              },
          }],
          xAxes: [{
              ticks: {
                  beginAtZero:true,
                  fontColor: 'black'
              },
          }]
        }
  }
});
var ctx = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: ["Cafe Expreso", "Capuchino", "Te de Manzanilla",],
      datasets: [{
          label: '# Ventas por Bebidas Calientes',
          data: [17, 25, 9],
          backgroundColor: [
               'rgba(255, 159, 64, 0.2)',
               'rgba(255, 159, 64, 0.2)',
               'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255, 159, 64, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 3
      }]
  },
  options: {
    responsive: true,
    legend: {
    labels: {
     fontColor: "black",
     fontSize: 15
    }

   },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true,
                  fontColor: 'black'
              },
          }],
          xAxes: [{
              ticks: {
                  beginAtZero:true,
                  fontColor: 'black'
              },
          }]
        }
  }
});
var ctx = document.getElementById("myChart4").getContext('2d');
var myChart4 = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: ["PowerAnger", "Mutante", "Extreme",],
      datasets: [{
          label: '# Ventas por Bebidas Energeticas',
          data: [65, 15, 5],
          backgroundColor: [
               'rgba(153, 102, 255, 0.2)',
               'rgba(153, 102, 255, 0.2)',
               'rgba(153, 102, 255, 0.2)',
          ],
          borderColor: [
              'rgba(153, 102, 255, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(153, 102, 255, 1)',
          ],
          borderWidth: 3
      }]
  },
  options: {
    responsive: true,
    legend: {
    labels: {
     fontColor: "black",
     fontSize: 15
    }

   },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero:true,
                  fontColor: 'black'
              },
          }],
          xAxes: [{
              ticks: {
                  beginAtZero:true,
                  fontColor: 'black'
              },
          }]
        }
  }
});
})
