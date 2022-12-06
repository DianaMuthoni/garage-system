<?php

include('includes/db_conn.php'); 

if(isset($_POST['submit'])){

	$partno = $_POST['partno'];
  $price = $_POST['price'];
  $kondation = $_POST['kondation'];
  $name= $_POST['name'];
  $brand = $_POST['brand'];
  $warranty = $_POST['warranty'];

	  $file = $_FILES['file'];
    
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

    	 if ($fileSize < 500000) {
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


      $query = "INSERT INTO tbl_autospare (partno,price,kondation,name,brand,warranty,image)
      VALUES ('$partno','$price','$kondation','$name','$brand','$warranty','$fileNameNew')";

    $db->exec($query);

 echo "<script>alert('uploaded successfully')</script>";
  }


?>