<?php
    include "connection.php";
    $sql = "select * from message";
    $result = mysqli_query($con , $sql);
    while($row = mysqli_fetch_array($result))
    {    
            echo '<p class=" text-white p-1" > <b> > : '.$row['message'].'</b> </p>';
            echo "<hr style='background-color: white '>";
    }  
?>

