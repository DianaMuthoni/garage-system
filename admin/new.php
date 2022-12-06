<?php include('includes/db_conn.php'); ?>
<?php
if(isset($_REQUEST['apoint2_id']))
  {
$apoint2_id=intval($_GET['apoint2_id']);
$status=2;
$CancelledBy='a';
$sql = "UPDATE tbl_appointment SET status=:status,CancelledBy=:CancelledBy WHERE  apoint_id=:apoint2_id";
$query = $db->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':CancelledBy',$CancelledBy , PDO::PARAM_STR);
$query-> bindParam(':apoint2_id',$apoint2_id, PDO::PARAM_STR);
$query -> execute();

echo '<script>alert("Booking Cancelled successfully")</script>';
echo "<script>window.location.href ='new.php'</script>";


}


if(isset($_REQUEST['apoint_id']))
  {
$apoint_id=intval($_GET['apoint_id']);
$status=1;
$CancelledBy='a';
$sql = "UPDATE tbl_appointment SET status=:status WHERE apoint_id=:apoint_id";
$query = $db->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':apoint_id',$apoint_id, PDO::PARAM_STR);
$query -> execute();
echo '<script>alert("Booking Confirmed successfully")</script>';
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
	  <h2>New Appointment Booked</h2>

  <div class="search-input">
        <label>Search</label>
     <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>

        </div>

<table id="customers" class="table table-striped mt32 customers-list">
  <thead >
        <tr class="headtt">
        <td >#</td>
        <td>User</td>
        <td>Vehicle Make</td>
        <td>Mileage Covered</td>
        <td>Vehicle Year</td>
        <td>Prefered Time</td>
        <td>Prefered Date</td>
        <td>Vehicle Model</td>
        <td>Services Required</td>
        <td>Comments</td>
        <td>Booking Date</td>
        <td>Status</td>
        <td style="background-color: red;">action</td>
           </tr>
    </thead>
<?php
$tid=0;
$sql = "SELECT tbl_appointment.apoint_id as apoint_id,tbl_appointment.make as make,tbl_appointment.model as model,tbl_appointment.atime as atime,tbl_appointment.email as email,tbl_appointment.mileage as mileage,tbl_appointment.services as services,tbl_appointment.bookingdate as bookingdate, tbl_appointment.year as year,tbl_appointment.adate as adate,tbl_appointment.CancelledBy as cancelby,tbl_appointment.atime as atime,tbl_appointment.UpdationDate as upddate,tbl_appointment.comments as comments,tbl_appointment.status as status,tbl_user.username as username from tbl_appointment join tbl_user on tbl_user.email=tbl_appointment.email WHERE tbl_appointment.status=:tid";
$query = $db -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>
              <tr>
              <td><?php echo htmlentities($cnt);?></td>
              <td><?php echo htmlentities($result->username);?></td>
              <td><?php echo htmlentities($result->make);?></td>
              <td><?php echo htmlentities($result->mileage);?></td>
              <td><?php echo htmlentities($result->year);?></td>
              <td><?php echo htmlentities($result->atime);?></td>
              <td><?php echo htmlentities($result->adate);?></td>
              <td><?php echo htmlentities($result->model);?></td>
              <td><?php echo htmlentities($result->services);?></td>
              <td><?php echo htmlentities($result->comments);?></td>
              <td><?php echo htmlentities($result->bookingdate);?></td>
              <td><?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->cancelby=='a')
{
echo "Canceled by you at " .$result->upddate;
}
if($result->status==2 and $result->cancelby=='u')
{
echo "Canceled by User at " .$result->upddate;

}
?></td>
<?php if($result->status==2)
{
  ?><td style="color: red" >Cancelled</td>
<?php } else {?>
              <td>
              <div class="confirm">
              <a  href="new.php?apoint_id=<?php echo htmlentities($result->apoint_id);?>" onclick="return confirm('Do you really want to confirm booking')" >Confirm</a>
              </div>
              <br/>
              <div>
              <a href="edit-apoint1.php?edit_id=<?php echo htmlentities($result->apoint_id);?>" onclick="return confirm('Do you really want to edit booking')" ><i style="color: blue; font-size: 20px;" class="fa fa-edit" aria-hidden="true"></i></a>
              </div>
              <br/>
             <div class="cancle">
              <a href="new.php?apoint2_id=<?php echo htmlentities($result->apoint_id);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancle</a>
              </div>
              </td>
              <?php }?>

              </tr>
             <?php $cnt=$cnt+1;} }?>
</table>
<p style="margin-top:5%; color: blue;"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>
</div>
<?php include('includes/footer.php');?>
       <script src="assets/js/java.js"></script>
</body>
</html>
