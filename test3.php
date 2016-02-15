<?php
//load sql_con.php file
include 'sql_con.php';
//check conditions
    $stmt = $conn->query("SELECT UNIX_TIMESTAMP(rating_date) AS date, rating FROM tbl_movie");
    foreach ($stmt as $html_output) {
      echo $html_output['date'];
      echo "<br>";
      echo $html_output['rating'];
      echo "<br>";
    }
$conn = null;
?>
