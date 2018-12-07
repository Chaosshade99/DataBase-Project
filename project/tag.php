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



$sql = ("SELECT email, item_id FROM `belong` JOIN share ON belong.fg_name=share.fg_name WHERE email = '".$_SESSION["LoginEmail"]."'");
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//echo "Email: " . $row["email"]. " - item_id: " . $row["item_id"]. "<br>";
		
		$subsql = ("SELECT item_id, email_post,  item_name FROM `contentitem` WHERE item_id = '".$row["item_id"]."'");
		$subresult = mysqli_query($conn, $subsql);
		
		if ($subresult->num_rows > 0) {
			// output data of each row
			while($row = $subresult->fetch_assoc()) {
				echo "Item_ID: " . $row["item_id"].
				 " - Original Poster: " . $row["email_post"].
				 " - Item_Name: " . $row["item_name"].
				 "<br>";
			}
		}
	}
}
?>

<form action="tag2.php" method="post">
Content ID: <input type="text" name="item_id"><br>
Tagged E-mail: <input type="text" name="tagged"><br>
<input type="submit"> <br>
</form>


<form action="menu.php" method="">
<button type="submit">Home</button>
</form>


</body>
</html>