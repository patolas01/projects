<?php
    session_start();
    if  (!isset($_SESSION['login_user'])){
        echo '<a id="login-bar" href="PHP/login.php" style="float: right;">Entrar</a>';
    }
    else
    {
        echo '<a id="login-bar" href="PHP/logoutMain.php" style="float: right; font-size: 16px; padding: 2px 10px; color: #FFF;"><table style="text-align: center"><tr><td rowspan="2"></td><td>'.$_SESSION['login_user'].'</td></tr><tr><td id="coins">'.$_SESSION['coins'].' <img src="IMG/rdpcoin.png" style="width: 20px" align="center"></td></tr></table></a>';
    }
?>