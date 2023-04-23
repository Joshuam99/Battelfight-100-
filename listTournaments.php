<?php  

if(!empty($_REQUEST['codeid'])){

    if (isset($_GET['codeid'])) {
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "battlefight");
        
        $code = $_GET['codeid'];
        
        $query = "DELETE FROM tournament WHERE code='$code'";
        mysqli_query($link, $query);
        
        mysqli_close($link);
        
        header("Location: listTournaments.php");
        exit();
    }    


}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournaments List</title>
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
            <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
            <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
            <a href="http://localhost/formularios/Proyect/users.php">Users</a>
        </nav>
    </div>

    <div class="team-header">
        <h1>Tournaments List</h1>
    </div>
    <div class="nav-container">

        <div>

            <?php

            $link = mysqli_connect("localhost", "root", "");

            mysqli_select_db($link, "battlefight");


            $result = mysqli_query($link, "SELECT * FROM tournament");


            echo "<table class='table-dark' >";
            echo "<tr><th scope='row' >Code</th><th>Date</th><th>Price</th><th>Category</th><th>Update</th><th>Delete</th></tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row['code'] . "</td><td>" . $row['date'] . "</td><td>" . $row['price'] . "</td><td>" . $row['category'] . "</td><td><a href='updateTournament.php?codeid=" . $row['code'] . "'>update</a></td><td><a href='listTournaments.php?codeid=" . $row['code'] . "'>delete</a></td></tr>";
            }
            echo "</table>";

            mysqli_free_result($result);

            mysqli_close($link);

            ?>


        </div>

    </div>


</body>

</html>