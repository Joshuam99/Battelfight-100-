<?php


$link = mysqli_connect("localhost", "root", "");

mysqli_select_db($link, "battlefight");

$result = mysqli_query($link, "SELECT * FROM user WHERE id= '" . $_REQUEST['id'] . "'");

$extraido = mysqli_fetch_array($result);



mysqli_free_result($result);

mysqli_close($link);


if (isset($_REQUEST['updatebtn'])) {


  session_start();
  if ($_SESSION['numeroaleatorio'] == $_REQUEST['number']) {


  $link = mysqli_connect("localhost", "root", "");

  mysqli_select_db($link, "battlefight");




  $query = "UPDATE user
            SET name = '" . $_REQUEST['nametext'] . "', genre =  '" . $_REQUEST['sex'] . "', registerDate= '" . $_REQUEST['date'] . "', status = '" . $_REQUEST['status'] . "', username = '" . $_REQUEST['username'] . "', password = '" . $_REQUEST['password'] . "'
            WHERE id = '" . $_REQUEST['idtext'] . "'";

  mysqli_query($link, $query);


  header('Location: http://localhost/formularios/Proyect/userslist.php');

  }else{

    echo '<script>alert("Try Again");</script>';
    echo '<script>window.location.href = "updateUser.php";</script>';
    exit();

  }

}

?>



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
  <title>Update User</title>

</head>

<body>

  <div class="nav-container">
    <nav>
      <a href="http://localhost/formularios/Proyect/homePage.php">Home</a>
      <a href="http://localhost/formularios/Proyect/users.php">Users</a>
      <a href="http://localhost/formularios/Proyect/userslist.php">List Users</a>
      <a href="http://localhost/formularios/Proyect/teamCeation.php">Teams</a>
      <a href="http://localhost/formularios/Proyect/tournament.php">Tornaments</a>
    </nav>
  </div>

  <div class="team-header">

    <h1>Update</h1>
  </div>


  <div class="container-teams">
    <form action="" method="POST" name="userform">

      <div>
        <p>Name</p>
        <input value="<?php
        echo $extraido['name'];
        ?>" class="info" type="text" name="nametext" required>
      </div>

      <div>
        <p>ID</p>
        <input value="<?php
        echo $extraido['id'];
        ?>" readonly class="info" type="number_format" name="idtext" required>
      </div>

      <div>
        <p>Genre</p>
        <select value="<?php
        echo $extraido['genre'];
        ?>" name="sex" class="">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>

      </div>

      <div>
        <p>Date</p>
        <input class="info" type="text" name="date" readonly value="<?php
        echo $extraido['registerDate'];
        ?>">
      </div>

      <div>

        <p>Status</p>
        <select value="<?php
        echo $extraido['status'];
        ?>" name="status" class="">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>

      </div>

      <div>

        <p>Username</p>
        <input value="<?php
        echo $extraido['username'];
        ?>" class="info" type="text" name="username" required>

      </div>

      <div>

        <p>Password</p>
        <input value="<?php
        echo $extraido['password'];
        ?>" class="info" type="password" name="password" required>

      </div>

      <div>
        <img src="captcha.php">
        Validate
      </div>
      <div>

        <input class="info" type="text" name="number">
      </div>


      <div>
        <input type="submit" value="Update" class="createbtn" name="updatebtn">
      </div>

    </form>
  </div>


</body>

</html>