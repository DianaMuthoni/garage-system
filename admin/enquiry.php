<?php include('includes/db_conn.php'); ?>

<?php
if(isset($_REQUEST['enq_id']))
  {
$enq_id=intval($_GET['enq_id']);
$status=1;
$sql = "UPDATE tbl_enquiry SET status=:status WHERE  enq_id=:enq_id";
$query = $db->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':enq_id',$enq_id, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
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
	<h2>enquiries</h2>

	<table id="customers">
  <thead >
        <tr class="headtt">
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Subject</td>
        <td>Message</td>
        <td>posted Date</td>
        <td>Status</td>
        <td style="background-color:red">action</td>
           </tr>
    </thead>
<?php $sql = "SELECT * from tbl_enquiry";
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
              <td><?php echo htmlentities($result->name);?></td>
              <td><?php echo htmlentities($result->email);?></td>
              <td><?php echo htmlentities($result->mobile);?></td>
              <td><?php echo htmlentities($result->subject);?></td>
              <td><?php echo htmlentities($result->message);?></td>
              <td><?php echo htmlentities($result->date);?></td>


<td><?php if($result->status==0)
{
echo "<h4 style='color:blue;'>Waiting to be read</h4>";
}
if($result->status==1)
{
echo "<h4 style='color:green;'>Read</h4>";
}
?></td>
              <td>
              <div style="margin-left: 70px;" class="confirm">
              <a  href="enquiry.php?enq_id=<?php echo htmlentities($result->enq_id);?>" onclick="return confirm('Do you really want to mark as Read?')" >Read</a>
              </div>
              </td>


              </tr>
             <?php $cnt=$cnt+1;} }?>
</table>
</div>
<?php include('includes/footer.php');?>
</body>
</html>
