<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfController
 *
 * @author valou
 */
class ProfController extends Controller {

    function modifier($id) { //Modification des infos d'un prof
        if (isset($_POST['p_login']) || isset($_POST['p_nom']) || isset($_POST['p_mdp']) || isset($_POST['p_prenom'])) {

            $p_code = $id[0];
            $modProf = $this->loadModel('User');

            $donnees = array();

            if (isset($_POST['p_nom'])) {
                $donnees['p_nom'] = $_POST['p_nom'];
                SESSION::set('nom', $_POST['p_nom']);
            }

            if (isset($_POST['p_prenom'])) {
                $donnees['p_prenom'] = $_POST['p_prenom'];
                SESSION::set('prenom', $_POST['p_prenom']);
            }

            if (isset($_POST['p_login'])) {
                $donnees['p_login'] = $_POST['p_login'];
                SESSION::set('login', $_POST['p_login']);
            }

            if (isset($_POST['p_mdp'])) {
                $mdp = sha1($_POST['p_mdp']);
                if ($mdp == SESSION::get('mdp')) {
                    $donnees['p_mdp'] = sha1($_POST['p_nmdp']);
                    SESSION::set('mdp', sha1($_POST['p_nmdp']));
                }
            }

            $cle = array();
            $cle['p_code'] = $p_code;

            $tab = array();
            $tab['cle'] = $cle;

            $tab['donnees'] = $donnees;
            $modProf->update($tab);
        }
    }

    function compterendu() { //Création d'un compte-rendu

        $modEtudiant = $this->loadModel('UserEtu');
        $d['etudiant'] = $modEtudiant->find(array('conditions' => 'p_code = ' . SESSION::get('code')));
        $this->set($d);

        $d['message'] = '';

        if (isset($_POST['submit'])) {
            $this->modCompteRendu = $this->loadModel('CompteRendu');

            $p_code = $_POST['p_code'];
            $e_code = $_POST['e_code'];
            $date = explode("/", $_POST['cr_date']);
            $jour = (int) $date[0];//A partir d'ici traiment de la date pour ça verification
            if ($jour < 1 || $jour > 31) {
                if ($d['message'] == '') {
                    $d['message'] = "Rentrez un jour correct";
                } else {
                    $d['message'] = $d['message'] . ", rentrez un jour correct";
                }
            } else {
                if ($jour > 0 && $jour < 10) {
                    $cr_date = "0" . (string) $jour . "/";
                } else {
                    $cr_date = (string) $jour . "/";
                }
            }
            if (isset($date[1])) {
                $mois = (int) $date[1];
                if ($mois < 1 || $mois > 12) {
                    if ($d['message'] == '') {
                        $d['message'] = "Rentrez un mois correct";
                    } else {
                        $d['message'] = $d['message'] . ", rentrez un mois correct";
                    }
                } else {
                    if ($mois > 0 && $mois < 10) {
                        $cr_date = $cr_date . "0" . (string) $mois . "/";
                    } else {
                        $cr_date = $cr_date . (string) $mois . "/";
                    }
                }
            } else {
                $d['message'] = $d['message'] . ", rentrez un mois correct";
            }
            if (isset($date[2])) {
                $annee = (int) $date[2];
                if ($annee != date("Y")) {
                    if ($d['message'] == '') {
                        $d['message'] = "Rentrez l'année actuelle";
                    } else {
                        $d['message'] = $d['message'] . ", rentrez l'année actuelle";
                    }
                } else {
                    $cr_date = $cr_date . (string) $annee;
                }
            } else {
                $d['message'] = $d['message'] . ", rentrez l'année actuelle";
            }
            //Fin du traitement de la date
            if ($_POST['cr_texte'] != "") {
                $cr_texte = $_POST['cr_texte'];
            } else {
                if ($d['message'] == '') {
                    $d['message'] = "Ecrivez votre compte-rendu";
                } else {
                    $d['message'] = $d['message'] . ", écrivez votre compte-rendu";
                }
            }
            $cr_type = $_POST['cr_type'];

            $colonnes = array("cr_date", "cr_texte", "cr_type", "p_code", "e_code");

            if ($d['message'] == '') {
                $donnees = array($cr_date, $cr_texte, $cr_type, $p_code, $e_code);
                $this->modCompteRendu->insertAI($colonnes, $donnees);
                $d['message'] = "Compte-rendu bien inséré";
            }
        }
        $this->set($d);
    }

