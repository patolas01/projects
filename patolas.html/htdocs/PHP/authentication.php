<?php    
    session_start();
    include('connection.php');

    $username = $_POST['user'];  
    $password = $_POST['pass'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);  
        $password = md5(mysqli_real_escape_string($con, $password));  
      
        $sql = "select * from utilizador where user = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $active = $row['active'];
        $count = mysqli_num_rows($result);  
          
        if($count == 1){
            $_SESSION['active'] = true;
            $_SESSION['login_user'] = $row['nome'];
            $_SESSION['user'] = $row['user'];
            $_SESSION['coins'] = $row['coins'];
            $_SESSION['type'] = $row['type'];
            header("Location: ../index.php");  
        }  
        else{ 
            header( "refresh:0 ; url=failed.php" );}
?>