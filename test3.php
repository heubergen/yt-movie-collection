<?php
//load sql_con.php file
include 'sql_con.php';
//check conditions
    $stmt = $conn->query("SELECT UNIX_TIMESTAMP(rating_date), rating FROM tbl_movie");
    foreach ($stmt as $html_output) {
      var_dump($html_output);
      $last = (int)($html_output['rating_date'])  [0];
      echo $last;
      echo "<br>";
      echo $html_output['rating'];
      echo "<br>";
    }
$conn = null;
?>
