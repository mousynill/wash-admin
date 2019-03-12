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
                <?php
                  include './mostViewedVideo.php';
                ?>
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
                <?php
                include './mostLikedComics.php'
                ?>
                <h6 class="text-muted m-b-0">Most Liked Comics</h5></div>
            </div>
          </div>
        </div>
      </div>
  </div>

<br>
      <div class="row">

        <div class="col-md-6 col-lg-8 col-sm-6 col-xs-12">
          <!--   <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><small class="float-right text-danger"><i class="fa fa-sort-desc"></i> 63% average active users</small>Active Users</h5>
                </div>

                  <canvas id="myChart" style="height:20px; width: 60px;"></canvas>
                </div>-->
                <table class="table table-striped table-dark table-hover" id="tblUser">
                  <thead>
                    <tr>
                      <th scope="col">User ID</th>
                      <th scope="col">Username</th>
                      <th scope="col">Wash Points</th>
                      <!-- <th scope="col">Exposure %</th>
                      <th scope="col"></th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                          </tr>
                          <tr>
                            <td>Mary</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                          </tr>
                          <tr>
                            <td>July</td>
                            <td>Dooley</td>
                            <td>july@example.com</td>
                          </tr>
                          <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
                  </tbody>
                </table>
            </div>
        </div>


      </div>



</div>
</body>
<!--for active link -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#dashBoard").addClass("active");
    $("#tblUser").DataTable();
    $('.dataTables_length').addClass('bs-select');


//     var ctx = document.getElementById('myChart').getContext('2d');
//     var chart = new Chart(ctx, {
//     // The type of chart we want to create
//     type: 'line',
//
//     // The data for our dataset
//     data: {
//         labels: ["January", "February", "March", "April", "May", "June", "July"],
//         datasets: [{
//               backgroundColor: 'rgb(254, 234, 228)',
//             borderColor: 'rgb(253, 204, 190)',
//             data: <php include './activeChart.php';?>, 15, 10, 15, 12, 25, 7],
//             defaultFontStyle: 'Quicksand',
//             lineTension: 0,
//         }]
//     },
//
//     // Configuration options go here
//     options: {
//       legend: {
//           display: false
//       },
//       tooltips: {
//           callbacks: {
//              label: function(tooltipItem) {
//                     return tooltipItem.yLabel;
//              }
//           }
//       }
//     }
// });
  })
</script>
