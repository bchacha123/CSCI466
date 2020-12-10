<html>
    <head>
        <title>Assignmne08</title>
    </head>

    <body>

<?php
	echo "Is my PHP working?";

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
		//echo "<header><h2>Supplies</h2></header>";

		drawtable($rows);

		//Parts 
		$rsParts =$pdo->query("SELECT * FROM P;");
		$rows = $rsParts->fetchAll(PDO::FETCH_ASSOC);

		drawtable($rows);
		//echo "<header><h2>Parts</h2></header>";
		//drawtable($rows);
				
		
		//echo "<header><h2>User Part Selection</h2></header>";
		//$rsUserSupp = $pdo->query("SELECT PNAME FROM P;");

		//echo "<select name=Parts>";
		//while($rows = $rsUserSupp->fetch(PDO::FETCH_ASSOC))
		//{
		//	$PNAME = $rows["PNAME"];

		//	echo "<option value =$PNAME>$PNAME</option>";
		//}
		//echo "</select>";

		//insert part to database 



	}//End Try


	catch(PDOexception $e)
	{
		echo "Connection to Database failed: " . $e->getMessage();
	}//End Catch	
?>

<!-- 
<form action="insertPart.php" method="POST">
New Part Name:<input type="text" name"PNAME" />

</form>
-->

<!-- <input type="Submit Part"/> -->
<!--
<form action="insertSupply.php" method="POST">
New Supplier Name:<input type="text" name"SNAME">
</form> 

-->
<form action="http://students.cs.niu.edu/~z1861700/SelectNum3.php" method="GET">
	<input type ="radio" id = "Nut" name = "part" value = "P1">
	<label for = "Nut">Nut</label><br>

</form>

    </body>

</html>
