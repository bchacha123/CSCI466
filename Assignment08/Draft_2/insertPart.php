<html>
	<body>

<?php
$dsn = "mysql:host=courses;dbname=z1861700";

if (!$dsn)
{
	die("Could not connect: " . mysql_error());
}

USE("PNAME", $dsn);

$sql="INSERT INTO nametable (PNAME) 
	VALUES 
	($_POST[PNAME])";

if(!mysql_query($sql,$dsn))
{
	die("Eroor: " . mysql_error());
}

mysql_close($dsn)


?>
	
	</body>
</html>
