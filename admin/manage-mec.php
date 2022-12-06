
<?php include('includes/db_conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Auto Express Garage </title>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">\
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
	<h2>Assign Services</h2>
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
        <td>Specialisation</td>
        <td>Experience</td>
        <td style="background-color: red;">action</td>
           </tr>
    </thead>
<?php
$sql = ("SELECT * FROM tbl_mechanic");
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
              <td><?php echo htmlentities($result->specialist);?></td>
              <td><?php echo htmlentities($result->experience);?></td>
              <td>
       <div style="background-color: blue; margin-left: 60px;" class="confirm">

              <a style="text-decoration: none;" href="#?mec_id=<?php echo htmlentities($result->mec_id);?>">Edit</a>
           </div>
              </td>
              </tr>
             <?php $cnt=$cnt+1;} }?>
</table>
</div>
<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
