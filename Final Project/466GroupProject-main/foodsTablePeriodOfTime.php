<html><head><title>Foods Eaten</title></head>
<script src="https://pavanpwm.github.io/ImprovedSortInW3ByBtd.js"></script>
<body>
<?php

  include("libraryFoodSelection.php");
  try {
    $dsn = "mysql:host=courses;dbname=z1865959"; //sets up a variable for the connection to the database
    $pdo = new PDO($dsn, $username, $password);  //connects to the database
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //sets the error mode attribute for debugging


	//SQL for the date range and ID selection of the food eaten over a period of time
	$sql = <<<SQL
SELECT Name, foodCategory, macProteins, macFats, macCarbohydrates, dailyValue, ssGrams, vitaminA, vitaminC, vitaminD, Calcium, Magnesium, Potassium, Sodium 
FROM FOODS WHERE Name IN(SELECT Meat FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR 
Name IN(SELECT Vegetable FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR 
Name IN(SELECT Fruit FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR 
Name IN(SELECT Beverage FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID)
SQL;
	$rs = $pdo->prepare($sql);	

	//grabs the GET information from the foodSelection page 
	$rs->execute(array(':TO' => $_GET["TO"], ':FROM' => $_GET["FROM"],':ID' => $_GET["ID"] ));

	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);

	//SQL for the total calories over the period of time for the user and date selected
	$rs1 = $pdo->prepare("SELECT SUM(dailyValue) FROM FOODS WHERE Name IN(SELECT Meat FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Vegetable FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Fruit FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID)OR Name IN(SELECT Beverage FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID);"); 
		
	$rs1->execute(array(':TO' => $_GET["TO"], ':FROM' => $_GET["FROM"],':ID' => $_GET["ID"] ));
	$rows1 = $rs1->fetchColumn();

	//SQL for the total protein over the period of time for the user and date selected
	$rs2 = $pdo->prepare("SELECT SUM(macProteins) FROM FOODS WHERE Name IN(SELECT Meat FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Vegetable FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Fruit FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID)OR Name IN(SELECT Beverage FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID);");

        $rs2->execute(array(':TO' => $_GET["TO"], ':FROM' => $_GET["FROM"],':ID' => $_GET["ID"] ));
        $rows2 = $rs2->fetchColumn();

	//SQL for the total fats over the period of time for the user and date selected
	$rs3 = $pdo->prepare("SELECT SUM(macFats) FROM FOODS WHERE Name IN(SELECT Meat FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Vegetable FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Fruit FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID)OR Name IN(SELECT Beverage FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID);");

        $rs3->execute(array(':TO' => $_GET["TO"], ':FROM' => $_GET["FROM"],':ID' => $_GET["ID"] ));
        $rows3 = $rs3->fetchColumn();

	//SQL for the total carbs over the period of time for the user and date selected
	$rs4 = $pdo->prepare("SELECT SUM(macCarbohydrates) FROM FOODS WHERE Name IN(SELECT Meat FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Vegetable FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID) OR Name IN(SELECT Fruit FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID)OR Name IN(SELECT Beverage FROM MEAL WHERE DateTime BETWEEN :TO AND :FROM AND ID = :ID);");

        $rs4->execute(array(':TO' => $_GET["TO"], ':FROM' => $_GET["FROM"],':ID' => $_GET["ID"] ));
        $rows4 = $rs4->fetchColumn();

	echo "<h1>Food over selected period of time</h1>";
        //calls outside function called draw table, passing the variable called rows that was the result set of the query
   	draw_table1($rows);
	echo "Total Calories: " . $rows1;
   	echo "<br/>";
	echo "Total Proteins: " . $rows2;
	echo "<br/>";
	echo "Total Fats: " . $rows3;
	echo "<br/>";
	echo "Total Carbohydrates: " . $rows4;
	
	//button to go back to the ID and Date selection for foodeated over a period of time
	echo "<form action=\"http://students.cs.niu.edu/~z1865959/foodSelection.php\" method=\"GET\">";
    	echo "<input type=\"submit\" value=\"Food Date Range Selection\" />";
    	echo "</form>";	

  }
  catch(PDOexception $e) {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>
</body></html>
