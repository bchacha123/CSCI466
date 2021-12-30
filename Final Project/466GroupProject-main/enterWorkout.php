<html><head><title>Succesfully added Workout</title></head>
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

	enterWorkout.php: This file will set up the connection to the database 
					  and it will create the SQL statement that will do the 
					  insertion of the workout the user is entering to the database. 
*/
try
{
	include("myUserPass.php");

		$dsn = "mysql:host=courses;dbname=z1861700";
		$pdo = new PDO($dsn, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $mysql = "INSERT INTO WORKOUT(DateTime, Type, Intensity, Duration, ID) VALUES (?, ?, ?, ?, ?);";

		$rspre = $pdo->prepare($mysql);
		
		$rspre->execute(array($_POST["Workout_time"],$_POST["Workout_type"],$_POST["Workout_intencity"],$_POST["Workout_duration"],$_POST["Workout_ID"]));

		echo "<h2 style=\"font-size:50px;\">Workout Succesfully Added!</h2>";

		echo "<button onclick=\"history.back()\">Click here to go back </button>";

}
	catch(PDOexception $e)
	{ 
		echo "Connection to database failed: ". $e->getMessage();
	}

?>
</body>
</html>