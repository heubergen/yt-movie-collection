<!DOCTYPE html>
<html lang="en">
  <body>
<center><h1>Herzlich Willkommen zur Einrichtung von Upcoming Movie Collection</h1>
Dieses Tool wurde von Patrick Albrecht entwickelt und unter der MIT Lizenz ver&ouml;ffentlicht.<br>
Bitte warten, Verbindung zur Datenbank wird hergestellt...<br>
<?php   //connect to database and select jm3_test
   $con = new mysqli("HOST_HERE", "USER_HERE", "PASSWORD_HERE","")or die('Could not connect: ' . mysql_error());
   mysqli_select_db($con, "TABLE_HERE");
?>

Verbindung erfolgreich hergestellt<br>
Datenbanken werden erstellt, bitte warten...<br>
<?php
   //Create Table tbl_movie
   $sqlmov="CREATE TABLE IF NOT EXISTS MOV_TABLE_HERE (
    type text,
    id varchar(15) PRIMARY KEY,
    title text,
    link_href text,
    genre text,
    cover_url text,
    video_url text
    )";
    mysqli_query($con, $sqlmov);

   //Create Table tbl_usr
   $sqlusr="CREATE TABLE IF NOT EXISTS USR_TABLE_HERE (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    username varchar(255) UNIQUE KEY,
    password varchar(255)
    )";
    mysqli_query($con, $sqlusr);
    ?>
    Datenbanken wurden erfolgreich erstellt.<br>
    Cron wird installiert um Import zu gewährleisten<br>Klick auf den Button um weiterzufahren.<br>
    <?php
    exec('echo -e "`crontab -l`@daily php /var/www/virtual/jm3/html/json_parser.php" | crontab -');
    exec('touch installed');
    ?>
      <form action="index.php" method="get" style="padding-top: 4%;">
      <input type="submit" value="Weiter">
      </form>
    </center>  </body>
      </html>
