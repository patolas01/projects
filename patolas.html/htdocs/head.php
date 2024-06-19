<?php
session_start();

echo "<style>@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap')</style><link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=PT+Sans&display=swap' rel='stylesheet'>";

	echo '<div class="topnav">';
    echo '<a href="index.php" class="topnav" style="padding: 5px 15px; user-select: none;"><img src="IMG/rdp_logo.ico" style="width: 60px"></a>';
    echo '<a ';
    if ($pgid === 1) {
        echo ' class="active" ';
    }
    echo 'href="index.php">Principal</a>';

    echo '<a ';
    if ($pgid === 2) {
        echo ' class="active" ';
        
        
    }
    if (!isset($_SESSION['login_user'])){
            echo 'href="gmlock.php">Jogos</a>';
        }
        else{
            echo 'href="games.php">Jogos</a>';
        }

    echo '<a ';
    if ($pgid === 3) {
        echo ' class="active" ';
    }

        echo 'href="news.php">Novidades</a>';


    echo '<a ';
    if ($pgid === 4) {
        echo ' class="active" ';
    }
    /*echo 'href="formula.php">Formula 1</a>';*/

    echo '<a ';
    if ($pgid === 5) {
        echo ' class="active" ';
    }
    if($_SESSION['type']==1){
        /*echo 'href="covid.php">COVID</a>';*/
        echo 'href="admin.php">Centro de Administrador</a>';
    }

    echo '<a ';
    if ($pgid === 6) {
        echo ' class="active" ';
    }
    echo 'href="about.php">Sobre</a>';
?>