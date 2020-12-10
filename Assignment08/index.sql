<html>
    <head>
        <title>Assignmne08</title>
    </head>

    <body>

    <?php
     	echo "Is my PHP working?";

	try
	{
		$dsn = "mysql:host=courses;dbname=z1861700";
		$pdo = new PDO($dsn, $username, $password);

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}//End Try

	catch(PDOexception $e)
	{
		echo "Connection to Database failed: " . $e->getMessage();
	}//End Catch 
     ?>

    </body>

</html>