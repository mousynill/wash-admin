<head>
  <link rel="stylesheet" type="text/css" href="register.css">
  <title>Registration</title>
</head>

<body>
  <div class="regi-form">

    <form name ="myRegi"class="regi" method="post" onsubmit="return validateForm()">
      <h1>Registration</h1>
      First Name:<br>
      <input type="text" name="Firstname" placeholder="Enter First Name here">
      <br>
      Last Name:<br>
      <input type="text" name="Lastname" placeholder="Enter Last Name here">
      <br>
      Email:<br>
      <input type="text" name="Email" placeholder="Enter E-mail here">
      <br>
      Username:<br>
      <input type="text" name="uid" placeholder="Enter Username here">
      <br>
      Password:<br>
      <input type="password" name="pwd" placeholder="Enter Password here">
      <br>
      Confirm Password:<br>
      <input type="password" name="cpwd" placeholder="Confirm Password here">
      <button type="submit" name="submit">Register</buton>

      </form>
  </div>
</body>

<script type="text/javascript">
  function validateForm() {
    var firstName = document.forms["myRegi"]["Firstname"].value;
    var lastName = document.forms["myRegi"]["Lastname"].value;
    var email = document.forms["myRegi"]["Email"].value;
    var userName = document.forms["myRegi"]["uid"].value;
    var passWord = document.forms["myRegi"]["pwd"].value;
    var cpassWord = document.forms["myRegi"]["cpwd"].value;

    if (firstName == "") {
      alert("Input your First Name first!");
      return false;
    } else if (lastName == "") {
      alert("Input your Last Name first!");
      return false;
    } else if (email == "") {
      alert("Input your Email Name first!");
      return false;
    } else if (userName == "") {
      alert("Input your User Name first!");
      return false;
    } else if (passWord == "") {
      alert("Input your Password first!");
      return false;
    } else if (cpassWord == "") {
      alert("You must Confirm your Password first!");
      return false;
    }else if (cpassWord !== passWord) {
      alert("Password doesn't match!");
      return false;
    }



  }
</script>
