<?php
require_once "article.php";
$art = new article();
$art->supprimer($_GET['ref']);



?>