<?php
session_start();
?>
<?php

    echo "Name: ". $_SESSION['name'] . ".<br>";

?>
<a href="logout.php"><button>Logout</button></a>