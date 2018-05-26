<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InfoController
 *
 * @author valou
 */
class EtudiantController extends Controller {
    
    function info(){ //Création est modification des informations
        $e_code = SESSION::get('code');
        
        $modEtu = $this->loadModel('UserEtu');
        $modInfoEtu = $this->loadModel('InfoEtu');
        $d['etu'] = $modEtu -> findFirst( array ('conditions' => array('e_code'=>$e_code)));
        $d['info'] = $modInfoEtu -> findFirst( array ('conditions' => array('e_code'=>$e_code)));
        
        if (isset($_POST['e_nom']) && isset($_POST['e_prenom'])) { //Test si le nom et le prenom a bien été envoyé
            
            
            $modEtu = $this->loadModel('UserEtu');
            $modInfoEtu = $this->loadModel('InfoEtu');
            
            $donneesEtu = array();
            $donneesInfo = array();
            
            $donneesEtu['e_nom'] = $_POST['e_nom'];
            SESSION::set('nom', $_POST['e_nom']);
            $donneesEtu['e_prenom'] = $_POST['e_prenom'];
            SESSION::set('prenom', $_POST['e_prenom']);
            $donneesEtu['e_age'] = $_POST['e_age'];
            $donneesEtu['e_regime'] = $_POST['e_regime'];
            $donneesEtu['e_ville'] = $_POST['e_ville'];
            $donneesEtu['e_tempstrajet'] = $_POST['e_tempstrajet'];
            $donneesEtu['e_intituleBac'] = $_POST['e_intituleBac'];
            $donneesEtu['e_anneeBac'] = $_POST['e_anneeBac'];
            $donneesEtu['e_etablissementBac'] = $_POST['e_etablissementBac'];
            
            if (isset($_POST['i_isTravail'])){ //Si le champ isTravail a été rempli
                $donneesInfo['i_isTravail'] = $_POST['i_isTravail'];
            }
            else {
                $donneesInfo['i_isTravail'] = 0;
            }
            if(isset($_POST['i_nbHSemaineTravail'])){ //Si le champ nombre d'heure  de travail par semaine a été rempli
                if ($_POST['i_nbHSemaineTravail'] != null){ //Si le nombre d'heure est different de null
                    if (isset($_POST['i_isTravail'])){
                        $donneesInfo['i_nbHSemaineTravail'] = $_POST['i_nbHSemaineTravail'];
                    }
                    else {
                        $donneesInfo['i_nbHSemaineTravail'] = 0;
                    }
                }
                else {
                    $donneesInfo['i_nbHSemaineTravail'] = 0;
                }
            } 
            else {
                 $donneesInfo['i_nbHSemaineTravail'] = 0;
            }
            $donneesInfo['i_numChoix'] = $_POST['i_numChoix'];
            $donneesInfo['i_motivChoix'] = $_POST['i_motivChoix'];
            $donneesInfo['i_Option'] = $_POST['i_Option'];
            $donneesInfo['i_motivOpt'] = $_POST['i_motivOpt'];
            $donneesInfo['i_nivPostedeTravail'] = $_POST['i_nivPostedeTravail'];
            $donneesInfo['i_compMat'] = $_POST['i_compMat'];
            $donneesInfo['i_precMat'] = $_POST['i_precMat'];
            $donneesInfo['i_compSyst'] = $_POST['i_compSyst'];
            $donneesInfo['i_precSyst'] = $_POST['i_precSyst'];
            $donneesInfo['i_compReseau'] = $_POST['i_compReseau'];
            $donneesInfo['i_precReseau'] = $_POST['i_precReseau'];
            $donneesInfo['i_compDev'] = $_POST['i_compDev'];
            $donneesInfo['i_precDev'] = $_POST['i_precDev'];
            $donneesInfo['i_compWeb'] = $_POST['i_compWeb'];
            $donneesInfo['i_precWeb'] = $_POST['i_precWeb'];
            $donneesInfo['i_LSP'] = $_POST['i_LSP'];
            $donneesInfo['i_ProjPro'] = $_POST['i_ProjPro'];
            $donneesInfo['i_pointsforts'] = $_POST['i_pointsforts'];
            $donneesInfo['i_obstacles'] = $_POST['i_obstacles'];
            $donneesInfo['e_code'] = $e_code;
            
            
            
            
            $cleEtu = array();
            $cleEtu['e_code'] = $e_code;
            $tabEtu = array();
            $tabEtu['cle'] = $cleEtu;
            $tabEtu['donnees'] = $donneesEtu;
            $modEtu->update($tabEtu);
            
            if (isset($d['info']->i_code)){ //Si il y a un code d'info on update
                $cleInfo = array();
                $cleInfo['i_code'] = $d['info']->i_code;
                $tabInfo = array();
                $tabInfo['cle'] = $cleInfo;
                $tabInfo['donnees'] = $donneesInfo;
                $modInfoEtu->update($tabInfo);
                header("Refresh: 0;url=".BASE_URL."/etudiant/info");//Actualisation de de la page
            }
            else { //Sinon on insert
                $cleInfo = 'i_isTravail, i_nbHSemaineTravail, i_numChoix, i_motivChoix, i_Option, i_motivOpt, i_nivPostedeTravail, i_compMat, i_precMat, i_compSyst, i_precSyst, i_compReseau, i_precReseau, i_compDev, i_precDev, i_compWeb, i_precWeb, i_LSP, i_ProjPro, i_pointsforts, i_obstacles, e_code';
                $tabInfo = "".$donneesInfo['i_isTravail'].", ".$donneesInfo['i_nbHSemaineTravail'].", ".$donneesInfo['i_numChoix'].", '".$donneesInfo['i_motivChoix']."', '".$donneesInfo['i_Option']."', '".$donneesInfo['i_motivOpt']."', '".$donneesInfo['i_nivPostedeTravail']."', '".$donneesInfo['i_compMat']."', '".$donneesInfo['i_precMat']."', '".$donneesInfo['i_compSyst']."', '".$donneesInfo['i_precSyst']."', '".$donneesInfo['i_compReseau']."', '".$donneesInfo['i_precReseau']."', '".$donneesInfo['i_compDev']."', '".$donneesInfo['i_precDev']."', '".$donneesInfo['i_compWeb']."', '".$donneesInfo['i_precWeb']."', '".$donneesInfo['i_LSP']."', '".$donneesInfo['i_ProjPro']."', '".$donneesInfo['i_pointsforts']."', '".$donneesInfo['i_obstacles']."', '".$donneesInfo['e_code']."'";
                print_r($tabInfo);
                $modInfoEtu->insertMANUEL($cleInfo, $tabInfo);
                header("Refresh: 0;url=".BASE_URL."/etudiant/info");
            }
        }
        $this -> set($d);
    }
    
