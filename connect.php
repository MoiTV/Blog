<?php
// connect.php - script that opens connection with database
// $link, $mysqli, $db    ---- resource variable
define('HOST', 'localhost');
define('USERNAME', 'mvaldez');
define('PW', 'password559');
define('DB', 'mvaldez');


// CONNECT
//$db = mysqli_connect(HOST, USERNAME, PW, DB); // Procedural
$db = new mysqli(HOST,USERNAME, PW, DB); // OOP

// ~$mysqli -u username -p 
// mysql> use DB;
//
// procedural                   OOP
// mysqli_foo($db, params)    $db->foo(params)

if($db) {
    //   echo "connection successful\n";
}
else {
    echo "connection unsuccessful\n";
    exit();
}
//if(!$db) or if(mysqli_error($db))  // !0
//// if($db->connect_error())
?>


