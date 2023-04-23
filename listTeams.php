<?php  

if(!empty($_REQUEST['codeid'])){

    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "battlefight");
    
    if(isset($_GET['codeid'])) {
      $codeid = $_GET['codeid'];
      
      $delete_query = "DELETE FROM team WHERE code='$codeid'";
      $result = mysqli_query($link, $delete_query);
      
      if($result) {
        echo "Team with code $codeid has been deleted successfully.";
      } else {
        echo "Error deleting team with code $codeid: " . mysqli_error($link);
      }
    }
    
    mysqli_close($link);
    
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
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <title>List Teams</title>
</head>
<body>
<div class="nav-container">
    <nav>
        <a href="http://localhost/formularios/Proyect/homePage.php">Home</a>
        <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
        <a href="http://localhost/formularios/Proyect/tournament.php">Tournaments</a>
        <a href="http://localhost/formularios/Proyect/users.php">Users</a>
        <a href="http://localhost/formularios/Proyect/Login.php">Log Out</a>
    </nav>
</div>
<div class="team-header">
    <h1>Teams</h1>
</div>
<div style="display: flex;justify-content: center;align-items: center;" class="">
<?php
$link = mysqli_connect("localhost", "root", "", "battlefight");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($link, "SELECT * FROM team");

echo "<table class='table-dark' >";
echo "<tr><th scope='row' >Teams</th><th>Score</th><th>Players</th><th>Category</th><th>Code</th><th>Update</th><th>Delete</th></tr>";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td>" . $row['treamName'] . "</td><td>" . $row['score'] . "</td><td>" . $row['number_players'] . "</td><td>" . $row['category'] . "</td><td>" . $row['code'] . "</td><td><a href='updateTeam.php?codeid=".$row['code']."'>update</a></td><td><a href='listTeams.php?codeid=".$row['code']."'>delete</a></td></tr>";
}
echo "</table>";

mysqli_close($link);

?>
</div>
</body>
</html> 