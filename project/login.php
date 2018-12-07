<?php
// Start the session
session_start();
?>
<?php$_SESSION["LoginEmail"] = $_POST["loginEmail"];?>
<?php$_SESSION["LoginPassword"] = $_POST["loginpassword"];?>

<html>
<body>

<?php
$conn = new mysqli("localhost", "root","","pricosha");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$login = false;


$sql = ("SELECT email, password FROM person WHERE email = '".$_SESSION["LoginEmail"]."'");
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//echo "Email: " . $row["email"]. " - Passord: " . $row["password"]. "<br>";
		if($_POST["loginPassword"] == $row["password"]){
			$login = true;
		}
	}
}
1?>


<form action="login.php" method="post">
E-mail: <input type="text" name="loginEmail"><br>
Password: <input type="text" name="loginPassword"><br>
<input type="submit">
</form>

<?php
if ($login) {
	//echo "Welcome. <br>";
	//echo "Your email address is: ";
	//echo $_POST["loginEmail"]; 
	//$_SESSION["LoginEmail"] = $_POST["loginEmail"];
	header('Location: menu.php');
}
else{
	 echo "Login Failed";
}
?>





</body>
</html>