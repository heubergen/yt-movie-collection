<?php
   //connect to database and select jm3_test
   $con = new mysqli("localhost", "jm3", "ma7duiy7shioL","")or die('Could not connect: ' . mysql_error());
   mysqli_select_db($con, "jm3_test");
echo "Successfully connect to database";
echo "<br>";
$type = "test";
                 //Insert JSON to MySQL Database
                 $sql = "INSERT INTO tbl_2 (test, test2)
                         VALUES('$type', '$type')";
                         if(!mysqli_query($con, $sql))
                {
                        die('Error : ' . mysqli_error($con));
		}
mysqli_close($con);
echo "Successfully write data in database";
?>
