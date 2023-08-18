<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anxout</title>
    <?php include 'db/init.html'; ?>
</head>

<body>
    <div id="mainIntro">

        <div class="topTitle">
            <img id="logoIntro" src="img/anxtyLogo.png" alt="logo" style="width:150px; padding: 80px">
            <h1 id="introTitle">TheAnxtyRoom</h1>
            <p id="introSubtitle">An helping project.</p>
        </div>
        <div class="regBox">
            <div id="loginForm">
                <form action="">
                    <h2>Login</h2>
                    <input type="email" name="userEmail" id="email" placeholder="E-mail">
                    <input type="password" name="userPass" id="pass" placeholder="Password">
                    <p><a href="signup.php">Sign-up</a></p>
                    <div class="buttonMain" id="submitIntro">Submit</div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>