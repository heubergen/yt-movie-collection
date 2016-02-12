<?php
//load sql_con.php file
include 'sql_con.php';
//select data from table tbl_set and save it in $row
$stmt = $conn->prepare("SELECT UNIX_TIMESTAMP(rating_date) FROM tbl_movie");
$stmt->execute();
$row = $stmt->fetch();
//convert $row to integer and save as $last
$last = (int)($row) [0];
$minusdate = strtotime('-10 days midnight');
if ($last <= $minusdate) {
  echo "true";
}
else {
  echo "false";
}
?>
