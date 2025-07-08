<?php
class Admin {
    function verifier($adresse, $motdupasse) {
        require_once("config.php");
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = "SELECT * FROM adminlist WHERE addresseadmin = '$adresse' AND motdepasseadmin = '$motdupasse'";
        $result = $pdo->query($req);
        return $result !== false;
    }
}
?>
