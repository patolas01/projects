
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
	<fieldset style="width: 20%; font-size: 140%">
		<form style="border: 1; align-items: center;" method="POST" action="authentication.php">
			<p>Utilizador:</p>
			<input type="text" name="user" id="user" placeholder="Utilizador">
			<p>Palavra-passe:</p>
			<input type="password" name="pass" id="pass" placeholder="Palavra-passe">
			<input type="submit" name="submit" value="Entrar">
		</form>
        <h3 style="font-size: 80% ">Não tem conta? Cria uma:</h3>
			<button style="width: 50%; height: 40px" onclick="registar.php">Registar</button>
	</fieldset>
</center>
</body>
</html>