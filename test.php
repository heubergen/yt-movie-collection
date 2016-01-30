<html lang="en">
<body>
<table>
<caption>Kommende Filme</caption>
<thead>
<tr><th>Titel<th>Genre
<tbody>
<?php
include 'sql_con.php';
foreach($conn->query('SELECT * FROM tbl_movie') as $row) {
  echo "<tr>";
  echo "<td>".$row['title']."</td>";
  echo "<td>".$row['genre']."</td>";
  echo "</tr>";
}
$conn = null;
?>
</table>
</body>
</html>
