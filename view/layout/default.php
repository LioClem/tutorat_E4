

<!DOCTYPE html>

<!--test sur les téléphones portables -->

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Gestion des entreprises'; ?></title>
        <link href='<?php echo BASE_SITE . DS . '/css/bootstrap/css/bootstrap.css' ?>' rel="stylesheet">
        <link href='<?php echo BASE_SITE . DS . '/css/style.css' ?>' rel="stylesheet">
        <style type="text/css">
            /* Style pour l'exemple*/

        </style>
    </head>
    <body class="container">
        <!--div class="topbar">
            <div class="topbar-inner">
                <div class="container">
                    <h3><a href="#">Mon Site</a></h3>
                    <ul class="nav">
                       
                    </ul>
                </div>
            </div>
        </div-->

        <header >
            <div class="row hidden-xs" id="header_img"></div>
            <h1 class="row"> BTS SIO Gestion des entreprises partenaires</h1>
        </header>
        <?php if (SESSION::get('role') != null) : ?> <!-- Si le role de l'utilisateur est different de null -->
            <div class="navbar navbar-default"><!-- Alors afficher la barre de menu -->
                <ul class="nav navbar-nav">
                    <li class="active" ><a href="<?= BASE_URL ?>/accueil/accueil"> Accueil </a> </li><!-- Bouton pour aller à l'acceuil -->
                    <?php if (SESSION::get('role') == 'Etudiant') : ?><!-- Si le role de l'utilisateur est Etudiant -->
                        <li ><a href="<?= BASE_URL ?>/etudiant/info"> Entrer vos informations </a> </li> <!-- Alors afficher le bouton pour aller au formulaire info -->
                        <li ><a href="<?= BASE_URL ?>/etudiant/listeCR"> Consulter un compte-rendu à votre sujet </a> </li> <!-- Alors afficher le bouton pour aller à la liste des comptes-rendus concernant l'utilisateur -->
                    <?php endif; ?><!-- Fin Si role etu -->
                    <?php if (SESSION::get('role') == 'Professeur') : ?><!-- Si le role de l'utilisateur est Professeur -->
                        <li><a href='<?= BASE_URL ?>/prof/listeEtu'>Liste des étudiants</a></li><!-- Alors afficher le bouton pour aller à la liste de tous les étudiant afin de voir leurs infos -->
                        <li><a href='<?= BASE_URL ?>/prof/consult'>Vos comptes-rendus</a></li><!-- Alors afficher le bouton pour aller à la liste des compte-rendu écrit par l'utilisateur -->
                        <li><a href='<?= BASE_URL ?>/prof/compterendu'>Créez compte-rendu</a></li><!-- Alors afficher le bouton pour aller au formulaire de création de compte-rendu -->
                        <li><a href='<?= BASE_URL ?>/prof/affilEtu'>Prendre tutorat</a></li><!-- Alors afficher le bouton pour aller à la liste des étudiants sans tuteur et les prendre en tutorat -->
                        <li><a href='<?= BASE_URL ?>/prof/insertEtu'>Insérer une classe</a></li><!-- Alors afficher le bouton pour aller au formulaire pour insérer une classe -->
                        <li><a href="<?= BASE_URL ?>/prof/modifier"> <?= SESSION::get('role') ?> : <?= SESSION::get('nom') ?> <?= SESSION::get('prenom') ?></a></li><!-- Alors afficher le bouton pour aller au formulaire afin de modifier les infos du prof -->
                    <?php endif; ?><!-- Fin Si role prof -->
                    <?php if (SESSION::get('role') == 'Etudiant') : ?><!-- Si le role de l'utilisateur est Etudiant -->
                        <li><a href="<?= BASE_URL ?>/etudiant/modifier"> <?= SESSION::get('role') ?> : <?= SESSION::get('nom') ?> <?= SESSION::get('prenom') ?></a></li><!-- Alors afficher le bouton pour aller au formulaire afin de modifier les infos de base de l'etudiant-->
                    <?php endif; ?><!-- Fin Si role etu -->
                    <li><a href="<?= BASE_URL ?>/user/logout">Déconnexion</a></li><!-- Alors afficher le bouton déconnexion -->
                </ul>
            </div>
        <?php endif; ?><!-- Fin Si role null -->
        <section class="col-lg-10">
            <?= $content_for_layout ?>
        </section>
    </div> 

    <script src='<?php echo BASE_SITE . '/js/jquery.js' ?>' ></script>
    <script src='<?php echo BASE_SITE . '/js/jquery.dataTables.min.js' ?>' ></script>
    <script src='<?php echo BASE_SITE . '/css/bootstrap/js/bootstrap.min.js' ?>' ></script>
    <script src='<?php echo BASE_SITE . '/css/bootstrap/js/dataTables.bootstrap.min.js' ?>' ></script>
    <script type="text/javascript">
        $(function () {
            $('#liste_ent').dataTable();
            $(document).ready(function () {
                $('tr').mouseover(function () {
                    $(this).css('background', '#9cf');
                });
                $('tr').mouseout(function () {
                    $(this).css('background', '');
                });
                $('input[type="text"]').addClass("form-control input-md"); //Ajoute la classe "form-control input-md" à tout les input text
                $('input[id="e_code"]').removeClass("form-control input-md"); //Enleve la classe "form-control input-md" à tout les input d'id e_code
                $('input[id="p_code"]').removeClass("form-control input-md"); //Enleve la classe "form-control input-md" à tout les input d'id p_code
                $('p[id="prevention"]').css('color', '#C00000'); //Ajoute à la balise p d'id prevention une couleur
                $('div[id="checkbox"]').addClass('checkbox'); //Ajoute la classe "checkbox" à tout les div d'id checkbox
                $('select').addClass('form-control');//Ajoute la classe "form-control" à tout les select
            });
        });
    </script>

</body>
</html>
