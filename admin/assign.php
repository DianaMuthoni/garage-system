<?php include('includes/db_conn.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Auto Express Garage </title>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
	<h2>available Services</h2>
		      <div class="search-input">
        <label>Search</label>
     <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>

        </div>
<table id="customers" class="table table-striped mt32 customers-list">
  <thead >
        <tr class="headtt">
        <td>#</td>
        <td>Name</td>
        <td>Mileage</td>
        <td>Year</td>
        <td>Name</td>
        <td>Time</td>
        <td>Car Type</td>
        <td>Services</td>
        <td>Status</td>
        <td style="background-color: red;">action</td>


           </tr>
    </thead>
<?php
$tid=1;
$sql = "SELECT tbl_appointment.apoint_id as apoint_id,tbl_appointment.make as make,tbl_appointment.model as model,tbl_appointment.atime as atime,tbl_appointment.email as email,tbl_appointment.mileage as mileage,tbl_appointment.services as services,tbl_appointment.bookingdate as bookingdate, tbl_appointment.year as year,tbl_appointment.adate as adate,tbl_appointment.CancelledBy as cancelby,tbl_appointment.atime as atime,tbl_appointment.name as name,tbl_appointment.comments as comments,tbl_appointment.status as status,tbl_appointment.status3 as status3,tbl_appointment.status2 as status2,tbl_user.username as username from tbl_appointment join tbl_user on tbl_user.email=tbl_appointment.email WHERE tbl_appointment.status=:tid";

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
              <td><?php echo htmlentities($result->email);?></td>
              <td><?php echo htmlentities($result->mileage);?></td>
              <td><?php echo htmlentities($result->year);?></td>
              <td><?php echo htmlentities($result->atime);?></td>
              <td><?php echo htmlentities($result->adate);?></td>
              <td><?php echo htmlentities($result->model);?></td>
              <td><?php echo htmlentities($result->services);?></td>
               <td><?php if($result->status3==0)
{
echo "<h4 style='color:red;'>Pending</h4>";
}
if($result->status3==1)
{
echo "<h4 style='color:green;'>Task Completed</h4>";
}
?></td>

<?php if($result->status2==1 OR $result->status2==2)
{
  ?><td style="color: red" >assigned to:<h4 style="color: blue;"><?php echo htmlentities($result->name);?></h4></td>

<?php } else {?>

              <td>
                <div class="confirm">
                <a  href="service-assign.php?apoint_id=<?php echo htmlentities($result->apoint_id);?>">assign</a>
              </div>
              </td>
<?php }?>
              </tr>

             <?php $cnt=$cnt+1;} }?>
<td>
</td>
</tr>
</table>
</div>
<?php include('includes/footer.php');?>
<script src="assets/js/java.js"></script>
</body>
</html>
