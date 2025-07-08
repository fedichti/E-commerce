<?php
require_once "article.php";
$art=new article();
$art->_ref = $_POST['ref'];
$art->_des = $_POST['des'];
$art->_marq = $_POST['marq'];
$art->_prix = $_POST['prix'];
$art->_qtestock = $_POST['qtestock'];
$art->_image = $_POST['image'];
$art->_categorie = $_POST['categorie'];
$art->modifier($_POST['ref']);

?>