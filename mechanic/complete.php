<?php include('includes/db_conn.php'); ?>
<?php
if(isset($_POST['submit']))
  {


 $status3=1;
 $eid=$_GET['apoint_id'];

$sql="UPDATE tbl_appointment SET status3=:status3  WHERE apoint_id=:eid";
$query=$db->prepare($sql);
$query->bindParam(':status3',$status3, PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

   $query->execute();
echo '<script>alert("Appointment has been Edited")</script>';
echo "<script>window.location.href ='billed.php'</script>";
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Presige Auto Garage </title>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="../admin/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="../admin/fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links" id="print">
	<h2>Complete Task</h2>
<p> Add other done services if any</p>
<form method="post" class="form5">
  <?php
$eid=$_GET['apoint_id'];
$sql="SELECT * From tbl_appointment WHERE apoint_id=:eid";
$query = $db -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
  <div class="form-group">
    <label>MAKE</label>
    <input type="text" name="make" value="<?php echo htmlentities($result->make);?>" readonly="true">
  </div>
  <div class="form-group">
    <label>MILEAGE</label>
    <input type="text" name="mileage" value="<?php echo htmlentities($result->mileage);?>"   readonly="true">
  </div>
  <div class="form-group">
    <label>YEAR</label>
    <input type="text" name="adate" value="<?php echo htmlentities($result->year);?>"   readonly="true">
  </div>

  <div class="form-group">
    <label>TIME</label>
    <input type="text" name="adate" value="<?php echo htmlentities($result->atime);?>"   readonly="true">
  </div>
  <div class="form-group">
    <label>DATE</label>
    <input type="text" name="adate" value="<?php echo htmlentities($result->adate);?>"   readonly="true">
  </div>
  <div class="form-group">
    <label>MODEL</label>
    <input type="text" name="model" value="<?php echo htmlentities($result->model);?>" readonly='true'>
  </div>
  <div class="form-group">
    <label>SERVICES</label>
    <input type="text" name="services" value="<?php echo htmlentities($result->services);?>" required='true'>
  </div>
  <button type="submit" class="btn btn-default" name="submit" id="submit">Update</button>
    <?php $cnt=$cnt+1;}} ?>
</div>
<?php include('includes/footer.php');?>
<script src="assets/js/java.js"></script>
</body>
</html>
