<?php include('includes/db_conn.php'); ?>
<?php
if(isset($_POST['submit']))
  {
  $apoint_id=intval($_GET['apoint_id']);
  $name = $_POST['name'];
  $status2=1;
$sql="UPDATE tbl_appointment SET name=:name, status2=:status2  WHERE apoint_id=:apoint_id";
$query=$db->prepare($sql);
$query -> bindParam(':name',$name, PDO::PARAM_STR);
$query -> bindParam(':status2',$status2, PDO::PARAM_STR);
$query->bindParam(':apoint_id',$apoint_id,PDO::PARAM_STR);
 $query->execute();
echo '<script>alert("Appointment has been Assigned")</script>';
echo "<script>window.location.href ='assign.php'</script>";
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Presige Auto Garage </title>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links" id="print">
	<h2>Assign Appointment</h2>

<form method="post" class="form5">
  <?php
$apoint_id=$_GET['apoint_id'];
$sql="SELECT * From tbl_appointment WHERE apoint_id=:apoint_id";
$query = $db -> prepare($sql);
$query->bindParam(':apoint_id',$apoint_id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
  <div class="form-group">
    <label>MAKE</label>
    <input type="text" name="make" value="<?php echo htmlentities($result->make);?>" readonly='true'  required='true'>
  </div>
  <div class="form-group">
    <label>MILEAGE</label>
    <input type="text" name="mileage" value="<?php echo htmlentities($result->mileage);?>" readonly='true'  required='true'>
  </div>
  <div class="form-group">
      <label>YEAR</label>
      <input type="text" name="year" value="<?php echo htmlentities($result->year);?>" readonly='true'  required='true'>
    </div>

  <div class="form-group">
          <label>TIME</label>
<input type="text" name="atime" value="<?php echo htmlentities($result->atime);?>" readonly='true'  required='true'>
  </div>
  <div class="form-group">
    <label>DATE</label>
    <input type="text" name="adate" value="<?php echo htmlentities($result->adate);?>" readonly='true'  required='true'>
  </div>
  <div class="form-group">
    <label>MODEL</label>
    <input type="text" name="model" value="<?php echo htmlentities($result->model);?>" readonly='true'  required='true'>
  </div>
  <div class="form-group">
    <label>SERVICES</label>
    <input type="text" name="services" value="<?php echo htmlentities($result->services);?>" readonly='true' required='true'>
  </div>
    <div class="form-group">
      <label>ASSIGN</label>
      <select type="text" name="name" required/>
                <option>choose mechanic</option>
                <?php

$sql = "SELECT * from   tbl_mechanic ";
$query = $db -> prepare($sql);
$query->execute();
$results =$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result)
{
    ?>
<option value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?> ,<?php echo htmlentities($result->specialist);?></option>
 <?php } ?>
               </select>
  </div>
  <button type="submit" class="btn btn-default" name="submit" id="submit">Update</button>
    <?php $cnt=$cnt+1;}} ?>
</div>
<?php include('includes/footer.php');?>
<script src="assets/js/java.js"></script>
</body>
</html>
