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
 <title>Auto Express Garage</title>
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
<div class="booking">

  <h1>My Testimonials</h1>
    <table class="appointments">
  <thead >
        <tr>
        <td style="background-color:grey">#</td>
        <td style="background-color:grey">#</td>
        <td style="background-color:grey">Testimony</td>
        <td style="background-color:grey">Posting Date</td>
         <td style="background-color:grey">Status</td>
       
    
           </tr>
    </thead>
  <?php 

$email=$_SESSION['user_login'];

$sql = "SELECT * from tbl_testimonies  where email=:uemail";
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
<td>#BK<?php echo htmlentities($result->id);?></td>
<td><?php echo htmlentities($result->testimonial);?></td>
<td><?php echo htmlentities($result->postingdate);?></td>
<td><?php if($result->status==0)
{
echo "<h4 style='color:blue;'>Waiting For Approval</h4>";
}
if($result->status==1)
{
echo "<h4 style='color:green;'>Approved</h4>";
}
if($result->status==2)
{
echo "<h4 style='color:red;'>Canceled</h4>";
} 
?>
</tr>
<?php $cnt=$cnt+1; }}} ?>
 </table>
</div>
 <br><br><br>
  <?php include('includes/footer.php');?>

<script src="assets/js/java.js"></script>
</body>
</html>
