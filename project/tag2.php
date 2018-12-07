<?php
// Start the session
session_start();
echo "USER: ".$_SESSION["LoginEmail"]."<br>";
?>


<html>
<body>

<?php
$t= date('Y-m-d H:i:s', (time()));

$conn = new mysqli("localhost", "root","","pricosha");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$visible = false;
$sql = ("SELECT item_id FROM `belong` JOIN share ON belong.fg_name=share.fg_name WHERE email = '".$_SESSION["LoginEmail"]."'");
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//echo "Email: " . $row["email"]. " - item_id: " . $row["item_id"]. "<br>";
		if($row["item_id"] == $_POST["item_id"]){
			$visible = true;
		}
	}
}







if(!$visible){
	echo "Error: Content not visible.";
}
else{
	if($_POST["tagged"]==$_SESSION["LoginEmail"]){
		$sql = ("INSERT INTO Tag VALUES ('".$_POST["tagged"]."','".$_SESSION["LoginEmail"]."'," .$_POST["item_id"].",true, ' ".$t." ');");
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		$sql = ("INSERT INTO Tag VALUES ('".$_POST["tagged"]."','".$_SESSION["LoginEmail"]."'," .$_POST["item_id"].",false, ' ".$t." ');");
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}



?>


<form action="menu.php" method="">
<button type="submit">Home</button>
</form>


</body>
</html>