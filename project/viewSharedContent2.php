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
		
		$sql2 = ("SELECT item_id, email_post, post_time, file_path, item_name FROM `contentitem` WHERE item_id = '".$row["item_id"]."' GROUP BY post_time DESC");
		$result2 = mysqli_query($conn, $sql2);
		
		if ($result2->num_rows > 0) {
			// output data of each row
			while($row2 = $result2->fetch_assoc()) {
				echo "Item_ID: " . $row2["item_id"].
				 " - Original Poster: " . $row2["email_post"].
				 " - Post_Time: " . $row2["post_time"].
				 " - File_Path " . $row2["file_path"].
				 " - Item_Name: " . $row2["item_name"].
				 "<br>";
				 
				$sql3 = ("SELECT fname, lname FROM person JOIN tag ON person.email = tag.email_tagged WHERE item_id = '".$row2["item_id"]."' AND status = 1 ");
				$result3 = mysqli_query($conn, $sql3);
				echo "Tagged: <br>";
				if ($result3->num_rows > 0) {
					while($row3 = $result3->fetch_assoc()) {
						echo "Name: " .$row3["fname"].$row3["lname"]. "<br>";
					}
				}
		
				$sql4 = ("SELECT email, rate_time, emoji FROM `rate` WHERE item_id = '".$row2["item_id"]."' ");
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
	}
}

?>

<form action="viewSharedContent.php" method="">
<button type="submit">View Less Info</button>
</form>

<form action="menu.php" method="">
<button type="submit">Home</button>
</form>


</body>
</html>