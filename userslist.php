<?php
if(!empty($_REQUEST['id'])){

    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "battlefight");
    
    $id = $_GET['id'];
    
    $query = "DELETE FROM user WHERE id = $id";
    
    if(mysqli_query($link, $query)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($link);
    }
    
    mysqli_close($link);
    
    
    header('Location: http://localhost/formularios/Proyect/userslist.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
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
            <a href="http://localhost/formularios/Proyect/users.php">Users</a>
            <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
            <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
        
        </nav>
    </div>   

    <div class="team-header">
        <h1>Users List</h1>
    </div>

    <div style="display: flex;justify-content: center;align-items: center;">
        <?php
            $link = mysqli_connect("localhost", "root", "");
            mysqli_select_db($link, "battlefight");
            $result = mysqli_query($link, "SELECT id, name, genre, registerDate, status, username FROM user");

            echo "<table class='table-dark' >";
            echo "<tr><th scope='row' >ID</th><th>Name</th><th>Genre</th><th>Registered</th><th>Status</th><th>Username</th><th>Update</th><th>Delete</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>" . $row['registerDate'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td><a href='updateUser.php?id=" . $row['id'] . "'>update</a></td>";
                echo "<td><a href='userslist.php?id=" . $row['id'] . "' onclick='return confirm(\"Do you want to delete this user?\")'>delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_free_result($result);  
            mysqli_close($link);
        ?>
    </div>
</body>
</html>
