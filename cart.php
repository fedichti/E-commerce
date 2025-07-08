<?php
session_start();
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p class='empty-cart'>Votre panier est vide.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
            text-align: right;
            padding: 10px;
        }
        .empty-cart {
            color: red;
            text-align: center;
            font-size: 1.5em;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }
        label {
            font-size: 1.1em;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 300px;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Panier</h1>
    <table>
        <tr>
            <th>Référence</th>
            <th>Désignation</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $lineTotal = $item['prix'] * $item['quantity'];
            $total += $lineTotal;
            echo "<tr>
                    <td>{$item['ref']}</td>
                    <td>{$item['designation']}</td>
                    <td>{$item['prix']} TND</td>
                    <td>{$item['quantity']}</td>
                    <td>{$lineTotal} TND</td>
                  </tr>";
        }
        ?>
    </table>
    <p class="total">Total: <?php echo $total; ?> TND</p>

    <h2>Adresse de livraison</h2>
    <form action="checkout.php" method="POST">
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" required>
        <button type="submit">Confirmer la commande</button>
    </form>
</div>

</body>
</html>
