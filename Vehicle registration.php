<?php
include('includes/connection.php');
include('includes/path.php');

if(isset($_POST['submit2']))
{
$email=$_SESSION['user_login'];
$type =$_POST['vehicle_type'];
$year=$_POST['vehicle_Registration'];
$date=$_POST['date_of_registration'];
$time=$_POST['atime'];
$model=$_POST['vehicle_model'];




	$query = "INSERT INTO vehicle_reg(email,vehicle_type,year_of_registration,date_of_registration,Time_of_Registration,vehicle_model)
	VALUES ('$email','$type','$year','$date','$time','$model')";


echo '<script>alert("Vehicle Booked Successfuly")</script>';
echo "<script>window.location.href ='repair_request.php'</script>";

  $db->exec($query);


}

?>

<!DOCTYPE html>
<html>
<head>
 <title>Auto Express Garage </title>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
	 <link href="assets/css/style.css" rel="stylesheet">

    <link href="assets/fonts/css/all.css" rel="stylesheet">
</head>
<body>

<?php include('includes/header.php');?>

<?php include('includes/signin.php');?>

<?php include('includes/signup.php');?>

<div class="banner-pages">
  <img src="images/appointment.png">
</div>
<br /><br /><br /><br />
	<div class = "appoint-head">
		<center>
		<h1 style="color:white;text-decoration:none;">FILL IN VEHICLE DETAILS<h1>

		</center>
		<br />
	<h3 style="color:white;text-decoration:none; font-size:18px;" >We are one of the leading auto repair shops serving customers in Kenya.<br/>
All mechanic services are performed by highly qualified mechanics.</h3>
</div>
<br />
<br />

	<div class="form-vehicle">
		<style>
			.form-vehicle{
              height:80vh!important;
			  width:100%!important;
			  display:flex!important;
			  justify-content:center!important;
			}
			.first-group{
				width:200px!important;
			}
			.submit{
				width:500px!important;
				height:40px!important;
				margin-bottom:20px!important;
				margin-left:150px!important;
				background-color:#80FF80!important;
				border:none;
				border-radius:20px!important;
				font-weight:bold;
				box-shadow:1px 1px 1px grey;
			}
			label{
				color:white!important;
				font-weight:bold!important;
			}
		</style>
	<form  method="POST" class="form" >
  <!-- <input style="visibility: hidden;" type="text" name="username" value="<?php echo $row['username']?> "/> -->
	<div class="first-group" style="margin-left:150px;">

		<div class="form-group1">
			<label>VEHICLE TYPE</label>
			<br>
			<select style="width:500px;height:40px;" name="vehicle_type" required="true">
				<option>-----------select----------</option>
				<option value="Toyota">Toyota</option>
				<option value="Audi">Audi</option>
				<option value="Mitsubishi">mitsubishi</option>
				<option value="Isuzu">Isuzu</option>
				<option value="Mazda">Mazda</option>
				<option value="Subaru">Subaru</option>
				<option value="Honda">Honda</option>
				<option value="Ford">ford</option>
				<option value="BMW">BMW</option>
				<option value="Land Rover">Land Rover</option>
    </select>
		</div>



		<div class="form-group1">
			<label>YEAR OF REGISTRATION</label>
			<br>
			
			<select style="width:500px;height:40px;" name="vehicle_Registration" value="year" required="true">
				<option>-----------select----------</option>
				<option value="2020">2020</option>
				<option value="2019">2019</option>
				<option value="2018">2018</option>
				<option value="2017">2017</option>
				<option value="2016">2016</option>
				<option value="2015">2015</option>
				<option value="2014">2014</option>
				<option value="2013">2013</option>
				<option value="2012">2012</option>
				<option value="2011">2011</option>
				<option value="2010">2010</option>
			</select>
		</div>
</div>

	

	<div class="second-group" style="margin-left:150px;"> 
		<div class="form-group1">
			<label>DATE</label>
			<br/>
			<input style="width:500px;margin:5px;height:40px;" type="date" name="date_of_registration" min=<?php echo date("Y-m-d")?> required>
		</div>
<br/>
		<div class="form-group1">
			<label>TIME OF REGISTRATION</label>
			<br/>
			<select style="width:500px;margin:5px;height:40px;" name="atime" required="true">
				<option>-----------select----------</option>
				<option value="08:00 - 09:00 AM">08:00 - 09:00 AM</option>
				<option value="09:00 - 10:00 AM">09:00 - 10:00 AM</option>
				<option value="10:00 - 11:00 AM">10:00 - 11:00 AM</option>
				<option value="11:00 - 12:00 PM">11:00 - 12:00 PM</option>
				<option value="12:00 - 01:00 PM">12:00 - 01:00 PM</option>
				<option value="02:00 - 03:00 PM">02:00 - 03:00 PM</option>
				<option value="03:00 - 04:00 PM">03:00 - 04:00 PM</option>
				<option value="04:00 - 05:00 PM">04:00 - 05:00 PM</option>
				<option value="05:00 - 06:00 PM">05:00 - 06:00 PM</option>
			</select>
		</div>

<br/>
		<div class="form-group1">
			<label>VEHICLE MODEL</label>
			<br/>
			<input style="width:500px;margin:5px;height:40px;" type="text" name="vehicle_model" required="true">
		</div>
</div>
</div>


	

	<?php if(isset($_SESSION["user_login"]))

{
  ?>
  <div class="form-group1" >
	<center>
	<button type="submit2" name="submit2" class="submit">SUBMIT</button>

	</center>
</div>
<?php } else {?>
	<div class="form-group1">
		<center>
		<button type="submit" name="submit" id="login" class="submit" onclick="alert('Please login first')">SUBMIT</button>
		</center>
  	<?php } ?>
</div>
	</form>
</div>

<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
