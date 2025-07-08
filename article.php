<?php
class article {
    public $_ref;
    public $_des;
    public $_marq;
    public $_prix;
    public $_qtestock;
    public $_image;
    public $_categorie;
     public function __construct($_categorie='',) {
        $this->ref = $ref;

    }

    function ajouteArticle() {
        require_once('config.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $req = "INSERT INTO produits() VALUES ($_ref, '$this->_des', '$this->_marq', '$this->_prix', '$this->_qtestock', '$this->_image', '$this->_categorie')";
        $pdo->exec($req) or print_r($pdo->errorInfo()); 
    }
    public function afficher()
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM produits";
        $res=$pdo->query($req);
        return $res;
        

    }
    public function supprimer($ref)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="DELETE FROM PRODUITS WHERE REF='$ref'";
        $pdo->exec($req);
        echo"suppresion efectue";

    }
    public function affiche_ref($ref)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM produits where ref='$ref'" ;
        $res=$pdo->query($req)->fetch();
        return $res;
    }
    public function modifier($ref) {
        require_once('config.php');
        $cnx = new connexion();
        $pdo = $cnx->CNXbase();
        $sql = "UPDATE produits 
                SET _des = '$this->_des', 
                    marq = '$this->_marq', 
                    prix = '$this->_prix', 
                    qtestock = '$this->_qtestock', 
                    image = '$this->_image', 
                    categorie = '$this->_categorie' 
                WHERE ref = '$this->_ref'";
        $pdo->exec($sql);
        echo "Modification effectuée";
        
        }
    }

?>

