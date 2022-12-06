<footer id="footer">
    <center><h2>Copyright 2023 Developed with 💖 by Maria</h2></center>
    
	<style>
		#footer{background: #404040; 
        display:flex;
    height:300px;
width:100%;
display:flex;
align-items:center;
justify-content:center;
width:100%!important;}
	</style>
        <?php 
         include('connection.php');
         if (isset($_POST['submit'])) {
             $email=$_POST['email'];

            $sql = "INSERT INTO tbl_subscribers(email)VALUES('$email')";

            $db->exec($sql);

            echo '<script>alert("Subscribed Successfuly")</script>';
        }
            else{
                '<script>alert("failled Successfuly")</script>';
            }
        ?>
		
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</footer>

