<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Torunament</title>
	<link rel="stylesheet" href="styles.css">
	<!-- Fuente-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
</head>
<body>

 <div class="nav-container">
 <nav>
 <a href="http://localhost/formularios/Proyect/homePage.php">Home</a>
 <a href="http://localhost/formularios/Proyect/listTournaments.php">List Tornaments</a>
 <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
 <a href="http://localhost/formularios/Proyect/users.php">Users</a>
 </nav>
 </div>   
<div class="container-teams">





<form action="" method="get" name="">
<div class="tInfo">
<P>Code</P>
</div>

<div class="tInfo">
<input type="text" name="code">
</div>

<div class="tInfo">
<P name="date">Date  : <?php
date_default_timezone_set('America/Costa_Rica');

$date=date("D/M/Y"); 

echo $date;

?></P>
</div>

<div class="tInfo">
<P>Price</P>
</div>

<div class="tInfo">
<input name="price" type="number_format" placeholder="$$$">
</div>

<div class="tInfo">
<P>Category</P>
</div>

<div>

<select name="category" class="tInfo">
  <option value="Beginner">Beginner</option>
  <option value="Medium">Medium</option>
  <option value="Expert">Expert</option>
</select>

</div>


<div>
<input type="submit" value="Create Tournament" class="createTournament" name="createbtn">
</div>


</form>
</div>


    
</body>
</html>


<?php

if(!empty($_REQUEST['createbtn'])){
	
date_default_timezone_set('America/Costa_Rica');

$date=date("D/M/Y"); 	
	
	
$linkDB=  mysqli_connect("localhost","root","");

mysqli_select_db($linkDB, "battlefight");

$sql = "INSERT INTO tournament(code, date, price, category) VALUES ('".$_REQUEST['code']."','".$date."','".$_REQUEST['price']."','".$_REQUEST['category']."')";

mysqli_query($linkDB, $sql);

	
	
	
}




?>