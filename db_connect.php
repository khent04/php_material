<?php
$servername = "localhost";
$username = "root";
$password = "khent04";
$dbname = "Esupermarketph";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   return ("Connection failed: " . $conn->connect_error);
// }
// else{
//   return "connected!";
// }
// $conn->close();

class Connection {
    function db_instance(){
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      echo ("Connection failed: " . $conn->connect_error);
    }
    else{
      echo "connected!";
    }
    $conn->close();
    }
}

// $me = new Connection();
// echo "<br>";
// echo $me -> db_instance;

try {
 $me = new Connection();
echo "<br>";
echo $me -> db_instance;
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
