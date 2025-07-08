<?php
session_start();
if (isset($_POST['adresse'])) {
    $adresse = htmlspecialchars($_POST['ad'resse']);
    echo "<div class='container'>";
    echo "<h1>Commande Confirmée</h1>";
    echo "<p><strong>Livraison à:</strong> $adresse</p>";
    echo "<h2>Détails de la commande:</h2>";
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>{$item['quantity']} x {$item['designation']} ({$item['ref']})</li>";
    }
    echo "</ul>";
    unset($_SESSION['cart']);
    echo "<p class='thank-you'>Merci pour votre commande!</p>";
    echo "</div>";
} else {
    echo "<p class='error'>Adresse de livraison manquante.</p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Confirmée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 1.1em;
            color: #555;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            font-size: 1.1em;
            margin: 10px 0;
            color: #333;
        }
        .thank-you {
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
            color: #28a745;
        }
        .error {
            text-align: center;
            font-size: 1.2em;
            color: #e74c3c;
        }
        .container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 1.1em;
        }
        .container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

</body>
</html>
