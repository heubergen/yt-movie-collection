<?php
   //load sql_con.php file
//   include 'sql_con.php';
   $con = new mysqli("localhost", "jm3", "ma7duiy7shioL","")or die('Could not connect: ' . mysql_error());
   mysqli_select_db($con, "jm3_test");
//   $conn->query('UPDATE  `tbl_set` SET  `date` = NOW( ) WHERE 1');
     $sql = "SELECT UNIX_TIMESTAMP(date) FROM tbl_set";
     $result = mysqli_query($con, $sql);
     if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $last = $row['date']
    }
} else {
    echo "0 results";
}
// $conn = null;
mysqli_close($con);
$today = date("Y-m-d");
 echo ($last);
 echo "<br>";
 var_dump($today);
 echo "<br>";
 if ($last = $today) {
   echo "Success!";
 } else {
   echo "Error!";
 }
?>
