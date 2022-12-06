<?php include('includes/db_conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Auto Express Garage </title>
	  <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links" id="print">
	<h2>Edit Auto Spares</h2>
      <div class="search-input">
        <label>Search</label>
     <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>

        </div>
<table id="customers" class="table table-striped mt32 customers-list">
  <thead >
      <tr class="headtt">
        <td >#</td>
        <td >Spare_No</td>
        <td >Price</td>
        <td >Condation</td>
        <td >Spare Name</td>
        <td >Brand</td>
        <td >Waranty</td>
        <td >Image</td>
        <td >action</td>
           </tr>
    </thead>
    <?php $sql = "SELECT * from tbl_autospare";
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
              <td><?php echo htmlentities($result->partno);?></td>
              <td>Kshs: <?php echo htmlentities($result->price);?></td>
              <td><?php echo htmlentities($result->kondation);?></td>
              <td><?php echo htmlentities($result->name);?></td>
              <td><?php echo htmlentities($result->brand);?></td>
              <td><?php echo htmlentities($result->warranty);?></td>
              <td><img src = "uploads/<?php echo htmlentities($result->image);?>"height = "50" width = "70"/></td>
              <td>
              <div class="confirm" style="margin-left: 40px; background-color: blue;">
              <a  href="update-spare.php?sp_id=<?php echo htmlentities($result->sp_id);?>">Update</a>
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
