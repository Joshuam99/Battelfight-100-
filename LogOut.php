<?php
session_start();
session_destroy();
header('Location: http://localhost/formularios/Proyect/Login.php');
exit();
?>