<?php
  include 'nav.php';
?>

<head>
  <link rel="stylesheet" type="text/css" href="dashboard.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
  <title>Dashboard</title>
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
              <h4 class="m-b-0">
                <?php
                  include 'includes/dbh.inc.php';

                  $getUsersQuery = "SELECT COUNT(*) FROM appusers";
                  $result = mysqli_query($conn, $getUsersQuery);
                  if(mysqli_num_rows($result)>0){
                    while($userRow = mysqli_fetch_row($result)){
                        $count = $userRow[0];

                        echo $count;
                    }

                  }

                  ?></h3>
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
                <h4 class="m-b-0">1</h3>
                <h6 class="text-muted m-b-0">Active User(s)</h5></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex no-block">

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

              <div class="m-l-10 align-self-center">
                <h4 class="m-b-0">Robot ni Tatay</h3>
                <h6 class="text-muted m-b-0">Most Liked Comics</h5></div>
            </div>
          </div>
        </div>
      </div>
  </div>

<br><br>
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title m-b-0"><div class="float-right checkbox"><input type="checkbox">Show only active users</div>List of Users</h6>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>johnjohn</td>
                    <td>active</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary_</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>julyaug</td>
                  </tr>
              </tbody>
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
  })
</script>
