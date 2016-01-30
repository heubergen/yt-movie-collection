<?php
   //load sql_con.php file
   include 'sql_con.php';

  //Download json file and save it in a variable
  $url = "http://api.xrel.to/api/calendar/upcoming.json";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  curl_close($ch);

  // Filter unused pattern in the json file
  $out = substr($output,10, -3);

  //Convert json string into php array
  $data = json_decode($out, true);

  //Set variable
  $filter = "'";

 	//Loop for each entry
  	foreach($data['payload'] as $item)
	{
  		//Extract the Array Values & filter variable filter
                $id_u         	= $item['id'];
                $id        	= str_replace($filter, '',$id_u);
                $title_u      	= $item['title'];
		            $title        	= str_replace($filter, '',$title_u);
                $link_u         = $item['link_href'];
                $link        	= str_replace($filter, '',$link_u);
                $genre_u        = $item['genre'];
                $genre        	= str_replace($filter, '',$genre_u);
                $cover_url_u    = $item['cover_url'];
                $cover_url      = str_replace($filter, '',$cover_url_u);

                // insert data in table
                $sql = "INSERT IGNORE INTO tbl_movie(id, title, link_href, genre, cover_url)
                      VALUES('$id', '$title', '$link', '$genre', '$cover_url')";

                // execute the sql command
                $conn->exec($sql);
	}
  $conn = null;
  echo "Import erfolgreich abgeschlossen";
?>
