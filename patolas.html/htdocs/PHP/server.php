<?php

    $host = "sql211.epizy.com";  
    $user = "epiz_30094420";  
    $password = "qfIS0u5RnV8Aqj7";  
    $db_name = "epiz_30094420_rdpdb";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    session_start();
    $nome = $_POST['nome'];
    $nome = stripcslashes($nome);  
    $username = $_POST['user'];
    $username = stripcslashes($username); 
    $email = $_POST['email'];
    $email = stripcslashes($email);  
    $password1 = $_POST['pass'];
    $password1 = stripcslashes($password1);   
// REGISTER USER
  // receive all input values from the form
    $nome = mysqli_real_escape_string($con, $nome);
    $username = mysqli_real_escape_string($con, $username);
    $email = mysqli_real_escape_string($con, $email);
    $password1 = md5(mysqli_real_escape_string($con, $password1));

  // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM utilizador WHERE user= '$username' OR email= '$email' ";
    $result = mysqli_query($con, $user_check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row['user'] === $username) {
      echo '<script>alert("Este nome de utilizador já existe");</script>';
      
        if ($row['email'] === $email) {
            echo '<script>alert("Este email já existe");</script>';
            sleep(15);
             header('location: register.php');
        }
        sleep(15);
        header('location: register.php');
    }

    

    else
    {

    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    $sql = "INSERT INTO utilizador (nome, user, email, password) VALUES ( '$nome', '$username', '$email', '$password1' )";
    $retval = mysqli_query($con, $sql);
   
   if(!$retval) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo 'alert("Login feito com sucesso");';
   
    mysql_close($con);
  	header('location: ../index.php');
    }
?>