<?php
    $server = "localhost"; 
    $user   = "root";
    $pass   = "";
    $bd     = "projeto";

    if ($conn = mysqli_connect ($server, $user, $pass, $bd))
    {
        //echo "conectado felinhas!!!";  
    } else 
        echo "DEU MERDA SEU BURRO!";
?>