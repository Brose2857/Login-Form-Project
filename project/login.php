<?php
$email  = $_POST['email'];
$upswd1 = $_POST['upswd1'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hack";

// Database Connection

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }
  else{
      $stmt = $conn->prepare("select * from register where email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt_result = $stmt->get_result();
      if ($stmt_result->num_rows > 0){
          $data = $stmt_result->fetch_assoc(); 
          if ($data['upswd1'] === $upswd1){
              echo "Login Successful";
          }
      }
      else{
          echo "<h2>Invalid Email or Password</h2>";
      }

  }




?>