<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Battle Fight</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Fuente-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">

</head>

<body>

  <div class="img-container">
    <img src="header.jpeg" id="mainImg">

  </div>
  <div class="mainTitle">
    <h1>Log in ...</h1>
  </div>
  <div class="container">

    <div class="items-container">

      <form method="POST" action="">

        <?php


        if (!empty($_REQUEST['loginbtn'])) {


          if (!empty($_REQUEST['userName']) and !empty($_REQUEST['password'])) {

            $connect = new mysqli("localhost", "root", "", "battlefight");

            if ($connect->connect_error) {
              die('Connection failed: ' . $connect->connect_error);
            }


            $result = $connect->query("SELECT * FROM user WHERE username = '" . $_REQUEST['userName'] . "' and password= '" . $_REQUEST['password'] . "' ");


            if (!$result) {
              die('Query error' . $connect->error);
            }

            if (mysqli_num_rows($result) > 0) {
              session_start();
              ob_start();
              $_SESSION['userName'] = $_REQUEST['userName'];



              header('Location: homePage.php');

            } else {
              echo "<div class='alert alert-dismissible alert-danger'>
<button type='button' class='btn-close' data-bs-dismiss='alert'></button>
<strong>Access denied!</strong>
</div>";

            }



          } else {
            echo "<div class='alert alert-dismissible alert-danger'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            <strong>Please enter you username and password!</strong>
            </div>";

          }

        }





        ?>
        <div>
          <p>Username</p> <input type="text" name="userName" value="<?php if (isset($_REQUEST['userName'])){

            setcookie('username',$_REQUEST['userName'],0);
          } ?>">
        </div>
        <div>
          <p>Password</p> <input type="password" name="password">
        </div>


        <div><a>Forgot password ?</a> <a href="http://localhost/formularios/Proyect/firstRegister.php"
            style="margin-left:8px">Register</a></div>

        <div><input type="submit" name="loginbtn" value="Log In"></div>




      </form>





    </div>



  </div>


  <footer class="footer">
    <p>Rights Reserved 2023</p>
    <p><a href="#">JoshkyGames@example.com</a></p>
  </footer>
</body>

</html>