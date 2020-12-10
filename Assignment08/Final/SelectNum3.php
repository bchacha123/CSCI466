<?php
//echo "You are inside SelectNum3";
//This file (SelectNum3.php) will display the data using requirement from the assignment
try
{
	
	include("myUserPass.php");
	include("tables.php");


		
		$dsn = "mysql:host=courses;dbname=z1861700";
		$pdo = new PDO($dsn, $username, $password);


		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$mysql = "SELECT SNAME, PNAME, QTY
		  	  FROM SP JOIN P
		  	  USING(P) 
		  	  JOIN S
	          	  USING(S) 
			  WHERE P = ?;";

		$rspre = $pdo->prepare($mysql);

		$rspre->execute(array($_GET["part"]));

		$rows = $rspre->fetchAll(PDO::FETCH_ASSOC);

		drawtable($rows);

}
	catch(PDOexception $e)
	{ 
		echo "Connection to database failed: ". $e->getMessage();
	}
?>
