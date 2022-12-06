<?php
include('includes/connection.php');

if (isset($_POST['enquire'])) {
$name =  $_POST['name'];
$email =  $_POST['email'];
$mobile =  $_POST['mobile'];
$subject =  $_POST['subject'];
$message =  $_POST['message']; 
$status  = 0;
if(strlen($name) == 0) {
$msg = "Name must be filled";
} 
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$msg = "Please Enter Valid Email ID";
}
else if(strlen($mobile) < 10) {
$msg = "Mobile number must be 10 characters";
}   
else if(strlen($mobile) > 10) {
$msg = "Mobile number must be 10 characters";
}  
   
else if(strlen($subject) == 0) {
$msg = "Subject must be filled";
}
else if(strlen($message) == 0) {
$msg = "message must be filled";
}
else{
 $sql = "INSERT INTO tbl_enquiry(name,email,mobile,subject,message,status) VALUES
 ('$name','$email','$mobile','$subject','$message','$status')";

 echo '<script>alert("submitted sucessfully")</script>';
echo "<script>window.location.href ='enquiry.php'</script>";

    $db->exec($sql);

}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Presige Auto Garage </title>
  <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
   <link href="assets/css/style.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="styl.css">
    <link href="assets/fonts/css/all.css" rel="stylesheet">
</head>
<body>

<?php include('includes/header.php');?>

<?php include('includes/signin.php');?>

<?php include('includes/signup.php');?>

<div class="banner-pages">
  <img src="assets/images/d.jpg">
  <h2>Enquiry</h2>
  <p></p>
</div>
<br/><br/><br/>
<h1 style="text-align: center; color: rgb(128,255,128,1);">Enquiry Form</h1>
<br/><br/><br/>
 <div class="enquiry"> 

 <form method="post">

	<h4 style="color: red; font-style: italic;text-align: center;"><?php if (isset($msg)) echo  $msg; ?></h4>
	<br/>
     
      	<div class="enq-class">
         <label>Name</label>
         <input type="text" name="name">
	</div>

	<div class="enq-class">
         <label>Email</label>
         <input type="email" name="email">
	</div>
    
    <div class="enq-class">
         <label>Phone</label>
         <input type="number" name="mobile">
	</div>

	<div class="enq-class">
         <label>Subject</label>
         <input type="text" name="subject">
	</div>

    <div class="enq-class">
    	<label>Message</label>
         <textarea name="message" cols="40" rows="10"></textarea>
         
	</div>

	<button type="submit" name="enquire">submit</button>

</form>
</div> 
<br/><br/><br/><br/><br/>
<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>