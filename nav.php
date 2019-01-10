<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- styles -->
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<!-- scripts -->
  <script src="jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

  <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark title" style="background-color: #278BCF;"> <!--2F98E2 -->
        <a class="navbar-brand navTitle"  href="dashboard.php">Wash App Kids</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse style navTitle" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item">
              <a class="nav-link" id="dashBoard"href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="uvideos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Videos
            </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="upload.php">Upload Videos</a>
                <a class="dropdown-item" href="editvideos.php">Edit Videos</a>
              </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="ucomics" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Comics
            </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="uploadcomics.php">Add Series</a>
                <a class="dropdown-item" href="editcomics.php">Edit Comics</a>
              </div>
          </li>
        <!--right buttons -->
        </ul>
        <ul class="navbar-nav ml-auto" style="margin-right:45px;">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="changepassword.php">Change Password</a>
              <a class="dropdown-item" href="register.php">Registration</a>
              <a class="dropdown-item" href="#">Sign out</a>
            </div>
          </li>
        </ul>
        </div>
      </nav>
