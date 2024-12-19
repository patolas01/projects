<!DOCTYPE html>
<html lang="PT">
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5519812784154357"
     crossorigin="anonymous"></script>
     <meta name="a.validate.01" content="c33f368d86babecc5f12ffca9e3dd01b6f79" />
	<title>Gerir Coins</title>
	<link rel="shortcut icon" href="IMG/rdp_logo.ico">
  <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
    <?php
        $pgid=5 ;
        include('head.php');
        include('user-tab.php');
    ?>
    </div><br>
    <center>
    <form action="" method="post" id="form" enctype="multipart/form-data">
    <h1>Gerir Coins</h1>
    <select id="mode" name="mode">
    <?php 
    $host = "sql211.epizy.com";  
    $user = "epiz_30094420";  
    $password = "qfIS0u5RnV8Aqj7";  
    $db_name = "epiz_30094420_rdpdb";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }


    $sql = "SELECT ID, nome FROM utilizador where nome order by nome";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                while($row = $result->fetch_assoc()) {
                    $id=$row['ID'];
                    $nome=$row['nome'];
                    echo '<option value="'.$id .'">' . $nome . '</option>';
                }

    ?>
    </center>
</body>
</html>