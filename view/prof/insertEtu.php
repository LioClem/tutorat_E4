<h3><strong><?= $message ?></strong></h3>
<h3>Insertion d'étudiant</h3>
<p id='prevention'>(Avant toutes insertions grâce à un fichier csv, enlevez les accents dans le fichier et vérifiez que le fichier est bien à la racine du site sur le serveur)</p>
<hr>
<form method="post" action="<?= BASE_URL ?>/prof/insertEtu"><!-- Formulaire d'insertion d'une classe -->
    <div>
        <table>
            <tr>
                <td>
                    <label for="nomfichier">Nom du fichier pour l'extraction : </label>
                </td>
                <td>
                    <input type="text" id="nomfichier" name="nomfichier">
                </td>
                <td>.csv</td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <input type="submit" class="btn btn-success" value="Validez"/>
        <input type="reset" class="btn btn-danger" value="Annuler"/>
    </div>
</form>