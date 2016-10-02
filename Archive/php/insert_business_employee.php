
<?php include "config.php"; ?>
<?php

	session_start();

	$businessID =  isset($_GET['ID']) ? $_GET['ID'] : '';
	$_SESSION["ID"] = $businessID;
	
	$First = isset($_GET['First']) ? $_GET['First'] : '';
	$_SESSION["First"] = $First;

	$Last= isset($_GET['Last']) ? $_GET['Last'] : '';
	$_SESSION["Last"] = $Last;

	try {

				$insertNewUser = "INSERT INTO `business` (`GoogleID`) VALUES ('$businessID')";
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());
					
				echo "Successful creation of business";
				
				$insertNewUser = "INSERT INTO `employee` (`FirstName`,`LastName`) VALUES ('$First','$Last')";
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());
            	
				echo "Successful creation of employee";
				
				
				$fetch = mysql_fetch_assoc(mysql_query("SELECT * FROM business WHERE GoogleID = '$businessID'"));
				$bID = $fetch['BusinessID'];
				
				$fetch = mysql_fetch_assoc(mysql_query("SELECT * FROM employee WHERE FirstName = '$First' AND  LastName = '$Last'"));
				$eID = $fetch['EmployeeID'];
				
				mysql_query('SET foreign_key_checks = 0');
				$insertNewUser = "INSERT INTO `businessemployee` (`BusinessID`,`EmployeeID`) VALUES ('$bID','$eID')";
				
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());
            	mysql_query('SET foreign_key_checks = 1');
				echo "Successful creation of businessemployee";	
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}

?>