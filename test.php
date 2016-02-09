<?php
include 'sql_con.php';

  $idnn = $conn->query('SELECT id FROM tbl_movie WHERE rating IS NULL');
//Download json file and save it in a variable
 foreach ($idnn as $key) {
 echo "$key <br>";
 }
 ?>
