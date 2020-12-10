<?php
//echo "You are inside addSupplier";
//
//This file (addSupplier.php) will add a supplier to the Database
try
{
	include("myUserPass.php");
	include("tables.php");


		$dsn = "mysql:host=courses;dbname=z1861700";
		$pdo = new PDO($dsn, $username, $password);


		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$mysql = "INSERT INTO S(SNAME,STATUS,CITY) VALUE(?,?,?)";

		$rspre = $pdo->prepare($mysql);

		$rspre->execute(array($_POST["Supp_Name"],$_POST["Supp_Status"],$_POST["Supp_City"]));

		echo "Supplier Succesfully Added!";
}
	catch(PDOexception $e)
	{ 
		echo "Connection to database failed: ". $e->getMessage();
	}

?>
