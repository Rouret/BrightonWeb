<!DOCTYPE html>
<script src="LibrairieSha.js" type="text/javascript"></script>

<html>
<head>
	<meta charset="utf-8" />
	<title>MODIFICATION DE MOT DE PASSE</title>
  
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<p class="titre">modification de mot de passe</p>
	<hr />
	<form id="idFormLog" action="modification.php" method="post">
		<table>
			<tr>
				<td>Login:</td><td><input id="login" name="login" value="<?php $_POST["login"]; ?>"></td>
			</tr>
			<tr>
				<td>Mot de passe actuel:</td>
				<td><input id="mdp" Name="mdp" type="password" value=""></td>
			</tr>
			<tr>
				<td>nouveau mot de passe:</td><td><input id="nvmdp" name="nvmdp" value=""></td>
			</tr>
		</table>
		<button>modifier</button>
	</form>
	<hr />
</body>
</html>
