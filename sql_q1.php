<?php
   //connect to database and select tbl_ext
   $con = new mysqli("HOST_HERE", "USER_HERE", "PASSWORD_HERE","")or die('Could not connect: ' . mysql_error());
   mysqli_select_db($con, "DB_HERE");
                 //Read data from database
$sql = "SELECT type, title, genre FROM TABLE_HERE";
$result = mysqli_query($con, $sql);
// Show mysql error
if (!$result) {
    die(mysqli_error($con));
}
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "type: " . $row["type"]. " - Title: " . $row["title"]. " - Genre: " . $row["genre"]. $
    }
} else {
    echo "0 results";
}

mysqli_close($con);
?>
