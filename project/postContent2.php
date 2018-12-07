<?php
// Start the session
session_start();
echo "USER: ".$_SESSION["LoginEmail"]."<br>";
?>
<?php
// INSERT INTO ContentItem VALUES (id,'email', post_time , File_path, 'item_name', is_pub);

$t= date('Y-m-d H:i:s', time());
//$t = "NULL"
//need to find correct time format
?>
<html>
<body>

<?php
$conn = new mysqli("localhost", "root","","pricosha");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(empty($_POST["is_pub"])){
	$_POST["is_pub"] = 0;
}

$sql = ("INSERT INTO ContentItem VALUES (NULL,'".$_SESSION["LoginEmail"]."',' ".$t." ', '".$_POST["file_path"]."' , '".$_POST["item_name"]."' , ".$_POST["is_pub"].");");

if ($conn->query($sql) === TRUE) {
    echo "New content created successfully";
	$_SESSION["last_id"] = $conn->insert_id;
	if($_POST["is_pub"] == 0){
		header('Location: shareContent.php');
	}	
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





?>
<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>

