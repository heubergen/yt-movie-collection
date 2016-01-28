<?php
$servername = "localhost";
$username = "jm3";
$password = "ma7duiy7shioL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jm3_test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
