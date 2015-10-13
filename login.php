<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "khent04";
$dbname = "Esupermarketph";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['email'];
$pwd = $_POST['password'];

$sql = "SELECT * from User where email = '$email' ";
$result = $conn->query($sql);
$data =  json_encode($result->fetch_assoc());
if($data=="null"){
   echo "User not exists!";
}else{
  $mystr = json_decode($data) ->{"password"};
    if (password_verify($pwd, $mystr)) {
      // echo 'Password is valid!';

        $_SESSION["user"] = $email;
        $_SESSION["logged_time"] = time();
        header( 'Location: home.php' );
// print_r($_SESSION);
        // echo "hello ". $_SESSION["user"];

    } else {
      echo 'Invalid password.';
    }
}
$conn->close();
?>
