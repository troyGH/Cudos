

<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "cmpe195";
$dbDatabase = "shoutmyservice";
$table = "customer";

$db = mysqli_connect($host, $user, $pass) or die ("Error connecting to database.");
mysqli_select_db($db, $dbDatabase) or die ("Couldn't select the database.");


<<<<<<< HEAD:php/login.php
if (isset ($_POST['username'])){
	$email = $_POST['username'];
=======
if (isset ($_POST['email'])){
	$email = $_POST['email'];
>>>>>>> origin/master:login.php
	$password = $_POST['password'];

	$sql = "SELECT * FROM customer WHERE email='".$email."' AND password='".$password."' LIMIT 1";
	$res = mysqli_query($db, $sql) or die(mysqli_error($db));
	if (mysqli_num_rows($res) == 1) {
		echo "You have successfully logged in.";
		exit();
	}
	else{
		echo "Invalid login information. Please return to the previous page.";
		exit();
	}
}

?>
