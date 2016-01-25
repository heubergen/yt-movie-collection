<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *af$
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="TODO">

    <!-- Responsive Table, thanks to @geoffyuen -->
    <link href="css/responsive_table.css" rel="stylesheet">
  </head>
</html>
<?php
   //connect to database and select jm3_test
   $con = new mysqli("HOST_HERE", "USER_HERE", "PW_HERE","")or die('Could not connect: ' . mysql_error());
   mysqli_select_db($con, "DB_HERE");
?>
<html lang="en">
 <body>
<table id="miyazaki">
<caption>Kommende Filme</caption>
<thead>
<tr><th>Art<th>Titel<th>Genre
<tbody>
<?php
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
	echo "<tr>";
        echo "<td>".$row['type']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['genre']."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
?>
</table>
</body>
</html>
<?php
mysqli_close($con);
?>
<html lang="en">
    <!-- Responsive Table
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/responsive_table.js"></script>
</html>
