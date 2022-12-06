<?php include('includes/db_conn.php'); ?>
<?php
if(isset($_POST['submit']))
  {


 $make=$_POST['make'];
 $mileage=$_POST['mileage'];
  $year=$_POST['year'];
  $adate=$_POST['adate'];
  $atime=$_POST['atime'];
  $model=$_POST['model'];
  $services =$_POST['services'];
 $eid=$_GET['edit_id'];

$sql="UPDATE tbl_appointment SET make=:make,mileage=:mileage, year=:year, adate=:adate, atime=:atime,model=:model,services=:services  WHERE apoint_id=:eid";
$query=$db->prepare($sql);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':adate',$adate,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':atime',$atime,PDO::PARAM_STR);
$query->bindParam(':model',$model,PDO::PARAM_STR);
$query->bindParam(':services',$services,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

   $query->execute();
echo '<script>alert("Appointment has been Edited")</script>';
echo "<script>window.location.href ='new.php'</script>";
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
	<h2>Edit Appointment</h2>

<form method="post" class="form5">
  <?php
$eid=$_GET['edit_id'];
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
    <input type="text" name="make" value="<?php echo htmlentities($result->make);?>" required='true'>
  </div>
  <div class="form-group">
    <label>MILEAGE</label>
    <input type="text" name="mileage" value="<?php echo htmlentities($result->mileage);?>"  required='true'>
  </div>
  <div class="form-group">
      <label>YEAR</label>
      <select name="year" value="<?php echo htmlentities($result->year);?>">
        <option><?php echo htmlentities($result->year);?></option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option>
        <option value="2017">2017</option>
        <option value="2016">2016</option>
        <option value="2015">2015</option>
        <option value="2014">2014</option>
        <option value="2013">2013</option>
        <option value="2012">2012</option>
        <option value="2011">2011</option>
        <option value="2010">2010</option>
      </select>
    </div>

  <div class="form-group">
          <label>TIME</label>
      <select name="atime">
        <option><?php echo htmlentities($result->atime);?></option>
        <option value="08:00 - 09:00 AM">08:00 - 09:00 AM</option>
        <option value="09:00 - 10:00 AM">09:00 - 10:00 AM</option>
        <option value="10:00 - 11:00 AM">10:00 - 11:00 AM</option>
        <option value="11:00 - 12:00 PM">11:00 - 12:00 PM</option>
        <option value="12:00 - 01:00 PM">12:00 - 01:00 PM</option>
        <option value="02:00 - 03:00 PM">02:00 - 03:00 PM</option>
        <option value="03:00 - 04:00 PM">03:00 - 04:00 PM</option>
        <option value="04:00 - 05:00 PM">04:00 - 05:00 PM</option>
        <option value="05:00 - 06:00 PM">05:00 - 06:00 PM</option>
      </select>
  </div>
  <div class="form-group">
    <label>DATE</label>
    <input type="date" name="adate" value="<?php echo htmlentities($result->adate);?>"  required='true'>
  </div>
  <div class="form-group">
    <label>MODEL</label>
    <input type="text" name="model" value="<?php echo htmlentities($result->model);?>" readonly='true'  required='true'>
  </div>
  <div class="form-group">
    <label>SERVICES</label>
    <input type="text" name="services" value="<?php echo htmlentities($result->services);?>" readonly='true' required='true'>
  </div>
  <button type="submit" class="btn btn-default" name="submit" id="submit">Update</button>
    <?php $cnt=$cnt+1;}} ?>
</div>
<?php include('includes/footer.php');?>
<script src="assets/js/java.js"></script>
</body>
</html>
