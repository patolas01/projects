<html lang="PT">
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <script data-ad-client="ca-pub-5519812784154357" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<title>Game Launcher | Slot-machine</title>
	<link rel="shortcut icon" href="../../IMG/rdp_logo.ico"/>
	 <link rel="stylesheet" href="../../CSS/main.css">
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <?php
        $pgid = 2;
        include('header.php');
        include('user-tab.php');
    ?><center>
    <div id="myModal" class="modal" style="display: none;">
    <div class="modal-content">
            <div class="modal-header">
                    <h2>Ganhaste!</h2>
            </div>
        </div>
    </div>


    <div id="yourModal" class="modal" style="display: none;">
    <div class="yourModal-content">
            <div class="yourModal-header">
                    <h2>Perdeste!</h2>
            </div> 
        </div>
    </div></center>
<center>
<div style="width: 65%; height: 92%; background-color: #404040; align-content: center; vertical-align: center;">
<div id="app">


  <div class="doors" style="align-content: center;">
    <div class="door" style="align-content: center;">
      <div class="boxes" style="align-content: center;">
        <!-- <div class="box">?</div> -->
      </div>
    </div>


    <div class="door" style="align-content: center;">
      <div class="boxes" style="align-content: center;">
        <!-- <div class="box">?</div> -->
      </div>
    </div>

    <div class="door" style="align-content: center;">
      <div class="boxes" style="align-content: center;">
        <!-- <div class="box">?</div> -->
      </div>
    </div>
  </div>


















<form action="index.php" method="POST">
  <div class="txtbx">
    <input type="number" class="textbox" value="0" oninput="this.value = Math.round(this.value);" min="1"  pattern="^[\d]+$" id="aposta" name="aposta" placeholder="Valor da aposta" style="text-align: center;">
  </div>
  <div class="buttons">
  <center>
    <button id="spinner">Girar</button>
</center>
  </div>
</form>
</div>
</div>
</center>




<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <?php 
        session_start();
        include ('script.php');
    ?>
   
    <!--script>



    

    temp=$("#aposta").val();
    $("#aposta").val('');
    $("#aposta").val(temp);
    $("#aposta").focus();
    function pausecomp(millis)
    {
        var date = new Date();
        var curDate = null;
        do { curDate = new Date(); }
        while(curDate-date < millis);
    }
    </script-->
    
</body>
</html>