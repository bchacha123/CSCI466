<html>
    <header>
        <title>Insert Meal</title>
        <h1>Insert Meal</h1>
    </header>
    <body>
        <?php

            #remove these and insert a secrets for the database.
            $username = "z1880434";
            $password = "1993Oct12";

            try{
                $dsn = "mysql:host=courses;dbname=z1880434";
                $pdo = new PDO($dsn, $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $meats = $pdo->query("SELECT Name FROM FOODS WHERE foodCategory = \"Meat\";");
                $vegetables = $pdo->query("SELECT Name FROM FOODS WHERE foodCategory = \"Vegetable\";");
                $fruits = $pdo->query("SELECT Name FROM FOODS WHERE foodCategory = \"Fruit\";");
                $beverages = $pdo->query("SELECT Name FROM FOODS WHERE foodCategory = \"Beverage\";");
                $userid = $pdo->query("SELECT ID FROM USER;");

                $meat = $meats->fetchAll(PDO::FETCH_ASSOC);
                $fruit = $fruits->fetchAll(PDO::FETCH_ASSOC);
                $vegetable = $vegetables->fetchAll(PDO::FETCH_ASSOC);
                $beverage = $beverages->fetchAll(PDO::FETCH_ASSOC);
                $useri = $userid->fetchAll(PDO::FETCH_ASSOC);

                echo "<form action=\"\" method=\"POST\">";
                    echo "Meal Date: <input type=\"date\" name=\"mealdate\"><br>";

                    echo "User: <select name =\"user\">";
                        foreach($useri as $user){
                            echo "<option value=\"$user[ID]\">$user[ID]</option>";
                        }
                    echo "</select><br>";

                    echo "Meat: <select name =\"meat\">";
                        foreach($meat as $mea){
                            echo "<option value=\"$mea[Name]\">$mea[Name]</option>";
                        }
                    echo "</select><br>";

                    echo "Vegetable: <select name =\"vegetable\">";
                        foreach($vegetable as $vegetabl){
                            echo "<option value=\"$vegetabl[Name]\">$vegetabl[Name]</option>";
                        }
                    echo "</select><br>";

                    echo "Fruit: <select name =\"fruit\">";
                        foreach($fruit as $frui){
                            echo "<option value=\"$frui[Name]\">$frui[Name]</option>";
                        }
                    echo "</select><br>";

                    echo "Beverage: <select name =\"beverage\">";
                        foreach($beverage as $beverag){
                            echo "<option value=\"$beverag[Name]\">$beverag[Name]</option>";
                        }
                    echo "</select><br>";

                    echo "<input type=\"submit\"><br>";
                    
                echo "</form>";
                if(isset($_POST["user"]) && isset($_POST["mealdate"]) && isset($_POST["meat"]) && isset($_POST["vegetable"]) && isset($_POST["fruit"]) && isset($_POST["beverage"])){
                    $insertmeal = $pdo->prepare("INSERT INTO MEAL (DateTime, ID, Meat, Vegetable, Fruit, Beverage) VALUES (\"$_POST[mealdate]\", \"$_POST[user]\", \"$_POST[meat]\", \"$_POST[vegetable]\", \"$_POST[fruit]\", \"$_POST[beverage]\");");
		    $insertmeal->execute();
            echo "<h3>Insertion Complete</h3><br>";
            
            #insert an href inside of a to take it back to the main page after meal inserted.
		    echo "<a ><button type=\"button\">Go Back</button></a>";
                }
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        ?>
    </body>
</html>
