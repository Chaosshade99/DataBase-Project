<?php
// Start the session
session_start();
echo "USER: ".$_SESSION["LoginEmail"]."<br>";
?>
<?php
// INSERT INTO ContentItem VALUES (id,'email', post_time , File_path, 'item_name', is_pub);

$t=time();
$t = "NULL"
//need to find correct time format
?>
<html>
<body>

<form action="postContent2.php" method="post">
Content Name: <input type="text" name="item_name"><br>
File Path: <input type="text" name="file_path"><br>
Is Public:
<input type="checkbox" name="is_pub" value=1>
<br>
<input type="submit">
</form>


<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>

