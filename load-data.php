<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come after -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="TODO">

    <!-- Responsive Table, thanks to @geoffyuen -->
    <link href="css/responsive_table.css" rel="stylesheet">
    <link href="css/popup.css" rel="stylesheet">
  </head>
</html>
<?php
//load sql_con.php file
include 'sql_con.php';
?>
<html lang="en">
 <body>
<table id="movies">
<caption>Kommende Filme</caption>
<thead>
<tr><th>Titel<th>Genre<th>Rating<th>DE Cine<th>DE BD<th>EN Cine<th>EN BD<th>Youtube Trailer
<tbody>
<?php
//load data from database and write it as html
foreach($conn->query('SELECT * FROM tbl_movie') as $row) {
  echo "<tr>";
  echo "<td>".$row['title']."</td>";
  echo "<td>".$row['genre']."</td>";
  if (empty($row['rating'])) {
    echo "<td>"."n.a."."</td>";
  }
  else {
    echo "<td>".$row['rating']."</td>";
  }
  if (empty($row['de_cine'])) {
    echo "<td>"."n.a."."</td>";
  }
  else {
    echo "<td>".$row['de_cine']."</td>";
  }
  if (empty($row['de_hd'])) {
    echo "<td>"."n.a."."</td>";
  }
  else {
    echo "<td>".$row['de_hd']."</td>";
  }
  if (empty($row['en_cine'])) {
    echo "<td>"."n.a."."</td>";
  }
  else {
    echo "<td>".$row['en_cine']."</td>";
  }
  if (empty($row['en_hd'])) {
    echo "<td>"."n.a."."</td>";
  }
  else {
    echo "<td>".$row['en_hd']."</td>";
  }
  //prepare movie name for youtube search
  $movie = $row['title'];
  $adding_yt = "trailer";
  $yt_search = $movie." ".$adding_yt;
  echo "<td>"."<a href='https://www.youtube.com/results?search_query=$yt_search'>link text</a>"."</td>";
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
