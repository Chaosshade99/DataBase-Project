<?php
// Start the session
session_start();
echo "USER: ".$_SESSION["LoginEmail"]."<br>";
?>



<html>
<body>

<?php
$conn = new mysqli("localhost", "root","","pricosha");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "User's Friend Groups: <br>";
$sql = ("SELECT fg_name FROM `Friendgroup` WHERE owner_email = '".$_SESSION["LoginEmail"]."'");
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo  $row["fg_name"]."<br>";
	}
}
?>
<br>

<form action="addFriend2.php" method="post">
Friend Group: <input type="text" name="fg_name"><br>
Friends Name:<br>
First Name:<input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>


<input type="submit">
</form>


<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>