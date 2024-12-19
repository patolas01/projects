<!DOCTYPE html>
<html lang="PT">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>RDPcasino | Login</title>
	<link rel="shortcut icon" href="../IMG/rdp_logo.ico">
	<link rel="stylesheet" href="../CSS/main.css">
</head>
<body>
<body style="background-color: #3F75E2;">
	<center>
    <h2>Iniciar sessão</h2>
	<fieldset style="width: 20%; font-size: 120%">
		<form style="border: 1; align-items: center;" method="POST" action="authentication.php">
			<label>Utilizador:</label><br>
			<input type="text" class="textbox" name="user" id="user" placeholder="Utilizador"><br><br>
			<label>Palavra-passe:</label><br>
			<input type="password" class="textbox" name="pass" id="pass" placeholder="Palavra-passe"><br><br>
            <button style="width: 60%; height: 35px" onclick="submit">Entrar</button>
		</form>
        <br>
        <h3 style="font-size: 80% ">Não tem conta? Cria uma:</h3>
			<button style="width: 60%; height: 40px" onclick="location.href='register.php'">Registar</button>
	</fieldset>
</center>
</body>
</html>