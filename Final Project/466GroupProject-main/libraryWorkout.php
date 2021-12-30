<?php
function draw_tableWorkout($rows) 
{
    if(!$rows) //if the current rows is empty, diplay a message stating so
    {
        echo "<h3>None currently, sorry!</h3>";
    }
    else{ //setting up the table tag to display the information that was passed in as the variable
    echo "<table id=\"id01\" border=1 cellspacing=1>";
    echo "<tr>";
	//loops through, showing the header of the column and the column information itself 
    foreach($rows[0] as $key => $item) 
    { 
      echo "<th>$key</th>";
    }
      echo "</tr>";
    foreach($rows as $row) 
    {
      echo "<tr>";
      foreach($row as $key => $item) 
      {
        echo "<td>$item</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
    }
}
?>