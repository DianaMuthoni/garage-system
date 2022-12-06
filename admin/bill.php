<?php include('includes/db_conn.php');
?>


<!DOCTYPE html>
<html>
<head>
  <title>Auto Expree Garage </title>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
     <h2>Appointment Completed</h2>
      <div class="search-input">
        <label>Search</label>
     <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>

        </div>
<table id="customers" class="table table-striped mt32 customers-list">
  <thead >
        <tr>
        <td style="background-color:grey">#</td>
        <td style="background-color:grey">Client Name</td>
        <td style="background-color:grey">Appointment Time</td>
        <td style="background-color:grey">Appointment Date</td>
        <td style="background-color:grey">Car Model</td>
        <td style="background-color:grey">Services  done</td>
        <td style="background-color:grey">Mechanic Name</td>
        <td style="background-color:grey">Action</td>





           </tr>
    </thead>
<?php
$tid=1;
$sql = "SELECT * From tbl_appointment WHERE status3=:tid";
$query = $db -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<tr align="center">
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($result->email);?></td>
<td><?php echo htmlentities($result->atime);?></td>
<td><?php echo htmlentities($result->adate);?></td>
<td><?php echo htmlentities($result->model);?></td>
<td><?php echo htmlentities($result->services);?></td>
<td style="color: blue;font-weight: 900;"><?php echo htmlentities($result->name);?></td>
<td>
  <div style="color: blue;" class="confirm">
              <a style="text-decoration: none; color: white;" href="billpage.php?apoint_id=<?php echo htmlentities($result->apoint_id);?>" onclick="return confirm('Do you really want to bill services done?')">Bill</a>
    </div>


</td>
</tr>
<?php $cnt=$cnt+1; }} ?>
 </table>
  </div>
<script src="assets/js/java.js"></script>
</body>
</html>
