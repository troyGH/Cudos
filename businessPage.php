
<?php include 'php/config.php';?>


    <?php
    $businessID = $_GET['placeId'];
    print_r($businessID);
    echo $businessID;
    echo "{$businessID}";
    print_r($_GET);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cudos</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/troy.css" rel="stylesheet">
    <script src="js/troy.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .review{
      padding: 50px 0px 50px 0px;
      border: 2px solid black;
    }
    </style>
  </head>
  <body>
    <!-- Fixed navbar -->
   <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">Cudos</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
           <li class="active"><a href="#">Home</a></li>
           <li><a href="#about">About</a></li>
           <li><a href="#contact">Contact</a></li>
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li><a href="#">Action</a></li>
               <li><a href="#">Another action</a></li>
               <li><a href="#">Something else here</a></li>
               <li role="separator" class="divider"></li>
               <li class="dropdown-header">Nav header</li>
               <li><a href="#">Separated link</a></li>
               <li><a href="#">One more separated link</a></li>
             </ul>
           </li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
		 <li class="dropdown">
		 <a href="#" class="account-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
             <ul class="dropdown-menu">
			 <li><a href=index.php>Log in</a></li>
			 <li><a href=register.php>Create Account</a></li>
         </li>
         </ul>
       </div><!--/.nav-collapse -->
     </div>
   </nav>

<div class="container">
<div class="col-md-12">
<h1 align=center>Starbucks</h1>
</div>
<div class="col-md-1">


</div>
<div class="review col-md-5">
Description:
by roya<br>
<hr><br>
Description:
by eya
</div>
<div class="col-md-3">
This business is not associated with us

</div>
<div class="col-md-3">
<img src="https://www.nbrii.com/wp-content/uploads/2011/02/employee-attitude-surveys.png" class="img-responsive" /><br>


</div>

<div class="col-md-6 pull-right">
<form action="" method="post">
  <div class="form-group">
    <label for="message" class="col-sm-2 control-label">Review</label>

      <textarea class="form-control" rows="4" name="message"></textarea>

  </div>
    <div class="form-group">

      <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
  </div>
</form>
<pre>

  <?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'cmpe195';
    $dbname = 'Cudos';
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }  
?>



  <?php
    // print the review array
      print_r($_POST);
    ?>
    </pre>
    <br />
    <?php
      $message = $_POST["message"];

      if (!empty($message)){

    $query  = "INSERT INTO review (description) VALUES ('{$message}')"; // insert review into database

  $result = mysqli_query($connection, $query);

  echo "{$result}";

  if ($result) {
 
    echo "Success!";
  } else {
 
    die("Database query failed. " . mysqli_error($conn));
  }}
    ?>

    


<?php


$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'cmpe195';
    $dbname = 'Cudos';


// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT review_id, description, stars FROM review where review_id='12'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["review_id"]. " - Review: " . $row["description"]. "Rate" . $row["stars"]. "<br>";
    }
    echo "hi";
} else {
    echo "0 results";
}
$conn->close();



?>3




</div>

</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <footer class="container-fluid text-center">
      <p>&copy; SJSU CMPE195 2016 Project. All rights reserved.</p>
    </footer>

  </body>
</html>
