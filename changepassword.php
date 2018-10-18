<?php
  include 'nav.php';
  include_once 'includes/dbh.inc.php';
?>

<head>
  <link rel="stylesheet" type="text/css" href="changepassword.css">

</head>
<body>
  <div class="cp-modal" id="changepasswordmodal" >
    <form method="POST" action="changepasswordfunction.php">

      <div class="cp-modal-content">

        <div class="cp-modal-header">
            <span id="closeButton" class="cp-close" onClick="exitCPmodal('changepasswordmodal')">&times;</span>
            <h2 style="font-family: Quicksand;">Change password</h2>
        </div>

        <div class="cp-modal-body">
          <label>Old password:</label>
          <input type="password" name="oldPassword" value="oldPassword" placeholder="Enter old password here.">
          <br>
          <label>New password:</label>
          <input type="password" name="newPassword" value="newPassword" placeholder="Enter new password here.">
          <br>
          <label>Confirm password:</label>
          <input type="password" name="confirmPassword" value="confirmPassword" placeholder="Confirm new password here.">
          <br>
        </div>

        <div class="cp-modal-footer">
          <button type="button" name="button" class="button">Change password</button>
        </div>

      </div>

    </form>
  </div>

  <script type="text/javascript">
  function openCPmodal(container)
  {
        document.getElementById(container).style.display="block";
  }
  function exitCPmodal(container)
  {
      document.getElementById(container).style.display="none";
  }
  </script>
</body>
