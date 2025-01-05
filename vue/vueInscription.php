<header>
	<nav class="menuPrincipal">
		<?php
		echo $menuPrincipalBioRelais;
		?>
	</nav>
</header>


<div class="conteneurInscription">
	
	<main>
		<div class="contentInscription">
			<div class='inscription'>
				<div class='titreInscription'>Inscription à Bio Relais</div>
				<?= $formulaireInscription->afficherFormulaire(); ?>
			</div>
		</div>
	</main>
	
</div>