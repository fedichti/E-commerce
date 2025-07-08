<?php
require_once "article.php";
$art=new article();
$res=$art->affiche_ref($_GET['ref']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Modifier l'Article</h1>

    <form method="POST" action="modifier.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ref" class="form-label">Référence</label>
            <input type="text" class="form-control" id="ref" name="ref" value="<?php echo $res[0]; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="des" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="des" name="des" value="<?php echo $res[1]; ?>" required>
        </div>

        <div class="mb-3">
            <label for="marq" class="form-label">Marque</label>
            <input type="text" class="form-control" id="marq" name="marq" value="<?php echo $res[2]; ?>" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" value="<?php echo $res[3]; ?>" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="qtestock" class="form-label">Quantité en Stock</label>
            <input type="number" class="form-control" id="qtestock" name="qtestock" value="<?php echo $res[4]; ?>" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" value="<?php echo $res[5]; ?>">
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="categorie" name="categorie" value="<?php echo $res[6]; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="produits.php" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
