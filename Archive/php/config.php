
<?php include "../cgi-bin/dbinfo.inc"; ?>
<?php
    $con = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die('Could not connect: ' . mysql_error());
    if(!$con)
     {
        echo "Unable to connect to DB: ".mysql_error();
        exit;
    }

    if(!mysql_select_db(DB_DATABASE))
    {
        echo "Unable to select mydbname: " . mysql_error();
        exit;
    }
?>

