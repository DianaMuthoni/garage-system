<?php
include('includes/db_conn.php');



if(isset($_REQUEST['register'])) //button name "register"
{
	$username	= strip_tags($_REQUEST['username']);
	$email		= strip_tags($_REQUEST['email']);
	$password	= strip_tags($_REQUEST['password']);

	if(empty($username)){
		$errorMsg[]="Please enter username";
	}
	else if(empty($email)){
		$errorMsg[]="Please enter email";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Please enter a valid email address";
	}
	else if(empty($password)){
		$errorMsg[]="Please enter password";
	}
	else if(strlen($password) < 6){
		$errorMsg[] = "Password must be atleast 6 characters";
	}
	else
	{
		try
		{
			$select_stmt=$db->prepare("SELECT username, email FROM tbl_user
										WHERE username=:uname OR email=:uemail");

			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

			if($row["username"]==$username){
				$errorMsg[]="Sorry username already exists";
			}
			else if($row["email"]==$email){
				$errorMsg[]="Sorry email already exists";
			}
			else if(!isset($errorMsg))
			{
				$new_password = password_hash($password, PASSWORD_DEFAULT);

				$insert_stmt=$db->prepare("INSERT INTO tbl_user	(username,email,password) VALUES
																(:uname,:uemail,:upassword)");

				if($insert_stmt->execute(array(	':uname'	=>$username,
												':uemail'	=>$email,
												':upassword'=>$new_password))){

					$registerMsg="User Successfully Created";
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Presige Auto Garage </title>
	  <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
	<h2>Add users</h2>
	<br />
	 <?php
    if(isset($errorMsg))
    {
      foreach($errorMsg as $error)
      {
      ?>
        <div style=" color: red;" class="alert-danger">
          <strong>WRONG! <?php echo $error; ?></strong>
        </div>
            <?php
      }
    }
    if(isset($registerMsg))
    {
    ?>
      <div style="color: green;" class="alert-success">
        <strong><?php echo $registerMsg; ?></strong>
      </div>
        <?php
    }
    ?>
    <br />
<div class="profile">
			<form class="form5">
        <div class="form-control">
          <label for="name">Name</label>
          <input type="text" placeholder="Name" id="username" name="username" >
        </div>
        <div class="form-control">
          <label for="username">Email</label>
          <input type="email" placeholder="info@gmail.com" id="email" name="email">
        </div>
        <div class="form-control">
          <label for="username">Password</label>
          <input type="password" placeholder="Password" id="password" name="password">
        </div>
        <div class="form-control">
          <label for="username">Confirmpassword</label>
          <input type="password" placeholder="Confirm Password" id="password2">
        </div>

						<button type="submit" name="register"><i class="fa fa-plus">Add</i></button>
				</form>
      </div>
   </div>
   <?php include('includes/footer.php');?>
</body>
</html>
