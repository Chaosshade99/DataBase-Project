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
echo "Multiple people with that name.<br>";

$sql = ("SELECT fname, lname, email FROM `Person` WHERE fname = '".$_SESSION["fr_first_name"]."' AND lname = '".$_SESSION["fr_last_name"]."'");
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "Name: " . $row["fname"]. $row["lname"]." - Email " . $row["email"]."<br>";
	}
}
?>
<br>

<form action="addFriend4.php" method="post">
Friend's Email: <input type="text" name="email"><br>

<input type="submit">
</form>


<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>