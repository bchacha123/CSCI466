<!-- 	Name: Brayan Chacha G    
	Date: 11-6-2020
   Professor: Lehuta
      Course: CSCI 466 Database 
  Assignment: Assignment #8, PHP W/ FORMS  
  	      For this assignemnt, you will be developing PHP/PDO code for a page 
	      or set of pages that fulfill(s) the requirements found in this PDF. 
-->
<html>
    <head>
        <title>Assignmne08</title>
    </head>

    <body>
	<h1>Suppliers & Parts Database<h1>
	
	<h2>Show Suppliers Content</h2>
	<form action = "http://students.cs.niu.edu/~z1861700/Supplies.php" method="GET">
		<input type = "Submit" name = "Submit" value = "Supplies"/>
	</form>

	<h2>Show Parts Content</h2>
	<form action = "http://students.cs.niu.edu/~z1861700/Parts.php" method="GET">
		<input type = "Submit" name = "Submit" value = "Parts"/>
	</form>



<h2>User Selection, Pick one then Submit button</h2>
<form action="http://students.cs.niu.edu/~z1861700/SelectNum3.php" method="GET">

	<input type ="radio" id = "Nut" name = "part" value = "P1">
	<label for = "Nut">Nut</label><br>

	<input type ="radio" id = "Bolt" name = "part" value = "P2">
	<label for = "Bolt">Bolt</label><br>

	<input type ="radio" id = "Screw" name = "part" value = "P3">
	<label for = "Screw">Blue Screw</label><br>

	<input type ="radio" id ="Screw" name = "part" value = "P4">
	<label for = "Screw">Red Screw</label><br>

	<input type ="radio" id ="Cam" name = "part" value = "P5">
	<label for = "Cam">Cam</label><br>
 	
	<input type ="radio" id ="Cog" name = "part" value = "P6">
	<label for = "Cog">Cog</label><br>

	<input type = "Submit" name = "Submit" value = "Submit"/>
</form>



<h2>User Selection, Pick one then Submit button</h2>
<form action="http://students.cs.niu.edu/~z1861700/SelectNum4.php" method="GET">
	<input type ="radio" id ="Smith" name = "supplied" value = "S1">
	<label for = "Smith">Smith</label><br>

	<input type ="radio" id ="Jones" name = "supplied" value = "S2">
	<label for = "Jones">Jones</label><br>

	<input type ="radio" id ="Blake" name = "supplied" value = "S3">
	<label for = "Blake">Blake</label><br>

	<input type ="radio" id ="Clark" name = "supplied" value = "S4">
	<label for = "Clark">Clark</label><br>

	<input type ="radio" id ="Adams" name = "supplied" value = "S5">
	<label for = "Adams">Adams</label><br>


	<input type = "Submit" name = "Submit" value ="Submit"/>
</form>



<h2>Add a Part, press Submit when done!</h2>
<form action ="http://students.cs.niu.edu/~z1861700/addPart.php" method ="POST">
	Part Name:<input type = "text" name = "Part_Name"> 
	Color:<input type ="text" name ="Part_Color">
	Weight:<input type ="text" name ="Part_Weight">

	<h3>Submit Part</h3>
	<input type = "Submit" name = "Submit" value = "Submit"/>
</form>



<h2>Add a Supplier, press Submit when done!</h2>
<form action ="http://students.cs.niu.edu/~z1861700/addSupplier.php" method="POST">
	Supplier Name:<input type="text" name="Supp_Name">
	Status:<input type="text" name="Supp_Status">
	City:<input type="text" name="Supp_City">

	<h3>Submit Supplier</h3>
	<input type = "Submit" name = "Submit" value = "Submit"/>
</form>

    </body>

</html>
