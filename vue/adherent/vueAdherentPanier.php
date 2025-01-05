<header>
<link rel="stylesheet" href="styles/stylePanier.css">

    <nav class="menuPrincipal">
        <?php include_once "vue/adherent/vueAdherentHeader.php"; ?> 
    </nav>
</header>
<section class="panier">
    <div class="container">
        <h2 class="panier-titre">Votre Panier</h2>

        <?php
        // Si le panier est vide
        if (empty($_SESSION['panier'])) {
            echo "<p class='empty-cart'>Votre panier est vide.</p>";
        } else {
            // Affichage des produits dans le panier
            foreach ($_SESSION['panier'] as $idProduit => $produitPanier) {
                echo "<div class='panier-produit'>";
                echo "<div class='produit-details'>";
                echo "<p><strong>Nom : </strong>" . $produitPanier['nom'] . "</p>";
                echo "<p><strong>Quantité : </strong>" . $produitPanier['quantite'] . "</p>";
                echo "<p><strong>Prix unitaire : </strong>" . $produitPanier['prix'] . "€</p>";
                echo "<p><strong>Total produit : </strong>" . ($produitPanier['prix'] * $produitPanier['quantite']) . "€</p>";
                echo "</div>";

                // Bouton pour supprimer uniquement ce produit
                echo "<div class='produit-actions'>";
                echo "<a href='index.php?action=supprimerProduit&idProduit=" . $idProduit . "' class='btn-supprimer'>Supprimer</a>";
                echo "</div>";

                echo "</div>";
            }

            // Affichage du total du panier
            echo "<div class='panier-total'>";
            echo "<h3>Total du panier : <span class='total'>" . $totalPanier . "€</span></h3>";
            echo "</div>";
            // Bouton pour valider le panier
            echo "<div class='panier-valider'>";
            echo "<a href='index.php?action=validerPanier' class='btn-valider'>Valider le panier</a>";
            echo "</div>";
            
        }
        ?>
    </div>
</section>

