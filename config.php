<?php
class connexion {
    public function CNXbase() {
        $dbc = new PDO('mysql:host=localhost;dbname=projet_php', 'root', '');
        return $dbc;
    }
}
?>