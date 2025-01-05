<style type="text/css">
			@import url(styles/styleproduit.css);
		</style>
        
    <nav class="menuPrincipal">
        <?php include_once "vue/adherent/vueAdherentHeader.php"; ?>
    </nav>
</header>
<main>
    <div class="produit-container">
        <?php foreach ($tabProduits as $produit): ?>
            <div class="produit-card" id="produit-<?php echo $produit[0]; ?>">
                <!-- Photo et nom -->
                <div class="produit-photo"><?php echo $produit[1]; ?></div>
                <div class="produit-nom"><?php echo $produit[2]; ?></div>

                <!-- Descriptif -->
                <div class="produit-description"><?php echo $produit[3]; ?></div>

                <!-- Détails du producteur et catégorie -->
                <div class="produit-details">
                    <span class="producteur">Producteur : <?php echo $produit[4]; ?></span>
                    <span class="categorie">Catégorie : <?php echo $produit[5]; ?></span>
                </div>
                <div class="produit-description"><?php echo $produit[6]; ?></div>
                <!-- Actions : Ajouter et Retirer -->
                <div class="produit-actions">
                    <a href="index.php?action=ajouterPanier&idProduit=<?php echo $produit[0]; ?>" class="btn-ajouter">
                        <img src="images/plus-icon.png" alt="Ajouter" width="16" /> Ajouter
                    </a>
                    <a href="index.php?action=retraitPanier&idProduit=<?php echo $produit[0]; ?>" class="btn-retirer">
                        <img src="images/trash-icon.png" alt="Retirer" width="16" /> Retirer
                    </a>
                </div>
                
            </div>
        <?php endforeach; ?>
    </div>
</main>



<footer>
    <!-- Ajouter votre script ici -->
    <script src="scripts/scriptProduit.js"></script>
</footer>
