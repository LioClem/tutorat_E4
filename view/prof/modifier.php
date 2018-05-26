<form method="post" action="<?= BASE_URL ?>/prof/modifier/<?= SESSION::get('code') ?>"><!-- Formulaire de modificaton du prof -->
    <div>
        <label>N° Prof : <?= SESSION::get('code') ?></label><br>
    </div>
    <div>
        <table>
            <tr>
                <td>
                    <label for="p_nom ">Nom : </label>
                </td>
                <td>
                    <input id="p_nom" name="p_nom" type='text' value="<?= SESSION::get('nom') ?>" />
                </td>
            <tr>
                <td>
                    <label for="p_prenom">Prénom : </label>
                </td>
                <td>
                    <input id="p_prenom" name="p_prenom" type='text' value="<?= SESSION::get('prenom') ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="p_login ">Login : </label>
                </td>
                <td>
                    <input id="p_login" name="p_login" type='text' value="<?= SESSION::get('login') ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="p_mdp">Mot de Passe : </label>
                </td>
                <td>
                    <input id="p_mdp" name="p_mdp" type="text"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="p_nmdp">Nouveau mot de Passe : </label>
                </td>
                <td>
                    <input id="p_nmdp" name="p_nmdp" type="text"/>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <input type="submit" class="btn btn-success" value="Validez"/>
        <input type="reset" class="btn btn-danger" value="Annuler"/>
    </div>
</form>