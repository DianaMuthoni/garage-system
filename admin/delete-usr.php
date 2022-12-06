
<?php include('includes/db_conn.php'); ?>
<?php
$user_id = $_GET['user_id'];
$sql = "DELETE FROM tbl_user WHERE user_id=:user_id";
$query=$db->prepare($sql);
$query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
  echo '<script>alert("user deleted")</script>';
echo "<script>window.location.href ='delete-user.php'</script>";

?>
