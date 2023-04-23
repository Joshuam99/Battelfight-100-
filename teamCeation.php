<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Team</title>
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
            <a href="http://localhost/formularios/Proyect/listTeams.php">List Teams</a>
            <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
            <a href="http://localhost/formularios/Proyect/users.php">Users</a>
            
        </nav>
    </div>
    <div class="team-header">

        <h1>Create a Team</h1>
    </div>
    <div class="container-teams">

        <form action="">

            <div>
                <p>Team Name</p>
                <input  class="info"  type="text" name="teamname" placeholder="Enter your team's name">
            </div>
            <div>
                <p>Number of players</p>
                <input class="info" type="number" name="players" placeholder="" min="1" max="4">
            </div>
            <div>
                <p>Alias 1</p>
                <input class="info" type="text" name="alias1" placeholder="@alias" >
            </div>
            <div>
                <p>Alias 2</p>
                <input class="info" type="text" name="alias2" placeholder="@alias" >
            </div>
            <div>
                <p>Alias 3</p>
                <input class="info" type="text" name="alias3" placeholder="@alias" >
            </div>
            <div>
                <p>Alias 4</p>
                <input class="info" type="text" name="alias4" placeholder="@alias" >
            </div>
            <div>
                <p>Score</p>
                <input class="info" type="number" name="score" placeholder="Team's score" min="0" max="1500">
            </div>
            <div>
                <div>
                    <p>category</p>
                    <select class="info" name="category">
                        <option value="Beginner">Beginner</option>
                        <option value="Medium">Medium</option>
                        <option value="Expert">Expert</option>
                    </select>

                </div>

                <div>
                    <p>Code</p>
                    <input class="info" readonly type="text" name="code" value="<?php

                    function createCode($teamname, $category, $date, $random)
                    {
                        $codigo = '';

                        // Generamos una cadena alfanumérica aleatoria de longitud 2
                        $cadenaAleatoria = substr(md5(uniqid(rand(1,10), true)), 0, 2);

                        // Concatenamos las entradas de datos con la cadena aleatoria
                        $codigo .= substr($teamname, 0, 2) . substr($category, 0, 2) . substr($date, 0, 2) . substr($random, 0, 2);
                        $codigo .= substr($teamname, 2, 2) . substr($category, 2, 2) . substr($date, 2, 2) . substr($random, 2, 2);
                        $codigo .= $cadenaAleatoria;

                        return $codigo;
                    }
                    /*
                    if (!empty($_REQUEST['createbtn'])) {

                        date_default_timezone_set('America/Costa_Rica');
                        $date = date("Y");

                        $random = rand(0, 100);

                       echo createCode($_REQUEST['teamname'], $_REQUEST['category'], $date, $random);

                    }

                   */

                    ?>">

                </div>





            </div>

            <div>
                <input type="submit" name="createbtn" class="createbtn" value="Create">
            </div>

        </form>

    </div>

</body>

</html>

<?php

if (!empty($_REQUEST['createbtn'])) {

    date_default_timezone_set('America/Costa_Rica');
    $date = date("Y");

    $random = rand(0, 100);

   $code =  createCode($_REQUEST['teamname'], $_REQUEST['category'], $date, $random);


$linkDB = mysqli_connect("localhost", "root", "");

mysqli_select_db($linkDB, "battlefight");

$sql = "INSERT INTO team(treamName, score,number_players, alias1, alias2, alias3, alias4, category, code) VALUES ('".$_REQUEST['teamname']."','".$_REQUEST['score']."','".$_REQUEST['players']."','".$_REQUEST['alias1']."','".$_REQUEST['alias2']."','".$_REQUEST['alias3']."','".$_REQUEST['alias4']."','".$_REQUEST['category']."','".$code."')";

mysqli_query($linkDB, $sql);
}

?>