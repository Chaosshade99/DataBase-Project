<?php
// Start the session
session_start();
echo "USER: ".$_SESSION["LoginEmail"]."<br>";
?>
<?php $_SESSION["friend_group"] = $_POST["fg_name"]; ?>
<?php $_SESSION["fr_first_name"] = $_POST["first_name"]; ?>
<?php $_SESSION["fr_last_name"] = $_POST["last_name"]; ?>

<html>
<body>

<?php
$conn = new mysqli("localhost", "root","","pricosha");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$singlePerson = false;
echo "User's Friend Groups: <br>";
$sql = ("SELECT email FROM `Person` WHERE fname = '".$_POST["first_name"]."' AND lname = '".$_POST["last_name"]."'");
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
	// output data of each row
	$count = 0;
	while($row = $result->fetch_assoc() && $count < 2) {
		$count += 1;
	}
	if($count == 1){
		$singlePerson = true;
	}
	else{
		echo "Multiple people with that name.";
		header('Location: AddFriend3.php');
	}
}
else{
	echo "No person by that name.";
}

if ($singlePerson) {
	// output data of each row
	$result = mysqli_query($conn, $sql);
	while($row = $result->fetch_assoc()) {
		$sql = ("INSERT INTO Belong VALUES ('".$row["email"]."', '".$_SESSION["LoginEmail"]."', '".$_POST["fg_name"]."');");

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully <br>";
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<br>";
		}	
	}
}


?>
<br>



<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>