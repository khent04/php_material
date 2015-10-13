<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pwd = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));
// $pwd = $_POST['password'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];


$birthdate = date('Y-m-d', strtotime(str_replace('/','-', $birthdate)));

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
$sql = "INSERT into User(name, email, password, birthday, gender)
    VALUES('$name', '$email', '$pwd', '$birthdate', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>
