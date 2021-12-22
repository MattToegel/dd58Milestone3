<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'db.ethereallab.app:3306');
define('DB_USERNAME', 'dd58');
define('DB_PASSWORD', 'mg7vRP2EyvGA');
define('DB_NAME', 'dd58');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
