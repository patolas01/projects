<!DOCTYPE html>
<html lang="PT">
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <script data-ad-client="ca-pub-5519812784154357" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<title>RDP-OFC</title>
	<link rel="shortcut icon" href="IMG/rdp_logo.ico"/>
	 <link rel="stylesheet" href="CSS/main.css">
</head>
<body style="background-color: #3F75E2">
    <?php
        $pgid = 5;
        include('head.php');
        include('user-tab.php');
    ?>
    </div>
    <h2 style="font-size: 35px; font-family: Open Sans; margin-bottom: 40px" align="center">Casos de COVID-19 (DGS):</h2>
    <center>
    <?php
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    // Use the function
    if(isMobile()){
        echo '<iframe src="https://esriportugal.maps.arcgis.com/apps/dashboards/e9dd1dea8d1444b985d38e58076d197a" style="width:85%;" height="320px" frameborder="0"></iframe>';
    }
    else {
       echo '<iframe src="https://esriportugal.maps.arcgis.com/apps/opsdashboard/index.html#/acf023da9a0b4f9dbb2332c13f635829" style="width:85%;" height="600px" frameborder="0"></iframe>';
    }
    ?>
  </center>
</body>
</html>