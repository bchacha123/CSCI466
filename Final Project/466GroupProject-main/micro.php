<html>
<head>
    <title>Consumption</title>
</head>
<h1>Your Consumption</h1>
</html>
<?php		// Different cases are used for whatever micro the user chooses

	if (isset($_POST['micro']) && isset($_POST['amount']) && isset($_POST['days']) && isset($_POST['units'])) {
		switch ($_POST['micro']) {
		case 'Vitamin A':
			$micro = $_POST['micro'];	// User data is put into variables
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 900) * 100;
			$unit = $_POST['units'];	// Variables are displayed
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 900 mcg per day</b>";
			break;
		
		case 'Vitamin C':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 90) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 90 mg per day</b>";
			break;
		
		case 'Vitamin D':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 20) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 20 mcg per day</b>";
			break;
		
		case 'Vitamin E':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 15) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 15 mg per day</b>";
			break;
		
		case 'Calcium':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 1300) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 1300 mg per day</b>";
			break;
		
		case 'Chloride':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 2300) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 2300 mg per day</b>";
			break;
		
		case 'Magnesium':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 420) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 420 mg per day</b>";
			break;
		
		case 'Phosphorus':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 1250) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 1250 mg per day</b>";
			break;
		
		case 'Potassium':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 4700) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 4700 mg per day</b>";
			break;
		
		case 'Sodium':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$dv = ($daily / 2300) * 100;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit or " . round($dv, 1) . "% daily value<br></br>";
			echo "<b>The recommended amount is 2300 mg per day</b>";
			break;
		
		case 'Sulfur':
			$micro = $_POST['micro'];
			$intake = $_POST['amount'];
			$days = $_POST['days'];
			$daily = $intake / $days;
			$unit = $_POST['units'];
			echo "Your daily intake of $micro is $daily $unit";
			break;
		}
		echo "<br></br><form><input type=\"button\" value=\"Go Back\" onclick=\"history.back()\"></form>";
	} else {
		echo "<b>** ERROR ** Missing Variables!</b>";
	}
?>

