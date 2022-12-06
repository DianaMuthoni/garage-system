<?php include('includes/db_conn.php'); ?>
<?php
if(isset($_POST['submit']))
  {


  $partno=$_POST['partno'];
  $price=$_POST['price'];
  $kondation=$_POST['kondation'];
  $name=$_POST['name'];
  $brand=$_POST['brand'];
  $warranty=$_POST['warranty'];
  $file = $_FILES['file'];
  $sp_id=$_GET['sp_id'];


    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed  = array('jpg','jpeg','png','pdf');

    if (in_array($fileActualExt, $allowed)) {

      if($fileError === 0){

       if ($fileSize < 50000000) {
           $fileNameNew = uniqid('',true).".".$fileActualExt;

           $fileDestination = 'uploads/'.$fileNameNew;
           move_uploaded_file($fileTmpName, $fileDestination);
          }
        else{
               echo "your file is too big";
                }
            }
      else{
      echo "there was an error uploading your file";
    }
    }

    else{
      echo "you cannot upload files of this type!";
    }

$sql="UPDATE tbl_autospare SET partno=:partno, price=:price, kondation=:kondation, name=:name, brand=:brand,warranty=:warranty, image=:fileNameNew  WHERE sp_id=:sp_id";
$query=$db->prepare($sql);
$query->bindParam(':partno',$partno,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':kondation',$kondation,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':warranty',$warranty,PDO::PARAM_STR);
$query->bindParam(':fileNameNew',$fileNameNew,PDO::PARAM_STR);
$query->bindParam(':sp_id',$sp_id,PDO::PARAM_STR);
 $query->execute();

   $query->execute();
echo '<script>alert("Auto-spare has been Edited")</script>';
echo "<script>window.location.href ='edit-spare.php'</script>";
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Presige Auto Garage </title>
    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="fonts/css/all.css">
</head>
<body>
	<?php include('includes/sidebar.php'); ?>
	<?php include('includes/header.php'); ?>

<div class="sidebar-links">
	<h2> Edit Spare-Part:</h2>

<div class="add-spare">
  <form class="form5" method="POST" enctype="multipart/form-data">
      <?php
$sp_id=$_GET['sp_id'];
$sql="SELECT * From tbl_autospare WHERE sp_id=:sp_id";
$query = $db -> prepare($sql);
$query->bindParam(':sp_id',$sp_id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
    <div class="controls">
    <label>Part_No</label>
    <input type="text" name="partno" value="<?php echo htmlentities($result->partno);?>">
    </div>
    <div class="controls">
    <label>Price</label>
    <input type="text" name="price" value="<?php echo htmlentities($result->price);?>">
    </div>
    <div class="controls">
    <label>Condation</label>
    <input type="text" name="kondation" value="<?php echo htmlentities($result->kondation);?>">
    </div>
    <div class="controls">
    <label>Part_Name</label>
    <input type="text" name="name" value="<?php echo htmlentities($result->name);?>">
    </div>
    <div class="controls">
    <label>Brand</label>
    <input type="text" name="brand" value="<?php echo htmlentities($result->brand);?>">
    </div>
    <div class="controls">
    <label>Warant</label>
    <input type="text" name="warranty" value="<?php echo htmlentities($result->warranty);?>">
    </div>
    <div class="controls">
    <label>Image</label>
    <img src = "uploads/<?php echo htmlentities($result->image);?>"height = "70" width = "90"/>
    <input type="file" name="file" value="uploads/<?php echo htmlentities($result->image);?>">
    </div>
<br/><br/><br/>

    <button type="submit" name="submit">submit</button>
<?php $cnt=$cnt+1;}} ?>
  </form>
</div>
</div>
<?php include('includes/footer.php');?>
</body>
</html>
