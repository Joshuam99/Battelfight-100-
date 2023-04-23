<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
	<!-- Fuente-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <title>About</title>

</head>
<body>

<h1 style="justify-content: center;display: flex;" >Logins</h1>

<div class="nav-container">
 <nav class="">
 <a href="http://localhost/formularios/Proyect/homePage.php">Home</a>
 <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
 <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
 <a href="http://localhost/formularios/Proyect/users.php">Users</a>
 <a href="http://localhost/formularios/Proyect/LogOut.php">Log Out</a>
</nav>
 </div> 


<div>

<div style="display: flex;justify-content: center;" >
<?php


$fp = fopen("logins.txt", "r"); 
while(!feof($fp)) {
    $line = fgets($fp);  
    echo $line . "<br />";
}
fclose($fp); 

?>


</div>



</div>
    
</body>
</html>