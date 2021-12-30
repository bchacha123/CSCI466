<html><head><title>Entering Workout</title></head>
<style>body{background-color:#ecf9ec}</style>
<body>
<h1 style="font-size:55px;">Workout Log</h1>
<?php
/*
	Group Project 2020 CSCI 466 Database 
	Members: Reinaldo 
			 Miguel
			 Dustin 
			 Christian
			 Bryan

    index.php: This is the my main file. In this file we have a combination of PHP script 
               and HTML. We have a establish a connection to the database and have the 
               necessary requirements to enter a user's workout along with viewing the 
               type's of workout's that are available. 
*/
    include("myUserPass.php");

    try 
    {
        $dsn = "mysql:host=courses;dbname=z1861700";//Establishinh connection to db
        $pdo = new PDO($dsn, $username, $password);//Setting variables

        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //In case of errors

        echo "<h2>Enter your workout</h2>";
        echo "<form action=\"http://students.cs.niu.edu/~z1861700/enterWorkout.php\" method=\"POST\">";




        // User Entering the date and time of workout 
        echo "<label>Select Date and time: </label>";
        echo "<input type=\"datetime-local\" name=\"Workout_time\" /> <br/>";




        // Radio button for the workouts the User will pick 
        echo "<h2>Enter Type of Workout</h2>";
        echo "<input type=\"radio\" value =\"Cardio\" name=\"Workout_type\">";
        echo "<label for = \"Cardio\">Cardio</label>";

        echo "<input type =\"radio\" value =\"Strength\" name=\"Workout_type\">";
        echo "<label for = \"Strength\">Strength</label><br/>";




        // User entering intencity of workout 
        echo "<h2>Enter Workout Intencity</h2>";
        echo "<label>Select workout intencity (between 1 and 10):</label>";
        echo "<input type=\"number\" id=\"Intensity\" name=\"Workout_intencity\" min=\"1\" max=\"10\" />";




        // User entering duraiton of workout
        echo "<h2>Enter Duration, minutes only! ex. 10, 15, 20<h2>";
        echo "<input type=\"number\" name=\"Workout_duration\">";
        echo "<br/>";




        // User Entering Intencity of Workout
        echo "<h2>Enter your User ID</h2>";
        echo "<input type=\"number\" name=\"Workout_ID\" min=\"1\" max=\"10\" /> <br/></br>";




        // Submit button for the first form
        echo "<input type=\"submit\" value=\"Submit Workout\">";
        echo "</form>"; //done with #1 form



        // Form #2 will be created here showing the user the types of workouts
        echo "<h2>View Type of Workout's</h2>";

        // Dropdown for type of workouts 
        echo "<form action=\"http://students.cs.niu.edu/~z1861700/DropTypeWorkout.php\" method=\"POST\">";
        echo "<label for=\"TypeWorkout\">View type of workouts:";

        echo "<select name=\"TypeWorkout\" id=\"TypeWorkout\">";
        echo "<option value=\"Cardio\">Cardio</option>";
        echo "<option value=\"Strength\">Strength</option>";
        echo "<br><br>";



        // Submitting second form 
        echo "<input type=\"submit\" value=\"Done Viewing!\">";
        echo "</form>";// Done with #2 form
    }

    catch(PDOexception $e)
    {
        echo "Connection failed, Try again!" . $e->getMessage();
    }

?>
</body>
</html>
