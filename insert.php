<?php
    include "connection.php";
    $query = " INSERT INTO message (id,message) 
    VALUES (DEFAULT,'".$_POST["hi"]."') ";
    mysqli_query($con, $query);
?>
