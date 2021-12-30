<html>
<head>
    <title>Food Tables</title>
</head>
<body> 
    <h1>Food Info</h1>
    <b>Click below for a list of all foods!</b> <br/><br/>
    <a href="?listF=all">List all Foods</a>
    <br/><br/>
    <b>Or type the name of the food you'd like to search for!</b> <br/><br/>
    <form>
	Search for a food! <input size=5 type="text" name="listF"/>

	<input type="submit" value="Go!"/>
    </form>
    <h2>Track Consumption</h2>
    <b>Fill in the information below to compare your nutrient consumption!</b> <br></br>
    <form action="micro.php" method="POST">
    Select a micronutrient: <select name="micro" id="micro">
    	<option value="Vitamin A">Vitamin A</option>
    	<option value="Vitamin C">Vitamin C</option>
    	<option value="Vitamin D">Vitamin D</option>
    	<option value="Vitamin E">Vitamin E</option>
    	<option value="Calcium">Calcium</option>
    	<option value="Chloride">Chloride</option>
    	<option value="Magnesium">Magnesium</option>
    	<option value="Phosphorus">Phosphorus</option>
    	<option value="Potassium">Potassium</option>
    	<option value="Sodium">Sodium</option>
	<option value="Sulfur">Sulfur</option>
     </select>
	&nbsp;&nbsp;Your Intake: <input size=5 type="text" name="amount"/>
     <select name="units" id="units">
	<option value="g">g</option>
	<option value="mg">mg</option>
	<option value="mcg">mcg</option>
     </select>
	&nbsp;&nbsp;In how many days? <input size=5 type="text" name="days"/> days
     <br><br>
     <input type="submit" value="Submit"/>
     </form>
     <br></br>
     <form>
	<input type="button"  value="Go Back" onclick="history.back()">
    </form>
<?php
include('secrets.php');
include('DrawTable.php');

	try {
		$dsn = "mysql:host=$servername;dbname=$dbname";
		$pdo = new PDO($dsn, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOexception $e) {
		echo "Connection to database failed: " . $e->getMessage();
	}

	// Show all foods
	if (isset($_GET['listF'])) {
		if ($_GET['listF'] == 'all') {
			try {
				$error = null;
				$rs = $pdo->query("SELECT Name, foodCategory, macProteins, macFats, macCarbohydrates, vitaminA, vitaminE, vitaminC, vitaminD, Calcium, Chloride, Magnesium, Phosphorus, Potassium, Sodium, Sulfur FROM FOODS;");
				$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
				echo "<b>ALL FOODS\n\n</b>";
				draw_table($rows);
			}
			catch(PDOexception $e) {
				echo "Query failed: " . $e->getMessage();
			}
		} else {
			// User selects food
			try {
				$sql="SELECT Name, foodCategory, macProteins, macFats, macCarbohydrates, vitaminA, vitaminE, vitaminC, vitaminD, Calcium, Chloride, Magnesium, Phosphorus, Potassium, Sodium, Sulfur FROM FOODS WHERE Name =?";
				$rs = $pdo->prepare($sql);
				$rs->execute([$_GET['listF']]);
				$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
				if (!$rows) {
					echo "<b>** ERROR ** FOOD DOES NOT EXIST IN DATABASE</b>";
				} else {
					draw_table($rows);
				}
			}
			catch(PDOexception $e) {
				echo "Query failed: " . $e->getMessage();
			}
		}	
	}		
?>
</body></html>
