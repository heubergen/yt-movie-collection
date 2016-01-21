<?php
   //connect to database and select jm3_test
   $con = new mysqli("HOST_HERE", "USER_HERE", "PASSWORD_HERE","")or die('Could not connect: ' . mysql_error());
   mysqli_select_db($con, "DB_HERE");

  //Download json file and save it in a variable
  $url = "content.json";
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
  $point = "'";
        //Loop for each value in variable s
        foreach($data['payload'] as $item)
        {
                //Extract the Array Values
                $type         = $item['type'];
                $id           = $item['id'];
                $title_u      = $item['title'];
                $title        = str_replace($point, '',$title_u);
                $link         = $item['link_href'];
                $genre        = $item['genre'];
                $cover_url    = $item['cover_url'];
                $releases     = $item['releases'];
                $p2p_releases = $item['p2p_releases'];


                //Insert JSON to MySQL Database
                $sql = "INSERT IGNORE INTO TABLE_HERE(type, id, title, link_href, genre, cover_url, releases, p2p_releases)
                        VALUES('$type', '$id', '$title', '$link', '$genre', '$cover_url', '$releases', '$p2p_releases')";
                        if(!mysqli_query($con, $sql))
                {
                        die('Error : ' . mysqli_error($con));
                }
        }
?>
