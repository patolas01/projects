<?php
    session_start();
    if  (!isset($_SESSION['login_user'])){
        echo '<a id="login-bar" href="../login.php" style="float: right;">Entrar</a>';
    }
    else
    {
        echo '<a id="login-bar" href="../logout.php" style="float: right; font-size: 14px; padding: 2px 10px; color: #FFF;"><table style="text-align: center;"><tr style="color: #FFF;"><td>'.$_SESSION['login_user'].'</td></tr><tr style="color: #FFF;"><td id="coins">'.$_SESSION['coins'].' <img src="../../IMG/rdpcoin.png" style="width: 20px" align="center"></td></tr></table></a></div>';

    }
    //<td rowspan="2"><img width="40px" style="padding-right: 8px;" src="https://s2.glbimg.com/rgW31i_NAc90mfXwWE6ca2M1PzA=/e.glbimg.com/og/ed/f/original/2020/06/30/tebas.jpeg"></td>
?>