    function modifier($id) { //Modification de certaines informations de l'étudiant dont sont mot de passe
        if (isset($_POST['e_login']) || isset($_POST['e_nom']) || isset($_POST['e_mdp']) || isset($_POST['e_prenom'])) {
            //Si un de ces champs à été envoyé
            $e_code = $id[0];
            $modEtu = $this->loadModel('UserEtu');
            
            $donnees = array();
            
            if (isset($_POST['e_nom'])){
                $donnees['e_nom'] = $_POST['e_nom'];
                SESSION::set('nom', $_POST['e_nom']);
            }
            
            if (isset($_POST['e_prenom'])){
                $donnees['e_prenom'] = $_POST['e_prenom'];
                SESSION::set('prenom', $_POST['e_prenom']);
            }
            
            if (isset($_POST['e_login'])){
                $donnees['e_login'] = $_POST['e_login'];
                SESSION::set('login', $_POST['e_login']);
            }
            
            if (isset($_POST['e_mdp'])){
                $mdp = sha1($_POST['e_mdp']);
                if($mdp == SESSION::get('mdp')){
                    $donnees['e_mdp'] = sha1($_POST['e_nmdp']);
                    SESSION::set('mdp', sha1($_POST['e_nmdp']));
                }
            }
            
            $cle = array();
            $cle['e_code'] = $e_code;
            
            $tab = array();
            $tab['cle'] = $cle;
            
            $tab['donnees'] = $donnees;
            $modEtu->update($tab);
            $d['etudiant'] = $donnees;
        }
    }
    
    function listeCR(){ //Récupération de données pour l'affichage de la liste
        $modEtudiant = $this->loadModel('UserEtu');
        $d['etudiant'] = $modEtudiant->find(array('conditions' => 1));
        $this->set($d);

        $modUser = $this->loadModel('User');
        $d['professeur'] = $modUser->find(array('conditions' => 1));
        $this->set($d);

        $modCompteRendu = $this->loadModel('CompteRendu');
        $d['compterendu'] = $modCompteRendu->find(array('conditions' => 'e_code = ' . SESSION::get('code')));
        $this->set($d);
    }
    
    function consultCR($id){ //Récupération de donnée pour la consultation d'un compte-rendu
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
}
