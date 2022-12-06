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
<title>Auto Express Garage </title>
  <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
   <link href="assets/css/style.css" rel="stylesheet">
   <link href="style1.css" rel="stylesheet">
    <link href="assets/fonts/css/all.css" rel="stylesheet">
</head>
<body>

<?php include('includes/header.php');?>


<div class="banner-pages">
  <img src="assets/images/recent-car-4.jpg">
  <h2>Ordered</h2>
  <p></p>
</div>


	
	
<?php

        $email = $_SESSION['user_login'];

        $select_stmt = $db->prepare("SELECT * FROM tbl_testimonies WHERE email=:uemail");
        $select_stmt->execute(array(":uemail"=>$email));


        if(isset($_SESSION['user_login']))
        {
    
?>
<div class="booking">

  <h1>Ordered</h1>
     <table class="appointments">
  <thead >
        <tr>
        <td style="background-color:grey">#</td>
        <td style="background-color:grey"></td>
        <td style="background-color:grey"></td>
         <td style="background-color:grey"></td>
       
    
           </tr>
    </thead>
  <?php
$i=0;
while( $row = $select_stmt->fetch(PDO::FETCH_ASSOC)){ ?>
          <tr>
           <td></td> 

          <td></td>
           
          <td></td>

          <td></td>
        </tr>
             
<?php 
$i++;
}}}
 ?>
 </table>
</div>
 <br><br><br>
  
<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
