
	<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShoutMS - Rate an Employee of a Local Business</title>
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="https://s3-us-west-1.amazonaws.com/client-tier/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://s3-us-west-1.amazonaws.com/client-tier/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script type = "text/javascript" src="JSScript.js"></script>
</head>
<body>
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.html">ShoutMS</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="http://shoutmyservice.com/" accesskey="1" title="">Home</a></li>
				<li><a href="http://shoutmyservice.com/Search.html" accesskey="2" title="">Search</a></li>
				<li><a href="http://shoutmyservice.com/Signup.html" accesskey="3" title="">Signup</a></li>
				<li><a href="http://shoutmyservice.com/FutureProjects.html" accesskey="4" title="">Future</a></li>
				<li><a href="http://shoutmyservice.com/ContactUs.html" accesskey="5" title="">Contact</a></li>
			</ul>
		</div>
	</div>
		<h1>Employees</h1>
</body>
</html>
	<?php
session_start();
$host = "dbserver.cgps93of9tq3.us-west-1.rds.amazonaws.com:3306";
$username = "root";
$password = "cmpe195a";
$dbname = "shoutmyservice";

$businessID =  isset($_POST['getID']) ? $_POST['getID'] : '';
$_SESSION["getID"] = $businessID;


	
// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT FirstName FROM employee, business
	INNER JOIN businessemployee ON businessemployee.BusinessID = business.BusinessID
	WHERE business.GoogleID = '$businessID' AND businessemployee.EmployeeID = employee.EmployeeID";
	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='http://ec2-54-67-77-82.us-west-1.compute.amazonaws.com/reviews.php'>".$row['FirstName']. "</a>";
		//TODO: Pull up employeeID as well, create a form, and pass ID over to review.
$employeeID =  isset($_GET['ID']) ? $_GET['ID'] : '';
	$_SESSION["ID"] = $employeeID;
        echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

