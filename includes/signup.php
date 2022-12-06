<?php

require_once "connection.php";
require_once 'path.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
  <body>

<!---signin-->

    <div id="Popup">
      <div class="form-popup" id="popupForm">
  <form id="form" class="form" method="post">
 
      <div class="cancel">
          <i class="fa fa-times" onclick="closePop()"></i>
          </div>
          <div class="form-head">
            <h1>Sign up</h1>
          </div>
    <div class="form-control">
      <label for="name">Name</label>
      <input type="text" placeholder="Name" id="username" name="username" >
    </div>
    <div class="form-control">
      <label for="username">Email</label>
      <input type="email" placeholder="info@gmail.com" id="email" name="email">
    </div>
    <div class="form-control">
      <label for="username">Password</label>
      <input type="password" placeholder="Password" id="password" name="password">
    </div>
    <!----<div class="form-control">
      <label for="username">Confirm Password</label>
      <input type="password" placeholder="Confirm Password" id="password2" name="password2">
    </div>------->
    <button name="register">Submit</button>
  </form>
      </div>
    </div>
    <script src="../assets/js/java.js"></script>
  </body>
</html>