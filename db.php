<?php
global $connection;
$connection = mysqli_connect('localhost', 'root', '', 'hunar-regristition');

if ($connection) {
   // echo "We are connected";
} else{

 die("Database connection failed");
}

?>
