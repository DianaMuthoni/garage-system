<?php include('includes/db_conn.php');
?>


<!DOCTYPE html>
<html>
<head>
  <title>Prime Auto Garage </title>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="../admin/assets/css/style.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
  <br/><br/>
  <br/><br/>
 <table class="appointments">
  <thead >
      <tr class="headtt">
        <td style="background-color:grey">name</td>
        <td style="background-color:grey">email</td>



           </tr>
    </thead>
<?php

$name = $_SESSION["login"];

$sql = "SELECT * FROM tbl_mechanic  WHERE name=:Mname";
$query = $db->prepare($sql);
$query -> bindParam(':Mname', $name, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){

foreach($results as $result)
{ ?>
<tr align="center">
<td><?php echo htmlentities($result->name);?></td>
<td><?php echo htmlentities($result->email);?></td>
</tr>
<?php $cnt=$cnt+1; }} ?>
 </table>
  </div>

</body>
</html>
