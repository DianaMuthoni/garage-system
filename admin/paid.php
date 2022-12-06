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
        <td >No.</td>
        <td>Client</td>
        <td>Vehicle Make</td>
        <td>Time Done</td>
        <td>Date Done</td>
        <td>Vehicle Model</td>
        <td>Services Done</td>
        <td>Cost</td>
        <td style="background-color: red;">action</td>
           </tr>
    </thead>
<?php
$sql = "SELECT * From tbl_appointment WHERE cost is not null";
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
              <td><?php echo htmlentities($result->make);?></td>
              <td><?php echo htmlentities($result->atime);?></td>
              <td><?php echo htmlentities($result->adate);?></td>
              <td><?php echo htmlentities($result->model);?></td>
              <td><?php echo htmlentities($result->services);?></td>
              <td>Kes. <?php echo htmlentities($result->cost);?></td>
                <td>
                  <div style="color: blue;" class="confirm">
                              <a style="text-decoration: none; color: white;" href="receiptpage.php?apoint_id=<?php echo htmlentities($result->apoint_id);?>" onclick="return confirm('Do you really want to Print Receipt?')">Receipt</a>
                    </div>
                </td>
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
