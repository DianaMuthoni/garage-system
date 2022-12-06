<?php
    require_once 'includes/connection.php';
	require_once 'includes/path.php';
		if(strlen($_SESSION['user_login'])==0)
  { 
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html>
<head>
 <title>Auto Express Grage</title>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
   <link href="assets/css/style.css" rel="stylesheet">
   <link href="style1.css" rel="stylesheet">
    <link href="assets/fonts/css/all.css" rel="stylesheet">
</head>
<body>

<?php include('includes/header.php');?>


<div class="banner-pages">
  <img src="assets/images/recent-car-4.jpg">
  <h2>My Profile</h2>
  <p></p>
</div>


	
	
<?php

	           $email = $_SESSION['user_login'];

				$select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE email=:uemail");
				$select_stmt->execute(array(":uemail"=>$email));

				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

				if(isset($_SESSION['user_login']))
				{
			?>

<div class="profile">
	<h1>My Profile</h1>
			<form class="form5">
				        <label>name</label>
				        <input type="text" placeholder="<?php echo $row['username'];?>">
						
						<label>email</label>
						<input type="text" placeholder="<?php echo $row['email'];?>">
						
						<label>number</label>
						<input type="text" placeholder="<?php echo $row['username'];?>">
						
						<label>email</label>
						<input type="text" placeholder="<?php echo $row['email'];?>">
						
						<label>number</label>
						<input type="text" placeholder="<?php echo $row['username'];?>">
						
						
						<button type="submit" name="update">update</button>
				</form>
      </div>
<?php } }?>
<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
