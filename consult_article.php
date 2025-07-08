<?php
require_once('article.php');
if (isset($_GET['ref'])) {
    $ref = $_GET['ref'];
    $art = new article();
    require_once('config.php');
    $cnx = new connexion();
    $pdo = $cnx->CNXbase();
    $req = "SELECT * FROM PRODUITS WHERE REF='$ref'";
    $article = $pdo->query($req)->fetch();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            padding: 20px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        .article-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Détails de l'Article</h1>

        <?php if ($article): ?>
            <p><strong>Référence:</strong> <?php echo ($article['ref']); ?></p>
            <p><strong>Désignation:</strong> <?php echo ($article['_des']); ?></p>
            <p><strong>Marque:</strong> <?php echo ($article['marq']); ?></p>
            <p><strong>Prix:</strong> <?php echo ($article['prix']); ?> DT</p>
            <p><strong>Quantité en stock:</strong> <?php echo ($article['qtestock']); ?></p>
            <p><strong>Catégorie:</strong> <?php echo ($article['categorie']); ?></p>

            <?php if (!empty($article['image'])): ?>
                <p><strong>Image:</strong><br><img src="<?php echo ($article['image']); ?>" alt="Image de l'article" class="article-img"></p>
            <?php endif; ?>
        <?php else: ?>
            <p class="text-danger">Article non trouvé.</p>
        <?php endif; ?>

    </div>
    <a href="affichelisteutilisateur.php"><button>Retour</button></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
