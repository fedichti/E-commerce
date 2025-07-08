<?php
require_once "article.php";
require_once "config.php"; // N'oublie pas cette ligne !

$marq = isset($_GET['marq']) ? $_GET['marq'] : null;

$cnx = new connexion();
$pdo = $cnx->CNXbase(); // création de la connexion PDO via ta classe

if ($marq) {
    // Requête personnalisée si une marque est sélectionnée
    $req = "SELECT * FROM produits WHERE marq = :marq";
    $stmt = $pdo->prepare($req);
    $stmt->execute(['marq' => $marq]);
    $res = $stmt->fetchAll(PDO::FETCH_NUM);
} else {
    // Sinon, on utilise la méthode afficher()
    $art = new article();
    $res = $art->afficher();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Shop</title>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px;
            padding: 10px;
            text-align: center;
            background-color:rgb(253, 253, 253);
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .card h3 {
            margin: 10px 0;
            font-size: 1em;
        }
        .card p {
            margin: 5px 0;
            color: #555;
            font-size: 0.9em;
        }
        .btn {
            border: none;
            padding: 8px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }
        .btn-consulter {
            background-color: #17a2b8;
            color: white;
        }
        .btn-acheter {
            background-color: #28a745;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .admin-login {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 1.2em;
}

.admin-login a {
    color: #17a2b8;
    text-decoration: none;
    font-weight: bold;
}

.admin-login a:hover {
    color: #0c5c75;
}
/* Styles globaux */
* {
    margin: 40;
    padding: 40;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}


/* Logo centré */
#logo1 {
    position: relative;
    left: 40%;
    
}

/* Conteneur principal du menu */
.menu-container {
    background-color:rgb(17, 223, 62); /* Couleur de fond sombre */
    padding: 0 20px;
    display: flex;
    justify-content: center; /* Centre horizontalement le menu */
    box-shadow: rgb(74, 12, 209); /* Légère ombre */
}

