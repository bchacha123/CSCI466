<?php
    #get rid of this for secrets
    $username = "z1880434";
    $password = "1993Oct12";

    try{
        $dsn = "mysql:host=courses;dbname=z1880434";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $ssPounds;
        $ssTablespoon;
        $ssGrams;
        $ssOunces;
        $ssCups;

        switch($_POST["servingunit"]){
            case "Pounds" :
                $ssPounds = $_POST["servingsize"];
                $ssTablespoon = $_POST["servingsize"] * 31;
                $ssGrams = $_POST["servingsize"] * 454;
                $ssOunces = $_POST["servingsize"] * 16;
                $ssCups = $_POST["servingsize"] * 2;
            break;
            case "Grams" :
                $ssPounds = $_POST["servingsize"] * 0.0022;
                $ssTablespoon = $_POST["servingsize"] * 0.0782;
                $ssGrams = $_POST["servingsize"];
                $ssOunces = $_POST["servingsize"] * 0.0353;
                $ssCups = $_POST["servingsize"] * 0.00496;
            break;
            case "Tablespoons" :
                $ssPounds = $_POST["servingsize"] * 0.0326;
                $ssTablespoon = $_POST["servingsize"];
                $ssGrams = $_POST["servingsize"] * 15;
                $ssOunces = $_POST["servingsize"] * 0.5;
                $ssCups = $_POST["servingsize"] * 0.0625;
            break;
            case "Ounces" :
                $ssPounds = $_POST["servingsize"] * 0.0625;
                $ssTablespoon = $_POST["servingsize"] * 2;
                $ssGrams = $_POST["servingsize"] * 28.3495;
                $ssOunces = $_POST["servingsize"];
                $ssCups = $_POST["servingsize"] * 0.125;
            break;
            case "Cups" :
                $ssPounds = $_POST["servingsize"] * 0.5216;
                $ssTablespoon = $_POST["servingsize"] * 16;
                $ssGrams = $_POST["servingsize"] * 125;
                $ssOunces = $_POST["servingsize"] * 8;
                $ssCups = $_POST["servingsize"];
            break;
        }

        $insertintodb = $pdo->prepare("INSERT INTO FOODS(Name, foodCategory, dailyValue, ssPounds, ssTablespoon, ssGrams, 
                                                    ssOunces, ssCups, macProteins, macFats, macCarbohydrates, vitaminA,
                                                    vitaminE, vitaminC, vitaminD, Calcium, Chloride, Magnesium, Phosphorus,
                                                    Potassium, Sodium, Sulfur)
                                                    VALUES (\"$_POST[name]\", \"$_POST[type]\", \"$_POST[calories]\", $ssPounds, $ssTablespoon, $ssGrams
                                                    , $ssOunces, $ssCups, \"$_POST[Protein]\", \"$_POST[Fats]\", \"$_POST[Carbohydrates]\",
                                                    \"$_POST[vitaminA]\", 0, \"$_POST[vitaminC]\", \"$_POST[vitaminD]\",
                                                    \"$_POST[Calcium]\", 0, \"$_POST[Magnesium]\", 0,
                                                    \"$_POST[Potassium]\", \"$_POST[Sodium]\", 0);");

	$insertintodb->execute();

	echo "<html>";
	echo "<body>Insertion Complete<br>";
    echo "<a href=\"../groupproject/insertfooddrink.html\">";
    #Change this href so it goes back to the proper page
	echo "<button type=\"button\">Go Back</button>";
	echo "</a>";
	echo "</body></html>";
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
?>
