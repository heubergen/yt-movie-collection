<?php
// Check if installation was successful
$check = file_exists("installed");
if ($check < "1") {
    echo "Installation nicht durchgeführt oder erfolgreich, bitte erneut versuchen";
    exit;
}
?>