/* Styles principaux pour le menu */
.main-nav {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Liens principaux du menu */
.nav-links {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

.nav-link {
    position: relative;
    margin: 50 50px; /* Espacement entre les catégories */
}

.nav-link > a {
    text-decoration: none;
    color: white; /* Couleur du texte */
    padding: 15px 20px;
    display: block;
    font-weight: bold;
    text-transform: uppercase; /* Texte en majuscules pour un effet moderne */
    transition: background 0.3s, color 0.3s; /* Ajout de virgule entre les transitions */
    border-radius: 5px; /* Légèrement arrondi */
}

.nav-link > a:hover {
    background-color:rgb(17, 223, 62); /* Fond plus clair au survol */
    color: rgb(10, 20, 12); /* Couleur dorée pour le texte au survol */
}

/* Styles pour les sous-menus (drop-down) */
.drop-down {
    list-style: none;
    position: absolute;
    top: 100%; /* Place le sous-menu en dessous */
    left: 0;
    background-color: #444; /* Couleur de fond du sous-menu */
    display: none;
    margin: 0;
    padding: 0;
    min-width: 200px; /* Largeur minimale */
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre pour le sous-menu */
    z-index: 10;
}

.drop-down li {
    border-bottom: 1px solid #555; /* Ligne de séparation */
}

.drop-down li:last-child {
    border-bottom: none;
}

.drop-down li a {
    text-decoration: none;
    color: rgb(17, 223, 62);
    padding: 10px 15px;
    display: block;
    transition: background 0.3s;
}

.drop-down li a:hover {
    background-color:rgb(17, 235, 1); /* Fond plus clair au survol */
}

/* Afficher le sous-menu au survol */
.nav-link:hover .drop-down {
    display: block;
}

/* Responsive pour petit écran */
@media (max-width: 785px) {
    .main-nav {
    flex-direction:column ; /* Menu vertical */
        align-items: center;
    }

    .nav-link {
        margin: 10px 0; /* Espacement entre les catégories */
    }

    .nav-link > a {
        padding: 10px 15px; /* Ajustement du padding */
    }
}
.contenu {
    background-color: rgb(17, 223, 62); /* même vert que le menu */
    padding: 10px 0;
    color: #000; /* Texte noir pour le contraste */
}

.contenu a {
    color: #fff; /* Liens en blanc */
}

.contenu a:hover {
    color: #000; /* Texte noir au survol pour meilleur contraste */
}
menu {
    background: rgb(255, 255, 255);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 20px;
    
    
}

  
  
  .slideshow-container {
    width: 250px;
    height: 250px;
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    background: #ffffff;
    transition: all 0.3s ease-in-out;
  }
  
  .slide {
    display: none;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    text-align: center;
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
  }
  
  .slide.active {
    display: block;
    opacity: 1;
  }
  
  .slide img {
    width: 100%;
    height: 80%;
    object-fit: cover;
    border-bottom: 2px solid #e0e0e0;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
  }
    </style>

<body>
    <!-- En-tête -->
    <header>
        <form class="search" action="#" method="get">
        
        <a href="<?php echo 'affichelisteutilisateur.php'; ?>">
         <img src="<?php echo 'Images/logo_infoshop.svg'; ?>" alt="Logo Info.Shop" id="logo1"></a>
         <div class="admin-login">
        <a href="login.php" title="Se connecter en tant qu'administrateur">
            <i class="fas fa-user-shield"></i> Admin
        </a>
         </div>

         <menu>
            <div class="slideshow-container">
                <div class="slide active">
                  <img src="Images/Animation/IMP-HP-S-Z4B04D.jpg" alt="Casque Audio">
                </div>
                <div class="slide">
                  <img src="Images/Animation/LENOVO-12Y-82R900C9FG.jpg" alt="Montre Connectée">
                </div>
                <div class="slide">
                  <img src="Images/Animation/MI-Mon-44173.jpg">
                </div>
                <div class="slide">
                    <img src="Images/Animation/MSI-682XFR-16-GF63-12U.jpg">
                 </div>
                 <div class="slide">
                    <img src="Images/Animation/NOV-AY-9086-128-BY.jpg">
                 </div>
              </div>
            </menu>
    <script>
      let currentSlide = 0;
      const slides = document.querySelectorAll(".slide");
    
      function showSlide(index) {
        slides.forEach((slide, i) => {
          slide.classList.toggle("active", i === index);
        });
      }
    
      function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
      }
    
      setInterval(nextSlide, 3000); // Change toutes les 3 secondes
     </script> 
      </menu>

            
            <div class="contenu">
                <nav class="navbar">
                    <ul class="nav-links">
                        <!-- Catégorie : Informatique -->
                        <li class="nav-link">
                            <a href="#">Informatique</a>
                            <ul class="drop-down">
                                <li> <a href="pcportable.php">PCs Portables</a></li>
                                <li>PCs de bureau</li>
                                <li>PCs Gaming</li>
                                <li>Ecrans</li>
                                <li>Logiciels</li>
                                <li>Tablettes</li>
                            </ul>
                        </li>

                        <!-- Catégorie : Impression -->
                        <li class="nav-link">
                            <a href="#">Impression</a>
                            <ul class="drop-down">
                                <li>Imprimantes Laser</li>
                                <li>Imprimantes Jet d’encre</li>
                                <li>Photocopieurs</li>
                                <li>Consommables</li>
                            </ul>
                        </li>

                        <!-- Catégorie : Accessoires -->
                        <li class="nav-link">
                            <a href="#">Accessoires</a>
                            <ul class="drop-down">
                                <li>Claviers</li>
                                <li>Souris</li>
                                <li>Son</li>
                                <li>Disques de Stockages</li>
                                <li>Divers</li>
                            </ul>
                        </li>

                        <!-- Catégorie : Smart Phone -->
                        <li class="nav-link">
                            <a href="#">Smart Phone</a>
                        </li>
                    </ul>
                </nav>
            </div>
             <!-- Filtres de recherche -->
        <div class="filters" id="classeFiltre">
            <div class="filter-section">
                <p>Filtrer par marque</p>
                <select id="marqueSelect">
                <option value="LENOVO">LENOVO</option>
                    <option value="MSI">MSI</option>
                    <option value="DELL">DELL</option>
                    <option value="HP">HP</option>
                    <option value="ACER">ACER</option>
                    <option value="ASUS">ASUS</option>
                </select>
            </div>
            <button id="filtrerBtn">Appliquer les filtres</button>
        </div>

        <script>
document.getElementById("filtrerBtn").addEventListener("click", function() {
    const selectedMarque = document.getElementById("marqueSelect").value;
    if (selectedMarque) {
        window.location.href = "?marq=" + encodeURIComponent(selectedMarque);
    } else {
        window.location.href = window.location.pathname;
    }
});
document.getElementById("filtrerBtn").addEventListener("click", function() {
    const selectedMarque = document.getElementById("marqueSelect").value;
    alert("Marque sélectionnée : " + selectedMarque); // ← test
});
</script>


    <h1 style="text-align: center;"></h1>
    <div class="container">
        <?php
        foreach ($res as $row) {
            echo "<div class='card'>";
            echo "<img src='" . ($row[5]) . "' alt='Image'>";
            echo "<h3>" . ($row[1]) . "</h3>"; 
            echo "<p>Prix: " . ($row[3]) . " TND</p>";
            echo "<p>Quantité: " . ($row[4]) . "</p>";
            echo "<a href='consult_article.php?ref=" . ($row[0]) . "' class='btn btn-consulter'>Consulter</a>";
            echo "<a href='acheter.php?ref=" . ($row[0]) . "' class='btn btn-acheter'>Acheter</a>";
            echo "</div>";
        }
   
        ?>
    </div>
</body>
</html>
