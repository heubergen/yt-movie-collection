<!DOCTYPE html>
<html lang="en">
  <body>
<center><h1>Herzlich Willkommen zur Einrichtung von Upcoming Movie Collection</h1>
Dieses Tool wurde von Patrick Albrecht entwickelt und unter der MIT Lizenz ver&ouml;ffentlicht.<br>
Bitte warten, Verbindung zur Datenbank wird hergestellt...<br>
<?php
//load sql_con.php file
include 'sql_con.php';
?>
Verbindung erfolgreich hergestellt<br>
Datenbanken werden erstellt, bitte warten...<br>
<?php
   // create the table tbl_movie
   $sql = "CREATE TABLE IF NOT EXISTS tbl_movie (
     id varchar(15) PRIMARY KEY,
     title text,
     link_href text,
     genre text,
     cover_url text,
     video_url text
   )";
   // execute the sql command
   $conn->exec($sql);
      // create the table tbl_usr
      $sql = "CREATE TABLE IF NOT EXISTS tbl_usr (
        id int(11) AUTO_INCREMENT PRIMARY KEY,
        username varchar(255) UNIQUE KEY,
        password varchar(255)
      )";

      // execute the sql command
      $conn->exec($sql);
?>
Datenbanken wurden erfolgreich erstellt.<br>Klick auf den Button um weiterzufahren.
<?php
exec('touch installed');
?>
  <form action="index.php" method="get" style="padding-top: 4%;">
  <input type="submit" value="Weiter">
  </form>
</center>
</body>
  </html>
