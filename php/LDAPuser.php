<?php
    require_once("./ClasseLDAP.php");

    if (!isset($_GET["data"])) {
        echo "erreur, fichier non transféré !";
        die();
    }
    $tab=json_decode($_GET["data"]);
    print_r($tab);
    $entry[];
    foreach ($tab as $value) {
        $entry["uid"] = $value["firstname"] . "." . $value["lastname"] . "@etu.univ-smb.fr";
        $entry["roomNumber"] = $value["flat"];
        $entry["mail"] = $value["firstname"] . "." . $value["lastname"] . "@etu.univ-smb.fr";
        $entry["gidNumber"] = 5000;
        $entry["sn"] = $value["lastname"];
        $entry["cn"] = $value["firstname"] . " " . $value["lastname"];
        $entry["displayName"] = $entry["cn"];
        $entry["objectClass"] = "inetOrgPerson";
    }
?>
