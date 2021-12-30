<?php
function draw_table1($rows) {
    if(!$rows) //if the current rows is empty, diplay a message stating so
      echo "<h3>None currently, sorry!</h3>";
    else{ //setting up the table tag to display the information that was passed in as the variable
    echo "<table id=\"myTable\" border=1 cellspacing=1>";
    echo "<tr>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')\" style=\"cursor:pointer\">Name</th>";
    	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(2)')\" style=\"cursor:pointer\">Food Category</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(3)')\" style=\"cursor:pointer\">Proteins</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(4)')\" style=\"cursor:pointer\">Fats</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(5)')\" style=\"cursor:pointer\">Carbohydrates</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(6)')\" style=\"cursor:pointer\">Calories</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(7)')\" style=\"cursor:pointer\">Serving Size Grams</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(8)')\" style=\"cursor:pointer\">Vitamin A % D.V.</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(9)')\" style=\"cursor:pointer\">Vitamin C % D.V.</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(10)')\" style=\"cursor:pointer\">Vitamin D % D.V.</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(11)')\" style=\"cursor:pointer\">Calcium % D.V.</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(12)')\" style=\"cursor:pointer\">Magnesium % D.V.</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(13)')\" style=\"cursor:pointer\">Potassium mg</th>";
	echo "<th onclick=\"w3.sortHTML('#myTable', '.item', 'td:nth-child(14)')\" style=\"cursor:pointer\">Sodium mg</th>";
  	echo "</tr>";
    foreach($rows as $row) {
      echo "<tr class=\"item\">";
      foreach($row as $key => $item) {
        echo "<td>$item</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
    }
}
?>
