<?php
include('includes/connection.php');
include('includes/path.php');

  if(isset($_POST['submit2']))
  {
    $email=$_SESSION['user_login'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$phone_number=$_POST['phone_number'];
$clientEmail=$_POST['client_email'];
$identification=$_POST['client_identification_number'];
$date_of_repair=$_POST['date_of_repair'];




// $query = "INSERT INTO client(firstName,lastName, customer_phonenumber, customer_email, date_of_repair, status,status2)
$query = "INSERT INTO client(firstName,lastName,client_email,phone_number,id_number,date_of_repair)

      VALUES ('$firstName','$lastName','$clientEmail','$phone_number', '$identification','$date_of_repair')";
      echo '<script>alert("Client registered Successfuly")</script>';
      echo "<script>window.location.href ='Vehicle registration.php'</script>";
      
          $db->exec($query);
      
      
        }
      
        ?>
      
      <!DOCTYPE html>
      <html>
      <head>
       <title>Auto Xpress Garage </title>
        <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
        <link href="assets/css/style.css" rel="stylesheet">
         
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
          <link href="assets/fonts/css/all.css" rel="stylesheet">
      </head>
      <body>
      <?php include('includes/header.php');?>

<?php include('includes/signin.php');?>

<?php include('includes/signup.php');?>

<div class="banner-pages">
  <img src="images/service.png" class="banner">
  <style>
    .banner{
      height:220px!important;
    }
    body{
      background-color:#06327D!important;
    }
    .form-client{
      height:100vh;
      width:100%;
      display:flex;
      justify-content:center;
    }
    .first-group{
      width:90%;
      height:100vh;
    }
    .submit2{
      width:440px!important;
      height:20px!important;
      border-radius:20px!important;
    }
    .submit{
      width:500px!important;
      height:33px!important;
      border-radius:20px!important;
      padding:5px!important;
      text-align:center;
      color:black!important;
      padding-left:20px!important;
      box-shadow:1px 1px 1px 1px grey;
      font-weight:bold;
    }
    input{
      border-radius:5px;
    }
    label{
      color:white;
      font-weight:bold;
    }
  </style>
 
</div>
<br />
	<div class = " client details-head">

    <center><h3 style="color:white;">Dear customer👋,fill in your  personal details correctly.</h3></center>
	
</div>
<br />
<br />
<div class="form-client">
	<form  method="POST" class="form"  >
  <!-- <input style="visibility: hidden;" type="text" name="username" value="<?php echo $row['username']?> " -->
	<div class="first-group" >
 
 
 
  <div class="form-group1">
    <label>FIRST NAME</label>
    <br/>
    <input style="width:500px;margin:5px;height:30px;"type="text" name="firstName" required="true"/>
		</div>
    <div class="form-group1">
    <label>LAST NAME</label>
    <br/>
    <input style="width:500px;margin:5px;height:30px;" type="text" name="lastName" required="true"/>
		</div>

     <div class="form-group1">
			<label>CLIENT PHONENUMBER</label>
      <br/>
			<input style="width:500px;margin:5px;height:30px;" type="text" name="phone_number" required="true"/>
		</div> 

    <div class="form-group1">
			<label>CLIENT EMAIL</label>
      <br/>
			<input type=email style="width:500px;margin:5px;height:30px;" type="text" name="client_email" required="true"/>
		</div> 

    <div class="form-group1">
			<label>CLIENT IDENTIFICATION NUMBER</label>
      <br/>
			<input style="width:500px;margin:5px;height:30px;" type="text" name="client_identification_number" required="true"/>
		</div> 
    <div class="second-group">
		<div class="form-group1">
			<label>DATE OF REPAIR</label>
      <br/>
			<input style="width:500px;margin:5px;height:30px;" type="date" name="date_of_repair" min=<?php echo date("Y-m-d")?> required>
		</div>
     

<?php if(isset($_SESSION["user_login"]))

{
  ?>
  <div class="form-group1">
    <center>
    <button type="submit2" name="submit2" class="submit">SUBMIT</button>
    </center>
</div>
<br><br>
<?php } else {?>
	<div class="form-group1">
    <center>
    <button type="submit" class="submit" name="submit" id="login" onclick="alert('Please login first')">SUBMIT</button>

    </center>
	<?php } ?>
  <br><br>
</div>
	</form>
</div>

<?php// include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
