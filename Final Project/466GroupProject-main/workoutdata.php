<html>
    <head>
        <title>User  1 Workout Data</title></head>
        <script src="https://www.w3schools.com/lib/w3.js"></script>
        <body>
    <?php

        include("secrets.php");
        include("libraryWorkout.php");
    
        try
        {
            $dsn = "mysql:host=courses;dbname=z1756030";
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $rs = $pdo->prepare("SELECT DateTime, Type, Intensity, Duration FROM WORKOUT WHERE ID = :ID AND DateTime BETWEEN :TO AND :FROM;");
            $rs->execute(array(':ID' => $_GET["ID"], ':TO' => $_GET["TO"], ':FROM' => $_GET["FROM"]));
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);

            echo "<h1>Workouts over selected period of time</h1>";

            draw_tableWorkout($rows);
            echo "<br/>";

            $rs2 = $pdo->prepare("SELECT Type, Intensity, Duration FROM WORKOUT WHERE ID = 1 AND DateTime BETWEEN :TO AND :FROM;");
            $rs2->execute(array(':TO' => $_GET["TO"], ':FROM' => $_GET["FROM"]));
            $rows = $rs2->fetchAll(PDO::FETCH_ASSOC);

            $datetime1 = new DateTime($_GET["TO"]);
            $datetime2 = new DateTime($_GET["FROM"]);

            $interval = date_diff($datetime1, $datetime2); //used to calculate average calories

            $totalCal = 0; //used to sum calories burned over selected time frame

            foreach($rows as $row)
            {
                $intensity = $row['Intensity'];
                $duration = $row['Duration'];
                $calPerMin = 0;
            
                if($row['Type'] == "Cardio")
                {
                $calPerMin = 11.4; //calories burned per minute
                }

                else if($row['Type'] == "Strength")
                {
                $calPerMin = 9.5; //calories burned per minute
                }

                $workoutCal = ($calPerMin * $duration) * ($intensity/5); //estimated calories burned per workout in table
                $totalCal = $totalCal + $workoutCal; //sum up totals
            }

            $avgCal = $totalCal/($interval->days);

            //display info to user
            echo "<h2>Total calories burned over time duration: </h2>";
            echo round($totalCal) . "<sub>cal</sub>";
            echo "<br/>";
            echo "<h2>Average calories burned per day over time duration: </h2>";
            echo round($avgCal) . "<sub>cal</sub>";
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";
            echo "<form action=\"http://students.cs.niu.edu/~z1756030/userWorkouts.php\" method=\"GET\">";
            echo "<input type=\"submit\" value=\"Workout Date Range Selection\" />";
            echo "</form>";	
    }

        catch(PDOexecption $e)
        {
        echo "Connection to database failed: " . $e->getMessage();
        }

    ?>
</body>
</html>
