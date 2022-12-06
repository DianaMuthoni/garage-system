<?php
    require_once 'includes/connection.php';
	require_once 'includes/path.php';
		if(strlen($_SESSION['user_login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['change']))
	{
$password=($_POST['password']);
$newpassword=($_POST['newpassword']);
$email = $_SESSION['user_login'];
$sql ="SELECT password FROM tbl_user WHERE email=:uemail AND password=:upassword";
$query= $db -> prepare($sql);
$query-> bindParam(':uemail', $email, PDO::PARAM_STR);
$query-> bindParam(':upassword', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
	if (password_verify($password, $result['password'])) {
	
$con="UPDATE tbl_user SET password=:newpassword WHERE email=:uemail";
$chngpwd1 = $db->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo '<script>alert("Your Password succesfully changed")</script>';
}
else {
echo '<script>alert("Your current password is wrong")</script>';	
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Prime Auto Garage </title>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
   <link href="assets/css/style.css" rel="stylesheet">
   <link href="style1.css" rel="stylesheet">
    <link href="assets/fonts/css/all.css" rel="stylesheet">
    	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>

<?php include('includes/header.php');?>


<div class="banner-pages">
  <img src="assets/images/recent-car-4.jpg">
  <h2>Change Password</h2>
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
	<h1>Change Password</h1>
			<form class="form5" method="post">
				        <label>Old Password</label>
				        <input type="Password" name="password" placeholder="<?php echo $row['password'];?>">
						
						<label>New Password</label>
						<input type="password" name="newpassword" id="newpassword" placeholder="">
						
						<label>Confirm Password</label>
						<input type="password" name="confirmpassword" id="confirmpassword" placeholder="">
						
						
						
						<button type="submit" name="change">Save</button>
				</form>
      </div>
<?php } }?>
<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
