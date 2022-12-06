<?php include('includes/db_conn.php');
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

<div class="sidebar-links">
  <br/><br/>
  <br/><br/>
  <h1>Pending Tasks</h1>
 <table class="appointments">
  <thead >
        <tr class="headtt">
        <td style="background-color:grey">#</td>
        <td style="background-color:grey">Client Name</td>
        <td style="background-color:grey">Appointment Time</td>
        <td style="background-color:grey">Appointment Date</td>
        <td style="background-color:grey">Car Model</td>
        <td style="background-color:grey">Services To be done</td>
        <td style="background-color: red">Action</td>





           </tr>
    </thead>
<?php
$tid=0;
$name = $_SESSION["login"];
$sql = "SELECT*FROM tbl_appointment WHERE name=:Mname AND status3=:tid";
$query = $db->prepare($sql);
$query-> bindParam(':Mname', $name, PDO::PARAM_STR);
$query-> bindParam(':tid', $tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){

foreach($results as $result)
{ ?>
<tr align="center">
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($result->username);?></td>
<td><?php echo htmlentities($result->atime);?></td>
<td><?php echo htmlentities($result->adate);?></td>
<td><?php echo htmlentities($result->model);?></td>
<td><?php echo htmlentities($result->services);?></td>
</td>
<td>
 <div class="confirm">
              <a style="text-decoration: none; color: white;" href="complete.php?apoint_id=<?php echo htmlentities($result->apoint_id);?>" onclick="return confirm('Do you really want to confirm booking as complete?')">complete</a>
    </div>
  </td>
</tr>
<?php $cnt=$cnt+1; }} ?>
 </table>
  </div>

</body>
</html>
