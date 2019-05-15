<?php 
    require("header.php");
?>

    <main>
        <?php
            if (isset($_SESSION['user_id'])) {
                //echo "<p>You are logged in!</p>";
            } 
            else {
                //echo " <p>you are logged out!</p>";
            }
        ?>
    </main>


<?php
    require("footer.php");
?>