<?php
require_once "article.php";

$art = new article();
$res = $art->afficher();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-consulter {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-modifier {
            background-color: #ffc107;
            color: black;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-supprimer {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Produits</h1>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Référence</th>
                <th>Désignation</th>
                <th>marque</th>
                <th>Prix</th>
                <th>Quantité Stock</th>
                <th>categorie</th>
                <th>Consulter</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($res as $row) {
                echo "<tr>";
                echo "<td><img src='" . ($row[5]) . "' alt='Image' width='50' ></td>";
                echo "<td>" . ($row[0]) . "</td>";
                echo "<td>" .$row[1] . "</td>";
                echo "<td>" . $row[2]. "</td>";
                echo "<td>" . ($row[3]) . "</td>";
                echo "<td>" . ($row[4]) . "</td>";
                echo "<td>" . ($row[6]) . "</td>";
                echo "<td><a href='consult_article.php?ref={$row[0]}' class='btn btn-success'><button class='btn-consulter'>Consulter</button></a></td>";
                echo "<td><a href='modifier_article.php?ref={$row[0]}' class='btn btn-success'><button class='btn-modifier'>Modifier</button></td>";
                echo "<td><a href='suppresion.php?ref=$row[0]"  . "' class='btn-supprimer'>Supprimer</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="login.php"><button>LOG OUT</button></a>
</body>
</html>