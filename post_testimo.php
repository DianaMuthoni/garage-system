<?php
include('includes/connection.php');
include('includes/path.php');
  if(strlen($_SESSION['user_login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['save']))
  {
  $email=$_SESSION['user_login'];

  $testimonial=$_POST['testimonial'];
  $status = 0;


      $query = "INSERT INTO tbl_testimonies (email,testimonial)
      VALUES ('$email','$testimonial')";

    $db->exec($query);

      echo "<script>alert('Saved succesfully')</script>";

  }
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
  <h2>My Testimony</h2>
  <p></p>
</div>

<div class="profile">
	<h1>Post A Testimonial</h1>
			<form class="form5" method="post">
				      <h3>Testimonial</h3>
						<textarea name="testimonial" rows="10" cols="80"></textarea>
						
						<button type="submit" name="save">Save</button>
				</form>
      </div>
<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
