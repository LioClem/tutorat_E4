<?php if(SESSION::get('role')=="Professeur") :?><!-- Si role utilisateur egale à prof -->
    <section>
        <h1>Bonjour professeur <?= SESSION::get('nom') ?> <?= SESSION::get('prenom') ?></h1><!-- Alos version prof de l'accueil -->
    </section>
<?php else : ?><!-- Sinon -->
    <section>
        <h1>Bonjour <?= SESSION::get('nom') ?> <?= SESSION::get('prenom') ?></h1><!-- Alos version etu de l'accueil -->
    </section>
<?php endif; ?><!-- Fin Si -->
