<?php
// Start the session
session_start();
echo "USER: ".$_SESSION["LoginEmail"]."<br>";
?>
<?php unset($_SESSION["friend_group"]); ?>
<?php unset($_SESSION["fr_first_name"]); ?>
<?php unset($_SESSION["fr_last_name"]); ?>
<?php unset($_SESSION["item_id"]); ?>
<?php unset($_SESSION["email_tagger"]); ?>
<?php unset($_SESSION["tagtime"]); ?>

<html>
<body>


<form action="viewPublicContent.php" method="">
<button type="submit">View Public Content</button>
</form>

<form action="viewSharedContent.php" method="">
<button type="submit">View Shared Content</button>
</form>

<form action="postContent.php" method="">
<button type="submit">Post Content</button>
</form>

<form action="tag.php" method="">
<button type="submit">Tag Content</button>
</form>

<form action="manageTag.php" method="">
<button type="submit">Manage Tagx</button>
</form>

<form action="createFriendGroup.php" method="">
<button type="submit">Create Friend Group</button>
</form>

<form action="addFriend.php" method="">
<button type="submit">Add Friend</button>
</form>

<form action="index.php" method="">
<button type="submit">Logout</button>
</form>


</body>
</html>