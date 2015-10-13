<?php
session_start();
$subject = $_POST['subject'];
$sender = $_SESSION['user'];
$receiver = $_POST['receiver'];
$content = $_POST['content'];

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
$sql = "INSERT into Messages(subject, sender, receiver, content)
    VALUES('$subject', '$sender', '$receiver', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>
