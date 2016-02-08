<?php
   //load sql_con.php file
   include 'sql_con.php';
   //select data from table tbl_set and save it in $row
   $stmt = $conn->prepare("SELECT UNIX_TIMESTAMP(date) FROM tbl_set");
   $stmt->execute();
   $row = $stmt->fetch();
   //convert $row to integer and save as $date
   $date = (int)($row) [0];
   //save todays midnight time in unix timestamp style in $today
   $today = strtotime('today midnight');
   if ($date == $today) {
   } else {
            //load api-calendar_upcoming
            include 'api-calendar_upcoming.php';
            //save todays date in database
            $conn->query('UPDATE  `tbl_set` SET  `date` = NOW( ) WHERE 1');
   }
?>
