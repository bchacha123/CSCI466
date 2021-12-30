<html>
    <head><title>User Workout Data Selection</title></head>
    <body>
    <?php 
        include("secrets.php");

        try
        {
            $dsn = "mysql:host=courses;dbname=z1756030";
            $pdo = new PDO($dsn, $username, $password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            
            echo "<form action =\"http://students.cs.niu.edu/~z1756030/workoutdata.php\" method=\"GET\">";
            echo "<h3>Please select user</h3>";
            echo "ID: <input type=\"number\" name=\"ID\" min=\"1\"/></br>";
            echo "<h3>Please select a Date range to show workouts completed</h3>";
            echo "TO: <input type=\"date\" name=\"TO\" />";
            echo "FROM: <input type=\"date\" name=\"FROM\" />";
            echo "<input type=\"submit\" value=\"Selection\" />";
            echo "</form>";
        }
        catch(PDOexception $e) 
        {
            echo "Connection to database failed: " . $e->getMessage();
        }
    ?>
</body>
</html>