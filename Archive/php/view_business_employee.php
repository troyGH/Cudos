
<?php include "config.php"; ?>
<?php

	session_start();

	$businessID =  isset($_GET['getID']) ? $_GET['getID'] : '';
	$_SESSION["getID"] = $businessID;
	
	$businessID = trim($businessID);
	$first = array();
	$last = array();
	
	try {

		$result = mysql_query("SELECT FirstName, LastName FROM employee, business
		INNER JOIN businessemployee ON businessemployee.BusinessID = business.BusinessID
		WHERE business.GoogleID = '$businessID' AND businessemployee.EmployeeID = employee.EmployeeID");
	
        while($row = mysql_fetch_assoc($result) ){
			array_push($first, $row['FirstName']);
			array_push($last, $row['LastName']);
			echo $row['FirstName'];
		}
		print_r($first);
		print_r($last);
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
?>