    function consult() { //Récupération des données pour la consultation et la modification d'un compt-rendu
        $modEtudiant = $this->loadModel('UserEtu');
        $d['etudiant'] = $modEtudiant->find(array('conditions' => 1));
        $this->set($d);

        $modUser = $this->loadModel('User');
        $d['professeur'] = $modUser->find(array('conditions' => 1));
        $this->set($d);

        $modCompteRendu = $this->loadModel('CompteRendu');
        $d['compterendu'] = $modCompteRendu->find(array('conditions' => 'p_code = ' . SESSION::get('code')));
        $this->set($d);
    }

    function crdetail($id) { //Récupération des données pour la consultation d'un compte-rendu
        $cr_code = $id[0];

        $modCompteRendu = $this->loadModel('CompteRendu');
        $d['compterendu'] = $modCompteRendu->findFirst(array('conditions' => array('cr_code' => $cr_code)));

        $modEtudiant = $this->loadModel('UserEtu');
        $d['etudiant'] = $modEtudiant->findFirst(array('conditions' => array('e_code' => $d['compterendu']->e_code)));

        $modUser = $this->loadModel('User');
        $d['professeur'] = $modUser->findFirst(array('conditions' => array('p_code' => $d['compterendu']->p_code)));
        //$d['message'] = $verif;
        $this->set($d);
    }

    function modifierCR($id) { //Modification d'un compte-rendu
        $cr_code = $id[0];
        $modCompteRendu = $this->loadModel('CompteRendu');
        $d['compterendu'] = $modCompteRendu->findFirst(array('conditions' => array('cr_code' => $cr_code)));

        $modEtudiant = $this->loadModel('UserEtu');
        $d['etudiant'] = $modEtudiant->findFirst(array('conditions' => array('e_code' => $d['compterendu']->e_code)));

        $modUser = $this->loadModel('User');
        $d['professeur'] = $modUser->findFirst(array('conditions' => array('p_code' => $d['compterendu']->p_code)));

        //$verif='Compte-Rendu bien modifié';
        $modCompteRendu = $this->loadModel('CompteRendu');
        $d['message'] = '';
        $donnees = array();
        $date = explode("/", $_POST['cr_date']);
        $jour = (int) $date[0];
        if ($jour < 1 || $jour > 31) {
            if ($d['message'] == '') {
                $d['message'] = "Rentrez un jour correct";
            } else {
                $d['message'] = $d['message'] . ", rentrez un jour correct";
            }
        } else {
            if ($jour > 0 && $jour < 10) {
                $cr_date = "0" . (string) $jour . "/";
            } else {
                $cr_date = (string) $jour . "/";
            }
        }
        if (isset($date[1])) {
            $mois = (int) $date[1];
            if ($mois < 1 || $mois > 12) {
                if ($d['message'] == '') {
                    $d['message'] = "Rentrez un mois correct";
                } else {
                    $d['message'] = $d['message'] . ", rentrez un mois correct";
                }
            } else {
                if ($mois > 0 && $mois < 10) {
                    $cr_date = $cr_date . "0" . (string) $mois . "/";
                } else {
                    $cr_date = $cr_date . (string) $mois . "/";
                }
            }
        } else {
            $d['message'] = $d['message'] . ", rentrez un mois correct";
        }
        if (isset($date[2])) {
            $annee = (int) $date[2];
            if ($annee != date("Y")) {
                if ($d['message'] == '') {
                    $d['message'] = "Rentrez l'année actuelle";
                } else {
                    $d['message'] = $d['message'] . ", rentrez l'année actuelle";
                }
            } else {
                $cr_date = $cr_date . (string) $annee;
            }
        } else {
            $d['message'] = $d['message'] . ", rentrez l'année actuelle";
        }
        $donnees['cr_type'] = $_POST['cr_type'];
        $donnees['cr_texte'] = $_POST['cr_texte'];

        if ($_POST['cr_texte'] != "") {
            $donnees['cr_texte'] = $_POST['cr_texte'];
        } else {
            if ($d['message'] == '') {
                $d['message'] = "Ecrivez votre compte-rendu";
            } else {
                $d['message'] = $d['message'] . ", écrivez votre compte-rendu";
            }
        }

        $donnees['cr_date'] = $cr_date;
        $cle = array();
        $cle['cr_code'] = $cr_code;
        $tab = array();
        $tab['cle'] = $cle;
        $tab['donnees'] = $donnees;

        if ($d['message'] == '') {
            $modCompteRendu->update($tab);
            header("Refresh: 0;url=".BASE_URL."/prof/crdetail/".$cr_code);
        }
        
        $this->set($d);
    }

