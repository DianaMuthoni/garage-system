<?php
include('includes/connection.php');
include('includes/path.php');
?>


<?php
if(strlen($_SESSION['user_login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_REQUEST['apoint_id']))
  {
    $apoint_id=intval($_GET['apoint_id']);
$email=$_SESSION['user_login'];
  $sql ="SELECT adate FROM tbl_appointment WHERE email=:uemail and apoint_id=:apoint_id";
$query= $db -> prepare($sql);
$query-> bindParam(':uemail', $email, PDO::PARAM_STR);
$query-> bindParam(':apoint_id', $apoint_id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
   $fdate=$result->adate;

  $a=explode("/",$fdate);
  $val=array_reverse($a);
   $mydate =implode("/",$val);
  $cdate=date('Y/m/d');
  $date1=date_create("$cdate");
  $date2=date_create("$fdate");
 $diff=date_diff($date1,$date2);
echo $df=$diff->format("%a");
if($df>1)
{
$status=2;
$CancelledBy='u';
$sql = "UPDATE tbl_appointment SET status=:status,CancelledBy=:CancelledBy WHERE email=:uemail and apoint_id=:apoint_id";
$query = $db->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':CancelledBy',$CancelledBy , PDO::PARAM_STR);
$query-> bindParam(':uemail',$email, PDO::PARAM_STR);
$query-> bindParam(':apoint_id',$apoint_id, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}
else
{
$error="You can't cancel booking before 24 hours";
}
}
}
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
  <h2>My-Bookingss</h2>
  <p></p>
</div>

<div class="booking" id="booking">

  <h1>My Bookings</h1>
    <table class="appointments">
  <thead >
        <tr>
        <td style="background-color:grey">#</td>
        <td style="background-color:grey">BK#</td>
        <td style="background-color:grey">Make</td>
        
        <td style="background-color:grey">Model</td>
         <td style="background-color:grey">Vehicle Year</td>
        <td style="background-color:grey">Appointment Date</td>
        <td style="background-color:grey">Appointment Time</td>
        <td style="background-color:grey">Services</td>
        <td style="background-color:grey">Amount To Pay</td>
         <td style="background-color:grey">Status</td>
      
         <td style="background-color:grey">action</td>
         
       
    
           </tr>
    </thead>
  <?php 

$email=$_SESSION['user_login'];

$sql = "SELECT * from tbl_appointment where email=:uemail";
$query = $db->prepare($sql);
$query -> bindParam(':uemail', $email, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0){

foreach($results as $result)
{ ?>
<tr align="center">
<td><?php echo htmlentities($cnt);?></td>
<td>#BK<?php echo htmlentities($result->apoint_id);?></td>
<td><?php echo htmlentities($result->make);?></td>

<td><?php echo htmlentities($result->model);?></td>
<td><?php echo htmlentities($result->year);?></td>
<td><?php echo htmlentities($result->adate);?></td>
<td><?php echo htmlentities($result->atime);?></td>
<td><?php echo htmlentities($result->services);?></td>
<td style="color: green;">Kshs.<?php echo htmlentities($result->cost);?></td>

<td><?php if($result->status==0)
{
echo "<h4 style='color:green;'>Pending</h4>";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->CancelledBy=='u')
{
echo "<h4 style='color:red;'>Canceled by you at </h4>" .$result->UpdationDate;
} 
if($result->status==2 and $result->CancelledBy=='a')
{
echo "Canceled by admin at " .$result->UpdationDate;

}
?></td>
<td><?php echo htmlentities($result->bookingdate);?></td>

  <?php if($result->status3==1 or $result->status==2)
{
  ?><td>You cannot cancel</td>

<?php } else {?>
<td><a href="my-booking.php?apoint_id=<?php echo htmlentities($result->apoint_id);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a></td>
<?php }?>
</tr>
<?php $cnt=$cnt+1; }} ?>
 </table>
 <p style="margin-top:5%; color: blue;"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>
</div>
 <br><br><br>
  <?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
<script src="assets/js/java1.js"></script>
</body>
</html>