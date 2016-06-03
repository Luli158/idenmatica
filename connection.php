<?php
function connection() {

$mysqli = new mysqli("localhost", "root", "", "couchinn");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

return $mysqli;
  }
?>