<?php
//echo "You are inside SelectNum4";
//This file (SelectNum4.php) will do a SQL Statement to create a table with the requirements needed for the assignemtns
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
		  WHERE S = ?;";

	$rspre = $pdo->prepare($mysql);

	$rspre->execute(array($_GET["supplied"]));

	$rows = $rspre->fetchAll(PDO::FETCH_ASSOC);

	drawtable($rows);
}

	catch(PDOexception $e)
	{
		echo "Connection to database failed: " . $e->getMessage();
	}
?>
