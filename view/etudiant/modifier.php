<form method="post" action="<?= BASE_URL ?>/etudiant/modifier/<?= SESSION::get('code') ?>"><!-- Formulaire de modification de l'etudiant -->
    <div>
        <label>N° Etudiant : <?= SESSION::get('code') ?></label><br>
    </div>
    <div>
        <table>
            <tr>
                <td>
                    <label for="e_nom ">Nom : </label>
                </td>
                <td>
                    <input id="e_nom" name="e_nom" type='text' value="<?= SESSION::get('nom') ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_prenom">Prénom : </label>
                </td>
                <td>
                    <input id="e_prenom" name="e_prenom" type='text' value="<?= SESSION::get('prenom') ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_login ">Login : </label>
                </td>
                <td>
                    <input id="e_login" name="e_login" type='text' value="<?= SESSION::get('login') ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_mdp">Mot de passe : </label>
                </td>
                <td>
                    <input id="e_mdp" name="e_mdp" type="text"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_nmdp">Nouveau mot de passe : </label>
                </td>
                <td>
                    <input id="e_nmdp" name="e_nmdp" type="text"/>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <input type="submit" class="btn btn-success" value="Validez"/>
        <input type="reset" class="btn btn-danger" value="Annuler"/>
    </div>
    <br>
</form>