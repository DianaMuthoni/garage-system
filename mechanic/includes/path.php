<?php 
include("db_conn.php");	

session_start();

	if(isset($_REQUEST['login0']))   //button name is "btn_login" 

{
	$name   =strip_tags($_REQUEST["txt_username_email"]);   //textbox name "txt_username_email"
	$email      =strip_tags($_REQUEST["txt_username_email"]);   //textbox name "txt_username_email"
	$password   =strip_tags($_REQUEST["password"]);       //textbox name "txt_password"
		
	if(empty($name)){
		$errorMsg[]="Enter name Or Email";
	}
	else if(empty($email)){
		$errorMsg[]="Enter name Or Email";
	}
	else if(empty($password)){
		$errorMsg[]="Enter Password";
	}
	else
	{
		try
		{
			$select_stmt=$db->prepare("SELECT * FROM tbl_mechanic WHERE name=:Mname OR email=:Memail"); //sql select query
			$select_stmt->execute(array(':Mname'=>$name, ':Memail'=>$email));   //execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			
			if($select_stmt->rowCount() > 0) //check condition database record greater zero after continue
			{
				if($name==$row["name"] OR $email==$row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
				{
					if(password_verify($password, $row["password"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
					{
						$_SESSION["login"] = $row["name"] OR $row["mec_id"];   //session name is "name"
						$loginMsg = "Successfully Login...";      //user login success message
						header("location: dashboard.php");        //refresh 2 second after redirect to "welcome.php" page
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