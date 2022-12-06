<?php
require_once 'connection.php';


if(isset($_REQUEST['register'])) 
{
	$username	= strip_tags($_REQUEST['username']);	
	$email		= strip_tags($_REQUEST['email']);		
	$password	= strip_tags($_REQUEST['password']);	
    //$password2	= strip_tags($_REQUEST['password2']);
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
   //else if(!$password = $password2){
	   // $errorMsg[] = "The Password must match";
	//}
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

                  echo "<script>alert('Registration succesfully done Please login.')</script>";

                 	$currentpage=$_SERVER['REQUEST_URI'];
                     echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";     
					 
				}
			}
		}
		catch(PDOException $e)
		{
		$e->getMessage();
		}
	}
}






//login code
session_start();

if(isset($_REQUEST['login']))	
{
	$username	=strip_tags($_REQUEST["txt_username_email"]);
	$email		=strip_tags($_REQUEST["txt_username_email"]);	
	$password	=strip_tags($_REQUEST["password"]);			

	if(empty($username)){
		$errorMsg[]="Enter Username Or Email";
	}
	else if(empty($email)){
		$errorMsg[]="Enter Username Or Email";
	}
	else if(empty($password)){
		$errorMsg[]="Enter Password";
	}
	else
	{
		try
		{
			$select_stmt=$db->prepare("SELECT * FROM tbl_user WHERE username=:uname OR email=:uemail"); 
			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

			if($select_stmt->rowCount() > 0)
			{
				if($username==$row["username"] OR $email==$row["email"]) 
				{
					if(password_verify($password, $row["password"])) 
					{
						$_SESSION["user_login"] = $row["email"] OR $row["username"];
						$loginMsg = "Successfully Login...";	
						$currentpage=$_SERVER['REQUEST_URI'];
                       echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";	
					}
					else
					{
						$errorMsg[]="wrong username, email or password";
					}
				}
				else
				{
					$errorMsg[]="wrong username, email or password";
				}
			}
			else
			{
				$errorMsg[]="wrong username, email or password";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
}
?>