<?php
  include 'nav.php';
?>

<head>
  <link rel="stylesheet" type="text/css" href="dashboard.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

  <title>Welcome to Wash App Kids!</title>
</head>
<body>
<div style="margin:30px;">
  <div class="row">
    <div class="col-lg-3 col-md-5">
      <div class="card">
        <div class="card-body">
          <div class="d-flex no-block">

            <img src="images/user.png" height="60" width="60" style="align-content: center;">
            <div class="m-l-10 align-self-center">
              <?php
                include './getAllUsers.php';
              ?>
              <h6 class="text-muted m-b-0">Total Users</h5></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex no-block">
              <img src="images/active-icon.png" height="60" width="60">
              <div class="m-l-10 align-self-center">
                  <?php
                    include './getActiveUsers.php';
                  ?>
                <h6 class="text-muted m-b-0">Active User(s) </h5></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex no-block">
              <img src="images/video-icon1.png" height="60" width="60">
              <div class="m-l-10 align-self-center">
                <h4 class="m-b-0">Maymay
                  <?php
                      include 'includes/dbh.inc.php';

                      $getViewQuery = "SELECT VideoTitle, viewCount FROM videostable";
                      $result = mysqli_query($conn, $getViewQuery);

                  ?>
                </h3>
                <h6 class="text-muted m-b-0">Most Viewed Video</h5></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex no-block">
              <img src="images/comic-icon.png" height="60" width="60">
              <div class="m-l-10 align-self-center">
                <h4 class="m-b-0">Robot ni Tatay</h3>
                <h6 class="text-muted m-b-0">Most Liked Comics</h5></div>
            </div>
          </div>
        </div>
      </div>
  </div>

<br>
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title m-b-0"><div class="float-right checkbox"><input type="checkbox">Show only active users</div>List of Users</h6>
              
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><small class="float-right text-danger"><i class="fa fa-sort-desc"></i> 63% average active users</small>Active Users</h5>

                </div>

                  <canvas id="myChart" style="height:19px; width: 39px;"></canvas>
                </div>
            </div>
        </div>
      </div>



</div>
</body>
<!--for active link -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#dashBoard").addClass("active");

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
              backgroundColor: 'rgb(254, 234, 228)',
            borderColor: 'rgb(253, 204, 190)',
            data: [0, 15, 10, 15, 12, 25, 7],
            defaultFontStyle: 'Quicksand',
            lineTension: 0,
        }]
    },

    // Configuration options go here
    options: {
      legend: {
          display: false
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
  })
</script>
