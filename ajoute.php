<?php
require_once('article.php');
    $art = new article();
    $art->_ref = $_POST['reference'];
    $art->_des = $_POST['designation'];
    $art->_marq = $_POST['marque'];
    $art->_prix = $_POST['prix'];
    $art->_qtestock = $_POST['stock'];
    $art->_image = $_POST['image'];
    $art->_categorie = $_POST['categorie'];
    $art->ajouteArticle();
    echo "Article ajouté avec succès!";
    echo "<a href='consult_article.php?ref={$art->_ref}' class='btn btn-success'>Consult Article</a>";
?>


