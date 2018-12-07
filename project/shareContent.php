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


echo "Your new content is Private. <br>";
if(!empty($_POST["fg_name"])){
	$sql = ("INSERT INTO Share VALUES ('".$_SESSION["LoginEmail"]."' , '".$_POST["fg_name"]."' , ".$_SESSION["last_id"].");");
	if ($conn->query($sql) === TRUE) {
		echo "Content successfully shared";
	}else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}


?>
<form action="shareContent.php" method="post">
Share with FriendGroup: <input type="text" name="fg_name"><br>
<button type="submit">Share</button>
</form>

<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>