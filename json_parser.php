<?php
   //connect to database and select table
   $con = new mysqli("HOST_HERE", "USER_HERE", "PASSWORD_HERE","")or die('Could not connect: ' . mysql_error());
   mysqli_select_db($con, "TESTDB_HERE");

  //Download json file and save it in the variable $output
  $url = "content.json";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  curl_close($ch);

  //Convert json string into php array
   $data = json_decode($output, true);

  //Extract the Array Values
  $type         = $data['type'];
  $id           = $data['id'];
  $title        = $data['title'];
  $link         = $data['link_href'];
  $genre        = $data['genre'];
  $alt_title    = $data['alt_title'];
  $cover_url    = $data['cover_url'];
  $releases     = $data['releases'];
  $p2p_releases = $data['p2p_releases'];

  //Insert JSON to MySQL Database

 $sql = "INSERT INTO tbl_ext(type, id, title, link_href, genre, alt_title, cover_url, releases, p2p_releases)
        VALUES('$type', '$id', '$title', '$link', '$genre', '$alt_title', '$cover_url', '$releases', '$p2p_releases')";
        if(!mysqli_query($con, $sql))
    {
     	die('Error : ' . mysqli_error($con));
    }
?>
