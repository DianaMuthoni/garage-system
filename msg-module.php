<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Module</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<style>
    body {
    color: #ffffff;
  }
  .box {
    margin: auto;
  }
  .card {
    padding: 8%;
    padding-top: 35px;
    margin-top: 60px;
    margin-bottom: 80px;
  }
  textarea[name="message"] {
    resize: none;
  }
  #e-mail {
    height: 45px;
  }
  #message {
    height: 120px;
  }
  input.input-box,
  textarea.input-box {
    background-color: #616161;
    border: #616161;
    color: #bdbdbd;
  }
  input.input-box:focus,
  textarea.input-box:focus {
    background-color: #000000;
    color: #bdbdbd;
  }
  .rm-border:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
  }
  form .form-control::-webkit-input-placeholder {
    color: #9e9e9e;
  }
  ::-moz-placeholder {
    color: #9e9e9e !important;
  }
  input.btn-purple {
    background-color: #5c6bc0;
    color: #ffffff;
  }
body {
  color: #ffffff;
}
.box {
  margin: auto;
}
.card {
  padding: 8%;
  padding-top: 35px;
  margin-top: 60px;
  margin-bottom: 80px;
}
textarea[name="message"] {
  resize: none;
}
#e-mail {
  height: 45px;
}
#message {
  height: 120px;
}
input.input-box,
textarea.input-box {
  background-color: #616161;
  border: #616161;
  color: #bdbdbd;
}
input.input-box:focus,
textarea.input-box:focus {
  background-color: #000000;
  color: #bdbdbd;
}
.rm-border:focus {
  border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
}
form .form-control::-webkit-input-placeholder {
  color: #9e9e9e;
}
::-moz-placeholder {
  color: #9e9e9e !important;
}
input.btn-purple {
  background-color: #5c6bc0;
  color: #ffffff;
}
  
</style>
<body>
<div class="bg-light">
    <div class="container">
        <div class="row justify justify-content-center">
            <div class="col-11 col-md-8 col-lg-6 col-xl-5">
                <form class="" method="POST" action="msg-module.php">
                    <div class="card bg-dark">
                        <div class="row mt-0">
                            <div class="col-md-12 ">
                                <h4 class=""> SMS Mailing Module💌</h4>
                                <h5 class=""> Send message to these clients</h4>
<?php
//CODE TO FETCH CLIENTS
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "prestige";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT client_id, firstName, lastName,phone_number FROM client";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th></tr>";
  
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["client_id"]."</td><td>".$row["firstName"]." </td><td>".$row["lastName"]."</td><td> ".$row["phone_number"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();



?>
<br><br>


<!--CODE TO SEND SMS-->  
<?php
if(isset($_POST['submit'])){
    $baseurl = "https://api.mobitechtechnologies.com/sms/sendsms";
    $ch = curl_init($baseurl);
    $data = array(
        "mobile" => $_POST['phone'],
        "response_type" => "json",
        "sender_name" => "23107",
        "service_id" => 0,
        "message" => $_POST['message'],
    );
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    echo $payload;
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'h_api_key:9ceb60b62c0d0933b8a6353c6e622777d099b0ef9b2a2fb9eaff0a854d693121'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_encode(curl_exec($ch));
    echo $result;    
    curl_close($ch);
}
?>
<!--CODE TO SEND SMS-->
                                </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 mb-0">
                                <p class="mb-1">Phone</p> <input id="e-mail" type="text" placeholder="Enter your phone" name="phone" class="form-control input-box rm-border">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mb-2">
                                <p class="mb-1">Message</p> <textarea id="message" type="text" placeholder="Enter your message" name="message" class="form-control input-box rm-border"></textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center mb-0">
                            <div class="col-md-12 px-3"> <input type="submit" value="Send Message" name="submit" class="btn btn-block btn-purple rm-border"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>                                      
</body>
</html>