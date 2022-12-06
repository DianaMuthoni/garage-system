<?php include('includes/db_conn.php'); ?>

<?php
if(isset($_REQUEST['testmo2_id']))
  {
$testmo2_id=intval($_GET['testmo2_id']);
$status=2;
$sql = "UPDATE tbl_testimonies SET status=:status WHERE  id=:testmo2_id";
$query = $db->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':testmo2_id',$testmo2_id, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}


if(isset($_REQUEST['testmo_id']))
  {
$testmo_id=intval($_GET['testmo_id']);
$status=1;
$sql = "UPDATE tbl_testimonies SET status=:status WHERE id=:testmo_id";
$query = $db->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':testmo_id',$testmo_id, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Confirm successfully";
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

<div class="sidebar-links">
	<h2>Testimonies</h2>

	<table id="customers">
  <thead >
          <tr class="headtt">
        <td>#</td>
        <td>Email</td>
        <td>Testimony</td>
        <td>posting Date</td>
        <td>Status</td>
        <td style="background-color:red">action</td>
           </tr>
    </thead>
<?php
 $sql = "SELECT * from tbl_testimonies";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>
              <tr>
              <td><?php echo htmlentities($cnt);?></td>
              <td><?php echo htmlentities($result->email);?></td>
              <td><?php echo htmlentities($result->testimonial);?></td>
              <td><?php echo htmlentities($result->postingdate);?></td>
<td><?php if($result->status==0)
{
echo "<h4 style='color:blue;'>Waiting For Approval</h4>";
}
if($result->status==1)
{
echo "<h4 style='color:green;'>Approved</h4>";
}
if($result->status==2)
{
echo "<h4 style='color:red;'>Canceled</h4>";
}
?>
</td>
<?php if($result->status==2)
{
  ?><td>Cancelled</td>
<?php } else {?>
              <td>
              <div style="margin-left: 70px;" class="confirm">
              <a  href="testimonies.php?testmo_id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Approve this testimony')" >Approve</a>
              </div>
              <br/><br/>
              <div style="margin-left: 70px;" class="cancle">
              <a href="testimonies.php?testmo2_id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to cancel this Testimony')" >Cancle</a>
              </div>
              </td>
              <?php }?>

              </tr>
             <?php $cnt=$cnt+1;} }?>
</table>
</div>
<?php include('includes/footer.php');?>
</body>
</html>
