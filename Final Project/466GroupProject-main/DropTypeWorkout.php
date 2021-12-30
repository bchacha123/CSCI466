<html><head><title>View Workouts</title></head>
<style>body{background-color:#ecf9ec}</style>
<body>
<?php
/*
	Group Project 2020 CSCI 466 Database 
	Members: Reinaldo 
			 Miguel
			 Dustin 
			 Christian
			 Bryan

	DropTypeWorkout.php: This file will set up the connection to the database 
						 along with showing the user a message that they have 
						 viewed the available workouts.  
*/
try
{
	include("myUserPass.php");


		$dsn = "mysql:host=courses;dbname=z1861700";
		$pdo = new PDO($dsn, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
		echo "<h2 style=\"font-size:50px;\">You have succefully viewed he type's of workouts!</h2>";
		echo "<button onclick=\"history.back()\">Click here to go back </button>";
}
	catch(PDOexception $e)
	{ 
		echo "Connection to database failed: ". $e->getMessage();
	}

?>
</body>
</html>