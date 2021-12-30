<html><head><title>Update Weight</title></head><body>
<?php


	try{$dsn = "mysql:host=courses;dbname=z1865959"; //setting up variable for connection to the database
	$pdo = new PDO($dsn, $username, $password);  //connecting to the database
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	echo "<h1>Update Weight</h1>";
	//allows the user to update their weight with a date associated with it
	echo "Update your weight here!";
    	echo "<form action=\"http://students.cs.niu.edu/~z1865959/weightAdded.php\" method=\"POST\">";

	//grabs the information from the user
	echo "User ID: <input type=\"number\" name=\"ID\" min=\"1\"/><br/>";
	echo "New weight: <input type=\"number\" name=\"Pounds\" min=\"1\"/><br/>";
	echo "Date: <input type=\"date\" name=\"Date\" /><br/>";
	
	echo "<input type=\"submit\" value=\"Update Weight\" />";
	echo "</form>";

	}
	catch(PDOexception $e) {
		echo "Connection to database failed: " . $e->getMessage();
	}
?>
</body></html>


