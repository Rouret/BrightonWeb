<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Acces admin au LDAP avec PHP</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
		require_once("../../ClasseLDAP.php");
		$ldap = new monLDAP("10.102.61.68");  // instanciation de la classe (avec l'adresse du serveur ldap)
		
		if (empty($_POST["login"]) || empty($_POST["mdp"])) 
		{
			echo "erreur connexion refusé";
			die();
		}
        //identification
        $dn="uid".$_POST["login"].",ou=users,dc=brighton,dc=app";
        $passwd=$_POST["mdp"];
        if (!($ldap->ouverture($dn,$passwd))) {
			echo "erreur connexion refusé"; }
        else {
			include('acceuil.php');
			echo "Bienvenue ". $ldap->getLigneAttribut(0,"cn") ." !\nvous etes bien connecter en tant que ".$_POST["login"];
			echo "<br><form name='modif' action='modif.php' method='post'><input id='login' Name='login' type='hidden' value='".$_POST["login"]."'><input type='submit' value='modifier mot de passe'></form>";
			echo "<br><form name='recherche' action='recherche.php' method='post'><input id='login' Name='login'' value='".$_POST["login"]."'><input type='submit' value='rechercher l'utilisateur'></form>";
			}
    ?>
  </body>
</html>
