<?php
    require("./ClasseLDAP.php");
    $ldap = new monLDAP("10.102.74.61");
    if (!isset($_GET["data"])) {
        echo "erreur, fichier non transféré !";
        die();
    }
    $tab=json_decode($_GET["data"], true);
    $dn="cn=admin,dc=brighton,dc=app";
    $passwd="root";
    $ldap->ouverture($dn,$passwd);
    // var_dump($tab);
    foreach ($tab as $value) {
        $mail = strtolower($value["firstname"]) . "." . strtolower($value["lastname"]) . "@etu.univ-smb.fr";
        if ($ldap->recherche("ou=users,dc=brighton,dc=app","uid=".$mail) == 0 && $value["lastname"] != "" && $value["firstname"] != "" && $value["flat"] != "") {
            $entry['objectClass'][0] = "person";
            $entry['objectClass'][1] = "inetOrgPerson";
            $entry['uid'] = $mail;
            $entry['sn'] = $value["lastname"];
            $entry['givenName'] = $value["firstname"];
            $entry['cn'] = $value["firstname"] . " " . $value["lastname"];
            $entry['displayName'] = $entry["cn"];
            $entry['gidNumber'] = 5000;
            $entry['userPassword'] = '{sha1}' . base64_encode(sha1('Pa$$word'));
            $entry['mail'] = $mail;
            $entry['roomNumber'] = intval($value["flat"]);
            $dn = "uid=" . $entry['uid'] . ",ou=users,dc=brighton,dc=app";
            $ldap->ajoutlist($dn,$entry);
        }
        else {
            $str = "error creating user ". $value["lastname"] . " " . $value["firstname"] . ", user already exist or information missing on the user\n";
            echo $str;
        }
    }
?>


<!-- $entry = array(
                "mail" => $mail, //J'ai du remplace @ par 'arobas' pour ne pas être classer en spam
                "sn" => $value["lastname"],
                "givenName" => $value["firstname"],
                "userPassword" => '{sha1}' . base64_encode(sha1('Pa$$word')),
                "uid" => $mail, 
                "cn" => $value["firstname"] . " " . $value["lastname"],
                "displayName" => $value["firstname"] . " " . $value["lastname"],
                "gidNumber" => 5000,
                "roomNumber" => $value["flat"],
                "objectClass" => array(
                        "0" => "person",
                        "1" => "inetOrgPerson"
                        )
                    ); -->