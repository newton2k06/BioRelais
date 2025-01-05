
<header>
    <nav class="menuPrincipal">
        <?php include_once "vue/adherent/vueAdherentHeader.php"; ?>
    </nav>
<link rel="stylesheet" href="styles/styleFacture.css">

</header>

<section class="facture">
    <div class="container">
        <h2 class="facture-titre">Facture</h2>

        <div class="facture-details">
            <h3>Informations de facturation</h3>
            <p><strong>Adresse : </strong><?php echo $adresseFacturation; ?></p>
            <p><strong>Mode de paiement : </strong><?php echo $modePaiement; ?></p>
        </div>

        <h3>Produits dans votre panier :</h3>

        <?php
        // Affichage des produits du panier
        foreach ($_SESSION['panier'] as $produitPanier) {
            echo "<div class='facture-produit'>";
            echo "<p><strong>Nom : </strong>" . $produitPanier['nom'] . "</p>";
            echo "<p><strong>Quantité : </strong>" . $produitPanier['quantite'] . "</p>";
            echo "<p><strong>Prix unitaire : </strong>" . $produitPanier['prix'] . "€</p>";
            echo "<p><strong>Total produit : </strong>" . ($produitPanier['prix'] * $produitPanier['quantite']) . "€</p>";
            echo "</div>";
        }
        ?>

        <div class="facture-total">
            <h3>Total des produits : <span class="total"><?php echo $totalPanier; ?>€</span></h3>
            <h3>Frais de livraison : <span class="frais-livraison"><?php echo $fraisLivraison; ?>€</span></h3>
            <h3><strong>Total de la facture : </strong><span class="total-facture"><?php echo $totalFacture; ?>€</span></h3>
        </div>

        <div class="facture-footer">
            <p>Merci pour votre commande !</p>
        </div>
    </div>
</section>
