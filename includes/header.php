
<?php
  require_once 'connection.php';
	require_once 'path.php';
?>
<header>
	<?php if(isset($_SESSION["user_login"]))

{
	?>
	   <div class="top-nav">
   	<ul>
   		<div class="admin">
   		<li>
   		<a href="profile.php">Profile</a>| <a href="post_testimo.php">Post Testimony</a> |<a href="my-testimonials.php">Testimonials</a>
        |<a href="my-booking.php">My Bookings</a>

   		<div class="signin-signup">
   		<?php

				$email = $_SESSION['user_login'];
        $username = $_SESSION['user_login'];
				$select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE email=:uemail OR username=:uname");
				$select_stmt->execute(array(":uemail"=>$email,"uname"=>$username));
  				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

				if(isset($_SESSION['user_login']))
				{
				?>
        <div style="padding-left: 230px; " class="welcome">
					Welcome:
				<?php
						echo $row['username'];
				}
				?>
		/<a href="logout.php">logout</a>
		</li>
    </div>
		</div>



	</li>
   	</div>
   	</ul>
   </div>
   <?php } else {?>
   <div class="top-nav">
	<style>
		.admin{
			display:flex!important;
			flex-direction:column!important;
		}
		.nav-links li{
			font-size:10px!important;
		}
	</style>
   	<ul>
   		<div class="admin">
   		<li><a href="admin/adminlogin.php" class="fa fa-home">  Admin Login</a></li>
   	<li>
      
   		<div style="padding-left: 800PX;" class="signin-signup">
			<a href="#" class="fa fa-unlock-alt" id="login" onclick="openForm()">   Signin</a> | <a href="#" class="fa fa-user" onclick="openPop()">  Signup</a>
		</div>
	</li>
	<li>
	<a  href="mechanic/mechanic.php" class="fa fa-home"> Mechanic Login</a>
   </li>
   	</div>
   	</ul>
   </div>
<?php }?>
<div class="header">
  <div class="">
	<h1>Auto <span>Express Garage</span></h1>
	 <?php
    if(isset($errorMsg))
    {
      foreach($errorMsg as $error)
      {
      ?>
        <div style="padding-left: 600px; margin-top: -30px; color: red; font-style: italic;" class="alert-danger">
          <strong><?php echo $error; ?></strong>
        </div>
            <?php
      }
    }
    ?>
   </div>
<nav>
	<ul>
		<div class="nav-links">
		<li><a href="index.php">HOME</a></li>
		<li><a href="Client.php">CLIENT</a></li>
		<li><a href="Vehicle registration.php">VEHICLE</a></li>
		<li><a href="services.php">SERVICES</a></li>
		
		<li><a href="msg-module.php">MESSAGE MODULE</a></li>
    <li><a href="available-spares.php">AUTO-SPARES</a></li>
	<li><a href="about-us.php">ABOUT</a></li>
	
		 <li><a href="enquiry.php">ENQUIRY</a></li>
		</div>
	</ul
</nav>

</header>
