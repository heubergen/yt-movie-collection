<?php
   //load sql_con.php file
   include 'sql_con.php';

  //Download json file and save it in a variable
  $url = "http://api.themoviedb.org/3/movie/upcoming?api_key=060169d2f7cd495e487001173f9fcc2f";
  $output = file_get_contents($url);

  //Convert json string into php array
  $data = json_decode($output, true);

  //Set variable
  $filter = "'";

 	//Loop for each entry
  	foreach($data['results'] as $item)
    {
    		//Extract the Array Values & filter variable filter
                  $id_u         	= $item['id'];
                  $id        	    = str_replace($filter, '',$id_u);
                  $title_u      	= $item['original_title'];
  		          $title        	= str_replace($filter, '',$title_u);
                  $genre_u          = $item['genre_ids'];
                  $genre        	= str_replace($filter, '',$genre_u);
                  $rel_u            = $item['release_date'];
                  $rel              = str_replace($filter, '',$rel_u);
                  $rating_u         = $item['vote_average'];
                  $rating           = str_replace($filter, '',$rating_u);

                  // insert data in table
                  $sql = "INSERT IGNORE INTO tbl_movie(id, title, genre, rel, rating)
                        VALUES('$id', '$title', '$genre', '$rel', '$rating')";

                        // execute the sql command
                        $conn->exec($sql);
  	}
  ?>