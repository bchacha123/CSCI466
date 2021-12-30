<html><head><title>PartsAdded</title></head><body>
<?php

  try {
    $dsn = "mysql:host=courses;dbname=z1865959";  //sets up a variable to connect to the database
    $pdo = new PDO($dsn, $username, $password);   //connects to the database
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  //sets up error mode attributes for debugging

	$prepared = $pdo->prepare("INSERT INTO WEIGHT(ID,Pounds,Date)VALUES(:ID,:Pounds,:Date)");
	 $success = $prepared->execute(array(':ID' => $_POST["ID"], ':Pounds' => $_POST["Pounds"], ':Date' => $_POST["Date"] ));

	//prints out success message and allows user to return to Weight page
	echo "<h3>Weight Updated!</h3>";
	echo "<form action=\"http://students.cs.niu.edu/~z1865959/weightUpdate.php\" method=\"POST\">";
	echo "<input type=\"submit\" value=\"Weight Page\" />";
	echo "</form>";

	}
	catch(PDOexception $e) {
	echo "Connection to database failed: " . $e->getMessage();
	}
?>
</body></html>


