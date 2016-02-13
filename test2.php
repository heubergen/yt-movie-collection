<?php
  //load sql_con.php file
  include 'sql_con.php';
    //Download json file and save it in a variable
    $base = "http://api.xrel.to/api/ext_info/info.json?id=";
    $url = $base . "d86caefc1c8d9";
    $output = file_get_contents($url);

    // Filter unused pattern in the json file
    $out = substr($output,10, -3);

    //Convert json string into php array
    $payload = json_decode($out, true);

    $data = $payload['payload'];

    if (empty($data['rating'])) {
      echo "empty";
    }
    else {
      echo "not empty";
    }

    ?>
