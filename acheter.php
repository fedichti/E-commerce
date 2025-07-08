<?php
session_start();
require_once "article.php";
if (isset($_GET['ref'])) {
    $ref = $_GET['ref'];
    $art = new article();
    $article = $art->affiche_ref($ref); 
    if ($article) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$ref])) {
            $_SESSION['cart'][$ref]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$ref] = [
                'ref' => $article['ref'],
                'designation' => $article['_des'],
                'prix' => $article['prix'],
                'quantity' => 1
            ];
        }
        header("Location: cart.php");
        exit;
    } 
}
