<?php
    // Connect to database
$server = 'localhost';
$user = 'mvaldez';
$password = 'password559';
$database = 'mvaldez';
$db = new mysqli($server, $user, $password, $database);

if($db->connect_error) {
    die('Bad Connection<br>');
} else {
    echo "We're Connnected<br>";
}

?>