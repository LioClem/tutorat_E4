
<?php
$title_for_layout = 'Connexion';
//  echo "insert into users (u_login,u_password) values ('claude','", sha1('claude'),"');"
?>
<form class="form-horizontal" method="post" action="<?= BASE_URL ?>/user/login" >
    <fieldset>

        <!-- Form Name -->
        <legend>Connexion</legend>
        <div class="form-group">
            <label class="col-md-2 control-label" for="login">Login</label>  
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login" name="login" placeholder="Login" class="form-control input-md" type="text" >
                </div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-2 control-label" for="mdp">Password</label>  
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="mdp" name="mdp" placeholder="Mot de passe" title="Mot de passe"  class="form-control input-md" type="password" >
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="role">Rôle</label><!-- Choix du rôle pour le traitement des données -->  
            <div class="col-md-4">
                <select id="role" name="role"><!-- Liste déroulante -->
                    <option value="Prof">Professeur</option><!-- Choix prof --> 
                    <option value="Etu">Etudiant</option><!-- Choix etu --> 
                </select>
            </div>
        </div>
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-info">Connexion</button>
            </div>
        </div>
    </fieldset>
</form>
<legend><?= $message ?></legend><!-- Affichage message d'erreur -->
