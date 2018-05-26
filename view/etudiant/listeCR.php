<form method="POST" action="<?= BASE_URL ?>/prof/consult"><!-- liste des comptes-rendus concernant l'etudiant -->
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
                <?php foreach ($compterendu as $cr): ?>
                    <tr>
                        <td><a href="<?php echo BASE_URL . '/etudiant/consultCR/' . $cr->cr_code ?>"><?= $cr->cr_code ?>
                            </a></td>
                        <td name="p_code" id="p_code">
                            <?php foreach ($professeur as $prof): ?>
                                <?php if ($prof->p_code == $cr->p_code): ?>
                                    <?= $prof->p_nom ?> <?= $prof->p_prenom ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <td name="e_code" id="e_code">
                            <?php foreach ($etudiant as $etu): ?>
                                <?php if ($etu->e_code == $cr->e_code): ?>
                                    <?= $etu->e_nom ?> <?= $etu->e_prenom ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <td><?= $cr->cr_date ?></td>
                        <td><?= $cr->cr_type ?></td>
                        <td><?= $cr->cr_texte ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            </form>