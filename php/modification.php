<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Acces admin au LDAP avec PHP</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        require_once("ClasseLDAP.php");
        $ldap = new monLDAP("10.102.61.68");  // instanciation de la classe (avec l'adresse du serveur ldap)

        //identification
        $dn="uid=".$_POST["login"].",ou=users,c=Annecy,dc=brighton,dc=app";
        $passwd=$_POST["mdp"];
        $nvpasswd=$_POST["nvmdp"];
        if (!($ldap->ouverture($dn,$passwd))) {
          echo "erreur connexion refusé"; }
        else {
                $ldap->setPassword($nvpasswd);
                echo "mot de passe modifié !";
			}
    ?>
  </body>
</html>
