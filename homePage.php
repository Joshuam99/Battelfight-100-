<?php
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == 'http://localhost/formularios/Proyect/Login.php') {

    session_start();
    ob_start();
    $userName = $_SESSION['userName'];
    date_default_timezone_set('America/Costa_Rica');
    $date = date("m/d/Y");
    $Userinfo = $userName . PHP_EOL . $date . PHP_EOL . "----------------------------------------------" . PHP_EOL;
    $loginFile = fopen("Logins.txt", "a+");
    fwrite($loginFile, $userName . PHP_EOL . $date . PHP_EOL . date("h:i:sa") . PHP_EOL . "----------------------------------------------" . PHP_EOL);
    fclose($loginFile);
}



function logOut()
{
    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == 'http://localhost/formularios/Proyect/homePage.php') {
        session_start();
        ob_start();
        $userName = $_SESSION['userName'];
        date_default_timezone_set('America/Costa_Rica');
        $date = date("m/d/Y");
        $logoutTime = date("h:i:sa");
        $Userinfo = $userName . PHP_EOL . $date . PHP_EOL . "----------------------------------------------" . PHP_EOL;
        $loginFile = fopen("Logins.txt", "a+");
        fwrite($loginFile, $userName . PHP_EOL . $date . PHP_EOL . $logoutTime . PHP_EOL . "----------------------------------------------" . PHP_EOL);
        fclose($loginFile);
    }

    session_unset();
    session_destroy();

    setcookie("username", 0);
    header("Location: http://localhost/formularios/Proyect/Login.php");
    exit();

}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Fuente-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
</head>

<body>



    <div class="nav-container">
        <nav class="">
            <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
            <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
            <a href="http://localhost/formularios/Proyect/users.php">Users</a>
            <a href="http://localhost/formularios/Proyect/homePage.php">About</a>
            <a href="http://localhost/formularios/Proyect/LogOut.php" onclick="">Log Out</a>
        </nav>
    </div>

    <h1 style="margin-left:8% ;" class="h3">Hello
        <?php
        /*
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != 'http://localhost/formularios/Proyect/Login.php') {
            session_start();
            ob_start();
            $userName = $_SESSION['userName'];

            echo $userName;
        } else {

            echo $userName;
        }
        
*/

         echo $_COOKIE['username'];

        ?>
    </h1>


    <div class="container">
         <article>
        <div class="">
            <div>
                <img style="width: 300px;height: 300px;display: flex;justify-content: center;margin-top: 20px;"
                    src="https://www.esports.net/wp-content/uploads/2023/02/Fortnite-skins.png" alt="" />
                

            </div>
            <div>
            <a style="display: flex;justify-content: center;" >Get Skins</a>
            </div>

        </div>
        </article>


    </div>



</body>

</html>