<?php
function endConnection(){
   include_once ('connection.php');
   $con=connection();
   mysqli_close($con);
   return $con;
}
?>