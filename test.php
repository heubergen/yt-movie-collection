<?php
//load sql_con.php file
include 'sql_con.php';
//connect with database
$stmt = $conn->query("SELECT UNIX_TIMESTAMP(date_rel) AS date, en_cine, en_hd, de_cine, de_hd, id FROM tbl_movie");
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
    if (empty($html_output['date']) OR empty($html_output['en-cine']) OR empty($html_output['en-hd']) AND $html_output['date'] < $minusfifty) {
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
      $release = $data["release_dates"];
      echo "$release";
      //TODO: Add $release here!!!
      //for ($x=0; $x < ; $x++) {
        # code...
      //}
  }
  }
//close database connection
$conn = null;
?>
