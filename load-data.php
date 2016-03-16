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
  // save variable for later use in js
  $title = $row['title'];
  ?>
  <td>
    <div class="first_div">
  <!-- THIS BUTTON CALLS AJAX SCRIPT -->
      <button id="showAjax" class="s3-btn" name="Open" onclick="showAjaxStuff();">Show Video</button>
    </div>
    <div class="second_div" id="ajax_auto">
      <!-- AJAX CONTENT WILL BE LOADED INTO THIS DIV -->
    </div>
  </td>
  <script type="text/javascript">
  	function showAjaxStuff() {

          if (window.XMLHttpRequest) {
          	// MODERN BROWSERS
              xmlhttp = new XMLHttpRequest();
          } else {
          	// VERY OLD BROWSERS
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
          	// IF THE AJAX CALL IS SUCCESSFULL
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("ajax_auto").innerHTML = xmlhttp.responseText;
                  document.getElementById("popup").style.display="block";
                  document.getElementById("overlay").style.display="block";
              }
          };
          // Action if button is clicked
          var sdfasdf = <?php echo "$title"; ?>; //Don't forget the extra semicolon!
          //xmlhttp.open("GET","yttrailer.php?name=" + "<?php $row['title']?>", true);
          //xmlhttp.send();
          document.write(sdfasdf);
  }
  </script>
  <?php
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
    <script src="js/popup.js"></script>
</html>
