
	<?php include "../inc/dbinfo.inc"; ?>
	<?php
	session_start();

	$Name =  isset($_POST['Name']) ? $_POST['Name'] : '';
	$_SESSION["Name"] = $Name;
	
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
	$_SESSION["Email"] = $Email;

	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	$_SESSION["Password"] = $Password;
	
	

	try {
		$connectionstring = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD)
        	or die('Could not connect: ' . mysql_error());

        mysql_select_db(DB_DATABASE)
        	or die('Could not select database: ' . mysql_error());
        //create new user
				//insert into user table
        		$insertNewUser = "INSERT INTO customer (Name, Email, Password)
				 	VALUES ('$Name', '$Email', '$Password')";
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());
            	
				echo "Successful creation of new user";
				
        
        	/*$query = "SELECT Username FROM user WHERE user.Password = '$password'";
        	$queryexe = mysql_query($query)
        		or die('Could not query database: ' . mysql_error());
             
        	while($dataArray = mysql_fetch_array($queryexe, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
   
					if ($col_value == $username) {
     					//jump to login_page
						header("Location: login_page.html");
						
     				} 
     			}
			    echo "wrong UserName or Password";
     			print "\n";
    		}
			
    		print "</table>\n";
			 echo "wrong UserName or Password";
             */
		
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>

