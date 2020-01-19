<?php
  class monLDAP {
  /***********************
  Données membres de la classe - utilisée en interne. Ne pas les modifier directement ici
  ***********************/
    private $debug = false;   // variable activant les messages d'informations de debug
    private $serveur = "";    // nom du serveur hébergeant le LDAP - NE PAS INITIALISER ICI SA VALEUR PAR DEFAUT
    private $ldapconn;        // ressource caractéristique du LDAP
    private $dn = "";         // dn de la personne identifiée
    private $password = "";   // password de cette même personne
    private $result;   // nombre de résultat de la dernière recherche effectuée
    private $info = array();  // structure (tableau) de mémorisation de la recherche
    private $userdn;


  /***********************
  Constructeur de la classe

  il est unique, on doit donc tester le nombre de paramètres qui lui sont passés.

  Les paramètres de connexion sont initialisés, la connexion ne sera effective que
  lors de l'appel à la méthode ouverture()
  ***********************/
    public function __construct() {
		// Constructeur. Initialisation des paramètres de connexion au ldap. (pas de connexion "réelle").

		// traitement suivant nb d'argument passés au constructeur
		$nb_args = func_num_args();
		if ($nb_args == 0) {
			$this->serveur = "localhost"; // adresse par défaut
		}
		else  {
			$this->serveur = func_get_arg(0);
		}

		if ($this->debug) {
			echo "Initialisation de connexion avec le serveur ".$this->serveur."<br />";
		}
		// attention avec ldap >= 2.xxx, retourne une ressource avec les paramètres intialisés.
		// IL N'Y A PAS ENCORE DE CONNEXION. Elle se fera notamment au prochain appel de ldap_bind.
		$this->ldapconn=ldap_connect($this->serveur);
		ldap_set_option($this->ldapconn,LDAP_OPT_PROTOCOL_VERSION,3);   //pour les LDAP version 3 et PHP 5
    }

  /***********************
  Destructeur de la classe

  Fermeture de la connexion au LDAP
  ***********************/
    public function __destruct() {
		if ($this->debug) {
			echo "Fermeture de la connexion par le destructeur<br />";
		}
		@ldap_close($this->ldapconn);
    }


  /***********************
  Méthode ouverture

  Teste l'identification au LDAP
  Retourne le résultat booléen de cette tentative.
  ***********************/
    public function ouverture($dn="",$password="") { //Methode ouverture()
		$this->dn=$dn;
		$this->password=$password;

		if ($this->debug) {
			if (($this->dn=="") && ($this->password=="")) {
        echo "erreur de connexion";
        die();
			}
			else {
				echo "Connexion sous l'identité ".$this->dn." <br />";
			}
		}

		return @ldap_bind($this->ldapconn,$this->dn,$this->password);   // connexion anonyme, il n'y a pas de nom ni de mot de passe
    }

  /***********************
  Méthode recherche

  Exécute une recherche dans l'annuaire en fonction des paramètres fournis
  Retourne le nombre de résultats de cette recherche
  Mémorise le nombre de résultats et le résultat de la recherche dans les données membres.
  ***********************/
    public function recherche($userdn,$filtre) {
    $this->userdn = $userdn;
    $resu = ldap_search($this->ldapconn,$this->userdn,$filtre);
    if ($resu) { // si on  a un resultat
			$nbre_resultat = ldap_count_entries($this->ldapconn,$resu);
			if ($this->debug) {
				echo "Il y a ".$nbre_resultat." resultat(s)";
			}
			// mémorisation du résultat de la recherche dans la donnée membre $this->info
			$this->info = ldap_get_entries($this->ldapconn, $resu);
		}
		return $nbre_resultat;
	}

  /***********************
  Méthode getLigneAttribut

  Methode qui retourne la valeur de l'attribut $cle (par exemple cn)
  pour le ($num)ième ligne du résultat de la recherche précédente.
  ***********************/
    public function getLigneAttribut($num,$cle) {
		if (isset($this->info[$num][$cle])) {
			return $this->info[$num][$cle][0];
		} else {
			return "";
		}
    }

  /***********************
  Méthode setPassword

  Methode nécessaire pour le modification du mot de passe
  on suppose que la personne est déjà identifiée.
  ***********************/
    public function setPassword($nouveaupassword) {
                $tmdp["userPassword"]=$nouveaupassword;
                return ldap_mod_replace ($this->ldapconn, $this->dn, $tmdp);
    }


  /***********************
  Méthode setAttribut

  Methode nécessaire pour l'ajout d'un attribut quelconque à une personne (en mode admin).
  Retourne le résultat de la tentive de modification.
  ***********************/
    public function setAttribut($dnCible,$attribut,$valeur) {
                return false;
    }

  /***********************
  Méthode ajoutPersonne

  Methode nécessaire pour l'ajout d'une personne (en mode admin).
  Retourne le résultat de la tentive d'ajout.
  ***********************/
    public function ajoutlist($userdn,$user) {
      $this->userdn = $userdn;
      $res =  ldap_add($this->ldapconn, $this->userdn, $user);
      return $res;
    }

  /***********************
  Méthode suppressionPersonne

  Methode nécessaire pour la suppression d'une personne (en mode admin).
  Retourne le résultat de la tentive de suppression.
  ***********************/
    public function suppressionPersonne($login) {
                return false;
    }

  } // fin classe
?>