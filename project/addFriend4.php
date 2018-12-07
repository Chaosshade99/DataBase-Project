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

$sql = ("INSERT INTO Belong VALUES ('".$_POST["email"]."', '".$_SESSION["LoginEmail"]."', '".$_SESSION["friend_group"]."');");

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully <br>";
}else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<br>";
}


?>
<br>



<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>