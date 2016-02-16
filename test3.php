<?php
//load sql_con.php file
include 'sql_con.php';
//connect with database
$stmt = $conn->query("SELECT UNIX_TIMESTAMP(rating_date) AS date, rating, id FROM tbl_movie");
//unix timestamp -10 days
$minusten = strtotime('-10 days midnight');
//unix timestamp -50 days
$minusfifty = strtotime('-50 days midnight');
//unix timestamp now
$minusnull = strtotime('now midnight');
//convert timestamp in compatible format for db
$datenullcomp = date("Y-m-d", $minusnull);
//base url for ext_info
$base = "http://api.xrel.to/api/ext_info/info.json?id=";
//loop
  foreach ($stmt as $html_output) {
    //conditions
    if (empty($html_output['date']) OR $html_output['date'] < $minusfifty OR (!isset($html_output['rating']) AND $html_output['date'] < $minusten)) {
      echo $html_output["id"];
      //put url for api access together
      $url = $base . $html_output['id'];
      //download json file
      $output = file_get_contents($url);
      // Filter unused pattern in the json file
      $out = substr($output,10, -3);
      //Convert json string into php array
      $payload = json_decode($out, true);
      //save json content in variable
      $data = $payload['payload'];
      if (!empty($data['rating'])) {
        $rating = $data["rating"];
        $id     = $html_output["id"];
        $conn->query("UPDATE `tbl_movie` SET `rating` = '$rating' WHERE `id`='$id'");
      }
      $id     = $html_output["id"];
      $conn->query("UPDATE `tbl_movie` SET `rating_date` = '$datenullcomp' WHERE `id`='$id'");
    }
  }
//close database connection
$conn = null;
?>
