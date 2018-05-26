
<form method="post" action="<?= BASE_URL ?>/prof/compterendu">
    <h4><strong><?= $message ?></strong></h4>
    <h3>Le tutorat</h3><hr>
    <table>
        <tr>
            <td>
                <label for='p_code'>L'enseignant : </label>
            </td>
            <td>
                <input type="text" value="<?= SESSION::get('nom') ?> <?= SESSION::get('prenom') ?>" disabled="disabled">
                <input type="text" name="p_code" id="p_code" value="<?= SESSION::get('code') ?>" hidden="hidden"><!-- input hidden pour récuérer le code sans l'afficher -->
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td>
                <label for='e_code'>L'étudiant : </label>
            </td>
            <td>
                <select name="e_code">
                    <?php foreach ($etudiant as $etu): ?><!-- Pour chaque etu de la liste etudiant -->
                        <option value="<?= $etu->e_code ?>"><?= $etu->e_nom ?> <?= $etu->e_prenom ?></option> <!-- On récupére le code et on affiche le nom et le prénom -->
                    <?php endforeach; ?><!-- Fin pour chaque -->
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="cr_date" name="cr_date">Date (exemple : 27/02/2017) : </label>
            </td>
            <td>
                <input name="cr_date" type='text'/>
            </td>
        </tr>
        <div>
            <tr>
                <td>
                    <label for="cr_type" name='cr_type'>Compte-rendu pour :  </label>
                </td>
                <td>
                    <select name="cr_type" id="cr_type">
                        <option value="Tutorat">Tutorat</option>
                        <option value="Famille">Famille</option>
                    </select>
                </td>
            </tr>
    </table>
    <div>
        <label for="cr_texte"> Compte-Rendu : </label><br>
        <textarea name="cr_texte" rows="10" cols="120"></textarea><br>
    </div>
    <br>
    <div class="container" align="left">
        <input type="submit" name="submit" class="btn btn-success" value="Valider"/>
        <input type="reset" class="btn btn-danger" value="Annuler"/>
    </div>
    <br>
</form>

