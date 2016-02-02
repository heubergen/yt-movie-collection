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
//load sql_con.php file
include 'sql_con.php';
?>
<html lang="en">
 <body>
<table id="miyazaki">
<caption>Kommende Filme</caption>
<thead>
<tr><th>Titel<th>Genre
<tbody>
<?php
//load data from database and write it as html
foreach($conn->query('SELECT * FROM tbl_movie') as $row) {
  echo "<tr>";
  echo "<td>".$row['title']."</td>";
  echo "<td>".$row['genre']."</td>";
  echo "</tr>";
}
// Close MySQL Connection
$conn = null;
?>
</table>
</body>
</html>
<html lang="en">
    <!-- Responsive Table
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/responsive_table.js"></script>
</html>
