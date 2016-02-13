<?php
//load sql_con.php file
include 'sql_con.php';
//select data from table tbl_set and save it in $row
$stmt = $conn->query("SELECT UNIX_TIMESTAMP(rating_date) FROM tbl_movie");
$minusdate = strtotime('-10 days midnight');
foreach ($stmt as $key) {
  //convert $row to integer and save as $last
  $last = (int)($key) [0];
  if ($last <= $minusdate) {
    echo "true <br>";
  }
  else {
    echo "false <br>";
  }
}
?>
