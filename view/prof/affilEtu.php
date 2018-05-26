<h3><strong><?= $message ?></strong></h3>
<form method="post" action="<?= BASE_URL ?>/prof/affilEtu">
    <section class='col-lg-12 table-responsive'>
        <div>
            <table class="col-lg-12 table-responsive" id="liste_ent">
                <thead><tr><th>Code</th><th>Nom</th><th>Prenom</th><th>Prendre tutorat</th></tr></thead><!-- titre du tableau -->
                <?php foreach ($etudiant as $etu) : ?><!-- pour chaque etu contenu dans le tableau etudiant -->
                    <tr><!-- début de ligne -->
                        <td><?= $etu->e_code ?></td> <!-- Affiche son code -->
                        <td><?= $etu->e_nom ?></td> <!-- Affiche son nom -->
                        <td><?= $etu->e_prenom ?></td> <!-- Affiche son prenom -->
                        <td><div id="checkbox"><label><input type=checkbox name='ids[]' value="<?= $etu->e_code ?>"></label></div></td> <!-- Affiche la possibilité de le prendre en tutorat -->
                    </tr><!-- Fin de ligne -->
                <?php endforeach; ?><!-- Fin pour chaque -->
            </table>
        </div>
    </section>
    <div>
        <input type="submit" class="btn btn-success" value="Valider"/><!-- Valider la prise de tutorat(s) -->
        <input type="reset" class="btn btn-danger" value="Annuler"/><!-- Effacer toutes les cases cocher -->
    </div>
</form>