<h3>Liste des étudiants</h3><br>
<section class='col-lg-12 table-responsive'>
    <table class="col-lg-12 table-responsive" id="liste_ent"><!-- Liste des étudiant avec lien vers la consultation des infos de chaque etudiants -->
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Tutorat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiant as $etu): ?>
                <tr>
                    <td><a href="<?= BASE_URL ?>/prof/consultInfo/<?= $etu->e_code ?>"><?= $etu->e_code ?></a></td>
                    <td><?= $etu->e_nom ?></td>
                    <td><?= $etu->e_prenom ?></td>
                    <?php if(isset($etu->p_code)) :?>
                        <?php foreach ($professeur as $prof): ?>
                            <?php if ($etu->p_code == $prof->p_code): ?>
                                <td><?= $prof->p_nom ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <td>Aucun</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

