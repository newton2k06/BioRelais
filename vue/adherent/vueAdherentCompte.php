<header>

    <nav class="menuPrincipal">
       <?php include_once "vue/adherent/vueAdherentHeader.php";
       ?> 
    </nav>
    <link rel="stylesheet" type="text/css" href="styles/styleCompte.css">
</header>
Compte

<div class="">
    <?php
        $formulaireUtilisateur->afficherFormulaire();
           
    ?>


</div>
<?php if (isset($message)): ?>
    <div class="message"><?php echo $message; ?></div>
<?php endif; ?>

<?php if (isset($messageErreurSuppression)): ?>
    <div class="message"><?php echo $messageErreurSuppression; ?></div>
<?php endif; ?>


