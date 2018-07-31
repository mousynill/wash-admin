<?php
  include 'nav.php';
?>

<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="home.css">
<body>

  <div class="chart-container">
    <canvas id="myChart" height="100">
    </canvas>
  </div>
  
  <div class="parasite">
    <form class="ascaris">
      <button type="button" id="ascaris" name="ascaris">Ascaris</button>
      <div class="arrow-down"></div>

      <button type="button" name="arichuris">Trichuris</button>
      <div class="ar-arrow-down"></div>

      <button type="button" name="ancylostoma">Ancylostoma</button>

      <button type="button" name="giardia">Giardia</button>


      <button type="button" name="cryptosporidium" style="font-size: 15px;">Cryptosporidium</button>
      <div class="an-arrow-down"></div>
      <div class="gi-arrow-down"></div>
      <div class="cr-arrow-down"></div>
  </form>
  </div>

  <div class="chart-form">

  </div>




      <script>
      let myChart = document.getElementById('myChart').getContext('2d');
      Chart.defaults.global.defaultFontFamily = 'Quicksand'
      Chart.defaults.global.defaultFontColor = '#777'
      let ParRateChart = new Chart(myChart, {
          type: 'bar',
          data: {
            labels: ['Ascaris', 'Trichuris', 'Ancylostoma', 'Giardia', 'Cryptosporidium'],
            datasets: [{
              label: "Parasitism Rate",
              data: [50, 100, 150, 200, 250],
              backgroundColor: '#70B8FF',
              borderWidth: 2,
              hoverBorderWidth: 3
            }]
          },
          options: {

            legend: {
              display: false,
            },
            title: {
              display: true,
              text: 'Parasitism Rate',
              fontSize: 20,
              fontColor: '#000',

            },

            scales: {
                xAxes: [{

                  gridLines: {
                    lineWidth: 1.5,

                  },

                }],

                yAxes: [{
                  gridLines: {
                    lineWidth: 1.5,
                    tickMarkLength: 2
                  },
                  ticks: {
                    beginAtZero:true,
                  },
                }]
            },
          }
        });
      </script>
  <!-- End of Chart -->

  <!--active link-->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#report").addClass("active");
    })
  </script>

</body>
</html>
