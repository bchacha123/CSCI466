<?php
//FUNCTION THAT WILL PRINT THE CONTENT OF SUPPLY TABLE AND PARTS 
function drawtable($rows)
{
	echo "<table border=1 cellspacing=1>";
	echo "<tr>";

	foreach($rows[0] as $key => $item)
	{
		echo "<th>$key</th>";
	}//End foreach

	echo "</tr>";
	foreach($rows as $row)
	{
		echo "<tr>";
		foreach($row as $key => $item)
		{
			echo "<td>$item</td>";

		}//End inside foreach #3

		echo "</tr>";

	}//End foreach #2

	echo "/table";
}//End function 
?>
