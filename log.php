<?php
  include_once 'includes/dbh.inc.php';

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title> Sign in to Wash App Kids </title>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="log.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
  <script type="text/javascript" src="bootstrap.min.js"></script>


</head>
<body>
  <!--Navbar-->
  <nav>
      <aside class="name">Wash App Kids </aside>
      <aside class="menu">
          <div class="menu-content">
            <a style="text-decoration: none;" href="#" id="login">Login</a>
            <div class="arrow-up"></div>
          </div>
      </aside>
      <div class="login-form">
        <form method="POST">
          <label>Username:</label>
          <div class="uname">
            <input type="text" id="uname" name="uname" placeholder="Enter username here">
          </div>
          <label>Password:</label>
          <div class="pass">
            <input type="password" id="pass" name="pass" placeholder="Enter password here">
          </div>
            <button type="submit" name="submit" value="submit">Login </button>
            <a href="#">Lost Your Password? </a>
        </form>
      </div>
  </nav>
  <!--End of Navbar-->

  <?php
    if(isset($_POST['uname'])){
      $uname = $_POST['uname'];
      $pass = $_POST['pass'];

      $sql = "SELECT * FROM users WHERE user_uid ='".$uname."' AND user_pwd = '".$pass."' limit 1;";
      $result = mysqli_query($conn, $sql);

      //checking
      if(mysqli_num_rows($result)==1){
        header("Location: upload.php");
        exit();
      } else if(empty($uname) || empty($pass)) {
        echo "<script type='text/javascript'>alert('Please input username and password first');
          window.location.replace('log.php?login=noinput')</script>";
      }
      else {
        echo "<script type='text/javascript'>alert('You have entered incorrect username or password');
          window.location.replace('log.php?login=error')</script>";
        }
    }
  ?>

  <script type="text/javascript">
    $(document).ready(function(){
      var arrow = $(".arrow-up");
      var form = $(".login-form");
      var status = false;
      $("#login").click(function(event){
        event.preventDefault();
        if (status == false) {
          arrow.fadeIn();
          form.fadeIn();
          status = true;
        }
        else {
          arrow.fadeOut();
          form.fadeOut();
          status = false;
        }
      })

    })
  </script>
  <!--End -->

</body>
</html>