    function listeEtu() { //Récupération des données pour la liste
        $modEtudiant = $this->loadModel('UserEtu');
        $d['etudiant'] = $modEtudiant->find(array('conditions' => 1));
        $this->set($d);

        $modUser = $this->loadModel('User');
        $d['professeur'] = $modUser->find(array('conditions' => 1));
        $this->set($d);
    }

    function consultInfo($id) { //Récupération des données pour la consultation des infos d'un etudiant
        $e_code = $id[0];
        $modEtu = $this->loadModel('UserEtu');
        $modInfoEtu = $this->loadModel('InfoEtu');
        $d['etu'] = $modEtu->findFirst(array('conditions' => array('e_code' => $e_code)));
        $d['info'] = $modInfoEtu->findFirst(array('conditions' => array('e_code' => $e_code)));

        $this->set($d);
    }

    function affilEtu() { //Affilie un ou des étudiant au prof
        $modEtudiant = $this->loadModel('UserEtu');
        $d['etudiant'] = $modEtudiant->find(array('conditions' => "p_code IS NULL;"));
        $d['message'] = "";

        $donnees = "p_code = " . SESSION::get('code');

        if (isset($_POST['ids'])) {

            $ids = $_POST['ids'];

            $cle = "e_code in (";
            $where = '';
            foreach ($ids as $id) {
                if ($where != "") {
                    $where .= ',';
                }
                $where .= $id;
            }
            $where .= ")";
            $cle .= $where;
            $modEtudiant->updateIN($cle, $donnees);
            $d['message'] = "Prise en tutorat effectuée";
            header("Refresh: 0;url=".BASE_URL."/prof/affilEtu");
        }
        $this->set($d);
    }

    function insertEtu() { //Traitement pour inserer une classe dans la BD par lecture de csv
        $d['message'] = "";
        if (isset($_POST['nomfichier'])) {
            $nomfichier = $_POST['nomfichier'];
            $modEtu = $this->loadModel('UserEtu');

            $nomFichier = $nomfichier . ".csv";
            $tab = file("../" . $nomFichier);

            for ($i = 0; $i < count($tab); $i++) {
                $ligne = explode(";", $tab[$i]);

                $nom = $ligne[0];
                $prenom = $ligne[1];

                $login = substr($ligne[0], 0, 6);
                $login = $login . substr($ligne[1], 0, 1);

                $password = sha1("azerty");


                $colonne = "e_login, e_mdp, e_nom, e_prenom";
                $donnee = "'" . $login . "', '" . $password . "', '" . $nom . "', '" . $prenom . "'";

                $modEtu->insertMANUEL($colonne, $donnee);
                $d['message'] = count($tab)." étudiants sont bien insérés";
                //$tab_res[$i] = "insert into utilisateurs (login,mdp) values('$login','$login')\n";
            }
        }
        $this->set($d);
    }

    function render($view) { //Afficher une vue à la place d'une autre
        if ($view == 'modifierCR') {
            $view = 'crdetail';
        }
        parent::render($view);
    }

}
