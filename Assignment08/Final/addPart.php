<?php

//echo "You are inside addPart";
//This file (addPart.php) will add a new part to the Database 
try
{
	include("myUserPass.php");
	include("tables.php");

		$dsn = "mysql:host=courses;dbname=z1861700";
		$pdo = new PDO($dsn, $username, $password);



		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$mysql = "INSERT INTO P(PNAME,COLOR,WEIGHT) VALUES(?,?,?)";

		$rspre = $pdo->prepare($mysql);
		
		$rspre->execute(array($_POST["Part_Name"],$_POST["Part_Color"],$_POST["Part_Weight"]));
	
		echo "Part Succesfully Added!";
}
	catch(PDOexception $e)
	{ 
		echo "Connection to database failed: ". $e->getMessage();
	}

?>
