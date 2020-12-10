<?php
	echo "Your Inside Supplies";

	include("myUserPass.php");

	//Including function -> drawtable
	include("tables.php");

	try
	{
		$dsn = "mysql:host=courses;dbname=z1861700";
		$pdo = new PDO($dsn, $username, $password);

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		//Supplier 
		$rsSupp =$pdo->query("SELECT * FROM S;");
		$rows = $rsSupp->fetchAll(PDO::FETCH_ASSOC);

		//drawtable($rows);

		drawtable($rows);
			
	}//End Try


	catch(PDOexception $e)
	{
		echo "Connection to Database failed: " . $e->getMessage();
	}//End Catch	
?>
