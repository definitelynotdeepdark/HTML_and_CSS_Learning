<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

 
<div class="container">
  <h2>Basic Table Query from Database table MyGuests</h2>
  <p>651102189112 Khaithongthak Sinchermsiri</p>            
  <table class="table">
    <thead>
      <tr>
		<th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
		<th>Update</th>
		<th>Delete</th>
      </tr>
    </thead>
   <?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
		<td>" . $row["id"]. "</td>
		<td>" . $row["firstname"]. "</td>
		<td>" . $row["lastname"]. "</td>
		<td>" . $row["email"]. "</td>
		<td><a href=edit.php?id=".$row["id"]."</a>Edit</td>
		<td><a href=deletedata.php?id=".$row["id"]."</a>Delete</td>
		</tr>";
	
    }
    echo "</table>";
	
} else {
    echo "0 results";

}

?>
<h2>ADD Data: <br></h2>
	<form action="insert1.php" method="POST">
	<label for="fname">First name:</label><input type="text" id="fname" name="fname">
    <label for="lname">Last name:</label><input type="text" id="lname" name="lname" >
	<label for="email">Email:</label><input type="text" id="email" name="email" >
	<input type="submit" value="Add">
	</form>
	
<? 
$conn->close();
?>
    </tbody>
  </table>

</div>

</body>
</html>
