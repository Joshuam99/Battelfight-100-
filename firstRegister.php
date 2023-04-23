<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Users</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Fuente-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
</head>

<body>

  <div class="team-header">

    <h1>Register</h1>
  </div>


  <div class="container-teams">
    <form action="" method="get" name="userform">

      <div>
        <p>Name</p>
        <input class="info" type="text" name="nametext" required>
      </div>

      <div>
        <p>ID</p>
        <input class="info" type="number_format" name="idtext" required>
      </div>

      <div>
        <p>Genre</p>
        <select name="sex" class="">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>

      </div>

      <div>
        <p>Date</p>
        <input class="info" type="text" name="date" readonly value="<?php
        date_default_timezone_set('America/Costa_Rica');

        $date = date("D/M/Y");

        echo $date;

        ?>">
      </div>

      <div>

        <p>Status</p>
        <select name="status" class="">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>

      </div>

      <div>

        <p>Username</p>
        <input class="info" type="text" name="username" required>

      </div>

      <div>

        <p>Password</p>
        <input class="info" type="password" name="password" required>

      </div>

      <div>
        <img src="captcha.php">
        Validate
      </div>
      <div>

        <input class="info" type="text" name="number">
      </div>


      <div>
        <input type="submit" value="Register" class="createbtn" name="RegisterBtn">
      </div>


    </form>
  </div>



</body>

</html>


<?php



  if (!empty($_REQUEST['RegisterBtn'])) {

    session_start();
if ($_SESSION['numeroaleatorio'] == $_REQUEST['number']) {

    $dblink = mysqli_connect("localhost", "root", "");

    mysqli_select_db($dblink, "battlefight");

    $sqlQuery = "Insert into user(id,name,password,registerDate,status,username,genre) values ('" . $_REQUEST['idtext'] . "','" . $_REQUEST['nametext'] . "','" . $_REQUEST['password'] . "','" . $_REQUEST['date'] . "','" . $_REQUEST['status'] . "','" . $_REQUEST['username'] . "','" . $_REQUEST['sex'] . "')";


    mysqli_query($dblink, $sqlQuery);


    echo '<script>alert("You have been enrolled!!");</script>';
    echo '<script>window.location.href = "Login.php";</script>';
    exit();

}else{

  echo '<script>alert("Captcha not passed");</script>';
  echo '<script>window.location.href = "firstRegister.php";</script>';
  exit();

}



  }














?>