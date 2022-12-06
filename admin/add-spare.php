
<?php include('includes/upload.php'); ?>
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
	<h2> Create Spare-Part:</h2>

<div class="add-spare">
  <form class="form5" method="POST" enctype="multipart/form-data">
    <div class="controls">
    <label>Part_No</label>
    <input type="text" name="partno" required>
    </div>
    <div class="controls">
    <label>Price</label>
    <input type="text" name="price" required>
    </div>
    <div class="controls">
    <label>Condation</label>
    <input type="text" name="kondation" required>
    </div>
    <div class="controls">
    <label>Part_Name</label>
    <input type="text" name="name" required>
    </div>
    <div class="controls">
    <label>Brand</label>
    <input type="text" name="brand" required>
    </div>
    <div class="controls">
    <label>Warant</label>
    <input type="text" name="warranty" required>
    </div>
    <div class="controls">
    <label>Image</label>
    <input type="file" name="file" required>
    </div>
<br/><br/><br/>

    <button type="submit" name="submit">submit</button>

  </form>
</div>
</div>
<?php include('includes/footer.php');?>
</body>
</html>
