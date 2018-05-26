<form method="POST" action="<?= BASE_URL ?>/prof/consult">
    <h3>Les comptes-rendus que vous avez écrit</h3><br>
    <section class='col-lg-12 table-responsive'>
        <table class="col-lg-12 table-responsive" id="liste_ent">
            <thead>
                <tr>
                    <th>Code CR</th>
                    <th>Professeur</th>
                    <th>Etudiant</th>
                    <th>Date CR</th>
                    <th>Type CR</th>
                    <th>Le Compte-Rendu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compterendu as $cr): ?><!-- Pour chaque cr de la liste compterendu -->
                    <tr>
                        <td><a href="<?php echo BASE_URL . '/prof/crdetail/' . $cr->cr_code ?>"><?= $cr->cr_code ?> <!-- Lien vers le détail du compte-rendu et la possibilité de le modifié -->
                            </a></td>
                        <td name="p_code" id="p_code">
                            <?php foreach ($professeur as $prof): ?><!-- Pour chaque prof de la liste professeur -->
                                <?php if ($prof->p_code == $cr->p_code): ?><!-- Si le code prof est egale au code prof du compte-rendu-->
                                    <?= $prof->p_nom ?> <?= $prof->p_prenom ?><!-- Afficher le nom et le prenom du prof -->
                                <?php endif; ?><!-- Fin Si -->
                            <?php endforeach; ?><!-- Fin pour chaque prof --> 
                        <td name="e_code" id="e_code">
                            <?php foreach ($etudiant as $etu): ?><!-- Pour chaque etu de la liste etudiant -->
                                <?php if ($etu->e_code == $cr->e_code): ?><!-- Si le code etu est egale au code etu du compte-rendu-->
                                    <?= $etu->e_nom ?> <?= $etu->e_prenom ?><!-- Afficher le nom et le prenom de l'etu -->
                                <?php endif; ?><!-- Fin Si -->
                            <?php endforeach; ?><!-- Fin pour chaque etu --> 
                        <td><?= $cr->cr_date ?></td>
                        <td><?= $cr->cr_type ?></td>
                        <td><?= $cr->cr_texte ?></td>
                    </tr>
                <?php endforeach; ?><!-- Pour chaque cr -->
            </tbody>
        </table>
    </section>
</form>
