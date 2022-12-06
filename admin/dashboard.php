<?php include('includes/db_conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Auto Express Garage</title>
  <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="fonts/css/all.css">
  <style>
    .chart-container{
      width:100%!important;
    }
  </style>
  <script src="js/jquery-2.1.4.js"></script>
  <script src="js/fusioncharts.js"></script>
  <script src="js/fusioncharts.charts.js"></script>
  <script src="js/themes/fusioncharts.theme.zune.js"></script>
  <script src="js/app.js"></script>
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
  <div class="dashboard">
    <br><br><br>
   


    <br><br><br>
    <div id="chart-container">FusionCharts will render here</div>
  	<div class="dash-cont" style="background-color: green;">
  		<i class="fa fa-users" aria-hidden="true" style="font-size: 20px;"></i>
  		<h3><a style="text-decoration: none; color: white;" href="delete-user.php">Users</a></h3>
<?php $sql = "SELECT * From tbl_user";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
</div>



    <div class="dash-cont" style="background-color: red;">
  		<i class="fa fa-folder-open" aria-hidden="true" style="font-size: 20px;"></i>
  		<h3><a style="text-decoration: none; color: white;" href="appointment.php">All Appointments</a></h3>
<?php $sql = "SELECT * From tbl_appointment";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>


    <div class="dash-cont" style="background-color: indigo;">
  		<i class="fa fa-tools" aria-hidden="true" style="font-size: 20px;"></i>
  		<h3><a style="text-decoration: none; color: white;" href="edit-spare.php">Auto-Spares</a></h3>
<?php $sql = "SELECT * From tbl_autospare";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>

    <div class="dash-cont" style="background-color: grey;">
      <i class="fa fa-folder" aria-hidden="true" style="font-size: 20px;"></i>
<h3><a style="text-decoration: none; color: white;" href="new.php">New</a></h3>
<?php
$tid=0;
$sql = "SELECT * From tbl_appointment WHERE status=:tid";
$query = $db -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>


    <div class="dash-cont" style="background-color: blue;">
  		<i class="fa fa-check-square" aria-hidden="true" style="font-size: 20px;"></i>
<h3><a style="text-decoration: none; color: white;" href="confirmed.php">confirmed</a></h3>
<?php
$tid=1;
$sql = "SELECT * From tbl_appointment WHERE status=:tid";
$query = $db -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>


    <div class="dash-cont" style="background-color: orange;">
  		<i class="fa fa-window-close" aria-hidden="true" style="font-size: 20px;"></i>
<h3><a style="text-decoration: none; color: white;" href="cancelled.php">Cancelled</a></h3>
<?php
$tid=2;
$sql = "SELECT * From tbl_appointment WHERE status=:tid";
$query = $db -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>

<div class="dash-cont" style="background-color: brown;">
      <i class="fa fa-envelope" aria-hidden="true" style="font-size: 20px;"></i>
<h3><a style="text-decoration: none; color: white;" href="enquiry.php">New enquiry</a></h3>
<?php
$tid=0;
$sql = "SELECT * From tbl_enquiry WHERE status=:tid";
$query = $db -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>

     <div class="dash-cont" style="background-color: purple;">
      <i class="fa fa-comment-alt" aria-hidden="true" style="font-size: 20px;"></i>
      <h3><a style="text-decoration: none; color: white;" href="testimonies.php">Testimonies</a></h3>
<?php $sql = "SELECT * From tbl_testimonies";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>



     <div class="dash-cont" style="background-color: black;">
      <i class="fa fa-folder" aria-hidden="true" style="font-size: 20px;"></i>
<h3><a style="text-decoration: none; color: white;" href="manage-mec.php">Mechanics</a></h3>
<?php
$sql = "SELECT * From tbl_mechanic";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<h4> <?php echo htmlentities($cnt);?> </h4>
    </div>


  </div>



<?php include('includes/footer.php');?>
</body>
</html>
