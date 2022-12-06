<?php
    require_once 'includes/connection.php';
	require_once 'includes/path.php';
	if(strlen($_SESSION['user_login'])==0)
  { 
header('location:index.php');
}
else{
	if(isset($_POST['update']))
  {


 $username=$_POST['username'];
 $email = $_SESSION['user_login'];

$sql = "UPDATE tbl_user SET username=:uname  WHERE email=:uemail";
 
$query=$db->prepare($sql);
$query->bindParam(':uname',$username,PDO::PARAM_STR);
$query->bindParam(':uemail',$email,PDO::PARAM_STR);
 $query->execute();

   $query->execute();
echo '<script>alert("Profile Updated Successfully")</script>';
  }
  ?>
<!DOCTYPE html>
<html>
<head>
 <title>Presige Auto Garage </title>
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
			<form class="form5" method="post">
				<div class="form-group">
				        <label>Name</label>
				        <input type="text" name="username" placeholder="<?php echo $row['username'];?>">
				</div>
				<div class="form-group">	
						<label>Email</label>
						<input type="text" placeholder="<?php echo $row['email'];?>" readonly="true">
               </div>
               <div class="form-group">		
						<label>Phone</label>
						<input type="text" placeholder="<?php echo $row['username'];?>">
			   </div>		
						
						<button type="submit" name="update">update</button>
				</form>
      </div>
<?php } }?>
<br/><br/>
<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
