<?php
   //load sql_con.php file
   include 'sql_con.php';

  //Download json file and save it in a variable
  $base = "http://api.xrel.to/api/ext_info/info.json?id=";
  $id = "c68347941fa42";
  $url = $base . $id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  curl_close($ch);

  // Filter unused pattern in the json file
  $out = substr($output,10, -3);

  //Convert json string into php array
  $payload = json_decode($out, true);

  //Set variable
  $filter = "'";

      $data = $payload['payload'];
  		//Extract the Array Values & filter variable filter
                $id_u         	= $data['id'];
                $id        	    = str_replace($filter, '',$id_u);
                $rating_u      	= $data['rating'];
		            $rating        	= str_replace($filter, '',$rating_u);

                // insert data in table
                $sql = "INSERT INTO tbl_movie(id, rating)
                      VALUES('$id', '$rating')";

                      // execute the sql command
                      $conn->exec($sql);
?>
