<?php
require 'includes/connection.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
  <body>

    <!------------ login ------------>
    <div id="loginPopup">
      <div class="form-popup" id="popupForm">
<form  class="form" id="form" method="post">
          <div class="cancel">
          <i class="fa fa-times" onclick="closeForm()"></i>
          </div>
           <div class="form-head">
            <h1>Sign in</h1>
          </div>
    <div class="form-control">
      <label for="email">Email/Username</label>
      <input type="text" placeholder="email/username" id="email" name="txt_username_email" />
    </div>
    <div class="form-control">
      <label for="password">Password</label>
      <input type="password" placeholder="password" id="password" name="password">
    </div>
          <button type="submit" name="login" class="btn btn-success" value="Login">login</button>
        </form>
      </div>
    </div>
    <script src="../assets/js/java.js"></script>
  </body>
</html>
