<?php include('includes/db_conn.php'); ?>
<?php
if(isset($_POST['submit']))
  {


 $eid=$_GET['apoint_id'];
 $paymentM=$_POST['paymentM'];
 $cost=$_POST['cost'];
 $refno=$_POST['refno'];

$sql="UPDATE tbl_appointment SET paymentM=:paymentM,cost=:cost,refno=:refno  WHERE apoint_id=:eid";
$query=$db->prepare($sql);
$query->bindParam(':paymentM',$paymentM,PDO::PARAM_STR);
$query->bindParam(':cost',$cost,PDO::PARAM_STR);
$query->bindParam(':refno',$refno,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

   $query->execute();
echo '<script>alert("service Billed Successfully")</script>';
echo "<script>window.location.href ='paid.php'</script>";
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
	<h2>Bill Service</h2>
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
  <div class="add-group">
    <label>Payment Method  :</label>
   <select name="paymentM" required="true" id="payment" onchange="onchangeStatus()">
        <option>Payment Method</option>
        <option value="mpesa">Mpesa</option>
        <option value="cash">Cash</option>
    </select>
</div>
<div class="add-group">
    <label>Amount :</label>
    <input type="text" name ="cost" required="true">
</div>
<div class="add-group" id="ref">
    <label>Ref. No :</label>
    <input type="text" name ="refno">
</div>

  <button type="submit" class="btn btn-default" name="submit" id="submit">Update</button>
    <?php $cnt=$cnt+1;}} ?>
</div>
<?php include('includes/footer.php');?>
<script src="assets/js/java.js"></script>
</body>
</html>
