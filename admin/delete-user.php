<?php include('includes/db_conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Auto Express Garage</title>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="style1.css">
 <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
	<h2>Registred Users</h2>
      <div class="search-input">
        <label>Search</label>
     <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>

        </div>
<table id="customers" class="table table-striped mt32 customers-list">
  <thead >
      <tr class="headtt">
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>RegDate</td>
           </tr>
    </thead>
<?php $sql = "SELECT * from tbl_user";
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
              <td><?php echo htmlentities($result->username);?></td>
              <td><?php echo htmlentities($result->email);?></td>
              <td><?php echo htmlentities($result->regdate);?></td>
              </tr>
             <?php $cnt=$cnt+1;} }?>
</table>
</div>
<?php include('includes/footer.php');?>
<script src="assets/js/java.js"></script>
</body>
</html>
