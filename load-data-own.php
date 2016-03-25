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
<?php
//load sql_con.php file
include 'sql_con.php';
?>
<body>
<table id="movies">
<caption>Kommende Filme</caption>
<thead>
<tr>
    <th>Titel</th>
    <th>Genre</th>
    <th>Rating</th>
    <th>DE Cine</th>
    <th>DE BD</th>
    <th>EN Cine</th>
    <th>EN BD</th>
    <th>Youtube Trailer</th>
</tr>
</thead>
<tbody>
<?php
//load data from database and write it as html
foreach($conn->query('SELECT * FROM tbl_movie WHERE unread=0') as $row) {
  echo "<tr>";
  echo "<td>".$row['title']."</td>";
  echo "<td>".$row['genre']."</td>";
  echo "<td>".$row['rating']."</td>";
  echo "<td>".$row['de_cine']."</td>";
  echo "<td>".$row['de_hd']."</td>";
  echo "<td>".$row['en_cine']."</td>";
  echo "<td>".$row['en_hd']."</td>";
  //prepare movie name for youtube search
  $movie = $row['title'];
  $adding_yt = "trailer";
  $yt_search = $movie." ".$adding_yt;
  echo "<td>"."<a href='https://www.youtube.com/results?search_query=$yt_search'>Click here</a>"."</td>";
  echo "</tr>";
}
// Close MySQL Connection
$conn = null;
?>
</tbody>    
</table>
</body>
    <!-- Responsive Table
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/responsive_table.js"></script>
</html>
