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

$t= date('Y-m-d H:i:s', (time() - 60*60*24));


$sql = ("SELECT item_id, email_post, post_time, file_path, item_name FROM `contentitem` WHERE is_pub = true AND post_time >  '".$t."' GROUP BY post_time DESC");
$result = mysqli_query($conn, $sql);
		
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "Item_ID: " . $row["item_id"].
				 " - Original Poster: " . $row["email_post"].
				 " - Post_Time: " . $row["post_time"].
				 " - File_Path " . $row["file_path"].
				 " - Item_Name: " . $row["item_name"].
				 "<br>";
		
		$sql3 = ("SELECT fname, lname FROM person JOIN tag ON person.email = tag.email_tagged WHERE item_id = '".$row["item_id"]."' AND status = 1 ");			
		$result3 = mysqli_query($conn, $sql3);
		echo "Tagged: <br>";
		if ($result3->num_rows > 0) {
			while($row3 = $result3->fetch_assoc()) {
				echo "Name: " .$row3["fname"].$row3["lname"]. "<br>";
			}
		}
		
		$sql4 = ("SELECT email, rate_time, emoji FROM `rate` WHERE item_id = '".$row["item_id"]."' ");
		$result4 = mysqli_query($conn, $sql4);
		echo "Rating: <br>";
		if ($result4->num_rows > 0) {
			while($row4 = $result4->fetch_assoc()) {
				echo "Email: " . $row4["email"]. 
				" - Rate Time: " . $row4["rate_time"].
				" - Emoji: " . $row4["emoji"].
				"<br>";
			}
		}
	}
}
else{
	echo "No results. <br>";
}


?>

<form action="viewPublicContent.php" method="">
<button type="submit">View Less Info</button>
</form>

<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>