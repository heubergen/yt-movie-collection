<?php 
    //load php files
    include 'sql_con.php';
    //Prepare variable
    $movieid = $_GET['movieid'];
    //Save setting in DB
    $conn->query("UPDATE `tbl_movie` SET `list` = '1' WHERE `id`='$movieid'");
    // execute the sql command
    echo "Success!";
    // Close MySQL Connection
    $conn = null;
?>