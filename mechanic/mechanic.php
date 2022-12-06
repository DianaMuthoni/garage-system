<?php include('includes/db_conn.php');?>
 <?php include('includes/path.php');?>


<!DOCTYPE html>
<html>
<head>
  <title>Prime Auto Garage </title>
<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">

	<style type="text/css">
		body{
		 background-image: url(../admin/assets/images/knowledge_base_bg.jpg);
		 background-size: cover;
		}
	.form-container {
		margin-left: 20%;
		margin-top: 15%;
		 width: 50%;
			height: 0 auto;
			color: white;

		}
		.input-cnt {
			display: flex; /* display the icon and the input in a line */
			margin-bottom: 15px;
		}
		.input-cnt:last-child {
			margin-bottom: 0px;
		}
		.input-cnt > i {
			min-width: 40px; /* set a minimum width for the icon */
			padding: 10px; /* make sure the icon is centered vertically */
			text-align: center; /* horizontally center the icon */
			background: lightgrey;
			border-top-left-radius: 20px;
			border-bottom-left-radius: 20px;
			color: #0076ff;
		}
		/* change styles when focused */
		.input-cnt:hover > i {
			background: #0076ff;
			color: white;
		}
		/* style the inputs */
		.input-cnt > input[type="text"], .input-cnt > input[type="password"] {
			outline: none;
			border: none;
			padding: 10px;
			border: 1px solid lightgrey;
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
			width: 100%;
		}
		/* style the submit button */
		.input-cnt > input[type="submit"] {
			border: none;
			border-radius: 20px;
			outline: none;
			width: 75%;
			margin: 0 auto;
			font-size: 105%;
			padding: 8px;
			color: #0076ff;
			background: white;
			transition-duration: .5s;
		}
		/* add a hover effect for the submit button */
		.input-cnt > input[type="submit"]:hover {
			color: white;
			background: #0076ff;
		}
		a{
			padding-left:42%;
			text-decoration: none;
			color: white;
			border-radius: 50px;
		  font-weight: 1000;
		  font-size: 20px;
		}
		a:hover{
			color: blue;
		}
	</style>
</head>
<body>

	<div class="form-container">
	<h2 style="text-align: center">Mechanic Login </h2>
	<br  />
		 <?php
	 if(isset($errorMsg))
	 {
		foreach($errorMsg as $error)
		{
		?>
		  <div style="padding-left: 270px;  color: red;" class="alert-danger">
			 <strong>WRONG! <?php echo $error; ?></strong>
		  </div>
				<?php
		}
	 }?>
	 <br  />
		<form method="post">

			<div class="input-cnt">
				<i class="material-icons">person</i>
				<input type="text" placeholder="Email or username" name="txt_username_email" />
			</div>

			<div class="input-cnt">
				<i class="material-icons">lock</i>
				<input type="password" placeholder="Password" name="password" />
			</div>

			<div class="input-cnt">
				<input type="submit" value="Login" name="login0" />
			</div>

		</form>
	  </div>
	  <br/><br/><br/><br/>

<h4><a href="../index.php">Home Page</a></h4>
</body>
</html>
