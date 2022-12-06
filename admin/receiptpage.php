<?php include('includes/db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Express Garage</title>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
    <?php include("includes/sidebar.php")?>

    <?php include("includes/header.php")?>

  <div class="sidebar-links" id="print">
      <?php
$apoint_id=$_GET['apoint_id'];
$sql="SELECT * From tbl_appointment WHERE apoint_id=:apoint_id";
$query = $db -> prepare($sql);
$query->bindParam(':apoint_id',$apoint_id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
  <br/><br/>  <br/><br/>


    <table class="receipt">
      <h1>Prestige Car Garage</h1>
      <h3>Transaction Receipt</h3>
            <tr>
             <td class="rtd">Transaction Date:</td>
         <td><?php echo htmlentities($result->UpdationDate);?></td>
        </tr>
      <tr>
             <td class="rtd">Client Email:</td>
         <td><?php echo htmlentities($result->email);?></td>
        </tr>
        <tr>
               <td class="rtd">Mechanic Name:</td>
           <td><?php echo htmlentities($result->name);?></td>
          </tr>
      <tr>
        <td class="rtd">Service:</td>
        <td><?php echo htmlentities($result->services);?></td>
      </tr>
      <tr>
             <td class="rtd">Vehicle Type:</td>
         <td><?php echo htmlentities($result->make);?>,<?php echo htmlentities($result->model);?></td>
        </tr>
        <tr>
             <td class="rtd">Payment Method:</td>
         <td><?php echo htmlentities($result->paymentM);?></td>
        </tr>
          <td class="rtd">Amount Paid(KES):</td>
        <td style="color:green;"><?php echo htmlentities($result->cost);?></td>
      </tr>
      <tr>
             <td class="rtd">Ref No</td>
         <td><?php echo htmlentities($result->refno);?></td>
        </tr>
<?php $cnt=$cnt+1;} }?>
    </table>
 <h3>*****THANK YOU*****</h3>
 Prestige Car Garage 2022
 <h3>WELCOME AGAIN</h3>
      <p style="margin-top:5%; color: black;"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>
  </div>
  <script src="assets/js/java.js"></script>
    <?php include("includes/footer.php")?>
</body>
</html>
