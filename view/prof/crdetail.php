<form method="post" action="<?= BASE_URL ?>/prof/modifierCR/<?= $compterendu->cr_code ?>"><!-- Formulaire de consultation et modification d'un compte-rendu -->
    <?php if (isset($message)): ?>
        <h4><?= $message ?></h4>
    <?php endif ?>
    <h3>Le Compte rendu n°<?= $compterendu->cr_code ?></h3><hr>
    <table>
        <tr>
            <td>
                <label for='p_code'>L'enseignant : </label>
            </td>
            <td>
                <input type="text" value="<?= SESSION::get('nom') ?> <?= SESSION::get('prenom') ?>" disabled="disabled">
                <input type="text" name="p_code" id="p_code" value="<?= SESSION::get('code') ?>" hidden="hidden">
            </td>
        </tr>
        <tr>
            <td>
                <label for='e_code'>L'étudiant : </label>
            </td>
            <td>
                <input type="text" value="<?= $etudiant->e_nom ?> <?= $etudiant->e_prenom ?>" disabled="disabled">
                <input type="text" name="e_code" id="e_code" value="<?= $etudiant->e_code ?>" hidden="hidden">
            </td>
        </tr>
        <tr>
            <td>
                <label for="cr_date" name="cr_date">Date (exemple : 27/02/2017) : </label>
            </td>
            <td>
                <input name="cr_date" type='text' value="<?= $compterendu->cr_date ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="cr_type" name='cr_type'>Compte-rendu pour :  </label>
            </td>
            <td>
                <select name="cr_type" id="cr_type">
                    <?php if ($compterendu->cr_type == "Tutorat"): ?>
                        <option value="Tutorat" selected="selected">Tutorat</option>
                    <?php else: ?>
                        <option value="Tutorat">Tutorat</option>
                    <?php endif; ?>
                    <?php if ($compterendu->cr_type == "Famille"): ?>
                        <option value="Famille" selected="selected">Famille</option>
                    <?php else: ?>
                        <option value="Famille">Famille</option>
                    <?php endif; ?>
                </select>
            </td>
        </tr>
    </table>
    <!--<label for="cr_type" name='tutorat'>Le tutorat : </label><input name="cr_type" id="cr_type" type="radio" value="tutorat" checked="checked"/><br>
    <label for="cr_type" name='famille'>La famille : </label><input name="cr_type" id="cr_type" type="radio" value="famille"/>
    -->
    <div>
        <label for="cr_texte"> Compte-Rendu : </label><br>
        <textarea name="cr_texte" rows="10" cols="120"><?= $compterendu->cr_texte ?></textarea>
    </div>
    <br>
    <div>
        <input type="submit" name="submit" class="btn btn-success" value="Modifier"/>
        <input type="reset" class="btn btn-danger" value="Annuler"/>
    </div>
    <br>
</form>