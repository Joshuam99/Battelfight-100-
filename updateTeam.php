<?php


$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "battlefight");

$result = mysqli_query($link, "SELECT * FROM team WHERE code= '" . $_REQUEST['codeid'] . "'");

$extraido = mysqli_fetch_array($result);



mysqli_free_result($result); 

mysqli_close($link);



if (isset($_REQUEST['updatebtn'])) {




    $link = mysqli_connect("localhost", "root", "");

    mysqli_select_db($link, "battlefight");




    $query = "UPDATE team
                SET treamName = '" . $_REQUEST['teamname'] . "', score =  '" . $_REQUEST['score'] . "', number_players = '" . $_REQUEST['players'] . "', alias1 ='".$_REQUEST['alias1']."',alias2 ='".$_REQUEST['alias2']."',alias3 ='".$_REQUEST['alias3']."',alias4 ='".$_REQUEST['alias4']."', category = '" . $_REQUEST['category'] . "'
                WHERE code = '" . $_REQUEST['txtcode'] . "'";

    mysqli_query($link, $query);

    header('Location: http://localhost/formularios/Proyect/listTeams.php');

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
    <title>Update Team</title>
</head>

<body>



<div class="nav-container">
    <nav>
        <a href="http://localhost/formularios/Proyect/homePage.php">Home</a>
        <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
        <a href="http://localhost/formularios/Proyect/listTeams.php">List Teams</a>
        <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
        <a href="http://localhost/formularios/Proyect/users.php">Users</a>
    </nav>
</div>

<div class="team-header">
    <h2>Update Team</h2>
</div>
<div class="container-teams">

    <form action="">

        <div>
            <p>Team Name</p>
            <input value="<?php
            echo $extraido['treamName'];
            ?>" class="info" type="text" name="teamname" placeholder="Enter your team's name">
        </div>
        <div>
            <p>Number of players</p>
            <input value="<?php
            echo $extraido['number_players'];
            ?>" class="info" type="number" name="players" placeholder="" min="1" max="4">
        </div>
         
        <div>
                <p>Alias 1</p>
                <input class="info" type="text" name="alias1" placeholder="@alias" value="<?php
            echo $extraido['alias1'];
            ?>" >
            </div>
            <div>
                <p>Alias 2</p>
                <input class="info" type="text" name="alias2" placeholder="@alias" value="<?php
            echo $extraido['alias2'];
            ?>" >
            </div>
            <div>
                <p>Alias 3</p>
                <input class="info" type="text" name="alias3" placeholder="@alias" value="<?php
            echo $extraido['alias3'];
            ?>" >
            </div>
            <div>
                <p>Alias 4</p>
                <input class="info" type="text" name="alias4" placeholder="@alias" value="<?php
            echo $extraido['alias4'];
            ?>" >
            </div>

        <div>
            <p>Score</p>
            <input value="<?php
            echo $extraido['score'];
            ?>" class="info" type="number" name="score" placeholder="Team's score" min="0" max="1500">
        </div>
        <div>
            <div>
                <p>category</p>
                <select value="<?php
                echo $extraido['category'];
                ?>" class="info" name="category">
                    <option value="Beginner">Beginner</option>
                    <option value="Medium">Medium</option>
                    <option value="Expert">Expert</option>
                </select>

            </div>

            <div>
                <p>Code</p>
                <input value="<?php
                echo $extraido['code'];
                ?>" class="info" readonly type="text" name="txtcode" value="<?php


                ?>">

            </div>





        </div>

        <div>
            <input type="submit" name="updatebtn" class="createbtn" value="Update">
        </div>


    </form>









</div>



</body>

</html>