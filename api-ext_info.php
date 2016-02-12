<?php
  //load sql_con.php file
  include 'sql_con.php';

  $idnn = $conn->query('SELECT id FROM tbl_movie WHERE rating IS NULL');
  foreach ($idnn as $ext_id) {
    //Download json file and save it in a variable
    $base = "http://api.xrel.to/api/ext_info/info.json?id=";
    $url = $base . $ext_id['id'];
    $output = file_get_contents($url);

    // Filter unused pattern in the json file
    $out = substr($output,10, -3);

    //Convert json string into php array
    $payload = json_decode($out, true);

    //Set variable
    $filter = "'";

        $data = $payload['payload'];
        //Check if rating is null and use other code to prevent overwriting from field in db
        //if (isset($data['rating'])) {
                      		          //Extract the Array Values & filter variable filter
                                    $id_u         	= $data['id'];
                                    $id        	    = str_replace($filter, '',$id_u);
                                    $rating_uu      = $data['rating'];
                                    $rating_u       = round($rating_uu, 0);
                    		            $rating        	= str_replace($filter, '',$rating_u);

                                    // insert data in table
                                    $conn->query("UPDATE tbl_movie SET rating='$rating' WHERE id='$id'");
                                    //}
                                    //else  {
                                    //      }
  }
?>
