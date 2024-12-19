<?php
    session_start();

    $host = "sql211.epizy.com";  
    $user = "epiz_30094420";  
    $password = "qfIS0u5RnV8Aqj7";  
    $db_name = "epiz_30094420_rdpdb";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $username = $_SESSION['user'];
      
      $username = stripcslashes($username);
      $username = mysqli_real_escape_string($con, $username); 
       $sql = "select coins from utilizador where user = '$username'";  
       $result = mysqli_query($con, $sql);  
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
       $active = $row['active'];
       $coins = $row['coins'];
       $_SESSION['coins'] = $row['coins']; 
?>