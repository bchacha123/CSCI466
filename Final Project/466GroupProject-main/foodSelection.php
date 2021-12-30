<html><head><title>Food</title></head><body>
<?php

  try {
    $dsn = "mysql:host=courses;dbname=z1865959"; //sets up a variable for the connection to the database
    $pdo = new PDO($dsn, $username, $password);  //connects to the database
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //sets the error mode attribute for debugging

    echo "<h1>Food Consumed</h1>";
        //starts a form to allow the user to select a date and id to show food eaten over a period of time
    echo "Select a Date to Show Food consumed";
    echo "<form action=\"http://students.cs.niu.edu/~z1865959/foodsTablePeriodOfTime.php\" method=\"GET\">";

    echo "ID: <input type=\"number\" name=\"ID\" min=\"1\"/></br>";
    echo "TO: <input type=\"date\" name=\"TO\" />";
    echo "FROM: <input type=\"date\" name=\"FROM\" />";

    echo "<input type=\"submit\" value=\"Selection\" />";
    echo "</form>";

  }
  catch(PDOexception $e) {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>
</body></html>

