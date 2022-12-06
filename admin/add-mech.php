<?php
include('includes/db_conn.php');



if(isset($_REQUEST['add-mec'])) //button name "register"
{
	$name	= strip_tags($_REQUEST['name']);
	$email		= strip_tags($_REQUEST['email']);
	$phone  = strip_tags($_REQUEST['phone']);
	$specialist  = strip_tags($_REQUEST['specialist']);
	$experience  = strip_tags($_REQUEST['experience']);
	$password	= strip_tags($_REQUEST['password']);

	if(empty($name)){
		$errorMsg[]="Please enter name";
	}
	else if(empty($email)){
		$errorMsg[]="Please enter email";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Please enter a valid email address";
	}
	else if(empty($phone)){
		$errorMsg[]="Please enter PhoneNumber";
	}
	else if(empty($specialist)){
		$errorMsg[]="Please enter specialisation";
	}
	else if(empty($experience)){
		$errorMsg[]="Please enter experience";
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
			$select_stmt=$db->prepare("SELECT name, email FROM tbl_mechanic
										WHERE name=:Mname OR email=:Memail");

			$select_stmt->execute(array(':Mname'=>$name, ':Memail'=>$email));
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

			if($row["name"]==$name){
				$errorMsg[]="Sorry Mechanic already exists";
			}
			else if($row["email"]==$email){
				$errorMsg[]="Sorry email already exists";
			}
			else if(!isset($errorMsg))
			{
				$new_password = password_hash($password, PASSWORD_DEFAULT);

				$insert_stmt=$db->prepare("INSERT INTO tbl_mechanic	(name,email,phone,specialist,experience,password) VALUES
																(:Mname,:Memail,:Mphone,:Mspecialist,:Mexperience,:Mpassword)");

				if($insert_stmt->execute(array(	':Mname'	=>$name,
												':Memail'	=>$email,
                                                ':Mphone' =>$phone,
                                                ':Mspecialist' =>$specialist,
												':Mexperience' =>$experience,
												':Mpassword'=>$new_password))){

					$registerMsg="Mechanic Registered Successfully";
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
	<h2>Add Mechanics</h2>

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
<div class="profile">
			<form class="form5">
				    <div class="form-group">
				    <label>Name</label>
				    <input type="text" name="name">
						</div>
						<div class="form-group">
						<label>email</label>
						<input type="text" name="email">
						</div>
						<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone">
						</div>
						<div class="form-group">
						<label>Specialisation</label>
						<input type="text" name="specialist">
						</div>
						<div class="form-group">
						<label>Experience</label>
						<input type="text" name="experience">
						</div>
						<div class="form-group">
						<label>Password</label>
						<input type="Password" name="password">
						</div>

						<button type="submit" name="add-mec"><i class="fa fa-plus">Add</i></button>
				</form>
      </div>
   </div>
   <?php include('includes/footer.php');?>
</body>
</html>
