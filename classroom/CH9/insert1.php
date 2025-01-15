<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "myDB";
$id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nameAdd = $_POST['fname'];
$lastAdd = $_POST['lname'];
$emailAdd = $_POST['email'];
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$nameAdd', '$lastAdd', '$emailAdd')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("location:all.php");
?>