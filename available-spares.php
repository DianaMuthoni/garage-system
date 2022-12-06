<!DOCTYPE html>
<html>
<head>
	<title>Auto Express Garage </title>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
	 <link href="assets/css/style.css" rel="stylesheet">
	    <link href="style1.css" rel="stylesheet">
     <link href="assets/fonts/css/all.css" rel="stylesheet">
</head>
<body>

<?php include('includes/header.php');?>

<?php include('includes/signin.php');?>

<?php include('includes/signup.php');?>

<div class="banner-pages">
  <img src="assets/images/122.jpg">
  <h2>Available Spare Parts</h2>

</div>
<br /><br />
				<strong><h3 style="color: rgb(128,255,128,1); text-align: center;font-size: 20px; font-weight: 900;">Available Spare Parts</h3></strong>

				<br /><br />

				<?php
				include('includes/connection.php');
				$sql = "SELECT * FROM `tbl_autospare` ORDER BY `price` ASC";

					 $q = $db->query($sql);
					 $q->setFetchMode(PDO::FETCH_ASSOC);
					 ?>
					 <?php while ($row = $q->fetch()): ?>
                          <div class = "spare-parts"> 

                          	<img src = "admin/uploads/<?php echo htmlspecialchars($row['image']) ?>" height = "120" width = "100"/>
							<div class="text" style="float: right; padding: 15px;">			
							<h4 style="font-weight: 500;"><?php echo $row['name']?></h4><br>
						    <h5>condition:<span style="color: #00ff00;"><?php echo $row['kondation']?></span></h5><br>
						    <h5>Brand: <span style="color: orange;"><?php echo $row['brand']?></span></h5><br>
                            <h5>warranty: <span style="color: purple;"><?php echo $row['warranty']?></span></h5><br>
					        <h5>Part No: <span style="color: red;"><?php echo $row['partno']?></span></h5><br>
							</div>
						
<br/><br><br/><br><br/><br>
							<h5 style = "color:#00ff00;"><?php echo "Price: Ksh. ".$row['price'].".00"?></h5>

							<br/>
	                      <!---<div class="spare-butt">
							<button type="submit" name="order">Order</button>
							</div>--->		
									</div>
									 <?php endwhile; ?>

<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
