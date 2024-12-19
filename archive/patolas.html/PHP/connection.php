<?php      
    $host = "sql211.epizy.com";  
    $user = "epiz_30094420";  
    $password = "qfIS0u5RnV8Aqj7";  
    $db_name = "epiz_30094420_rdpdb";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>