<?php
include('includes/connection.php');
include('includes/path.php');

  if(isset($_POST['submit2']))
  {
  $email=$_SESSION['user_login'];
  $username =$_POST['username'];
  $make=$_POST['make'];
  $mileage=$_POST['mileage'];
  $year=$_POST['year'];
  $adate=$_POST['adate'];
  $atime=$_POST['atime'];
  $model=$_POST['model'];
  $checkBox = implode(',', $_POST['services']);
  $comments=$_POST['comments'];
  $status = 0;
  


      $query = "INSERT INTO tbl_appointment (email, username, make, mileage, year, adate, atime, model, services,comments, status,status2)
      VALUES ('$email', '$username','$make', '$mileage', '$year', '$adate', '$atime', '$model','" . $checkBox . "','$comments', '$status','$status2')";

echo '<script>alert("Appointment Booked Successfuly")</script>';
echo "<script>window.location.href ='appointment.php'</script>";

    $db->exec($query);


  }

  ?>

<!DOCTYPE html>
<html>
<head>
 <title>Prime Auto Garage </title>
	<link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
	 <link href="assets/css/style.css" rel="stylesheet">

    <link href="assets/fonts/css/all.css" rel="stylesheet">
</head>
<body>

<?php include('includes/header.php');?>

<?php include('includes/signin.php');?>

<?php include('includes/signup.php');?>

<div class="banner-pages">
  <img src="assets/images/k.jpg">
  <h2>MAKE AN APPOINTMENT</h2>
</div>
<br /><br /><br /><br />
	<div class = "appoint-head">
  <h1>Book An Appointment<h1>
		<br />
	<h3>We are one of the leading auto repair shops serving customers in Kenya.<br/>
All mechanic services are performed by highly qualified mechanics.</h3>
</div>
<br />
<br />
<div class="form-appointment">
	<form  method="POST" class="form-appoint" >
  <input style="visibility: hidden;" type="text" name="username" value="<?php echo $row['username']?> ">
	<div class="first-group">

		<div class="form-group">
			<label>VEHICLE MAKE</label>
			<select name="make" required="true">
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

		<div class="form-group">
			<label>VEHICLE MILEAGE</label>
			<input type="text" name="mileage" required="true">
		</div>

		<div class="form-group">
			<label>VEHICLE YEAR</label>
			<select name="year" value="year" required="true">
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

	

	<div class="second-group">
		<div class="form-group">
			<label>APPOINTMENT DATE</label>
			<input type="date" name="adate" min=<?php echo date("Y-m-d")?> required>
		</div>

		<div class="form-group">
			<label>PREFFERED TIME FRAME</label>
			<select name="atime" required="true">
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

		<div class="form-group">
			<label>VEHICLE MODEL</label>
			<input  type="text" name="model" required="true">
		</div>
	</div>

<fieldset>
			<legend>SELECT SERVICES NEEDED</legend>
    <div class="check-b">
		<input type="checkbox" name="services[]" value="Air conditioning">
      <label>Air conditioning</label>
		</div>
		<div class="check-b">
		<input type="checkbox" name="services[]" value="Heating & Cooling ">
					<label>Heating & Cooling </label>
				</div>
		<div class="check-b">
		<input type="checkbox" name="services[]" value="Engine Diagnostics">
				      <label>Engine Diagnostics</label>
			</div>
		<div class="check-b">
		<input type="checkbox" name="services[]" value="Oil, Lube & Filters">
					      <label>Oil, Lube & Filters</label>
					</div>
      <div class="check-b">
			<input type="checkbox" name="services[]" value="Brakes Repair">
								 <label>Brakes Repair</label>
			</div>
		<div class="check-b">
		<input type="checkbox" name="services[]" value="Engine Overhaul">
						      <label>Engine Overhaul</label>
			</div>
			<div class="check-b">
			<input type="checkbox" name="services[]" value="Door Repair">
								 <label>Door Repair</label>
			</div>
		<div class="check-b">
		<input type="checkbox" name="services[]" value="Car Keys Repair">
									<label>Car Keys Repair</label>
			</div>
</fieldset>

	<br /><br /><br /><br />

<div class="tetra">
<div class="text">ADDITIONAL COMMENTS</div>
<textarea name="comments" value="comments" rows="10" cols="80" required/></textarea>
</div>

	<br /><br />

	<?php if(isset($_SESSION["user_login"]))

{
	?>
<div class="butt">
	<button type="submit2" name="submit2">BOOK</button>
</div>
<?php } else {?>
	<div class="butt">
	<button type="submit" name="submit" id="login" onclick="alert('Please login first')">BOOK</button>
	<?php } ?>
</div>
	</form>
</div>

<?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
