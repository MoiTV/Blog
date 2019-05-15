<?php
    require_once('connect.php');
    echo "connected<br>";
    $sql = "SELECT * FROM posts";


    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"]. " - title: " . $row["title"]. "body" . $row["body"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    
    mysqli_close($db);
    ?>