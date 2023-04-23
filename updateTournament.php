<?php


$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "battlefight");

$result = mysqli_query($link, "SELECT * FROM tournament WHERE code= '" . $_REQUEST['codeid'] . "'");

$extraido = mysqli_fetch_array($result);



mysqli_free_result($result);

mysqli_close($link);





if (isset($_REQUEST['updatebtn'])) {




    $link = mysqli_connect("localhost", "root", "");

    mysqli_select_db($link, "battlefight");




    $query = "UPDATE tournament
                SET date = '" . $_REQUEST['date'] . "', price =  '" . $_REQUEST['price'] . "', category= '" . $_REQUEST['category'] . "'
                WHERE code = '" . $_REQUEST['code'] . "'";

    mysqli_query($link, $query);

    echo "<script>
                alert('Changes Saved');
            </script>;";

    header('Location: http://localhost/formularios/Proyect/listTournaments.php');


}



?>


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
    <title>Update Tournament</title>
</head>

<body>
<div class="nav-container">
 <nav>
 <a href="http://localhost/formularios/Proyect/homePage.php">Home</a>
 <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
 <a href="http://localhost/formularios/Proyect/listTournaments.php">List Tornaments</a>
 <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
 <a href="http://localhost/formularios/Proyect/users.php">Users</a>
 </nav>
 </div> 

<div class="team-header">
    <h2>Update</h2>
</div>

<div class="container-teams">





    <form action="" method="get" name="">
        <div class="tInfo">
            <P>Code</P>
        </div>

        <div class="tInfo">
            <input readonly value="<?php
            echo $extraido['code'];
            ?>" type="text" name="code">
        </div>

        <div class="tInfo">
            <P name="date">Date </P>
        </div>


        <div class="tinfo">

            <input value="<?php

            echo $extraido['date'];
            ?>" type="date" name="date" id="">
        </div>



        <div class="tInfo">
            <P>Price</P>
        </div>

        <div class="tInfo">
            <input value="<?php
            echo $extraido['price'];
            ?>" name="price" type="number_format" placeholder="$$$">
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
            <input type="submit" value="Update Torunament" class="createTournament" name="updatebtn">
        </div>


    </form>
</div>



</body>

</html>