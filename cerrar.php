<?php
 $usuario=$_POST['email'];
  session_start();
  unset($_SESSION['$usuario']);
  session_destroy();
  Header('Location: index.php');
?>