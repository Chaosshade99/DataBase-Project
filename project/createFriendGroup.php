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

<form action="createFriendGroup2.php" method="post">
Friend Group Name: <input type="text" name="fg_name"><br>
Description: <input type="text" name="description"><br>
<input type="submit">
</form>


<form action="menu.php" method="">
<button type="submit">Home</button>
</form>

</body>
</html>
