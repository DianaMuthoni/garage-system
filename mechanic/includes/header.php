<?php
    include ('db_conn.php');
	include ('path.php');
?>
<header>
	<div class="header">
		<div class="header-heading">
			<h1>PRESTIGE GARAGE SYSTEM</h1>
		</div>
				<div class="drop">
<li class="dropdown">

  <button class="dropbtn">
  	Welcome            <?php
  				$name = $_SESSION['login'];
  				$select_stmt = $db->prepare("SELECT * FROM tbl_mechanic WHERE name=:Mname");
  				$select_stmt->execute(array(":Mname"=>$name,));
    				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);


  						echo $row['name'];
  				?> <i class="fa fa-caret-down"></i>
		</button>
  <div class="dropdown-content">
    <a href="profile.php">PROFILE SETTINGS</a>
    <a href="logout.php">SIGN OUT</a>
  </div>
				</li>
    </ul>
		</div>
	</div>
</header>
