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

if(!Empty($_POST["tag"])){
	$sql = $_POST["tag"];
	//"UPDATE tag SET status = 1 WHERE email_tagged = '".$_SESSION["LoginEmail"]."'AND email_tagger = '".$row["email_tagger"]."' AND item_id = '".$row["item_id"]."' AND status = 0 AND tagtime = '".$row["tagtime"]."' ;")
	if ($conn->query($sql) === TRUE) {
    echo "Tag updated successfully<br>";
	}else {
		echo "Error: " .$sql. "<br>" . $conn->error;
	}
}



?>

<select name="tag" form="updateTag">
<?php
$sql = ("SELECT item_id, email_tagger, status, tagtime FROM `tag` WHERE status = 0 AND email_tagged  = '".$_SESSION["LoginEmail"]."'");
$result = mysqli_query($conn, $sql);
echo "Accept Tag: <br>";
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		//$text = array("UPDATE tag SET status = 1 WHERE email_tagged = '".$_SESSION["LoginEmail"]."'AND email_tagger = '".$row["email_tagger"]."' AND item_id = '".$row["item_id"]."' AND status = 0 AND tagtime = '".$row["tagtime"]."' ;");
?>		
	
	<option value= "<?php echo "UPDATE tag SET status = 1 WHERE email_tagged = '".$_SESSION["LoginEmail"]."' AND email_tagger = '".$row["email_tagger"]."' AND item_id = '".$row["item_id"]."' AND status = 0 AND tagtime = '".$row["tagtime"]."';" ;?>" >
		<?php echo "Item_ID: " . $row["item_id"].
			" - Original Tagger: " . $row["email_tagger"].
			" - Tag Time: " . $row["tagtime"].
			" - Status: " . $row["status"].		
			"<br>";
		?>
	</option>
			<?php
	}
}
else{
	echo "No tags. <br>";
}
?>
</select>

<form action="manageTag.php" method="POST" id="updateTag">
<button type="submit">Accept Tag</button>
</form>


<select name="tag" form="deleteTag">
<?php
$sql = ("SELECT item_id, email_tagger, status, tagtime FROM `tag` WHERE status = 0 AND email_tagged  = '".$_SESSION["LoginEmail"]."'");
$result = mysqli_query($conn, $sql);
echo "Delete Tag: <br>";
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		//$text = array("UPDATE tag SET status = 1 WHERE email_tagged = '".$_SESSION["LoginEmail"]."'AND email_tagger = '".$row["email_tagger"]."' AND item_id = '".$row["item_id"]."' AND status = 0 AND tagtime = '".$row["tagtime"]."' ;");
?>		
	
	<option value= "<?php echo "DELETE FROM tag WHERE email_tagged = '".$_SESSION["LoginEmail"]."' AND email_tagger = '".$row["email_tagger"]."' AND item_id = '".$row["item_id"]."' AND status = 0 AND tagtime = '".$row["tagtime"]."';" ;?>" >
		<?php echo "Item_ID: " . $row["item_id"].
			" - Original Tagger: " . $row["email_tagger"].
			" - Tag Time: " . $row["tagtime"].
			" - Status: " . $row["status"].		
			"<br>";
		?>
	</option>
			<?php
	}
}
else{
	echo "No tags. <br>";
}
?>
</select>



<form action="manageTag.php" method="POST" id="deleteTag">
<button type="submit">Delete Tag</button>
</form>

<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>